@php
$ctrs = [
    [
        'icon' => 'fa-solid fa-business-time', 
        'class' => 'success',
        'title' => 'Applied jobs',
        'number' => '523',
    ],
    [
        'icon' => 'fa-solid fa-bookmark', 
        'class' => 'warning',
        'title' => 'Saved Jobs',
        'number' => '523',
    ],
    [
        'icon' => 'fa-solid fa-eye', 
        'class' => 'danger',
        'title' => 'Viewed Jobs',
        'number' => '523',
    ],
    [
        'icon' => 'fa-sharp fa-solid fa-comments', 
        'class' => 'info',
        'title' => 'Total Review',
        'number' => '523',
    ]
];
@endphp

@foreach ($ctrs as $item)
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="dash-wrap-bloud">
            <div class="dash-wrap-bloud-icon">
                <div class="bloud-icon text-{{ $item['class'] }} bg-{{ $item['class'] }} bg-opacity-05">
                    <i class="{{ $item['icon'] }}"></i>	
                </div>
            </div>
            <div class="dash-wrap-bloud-caption">
                <div class="dash-wrap-bloud-content">
                    <h5 class="ctr">{{ $item['number'] }}</h5>
                    <p>{{ $item['title'] }}</p>
                </div>
            </div>
        </div>
    </div>
@endforeach