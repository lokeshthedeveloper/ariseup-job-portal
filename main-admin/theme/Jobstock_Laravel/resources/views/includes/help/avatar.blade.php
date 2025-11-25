@php
$avatars = [
    [
        'class' => 'square--80',
    ],
    [
        'class' => 'square--70',
    ],
    [
        'class' => 'square--50',
    ],
    [
        'class' => 'square--30',
    ],
    [
        'class' => 'square--20',
    ]
];
@endphp

@foreach ($avatars as $item)
    <div class="{{ $item['class'] }} circle"><img src="{{ asset('assets/img/avatar.jpg') }}" class="img-fluid circle" alt=""></div>
@endforeach