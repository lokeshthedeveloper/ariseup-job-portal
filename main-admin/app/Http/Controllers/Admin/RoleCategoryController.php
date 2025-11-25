<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = RoleCategory::query();

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

        $roleCategories = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.role-categories.index', compact('roleCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.role-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:role_categories,name',
            'description' => 'nullable|string',
            'status' => 'required|in:0,1',
        ]);

        try {
            DB::beginTransaction();

            RoleCategory::create($validated);

            DB::commit();

            return redirect()->route('admin.role-categories.index')
                ->with('success', 'Role category created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->with('error', 'Failed to create role category: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(RoleCategory $roleCategory)
    {
        return view('admin.role-categories.show', compact('roleCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RoleCategory $roleCategory)
    {
        return view('admin.role-categories.edit', compact('roleCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RoleCategory $roleCategory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:role_categories,name,' . $roleCategory->id,
            'description' => 'nullable|string',
            'status' => 'required|in:0,1',
        ]);

        try {
            DB::beginTransaction();

            $roleCategory->update($validated);

            DB::commit();

            return redirect()->route('admin.role-categories.index')
                ->with('success', 'Role category updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->with('error', 'Failed to update role category: ' . $e->getMessage());
        }
    }

    /**
     * Toggle the status of the specified resource.
     */
    public function toggleStatus(RoleCategory $roleCategory)
    {
        try {
            $roleCategory->toggleStatus();
            return back()->with('success', 'Status updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to update status: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RoleCategory $roleCategory)
    {
        try {
            DB::beginTransaction();
            $roleCategory->delete();
            DB::commit();

            return redirect()->route('admin.role-categories.index')
                ->with('success', 'Role category deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to delete role category: ' . $e->getMessage());
        }
    }
}
