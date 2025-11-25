<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'courses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'education_level_id',
        'duration_value',
        'duration_unit',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'education_level_id' => 'integer',
        'duration_value' => 'integer',
        'status' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Scope a query to only include active courses.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    /**
     * Scope a query to only include inactive courses.
     */
    public function scopeInactive($query)
    {
        return $query->where('status', 0);
    }

    /**
     * Scope a query to filter by education level.
     */
    public function scopeOfEducationLevel($query, $educationLevelId)
    {
        return $query->where('education_level_id', $educationLevelId);
    }

    /**
     * Scope a query to filter by duration unit.
     */
    public function scopeOfDurationUnit($query, $unit)
    {
        return $query->where('duration_unit', $unit);
    }

    /**
     * Check if the course is active.
     */
    public function isActive(): bool
    {
        return $this->status === 1;
    }

    /**
     * Toggle the status of the course.
     */
    public function toggleStatus(): bool
    {
        $this->status = $this->status === 1 ? 0 : 1;
        return $this->save();
    }

    /**
     * Get the education level that owns the course.
     */
    public function educationLevel()
    {
        return $this->belongsTo(EducationLevel::class);
    }

    /**
     * Get the specializations for the course.
     */
    public function specializations()
    {
        return $this->hasMany(Specialization::class);
    }

    /**
     * Get the full duration as a formatted string.
     */
    public function getFullDuration(): string
    {
        return $this->duration_value . ' ' . $this->duration_unit;
    }
}
