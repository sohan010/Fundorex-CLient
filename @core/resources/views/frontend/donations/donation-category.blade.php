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
                            <a href="{{route('frontend.donations.single',$data->slug)}}"><span class="judulCampaignMendesak">{{$data->title ?? __('No Title')}}</span></a>
                            <p>Terkumpul</p>
                            <div class="progress-content">
                            <span class="padding-progressbar">
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </span>

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

                            <div class="footer-CampaignMendesak"><span class="text-start">1000 donatur</span><span class="text-end">10 hari lagi</span></div>
                        </div>
                    </div>
                @endforeach

            @endif
            </div>
        </div>
    </div>


@endsection
