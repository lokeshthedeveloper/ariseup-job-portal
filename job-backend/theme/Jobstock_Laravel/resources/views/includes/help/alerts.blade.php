@php
$alerts = [
    [
        'title' => 'main',
    ],
    [
        'title' => 'secondary',
    ],
    [
        'title' => 'success',
    ],
    [
        'title' => 'danger',
    ],
    [
        'title' => 'warning',
    ],
    [
        'title' => 'info',
    ],
    [
        'title' => 'light',
    ],
    [
        'title' => 'dark',
    ]
];
@endphp

@foreach ($alerts as $item)
    <div class="alert alert-{{ $item['title'] }}" role="alert">
        A simple {{ $item['title'] }} alert—check it out!
    </div>
@endforeach