@extends('backend.admin-master')
@section('site-title')
    {{__('Menu Settings')}}
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
                        <h4 class="header-title">{{__('Menu Settings')}}</h4>
                        <form action="{{route('admin.general.menu.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="menu_home">{{__('Home')}}</label>
                                <input type="text" name="menu_home" value="{{get_static_option('menu_home')}}" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="menu_recent_donation">{{__('Recent donation')}}</label>
                                <input type="text" name="menu_recent_donation" value="{{get_static_option('menu_recent_donation')}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="menu_my_donation">{{__('My Donation')}}</label>
                                <input type="text" name="menu_my_donation" value="{{get_static_option('menu_my_donation')}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="menu_profile">{{__('Profile')}}</label>
                                <input type="text" name="menu_profile" value="{{get_static_option('menu_profile')}}" class="form-control" >
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

