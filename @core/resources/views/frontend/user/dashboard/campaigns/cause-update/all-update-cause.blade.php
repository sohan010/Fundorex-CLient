@extends('frontend.user.dashboard.user-master')
@section('site-title')
    {{__('User Update Causes')}}
@endsection
@section('style')
  <x-media.css/>
    @include('backend.partials.datatable.style-enqueue')
@endsection
@section('section')
<div class="row">
    <div class="col-lg-12">
        <h5 class="modal-title margin-bottom-25">{{__('All Cause Update')}}
            <input type="hidden" name="cause_id" value="{{ $cause_id}}">
            <a class="btn btn-success pull-right btn-sm mx-2" href="{{route('user.add.new.update.cause.page',$cause_id)}}">{{__('Add New Cause Update')}}</a>
            <a class="btn btn-primary pull-right btn-sm" href="{{route('user.campaign.all')}}">{{__('All Campaign')}}</a>
        </h5>
        <div class="table-wrap table-responsive">
            <table class="table table-default">
                <thead>
                <th>{{__('Title')}}</th>
                <th>{{__('Image')}}</th>
                <th>{{__('Action')}}</th>
                </thead>
                <tbody>
                @foreach($all_update_causes as $data)
                    <tr>
                        <td>{{$data->title}}</td>
                        <td>{!! render_attachment_preview_for_admin($data->image,'','grid') !!}</td>
                        <td>
                            <a tabindex="0" class="btn btn-danger btn-sm swal_delete_button text-light">
                                <i class="fa fa-trash"></i>
                            </a>
                            <form method='post' action='{{route('user.donations.update.cause.delete',$data->id)}}' class="d-none">
                                <input type='hidden' name='_token' value='{{csrf_token()}}'>
                                <br>
                                <button type="submit" class="swal_form_submit_btn d-none"></button>
                            </form>

                            <a href="#"
                               data-toggle="modal"
                               data-target="#category_edit_modal"
                               class="btn btn-primary btn-sm category_edit_btn"
                               data-id="{{$data->id}}"
                               data-title="{{$data->title}}"
                               data-description="{{$data->description}}"
                               {!! render_img_url_data_attr($data->image,'imageurl') !!}
                               data-image="{{$data->image}}"
                            >
                                <i class="fa fa-pencil"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="category_edit_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('Update Cause Update')}}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
            </div>
            <form action="{{route('user.donations.update.cause.update')}}" method="post">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="case_update_id" value="" id="case_update_id">
                    <input type="hidden" name="cause_id" value="{{$cause_id}}">
                    <div class="form-group">
                        <label for="edit_name">{{__('Title')}}</label>
                        <input type="text" class="form-control" name="title" placeholder="{{__('title')}}">
                    </div>
                    <div class="form-group">
                        <label for="description">{{__('Description')}}</label>
                        <textarea name="description" class="form-control" cols="30" rows="5"
                                  placeholder="{{__('Description')}}"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">{{__('Image')}}</label>
                        <div class="media-upload-btn-wrapper">
                            <div class="img-wrap"></div>
                            <input type="hidden" name="image">
                            <button type="button" class="btn btn-info media_upload_form_btn"
                                    data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}"
                                    data-toggle="modal" data-target="#media_upload_modal">
                                {{__('Upload Image')}}
                            </button>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                    <button id="update" type="submit" class="btn btn-primary">{{__('Save Change')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
<x-media.markup
        :userUpload="true"
        :imageUploadRoute="route('user.upload.media.file')">
</x-media.markup>
@endsection
@section('scripts')
    <script>
        <x-btn.submit/>
        <x-btn.update/>
        (function ($) {
            "use strict";
            $(document).ready(function () {
                $(document).on('click','.mobile_nav',function(e){
                  e.preventDefault(); 
                   $(this).parent().toggleClass('show');
               });
               
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

                $(document).on('click','.swal_delete_button',function(e){
                  e.preventDefault();
                    Swal.fire({
                      title: '{{__("Are you sure?")}}',
                      text: '{{__("You would not be able to revert this item!")}}',
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                      if (result.isConfirmed) {
                        $(this).next().find('.swal_form_submit_btn').trigger('click');
                      }
                    });
                });
            });
        })(jQuery)
    </script>
    <x-media.js
            :deleteRoute="route('user.upload.media.file.delete')"
            :imgAltChangeRoute="route('user.upload.media.file.alt.change')"
            :allImageLoadRoute="route('user.upload.media.file.all')">
    </x-media.js>
@endsection
