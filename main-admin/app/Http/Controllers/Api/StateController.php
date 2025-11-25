<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStateRequest;
use App\Http\Requests\UpdateStateRequest;
use App\Models\State;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StateController extends Controller
{
    /**
     * Display a listing of states with pagination, search, and filters.
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);
            $search = $request->input('search');
            $status = $request->input('status');
            $countryId = $request->input('country_id');

            $query = State::query();

            // Apply search filter
            if ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('code', 'like', "%{$search}%");
                });
            }

            // Apply status filter
            if ($status !== null && $status !== '') {
                $query->where('status', $status);
            }

            // Apply country filter
            if ($countryId) {
                $query->where('country_id', $countryId);
            }

            // Order by latest first
            $query->orderBy('created_at', 'desc');

            $states = $query->paginate($perPage);

            return response()->json([
                'success' => true,
                'message' => 'States retrieved successfully',
                'data' => $states,
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching states: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve states',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get all active states (for dropdown).
     */
    public function active(): JsonResponse
    {
        try {
            $states = State::active()
                ->orderBy('name', 'asc')
                ->get(['id', 'name', 'code', 'country_id']);

            return response()->json([
                'success' => true,
                'message' => 'Active states retrieved successfully',
                'data' => $states,
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching active states: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve active states',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get states by country.
     */
    public function getByCountry($countryId): JsonResponse
    {
        try {
            $states = State::active()
                ->where('country_id', $countryId)
                ->orderBy('name', 'asc')
                ->get(['id', 'name', 'code', 'country_id']);

            return response()->json([
                'success' => true,
                'message' => 'States retrieved successfully',
                'data' => $states,
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching states by country: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve states',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Store a newly created state.
     */
    public function store(StoreStateRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();

            $state = State::create($request->validated());

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'State created successfully',
                'data' => $state,
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating state: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to create state',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified state.
     */
    public function show($id): JsonResponse
    {
        try {
            $state = State::findOrFail($id);

            return response()->json([
                'success' => true,
                'message' => 'State retrieved successfully',
                'data' => $state,
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'State not found',
            ], 404);
        } catch (\Exception $e) {
            Log::error('Error fetching state: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve state',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Update the specified state.
     */
    public function update(UpdateStateRequest $request, $id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $state = State::findOrFail($id);
            $state->update($request->validated());

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'State updated successfully',
                'data' => $state->fresh(),
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'State not found',
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating state: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to update state',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Toggle the status of the specified state.
     */
    public function toggleStatus($id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $state = State::findOrFail($id);
            $state->toggleStatus();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'State status updated successfully',
                'data' => $state->fresh(),
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'State not found',
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error toggling state status: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to update state status',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified state (soft delete).
     */
    public function destroy($id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $state = State::findOrFail($id);
            $state->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'State deleted successfully',
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'State not found',
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error deleting state: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete state',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
