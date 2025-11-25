<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobTitle extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'job_titles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'industry_id',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'industry_id' => 'integer',
        'status' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Scope a query to only include active job titles.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    /**
     * Scope a query to only include inactive job titles.
     */
    public function scopeInactive($query)
    {
        return $query->where('status', 0);
    }

    /**
     * Scope a query to filter by industry.
     */
    public function scopeOfIndustry($query, $industryId)
    {
        return $query->where('industry_id', $industryId);
    }

    /**
     * Check if the job title is active.
     */
    public function isActive(): bool
    {
        return $this->status === 1;
    }

    /**
     * Toggle the status of the job title.
     */
    public function toggleStatus(): bool
    {
        $this->status = $this->status === 1 ? 0 : 1;
        return $this->save();
    }

    /**
     * Get the industry that owns the job title.
     */
    public function industry()
    {
        return $this->belongsTo(Industry::class);
    }
}
