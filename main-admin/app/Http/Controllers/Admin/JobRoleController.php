<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobRole;
use App\Models\RoleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = JobRole::with('roleCategory');

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

        // Role category filter
        if ($request->has('role_category_id') && $request->role_category_id !== '') {
            $query->where('role_category_id', $request->role_category_id);
        }

        $jobRoles = $query->orderBy('created_at', 'desc')->paginate(15);

        // Get role categories for filter
        $roleCategories = RoleCategory::where('status', 1)->orderBy('name')->get();

        return view('admin.job-roles.index', compact('jobRoles', 'roleCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roleCategories = RoleCategory::where('status', 1)->orderBy('name')->get();
        return view('admin.job-roles.create', compact('roleCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role_category_id' => 'required|exists:role_categories,id',
            'description' => 'nullable|string',
            'status' => 'required|in:0,1',
        ]);

        try {
            DB::beginTransaction();

            JobRole::create($validated);

            DB::commit();

            return redirect()->route('admin.job-roles.index')
                ->with('success', 'Job role created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->with('error', 'Failed to create job role: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(JobRole $jobRole)
    {
        $jobRole->load('roleCategory');
        return view('admin.job-roles.show', compact('jobRole'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobRole $jobRole)
    {
        $roleCategories = RoleCategory::where('status', 1)->orderBy('name')->get();
        return view('admin.job-roles.edit', compact('jobRole', 'roleCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobRole $jobRole)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role_category_id' => 'required|exists:role_categories,id',
            'description' => 'nullable|string',
            'status' => 'required|in:0,1',
        ]);

        try {
            DB::beginTransaction();

            $jobRole->update($validated);

            DB::commit();

            return redirect()->route('admin.job-roles.index')
                ->with('success', 'Job role updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->with('error', 'Failed to update job role: ' . $e->getMessage());
        }
    }

    /**
     * Toggle the status of the specified resource.
     */
    public function toggleStatus(JobRole $jobRole)
    {
        try {
            $jobRole->toggleStatus();
            return back()->with('success', 'Status updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to update status: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobRole $jobRole)
    {
        try {
            DB::beginTransaction();
            $jobRole->delete();
            DB::commit();

            return redirect()->route('admin.job-roles.index')
                ->with('success', 'Job role deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to delete job role: ' . $e->getMessage());
        }
    }
}
