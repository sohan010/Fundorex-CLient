@extends('backend.admin-master')
@section('site-title')
    {{__('All Banner')}}
@endsection
@section('style')
    <x-media.css/>
    <x-datatable.css/>
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
                        <h4 class="header-title">{{__('Banner Items')}}</h4>
                        <div class="bulk-delete-wrapper">
                            @can('banner-delete')
                                <div class="select-box-wrap">
                                    <x-bulk-action/>
                                </div>
                            @endcan
                            @can('banner-create')
                                <div class="btn-wrapper">
                                    <a href="" data-toggle="modal" data-target="#new_banner"
                                       class="btn btn-info pull-right mb-4">{{__('Add New')}}</a>
                                </div>
                            @endcan
                        </div>

                        <div class="table-wrap table-responsive">
                            <table class="table table-default">
                                <thead>
                                <x-bulk-th/>
                                <th>{{__('ID')}}</th>
                                <th>{{__('Image')}}</th>
                                <th>{{__('title')}}</th>
                                <th>{{__('subtitle')}}</th>
                                <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                @foreach($all_banners as $data)
                                    @php $img_url =''; @endphp
                                    <tr>
                                        <td>
                                            <x-bulk-delete-checkbox :id="$data->id"/>
                                        </td>
                                        <td>{{$data->id}}</td>
                                        <td>
                                            @php
                                                $banner_img = get_attachment_image_by_id($data->image,null,true);
                                            @endphp
                                            @if (!empty($banner_img))
                                                <div class="attachment-preview">
                                                    <div class="thumbnail">
                                                        <div class="centered">
                                                            <img class="avatar user-thumb"
                                                                 src="{{$banner_img['img_url']}}" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                @php  $img_url = $banner_img['img_url']; @endphp
                                            @endif
                                        </td>
                                        <td>{{$data->title  ?? ''}}</td>
                                        <td>{{$data->subtitle ?? ''}}</td>

                                        <td>
                                            @can('banner-delete')
                                                <x-delete-popover :url="route('admin.banner.delete',$data->id)"/>
                                            @endcan
                                            @can('banner-edit')
                                                <a href="#"
                                                   data-toggle="modal"
                                                   data-target="#banner_item_edit_modal"
                                                   class="btn btn-primary btn-xs mb-3 mr-1 banner_edit_btn"
                                                   data-id="{{$data->id}}"
                                                   data-action="{{route('admin.banner.update')}}"
                                                   data-title="{{$data->title}}"
                                                   data-subtitle="{{$data->subtitle}}"
                                                   data-imageid="{{$data->image}}"
                                                   data-image="{{$img_url}}"
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
            @can('banner-create')
                <div class="modal fade" id="new_banner" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{__('New Banner Item')}}</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                            </div>
                            <form action="{{route('admin.banner')}}" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    @csrf

                                    <div class="form-group">
                                        <label for="edit_name">{{__('Title')}}</label>
                                        <input type="text" class="form-control" name="title"
                                               placeholder="{{__('Title')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="edit_designation">{{__('Subtitle')}}</label>
                                        <input type="text" class="form-control" name="subtitle"
                                               placeholder="{{__('Subtitle')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="image">{{__('Image')}}</label>
                                        <div class="media-upload-btn-wrapper">
                                            <div class="img-wrap"></div>
                                            <input type="hidden" name="image" value="">
                                            <button type="button" class="btn btn-info media_upload_form_btn"
                                                    data-btntitle="{{__('Select Image')}}"
                                                    data-modaltitle="{{__('Upload Image')}}" data-toggle="modal"
                                                    data-target="#media_upload_modal">
                                                {{__('Upload Image')}}
                                            </button>
                                        </div>
                                        <small>{{__('431 x 150 px image recommended')}}</small>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">{{__('Close')}}</button>
                                    <button type="submit" class="btn btn-primary">{{__('Save Changes')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endcan
            @can('banner-edit')
                <div class="modal fade" id="banner_item_edit_modal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{__('Edit Banner Item')}}</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                            </div>
                            <form action="#" id="banner_edit_modal_form" method="post"
                                  enctype="multipart/form-data">
                                <div class="modal-body">
                                    @csrf
                                    <input type="hidden" name="id" id="banner_id" value="">
                                    <div class="form-group">
                                        <label for="edit_name">{{__('Title')}}</label>
                                        <input type="text" class="form-control" id="edit_title" name="title"
                                               placeholder="{{__('Title')}}">
                                    </div>
                                    <div class="form-group">
                                        <label >{{__('Subtitle')}}</label>
                                        <input type="text" class="form-control" id="edit_subtitle" name="subtitle"
                                               placeholder="{{__('Subtitle')}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="image">{{__('Image')}}</label>
                                        <div class="media-upload-btn-wrapper">
                                            <div class="img-wrap"></div>
                                            <input type="hidden" id="edit_image" name="image" value="">
                                            <button type="button" class="btn btn-info media_upload_form_btn"
                                                    data-btntitle="{{__('Select Image')}}"
                                                    data-modaltitle="{{__('Upload Image')}}" data-toggle="modal"
                                                    data-target="#media_upload_modal">
                                                {{__('Upload Image')}}
                                            </button>
                                        </div>
                                        <small>{{__('431 x 150 px image recommended')}}</small>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">{{__('Close')}}</button>
                                    <button type="submit" class="btn btn-primary">{{__('Save Changes')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endcan
            <x-media.markup/>
            @endsection
            @section('script')

        <script>
            (function ($) {
                "use strict";
                <x-btn.submit/>
                <x-btn.update/>
                $(document).ready(function () {
                    <x-bulk-action-js :url="route('admin.banner.bulk.action')" />


                    $(document).on('click', '.banner_edit_btn', function () {
                        var el = $(this);
                        var id = el.data('id');
                        var title = el.data('title');
                        var subtitle = el.data('subtitle');
                        var action = el.data('action');
                        var image = el.data('image');
                        var imageid = el.data('imageid');

                        var form = $('#banner_edit_modal_form');
                        form.attr('action', action);
                        form.find('#banner_id').val(id);
                        form.find('#edit_title').val(title);
                        form.find('#edit_subtitle').val(subtitle);
                        if (imageid != '') {
                            form.find('.media-upload-btn-wrapper .img-wrap').html('<div class="attachment-preview"><div class="thumbnail"><div class="centered"><img class="avatar user-thumb" src="' + image + '" > </div></div></div>');
                            form.find('.media-upload-btn-wrapper input').val(imageid);
                            form.find('.media-upload-btn-wrapper .media_upload_form_btn').text('Change Image');
                        }
                    });
                });
            })(jQuery)
        </script>

        <x-datatable.js/>
        <script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
        <x-media.js/>
@endsection
