@php
$categories = [
    [
        'icon' => 'fa-solid fa-file-invoice',
        'title' => 'Accounting & Finance',
        'desc' => 'You can view all popular jobs according your future careers.',
        'jobs' => '122 Active Jobs',
    ],
    [
        'icon' => 'fa-solid fa-caravan',
        'title' => 'Automotive Jobs',
        'desc' => 'You can view all popular jobs according your future careers.',
        'jobs' => '78 Active Jobs',
    ],
    [
        'icon' => 'fa-solid fa-person-chalkboard',
        'title' => 'Business & Tech',
        'desc' => 'You can view all popular jobs according your future careers.',
        'jobs' => '25 Active Jobs',
    ],
    [
        'icon' => 'fa-solid fa-user-graduate',
        'title' => 'Education Training',
        'desc' => 'You can view all popular jobs according your future careers.',
        'jobs' => '212 Active Jobs',
    ],
    [
        'icon' => 'fa-solid fa-briefcase-medical',
        'title' => 'Healthcare',
        'desc' => 'You can view all popular jobs according your future careers.',
        'jobs' => '90 Active Jobs',
    ],
    [
        'icon' => 'fa-solid fa-burger',
        'title' => 'Restaurant & Food',
        'desc' => 'You can view all popular jobs according your future careers.',
        'jobs' => '65 Active Jobs',
    ],
    [
        'icon' => 'fa-solid fa-jet-fighter',
        'title' => 'Transportation',
        'desc' => 'You can view all popular jobs according your future careers.',
        'jobs' => '160 Active Jobs',
    ],
    [
        'icon' => 'fa-solid fa-mobile-screen-button',
        'title' => 'Telecommunications',
        'desc' => 'You can view all popular jobs according your future careers.',
        'jobs' => '80 Active Jobs',
    ]
];
@endphp

@foreach ($categories as $item)
    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
        <div class="card border py-4 px-4 rounded-4 mb-0">
            <div class="ctrd-icons mb-3">
                <i class="{{ $item['icon'] }} text-main fs-1"></i>
            </div>
            <div class="ctrd-caps">
                <h4 class="fs-5"><a href="">{{ $item['title'] }}</a></h4>
                <p class="mb-3">{{ $item['desc'] }}</p>
                <p class="text-main fw-medium mb-0">{{ $item['jobs'] }}</p>
            </div>
        </div>
    </div>
@endforeach