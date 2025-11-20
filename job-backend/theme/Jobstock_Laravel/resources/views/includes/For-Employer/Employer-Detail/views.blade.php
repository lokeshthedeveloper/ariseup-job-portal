@php
$views = [
    [
        'icon' => 'fa-solid fa-envelope-circle-check text-main', 
        'title' => 'Email Address',
        'name' => 'shreethemes@gmail.com',
    ],
    [
        'icon' => 'fa-solid fa-phone-volume text-main', 
        'title' => 'Contact No.',
        'name' => '9450 542 6325',
    ],
    [
        'icon' => 'fa-solid fa-layer-group text-main', 
        'title' => 'Category',
        'name' => 'Applications',
    ],
    [
        'icon' => 'fa-solid fa-user-group text-main', 
        'title' => 'Company Size',
        'name' => '1000-1500',
    ],
    [
        'icon' => 'fa-solid fa-map-location-dot text-main', 
        'title' => 'Location',
        'name' => 'California, USA',
    ],
    [
        'icon' => 'fa-solid fa-building-circle-check text-main', 
        'title' => 'Established',
        'name' => 'Oct 2010',
    ]
];
@endphp

@foreach ($views as $item)
    <div class="single-eflorio-list">
        <div class="eflorio-list-icons"><i class="{{ $item['icon'] }}"></i></div>
        <div class="eflorio-list-captions">
            <label>{{ $item['title'] }}</label>
            <h6>{{ $item['name'] }}</h6>
        </div>
    </div>
@endforeach