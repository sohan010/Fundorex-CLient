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
            <h6 class="judul">{{ get_static_option('donation_single_urgent_donation_text') }}</h6>
            <h6 class="judulh6">Saudara kita butuh bantuanmu</h6>

            <div class="scrolling-wrapper row mt-4 pb-4 pt-2 contentResponsive">
                @foreach($all_donations as $data)
                    <div class="col-xl-4 col-lg-4 col-md-4 col-6 float-start p-3px">
                        <div class="card">
                            {!! render_image_markup_by_attachment_id($data->image) !!}
                            <div class="card-custom-content">
                            <a href="{{route('frontend.donations.single',$data->slug)}}" class="main-title"><span class="judulCampaignMendesak">{{$data->title ?? __('No Title')}}</span></a>
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
                    </div>
                @endforeach
                    <div class="col-lg-12 text-center my-5">
                        <nav class="pagination-wrapper" aria-label="Page navigation ">
                            {{$all_donations->links()}}
                        </nav>
                    </div>
            </div>
        </div>
    </div>
@endsection
