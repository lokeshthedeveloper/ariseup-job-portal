@php
$categories = [
    [
        'icon' => 'fa-solid fa-file-invoice',
        'title' => 'Accounting & Finance',
        'jobs' => '122 Active Jobs',
    ],
    [
        'icon' => 'fa-solid fa-caravan',
        'title' => 'Automotive Jobs',
        'jobs' => '78 Active Jobs',
    ],
    [
        'icon' => 'fa-solid fa-person-chalkboard',
        'title' => 'Business & Tech',
        'jobs' => '25 Active Jobs',
    ],
    [
        'icon' => 'fa-solid fa-user-graduate',
        'title' => 'Education Training',
        'jobs' => '212 Active Jobs',
    ],
    [
        'icon' => 'fa-solid fa-briefcase-medical',
        'title' => 'Healthcare',
        'jobs' => '90 Active Jobs',
    ],
    [
        'icon' => 'fa-solid fa-burger',
        'title' => 'Restaurant & Food',
        'jobs' => '65 Active Jobs',
    ],
    [
        'icon' => 'fa-solid fa-jet-fighter',
        'title' => 'Transportation',
        'jobs' => '160 Active Jobs',
    ],
    [
        'icon' => 'fa-solid fa-mobile-screen-button',
        'title' => 'Telecommunications',
        'jobs' => '80 Active Jobs',
    ]
];
@endphp

@foreach ($categories as $item)
    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
        <div class="category-box">
            <div class="category-desc">
                <div class="category-icon">
                    <i class="{{ $item['icon'] }} text-main"></i>
                    <i class="{{ $item['icon'] }} abs-icon"></i>
                </div>
                <div class="category-detail category-desc-text">
                    <h4 class="fs-5"><a href="">{{ $item['title'] }}</a></h4>
                    <p class="block">{{ $item['jobs'] }}</p>
                </div>
            </div>
        </div>
    </div>
@endforeach