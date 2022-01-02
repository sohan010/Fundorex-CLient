@extends('backend.admin-master')
@section('style')
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-tagsinput.css')}}">
@endsection
@section('site-title')
    {{__('SEO Settings')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                @include('backend.partials.message')
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__("SEO Settings")}}</h4>
                        <form action="{{route('admin.general.seo.settings')}}" method="POST" enctype="multipart/form-data">
                            @csrf


                            <div class="form-group">
                                <label for="site_meta_tags">{{__('Site Meta Tags')}}</label>
                                <input type="text" name="site_meta_tags"  class="form-control" data-role="tagsinput" value="{{get_static_option('site_meta_tags')}}" id="site_meta_tags">
                            </div>
                            <div class="form-group">
                                <label for="site_meta_description">{{__('Site Meta Description')}}</label>
                                <textarea name="site_meta_description"  class="form-control" id="site_meta_description">{{get_static_option('site_meta_description')}}</textarea>
                            </div>


                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Changes')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('assets/backend/js/bootstrap-tagsinput.js')}}"></script>
@endsection
