<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EducationLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EducationLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = EducationLevel::query();

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Status filter
        if ($request->has('status') && $request->status !== '') {
            $query->where('status', $request->status);
        }

        $educationLevels = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.education-levels.index', compact('educationLevels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.education-levels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:education_levels,name',
            'description' => 'nullable|string',
            'status' => 'required|in:0,1',
        ]);

        try {
            DB::beginTransaction();

            EducationLevel::create($validated);

            DB::commit();

            return redirect()->route('admin.education-levels.index')
                ->with('success', 'Education level created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->with('error', 'Failed to create education level: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(EducationLevel $educationLevel)
    {
        return view('admin.education-levels.show', compact('educationLevel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EducationLevel $educationLevel)
    {
        return view('admin.education-levels.edit', compact('educationLevel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EducationLevel $educationLevel)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:education_levels,name,' . $educationLevel->id,
            'description' => 'nullable|string',
            'status' => 'required|in:0,1',
        ]);

        try {
            DB::beginTransaction();

            $educationLevel->update($validated);

            DB::commit();

            return redirect()->route('admin.education-levels.index')
                ->with('success', 'Education level updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->with('error', 'Failed to update education level: ' . $e->getMessage());
        }
    }

    /**
     * Toggle the status of the specified resource.
     */
    public function toggleStatus(EducationLevel $educationLevel)
    {
        try {
            $educationLevel->toggleStatus();
            return back()->with('success', 'Status updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to update status: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EducationLevel $educationLevel)
    {
        try {
            DB::beginTransaction();
            $educationLevel->delete();
            DB::commit();

            return redirect()->route('admin.education-levels.index')
                ->with('success', 'Education level deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to delete education level: ' . $e->getMessage());
        }
    }
}
