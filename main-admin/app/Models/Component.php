<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Component extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($component) {
            if (empty($component->slug)) {
                $component->slug = Str::slug($component->name);
            }
        });

        static::updating(function ($component) {
            if ($component->isDirty('name') && empty($component->slug)) {
                $component->slug = Str::slug($component->name);
            }
        });
    }

    /**
     * Get the themes associated with this component.
     */
    public function themes()
    {
        return $this->belongsToMany(Theme::class, 'theme_components');
    }
}
