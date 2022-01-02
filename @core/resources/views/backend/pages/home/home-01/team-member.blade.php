@extends('backend.admin-master')
@section('site-title')
    {{__('Team Member Area')}}
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
                        <h4 class="header-title">{{__('Team Member Area Settings')}}</h4>
                        <form action="{{route('admin.homeone.team.member')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="home_page_01_team_member_section_subtitle">{{__('Subtitle')}}</label>
                                <input type="text" name="home_page_01_team_member_section_subtitle" class="form-control" value="{{get_static_option('home_page_01_team_member_section_subtitle')}}">
                            </div>
                            <div class="form-group">
                                <label for="home_page_01_team_member_section_title">{{__('Title')}}</label>
                                <input type="text" name="home_page_01_team_member_section_title" class="form-control" value="{{get_static_option('home_page_01_team_member_section_title')}}" >
                                <div class="info-text">{{__('user {color} color text {/color} to make text colorful')}}</div>
                            </div>

                            <div class="form-group">
                                <label for="home_page_01_team_member_items">{{__('Items')}}</label>
                                <input type="number" min="1" name="home_page_01_team_member_items" id="home_page_01_team_member_items" class="form-control"  value="{{get_static_option('home_page_01_team_member_items')}}">
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

