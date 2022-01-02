@extends('backend.admin-master')
@section('style')
    <link rel="stylesheet" href="{{asset('assets/backend/css/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/media-uploader.css')}}">
@endsection
@section('site-title')
    {{__('Team Member Section')}}
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
                        <h4 class="header-title">{{__('Team Member Section Settings')}}</h4>

                        <form action="{{route('admin.about.team.member')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="about_page_team_member_section_subtitle">{{__('Subtitle')}}</label>
                                <input type="text" name="about_page_team_member_section_subtitle" value="{{get_static_option('about_page_team_member_section_subtitle')}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="about_page_team_member_section_title">{{__('Title')}}</label>
                                <input type="text" name="about_page_team_member_section_title" value="{{get_static_option('about_page_team_member_section_title')}}" class="form-control">
                                <x-title-info-text/>
                            </div>

                            <div class="form-group">
                                <label for="about_page_team_member_item">{{__('Team Member Item')}}</label>
                                <input type="text" name="about_page_team_member_item" value="{{get_static_option('about_page_team_member_item')}}" class="form-control" id="about_page_team_member_item">
                            </div>
                            <button id="update" type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Settings')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('backend.partials.media-upload.media-upload-markup')
@endsection

@section('script')
    <script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
    @include('backend.partials.media-upload.media-js')

    <script>
        <x-btn.update/>
    </script>
@endsection
