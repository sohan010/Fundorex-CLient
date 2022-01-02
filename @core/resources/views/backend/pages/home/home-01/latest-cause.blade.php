@extends('backend.admin-master')
@section('site-title')
    {{__('Latest Cause Area')}}
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
                        <h4 class="header-title">{{__('Latest Cause Area Settings')}}</h4>
                        <form action="{{route('admin.homeone.latest.cause.area')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="tab-content margin-top-30" id="myTabContent">

                                    <div class="tab-pane fade show active " id="home" role="tabpanel" >
                                        <div class="form-group">
                                            <label for="home_page_01_latest_cause_subtitle">{{__('Subtitle')}}</label>
                                            <input type="text" name="home_page_01_latest_cause_subtitle" value="{{get_static_option('home_page_01_latest_cause_subtitle')}}" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label for="home_page_01_latest_cause_title">{{__('Title')}}</label>
                                            <input type="text" name="home_page_01_latest_cause_title" value="{{get_static_option('home_page_01_latest_cause_title')}}" class="form-control" >
                                            <div class="info-text">{{__('user {color} color text {/color} to make text colorful')}}</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="home_page_01_latest_cause_button_text">{{__('Donate Button Text')}}</label>
                                            <input type="text" name="home_page_01_latest_cause_button_text" value="{{get_static_option('home_page_01_latest_cause_button_text')}}" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label for="home_page_01_latest_cause_readmore">{{__('Read More Text')}}</label>
                                            <input type="text" name="home_page_01_latest_cause_readmore" value="{{get_static_option('home_page_01_latest_cause_readmore')}}" class="form-control" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="home_page_01_latest_cause_items">{{__('Items')}}</label>
                                        <input type="number" name="home_page_01_latest_cause_items" value="{{get_static_option('home_page_01_latest_cause_items')}}" class="form-control" >
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

