<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\EducationLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Course::with('educationLevel');

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

        // Education level filter
        if ($request->has('education_level_id') && $request->education_level_id !== '') {
            $query->where('education_level_id', $request->education_level_id);
        }

        $courses = $query->orderBy('created_at', 'desc')->paginate(15);

        // Get education levels for filter
        $educationLevels = EducationLevel::where('status', 1)->orderBy('name')->get();

        return view('admin.courses.index', compact('courses', 'educationLevels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $educationLevels = EducationLevel::where('status', 1)->orderBy('name')->get();
        return view('admin.courses.create', compact('educationLevels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'education_level_id' => 'required|exists:education_levels,id',
            'description' => 'nullable|string',
            'status' => 'required|in:0,1',
        ]);

        try {
            DB::beginTransaction();

            Course::create($validated);

            DB::commit();

            return redirect()->route('admin.courses.index')
                ->with('success', 'Course created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->with('error', 'Failed to create course: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $course->load('educationLevel');
        return view('admin.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $educationLevels = EducationLevel::where('status', 1)->orderBy('name')->get();
        return view('admin.courses.edit', compact('course', 'educationLevels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'education_level_id' => 'required|exists:education_levels,id',
            'description' => 'nullable|string',
            'status' => 'required|in:0,1',
        ]);

        try {
            DB::beginTransaction();

            $course->update($validated);

            DB::commit();

            return redirect()->route('admin.courses.index')
                ->with('success', 'Course updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->with('error', 'Failed to update course: ' . $e->getMessage());
        }
    }

    /**
     * Toggle the status of the specified resource.
     */
    public function toggleStatus(Course $course)
    {
        try {
            $course->toggleStatus();
            return back()->with('success', 'Status updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to update status: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        try {
            DB::beginTransaction();
            $course->delete();
            DB::commit();

            return redirect()->route('admin.courses.index')
                ->with('success', 'Course deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to delete course: ' . $e->getMessage());
        }
    }
}
