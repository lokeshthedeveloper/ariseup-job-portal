@php
$explores = [
    [
        'img' => 'assets/img/c-1.png',
        'title' => 'California, USA',
        'jobs' => '307+ Jobs',
    ],
    [
        'img' => 'assets/img/c-2.png',
        'title' => 'Denver City, USA',
        'jobs' => '102+ Jobs',
    ],
    [
        'img' => 'assets/img/c-3.png',
        'title' => 'Washington, USA',
        'jobs' => '200+ Jobs',
    ],
    [
        'img' => 'assets/img/c-4.png',
        'title' => 'Liverpool, UK',
        'jobs' => '150+ Jobs',
    ]
];
@endphp

@foreach ($explores as $item)
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="jbs-location-infortment">
            <div class="jbs-location-infortment-thumb p-3">
                <a href="" class="jobstock-location-figure">
                    <img src="{{ asset($item['img']) }}" class="img-fluid rounded" alt="">
                </a>
            </div>
            <div class="jbs-location-infortment-content">
                <h4>{{ $item['title'] }}</h4>
                <span class="resy-98 fw-medium text-main">{{ $item['jobs'] }}</span>
            </div>
        </div>
    </div>
@endforeach