<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJobTitleRequest;
use App\Http\Requests\UpdateJobTitleRequest;
use App\Models\JobTitle;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class JobTitleController extends Controller
{
    /**
     * Display a listing of job titles with pagination, search, and filters.
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);
            $search = $request->input('search');
            $status = $request->input('status');
            $industryId = $request->input('industry_id');

            $query = JobTitle::query();

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

            // Apply industry filter
            if ($industryId) {
                $query->where('industry_id', $industryId);
            }

            // Order by latest first
            $query->orderBy('created_at', 'desc');

            $jobTitles = $query->paginate($perPage);

            return response()->json([
                'success' => true,
                'message' => 'Job titles retrieved successfully',
                'data' => $jobTitles,
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching job titles: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve job titles',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get all active job titles (for dropdown).
     */
    public function active(): JsonResponse
    {
        try {
            $jobTitles = JobTitle::active()
                ->orderBy('name', 'asc')
                ->get(['id', 'name', 'industry_id', 'description']);

            return response()->json([
                'success' => true,
                'message' => 'Active job titles retrieved successfully',
                'data' => $jobTitles,
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching active job titles: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve active job titles',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get job titles by industry.
     */
    public function getByIndustry($industryId): JsonResponse
    {
        try {
            $jobTitles = JobTitle::active()
                ->where('industry_id', $industryId)
                ->orderBy('name', 'asc')
                ->get(['id', 'name', 'industry_id', 'description']);

            return response()->json([
                'success' => true,
                'message' => 'Job titles retrieved successfully',
                'data' => $jobTitles,
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching job titles by industry: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve job titles',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Store a newly created job title.
     */
    public function store(StoreJobTitleRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();

            $jobTitle = JobTitle::create($request->validated());

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Job title created successfully',
                'data' => $jobTitle,
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating job title: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to create job title',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified job title.
     */
    public function show($id): JsonResponse
    {
        try {
            $jobTitle = JobTitle::findOrFail($id);

            return response()->json([
                'success' => true,
                'message' => 'Job title retrieved successfully',
                'data' => $jobTitle,
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Job title not found',
            ], 404);
        } catch (\Exception $e) {
            Log::error('Error fetching job title: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve job title',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Update the specified job title.
     */
    public function update(UpdateJobTitleRequest $request, $id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $jobTitle = JobTitle::findOrFail($id);
            $jobTitle->update($request->validated());

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Job title updated successfully',
                'data' => $jobTitle->fresh(),
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Job title not found',
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating job title: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to update job title',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Toggle the status of the specified job title.
     */
    public function toggleStatus($id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $jobTitle = JobTitle::findOrFail($id);
            $jobTitle->toggleStatus();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Job title status updated successfully',
                'data' => $jobTitle->fresh(),
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Job title not found',
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error toggling job title status: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to update job title status',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified job title (soft delete).
     */
    public function destroy($id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $jobTitle = JobTitle::findOrFail($id);
            $jobTitle->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Job title deleted successfully',
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Job title not found',
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error deleting job title: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete job title',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
