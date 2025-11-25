@php
$jobs = [
    [
        'id' => 1,
        'img' => 'assets/img/l-1.png', 
        'title' => 'Jr. PHP Developer',
        'app' => 'Tripadvisor',
        'desc' => 'Consistently create well-designed, tested code using best practices for website development, including mobile...',
        'location' => 'London',
        'time' => 'Full Time',
        'price' => '$80K - 90K', 
        'class' => 'success',
        'date' => '06 Sep 2025',
    ],
    [
        'id' => 2,
        'img' => 'assets/img/l-2.png', 
        'title' => 'Exp. Project manager',
        'app' => 'Pinterest',
        'desc' => 'Consistently create well-designed, tested code using best practices for website development, including mobile...',
        'location' => 'USA',
        'time' => 'Part Time',
        'price' => '$90K - 100K',
        'class' => 'warning',
        'date' => '06 Sep 2025',
    ],
    [
        'id' => 3,
        'img' => 'assets/img/l-3.png', 
        'title' => 'Sr. WordPress Developer',
        'app' => 'Shopify',
        'desc' => 'Consistently create well-designed, tested code using best practices for website development, including mobile...',
        'location' => 'Canada',
        'time' => 'Enternship',
        'price' => '$75K - 90K',
        'class' => 'danger',
        'date' => '06 Sep 2025',
    ],
    [
        'id' => 4,
        'img' => 'assets/img/l-4.png', 
        'title' => 'Jr. Laravel Developer',
        'app' => 'Dreezoo',
        'desc' => 'Consistently create well-designed, tested code using best practices for website development, including mobile...',
        'location' => 'Canada',
        'time' => 'Full Time',
        'price' => '$65K - 80K',
        'class' => 'success',
        'date' => '06 Sep 2025',
    ],
    [
        'id' => 5,
        'img' => 'assets/img/l-5.png', 
        'title' => 'Sr. UI/UX Designer',
        'app' => 'Photoshop',
        'desc' => 'Consistently create well-designed, tested code using best practices for website development, including mobile...',
        'location' => 'New York',
        'time' => 'Part Time',
        'price' => '$95K - 120K',
        'class' => 'warning',
        'date' => '06 Sep 2025',
    ],
    [
        'id' => 6,
        'img' => 'assets/img/l-6.png', 
        'title' => 'Java & Python Developer',
        'app' => 'Firefox',
        'desc' => 'Consistently create well-designed, tested code using best practices for website development, including mobile...',
        'location' => 'Denver',
        'time' => 'Freelance',
        'price' => '$90K - 110K',
        'class' => 'warning',
        'date' => '06 Sep 2025',
    ],
    [
        'id' => 7,
        'img' => 'assets/img/l-7.png', 
        'title' => 'Sr. CodeIgniter Developer',
        'app' => 'Airbnb',
        'desc' => 'Consistently create well-designed, tested code using best practices for website development, including mobile...',
        'location' => 'London',
        'time' => 'Full Time',
        'price' => '$60K - 80K',
        'class' => 'success',
        'date' => '06 Sep 2025',
    ],
    [
        'id' => 8,
        'img' => 'assets/img/l-8.png', 
        'title' => 'Sr. Magento Developer',
        'app' => 'Snapchat',
        'desc' => 'Consistently create well-designed, tested code using best practices for website development, including mobile...',
        'location' => 'Canada',
        'time' => 'Part Time',
        'price' => '$80K - 95K',
        'name' => 'Featured',
        'class' => 'danger',
        'date' => '06 Sep 2025',
    ],
    [
        'id' => 9,
        'img' => 'assets/img/l-9.png', 
        'title' => 'Technical Content Writer',
        'app' => 'Tripadvisor',
        'desc' => 'Consistently create well-designed, tested code using best practices for website development, including mobile...',
        'location' => 'London',
        'time' => 'Full Time',
        'price' => '$80K - 90K', 
        'class' => 'success',
        'date' => '06 Sep 2025',
    ],
    [
        'id' => 10,
        'img' => 'assets/img/l-10.png', 
        'title' => 'Front-end Developer',
        'app' => 'Pinterest',
        'desc' => 'Consistently create well-designed, tested code using best practices for website development, including mobile...',
        'location' => 'USA',
        'time' => 'Part Time',
        'price' => '$90K - 100K',
        'class' => 'warning',
        'date' => '06 Sep 2025',
    ]
];
@endphp

@foreach ($jobs as $item)
    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
        <div class="jbs-list-box border">
            <div class="jbs-list-head">
                <div class="jbs-list-head-thunner">
                    <div class="jbs-list-emp-thumb jbs-verified"><a href="{{ route('job-detail', ['title' => Str::slug($item['title'])]) }}"><figure><img src="{{ asset($item['img']) }}" class="img-fluid" alt=""></figure></a></div>
                    <div class="jbs-list-job-caption">
                        <div class="jbs-job-types-wrap"><span class="label text-{{ $item['class'] }} bg-{{ $item['class'] }} bg-opacity-05">{{ $item['time'] }}</span></div>
                        <div class="jbs-job-title-wrap"><h4><a href="{{ route('job-detail', ['title' => Str::slug($item['title'])]) }}" class="jbs-job-title">{{ $item['title'] }}</a></h4></div>
                        <div class="jbs-job-mrch-lists">
                            <div class="single-mrch-lists">
                                <span>{{ $item['app'] }}</span>.<span><i class="fa-solid fa-location-dot me-1"></i>{{ $item['location'] }}</span>.<span>{{ $item['date'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="jbs-list-head-middle">
                    <div class="elsocrio-jbs"><div class="ilop-tr"><i class="fa-solid fa-sack-dollar"></i></div><h5 class="jbs-list-pack">{{ $item['price'] }}<span class="patype">\PA</span></h5></div>
                </div>
                <div class="jbs-list-head-last">
                    <a href="JavaScript:Void(0);" class="btn btn-md btn-main px-3">Quick Apply</a>
                </div>
            </div>
            <div class="jbs-grid-job-description">
                <p class="text-mmd text-muted">{{ $item['desc'] }}</p>
            </div>
            <div class="jbs-grid-job-edrs m-0">
                <div class="jbs-grid-job-edrs-group">
                    <span>HTML</span>
                    <span>CSS3</span>
                    <span>Bootstrap</span>
                    <span>Redux</span>
                </div>
            </div>
        </div>
    </div>
@endforeach