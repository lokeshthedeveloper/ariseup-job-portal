@php
$jobs = [
    [
        'id' => 7,
        'img' => 'assets/img/l-7.png', 
        'title' => 'Sr. CodeIgniter Developer',
        'name' => 'Firefox', 
        'location' => 'London', 
        'time' => 'Part Time', 
        'years' => '$400', 
        'ago' => '05 Days ago',
    ],
    [
        'id' => 8,
        'img' => 'assets/img/l-8.png', 
        'title' => 'Sr. Magento Developer',
        'name' => 'Airbnb', 
        'location' => 'London', 
        'time' => 'Freelance', 
        'years' => '$320', 
        'ago' => '05 Days ago',
    ],
    [
        'id' => 9,
        'img' => 'assets/img/l-9.png', 
        'title' => 'Technical Content Writer',
        'name' => 'Tripadvisor', 
        'location' => 'London', 
        'time' => 'Full Time', 
        'years' => '$400', 
        'ago' => '07 Days ago',
    ],
    [
        'id' => 10,
        'img' => 'assets/img/l-10.png', 
        'title' => 'Front-end Developer',
        'name' => 'Pinterest', 
        'location' => 'Canada', 
        'time' => 'Part Time', 
        'years' => '$350', 
        'ago' => '08 Days ago',
    ],
    [
        'id' => 11,
        'img' => 'assets/img/l-11.png', 
        'title' => 'Jr. Content Writer',
        'name' => 'Shopify', 
        'location' => 'London', 
        'time' => 'Enternship', 
        'years' => '$290', 
        'ago' => '10 Days ago',
    ],
    [
        'id' => 12,
        'img' => 'assets/img/l-12.png', 
        'title' => 'Sr. Figma Designer',
        'name' => 'Dreezoo', 
        'location' => 'New York', 
        'time' => 'Full Time', 
        'years' => '$250', 
        'ago' => '15 Days ago',
    ],
    [
        'id' => 1,
        'img' => 'assets/img/l-1.png', 
        'title' => 'Jr. PHP Developer',
        'name' => 'Tripadvisor', 
        'location' => 'London', 
        'time' => 'Full Time', 
        'years' => '$370', 
        'ago' => '07 Days ago',
    ],
    [
        'id' => 2,
        'img' => 'assets/img/l-2.png', 
        'title' => 'Exp. Project manager',
        'name' => 'Pinterest', 
        'location' => 'Canada', 
        'time' => 'Part Time', 
        'years' => '$370', 
        'ago' => '10 min ago',
    ],
    [
        'id' => 3,
        'img' => 'assets/img/l-3.png', 
        'title' => 'Sr. WordPress Developer',
        'name' => 'Shopify', 
        'location' => 'London', 
        'time' => 'Enternship', 
        'years' => '$300', 
        'ago' => '2 Hours ago',
    ],
    [
        'id' => 4,
        'img' => 'assets/img/l-4.png', 
        'title' => 'Jr. Laravel Developer',
        'name' => 'Dreezoo', 
        'location' => 'New York', 
        'time' => 'Full Time', 
        'years' => '$290', 
        'ago' => '5 Hours ago',
    ],
    [
        'id' => 5,
        'img' => 'assets/img/l-5.png', 
        'title' => 'Sr. UI/UX Designer',
        'name' => 'Snapchat', 
        'location' => 'California', 
        'time' => 'Part Time', 
        'years' => '$310', 
        'ago' => '10 Hours ago',
    ],
    [
        'id' => 6,
        'img' => 'assets/img/l-6.png', 
        'title' => 'Java & Python Developer',
        'name' => 'Photoshop', 
        'location' => 'Canada', 
        'time' => 'Enternship', 
        'years' => '$450', 
        'ago' => '02 Days ago',
    ]
];
@endphp

@foreach ($jobs as $item)
    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
        <div class="zob-list-bloxks border">
            <div class="zoblist-uppr-module">
                <div class="zoblist-uppr-module-left">
                    <div class="zoblist-uppr-module-thumb">
                        <div class="jbs-list-emp-thumb jbs-verified"><a href="{{ route('job-detail', ['title' => Str::slug($item['title'])]) }}"><figure><img src="{{ asset($item['img']) }}" class="img-fluid" alt=""></figure></a></div>
                    </div>
                    <div class="zoblist-uppr-module-caption">
                        <div class="jbs-job-title-wrap"><h4><a href="{{ route('job-detail', ['title' => Str::slug($item['title'])]) }}" class="jbs-job-title">{{ $item['title'] }}</a></h4></div>
                        <div class="single-mrch-lists mb-2">
                            <span>{{ $item['name'] }}</span>.<span><i class="fa-solid fa-location-dot me-1"></i>{{ $item['location'] }}</span>.<span class="text-success">{{ $item['time'] }}</span>
                        </div>
                        <div class="jbs-grid-job-edrs-group">
                            <span>HTML</span>
                            <span>CSS3</span>
                            <span>Bootstrap</span>
                            <span>Redux</span>
                        </div>
                    </div>
                </div>
                <div class="zoblist-uppr-module-right">
                    <div class="jbs-grid-jbs-saved"><a href="JavaScript:Void(0);" class="bkrs"><i class="fa-regular fa-bookmark"></i></a></div>
                </div>
            </div>
            <div class="zoblist-bott-module">
                <div class="zoblist-leio-field">
                    <div class="zoblist-package-wraps">
                        <div class="jbs-grid-package-title"><h5>{{ $item['years'] }}<span>\Year</span></h5></div>
                    </div>
                </div>
                <div class="zoblist-leio-button">
                    <div class="zoblist-leio-button-left me-2">
                        <div class="jbs-grid-posted"><span>{{ $item['ago'] }}</span></div>
                    </div>
                    <div class="zoblist-leio-button-right">
                        <a href="JavaScript:Void(0);" class="btn btn-sm btn-main px-3">Quick Apply</a>	
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach