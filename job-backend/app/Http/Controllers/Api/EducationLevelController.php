<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEducationLevelRequest;
use App\Http\Requests\UpdateEducationLevelRequest;
use App\Models\EducationLevel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EducationLevelController extends Controller
{
    /**
     * Display a listing of education levels with pagination, search, and filters.
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);
            $search = $request->input('search');
            $status = $request->input('status');

            $query = EducationLevel::query();

            // Apply search filter
            if ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
                });
            }

            // Apply status filter
            if ($status !== null && $status !== '') {
                $query->where('status', $status);
            }

            // Order by latest first
            $query->orderBy('created_at', 'desc');

            $educationLevels = $query->paginate($perPage);

            return response()->json([
                'success' => true,
                'message' => 'Education levels retrieved successfully',
                'data' => $educationLevels,
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching education levels: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve education levels',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get all active education levels (for dropdown).
     */
    public function active(): JsonResponse
    {
        try {
            $educationLevels = EducationLevel::active()
                ->orderBy('name', 'asc')
                ->get(['id', 'name', 'description']);

            return response()->json([
                'success' => true,
                'message' => 'Active education levels retrieved successfully',
                'data' => $educationLevels,
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching active education levels: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve active education levels',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Store a newly created education level.
     */
    public function store(StoreEducationLevelRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();

            $educationLevel = EducationLevel::create($request->validated());

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Education level created successfully',
                'data' => $educationLevel,
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating education level: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to create education level',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified education level.
     */
    public function show($id): JsonResponse
    {
        try {
            $educationLevel = EducationLevel::findOrFail($id);

            return response()->json([
                'success' => true,
                'message' => 'Education level retrieved successfully',
                'data' => $educationLevel,
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Education level not found',
            ], 404);
        } catch (\Exception $e) {
            Log::error('Error fetching education level: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve education level',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Update the specified education level.
     */
    public function update(UpdateEducationLevelRequest $request, $id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $educationLevel = EducationLevel::findOrFail($id);
            $educationLevel->update($request->validated());

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Education level updated successfully',
                'data' => $educationLevel->fresh(),
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Education level not found',
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating education level: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to update education level',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Toggle the status of the specified education level.
     */
    public function toggleStatus($id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $educationLevel = EducationLevel::findOrFail($id);
            $educationLevel->toggleStatus();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Education level status updated successfully',
                'data' => $educationLevel->fresh(),
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Education level not found',
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error toggling education level status: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to update education level status',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified education level (soft delete).
     */
    public function destroy($id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $educationLevel = EducationLevel::findOrFail($id);
            $educationLevel->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Education level deleted successfully',
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Education level not found',
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error deleting education level: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete education level',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
