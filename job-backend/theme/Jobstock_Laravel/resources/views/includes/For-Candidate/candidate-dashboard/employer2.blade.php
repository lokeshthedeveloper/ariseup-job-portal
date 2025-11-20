@php
$employers = [
    [
        'id' => 1,
        'img' => 'assets/img/l-4.png', 
        'name' => 'Software & Consultancy', 
        'title' => 'Swap Technology',
        'location' => 'California, USA', 
        'open' => '07 Openings', 
        'est' => 'Est: 1992',
    ],
    [
        'id' => 2,
        'img' => 'assets/img/l-5.png', 
        'name' => 'Photo Edditing Tools', 
        'title' => 'Photoshop',
        'location' => 'New York, USA', 
        'open' => '03 Openings', 
        'est' => 'Est: 2003', 
    ],
    [
        'id' => 3,
        'img' => 'assets/img/l-6.png', 
        'name' => 'Web Browser & Tech', 
        'title' => 'Firefox',
        'location' => 'Denver, USA', 
        'open' => '05 Openings', 
        'est' => 'Est: 1980', 
    ],
    [
        'id' => 4,
        'img' => 'assets/img/l-7.png', 
        'name' => 'Business Directory', 
        'title' => 'Airbnb',
        'location' => 'London, UK', 
        'open' => '10 Openings', 
        'est' => 'Est: 2010', 
    ],
    [
        'id' => 5,
        'img' => 'assets/img/l-8.png', 
        'name' => 'Message & Video Reelas', 
        'title' => 'Snapchat',
        'location' => 'London, UK', 
        'open' => '04 Openings', 
        'est' => 'Est: 1992', 
    ],
    [
        'id' => 6,
        'img' => 'assets/img/l-9.png', 
        'name' => 'Portfolio Showcase', 
        'title' => 'Dribbble Inc',
        'location' => 'New York, USA', 
        'open' => '05 Openings', 
        'est' => 'Est: 2000', 
    ],
    [
        'id' => 7,
        'img' => 'assets/img/l-10.png', 
        'name' => 'Chat & Video Calling', 
        'title' => 'Skype',
        'location' => 'Canada, USA', 
        'open' => '02 Openings', 
        'est' => 'Est: 2007', 
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
@endphp

@foreach ($employers as $item)
    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
        <div class="emplors-list-box border">
            <div class="emplors-list-head">
                <div class="emplors-list-head-thunner">
                    <div class="emplors-list-emp-thumb"><a href="{{ route('employer-detail', ['title' => Str::slug($item['title'])]) }}"><figure><img src="{{ asset($item['img']) }}" class="img-fluid" alt=""></figure></a></div>
                    <div class="emplors-list-job-caption">
                        <div class="emplors-job-types-wrap mb-1"><span class="label text-light bg-success">{{ $item['open'] }}</span></div>
                        <div class="emplors-job-title-wrap mb-1"><h4><a href="{{ route('employer-detail', ['title' => Str::slug($item['title'])]) }}" class="emplors-job-title">{{ $item['title'] }}</a></h4></div>
                        <div class="emplors-job-mrch-lists">
                            <div class="single-mrch-lists">
                                <span>{{ $item['name'] }}</span>.<span><i class="fa-solid fa-location-dot me-1"></i>{{ $item['location'] }}</span>.<span>{{ $item['est'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="emplors-list-head-last">
                    <a href="{{ route('employer-detail', ['title' => Str::slug($item['title'])]) }}" class="btn btn-md btn-light-main px-3">View Company</a>
                </div>
            </div>
        </div>
    </div>
@endforeach