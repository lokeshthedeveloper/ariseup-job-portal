<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Theme;
use App\Models\Component;

class ThemeComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get themes and components
        $defaultTheme = Theme::where('slug', 'default-theme')->first();
        $darkTheme = Theme::where('slug', 'dark-theme')->first();
        $lightTheme = Theme::where('slug', 'light-theme')->first();
        $corporateTheme = Theme::where('slug', 'corporate-theme')->first();

        $header = Component::where('slug', 'header')->first();
        $footer = Component::where('slug', 'footer')->first();
        $sidebar = Component::where('slug', 'sidebar')->first();
        $navigation = Component::where('slug', 'navigation')->first();
        $heroSection = Component::where('slug', 'hero-section')->first();
        $aboutSection = Component::where('slug', 'about-section')->first();
        $servicesSection = Component::where('slug', 'services-section')->first();
        $contactForm = Component::where('slug', 'contact-form')->first();

        // Attach components to Default Theme
        if ($defaultTheme) {
            $defaultTheme->components()->syncWithoutDetaching([
                $header->id ?? null,
                $footer->id ?? null,
                $navigation->id ?? null,
                $heroSection->id ?? null,
                $aboutSection->id ?? null,
                $servicesSection->id ?? null,
                $contactForm->id ?? null,
            ]);
        }

        // Attach components to Dark Theme
        if ($darkTheme) {
            $darkTheme->components()->syncWithoutDetaching([
                $header->id ?? null,
                $footer->id ?? null,
                $sidebar->id ?? null,
                $navigation->id ?? null,
                $heroSection->id ?? null,
            ]);
        }

        // Attach components to Light Theme
        if ($lightTheme) {
            $lightTheme->components()->syncWithoutDetaching([
                $header->id ?? null,
                $footer->id ?? null,
                $navigation->id ?? null,
                $aboutSection->id ?? null,
                $servicesSection->id ?? null,
            ]);
        }

        // Attach components to Corporate Theme
        if ($corporateTheme) {
            $corporateTheme->components()->syncWithoutDetaching([
                $header->id ?? null,
                $footer->id ?? null,
                $sidebar->id ?? null,
                $navigation->id ?? null,
                $servicesSection->id ?? null,
                $contactForm->id ?? null,
            ]);
        }
    }
}
