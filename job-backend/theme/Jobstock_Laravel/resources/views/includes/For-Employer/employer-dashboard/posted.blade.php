@php
$posteds = [
    [
        'id' => 1,
        'img' => 'assets/img/l-1.png', 
        'title' => 'Jr. PHP Developer',
        'name' => 'Tripadvisor', 
        'applicants' => '244 Applicants', 
        'class' => 'green', 
        'posted' => '17 Apr 2025', 
        'expired' => '12 Jun 2026', 
    ],
    [
        'id' => 2,
        'img' => 'assets/img/l-2.png', 
        'title' => 'Exp. Project manager',
        'name' => 'Pinterest', 
        'applicants' => '110 Applicants', 
        'class' => 'green', 
        'posted' => '17 Apr 2025', 
        'expired' => '12 Jun 2026',
    ],
    [
        'id' => 3,
        'img' => 'assets/img/l-3.png', 
        'title' => 'Sr. WordPress Developer',
        'name' => 'Shopify', 
        'applicants' => '320 Applicants', 
        'class' => 'green', 
        'posted' => '17 Apr 2025', 
        'expired' => '12 Jun 2026',
    ],
    [
        'id' => 4,
        'img' => 'assets/img/l-4.png', 
        'title' => 'Jr. Laravel Developer',
        'name' => 'Dreezoo', 
        'applicants' => '170 Applicants', 
        'class' => 'green', 
        'posted' => '17 Apr 2025', 
        'expired' => '12 Jun 2026',
    ],
    [
        'id' => 5,
        'img' => 'assets/img/l-5.png', 
        'title' => 'Sr. UI/UX Designer',
        'name' => 'Snapchat', 
        'applicants' => '190 Applicants', 
        'class' => 'green', 
        'posted' => '17 Apr 2025', 
        'expired' => '12 Jun 2026',
    ],
    [
        'id' => 6,
        'img' => 'assets/img/l-6.png', 
        'title' => 'Java & Python Developer',
        'name' => 'Photoshop', 
        'applicants' => 'Expired', 
        'class' => 'red', 
        'posted' => '17 Apr 2025', 
        'expired' => '12 Jun 2026',
    ],
    [
        'id' => 7,
        'img' => 'assets/img/l-7.png', 
        'title' => 'Sr. CodeIgniter Developer',
        'name' => 'Firefox', 
        'applicants' => '205 Applicants', 
        'class' => 'green', 
        'posted' => '17 Apr 2025', 
        'expired' => '12 Jun 2026',
    ],
    [
        'id' => 8,
        'img' => 'assets/img/l-8.png', 
        'title' => 'Sr. Magento Developer',
        'name' => 'Airbnb', 
        'applicants' => '320 Applicants', 
        'class' => 'green', 
        'posted' => '17 Apr 2025', 
        'expired' => '12 Jun 2026',
    ],
    [
        'id' => 9,
        'img' => 'assets/img/l-9.png', 
        'title' => 'Technical Content Writer',
        'name' => 'Tripadvisor', 
        'applicants' => 'Expired', 
        'class' => 'red', 
        'posted' => '17 Apr 2025', 
        'expired' => '12 Jun 2026',
    ],
    [
        'id' => 10,
        'img' => 'assets/img/l-10.png', 
        'title' => 'Front-end Developer',
        'name' => 'Pinterest', 
        'applicants' => '150 Applicants', 
        'class' => 'green', 
        'posted' => '17 Apr 2025', 
        'expired' => '12 Jun 2026',
    ]
];
@endphp

@foreach ($posteds as $item)
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
                <div class="jbs-list-applied-users">
                    <span class="text-sm-muted text-light bg-{{ $item['class'] }} label">{{ $item['applicants'] }}</span>
                </div>
                <div class="jbs-list-postedinfo">
                    <p class="m-0 text-sm-muted"><strong>Posted:</strong><span class="text-success">{{ $item['posted'] }}</span></p>
                    <p class="m-0 text-sm-muted"><strong>Expired:</strong><span class="text-danger">{{ $item['expired'] }}</span></p>
                </div>
                <div class="jbs-list-head-last">
                    <a href="JavaScript:Void(0);" class="rounded btn-md text-success bg-light-green px-3"><i class="fa-solid fa-pencil"></i></a>
                    <a href="JavaScript:Void(0);" class="rounded btn-md text-danger bg-light-red px-3"><i class="fa-solid fa-trash-can"></i></a>
                </div>
            </div>
        </div>
    </div>
@endforeach