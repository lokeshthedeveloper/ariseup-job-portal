<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Models\SkillCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Skill::with('category');

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('code', 'like', "%{$search}%");
            });
        }

        // Category filter
        if ($request->has('category_id') && $request->category_id !== '') {
            $query->where('skill_category_id', $request->category_id);
        }

        // Status filter
        if ($request->has('status') && $request->status !== '') {
            $query->where('status', $request->status);
        }

        $skills = $query->orderBy('created_at', 'desc')->paginate(15);
        $categories = SkillCategory::active()->orderBy('name')->get();

        return view('admin.skills.index', compact('skills', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = SkillCategory::active()->orderBy('name')->get();
        return view('admin.skills.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'nullable|string|max:100|unique:skills,code,NULL,id,deleted_at,NULL',
            'skill_category_id' => 'required|exists:skill_categories,id',
            'status' => 'required|in:0,1',
        ]);

        // Check for duplicate name in same category
        $exists = Skill::where('name', $validated['name'])
            ->where('skill_category_id', $validated['skill_category_id'])
            ->whereNull('deleted_at')
            ->exists();

        if ($exists) {
            return back()->withInput()
                ->withErrors(['name' => 'A skill with this name already exists in the selected category.']);
        }

        // Verify category is active
        $category = SkillCategory::find($validated['skill_category_id']);
        if (!$category || !$category->isActive()) {
            return back()->withInput()
                ->withErrors(['skill_category_id' => 'The selected category must be active.']);
        }

        try {
            DB::beginTransaction();

            Skill::create($validated);

            DB::commit();

            return redirect()->route('admin.skills.index')
                ->with('success', 'Skill created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->with('error', 'Failed to create skill: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Skill $skill)
    {
        $skill->load('category');
        return view('admin.skills.show', compact('skill'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill)
    {
        $categories = SkillCategory::active()->orderBy('name')->get();
        return view('admin.skills.edit', compact('skill', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skill $skill)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => [
                'nullable',
                'string',
                'max:100',
                Rule::unique('skills', 'code')->ignore($skill->id)->whereNull('deleted_at'),
            ],
            'skill_category_id' => 'required|exists:skill_categories,id',
            'status' => 'required|in:0,1',
        ]);

        // Check for duplicate name in same category (excluding current skill)
        $exists = Skill::where('name', $validated['name'])
            ->where('skill_category_id', $validated['skill_category_id'])
            ->where('id', '!=', $skill->id)
            ->whereNull('deleted_at')
            ->exists();

        if ($exists) {
            return back()->withInput()
                ->withErrors(['name' => 'A skill with this name already exists in the selected category.']);
        }

        // Verify category is active
        $category = SkillCategory::find($validated['skill_category_id']);
        if (!$category || !$category->isActive()) {
            return back()->withInput()
                ->withErrors(['skill_category_id' => 'The selected category must be active.']);
        }

        try {
            DB::beginTransaction();

            $skill->update($validated);

            DB::commit();

            return redirect()->route('admin.skills.index')
                ->with('success', 'Skill updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->with('error', 'Failed to update skill: ' . $e->getMessage());
        }
    }

    /**
     * Toggle the status of the specified resource.
     */
    public function toggleStatus(Skill $skill)
    {
        try {
            $skill->toggleStatus();
            return back()->with('success', 'Status updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to update status: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        try {
            DB::beginTransaction();
            $skill->delete();
            DB::commit();

            return redirect()->route('admin.skills.index')
                ->with('success', 'Skill deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to delete skill: ' . $e->getMessage());
        }
    }
}
