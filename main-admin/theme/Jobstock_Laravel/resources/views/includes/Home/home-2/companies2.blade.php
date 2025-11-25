@php
$companies = [
    [
        'img' => 'assets/img/brand/layar-white.svg', 
    ],
    [
        'img' => 'assets/img/brand/mailchimp-white.svg', 
    ],
    [
        'img' => 'assets/img/brand/forbes-white.svg', 
    ],
    [
        'img' => 'assets/img/brand/fitbit-white.svg', 
    ],
    [
        'img' => 'assets/img/brand/vidados-white.svg', 
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