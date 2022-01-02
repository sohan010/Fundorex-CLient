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
    <section class="donation-content-area padding-top-120 padding-bottom-90">
        <div class="container">
            <div class="row">
                @forelse($all_donation as $data)
                    <div class="col-lg-4">
                        <x-frontend.donation.grid
                                :featured="$data->featured"
                                :image="$data->image"
                                :amount="$data->amount"
                                :raised="$data->raised"
                                :slug="$data->slug"
                                :title="$data->title"
                                :excerpt="$data->excerpt"
                                :buttontext="get_static_option('donation_button_text')">
                        </x-frontend.donation.grid>
                    </div>
                @empty
                    <div class="col-lg-12">
                        <div class="alert alert-warning d-block">{{__('No Causes Associated with this Category')}}</div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
