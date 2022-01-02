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
                @foreach($all_donations as $data)
                    <div class="col-lg-4">
                        <x-frontend.donation.grid
                                :featured="$data->featured"
                                :image="$data->image"
                                :amount="$data->amount"
                                :raised="$data->raised"
                                :slug="$data->slug"
                                :title="$data->title"
                                :excerpt="$data->excerpt"
                                :deadline="$data->deadline"
                                :buttontext="get_static_option('donation_button_text')">
                        </x-frontend.donation.grid>
                    </div>
                @endforeach
                <div class="col-lg-12 text-center">
                    <nav class="pagination-wrapper" aria-label="Page navigation ">
                        {{$all_donations->links()}}
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endsection
