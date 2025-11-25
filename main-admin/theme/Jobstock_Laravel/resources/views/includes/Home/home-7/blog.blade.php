@php
$blogs = [
    [
        'id' => 1,
        'img' => 'assets/img/blog-1.jpg', 
        'title' => 'How To Work with jobstock Agency',
        'desc' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat',
        'date' => '10 Jul 2026',
    ],
    [
        'id' => 2,
        'img' => 'assets/img/blog-2.jpg', 
        'title' => 'Auctor sit elementum habitant vel tempor varius.',
        'desc' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat',
        'date' => '17 Jan 2026',
    ],
    [
        'id' => 3,
        'img' => 'assets/img/blog-3.jpg', 
        'title' => 'Consectetur purus habitasse ut diam habitant varius.',
        'desc' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat',
        'date' => '26 Feb 2026',
    ]
];
@endphp

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