@php
$teams = [
    [
        'img' => 'assets/img/team-1.jpg', 
        'name' => 'Shaurya Preet', 
        'title' => 'Co-Founder',
    ],
    [
        'img' => 'assets/img/team-2.jpg', 
        'name' => 'Shivangi Preet', 
        'title' => 'Content Writer',
    ],
    [
        'img' => 'assets/img/team-3.jpg', 
        'name' => 'Yash Preet', 
        'title' => 'Content Writer',
    ],
    [
        'img' => 'assets/img/team-10.jpg', 
        'name' => 'Calvin English', 
        'title' => 'CEO & Manager',
    ],
    [
        'img' => 'assets/img/team-5.jpg', 
        'name' => 'Rahul Gilkrist', 
        'title' => 'App Designer',
    ],
    [
        'img' => 'assets/img/team-6.jpg', 
        'name' => 'Adam Wilcard', 
        'title' => 'Web Developer',
    ],
    [
        'img' => 'assets/img/team-7.jpg', 
        'name' => 'Adam Wilcard', 
        'title' => 'Web Developer',
    ],
    [
        'img' => 'assets/img/team-8.jpg', 
        'name' => 'Adam Wilcard', 
        'title' => 'Web Developer',
    ]
];
@endphp

@foreach ($teams as $item)
    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
        <div class="team-grid">

            <div class="teamgrid-user">
                <img src="{{ asset($item['img']) }}" alt="" class="img-fluid" />
            </div>
            
            <div class="teamgrid-content">
                <h4>{{ $item['name'] }}</h4>
                <span class="text-main">{{ $item['title'] }}</span>
            </div>

        </div>
    </div>
@endforeach