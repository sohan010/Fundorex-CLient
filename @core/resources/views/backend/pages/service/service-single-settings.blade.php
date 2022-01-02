@extends('backend.admin-master')
@section('site-title')
    {{__('Service Single Settings')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                @include('backend.partials.message')
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__("Service Single Settings")}}</h4>
                        <form action="{{route('admin.services.single.page.settings')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    @foreach($all_languages as $key => $lang)
                                        <a class="nav-item nav-link @if($key == 0) active @endif" id="nav-home-tab" data-toggle="tab" href="#nav-home-{{$lang->slug}}" role="tab" aria-controls="nav-home" aria-selected="true">{{$lang->name}}</a>
                                    @endforeach
                                </div>
                            </nav>
                            <div class="tab-content margin-top-30" id="nav-tabContent">
                                @foreach($all_languages as $key => $lang)
                                    <div class="tab-pane fade @if($key == 0) show active @endif" id="nav-home-{{$lang->slug}}" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="form-group">
                                            <label for="service_single_page_{{$lang->slug}}_query_form_title">{{__('Query Form Title')}}</label>
                                            <input type="text" name="service_single_page_{{$lang->slug}}_query_form_title"  class="form-control" value="{{get_static_option('service_single_page_'.$lang->slug.'_query_form_title')}}" id="service_single_page_{{$lang->slug}}_query_form_title">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label for="service_single_page_query_form_email">{{__('Query Form Mail')}}</label>
                                <input type="text" name="service_single_page_query_form_email"  class="form-control" value="{{get_static_option('service_single_page_query_form_email')}}" id="service_single_page_query_form_email">
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Changes')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
