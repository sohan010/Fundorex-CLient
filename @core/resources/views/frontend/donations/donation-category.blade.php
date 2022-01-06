@extends('frontend.frontend-page-master')
@section('site-title')
    {{get_static_option('donation_page_name')}}
@endsection
@section('page-title')
    {{get_static_option('donation_page_name')}}
@endsection
@section('page-meta-data')
    <meta name="description" content="{{get_static_option('donation_page_meta_description')}}">
    <meta name="tags" content="{{get_static_option('donation_page_meta_tags')}}">
@endsection
@section('content')


    <div class="row pl-25 pr-15">
       <div class="col-md-12">
           <a class="btn btn-info mt-3" href="{{url('/')}}">{{__('Go Home')}}</a>
       </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 mx-auto CampaignMendesak pt-4">
            <div class="scrolling-wrapper row mt-4 pb-4 pt-2 contentResponsive">


                @if(count($all_donations_categories) < 1)
                    <div class="col-lg-12">
                        <div class="alert alert-warning d-block">{{__('No Causes Associated with this Category')}}</div>
                    </div>
                @else
                @foreach($all_donations_categories as $data)
                    <div class="col-xl-4 col-lg-4 col-md-4 col-6 float-start p-3px">
                        <div class="card">
                            {!! render_image_markup_by_attachment_id($data->image) !!}
                            <div class="card-custom-content">
                            <a href="{{route('frontend.donations.single',$data->slug)}}" class="main-title"><span class="judulCampaignMendesak">{{$data->title ?? __('No Title')}}</span></a>

                            <div class="progress-content">


                                <div class="progress-item">
                                    <div class="single-progressbar">
                                        <div class="donation-progress" data-percentage="{{get_percentage($data->amount,$data->raised)}}"></div>
                                    </div>
                                </div>

                                <div class="goal">
                                    <h4 class="raised">{{__('Raised')}}: {{amount_with_currency_symbol($data->raised ?? 0 )}}</h4>
                                    <h4 class="raised">{{__('Goal')}}: {{amount_with_currency_symbol($data->amount)}}</h4>
                                </div>
                            </div>

                        </div>
                    </div>
                    </div>
                @endforeach

            @endif
            </div>
        </div>
    </div>


@endsection
