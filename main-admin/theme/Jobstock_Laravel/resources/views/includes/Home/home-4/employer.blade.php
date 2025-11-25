@php
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
    ]
];
@endphp

@foreach ($employers as $item)
    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
        <div class="emp-grid-blocs border">
            
            <div class="emp-grid-thumbs">
                <a href="{{ route('employer-detail', ['title' => Str::slug($item['title'])]) }}"><figure><img src="{{ asset($item['img']) }}" class="img-fluid" alt=""></figure></a>	
            </div>
            
            <div class="emp-grid-captions">
                <div class="emplors-job-types-wrap"><span class="text-sm-muted">{{ $item['name'] }}</span></div>
                <div class="emplors-job-title-wrap mb-1">
                    <h4><a href="{{ route('employer-detail', ['title' => Str::slug($item['title'])]) }}" class="emplors-job-title">{{ $item['title'] }}</a></h4>
                </div>
                <div class="emplors-job-mrch-lists">
                    <div class="single-mrch-lists">
                        <span><i class="fa-solid fa-location-dot me-1"></i>{{ $item['location'] }}</span>
                    </div>
                </div>
            </div>
            
            <div class="emp-grid-footrs">
                <div class="emp-flexio"><span class="label px-4 py-2 text-main bg-light-main">{{ $item['open'] }}</span></div>
            </div>
            
        </div>	
    </div>
@endforeach