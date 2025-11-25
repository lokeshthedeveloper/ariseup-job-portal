@php
$jobs = [
    [
        'id' => 1,
        'img' => 'assets/img/l-1.png', 
        'title' => 'Jr. PHP Developer',
        'app' => 'Tripadvisor',
        'desc' => 'Consistently create well-designed, tested code using best practices for website development, including mobile...',
        'year' => '1-2 Year',
        'time' => 'Full Time',
        'location' => 'London',
        'price' => '$370',
        'date' => '6 Sep 2025',
        'tag1' => true,
        'name' => '',
        'class' => '',
    ],
    [
        'id' => 2,
        'img' => 'assets/img/l-2.png', 
        'title' => 'Exp. Project manager',
        'app' => 'Pinterest',
        'desc' => 'Consistently create well-designed, tested code using best practices for website development, including mobile...',
        'year' => '1-2 Year',
        'time' => 'Full Time',
        'location' => 'London',
        'price' => '$370',
        'date' => '6 Sep 2025',
        'tag1' => false,
        'name' => 'Featured',
        'class' => 'featured-text',
    ],
    [
        'id' => 3,
        'img' => 'assets/img/l-3.png', 
        'title' => 'Sr. WordPress Developer',
        'app' => 'Shopify',
        'desc' => 'Consistently create well-designed, tested code using best practices for website development, including mobile...',
        'year' => '1-2 Year',
        'time' => 'Full Time',
        'location' => 'London',
        'price' => '$370',
        'date' => '6 Sep 2025',
        'tag1' => true,
        'name' => '',
        'class' => '',
    ],
    [
        'id' => 4,
        'img' => 'assets/img/l-4.png', 
        'title' => 'Jr. Laravel Developer',
        'app' => 'Dreezoo',
        'desc' => 'Consistently create well-designed, tested code using best practices for website development, including mobile...',
        'year' => '1-2 Year',
        'time' => 'Full Time',
        'location' => 'London',
        'price' => '$370',
        'date' => '6 Sep 2025',
        'tag1' => false,
        'name' => 'Featured',
        'class' => 'featured-text',
    ],
    [
        'id' => 5,
        'img' => 'assets/img/l-5.png', 
        'title' => 'Sr. UI/UX Designer',
        'app' => 'Photoshop',
        'desc' => 'Consistently create well-designed, tested code using best practices for website development, including mobile...',
        'year' => '1-2 Year',
        'time' => 'Full Time',
        'location' => 'London',
        'price' => '$370',
        'date' => '6 Sep 2025',
        'tag1' => false,
        'name' => 'Urgent',
        'class' => 'urgent',
    ],
    [
        'id' => 6,
        'img' => 'assets/img/l-6.png', 
        'title' => 'Java & Python Developer',
        'app' => 'Firefox',
        'desc' => 'Consistently create well-designed, tested code using best practices for website development, including mobile...',
        'year' => '1-2 Year',
        'time' => 'Full Time',
        'location' => 'London',
        'price' => '$370',
        'date' => '6 Sep 2025',
        'tag1' => true,
        'name' => '',
        'class' => '',
    ],
    [
        'id' => 7,
        'img' => 'assets/img/l-7.png', 
        'title' => 'Sr. CodeIgniter Developer',
        'app' => 'Airbnb',
        'desc' => 'Consistently create well-designed, tested code using best practices for website development, including mobile...',
        'year' => '1-2 Year',
        'time' => 'Full Time',
        'location' => 'London',
        'price' => '$370',
        'date' => '6 Sep 2025',
        'tag1' => false,
        'name' => 'Urgent',
        'class' => 'urgent',
    ],
    [
        'id' => 8,
        'img' => 'assets/img/l-8.png', 
        'title' => 'Sr. Magento Developer',
        'app' => 'Snapchat',
        'desc' => 'Consistently create well-designed, tested code using best practices for website development, including mobile...',
        'year' => '1-2 Year',
        'time' => 'Full Time',
        'location' => 'London',
        'price' => '$370',
        'date' => '6 Sep 2025',
        'tag1' => false,
        'name' => 'Featured',
        'class' => 'featured-text',
    ],
    [
        'id' => 9,
        'img' => 'assets/img/l-9.png', 
        'title' => 'Technical Content Writer',
        'app' => 'Tripadvisor',
        'desc' => 'Consistently create well-designed, tested code using best practices for website development, including mobile...',
        'year' => '1-2 Year',
        'time' => 'Full Time',
        'location' => 'London',
        'price' => '$370',
        'date' => '6 Sep 2025',
        'tag1' => true,
        'name' => '',
        'class' => '',
    ],
    [
        'id' => 10,
        'img' => 'assets/img/l-10.png', 
        'title' => 'Front-end Developer',
        'app' => 'Pinterest',
        'desc' => 'Consistently create well-designed, tested code using best practices for website development, including mobile...',
        'year' => '1-2 Year',
        'time' => 'Full Time',
        'location' => 'London',
        'price' => '$370',
        'date' => '6 Sep 2025',
        'tag1' => false,
        'name' => 'Featured',
        'class' => 'featured-text',
    ]
];
@endphp

@foreach ($jobs as $item)
    <div class="col-xl-6 col-lg-6 col-md-6 col-12">
        <div class="jbs-grid-layout border">
            <div class="right-tags-capt">
                
                @if ($item['tag1'] === true)
                    <span class="featured-text">Featured</span>
                    <span class="urgent">Urgent</span>
                @else
                    <span class="{{ $item['class'] }}">{{ $item['name'] }}</span>
                @endif

            </div>
            <div class="jbs-grid-emp-head">
                <div class="jbs-grid-emp-thumb"><a href="{{ route('job-detail', ['title' => Str::slug($item['title'])]) }}"><figure><img src="{{ asset($item['img']) }}" class="img-fluid" alt=""></figure></a></div>
            </div>
            <div class="jbs-grid-job-caption">
                <div class="jbs-job-employer-wrap"><span>{{ $item['app'] }}</span></div>
                <div class="jbs-job-title-wrap"><h4><a href="{{ route('job-detail', ['title' => Str::slug($item['title'])]) }}" class="jbs-job-title">{{ $item['title'] }}</a></h4></div>
            </div>
            <div class="jbs-grid-job-info-wrap">
                <div class="jbs-grid-job-info">
                    <div class="jbs-grid-single-info"><span><i class="fa-solid fa-user-group"></i>{{ $item['year'] }}</span></div>
                    <div class="jbs-grid-single-info"><span><i class="fa-regular fa-clock"></i>{{ $item['time'] }}</span></div>
                    <div class="jbs-grid-single-info"><span><i class="fa-solid fa-location-dot"></i>{{ $item['location'] }}</span></div>
                </div>
            </div>
            <div class="jbs-grid-job-description">
                <p>{{ $item['desc'] }}</p>
            </div>
            <div class="jbs-grid-job-edrs">
                <div class="jbs-grid-job-edrs-group">
                    <span>HTML</span>
                    <span>CSS3</span>
                    <span>Bootstrap</span>
                    <span>Redux</span>
                </div>
            </div>
            <div class="jbs-grid-job-package-info">
                <div class="jbs-grid-package-title"><h5>{{ $item['price'] }}<span>\Year</span></h5></div>
                <div class="jbs-grid-posted"><span>{{ $item['date'] }}</span></div>									
            </div>
            <div class="jbs-grid-job-apply-btns">
                <div class="jbs-btn-groups">
                    <a href="{{ route('job-detail', ['title' => Str::slug($item['title'])]) }}" class="btn btn-md btn-light-main px-4">View Detail</a>
                    <a href="JavaScript:Void(0);" class="btn btn-md btn-main px-4">Quick Apply</a>
                </div>
            </div>
        </div>
    </div>
@endforeach