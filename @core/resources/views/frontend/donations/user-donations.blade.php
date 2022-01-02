@extends('frontend.frontend-page-master')
@section('site-title')
    {{$user_info->name}} :{{get_static_option('donation_page_name')}}
@endsection
@section('page-title')
    {{$user_info->name}} :{{get_static_option('donation_page_name')}}
@endsection

@section('content')
    <section class="donation-content-area padding-top-120 padding-bottom-90">
        <div class="container">
            <div class="row">
                @foreach($user_donations as $data)
                    <div class="col-lg-4">
                        <x-frontend.donation.user-donation
                                :featured="$data->featured"
                                :image="$data->image"
                                :amount="$data->amount"
                                :raised="$data->raised"
                                :slug="$data->slug"
                                :id="$data->id"
                                :title="$data->title"
                                :excerpt="$data->excerpt"
                                :buttontext="get_static_option('donation_button_text')">
                        </x-frontend.donation.user-donation>
                    </div>
                @endforeach
                <div class="col-lg-12 text-center">
                   <div class="blog-pagination ">
                       {{$user_donations->links()}}
                   </div>
                </div>
            </div>
        </div>
    </section>
@endsection
