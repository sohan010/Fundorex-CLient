@extends('backend.admin-master')
@section('site-title')
    {{__('Page Settings')}}
@endsection
@section('style')
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-tagsinput.css')}}">
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                @include('backend.partials.message')
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__("Page Name & Slug Settings")}}</h4>
                        @include('backend.partials.error')
                        <form action="{{route('admin.general.page.settings')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    @php
                                    $all_page_slug_settings = [
                                        'about_page',
                                        'team_page',
                                        'faq_page',
                                        'blog_page',
                                        'contact_page',
                                        'career_with_us_page',
                                        'events_page',
                                        'donation_page',
                                        'testimonial_page',
                                        'image_gallery_page',
                                        'donor_page',
                                        'success_story_page',
                                        'support_ticket_page',
                                    ];
                                    @endphp
                                  <div class="row">
                                      @foreach($all_page_slug_settings as $slug_field)
                                          <div class="col-lg-6">
                                              <div class="from-group margin-bottom-30">
                                                  <label for="{{$slug_field}}_slug">{{ucfirst(str_replace('_',' ',$slug_field))}} {{__('slug')}}</label>
                                                  <input type="text" class="form-control" value="{{get_static_option($slug_field.'_slug')}}" name="{{$slug_field.'_slug'}}" placeholder="{{__('Slug')}}" >
                                                  <small>{{__('slug example:')}} {{str_replace(['_','-page'],['-',''],$slug_field)}}</small>
                                              </div>
                                          </div>
                                      @endforeach
                                  </div>
                                </div>
                                <div class="col-lg-6">

                                    <div class="tab-content margin-top-30" id="nav-tabContent">

                                                <div class="accordion-wrapper">
                                                    <div id="accordion">
                                                        @foreach($all_page_slug_settings as $slug_field)
                                                        <div class="card">
                                                            <div class="card-header" >
                                                                <h5 class="mb-0">
                                                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#{{$slug_field.'_content'}}" aria-expanded="false" >
                                                                        <span class="page-title">{{get_static_option($slug_field.'_name') ?? ucfirst(str_replace(['_','-page'],[' ',''],$slug_field))}}</span>
                                                                    </button>
                                                                </h5>
                                                            </div>
                                                            <div id="{{$slug_field.'_content'}}" class="collapse"  data-parent="#accordion">
                                                                <div class="card-body">
                                                                    <div class="from-group">
                                                                        <label for="{{$slug_field}}_name">{{__('Name')}}</label>
                                                                        <input type="text" class="form-control" name="{{$slug_field}}_name" value="{{get_static_option($slug_field.'_name')}}"  placeholder="{{__('Name')}}" >
                                                                    </div>
                                                                    <div class="form-group margin-top-20">
                                                                        <label for="{{$slug_field}}_meta_tags">{{__('Meta Tags')}}</label>
                                                                        <input type="text" name="{{$slug_field}}_meta_tags"  class="form-control" data-role="tagsinput" value="{{get_static_option($slug_field.'_meta_tags')}}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="{{$slug_field}}_meta_description">{{__('Meta Description')}}</label>
                                                                        <textarea name="{{$slug_field}}_meta_description"  class="form-control" rows="5" >{{get_static_option($slug_field.'_meta_description')}}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                   @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
    <script src="{{asset('assets/backend/js/bootstrap-tagsinput.js')}}"></script>
    <script>
        <x-btn.update/>
    </script>
@endsection
