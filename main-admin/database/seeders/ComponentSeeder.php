<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Component;
use Illuminate\Support\Str;

class ComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $components = [
            ['name' => 'Header', 'slug' => 'header', 'status' => true],
            ['name' => 'Footer', 'slug' => 'footer', 'status' => true],
            ['name' => 'Sidebar', 'slug' => 'sidebar', 'status' => true],
            ['name' => 'Navigation', 'slug' => 'navigation', 'status' => true],
            ['name' => 'Hero Section', 'slug' => 'hero-section', 'status' => true],
            ['name' => 'About Section', 'slug' => 'about-section', 'status' => true],
            ['name' => 'Services Section', 'slug' => 'services-section', 'status' => true],
            ['name' => 'Contact Form', 'slug' => 'contact-form', 'status' => true],
            ['name' => 'Testimonials', 'slug' => 'testimonials', 'status' => true],
            ['name' => 'Blog Section', 'slug' => 'blog-section', 'status' => false],
        ];

        foreach ($components as $component) {
            Component::updateOrCreate(
                ['slug' => $component['slug']],
                $component
            );
        }
    }
}
