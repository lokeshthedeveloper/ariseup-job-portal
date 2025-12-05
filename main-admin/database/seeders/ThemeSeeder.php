<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Theme;
use Illuminate\Support\Str;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $themes = [
            ['name' => 'Default Theme', 'slug' => 'default-theme', 'status' => true],
            ['name' => 'Dark Theme', 'slug' => 'dark-theme', 'status' => true],
            ['name' => 'Light Theme', 'slug' => 'light-theme', 'status' => true],
            ['name' => 'Corporate Theme', 'slug' => 'corporate-theme', 'status' => true],
            ['name' => 'Creative Theme', 'slug' => 'creative-theme', 'status' => false],
        ];

        foreach ($themes as $theme) {
            Theme::updateOrCreate(
                ['slug' => $theme['slug']],
                $theme
            );
        }
    }
}
