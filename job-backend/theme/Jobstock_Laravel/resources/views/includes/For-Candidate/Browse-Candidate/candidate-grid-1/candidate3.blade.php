@php
$candidates = [
    [
        'id' => 1,
        'img' => 'assets/img/team-1.jpg', 
        'title' => 'Kr. Shaurya Preet',
        'subtitle' => 'Sr. Web Designer',
        'number' => '70/H',
        'years' => '5 Years exp.',
        'btn' => 'Message',
        'btn1' => 'View Detail',
    ],
    [
        'id' => 2,
        'img' => 'assets/img/team-2.jpg', 
        'title' => 'Leila T. Lindsey',
        'subtitle' => 'Magento Expert',
        'number' => '70/H',
        'years' => '5 Years exp.',
        'btn' => 'Message',
        'btn1' => 'View Detail',
    ],
    [
        'id' => 3,
        'img' => 'assets/img/team-3.jpg', 
        'title' => 'Amie L. Brown',
        'subtitle' => 'WordPress Developer',
        'number' => '70/H',
        'years' => '5 Years exp.',
        'btn' => 'Message',
        'btn1' => 'View Detail',
    ],
    [
        'id' => 4,
        'img' => 'assets/img/team-4.jpg', 
        'title' => 'Darrel T. Turner',
        'subtitle' => 'Jr. SEO Expert',
        'number' => '70/H',
        'years' => '5 Years exp.',
        'btn' => 'Message',
        'btn1' => 'View Detail',
    ],
    [
        'id' => 5,
        'img' => 'assets/img/team-5.jpg', 
        'title' => 'Michael B. Arellano',
        'subtitle' => 'Front Designer',
        'number' => '70/H',
        'years' => '5 Years exp.',
        'btn' => 'Message',
        'btn1' => 'View Detail',
    ],
    [
        'id' => 6,
        'img' => 'assets/img/team-6.jpg', 
        'title' => 'Kum K. Sellers',
        'subtitle' => 'PHP Developer',
        'number' => '70/H',
        'years' => '5 Years exp.',
        'btn' => 'Message',
        'btn1' => 'View Detail',
    ],
    [
        'id' => 7,
        'img' => 'assets/img/team-7.jpg', 
        'title' => 'Debbie W. Wilson',
        'subtitle' => 'App Developer',
        'number' => '70/H',
        'years' => '5 Years exp.',
        'btn' => 'Message',
        'btn1' => 'View Detail',
    ],
    [
        'id' => 8,
        'img' => 'assets/img/team-8.jpg', 
        'title' => 'Peggy J. Arnold',
        'subtitle' => 'Content Writer',
        'number' => '70/H',
        'years' => '5 Years exp.',
        'btn' => 'Message',
        'btn1' => 'View Detail',
    ],
    [
        'id' => 9,
        'img' => 'assets/img/team-9.jpg', 
        'title' => 'Wanda D. Smith',
        'subtitle' => 'Sr. PHP Developer',
        'number' => '40/H',
        'years' => '2 Years exp.',
        'btn' => 'Message',
        'btn1' => 'View Detail',
    ],
    [
        'id' => 9,
        'img' => 'assets/img/team-9.jpg', 
        'title' => 'Wanda D. Smith',
        'subtitle' => 'Sr. PHP Developer',
        'number' => '40/H',
        'years' => '2 Years exp.',
        'btn' => 'Message',
        'btn1' => 'View Detail',
    ],
    [
        'id' => 10,
        'img' => 'assets/img/team-10.jpg', 
        'title' => 'Elaine W. Cook',
        'subtitle' => 'Sr. Team Leader',
        'number' => '65/H',
        'years' => '7 Years exp.',
        'btn' => 'Message',
        'btn1' => 'View Detail',
    ],
    [
        'id' => 11,
        'img' => 'assets/img/team-11.jpg', 
        'title' => 'Raymond H. Cato',
        'subtitle' => 'UI/UX Designer',
        'number' => '50/H',
        'years' => '4 Years exp.',
        'btn' => 'Message',
        'btn1' => 'View Detail',
    ]
];
@endphp

@foreach ($candidates as $item)
    <div class="col-xl-4 col-lg-6 col-md-6 col-12">
        <div class="jbs-grid-usrs-block border">
            <div class="jbs-grid-usrs-thumb">
                <div class="jbs-grid-yuo jbs-verified">
                    <a href="{{ route('candidate-detail', ['title' => Str::slug($item['title'])]) }}"><figure><img src="{{ asset($item['img']) }}" class="img-fluid circle" alt=""></figure></a>
                </div>
            </div>
            <div class="jbs-grid-usrs-caption">
                <div class="jbs-kioyer">
                    <div class="jbs-kioyer-groups">
                        <span class="fa-solid fa-star active"></span>
                        <span class="fa-solid fa-star active"></span>
                        <span class="fa-solid fa-star active"></span>
                        <span class="fa-solid fa-star active"></span>
                        <span class="fa-solid fa-star"></span>
                        <span class="aal-reveis">4.6</span>
                    </div>
                </div>
                <div class="jbs-tiosk">
                    <h4 class="jbs-tiosk-title"><a href="{{ route('candidate-detail', ['title' => Str::slug($item['title'])]) }}">{{ $item['title'] }}</a></h4>
                    <div class="jbs-tiosk-subtitle"><span>{{ $item['subtitle'] }}</span></div>
                </div>
            </div>
            <div class="jbs-grid-usrs-info">
                <div class="jbs-info-ico-style bold">
                    <div class="jbs-single-y1 style-2"><span><i class="fa-solid fa-sack-dollar"></i></span>{{ $item['number'] }}</div>
                    <div class="jbs-single-y1 style-3"><span><i class="fa-solid fa-coins"></i></span>{{ $item['years'] }}</div>
                </div>
            </div>
            <div class="jbs-grid-usrs-contact">
                <div class="jbs-btn-groups">
                    <a href="#" class="btn btn-md btn-gray px-4">{{ $item['btn'] }}</a>
                    <a href="{{ route('candidate-detail', ['title' => Str::slug($item['title'])]) }}" class="btn btn-md btn-main px-4">{{ $item['btn1'] }}</a>
                </div>
            </div>
        </div>
    </div>
@endforeach