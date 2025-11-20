@php
$ctrs = [
    [
        'title' => 'Active Jobs',
        'price' => '200',
        'symbol' => 'M',
    ],
    [
        'title' => 'Startups',
        'price' => '40',
        'symbol' => 'K',
    ],
    [
        'title' => 'Talents',
        'price' => '340',
        'symbol' => 'K',
    ]
];
@endphp

@foreach ($ctrs as $item)
    <li>
        <div class="lios-parts">
            <h2><span class="ctr">{{ $item['price'] }}</span><span class="text-main">{{ $item['symbol'] }}</span></h2>
            <h6>{{ $item['title'] }}</h6>
        </div>
    </li>
@endforeach