@php
$buttons = [
    [
        'class' => 'main',
        'title' => 'Main',
    ],
    [
        'class' => 'secondary',
        'title' => 'Secondary',
    ],
    [
        'class' => 'success',
        'title' => 'Success',
    ],
    [
        'class' => 'danger',
        'title' => 'Danger',
    ],
    [
        'class' => 'warning',
        'title' => 'Warning',
    ],
    [
        'class' => 'info',
        'title' => 'Info',
    ],
    [
        'class' => 'light',
        'title' => 'Light',
    ],
    [
        'class' => 'dark',
        'title' => 'Dark',
    ],
    [
        'class' => 'red',
        'title' => 'Red',
    ],
    [
        'class' => 'green',
        'title' => 'Green',
    ],
    [
        'class' => 'light-main',
        'title' => 'Light Main',
    ],
    [
        'class' => 'light-red',
        'title' => 'Light Red',
    ],
    [
        'class' => 'light-green',
        'title' => 'Light Green',
    ],
    [
        'class' => 'outline-main',
        'title' => 'Outline Main',
    ],
    [
        'class' => 'outline-red',
        'title' => 'Outline Red',
    ],
    [
        'class' => 'outline-green',
        'title' => 'Outline Green',
    ],
    [
        'class' => 'outline-dark',
        'title' => 'Outline Dark',
    ],
    [
        'class' => 'outline-dark rounded-pill',
        'title' => 'Outline Dark Rounded',
    ]
];
@endphp

@foreach ($buttons as $item)
    <button type="button" class="btn btn-{{ $item['class'] }}">{{ $item['title'] }}</button>
@endforeach