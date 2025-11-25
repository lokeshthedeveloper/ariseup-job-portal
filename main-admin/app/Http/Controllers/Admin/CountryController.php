<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Country::query();

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('code', 'like', "%{$search}%");
            });
        }

        // Status filter
        if ($request->has('status') && $request->status !== '') {
            $query->where('status', $request->status);
        }

        $countries = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.countries.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:countries,name',
            'code' => 'required|string|max:10|unique:countries,code',
            'status' => 'required|in:0,1',
        ]);

        try {
            DB::beginTransaction();

            Country::create($validated);

            DB::commit();

            return redirect()->route('admin.countries.index')
                ->with('success', 'Country created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->with('error', 'Failed to create country: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country)
    {
        return view('admin.countries.show', compact('country'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Country $country)
    {
        return view('admin.countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Country $country)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:countries,name,' . $country->id,
            'code' => 'required|string|max:10|unique:countries,code,' . $country->id,
            'status' => 'required|in:0,1',
        ]);

        try {
            DB::beginTransaction();

            $country->update($validated);

            DB::commit();

            return redirect()->route('admin.countries.index')
                ->with('success', 'Country updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->with('error', 'Failed to update country: ' . $e->getMessage());
        }
    }

    /**
     * Toggle the status of the specified resource.
     */
    public function toggleStatus(Country $country)
    {
        try {
            $country->toggleStatus();
            return back()->with('success', 'Status updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to update status: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country)
    {
        try {
            DB::beginTransaction();
            $country->delete();
            DB::commit();

            return redirect()->route('admin.countries.index')
                ->with('success', 'Country deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to delete country: ' . $e->getMessage());
        }
    }
}
