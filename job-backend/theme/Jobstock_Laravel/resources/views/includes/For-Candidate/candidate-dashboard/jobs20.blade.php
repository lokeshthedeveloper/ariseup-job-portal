@php
$jobs = [
    [
        'id' => 1,
        'img' => 'assets/img/l-1.png', 
        'title' => 'Jr. PHP Developer',
        'name' => 'Tripadvisor', 
        'location' => 'London', 
        'time' => 'Full Time', 
        'date' => '06 Sep 2025', 
        'apply' => '27 Applied',
        'btn' => 'Active',
        'class' => 'success',
    ],
    [
        'id' => 2,
        'img' => 'assets/img/l-2.png', 
        'title' => 'Exp. Project manager',
        'name' => 'Pinterest', 
        'location' => 'Canada', 
        'time' => 'Part Time', 
        'date' => '06 Sep 2025', 
        'apply' => '27 Applied',
        'btn' => 'Expired',
        'class' => 'danger',
    ],
    [
        'id' => 3,
        'img' => 'assets/img/l-3.png', 
        'title' => 'Sr. WordPress Developer',
        'name' => 'Shopify', 
        'location' => 'London', 
        'time' => 'Enternship', 
        'date' => '06 Sep 2025', 
        'apply' => '27 Applied',
        'btn' => 'Active',
        'class' => 'success',
    ],
    [
        'id' => 4,
        'img' => 'assets/img/l-4.png', 
        'title' => 'Jr. Laravel Developer',
        'name' => 'Dreezoo', 
        'location' => 'New York', 
        'time' => 'Full Time', 
        'date' => '06 Sep 2025', 
        'apply' => '27 Applied',
        'btn' => 'Expired',
        'class' => 'danger',
    ],
    [
        'id' => 5,
        'img' => 'assets/img/l-5.png', 
        'title' => 'Sr. UI/UX Designer',
        'name' => 'Snapchat', 
        'location' => 'California', 
        'time' => 'Part Time', 
        'date' => '06 Sep 2025', 
        'apply' => '27 Applied',
        'btn' => 'Active',
        'class' => 'success',
    ],
    [
        'id' => 6,
        'img' => 'assets/img/l-6.png', 
        'title' => 'Java & Python Developer',
        'name' => 'Photoshop', 
        'location' => 'Canada', 
        'time' => 'Enternship', 
        'date' => '06 Sep 2025', 
        'apply' => '27 Applied',
        'btn' => 'Active',
        'class' => 'success',
    ],
    [
        'id' => 7,
        'img' => 'assets/img/l-7.png', 
        'title' => 'Sr. CodeIgniter Developer',
        'name' => 'Firefox', 
        'location' => 'London', 
        'time' => 'Part Time', 
        'date' => '06 Sep 2025', 
        'apply' => '27 Applied',
        'btn' => 'Expired',
        'class' => 'danger',
    ],
    [
        'id' => 8,
        'img' => 'assets/img/l-8.png', 
        'title' => 'Sr. Magento Developer',
        'name' => 'Airbnb', 
        'location' => 'London', 
        'time' => 'Freelance', 
        'date' => '06 Sep 2025', 
        'apply' => '27 Applied',
        'btn' => 'Active',
        'class' => 'success',
    ],
    [
        'id' => 9,
        'img' => 'assets/img/l-9.png', 
        'title' => 'Technical Content Writer',
        'name' => 'Tripadvisor', 
        'location' => 'London', 
        'time' => 'Full Time', 
        'date' => '06 Sep 2025', 
        'apply' => '27 Applied',
        'btn' => 'Expired',
        'class' => 'danger',
    ],
    [
        'id' => 10,
        'img' => 'assets/img/l-10.png', 
        'title' => 'Front-end Developer',
        'name' => 'Pinterest', 
        'location' => 'Canada', 
        'time' => 'Part Time', 
        'date' => '06 Sep 2025', 
        'apply' => '27 Applied',
        'btn' => 'Expired',
        'class' => 'danger',
    ]
];
@endphp

@foreach ($jobs as $item)
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="jbs-list-box border">
            <div class="jbs-list-head mb-0">
                <div class="jbs-list-head-thunner">
                    <div class="jbs-list-emp-thumb jbs-verified"><a href="{{ route('job-detail', ['title' => Str::slug($item['title'])]) }}"><figure><img src="{{ asset($item['img']) }}" class="img-fluid" alt=""></figure></a></div>
                    <div class="jbs-list-job-caption">
                        <div class="jbs-job-types-wrap mb-1"><span class="label text-success bg-success bg-opacity-05">{{ $item['time'] }}</span></div>
                        <div class="jbs-job-title-wrap"><h4><a href="{{ route('job-detail', ['title' => Str::slug($item['title'])]) }}" class="jbs-job-title">{{ $item['title'] }}</a></h4></div>
                        <div class="jbs-job-mrch-lists">
                            <div class="single-mrch-lists">
                                <span>{{ $item['name'] }}</span>.<span><i class="fa-solid fa-location-dot me-1"></i>{{ $item['location'] }}</span>.<span>{{ $item['date'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="jbs-list-head-middle">
                    <div class="elsocrio-jbs"><span class="text-sm-muted">{{ $item['apply'] }}</span></div>
                </div>
                <div class="jbs-list-head-middle">
                    <div class="elsocrio-jbs"><span class="text-sm-muted text-light bg-{{ $item['class'] }} py-2 px-3 rounded">{{ $item['btn'] }}</span></div>
                </div>
                <div class="jbs-list-head-last">
                    <a href="JavaScript:Void(0);" class="btn btn-md btn-light-red px-3 me-2"><i class="fa-solid fa-xmark"></i></a>
                    <a href="{{ route('job-detail', ['title' => Str::slug($item['title'])]) }}" class="btn btn-md btn-light-main px-3">View Detail</a>
                </div>
            </div>
        </div>
    </div>
@endforeach