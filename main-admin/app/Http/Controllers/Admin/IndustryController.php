<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndustryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Industry::query();

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

        $industries = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.industries.index', compact('industries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.industries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:industries,name',
            'description' => 'nullable|string',
            'status' => 'required|in:0,1',
        ]);

        try {
            DB::beginTransaction();

            Industry::create($validated);

            DB::commit();

            return redirect()->route('admin.industries.index')
                ->with('success', 'Industry created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->with('error', 'Failed to create industry: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Industry $industry)
    {
        return view('admin.industries.show', compact('industry'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Industry $industry)
    {
        return view('admin.industries.edit', compact('industry'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Industry $industry)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:industries,name,' . $industry->id,
            'description' => 'nullable|string',
            'status' => 'required|in:0,1',
        ]);

        try {
            DB::beginTransaction();

            $industry->update($validated);

            DB::commit();

            return redirect()->route('admin.industries.index')
                ->with('success', 'Industry updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->with('error', 'Failed to update industry: ' . $e->getMessage());
        }
    }

    /**
     * Toggle the status of the specified resource.
     */
    public function toggleStatus(Industry $industry)
    {
        try {
            $industry->toggleStatus();
            return back()->with('success', 'Status updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to update status: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Industry $industry)
    {
        try {
            DB::beginTransaction();
            $industry->delete();
            DB::commit();

            return redirect()->route('admin.industries.index')
                ->with('success', 'Industry deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to delete industry: ' . $e->getMessage());
        }
    }
}
