@php
$contacts = [
    [
        'icon' => 'fa-solid fa-location-dot', 
        'name' => 'Hyderabad', 
        'title' => 'Krishe Emerald, Whitefields, Kondapur, Hyderabad, Telangana 500081',
        'mail' => 'shreethemes@gmail.com',
    ],
    [
        'icon' => 'fa-solid fa-map-location-dot', 
        'name' => 'Bengaluru', 
        'title' => 'Prestige Cube, Koramangala, Bengaluru, Karnataka 560029',
        'mail' => 'shreethemes@gmail.com',
    ],
    [
        'icon' => 'fa-solid fa-map-location', 
        'name' => 'Nagpur', 
        'title' => 'B-101, Vedant Sapphire, Sneha Nagar, Nagpur, Maharashtra, 440015',
        'mail' => 'shreethemes@gmail.com',
    ]
];
@endphp

@foreach ($contacts as $item)
    <div class="ctr-jobstock-signl">
        <div class="ctr-jobstock-signl-ico"><i class="{{ $item['icon'] }}"></i></div>
        <div class="ctr-jobstock-signl-caption">
            <h5>{{ $item['name'] }}</h5>
            <p>{{ $item['title'] }}</p>
            <p>{{ $item['mail'] }}</p>
        </div>
    </div>
@endforeach