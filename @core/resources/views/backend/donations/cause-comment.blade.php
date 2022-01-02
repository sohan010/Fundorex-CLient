@extends('backend.admin-master')
@section('site-title')
    {{__(' Cause Comments')}}
@endsection
@section('style')
    @include('backend.partials.datatable.style-enqueue')
    <x-media.css/>
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                @include('backend/partials/message')
                @include('backend/partials/error')
            </div>
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__('All Update Causes')}}
                            <a class="btn btn-success pull-right btn-sm" href="{{route('admin.donations.all')}}">{{__('Go Back')}}</a>
                        </h4>
                        <div class="bulk-delete-wrapper">
                            <x-bulk-action/>
                        </div>


                        <div class="table-wrap table-responsive">
                            <table class="table table-default">
                                <thead>
                                <x-bulk-th/>
                                <th>{{__('ID')}}</th>
                                <th>{{__('Cause Title')}}</th>
                                <th>{{__('Commented By')}}</th>
                                <th>{{__('Commented Content')}}</th>
                                <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                @foreach($all_comments as $data)
                                    <tr>
                                        <td>
                                            <x-bulk-delete-checkbox :id="$data->id"/>
                                        </td>
                                        <td>{{$data->id ?? ''}}</td>
                                        <td>{{$data->cause->title ?? ''}}</td>
                                        <td>{{$data->commented_by ?? ''}}</td>
                                        <td>{{$data->comment_content ?? ''}}</td>

                                        <td>
                                            <x-delete-popover :url="route('admin.donations.cause.comment.delete',$data->id)"/>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>


    @include('backend.partials.media-upload.media-upload-markup')
@endsection
@section('script')
    <script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
    <script>
        <x-btn.submit/>
        <x-btn.update/>
        (function ($) {
            "use strict";
            $(document).ready(function () {
                <x-bulk-action-js :url="route('admin.donations.cause.comment.bulk.action')"/>

                $(document).on('click', '.category_edit_btn', function () {
                    var el = $(this);
                    var id = el.data('id');
                    var title = el.data('title');
                    var modal = $('#category_edit_modal');
                    var image = el.data('image');
                    var imageUrl = el.data('imageurl');

                    modal.find('input[name="title"]').val(title);
                    $('#case_update_id').val(id);

                    modal.find('textarea[name="description"]').val(el.data('description'));
                    if (image !== '') {
                        modal.find('.media-upload-btn-wrapper .img-wrap').html('<div class="attachment-preview"><div class="thumbnail"><div class="centered"><img class="avatar user-thumb" src="' + imageUrl + '" > </div></div></div>');
                        modal.find('.media-upload-btn-wrapper input').val(image);
                        modal.find('.media-upload-btn-wrapper .media_upload_form_btn').text('Change Image');
                    }
                });
            });
        })(jQuery)
    </script>
    @include('backend.partials.datatable.script-enqueue')
    @include('backend.partials.media-upload.media-js')
@endsection
