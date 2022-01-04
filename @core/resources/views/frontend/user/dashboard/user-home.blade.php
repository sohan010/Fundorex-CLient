@extends('frontend.user.dashboard.user-master')
@section('site-title')
{{ __('User Dashboard') }}
@endsection

@section('section')
    <div class="row">


        @if(get_static_option('donations_module_status'))
            <div class="col-lg-6">
                <div class="user-dashboard-card style-01">
                    <div class="icon"><i class="fas fa-donate"></i></div>
                    <div class="content">
                        <h4 class="title">{{__('Total')}} {{get_static_option('donation_page_name')}}</h4>
                        <span class="number">{{$donation}}</span>
                    </div>
                </div>
            </div>
        @endif

        <div class="col-lg-6">
            <div class="user-dashboard-card style-01">
                <div class="icon"><i class="fas fa-calendar-alt"></i></div>
                <div class="content">
                    <h4 class="title">{{__('Total')}} {{ __('Campaigns') }}</h4>
                    <span class="number">{{$campaigns}}</span>
                </div>
            </div>
        </div>


    </div>
@endsection
