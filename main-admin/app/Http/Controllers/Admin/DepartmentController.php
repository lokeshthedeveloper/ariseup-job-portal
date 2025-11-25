<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Department::query();

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

        $departments = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:departments,name',
            'description' => 'nullable|string',
            'status' => 'required|in:0,1',
        ]);

        try {
            DB::beginTransaction();

            Department::create($validated);

            DB::commit();

            return redirect()->route('admin.departments.index')
                ->with('success', 'Department created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->with('error', 'Failed to create department: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        return view('admin.departments.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return view('admin.departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:departments,name,' . $department->id,
            'description' => 'nullable|string',
            'status' => 'required|in:0,1',
        ]);

        try {
            DB::beginTransaction();

            $department->update($validated);

            DB::commit();

            return redirect()->route('admin.departments.index')
                ->with('success', 'Department updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->with('error', 'Failed to update department: ' . $e->getMessage());
        }
    }

    /**
     * Toggle the status of the specified resource.
     */
    public function toggleStatus(Department $department)
    {
        try {
            $department->toggleStatus();
            return back()->with('success', 'Status updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to update status: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        try {
            DB::beginTransaction();
            $department->delete();
            DB::commit();

            return redirect()->route('admin.departments.index')
                ->with('success', 'Department deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to delete department: ' . $e->getMessage());
        }
    }
}
