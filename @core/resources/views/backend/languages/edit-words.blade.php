@extends('backend.admin-master')
@section('site-title')
    {{__('Edit Words Settings')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                @include('backend.partials.message')
                @include('backend.partials.error')
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrapp">
                            <h4 class="header-title">
                                {{__("Change All Words")}}
                            </h4>
                            <div class="header-title">
                                <a class="btn btn-secondary btn-sm margin-bottom-30 mr-1" href="{{ route('admin.languages')}}">  <i class="fa fa-backward" aria-hidden="true"></i> {{__('All Languages')}}</a>
                                <button class="btn btn-info btn-sm margin-bottom-30 add_new_string_btn"  data-toggle="modal" data-target="#add_new_string_modal"> <i class="fas fa-plus mr-1"></i> {{__('Add New String')}}</button>
                            </div>
                        </div>
                        <div class="button-wrap">
                        </div>
                        <form action="{{route('admin.languages.words.update',$lang_slug)}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="type" value="{{$type}}">
                            @csrf
                            <div class="row">
                                @foreach($all_word as $key => $value)
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label for="{{Str::slug(($key))}}">{{$key}}</label>
                                            <input type="text" name="word[{{$key}}]"  class="form-control" value="{{$value}}" id="{{Str::slug(($key))}}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Changes')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="add_new_string_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Add New Translate String')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{route('admin.languages.add.string')}}" id="add_new_string_modal_form"  method="post">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="slug" value="{{$lang_slug}}">
                        <input type="hidden" name="type" value="{{$type}}">
                        <div class="form-group">
                            <label for="string">{{__('String')}}</label>
                            <input type="text" class="form-control" name="string" placeholder="{{__('String')}}">
                        </div>
                        <div class="form-group">
                            <label for="translate_string">{{__('Translated String')}}</label>
                            <input type="text" class="form-control" name="translate_string" placeholder="{{__('Translated String')}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        (function($){
            "use strict";

            $(document).ready(function(){

                $(document).on('click','.add_new_string_btn',function (e){
                   e.preventDefault();

                });
            });

        })(jQuery);
    </script>
@endsection
