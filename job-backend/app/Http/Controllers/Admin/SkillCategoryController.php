<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SkillCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SkillCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = SkillCategory::query();

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%");
        }

        // Status filter
        if ($request->has('status') && $request->status !== '') {
            $query->where('status', $request->status);
        }

        $categories = $query->withCount('skills')->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.skill-categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.skill-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:skill_categories,name,NULL,id,deleted_at,NULL',
            'status' => 'required|in:0,1',
        ]);

        try {
            DB::beginTransaction();

            SkillCategory::create($validated);

            DB::commit();

            return redirect()->route('admin.skill-categories.index')
                ->with('success', 'Skill category created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->with('error', 'Failed to create skill category: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SkillCategory $skillCategory)
    {
        $skillCategory->load('skills');
        return view('admin.skill-categories.show', compact('skillCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SkillCategory $skillCategory)
    {
        return view('admin.skill-categories.edit', compact('skillCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SkillCategory $skillCategory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:skill_categories,name,' . $skillCategory->id . ',id,deleted_at,NULL',
            'status' => 'required|in:0,1',
        ]);

        try {
            DB::beginTransaction();

            $skillCategory->update($validated);

            DB::commit();

            return redirect()->route('admin.skill-categories.index')
                ->with('success', 'Skill category updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->with('error', 'Failed to update skill category: ' . $e->getMessage());
        }
    }

    /**
     * Toggle the status of the specified resource.
     */
    public function toggleStatus(SkillCategory $skillCategory)
    {
        try {
            $skillCategory->toggleStatus();
            return back()->with('success', 'Status updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to update status: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SkillCategory $skillCategory)
    {
        try {
            // Check if category has associated skills
            if ($skillCategory->skills()->count() > 0) {
                return back()->with('error', 'Cannot delete skill category with associated skills.');
            }

            DB::beginTransaction();
            $skillCategory->delete();
            DB::commit();

            return redirect()->route('admin.skill-categories.index')
                ->with('success', 'Skill category deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to delete skill category: ' . $e->getMessage());
        }
    }
}
