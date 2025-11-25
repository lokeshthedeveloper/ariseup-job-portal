<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JobController extends Controller
{
    public function show($title)
    {
        $jobs = [
            [
                'id' => 1,
                'img' => 'assets/img/l-1.png', 
                'title' => 'Jr. PHP Developer',
                'desc' => 'CSS3, HTML5, Javascript, Bootstrap, Jquery',
                'price' => '$5K - $8K', 
                'open' => '6 Open', 
                'tag' => 'Enternship',
                'style' => 'enternship',
                'tag1' => true,
                'name' => '',
                'class' => '',
            ],
            [
                'id' => 2,
                'img' => 'assets/img/l-2.png', 
                'title' => 'Exp. Project manager',
                'desc' => 'CSS3, HTML5, Javascript, Bootstrap, Jquery',
                'price' => '$6K - $10K', 
                'open' => '4 Open', 
                'tag' => 'Freelancer',
                'style' => 'freelanc',
                'tag1' => false,
                'name' => 'Urgent',
                'class' => 'urgent',
            ],
            [
                'id' => 3,
                'img' => 'assets/img/l-3.png', 
                'title' => 'Sr. WordPress Developer',
                'desc' => 'CSS3, HTML5, Javascript, Bootstrap, Jquery',
                'price' => '$5K - $8K', 
                'open' => '3 Open', 
                'tag' => 'Part Time',
                'style' => 'part-time',
                'tag1' => true,
                'name' => '',
                'class' => '',
            ],
            [
                'id' => 4,
                'img' => 'assets/img/l-4.png', 
                'title' => 'Jr. Laravel Developer',
                'desc' => 'CSS3, HTML5, Javascript, Bootstrap, Jquery',
                'price' => '$4.2K - $6K', 
                'open' => '2 Open', 
                'tag' => 'Full Time',
                'style' => 'full-time',
                'tag1' => false,
                'name' => 'Featured',
                'class' => 'featured-text',
            ],
            [
                'id' => 5,
                'img' => 'assets/img/l-5.png', 
                'title' => 'Sr. UI/UX Designer',
                'desc' => 'CSS3, HTML5, Javascript, Bootstrap, Jquery',
                'price' => '$4K - $5.5K', 
                'open' => '5 Open', 
                'tag' => 'Freelancer',
                'style' => 'freelanc',
                'tag1' => false,
                'name' => 'Urgent',
                'class' => 'urgent',
            ],
            [
                'id' => 6,
                'img' => 'assets/img/l-6.png', 
                'title' => 'Java & Python Developer',
                'desc' => 'CSS3, HTML5, Javascript, Bootstrap, Jquery',
                'price' => '$2K - $4K', 
                'open' => '4 Open', 
                'tag' => 'Part Time',
                'style' => 'part-time',
                'tag1' => true,
                'name' => '',
                'class' => '',
            ],
            [
                'id' => 7,
                'img' => 'assets/img/l-7.png', 
                'title' => 'Sr. CodeIgniter Developer',
                'desc' => 'CSS3, HTML5, Javascript, Bootstrap, Jquery',
                'price' => '$5K - $6K', 
                'open' => '3 Open', 
                'tag' => 'FullTime',
                'style' => 'full-time',
                'tag1' => false,
                'name' => 'Urgent',
                'class' => 'urgent',
            ],
            [
                'id' => 8,
                'img' => 'assets/img/l-8.png', 
                'title' => 'Sr. Magento Developer',
                'desc' => 'CSS3, HTML5, Javascript, Bootstrap, Jquery',
                'price' => '$3.2K - $5K', 
                'open' => '5 Open', 
                'tag' => 'Enternship',
                'style' => 'enternship',
                'tag1' => false,
                'name' => 'Featured',
                'class' => 'featured-text',
            ],
            [
                'id' => 9,
                'img' => 'assets/img/l-9.png', 
                'title' => 'Technical Content Writer',
                'app' => 'Dribbble',
                'location' => 'New York, USA',
                'price' => '$85K - 90K', 
                'btn' => 'Quick Apply', 
                'tag' => 'Freelancer',
                'style' => 'freelanc',
                'tag1' => false,
                'name' => 'Featured',
                'class' => 'featured-text',
            ],
            [
                'id' => 10,
                'img' => 'assets/img/l-10.png', 
                'title' => 'Front-end Developer',
                'app' => 'Skype',
                'location' => 'Denver, USA',
                'price' => '$70K - 95K', 
                'btn' => 'Quick Apply', 
                'tag' => 'Full Time',
                'style' => 'full-time',
                'tag1' => true,
                'name' => '',
                'class' => '',
            ],
            [
                'id' => 11,
                'img' => 'assets/img/l-11.png', 
                'title' => 'Jr. Content Writer',
                'desc' => 'CSS3, HTML5, Javascript, Bootstrap, Jquery',
                'price' => '$4K - $5.5K', 
                'open' => '2 Open', 
                'tag' => 'Part Time',
                'style' => 'part-time',
                'tag1' => false,
                'name' => 'Urgent',
                'class' => 'urgent',
            ],
            [
                'id' => 12,
                'img' => 'assets/img/l-12.png', 
                'title' => 'Sr. Figma Designer',
                'desc' => 'CSS3, HTML5, Javascript, Bootstrap, Jquery',
                'price' => '$6K - $8K', 
                'open' => '3 Open', 
                'tag' => 'Full Time',
                'style' => 'full-time',
                'tag1' => true,
                'name' => '',
                'class' => '',
            ]
        ];

        // Find the job by ID
        $item = collect($jobs)->first(function ($job) use ($title) {
            return Str::slug($job['title']) === $title;
        });

        // If course not found, return 404 error
        if (!$item) {
            abort(404);
        }

        // Return the view and pass the course data to the view
        return view('job-detail', compact('item'));
    }
}
