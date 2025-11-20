@php
$links = [
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

@foreach ($links as $item)
    <div class="alert alert-{{ $item['title'] }}" role="alert">
        A simple {{ $item['title'] }} alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
    </div>
@endforeach