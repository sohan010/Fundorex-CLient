@extends('frontend.frontend-page-master')
@section('site-title')
    {{get_static_option('donor_page_name')}}
@endsection
@section('page-title')
    {{get_static_option('donor_page_name')}}
@endsection
@section('page-meta-data')
    <meta name="description" content="{{get_static_option('donor_page_meta_description')}}">
    <meta name="tags" content="{{get_static_option('donor_page_meta_tags')}}">
@endsection
@section('content')
    <section class="donor-list padding-bottom-90 padding-top-120">
        <div class="container">
            <div class="row">
                @foreach($all_donation_log as $data)
                <div class="col-lg-3 col-md-6">
                    <div class="single-donor-info">
                        <div class="icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <div class="content">
                            <h4 class="title">
                                @if($data->anonymous == 1)
                                    {{__('anonymous')}}
                                 @else
                                {{$data->name}}
                                @endif
                            </h4>
                            <span class="amount">{{__("Donate:")}} {{amount_with_currency_symbol($data->amount)}}</span>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-lg-12">
                    <div class="pagination-wrapper">
                        {!! $all_donation_log->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
