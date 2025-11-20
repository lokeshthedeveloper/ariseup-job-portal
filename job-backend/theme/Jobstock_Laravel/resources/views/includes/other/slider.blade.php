@php
$sliders = [
    [
        'img' => 'assets/img/slide-banner-1.jpg', 
        'title' => 'Real Jobs, Real People, Real Success',
        'desc' => 'The toppings you may chose for that TV dinner pizza slice when you forgot to shop for foods', 
    ],
    [
        'img' => 'assets/img/slide-banner-2.jpg', 
        'title' => 'Discover Jobs. Take Action. Win Big.',
        'desc' => 'The toppings you may chose for that TV dinner pizza slice when you forgot to shop for foods', 
    ],
    [
        'img' => 'assets/img/slide-banner-3.jpg', 
        'title' => 'Find Work. Build Skills. Grow Fast.',
        'desc' => 'The toppings you may chose for that TV dinner pizza slice when you forgot to shop for foods', 
    ],
    [
        'img' => 'assets/img/slide-banner-4.jpg', 
        'title' => 'One Click Closer to Your Next Big Opportunity',
        'desc' => 'The toppings you may chose for that TV dinner pizza slice when you forgot to shop for foods', 
    ]
];
@endphp

@foreach ($sliders as $item)
    <div class="bg-cover" style="background:url({{ asset($item['img']) }})" data-overlay="5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-12">
                    <div class="slider-caption">
                        <h1 class="text-light">{{ $item['title'] }}</h1>
                        <p class="fs-5 text-light">{{ $item['desc'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach