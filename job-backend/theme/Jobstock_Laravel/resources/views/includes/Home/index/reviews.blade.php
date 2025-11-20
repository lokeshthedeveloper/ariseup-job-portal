@php
$reviews = [
    [
        'img' => 'assets/img/team-1.jpg',
        'name' => 'Lucia E. Nugent',
        'tag' => 'CEO of Climber',
        'title' => '"The best useful website"',
        'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.',
    ],
    [
        'img' => 'assets/img/team-2.jpg',
        'name' => 'Brenda R. Smith',
        'tag' => 'Founder of Yeloower',
        'title' => '"Ranking is the #1"',
        'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.',
    ],
    [
        'img' => 'assets/img/team-3.jpg',
        'name' => 'Brian B. Wilkerson',
        'tag' => 'CEO of Mark Soft',
        'title' => '"The website is eco friendly"',
        'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.',
    ],
    [
        'img' => 'assets/img/team-4.jpg',
        'name' => 'Miguel L. Benbow',
        'tag' => 'Founder of Mitche LTD',
        'title' => '"100% save and secure website"',
        'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.',
    ],
    [
        'img' => 'assets/img/team-5.jpg',
        'name' => 'Hilda A. Sheppard',
        'tag' => 'CEO of Doodle',
        'title' => '"Very developer friendly website"',
        'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.',
    ]
];
@endphp

@foreach ($reviews as $item)
    <div class="col-xl-4 col-lg-4 col-md-6">
        <div class="jobstock-reviews-box">
            <div class="jobstock-reviews-desc">
                <h6 class="review-title-yui">{{ $item['title'] }}</h6>
                <p>{{ $item['desc'] }}</p>
            </div>
            <div class="jobstock-reviews-flex">
                <div class="jobstock-reviews-thumb">
                    <div class="jobstock-reviews-figure"><img src="{{ asset($item['img']) }}" class="img-fluid circle" alt=""></div>
                </div>
                <div class="jobstock-reviews-caption">
                    <div class="jobstock-reviews-title"><h4>{{ $item['name'] }}</h4></div>
                    <div class="jobstock-reviews-designation"><span>{{ $item['tag'] }}</span></div>
                    <div class="jobstock-reviews-rates">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star deactive"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach