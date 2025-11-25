<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUniversityRequest;
use App\Http\Requests\UpdateUniversityRequest;
use App\Models\University;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UniversityController extends Controller
{
    /**
     * Display a listing of universities with pagination, search, and filters.
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);
            $search = $request->input('search');
            $status = $request->input('status');
            $type = $request->input('type');
            $country = $request->input('country');
            $state = $request->input('state');

            $query = University::query();

            // Apply search filter
            if ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('state', 'like', "%{$search}%")
                      ->orWhere('country', 'like', "%{$search}%");
                });
            }

            // Apply status filter
            if ($status !== null && $status !== '') {
                $query->where('status', $status);
            }

            // Apply type filter
            if ($type) {
                $query->where('type', $type);
            }

            // Apply country filter
            if ($country) {
                $query->where('country', $country);
            }

            // Apply state filter
            if ($state) {
                $query->where('state', $state);
            }

            // Order by latest first
            $query->orderBy('created_at', 'desc');

            $universities = $query->paginate($perPage);

            return response()->json([
                'success' => true,
                'message' => 'Universities retrieved successfully',
                'data' => $universities,
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching universities: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve universities',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get all active universities (for dropdown).
     */
    public function active(): JsonResponse
    {
        try {
            $universities = University::active()
                ->orderBy('name', 'asc')
                ->get(['id', 'name', 'state', 'country']);

            return response()->json([
                'success' => true,
                'message' => 'Active universities retrieved successfully',
                'data' => $universities,
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching active universities: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve active universities',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Store a newly created university.
     */
    public function store(StoreUniversityRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();

            $university = University::create($request->validated());

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'University created successfully',
                'data' => $university,
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating university: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to create university',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified university.
     */
    public function show($id): JsonResponse
    {
        try {
            $university = University::findOrFail($id);

            return response()->json([
                'success' => true,
                'message' => 'University retrieved successfully',
                'data' => $university,
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'University not found',
            ], 404);
        } catch (\Exception $e) {
            Log::error('Error fetching university: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve university',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Update the specified university.
     */
    public function update(UpdateUniversityRequest $request, $id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $university = University::findOrFail($id);
            $university->update($request->validated());

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'University updated successfully',
                'data' => $university->fresh(),
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'University not found',
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating university: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to update university',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Toggle the status of the specified university.
     */
    public function toggleStatus($id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $university = University::findOrFail($id);
            $university->toggleStatus();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'University status updated successfully',
                'data' => $university->fresh(),
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'University not found',
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error toggling university status: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to update university status',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified university (soft delete).
     */
    public function destroy($id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $university = University::findOrFail($id);
            $university->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'University deleted successfully',
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'University not found',
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error deleting university: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete university',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
