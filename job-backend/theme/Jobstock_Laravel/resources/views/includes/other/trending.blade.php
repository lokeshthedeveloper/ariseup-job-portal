@php
$trendings = [
    [
        'id' => 1,
        'img' => 'assets/img/l-1.png', 
        'title' => 'Jr. PHP Developer',
        'name' => 'Tripadvisor', 
        'location' => 'London', 
        'time' => 'Full Time', 
        'date' => '06 Sep 2025', 
        'price' => '$85K - 95K',
    ],
    [
        'id' => 2,
        'img' => 'assets/img/l-2.png', 
        'title' => 'Exp. Project manager',
        'name' => 'Pinterest', 
        'location' => 'Canada', 
        'time' => 'Part Time', 
        'date' => '06 Sep 2025', 
        'price' => '$85K - 95K',
    ],
    [
        'id' => 3,
        'img' => 'assets/img/l-3.png', 
        'title' => 'Sr. WordPress Developer',
        'name' => 'Shopify', 
        'location' => 'London', 
        'time' => 'Enternship', 
        'date' => '06 Sep 2025', 
        'price' => '$85K - 95K',
    ],
    [
        'id' => 4,
        'img' => 'assets/img/l-4.png', 
        'title' => 'Jr. Laravel Developer',
        'name' => 'Dreezoo', 
        'location' => 'New York', 
        'time' => 'Full Time', 
        'date' => '06 Sep 2025', 
        'price' => '$85K - 95K',
    ],
    [
        'id' => 5,
        'img' => 'assets/img/l-5.png', 
        'title' => 'Sr. UI/UX Designer',
        'name' => 'Snapchat', 
        'location' => 'California', 
        'time' => 'Part Time', 
        'date' => '06 Sep 2025', 
        'price' => '$85K - 95K',
    ]
];
@endphp

@foreach ($trendings as $item)
    <div class="col-xxl-10 col-xl-12 col-lg-12 col-md-12">
        <div class="jbs-list-box border">
            <div class="jbs-list-head">
                <div class="jbs-list-head-thunner">
                    <div class="jbs-list-emp-thumb jbs-verified"><a href="{{ route('job-detail', ['title' => Str::slug($item['title'])]) }}"><figure><img src="{{ asset($item['img']) }}" class="img-fluid" alt=""></figure></a></div>
                    <div class="jbs-list-job-caption">
                        <div class="jbs-job-types-wrap"><span class="label text-green bg-light-green">{{ $item['time'] }}</span></div>
                        <div class="jbs-job-title-wrap"><h4><a href="{{ route('job-detail', ['title' => Str::slug($item['title'])]) }}" class="jbs-job-title">{{ $item['title'] }}</a></h4></div>
                        <div class="jbs-job-mrch-lists">
                            <div class="single-mrch-lists">
                                <span>{{ $item['name'] }}</span>.<span><i class="fa-solid fa-location-dot me-1"></i>{{ $item['location'] }}</span>.<span>{{ $item['date'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="jbs-list-head-middle">
                    <div class="elsocrio-jbs"><div class="ilop-tr"><i class="fa-solid fa-sack-dollar"></i></div><h5 class="jbs-list-pack">{{ $item['price'] }}<span class="patype">\PA</span></h5></div>
                </div>
                <div class="jbs-list-head-last">
                    <a href="{{ route('job-detail', ['title' => Str::slug($item['title'])]) }}" class="btn btn-md btn-gray px-3 me-2">View Detail</a>
                    <a href="JavaScript:Void(0);" class="btn btn-md btn-main px-3">Quick Apply</a>
                </div>
            </div>
        </div>
    </div>
@endforeach