<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EducationLevel extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'education_levels';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'status' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Scope a query to only include active education levels.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    /**
     * Scope a query to only include inactive education levels.
     */
    public function scopeInactive($query)
    {
        return $query->where('status', 0);
    }

    /**
     * Check if the education level is active.
     */
    public function isActive(): bool
    {
        return $this->status === 1;
    }

    /**
     * Toggle the status of the education level.
     */
    public function toggleStatus(): bool
    {
        $this->status = $this->status === 1 ? 0 : 1;
        return $this->save();
    }

    /**
     * Get the courses for the education level.
     */
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
