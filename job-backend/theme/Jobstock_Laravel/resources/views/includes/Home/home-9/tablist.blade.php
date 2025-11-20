@php
$tablists = [
    [
        'img' => 'assets/img/team-1.jpg',
        'class' => 'active',
        'id' => 'pills-track-1-tab',
        'target' => '#pills-track-1',
        'controls' => 'pills-track-1',
        'selected' => 'true',
    ],
    [
        'img' => 'assets/img/team-2.jpg',
        'class' => '',
        'id' => 'pills-track-2-tab',
        'target' => '#pills-track-2',
        'controls' => 'pills-track-2',
        'selected' => 'false',
    ],
    [
        'img' => 'assets/img/team-3.jpg',
        'class' => '',
        'id' => 'pills-track-3-tab',
        'target' => '#pills-track-3',
        'controls' => 'pills-track-3',
        'selected' => 'false',
    ],
    [
        'img' => 'assets/img/team-5.jpg',
        'class' => '',
        'id' => 'pills-track-4-tab',
        'target' => '#pills-track-4',
        'controls' => 'pills-track-4',
        'selected' => 'false',
    ],
    [
        'img' => 'assets/img/team-6.jpg',
        'class' => '',
        'id' => 'pills-track-5-tab',
        'target' => '#pills-track-5',
        'controls' => 'pills-track-5',
        'selected' => 'false',
    ]
];
@endphp

@foreach ($tablists as $item)
    <li class="nav-item p-2" role="presentation">
        <a class="m-0 {{ $item['class'] }}" href="#" id="{{ $item['id'] }}" data-bs-toggle="pill" data-bs-target="{{ $item['target'] }}" type="button" role="tab" aria-controls="{{ $item['controls'] }}" aria-selected="{{ $item['selected'] }}"><div class="p-2 border border-3 circle licroobr"><img src="{{ asset($item['img']) }}" class="img-fluid circle" width="80" alt=""></div></a>
    </li>
@endforeach