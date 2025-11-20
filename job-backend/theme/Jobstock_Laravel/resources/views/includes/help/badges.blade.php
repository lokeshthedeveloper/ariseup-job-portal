@php
$badges = [
    [
        'class' => 'bg-main',
        'title' => 'Main',
    ],
    [
        'class' => 'text-bg-secondary',
        'title' => 'Secondary',
    ],
    [
        'class' => 'text-bg-success',
        'title' => 'Success',
    ],
    [
        'class' => 'text-bg-danger',
        'title' => 'Danger',
    ],
    [
        'class' => 'text-bg-warning',
        'title' => 'Warning',
    ],
    [
        'class' => 'text-bg-info',
        'title' => 'Info',
    ],
    [
        'class' => 'text-bg-light',
        'title' => 'Light',
    ],
    [
        'class' => 'text-bg-dark',
        'title' => 'Dark',
    ],
    [
        'class' => 'badge-md bg-main',
        'title' => 'Main',
    ],
    [
        'class' => 'badge-md text-bg-secondary',
        'title' => 'Secondary',
    ],
    [
        'class' => 'badge-md text-bg-success',
        'title' => 'Success',
    ],
    [
        'class' => 'badge-md text-bg-danger',
        'title' => 'Danger',
    ],
    [
        'class' => 'badge-md text-bg-warning',
        'title' => 'Warning',
    ],
    [
        'class' => 'badge-md text-bg-info',
        'title' => 'Info',
    ],
    [
        'class' => 'badge-md text-bg-light',
        'title' => 'Light',
    ],
    [
        'class' => 'badge-md text-bg-dark',
        'title' => 'Dark',
    ]
];
@endphp

@foreach ($badges as $item)
    <span class="badge {{ $item['class'] }}">{{ $item['title'] }}</span>
@endforeach