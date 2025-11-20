@php
$awards = [
    [
        'img' => 'assets/img/award-1.png', 
        'title' => 'FIFFA Award',
        'year' => 'May 2025',
    ],
    [
        'img' => 'assets/img/award-2.png', 
        'title' => 'COMPRA Award',
        'year' => 'Dec 2024',
    ],
    [
        'img' => 'assets/img/award-4.png', 
        'title' => 'ICCPR Award',
        'year' => 'Apr 2023',
    ],
    [
        'img' => 'assets/img/award-3.png', 
        'title' => 'XICAGO Award',
        'year' => 'July 2022',
    ]
];
@endphp

@foreach ($awards as $item)
    <div class="col-xl-3 col-lg-3 col-md-3">
        <div class="escort-award-wrap">
            <div class="escort-award-thumb">
                <figure><img src="{{ asset($item['img']) }}" class="img-fluid" alt=""></figure>
            </div>
            <div class="escort-award-caption">
                <h6>{{ $item['title'] }}</h6>
                <label>{{ $item['year'] }}</label>
            </div>
        </div>
    </div>
@endforeach