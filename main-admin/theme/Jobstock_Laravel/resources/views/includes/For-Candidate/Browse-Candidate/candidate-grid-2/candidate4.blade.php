@php
$candidates = [
    [
        'id' => 4,
        'img' => 'assets/img/team-4.jpg', 
        'title' => 'Darrel T. Turner',
        'subtitle' => 'Jr. SEO Expert',
        'number' => '70/H',
        'years' => '5 Years exp.',
    ],
    [
        'id' => 5,
        'img' => 'assets/img/team-5.jpg', 
        'title' => 'Michael B. Arellano',
        'subtitle' => 'Front Designer',
        'number' => '70/H',
        'years' => '5 Years exp.',
    ],
    [
        'id' => 6,
        'img' => 'assets/img/team-6.jpg', 
        'title' => 'Kum K. Sellers',
        'subtitle' => 'PHP Developer',
        'number' => '70/H',
        'years' => '5 Years exp.',
    ],
    [
        'id' => 7,
        'img' => 'assets/img/team-7.jpg', 
        'title' => 'Debbie W. Wilson',
        'subtitle' => 'App Developer',
        'number' => '70/H',
        'years' => '5 Years exp.',
    ],
    [
        'id' => 8,
        'img' => 'assets/img/team-8.jpg', 
        'title' => 'Peggy J. Arnold',
        'subtitle' => 'Content Writer',
        'number' => '70/H',
        'years' => '5 Years exp.',
    ],
    [
        'id' => 9,
        'img' => 'assets/img/team-9.jpg', 
        'title' => 'Wanda D. Smith',
        'subtitle' => 'Sr. PHP Developer',
        'number' => '40/H',
        'years' => '2 Years exp.',
    ],
    [
        'id' => 10,
        'img' => 'assets/img/team-10.jpg', 
        'title' => 'Elaine W. Cook',
        'subtitle' => 'Sr. Team Leader',
        'number' => '65/H',
        'years' => '7 Years exp.',
    ],
    [
        'id' => 11,
        'img' => 'assets/img/team-11.jpg', 
        'title' => 'Raymond H. Cato',
        'subtitle' => 'UI/UX Designer',
        'number' => '50/H',
        'years' => '4 Years exp.',
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
@endphp

@foreach ($candidates as $item)
    <div class="col-xl-4 col-lg-6 col-md-6 col-12">
        <div class="jbs-grid-usrs-block border">
            <div class="jbs-grid-usrs-thumb">
                <div class="jbs-grid-yuo">
                    <a href="{{ route('candidate-detail', ['title' => Str::slug($item['title'])]) }}"><figure><img src="{{ asset($item['img']) }}" class="img-fluid circle" alt=""></figure></a>
                </div>
            </div>
            <div class="jbs-grid-usrs-caption mb-4">
                <div class="jbs-tiosk">
                    <h4 class="jbs-tiosk-title"><a href="{{ route('candidate-detail', ['title' => Str::slug($item['title'])]) }}">{{ $item['title'] }}</a></h4>
                    <div class="jbs-tiosk-subtitle"><span>{{ $item['subtitle'] }}</span></div>
                </div>
            </div>
            <div class="jbs-grid-job-edrs">
                <div class="jbs-grid-job-edrs-group center">
                    <span>HTML</span>
                    <span>CSS3</span>
                    <span>Bootstrap</span>
                    <span>Redux</span>
                </div>
            </div>
            <div class="jbs-grid-usrs-info">
                <div class="jbs-info-ico-style bold">
                    <div class="jbs-single-y1 style-2"><span><i class="fa-solid fa-sack-dollar"></i></span>{{ $item['number'] }}</div>
                    <div class="jbs-single-y1 style-3"><span><i class="fa-solid fa-coins"></i></span>{{ $item['years'] }}</div>
                </div>
            </div>
            <div class="jbs-grid-usrs-contact">
                <div class="jbs-btn-groups">
                    <a href="#" class="btn btn-md btn-gray px-4">Contact</a>
                    <a href="{{ route('candidate-detail', ['title' => Str::slug($item['title'])]) }}" class="btn btn-md btn-main px-4">View Detail</a>
                </div>
            </div>
        </div>
    </div>
@endforeach