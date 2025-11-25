@php
$informations = [
    [
        'icon' => 'fa-solid fa-envelope-open-text', 
        'title' => 'shreethemes@gmail.com',
        'name' => 'Mail Address',
    ],
    [
        'icon' => 'fa-solid fa-phone-volume', 
        'title' => '855 606 8472',
        'name' => 'Phone No.',
    ],
    [
        'icon' => 'fa-regular fa-user', 
        'title' => 'Male',
        'name' => 'Gender',
    ],
    [
        'icon' => 'fa-solid fa-cake-candles', 
        'title' => '07 Apr 1992',
        'name' => 'Age',
    ],
    [
        'icon' => 'fa-solid fa-wallet', 
        'title' => '$750/month',
        'name' => 'Offerd Sallary',
    ],
    [
        'icon' => 'fa-solid fa-briefcase', 
        'title' => '5 Years',
        'name' => 'Experience',
    ],
    [
        'icon' => 'fa-solid fa-user-graduate', 
        'title' => 'Master Degree',
        'name' => 'Qualification',
    ],
    [
        'icon' => 'fa-solid fa-layer-group', 
        'title' => 'Fulltime, Remote, Freelance',
        'name' => 'Work Type',
    ]
];
@endphp

@foreach ($informations as $item)
    <div class="col-xl-6 col-lg-6 col-md-6">
        <div class="cdtx-infr-box">
            <div class="cdtx-infr-icon"><i class="{{ $item['icon'] }}"></i></div>
            <div class="cdtx-infr-captions">
                <h5>{{ $item['title'] }}</h5>
                <p>{{ $item['name'] }}</p>
            </div>
        </div>
    </div>
@endforeach