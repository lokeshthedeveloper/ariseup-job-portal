@php
$lists = [
    [
        'id' => 5,
        'img' => 'assets/img/team-5.jpg', 
        'title' => 'Michael B. Arellano',
        'subtitle' => 'Front Designer',
        'location' => 'London',
        'date' => '10 March 2026',
    ],
    [
        'id' => 6,
        'img' => 'assets/img/team-6.jpg', 
        'title' => 'Kum K. Sellers',
        'subtitle' => 'PHP Developer',
        'location' => 'Canada, USA',
        'date' => '10 March 2026',
    ],
    [
        'id' => 7,
        'img' => 'assets/img/team-7.jpg', 
        'title' => 'Debbie W. Wilson',
        'subtitle' => 'App Developer',
        'location' => 'Denver, USA',
        'date' => '10 March 2026',
    ],
    [
        'id' => 8,
        'img' => 'assets/img/team-8.jpg', 
        'title' => 'Peggy J. Arnold',
        'subtitle' => 'Content Writer',
        'location' => 'California, USA',
        'date' => '10 March 2026',
    ],
    [
        'id' => 9,
        'img' => 'assets/img/team-9.jpg', 
        'title' => 'Wanda D. Smith',
        'subtitle' => 'Sr. PHP Developer',
        'location' => 'New York, USA',
        'date' => '10 March 2026',
    ],
    [
        'id' => 10,
        'img' => 'assets/img/team-10.jpg', 
        'title' => 'Elaine W. Cook',
        'subtitle' => 'Sr. Team Leader',
        'location' => 'California, USA',
        'date' => '10 March 2026',
    ],
    [
        'id' => 11,
        'img' => 'assets/img/team-11.jpg', 
        'title' => 'Raymond H. Cato',
        'subtitle' => 'UI/UX Designer',
        'location' => 'Canada, USA',
        'date' => '10 March 2026',
    ],
    [
    
        'id' => 12,
        'img' => 'assets/img/team-12.jpg', 
        'title' => 'Ruth W. Guzman',
        'subtitle' => 'UI/UX Designer',
        'location' => 'Liverpool, UK',
        'date' => '10 March 2026',
    ],
    [
        'id' => 13,
        'img' => 'assets/img/team-13.jpg', 
        'title' => 'Shawnda J. Turner',
        'subtitle' => 'WordPress Developer',
        'location' => 'New York, USA',
        'date' => '10 March 2026',
    ],
    [
        'id' => 14,
        'img' => 'assets/img/team-14.jpg', 
        'title' => 'Wlaine W. Cooke',
        'subtitle' => 'PHP Developer',
        'location' => 'London, UK',
        'date' => '10 March 2026',
    ],
    [
        'id' => 15,
        'img' => 'assets/img/team-15.jpg', 
        'title' => 'Jean H. Meyer',
        'subtitle' => 'Front-End Designer',
        'location' => 'Canada, USA',
        'date' => '10 March 2026',
    ]
];
@endphp

@foreach ($lists as $item)
    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
        <div class="jbs-list-box border">
            <div class="jbs-list-head m-0">
                <div class="jbs-list-head-thunner center">
                    <div class="jbs-list-usrs-thumb jbs-verified"><a href="{{ route('candidate-detail', ['title' => Str::slug($item['title'])]) }}"><figure><img src="{{ asset($item['img']) }}" class="img-fluid circle" alt=""></figure></a></div>
                    <div class="jbs-list-job-caption">
                        <div class="jbs-job-title-wrap"><h4><a href="{{ route('candidate-detail', ['title' => Str::slug($item['title'])]) }}" class="jbs-job-title">{{ $item['title'] }}</a></h4></div>
                        <div class="jbs-job-mrch-lists">
                            <div class="single-mrch-lists">
                                <span>{{ $item['subtitle'] }}</span>.<span><i class="fa-solid fa-location-dot me-1"></i>{{ $item['location'] }}</span><span>Applied: {{ $item['date'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="jbs-list-head-last">
                    <a href="JavaScript:Void(0);" class="rounded btn-md btn-main px-3 me-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Approve Candidate"><i class="fa-solid fa-check-double"></i></a>
                    <a href="JavaScript:Void(0);" class="rounded btn-md btn-dark px-3 me-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Reload"><i class="fa-solid fa-arrow-rotate-right"></i></a>
                    <a href="JavaScript:Void(0);" class="rounded btn-md btn-dark px-3 me-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Download Resume"><i class="fa-solid fa-download"></i></a>
                    <a href="JavaScript:Void(0);" class="rounded btn-md btn-red px-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Remove Candidate"><i class="fa-solid fa-trash-can"></i></a>
                </div>
            </div>
        </div>
    </div>
@endforeach