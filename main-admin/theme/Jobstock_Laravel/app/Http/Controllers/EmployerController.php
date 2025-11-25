<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EmployerController extends Controller
{
    public function show($title)
    {
        $employers = [
            [
                'id' => 1,
                'img' => 'assets/img/l-4.png', 
                'name' => 'Software & Consultancy', 
                'title' => 'Swap Technology',
                'location' => 'California, USA', 
                'open' => '06 Open position', 
            ],
            [
                'id' => 2,
                'img' => 'assets/img/l-5.png', 
                'name' => 'Photo Edditing Tools', 
                'title' => 'Photoshop',
                'location' => 'New York, USA', 
                'open' => '16 Open position', 
            ],
            [
                'id' => 3,
                'img' => 'assets/img/l-6.png', 
                'name' => 'Web Browser & Tech', 
                'title' => 'Firefox',
                'location' => 'Denver, USA', 
                'open' => '03 Open position', 
            ],
            [
                'id' => 4,
                'img' => 'assets/img/l-7.png', 
                'name' => 'Business Directory', 
                'title' => 'Airbnb',
                'location' => 'London, UK', 
                'open' => '08 Open position', 
            ],
            [
                'id' => 5,
                'img' => 'assets/img/l-8.png', 
                'name' => 'Message & Video Reelas', 
                'title' => 'Snapchat',
                'location' => 'London, UK', 
                'open' => '07 Open position', 
            ],
            [
                'id' => 6,
                'img' => 'assets/img/l-9.png', 
                'name' => 'Portfolio Showcase', 
                'title' => 'Dribbble Inc',
                'location' => 'New York, USA', 
                'open' => '05 Open position', 
            ],
            [
                'id' => 7,
                'img' => 'assets/img/l-10.png', 
                'name' => 'Chat & Video Calling', 
                'title' => 'Skype',
                'location' => 'Canada, USA', 
                'open' => '10 Open position', 
            ],
            [
                'id' => 8,
                'img' => 'assets/img/l-11.png', 
                'name' => 'Software & Consultancy', 
                'title' => 'Google Inc',
                'location' => 'London, UK', 
                'open' => '06 Open position', 
            ],
            [
                'id' => 8,
                'img' => 'assets/img/l-1.png', 
                'name' => 'Software & Consultancy', 
                'title' => 'Tripadvisor',
                'location' => 'California, USA', 
                'open' => '07 Openings', 
                'est' => 'Est: 1992',
            ],
            [
                'id' => 9,
                'img' => 'assets/img/l-2.png', 
                'name' => 'Photo Showcase & Tools', 
                'title' => 'Pinterest - Punjab',
                'location' => 'Austrailia', 
                'open' => '03 Openings', 
                'est' => 'Est: 2003', 
            ],
            [
                'id' => 10,
                'img' => 'assets/img/l-3.png', 
                'name' => 'Web & Applications', 
                'title' => 'Shopify - Delhi',
                'location' => 'Canada, USA', 
                'open' => '05 Openings', 
                'est' => 'Est: 1980', 
            ]
        ];

        // Find the employer by ID
        $item = collect($employers)->first(function ($employer) use ($title) {
            return Str::slug($employer['title']) === $title;
        });

        // If course not found, return 404 error
        if (!$item) {
            abort(404);
        }

        // Return the view and pass the course data to the view
        return view('employer-detail', compact('item'));
    }
}
