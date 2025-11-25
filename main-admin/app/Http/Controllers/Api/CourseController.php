<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CourseController extends Controller
{
    /**
     * Display a listing of courses with pagination, search, and filters.
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);
            $search = $request->input('search');
            $status = $request->input('status');
            $educationLevelId = $request->input('education_level_id');

            $query = Course::query();

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

            // Apply education level filter
            if ($educationLevelId) {
                $query->where('education_level_id', $educationLevelId);
            }

            // Order by latest first
            $query->orderBy('created_at', 'desc');

            $courses = $query->paginate($perPage);

            return response()->json([
                'success' => true,
                'message' => 'Courses retrieved successfully',
                'data' => $courses,
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching courses: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve courses',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get all active courses (for dropdown).
     */
    public function active(): JsonResponse
    {
        try {
            $courses = Course::active()
                ->orderBy('name', 'asc')
                ->get(['id', 'name', 'education_level_id', 'description']);

            return response()->json([
                'success' => true,
                'message' => 'Active courses retrieved successfully',
                'data' => $courses,
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching active courses: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve active courses',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get courses by education level.
     */
    public function getByEducationLevel($educationLevelId): JsonResponse
    {
        try {
            $courses = Course::active()
                ->where('education_level_id', $educationLevelId)
                ->orderBy('name', 'asc')
                ->get(['id', 'name', 'education_level_id', 'description']);

            return response()->json([
                'success' => true,
                'message' => 'Courses retrieved successfully',
                'data' => $courses,
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching courses by education level: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve courses',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Store a newly created course.
     */
    public function store(StoreCourseRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();

            $course = Course::create($request->validated());

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Course created successfully',
                'data' => $course,
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating course: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to create course',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified course.
     */
    public function show($id): JsonResponse
    {
        try {
            $course = Course::findOrFail($id);

            return response()->json([
                'success' => true,
                'message' => 'Course retrieved successfully',
                'data' => $course,
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Course not found',
            ], 404);
        } catch (\Exception $e) {
            Log::error('Error fetching course: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve course',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Update the specified course.
     */
    public function update(UpdateCourseRequest $request, $id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $course = Course::findOrFail($id);
            $course->update($request->validated());

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Course updated successfully',
                'data' => $course->fresh(),
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Course not found',
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating course: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to update course',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Toggle the status of the specified course.
     */
    public function toggleStatus($id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $course = Course::findOrFail($id);
            $course->toggleStatus();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Course status updated successfully',
                'data' => $course->fresh(),
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Course not found',
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error toggling course status: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to update course status',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified course (soft delete).
     */
    public function destroy($id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $course = Course::findOrFail($id);
            $course->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Course deleted successfully',
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Course not found',
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error deleting course: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete course',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
