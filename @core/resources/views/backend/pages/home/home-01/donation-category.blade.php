@extends('backend.admin-master')
@section('site-title')
    {{__('Donation Category Area')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                @include('backend/partials/message')
                @include('backend/partials/error')
            </div>
            <div class="col-lg-12 mt-t">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__('Donation Category Area Settings')}}</h4>
                        <form action="{{route('admin.homeone.donation.category.area')}}" method="post" enctype="multipart/form-data">
                            @csrf


                            <div class="form-group">
                                <label for="home_page_01_donation_category_subtitle">{{__('Subtitle')}}</label>
                                <input type="text" name="home_page_01_donation_category_subtitle" value="{{get_static_option('home_page_01_donation_category_subtitle')}}" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="home_page_01_donation_category_title">{{__('Title')}}</label>
                                <input type="text" name="home_page_01_donation_category_title" value="{{get_static_option('home_page_01_donation_category_title')}}" class="form-control" >
                                <div class="info-text">{{__('user {color} color text {/color} to make text colorful')}}</div>
                            </div>

                            <button id="update" type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Settings')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    <x-btn.update/>
</script>
@endsection

