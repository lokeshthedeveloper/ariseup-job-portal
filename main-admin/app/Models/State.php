<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'states';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'country_id',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'country_id' => 'integer',
        'status' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Scope a query to only include active states.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    /**
     * Scope a query to only include inactive states.
     */
    public function scopeInactive($query)
    {
        return $query->where('status', 0);
    }

    /**
     * Scope a query to filter by country.
     */
    public function scopeInCountry($query, $countryId)
    {
        return $query->where('country_id', $countryId);
    }

    /**
     * Check if the state is active.
     */
    public function isActive(): bool
    {
        return $this->status === 1;
    }

    /**
     * Toggle the status of the state.
     */
    public function toggleStatus(): bool
    {
        $this->status = $this->status === 1 ? 0 : 1;
        return $this->save();
    }

    /**
     * Get the country that owns the state.
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Get the cities for the state.
     */
    public function districts()
    {
        return $this->hasMany(District::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
