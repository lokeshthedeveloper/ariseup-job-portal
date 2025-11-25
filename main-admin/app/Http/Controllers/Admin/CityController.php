<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = City::with('state.country');

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            });
        }

        // Status filter
        if ($request->has('status') && $request->status !== '') {
            $query->where('status', $request->status);
        }

        // State filter
        if ($request->has('state_id') && $request->state_id !== '') {
            $query->where('state_id', $request->state_id);
        }

        // Country filter
        if ($request->has('country_id') && $request->country_id !== '') {
            $query->whereHas('state', function ($q) use ($request) {
                $q->where('country_id', $request->country_id);
            });
        }

        $cities = $query->orderBy('created_at', 'desc')->paginate(15);

        // Get states and countries for filter
        $states = State::where('status', 1)->orderBy('name')->get();
        $countries = Country::where('status', 1)->orderBy('name')->get();

        return view('admin.cities.index', compact('cities', 'states', 'countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allStates = State::where('status', 1)->orderBy('name')->get();
        $countries = Country::where('status', 1)->orderBy('name')->get();
        return view('admin.cities.create', compact('allStates', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'state_id' => 'required|exists:states,id',
            'country_id' => 'required|exists:countries,id',
            'status' => 'required|in:0,1',
        ]);

        try {
            DB::beginTransaction();

            City::create($validated);

            DB::commit();

            return redirect()->route('admin.cities.index')
                ->with('success', 'City created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->with('error', 'Failed to create city: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        $city->load('state.country');
        return view('admin.cities.show', compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        $states = State::where('status', 1)->orderBy('name')->get();
        $countries = Country::where('status', 1)->orderBy('name')->get();
        return view('admin.cities.edit', compact('city', 'states', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'state_id' => 'required|exists:states,id',
            'status' => 'required|in:0,1',
        ]);

        try {
            DB::beginTransaction();

            $city->update($validated);

            DB::commit();

            return redirect()->route('admin.cities.index')
                ->with('success', 'City updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->with('error', 'Failed to update city: ' . $e->getMessage());
        }
    }

    /**
     * Toggle the status of the specified resource.
     */
    public function toggleStatus(City $city)
    {
        try {
            $city->toggleStatus();
            return back()->with('success', 'Status updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to update status: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        try {
            DB::beginTransaction();
            $city->delete();
            DB::commit();

            return redirect()->route('admin.cities.index')
                ->with('success', 'City deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to delete city: ' . $e->getMessage());
        }
    }
}
