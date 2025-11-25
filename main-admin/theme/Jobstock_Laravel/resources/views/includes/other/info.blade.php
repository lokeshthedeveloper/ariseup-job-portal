@php
$infos = [
    [
        'title' => 'Company Founder:',
        'name' => 'Mr. Daniel Mark',
    ],
    [
        'title' => 'Industry:',
        'name' => 'Technology',
    ],
    [
        'title' => 'Founded:',
        'name' => '1997',
    ],
    [
        'title' => 'Head Office:',
        'name' => 'London, UK',
    ],
    [
        'title' => 'Revenue',
        'name' => '$70B+',
    ],
    [
        'title' => 'Company Size:',
        'name' => '20,000+ Emp.',
    ],
    [
        'title' => 'Min Exp.',
        'name' => '02 Years',
    ],
    [
        'title' => 'Openings',
        'name' => '06 Openings',
    ]
];
@endphp

@foreach ($infos as $item)
    <div class="single-side-info">
        <span class="text-sm-muted sld-subtitle">{{ $item['title'] }}</span>
        <h6 class="sld-title">{{ $item['name'] }}</h6>
    </div>
@endforeach