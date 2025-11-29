<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyTheme extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'section_type',
        'theme_id',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }
}
