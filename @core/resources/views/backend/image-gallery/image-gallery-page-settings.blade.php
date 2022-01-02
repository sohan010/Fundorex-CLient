@extends('backend.admin-master')
@section('site-title')
    {{__('Image Gallery Page Settings')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                @include('backend.partials.message')
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__("Image Gallery Page Settings")}}</h4>
                        <form action="{{route('admin.gallery.page.settings')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="site_image_gallery_post_items">{{__('Image Gallery Topics')}}</label>
                                <input type="number" class="form-control" name="site_image_gallery_post_items" value="{{get_static_option('site_image_gallery_post_items')}}">
                            </div>
                            <div class="form-group">
                                <label for="site_image_gallery_order_by">{{__('Order By')}}</label>
                                <select name="site_image_gallery_order_by"  class="form-control">
                                    <option value="id">{{__('Id')}}</option>
                                    <option value="title">{{__('Title')}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="site_image_gallery_order">{{__('Order')}}</label>
                                <select name="site_image_gallery_order"  class="form-control">
                                    <option value="ASC">{{__('Ascending')}}</option>
                                    <option value="DESC">{{__('Descending')}}</option>
                                </select>
                            </div>
                            <button id="update" type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Changes')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
        <script>
            (function(){
                "use strict";
                <x-btn.update/>
            })(jQuery)
        </script>
@endsection
