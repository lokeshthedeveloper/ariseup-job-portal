<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Specialization;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Specialization::with('course.educationLevel');

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

        // Course filter
        if ($request->has('course_id') && $request->course_id !== '') {
            $query->where('course_id', $request->course_id);
        }

        $specializations = $query->orderBy('created_at', 'desc')->paginate(15);

        // Get courses for filter
        $courses = Course::where('status', 1)->orderBy('name')->get();

        return view('admin.specializations.index', compact('specializations', 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::where('status', 1)->orderBy('name')->get();
        return view('admin.specializations.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'description' => 'nullable|string',
            'status' => 'required|in:0,1',
        ]);

        try {
            DB::beginTransaction();

            Specialization::create($validated);

            DB::commit();

            return redirect()->route('admin.specializations.index')
                ->with('success', 'Specialization created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->with('error', 'Failed to create specialization: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Specialization $specialization)
    {
        $specialization->load('course.educationLevel');
        return view('admin.specializations.show', compact('specialization'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Specialization $specialization)
    {
        $courses = Course::where('status', 1)->orderBy('name')->get();
        return view('admin.specializations.edit', compact('specialization', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Specialization $specialization)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'description' => 'nullable|string',
            'status' => 'required|in:0,1',
        ]);

        try {
            DB::beginTransaction();

            $specialization->update($validated);

            DB::commit();

            return redirect()->route('admin.specializations.index')
                ->with('success', 'Specialization updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->with('error', 'Failed to update specialization: ' . $e->getMessage());
        }
    }

    /**
     * Toggle the status of the specified resource.
     */
    public function toggleStatus(Specialization $specialization)
    {
        try {
            $specialization->toggleStatus();
            return back()->with('success', 'Status updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to update status: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Specialization $specialization)
    {
        try {
            DB::beginTransaction();
            $specialization->delete();
            DB::commit();

            return redirect()->route('admin.specializations.index')
                ->with('success', 'Specialization deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to delete specialization: ' . $e->getMessage());
        }
    }
}
