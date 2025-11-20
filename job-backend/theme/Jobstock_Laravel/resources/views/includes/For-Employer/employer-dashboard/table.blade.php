@php
$tables = [
    [
        'number' => '01',
        'id' => '1274',
        'name' => 'Basic',
        'type' => 'Job Package',
        'featured' => 'Yes',
        'urgent' => 'Yes',
        'posted' => '04',
        'limit' => '20',
        'duration' => '30',
        'title' => 'Active',
        'class' => 'success',
    ],
    [
        'number' => '02',
        'id' => '1285',
        'name' => 'Standard',
        'type' => 'Job Package',
        'featured' => 'Yes',
        'urgent' => 'Yes',
        'posted' => '02',
        'limit' => '25',
        'duration' => '40',
        'title' => 'Expired',
        'class' => 'danger',
    ],
    [
        'number' => '03',
        'id' => '1274',
        'name' => 'Platinum',
        'type' => 'Job Package',
        'featured' => 'Yes',
        'urgent' => 'Yes',
        'posted' => '10',
        'limit' => '40',
        'duration' => '75',
        'title' => 'Active',
        'class' => 'success',
    ],
    [
        'number' => '04',
        'id' => '6254',
        'name' => 'Standard',
        'type' => 'Job Package',
        'featured' => 'Yes',
        'urgent' => 'Yes',
        'posted' => '07',
        'limit' => '10',
        'duration' => '15',
        'title' => 'Active',
        'class' => 'success',
    ],
    [
        'number' => '05',
        'id' => '3256',
        'name' => 'Basic',
        'type' => 'Job Package',
        'featured' => 'Yes',
        'urgent' => 'Yes',
        'posted' => '04',
        'limit' => '20',
        'duration' => '30',
        'title' => 'Expired',
        'class' => 'danger',
    ],
    [
        'number' => '06',
        'id' => '4215',
        'name' => 'Basic',
        'type' => 'Job Package',
        'featured' => 'Yes',
        'urgent' => 'Yes',
        'posted' => '04',
        'limit' => '20',
        'duration' => '30',
        'title' => 'Active',
        'class' => 'success',
    ],
    [
        'number' => '01',
        'id' => '6254',
        'name' => 'Platinum',
        'type' => 'Job Package',
        'featured' => 'Yes',
        'urgent' => 'Yes',
        'posted' => '04',
        'limit' => '20',
        'duration' => '30',
        'title' => 'Active',
        'class' => 'success',
    ]
];
@endphp

@foreach ($tables as $item)
    <tr>
        <td>{{ $item['number'] }}</td>
        <td>{{ $item['id'] }}</td>
        <td>{{ $item['name'] }}</td>
        <td>{{ $item['type'] }}</td>
        <td>
            <div class="package-descr">
                <p class="text-sm-muted mb-1">Featured: {{ $item['featured'] }}</p>
                <p class="text-sm-muted mb-1">Urgent: {{ $item['urgent'] }}</p>
                <p class="text-sm-muted mb-1">Posted:{{ $item['posted'] }}</p>
                <p class="text-sm-muted mb-1">Post Limit: {{ $item['limit'] }}</p>
                <p class="text-sm-muted mb-1">Post Duration: {{ $item['duration'] }}</p>
            </div>
        </td>
        <td><span class="label text-light bg-{{ $item['class'] }}">{{ $item['title'] }}</span></td>
    </tr>
@endforeach