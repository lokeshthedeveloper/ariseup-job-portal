<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'state_id',
        'country_id',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'state_id' => 'integer',
        'country_id' => 'integer',
        'status' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Scope a query to only include active cities.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    /**
     * Scope a query to only include inactive cities.
     */
    public function scopeInactive($query)
    {
        return $query->where('status', 0);
    }

    /**
     * Scope a query to filter by state.
     */
    public function scopeInState($query, $stateId)
    {
        return $query->where('state_id', $stateId);
    }

    /**
     * Scope a query to filter by country.
     */
    public function scopeInCountry($query, $countryId)
    {
        return $query->where('country_id', $countryId);
    }

    /**
     * Check if the city is active.
     */
    public function isActive(): bool
    {
        return $this->status === 1;
    }

    /**
     * Toggle the status of the city.
     */
    public function toggleStatus(): bool
    {
        $this->status = $this->status === 1 ? 0 : 1;
        return $this->save();
    }

    /**
     * Get the state that owns the city.
     */
    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    /**
     * Get the country that owns the city.
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
