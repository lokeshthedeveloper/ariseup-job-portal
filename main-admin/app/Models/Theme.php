<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Theme extends Model
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

        static::creating(function ($theme) {
            if (empty($theme->slug)) {
                $theme->slug = Str::slug($theme->name);
            }
        });

        static::updating(function ($theme) {
            if ($theme->isDirty('name') && empty($theme->slug)) {
                $theme->slug = Str::slug($theme->name);
            }
        });
    }

    /**
     * Get the components associated with this theme.
     */
    public function components()
    {
        return $this->belongsToMany(Component::class, 'theme_components');
    }
}
