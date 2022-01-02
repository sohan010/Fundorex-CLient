@extends('backend.admin-master')
@section('site-title')
    {{__('Dashboard')}}
@endsection

@section('content')
@php
    $statistics = [
        ['title' => 'Total Admin','value' => $total_admin, 'icon' => 'user'],
        ['title' => 'Total User','value' => $total_user, 'icon' => 'user'],
        ['title' => 'Total Blogs','value' => $all_blogs, 'icon' => 'write'],
        ['title' => 'Total Testimonial','value' => $total_testimonial, 'icon' => 'control-forward'],
        ['title' => 'Total Team Member','value' => $total_team_member, 'icon' => 'control-forward'],
        ['title' => 'Total Counterup','value' => $total_counterup, 'icon' => 'control-forward'],
        ['title' => 'Total Jobs','value' => $total_jobs, 'icon' => 'package'],
        ['title' => 'Total Events','value' => $total_events, 'icon' => 'timer'],
        ['title' => 'Total Causes','value' => $total_causes, 'icon' => 'agenda'],
        ['title' => 'Total Causes Logs','value' => $total_cause_logs, 'icon' => 'medall'],
        ['title' => 'Total Event Attendence','value' => $total_event_attendance, 'icon' => 'hand-open'],
        ['title' => 'Total Campaign Withdraws','value' => $campaign_withdraw, 'icon' => 'package'],
    ];
@endphp

    <div class="main-content-inner">
        <div class="row">
            <!-- seo fact area start -->
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="chart-wrapper margin-top-40">
                            <h2 class="chart-title">{{__("Raised Per Month In")}} {{date('Y')}}</h2>
                            <canvas id="monthlyRaised"></canvas>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="chart-wrapper margin-top-40">
                            <h2 class="chart-title">{{__("Raised Per Day In Last 30Days")}}</h2>
                           <div>
                               <canvas id="monthlyRaisedPerDay"></canvas>
                           </div>
                        </div>
                    </div>
                    @foreach ($statistics as $data)
                    <div class="col-md-4 mt-5 mb-3">
                        <div class="card card-hover">
                            <div class="dash-box text-white">
                                <h1 class="dash-icon">
                                    <i class="ti-{{ $data['icon'] }} mb-1 font-16"></i>
                                </h1>
                                <div class="dash-content">
                                    <h5 class="mb-0 mt-1">{{ $data['value'] }}</h5>
                                    <small class="font-light">{{ __($data['title']) }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">

          <div class="col-lg-6">
            <div class="card margin-top-40">
                <div class="smart-card">
                    <h4 class="title">{{__('Recent Donation Logs')}}</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <th>{{__('Donation ID')}}</th>
                            <th>{{__('Amount')}}</th>
                            <th>{{__('Payment Gateway')}}</th>
                            <th>{{__('Payment Status')}}</th>
                            <th>{{__('Date')}}</th>
                            </thead>
                            <tbody>
                            @foreach($causes_recent as $data)
                                <tr>
                                    <td>#{{$data->id}}</td>
                                    <td>{{amount_with_currency_symbol($data->amount)}}</td>
                                    <td>{{str_replace('_',' ',$data->payment_gateway)}}</td>
                                    <td>
                                        @php $pay_status = $data->status; @endphp
                                        @if($pay_status == 'complete')
                                            <span class="alert alert-success">{{$pay_status}}</span>
                                        @elseif($pay_status == 'pending')
                                            <span class="alert alert-warning">{{$pay_status}}</span>
                                        @endif
                                    </td>
                                    <td>{{date_format($data->created_at,'d M Y h:i:s')}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

            <div class="col-lg-6">
                <div class="card margin-top-40">
                    <div class="smart-card">
                        <h4 class="title">{{__('Recent Event Attendance Order')}}</h4>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <th>{{__('Attendance ID')}}</th>
                                <th>{{__('Event Name')}}</th>
                                <th>{{__('Payment Status')}}</th>
                                <th>{{__('Date')}}</th>
                                </thead>
                                <tbody>
                                @foreach($event_attendance_recent_order as $data)
                                    <tr>
                                        <td>#{{$data->id}}</td>
                                        <td>{{$data->event_name}}</td>

                                        <td>
                                            @php $pay_status = $data->payment_status; @endphp
                                            @if($pay_status == 'complete')
                                                <span class="alert alert-success">{{$pay_status}}</span>
                                            @elseif($pay_status == 'pending')
                                                <span class="alert alert-warning">{{$pay_status}}</span>
                                            @endif
                                        </td>
                                        <td>{{date_format($data->created_at,'d M Y h:i:s')}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('assets/backend/js/chart.js')}}"></script>
    <script>
        $.ajax({
            url: '{{route('admin.home.chat.data')}}',
            type: 'POST',
            async: false,
            data: {
                _token : "{{csrf_token()}}"
            },
            success: function (data) {
                 labels = data.labels;
                 chartdata = data.data;
                 new Chart(
                    document.getElementById('monthlyRaised'),
                    {
                        type: 'bar',
                        data: {
                            labels: data.labels,
                            datasets: [{
                                label: '{{__('Amount Raised')}}',
                                backgroundColor: '#fcb11a',
                                borderColor: '#f5cb62',
                                data: data.data,
                            }]
                        }
                    }
                );
            }
        });
        $.ajax({
            url: '{{route('admin.home.chat.data.by.day')}}',
            type: 'POST',
            async: false,
            data: {
                _token : "{{csrf_token()}}"
            },
            success: function (data) {
                labels = data.labels;
                chartdata = data.data;
                new Chart(
                    document.getElementById('monthlyRaisedPerDay'),
                    {
                        type: 'line',
                        data: {
                            labels: data.labels,
                            datasets: [{
                                label: '{{__('Amount Raised')}}',
                                backgroundColor: '#15771f',
                                borderColor: '#acefd3',
                                data: data.data,
                            }]
                        }
                    }
                );
            }
        });
    </script>
@endsection
