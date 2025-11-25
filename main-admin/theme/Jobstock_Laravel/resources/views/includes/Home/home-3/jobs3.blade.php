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
        'price' => '$370',
        'date' => '6 Sep 2025',
    ],
    [
        'id' => 2,
        'img' => 'assets/img/l-2.png', 
        'title' => 'Exp. Project manager',
        'name' => 'Pinterest', 
        'location' => 'Canada', 
        'time' => 'Part Time', 
        'years' => '3 Years exp.', 
        'price' => '$250',
        'date' => '10 Jan 2026',
    ],
    [
        'id' => 3,
        'img' => 'assets/img/l-3.png', 
        'title' => 'Sr. WordPress Developer',
        'name' => 'Shopify', 
        'location' => 'London', 
        'time' => 'Enternship', 
        'years' => '2 Years exp.', 
        'price' => '$270',
        'date' => '5 Jan 2026',
    ],
    [
        'id' => 4,
        'img' => 'assets/img/l-4.png', 
        'title' => 'Jr. Laravel Developer',
        'name' => 'Dreezoo', 
        'location' => 'New York', 
        'time' => 'Full Time', 
        'years' => '4 Years exp.', 
        'price' => '$350',
        'date' => '15 Jan 2026',
    ],
    [
        'id' => 5,
        'img' => 'assets/img/l-5.png', 
        'title' => 'Sr. UI/UX Designer',
        'name' => 'Snapchat', 
        'location' => 'California', 
        'time' => 'Part Time', 
        'years' => '4 Years exp.', 
        'price' => '$300',
        'date' => '26 Jan 2026',
    ],
    [
        'id' => 6,
        'img' => 'assets/img/l-6.png', 
        'title' => 'Java & Python Developer',
        'name' => 'Photoshop', 
        'location' => 'Canada', 
        'time' => 'Enternship', 
        'years' => '2 Years exp.', 
        'price' => '$290',
        'date' => '30 Jan 2026',
    ],
    [
        'id' => 7,
        'img' => 'assets/img/l-7.png', 
        'title' => 'Sr. CodeIgniter Developer',
        'name' => 'Firefox', 
        'location' => 'London', 
        'time' => 'Part Time', 
        'years' => '1 Years exp.', 
        'price' => '$180',
        'date' => '02 Feb 2026',
    ],
    [
        'id' => 8,
        'img' => 'assets/img/l-8.png', 
        'title' => 'Sr. Magento Developer',
        'name' => 'Airbnb', 
        'location' => 'London', 
        'time' => 'Freelance', 
        'years' => '2 Years exp.', 
        'price' => '$250',
        'date' => '10 Feb 2026',
    ]
];
@endphp

@foreach ($jobs as $item)
    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
        <div class="jbs-grid-layout style_2 border">
            <div class="jbs-grid-emp-head">
                <div class="jbs-grid-emp-content">
                    <div class="jbs-grid-emp-thumb jbs-verified"><a href="{{ route('job-detail', ['title' => Str::slug($item['title'])]) }}"><figure><img src="{{ asset($item['img']) }}" class="img-fluid" alt=""></figure></a></div>
                    <div class="jbs-grid-job-caption">
                        <div class="jbs-job-employer-wrap"><span>{{ $item['name'] }}</span></div>
                        <div class="jbs-job-title-wrap"><h4><a href="{{ route('job-detail', ['title' => Str::slug($item['title'])]) }}" class="jbs-job-title">{{ $item['title'] }}</a></h4></div>
                    </div>
                </div>
                <div class="jbs-grid-jbs-saved"><a href="JavaScript:Void(0);" class="bkrs"><i class="fa-regular fa-bookmark"></i></a></div>
            </div>
            <div class="jbs-grid-job-edrs mt-3">
                <div class="jbs-info-ico-style">
                    <div class="jbs-single-y1 style-1"><span><i class="fa-solid fa-location-dot"></i></span>{{ $item['location'] }}</div>
                    <div class="jbs-single-y1 style-2"><span><i class="fa-solid fa-clock"></i></span>{{ $item['time'] }}</div>
                    <div class="jbs-single-y1 style-3"><span><i class="fa-solid fa-coins"></i></span>{{ $item['years'] }}</div>
                </div>
            </div>
            <div class="jbs-grid-job-package-info">
                <div class="jbs-grid-package-title"><h5>{{ $item['price'] }}<span>\Year</span></h5></div>
                <div class="jbs-grid-posted"><span>{{ $item['date'] }}</span></div>									
            </div>
            <div class="jbs-grid-job-apply-btns">
                <div class="jbs-btn-groups">
                    <a href="{{ route('job-detail', ['title' => Str::slug($item['title'])]) }}" class="btn btn-md btn-gray px-4">View Detail</a>
                    <a href="JavaScript:Void(0);" class="btn btn-md btn-main px-4">Quick Apply</a>
                </div>
            </div>
        </div>	
    </div>
@endforeach