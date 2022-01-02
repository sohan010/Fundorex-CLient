@extends('backend.admin-master')
@section('site-title')
    {{__('Donations Category')}}
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
                <x-msg.error/>
                <x-msg.success/>
            </div>
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__('All Donations Categories')}}</h4>
                        <div class="bulk-delete-wrapper">
                            @can('donation-category-delete')
                                <x-bulk-action/>
                            @endcan
                            @can('donation-category-create')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="btn-wrapper pull-right mb-3">
                                            <a data-toggle="modal" data-target="#create_category"
                                               class="btn btn-info text-white">{{__('Add New Category')}}</a>
                                        </div>
                                    </div>
                                </div>
                            @endcan
                        </div>


                        <div class="table-wrap table-responsive">
                            <table class="table table-default">
                                <thead>
                                <x-bulk-th/>
                                <th>{{__('ID')}}</th>
                                <th>{{__('Title')}}</th>
                                <th>{{__('Image')}}</th>
                                <th>{{__('Description')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                @foreach($all_category as $data)
                                    <tr>
                                        <td>
                                            <x-bulk-delete-checkbox :id="$data->id"/>
                                        </td>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->title}}</td>
                                        <td>{!! render_attachment_preview_for_admin($data->image) !!}</td>
                                        <td>{{$data->description}}</td>
                                        <td>
                                            <x-status-span :status="$data->status"/>
                                        </td>
                                        <td>
                                            @can('donation-category-create')
                                                <x-delete-popover :url="route('admin.donations.category.delete',$data->id)"/>
                                            @endcan
                                            @can('donation-category-edit')
                                                <a href="#"
                                                   data-toggle="modal"
                                                   data-target="#category_edit_modal"
                                                   class="btn btn-primary btn-xs mb-3 mr-1 category_edit_btn"
                                                   data-id="{{$data->id}}"
                                                   data-title="{{$data->title}}"
                                                   data-lang="{{$data->lang}}"
                                                   data-description="{{$data->description}}"
                                                   data-status="{{$data->status}}"
                                                   {!! render_img_url_data_attr($data->image,'imageurl') !!}
                                                   data-image="{{$data->image}}"
                                                >
                                                    <i class="ti-pencil"></i>
                                                </a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @can('donation-category-edit')
    <div class="modal fade" id="category_edit_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Update Category')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{route('admin.donations.category.update')}}" method="post">
                    <input type="hidden" name="category_id">
                    <div class="modal-body">
                        @csrf

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
                            <small>{{__('Recommended image size 1920x1280')}}</small>
                        </div>
                        <div class="form-group">
                            <label for="edit_status">{{__('Status')}}</label>
                            <select name="status" class="form-control" id="edit_status">
                                <option value="draft">{{__("Draft")}}</option>
                                <option value="publish">{{__("Publish")}}</option>
                            </select>
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
    @endcan
    @can('donation-category-create')
    <div class="modal fade" id="create_category" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Add new category')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{route('admin.donations.category.new')}}" method="post">
                    <div class="modal-body">
                        @csrf

                        <div class="form-group">
                            <label for="name">{{__('Title')}}</label>
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
                            <small>{{__('Recommended image size 1920x1280')}}</small>
                        </div>
                        <div class="form-group">
                            <label for="status">{{__('Status')}}</label>
                            <select name="status" class="form-control" id="status">
                                <option value="publish">{{__("Publish")}}</option>
                                <option value="draft">{{__("Draft")}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                        <button id="submit" type="submit" class="btn btn-primary">{{__('Submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endcan
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
                <x-bulk-action-js :url="route('admin.donations.category.bulk.action')"/>

                $(document).on('click', '.category_edit_btn', function () {
                    var el = $(this);
                    var id = el.data('id');
                    var title = el.data('title');
                    var status = el.data('status');
                    var modal = $('#category_edit_modal');
                    var image = el.data('image');
                    var imageUrl = el.data('imageurl');

                    modal.find('input[name="category_id"]').val(id);
                    modal.find('select[name="status"] option[value="' + status + '"]').attr('selected', true);
                    modal.find('input[name="title"]').val(title);
                    modal.find('textarea[name="description"]').val(el.data('description'));
                    modal.find('select[name="lang"] option[value="' + el.data('lang') + '"]').attr('selected', true);
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
