<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobTitle;
use App\Models\Industry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = JobTitle::with('industry');

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

        // Industry filter
        if ($request->has('industry_id') && $request->industry_id !== '') {
            $query->where('industry_id', $request->industry_id);
        }

        $jobTitles = $query->orderBy('created_at', 'desc')->paginate(15);

        // Get industries for filter
        $industries = Industry::where('status', 1)->orderBy('name')->get();

        return view('admin.job-titles.index', compact('jobTitles', 'industries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $industries = Industry::where('status', 1)->orderBy('name')->get();
        return view('admin.job-titles.create', compact('industries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'industry_id' => 'required|exists:industries,id',
            'description' => 'nullable|string',
            'status' => 'required|in:0,1',
        ]);

        try {
            DB::beginTransaction();

            JobTitle::create($validated);

            DB::commit();

            return redirect()->route('admin.job-titles.index')
                ->with('success', 'Job title created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->with('error', 'Failed to create job title: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(JobTitle $jobTitle)
    {
        $jobTitle->load('industry');
        return view('admin.job-titles.show', compact('jobTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobTitle $jobTitle)
    {
        $industries = Industry::where('status', 1)->orderBy('name')->get();
        return view('admin.job-titles.edit', compact('jobTitle', 'industries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobTitle $jobTitle)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'industry_id' => 'required|exists:industries,id',
            'description' => 'nullable|string',
            'status' => 'required|in:0,1',
        ]);

        try {
            DB::beginTransaction();

            $jobTitle->update($validated);

            DB::commit();

            return redirect()->route('admin.job-titles.index')
                ->with('success', 'Job title updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->with('error', 'Failed to update job title: ' . $e->getMessage());
        }
    }

    /**
     * Toggle the status of the specified resource.
     */
    public function toggleStatus(JobTitle $jobTitle)
    {
        try {
            $jobTitle->toggleStatus();
            return back()->with('success', 'Status updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to update status: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobTitle $jobTitle)
    {
        try {
            DB::beginTransaction();
            $jobTitle->delete();
            DB::commit();

            return redirect()->route('admin.job-titles.index')
                ->with('success', 'Job title deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to delete job title: ' . $e->getMessage());
        }
    }
}
