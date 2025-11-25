<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSpecializationRequest;
use App\Http\Requests\UpdateSpecializationRequest;
use App\Models\Specialization;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SpecializationController extends Controller
{
    /**
     * Display a listing of specializations with pagination, search, and filters.
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);
            $search = $request->input('search');
            $status = $request->input('status');
            $courseId = $request->input('course_id');

            $query = Specialization::query();

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

            // Apply course filter
            if ($courseId) {
                $query->where('course_id', $courseId);
            }

            // Order by latest first
            $query->orderBy('created_at', 'desc');

            $specializations = $query->paginate($perPage);

            return response()->json([
                'success' => true,
                'message' => 'Specializations retrieved successfully',
                'data' => $specializations,
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching specializations: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve specializations',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get all active specializations (for dropdown).
     */
    public function active(): JsonResponse
    {
        try {
            $specializations = Specialization::active()
                ->orderBy('name', 'asc')
                ->get(['id', 'name', 'course_id', 'description']);

            return response()->json([
                'success' => true,
                'message' => 'Active specializations retrieved successfully',
                'data' => $specializations,
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching active specializations: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve active specializations',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get specializations by course.
     */
    public function getByCourse($courseId): JsonResponse
    {
        try {
            $specializations = Specialization::active()
                ->where('course_id', $courseId)
                ->orderBy('name', 'asc')
                ->get(['id', 'name', 'course_id', 'description']);

            return response()->json([
                'success' => true,
                'message' => 'Specializations retrieved successfully',
                'data' => $specializations,
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching specializations by course: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve specializations',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Store a newly created specialization.
     */
    public function store(StoreSpecializationRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();

            $specialization = Specialization::create($request->validated());

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Specialization created successfully',
                'data' => $specialization,
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating specialization: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to create specialization',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified specialization.
     */
    public function show($id): JsonResponse
    {
        try {
            $specialization = Specialization::findOrFail($id);

            return response()->json([
                'success' => true,
                'message' => 'Specialization retrieved successfully',
                'data' => $specialization,
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Specialization not found',
            ], 404);
        } catch (\Exception $e) {
            Log::error('Error fetching specialization: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve specialization',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Update the specified specialization.
     */
    public function update(UpdateSpecializationRequest $request, $id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $specialization = Specialization::findOrFail($id);
            $specialization->update($request->validated());

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Specialization updated successfully',
                'data' => $specialization->fresh(),
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Specialization not found',
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating specialization: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to update specialization',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Toggle the status of the specified specialization.
     */
    public function toggleStatus($id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $specialization = Specialization::findOrFail($id);
            $specialization->toggleStatus();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Specialization status updated successfully',
                'data' => $specialization->fresh(),
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Specialization not found',
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error toggling specialization status: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to update specialization status',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified specialization (soft delete).
     */
    public function destroy($id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $specialization = Specialization::findOrFail($id);
            $specialization->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Specialization deleted successfully',
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Specialization not found',
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error deleting specialization: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete specialization',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
