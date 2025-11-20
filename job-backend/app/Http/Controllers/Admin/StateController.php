<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = State::with('country');

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

        // Country filter
        if ($request->has('country_id') && $request->country_id !== '') {
            $query->where('country_id', $request->country_id);
        }

        $states = $query->orderBy('created_at', 'desc')->paginate(15);

        // Get countries for filter
        $countries = Country::where('status', 1)->orderBy('name')->get();

        return view('admin.states.index', compact('states', 'countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::where('status', 1)->orderBy('name')->get();
        return view('admin.states.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'country_id' => 'required|exists:countries,id',
            'status' => 'required|in:0,1',
        ]);

        try {
            DB::beginTransaction();

            State::create($validated);

            DB::commit();

            return redirect()->route('admin.states.index')
                ->with('success', 'State created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->with('error', 'Failed to create state: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(State $state)
    {
        $state->load('country');
        return view('admin.states.show', compact('state'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(State $state)
    {
        $countries = Country::where('status', 1)->orderBy('name')->get();
        return view('admin.states.edit', compact('state', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, State $state)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:10',
            'country_id' => 'required|exists:countries,id',
            'status' => 'required|in:0,1',
        ]);

        try {
            DB::beginTransaction();

            $state->update($validated);

            DB::commit();

            return redirect()->route('admin.states.index')
                ->with('success', 'State updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->with('error', 'Failed to update state: ' . $e->getMessage());
        }
    }

    /**
     * Toggle the status of the specified resource.
     */
    public function toggleStatus(State $state)
    {
        try {
            $state->toggleStatus();
            return back()->with('success', 'Status updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to update status: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(State $state)
    {
        try {
            DB::beginTransaction();
            $state->delete();
            DB::commit();

            return redirect()->route('admin.states.index')
                ->with('success', 'State deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to delete state: ' . $e->getMessage());
        }
    }
}
