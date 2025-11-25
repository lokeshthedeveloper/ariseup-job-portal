<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = University::query();

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('state', 'like', "%{$search}%")
                  ->orWhere('country', 'like', "%{$search}%");
            });
        }

        // Status filter
        if ($request->has('status') && $request->status !== '') {
            $query->where('status', $request->status);
        }

        // Type filter
        if ($request->has('type') && $request->type !== '') {
            $query->where('type', $request->type);
        }

        // Country filter
        if ($request->has('country') && $request->country !== '') {
            $query->where('country', $request->country);
        }

        // State filter
        if ($request->has('state') && $request->state !== '') {
            $query->where('state', $request->state);
        }

        $universities = $query->orderBy('created_at', 'desc')->paginate(15);

        // Get distinct countries and states for filters
        $countries = University::select('country')->distinct()->orderBy('country')->pluck('country');
        $states = University::select('state')->distinct()->orderBy('state')->pluck('state');

        return view('admin.universities.index', compact('universities', 'countries', 'states'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.universities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'type' => 'required|in:Government,Private,Other',
            'established_year' => 'required|integer|min:1000|max:' . (date('Y') + 1),
            'status' => 'required|in:0,1',
        ]);

        try {
            DB::beginTransaction();

            University::create($validated);

            DB::commit();

            return redirect()->route('admin.universities.index')
                ->with('success', 'University created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->with('error', 'Failed to create university: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(University $university)
    {
        return view('admin.universities.show', compact('university'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(University $university)
    {
        return view('admin.universities.edit', compact('university'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, University $university)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'type' => 'required|in:Government,Private,Other',
            'established_year' => 'required|integer|min:1000|max:' . (date('Y') + 1),
            'status' => 'required|in:0,1',
        ]);

        try {
            DB::beginTransaction();

            $university->update($validated);

            DB::commit();

            return redirect()->route('admin.universities.index')
                ->with('success', 'University updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->with('error', 'Failed to update university: ' . $e->getMessage());
        }
    }

    /**
     * Toggle the status of the specified resource.
     */
    public function toggleStatus(University $university)
    {
        try {
            $university->toggleStatus();
            return back()->with('success', 'Status updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to update status: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(University $university)
    {
        try {
            DB::beginTransaction();
            $university->delete();
            DB::commit();

            return redirect()->route('admin.universities.index')
                ->with('success', 'University deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to delete university: ' . $e->getMessage());
        }
    }
}
