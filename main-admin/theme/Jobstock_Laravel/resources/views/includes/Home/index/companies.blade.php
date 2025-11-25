@php
$companies = [
    [
        'img' => 'assets/img/brand/layar-primary.svg', 
    ],
    [
        'img' => 'assets/img/brand/mailchimp-primary.svg', 
    ],
    [
        'img' => 'assets/img/brand/fitbit-primary.svg', 
    ],
    [
        'img' => 'assets/img/brand/capsule-primary.svg', 
    ],
    [
        'img' => 'assets/img/brand/vidados-primary.svg', 
    ]
];
@endphp

@foreach ($companies as $item)
    <div class="col">
        <figure class="single-brand thumb-figure">
            <img src="{{ asset($item['img']) }}" class="img-fluid" alt="">
        </figure>
    </div>
@endforeach