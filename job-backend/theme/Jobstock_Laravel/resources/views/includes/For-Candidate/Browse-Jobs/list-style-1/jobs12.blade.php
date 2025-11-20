@php
$jobs = [
    [
        'id' => 1,
        'img' => 'assets/img/l-1.png', 
        'title' => 'Jr. PHP Developer',
        'name' => 'Tripadvisor', 
        'location' => 'London', 
        'time' => 'Full Time', 
        'years' => '5 Years exp.', 
    ],
    [
        'id' => 2,
        'img' => 'assets/img/l-2.png', 
        'title' => 'Exp. Project manager',
        'name' => 'Pinterest', 
        'location' => 'Canada', 
        'time' => 'Part Time', 
        'years' => '3 Years exp.', 
    ],
    [
        'id' => 3,
        'img' => 'assets/img/l-3.png', 
        'title' => 'Sr. WordPress Developer',
        'name' => 'Shopify', 
        'location' => 'London', 
        'time' => 'Enternship', 
        'years' => '2 Years exp.', 
    ],
    [
        'id' => 4,
        'img' => 'assets/img/l-4.png', 
        'title' => 'Jr. Laravel Developer',
        'name' => 'Dreezoo', 
        'location' => 'New York', 
        'time' => 'Full Time', 
        'years' => '4 Years exp.', 
    ],
    [
        'id' => 5,
        'img' => 'assets/img/l-5.png', 
        'title' => 'Sr. UI/UX Designer',
        'name' => 'Snapchat', 
        'location' => 'California', 
        'time' => 'Part Time', 
        'years' => '4 Years exp.', 
    ],
    [
        'id' => 6,
        'img' => 'assets/img/l-6.png', 
        'title' => 'Java & Python Developer',
        'name' => 'Photoshop', 
        'location' => 'Canada', 
        'time' => 'Enternship', 
        'years' => '2 Years exp.', 
    ],
    [
        'id' => 7,
        'img' => 'assets/img/l-7.png', 
        'title' => 'Sr. CodeIgniter Developer',
        'name' => 'Firefox', 
        'location' => 'London', 
        'time' => 'Part Time', 
        'years' => '1 Years exp.', 
    ],
    [
        'id' => 8,
        'img' => 'assets/img/l-8.png', 
        'title' => 'Sr. Magento Developer',
        'name' => 'Airbnb', 
        'location' => 'London', 
        'time' => 'Freelance', 
        'years' => '2 Years exp.', 
    ],
    [
        'id' => 9,
        'img' => 'assets/img/l-9.png', 
        'title' => 'Technical Content Writer',
        'name' => 'Tripadvisor', 
        'location' => 'London', 
        'time' => 'Full Time', 
        'years' => '5 Years exp.', 
    ],
    [
        'id' => 10,
        'img' => 'assets/img/l-10.png', 
        'title' => 'Front-end Developer',
        'name' => 'Pinterest', 
        'location' => 'Canada', 
        'time' => 'Part Time', 
        'years' => '3 Years exp.', 
    ]
];
@endphp

@foreach ($jobs as $item)
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="jbs-list-box border">
            <div class="jbs-list-head">
                <div class="jbs-list-head-thunner">
                    <div class="jbs-list-emp-thumb jbs-verified"><a href="{{ route('job-detail', ['title' => Str::slug($item['title'])]) }}"><figure><img src="{{ asset($item['img']) }}" class="img-fluid" alt=""></figure></a></div>
                    <div class="jbs-list-job-caption">
                        <div class="jbs-job-employer-wrap"><span>{{ $item['name'] }}</span></div>
                        <div class="jbs-job-title-wrap"><h4><a href="{{ route('job-detail', ['title' => Str::slug($item['title'])]) }}" class="jbs-job-title">{{ $item['title'] }}</a></h4></div>
                    </div>
                </div>
                <div class="jbs-list-head-last">
                    <a href="JavaScript:Void(0);" class="btn btn-md btn-main px-4">Quick Apply</a>
                </div>
            </div>
            <div class="jbs-list-caption">
                <div class="jbs-info-ico-style">
                    <div class="jbs-single-y1 style-1"><span><i class="fa-solid fa-location-dot"></i></span>{{ $item['location'] }}</div>
                    <div class="jbs-single-y1 style-2"><span><i class="fa-solid fa-clock"></i></span>{{ $item['time'] }}</div>
                    <div class="jbs-single-y1 style-3"><span><i class="fa-solid fa-coins"></i></span>{{ $item['years'] }}</div>
                </div>
            </div>
        </div>
    </div>
@endforeach