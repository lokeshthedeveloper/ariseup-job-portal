<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Models\City;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CityController extends Controller
{
    /**
     * Display a listing of cities with pagination, search, and filters.
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);
            $search = $request->input('search');
            $status = $request->input('status');
            $stateId = $request->input('state_id');
            $countryId = $request->input('country_id');

            $query = City::query();

            // Apply search filter
            if ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                });
            }

            // Apply status filter
            if ($status !== null && $status !== '') {
                $query->where('status', $status);
            }

            // Apply state filter
            if ($stateId) {
                $query->where('state_id', $stateId);
            }

            // Apply country filter
            if ($countryId) {
                $query->where('country_id', $countryId);
            }

            // Order by latest first
            $query->orderBy('created_at', 'desc');

            $cities = $query->paginate($perPage);

            return response()->json([
                'success' => true,
                'message' => 'Cities retrieved successfully',
                'data' => $cities,
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching cities: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve cities',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get all active cities (for dropdown).
     */
    public function active(): JsonResponse
    {
        try {
            $cities = City::active()
                ->orderBy('name', 'asc')
                ->get(['id', 'name', 'state_id', 'country_id']);

            return response()->json([
                'success' => true,
                'message' => 'Active cities retrieved successfully',
                'data' => $cities,
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching active cities: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve active cities',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get cities by state.
     */
    public function getByState($stateId): JsonResponse
    {
        try {
            $cities = City::active()
                ->where('state_id', $stateId)
                ->orderBy('name', 'asc')
                ->get(['id', 'name', 'state_id', 'country_id']);

            return response()->json([
                'success' => true,
                'message' => 'Cities retrieved successfully',
                'data' => $cities,
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching cities by state: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve cities',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get cities by country.
     */
    public function getByCountry($countryId): JsonResponse
    {
        try {
            $cities = City::active()
                ->where('country_id', $countryId)
                ->orderBy('name', 'asc')
                ->get(['id', 'name', 'state_id', 'country_id']);

            return response()->json([
                'success' => true,
                'message' => 'Cities retrieved successfully',
                'data' => $cities,
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching cities by country: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve cities',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Store a newly created city.
     */
    public function store(StoreCityRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();

            $city = City::create($request->validated());

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'City created successfully',
                'data' => $city,
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating city: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to create city',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified city.
     */
    public function show($id): JsonResponse
    {
        try {
            $city = City::findOrFail($id);

            return response()->json([
                'success' => true,
                'message' => 'City retrieved successfully',
                'data' => $city,
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'City not found',
            ], 404);
        } catch (\Exception $e) {
            Log::error('Error fetching city: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve city',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Update the specified city.
     */
    public function update(UpdateCityRequest $request, $id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $city = City::findOrFail($id);
            $city->update($request->validated());

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'City updated successfully',
                'data' => $city->fresh(),
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'City not found',
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating city: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to update city',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Toggle the status of the specified city.
     */
    public function toggleStatus($id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $city = City::findOrFail($id);
            $city->toggleStatus();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'City status updated successfully',
                'data' => $city->fresh(),
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'City not found',
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error toggling city status: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to update city status',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified city (soft delete).
     */
    public function destroy($id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $city = City::findOrFail($id);
            $city->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'City deleted successfully',
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'City not found',
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error deleting city: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete city',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
