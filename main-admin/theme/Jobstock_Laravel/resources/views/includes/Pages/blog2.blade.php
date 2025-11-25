@php
$blogs = [
    [
        'id' => 3,
        'img' => 'assets/img/blog-3.jpg', 
        'title' => 'Consectetur purus habitasse ut diam habitant varius.',
        'desc' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat',
        'date' => '26 Feb 2026',
    ],
    [
        'id' => 4,
        'img' => 'assets/img/blog-7.jpg', 
        'title' => 'Smartest Applications for Business',
        'desc' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat',
        'date' => '19 Dec 2026',
    ],
    [
        'id' => 5,
        'img' => 'assets/img/blog-4.jpg', 
        'title' => 'Stop Worrying About Deadlines! We Got You Covered',
        'desc' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat',
        'date' => '10 Aug 2026',
    ],
    [
        'id' => 6,
        'img' => 'assets/img/blog-5.jpg', 
        'title' => 'Change Your Strategy: Find a Business Consultant',
        'desc' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat',
        'date' => '16 Jul 2026',
    ],
    [
        'id' => 7,
        'img' => 'assets/img/blog-6.jpg', 
        'title' => 'Everything About Financial Modeling',
        'desc' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat',
        'date' => '07 May 2026',
    ],
    [
        'id' => 8,
        'img' => 'assets/img/blog-7.jpg', 
        'title' => 'On the other hand we provide denounce',
        'desc' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat',
        'date' => '19 Dec 2026',
    ]
];
@endphp

<!-- Single blog Grid -->
<div class="col-lg-6 col-md-12">
    <div class="blog-list-block">
        
        <div class="blog-list-thumber">
            <a href="{{ url('/blog-detail') }}"><img src="{{ asset('assets/img/blog-1.jpg') }}" class="img-fluid rounded" alt=""></a>
        </div>
        <div class="blog-list-caption">
            <div class="blog-info">
                <span class="label text-success bg-success bg-opacity-05">Education</span>
                <h4 class="bl-title"><a href="{{ url('/blog-detail') }}">14 Newsletters You’ll Want in Your Inbox in 2026</a></h4>
            </div>
            
            <div class="blog-body">
                <p>These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled</p>
            </div>
            
            <div class="blg-authr d-flex align-items-center">
                <div class="blg-authr-thumb"><img src="{{ asset('assets/img/team-1.jpg') }}" class="img-fluid circle" width="45" alt=""></div>
                <div class="blg-authr-caption ps-2">
                    <h6 class="mb-0">Tamilore Oladipo</h6>
                    <span class="text-mid">3 Days Ago</span>
                </div>
            </div>
            
        </div>
    </div>
</div>

<!-- Single blog Grid -->
<div class="col-lg-6 col-md-12">
    <div class="blog-list-block">
        
        <div class="blog-list-thumber">
            <a href="{{ url('/blog-detail') }}"><img src="{{ asset('assets/img/blog-2.jpg') }}" class="img-fluid rounded" alt=""></a>
        </div>
        <div class="blog-list-caption">
            <div class="blog-info">
                <span class="label text-warning bg-warning bg-opacity-05">Resources</span>
                <h4 class="bl-title"><a href="{{ url('/blog-detail') }}">How a Change in My Role Inspired Six Impactful Habits</a></h4>
            </div>
            
            <div class="blog-body">
                <p>These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled</p>
            </div>
            
            <div class="blg-authr d-flex align-items-center">
                <div class="blg-authr-thumb"><img src="{{ asset('assets/img/team-2.jpg') }}" class="img-fluid circle" width="45" alt=""></div>
                <div class="blg-authr-caption ps-2">
                    <h6 class="mb-0">Angel J. Erickson</h6>
                    <span class="text-mid">4 Days Ago</span>
                </div>
            </div>
            
        </div>
    </div>
</div>

@foreach ($blogs as $item)
    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
        <div class="jobstock-grid-blog">
            <div class="jobstock-grid-blog-thumb">
                <img src="{{ asset($item['img']) }}" class="img-fluid" alt="">
            </div>
            <div class="jobstock-grid-blog-body">
                <div class="jobstock-grid-body-header">
                    <div class="jobstock-grid-posted bg-main"><span>{{ $item['date'] }}</span></div>
                    <div class="jobstock-grid-title"><h4><a href="{{ route('blog-detail', ['title' => Str::slug($item['title'])]) }}">{{ $item['title'] }}</a></h4></div>
                </div>
                <div class="jobstock-grid-body-middle">
                    <p>{{ $item['desc'] }}</p>
                </div>
                <div class="jobstock-grid-body-footer">
                    <a href="{{ route('blog-detail', ['title' => Str::slug($item['title'])]) }}" class="btn btn-blog-link">Continue Reading</a>
                </div>
            </div>
        </div>
    </div>
@endforeach