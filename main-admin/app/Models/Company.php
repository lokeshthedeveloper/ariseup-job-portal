<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'theme_id',
        'name',
        'company_type',
        'phone',
        'phone_verified_at',
        'email_verified',
        'logo',
        'description',
        'industry',
        'company_size',
        'location',
        'website',
        'subdomain',
        'social_media_links',
        'job_categories',
        'about_us',
        'open_positions_note',
        'contact_info',
        'employee_benefits',
        'work_culture',
        'notable_clients_projects',
        'employee_reviews',
        'diversity_inclusion',
        'company_video',
        'application_process',
        'legal_information',
        'is_active',
        'address',
        'city',
        'district',
        'state',
        'country',
        'company_email',
    ];

    protected $casts = [
        'phone_verified_at' => 'datetime',
        'email_verified' => 'boolean',
        'social_media_links' => 'array',
        'job_categories' => 'array',
        'contact_info' => 'array',
        'is_active' => 'boolean',
    ];

    /**
     * Get the user that owns the company
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the theme associated with the company
     */
    public function theme(): BelongsTo
    {
        return $this->belongsTo(Theme::class);
    }

    /**
     * Get the selected theme for this company
     */
    public function selectedTheme()
    {
        return $this->belongsToMany(Theme::class, 'company_selected_themes')
            ->withTimestamps();
    }

    /**
     * Get the selected components with their theme information
     */
    public function selectedComponents()
    {
        return $this->belongsToMany(Component::class, 'company_selected_components')
            ->withPivot('theme_id')
            ->withTimestamps();
    }
}
