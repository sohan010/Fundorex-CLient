@extends('frontend.frontend-page-master')
@section('site-title')
   {{__('All Donor Information')}}
@endsection
@section('page-title')
   {{__('All Donor Information')}}
@endsection
@section('page-meta-data')
    <meta name="description" content="{{get_static_option('donation_page_meta_description')}}">
    <meta name="tags" content="{{get_static_option('donation_page_meta_tags')}}">
@endsection
@section('content')


    <div class="contatiner">
        <!-- detail -->
        <div class="row mb-100 pt-4 pl-25 pr-25">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 mx-auto">
                <div class="col">
                    <a href="{{url('/')}}" class="detailBackDonatur">
                        <i class="bi bi-arrow-left-short arrow-left-short-icon"></i>
                    </a>
                </div>
                <div class="col text-center textDonatur mb-50">
                    Donatur
                </div>

                <div id="Donatur">
                    @if(count($all_donors) < 1)
                        <div class="col-lg-12">
                            <div class="alert alert-warning d-block">{{__('No Donor Found')}}</div>
                        </div>
                    @else
                        @foreach($all_donors as $donor)
                            <div class="col-md-12">
                                <img src="{{asset('assets/frontend/img/donatur1.png')}}" class="img-circle float-start" alt="Donasi - Donatur">
                                <span class="float-start">{{$donor->name}}</span>
                                <span class="float-end">{{ amount_with_currency_symbol($donor->amount) }}</span>
                                <p class="testimoniDonatur">{{ optional($donor->cause)->title }}
                                    <br>{{$donor->created_at->diffForHUmans()}}</p>
                                  <hr>
                                @endforeach
                            @endif
                        </div>
                            <div class="col md-12 my-5">
                                {{$all_donors->links()}}
                            </div>
                </div>

            </div>
        </div>
        <!-- /detail -->


    </div>







@endsection
