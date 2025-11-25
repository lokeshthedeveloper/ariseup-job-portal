@php
$needs = [
    [
        'number' => '01.',
        'title' => 'Create An Account',
        'desc' => "Post A Job To Tell Us About Your Project. We'll Quickly Match You With The Right Freelancers Find Place Best. Nor again is there anyone who loves.",
    ],
    [
        'number' => '02.',
        'title' => 'Search Jobs',
        'desc' => "Post A Job To Tell Us About Your Project. We'll Quickly Match You With The Right Freelancers Find Place Best. Nor again is there anyone who loves.",
    ],
    [
        'number' => '03.',
        'title' => 'Save & Apply Jobs',
        'desc' => "Post A Job To Tell Us About Your Project. We'll Quickly Match You With The Right Freelancers Find Place Best. Nor again is there anyone who loves.",
    ]
];
@endphp

@foreach ($needs as $item)
    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
        <div class="jobstock-posted-box-y78 colored">
            <div class="jobstock-posted-body-y78">
                <div class="serv-ctr-title"><h2 class="text-green">{{ $item['number'] }}</h2></div>
                <div class="serv-ctr-subtitle"><h5 class="text-light">{{ $item['title'] }}</h5></div>
                <div class="serv-ctr-decs"><p class="text-light opacity-75">{{ $item['desc'] }}</p></div>
            </div>
        </div>
    </div>
@endforeach