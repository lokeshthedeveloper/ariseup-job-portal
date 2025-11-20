@php
$ctrs = [
    [
        'title' => 'Success in finding jobs on JobStock Platform',
        'number' => '97',
        'symbol' => '%',
    ],
    [
        'title' => 'Potential increase traffice rather than JobStock website.',
        'number' => '68',
        'symbol' => 'X',
    ],
    [
        'title' => 'Thousands of companies work with us with partnership',
        'number' => '25',
        'symbol' => 'K',
    ],
    [
        'title' => 'Happy customers in all over world with our services',
        'number' => '25',
        'symbol' => 'K',
    ]
];
@endphp

@foreach ($ctrs as $item)
    <div class="col-xl-3 col-lg-3 col-md-6 col-12">
        <div class="d-flex align-items-center justify-content-start">
            <div class="tryui-pos"><h2 class="display-4 fw-medium text-main m-0"><span class="text-dark ctr">{{ $item['number'] }}</span>{{ $item['symbol'] }}</h2></div>
            <div class="exploi ps-3">
                <p class="m-0 lh-base">{{ $item['title'] }}</p>
            </div>
        </div>
    </div>
@endforeach