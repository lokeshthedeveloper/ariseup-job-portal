<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_type',
        'theme_name',
        'view_file',
        'screenshot',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Define available section types as a constant for validation/dropdowns
    const SECTION_TYPES = [
        'Header',
        'Footer',
        'Job List',
        'Job Details',
        'Blog List',
        'Blog Details',
        'User Registration',
        'Employee Registration',
        'Login Forms',
        'Pages List',
        'Pricing List',
        'Resume Writing Service',
    ];
}
