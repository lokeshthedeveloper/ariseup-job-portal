<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CandidateController extends Controller
{
    public function show($title)
    {
        $candidates = [
            [
                'id' => 1,
                'img' => 'assets/img/team-1.jpg', 
                'title' => 'Kr. Shaurya Preet',
                'subtitle' => 'Sr. Web Designer',
                'number' => '70/H',
                'years' => '5 Years exp.',
                'btn' => 'Message',
                'btn1' => 'View Detail',
            ],
            [
                'id' => 2,
                'img' => 'assets/img/team-2.jpg', 
                'title' => 'Leila T. Lindsey',
                'subtitle' => 'Magento Expert',
                'number' => '70/H',
                'years' => '5 Years exp.',
                'btn' => 'Message',
                'btn1' => 'View Detail',
            ],
            [
                'id' => 3,
                'img' => 'assets/img/team-3.jpg', 
                'title' => 'Amie L. Brown',
                'subtitle' => 'WordPress Developer',
                'number' => '70/H',
                'years' => '5 Years exp.',
                'btn' => 'Message',
                'btn1' => 'View Detail',
            ],
            [
                'id' => 4,
                'img' => 'assets/img/team-4.jpg', 
                'title' => 'Darrel T. Turner',
                'subtitle' => 'Jr. SEO Expert',
                'number' => '70/H',
                'years' => '5 Years exp.',
                'btn' => 'Message',
                'btn1' => 'View Detail',
            ],
            [
                'id' => 5,
                'img' => 'assets/img/team-5.jpg', 
                'title' => 'Michael B. Arellano',
                'subtitle' => 'Front Designer',
                'number' => '70/H',
                'years' => '5 Years exp.',
                'btn' => 'Message',
                'btn1' => 'View Detail',
            ],
            [
                'id' => 6,
                'img' => 'assets/img/team-6.jpg', 
                'title' => 'Kum K. Sellers',
                'subtitle' => 'PHP Developer',
                'number' => '70/H',
                'years' => '5 Years exp.',
                'btn' => 'Message',
                'btn1' => 'View Detail',
            ],
            [
                'id' => 7,
                'img' => 'assets/img/team-7.jpg', 
                'title' => 'Debbie W. Wilson',
                'subtitle' => 'App Developer',
                'number' => '70/H',
                'years' => '5 Years exp.',
                'btn' => 'Message',
                'btn1' => 'View Detail',
            ],
            [
                'id' => 8,
                'img' => 'assets/img/team-8.jpg', 
                'title' => 'Peggy J. Arnold',
                'subtitle' => 'Content Writer',
                'number' => '70/H',
                'years' => '5 Years exp.',
                'btn' => 'Message',
                'btn1' => 'View Detail',
            ],
            [
                'id' => 9,
                'img' => 'assets/img/team-9.jpg', 
                'title' => 'Wanda D. Smith',
                'subtitle' => 'Sr. PHP Developer',
                'number' => '40/H',
                'years' => '2 Years exp.',
                'btn' => 'Message',
                'btn1' => 'View Detail',
            ],
            [
                'id' => 10,
                'img' => 'assets/img/team-10.jpg', 
                'title' => 'Elaine W. Cook',
                'subtitle' => 'Sr. Team Leader',
                'number' => '65/H',
                'years' => '7 Years exp.',
                'btn' => 'Message',
                'btn1' => 'View Detail',
            ],
            [
                'id' => 11,
                'img' => 'assets/img/team-11.jpg', 
                'title' => 'Raymond H. Cato',
                'subtitle' => 'UI/UX Designer',
                'number' => '50/H',
                'years' => '4 Years exp.',
                'btn' => 'Message',
                'btn1' => 'View Detail',
            ],
            [
                'id' => 12,
                'img' => 'assets/img/team-12.jpg', 
                'title' => 'Ruth W. Guzman',
                'subtitle' => 'UI/UX Designer',
                'number' => '40/H',
                'years' => '3 Years exp.',
            ],
            [
                'id' => 13,
                'img' => 'assets/img/team-13.jpg', 
                'title' => 'Shawnda J. Turner',
                'subtitle' => 'WordPress Developer',
                'number' => '35/H',
                'years' => '2 Years exp.',
            ],
            [
                'id' => 14,
                'img' => 'assets/img/team-14.jpg', 
                'title' => 'Wlaine W. Cooke',
                'subtitle' => 'PHP Developer',
                'number' => '30/H',
                'years' => '2 Years exp.',
            ],
            [
                'id' => 15,
                'img' => 'assets/img/team-15.jpg', 
                'title' => 'Jean H. Meyer',
                'subtitle' => 'Front-End Designer',
                'number' => '45/H',
                'years' => '5 Years exp.',
            ]
        ];

        // Find the candidate by ID
        $item = collect($candidates)->first(function ($candidate) use ($title) {
            return Str::slug($candidate['title']) === $title;
        });

        // If course not found, return 404 error
        if (!$item) {
            abort(404);
        }

        // Return the view and pass the course data to the view
        return view('candidate-detail', compact('item'));
    }
}
