@php
$clients = [
    [
        'name' => 'Chad B. Werner',
        'title' => 'Web Designer',
        'desc' => 'The wise man therefore always circumstances and owing to the claims of duty or the obligations holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.',
        'class' => 'show active',
        'id' => 'pills-track-1',
        'labelledby' => 'pills-track-1-tab',
    ],
    [
        'name' => 'Melvin D. Fowler',
        'title' => 'Team Manager',
        'desc' => 'The wise man therefore always circumstances and owing to the claims of duty or the obligations holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.',
        'class' => '',
        'id' => 'pills-track-2',
        'labelledby' => 'pills-track-2-tab',
    ],
    [
        'name' => 'Chad B. Werner',
        'title' => 'Web Designer',
        'desc' => 'The wise man therefore always circumstances and owing to the claims of duty or the obligations holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.',
        'class' => '',
        'id' => 'pills-track-3',
        'labelledby' => 'pills-track-3-tab',
    ],
    [
        'name' => 'Sylvester B. Blevins',
        'title' => 'WordPress Developer',
        'desc' => 'The wise man therefore always circumstances and owing to the claims of duty or the obligations holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.',
        'class' => '',
        'id' => 'pills-track-4',
        'labelledby' => 'pills-track-4-tab',
    ],
    [
        'name' => 'Jacob R. Haynes',
        'title' => 'Sr. PHP Developer',
        'desc' => 'The wise man therefore always circumstances and owing to the claims of duty or the obligations holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.',
        'class' => '',
        'id' => 'pills-track-5',
        'labelledby' => 'pills-track-5-tab',
    ]
];
@endphp

@foreach ($clients as $item)
    <div class="tab-pane fade {{ $item['class'] }}" id="{{ $item['id'] }}" role="tabpanel" aria-labelledby="{{ $item['labelledby'] }}" tabindex="0">
        <div class="text-center">
            <div class="mb-3">
                <p class="m-0 fw-light fs-5">{{ $item['desc'] }}</p>
            </div>
            <div class="position-relative">
                <h5 class="fw-semibold mb-0 lh-base">{{ $item['name'] }}</h5>
                <p class="fw-medium text-main m-0">{{ $item['title'] }}</p>
            </div>
        </div>
    </div>
@endforeach