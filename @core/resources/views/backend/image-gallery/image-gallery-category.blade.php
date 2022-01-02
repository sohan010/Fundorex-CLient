@extends('backend.admin-master')
@section('site-title')
    {{__('Image Gallery Categories')}}
@endsection
@section('style')
    <x-media.css/>
    <x-datatable.css/>
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <!-- basic form start -->
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <x-msg.success/>
                <x-msg.error/>
            </div>

            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__('Image Gallery Categories')}}</h4>
                        @can('image-gallery-category-delete')
                            <div class="bulk-delete-wrapper">
                                <div class="bulk-delete-wrapper">
                                    <div class="select-box-wrap">
                                        <select name="bulk_option" id="bulk_option">
                                            <option value="">{{{__('Bulk Action')}}}</option>
                                            <option value="delete">{{{__('Delete')}}}</option>
                                        </select>
                                        <button class="btn btn-primary btn-sm"
                                                id="bulk_delete_btn">{{__('Apply')}}</button>
                                    </div>
                                </div>
                                @endcan
                                @can('image-gallery-category-create')
                                    <div class="btn-wrapper">
                                        <a data-toggle="modal" data-target="#image_category_item_new_modal"
                                           class="btn btn-info text-white pull-right mb-4">{{__("Add New")}}</a>
                                    </div>
                                @endcan
                            </div>

                            <div class="table-wrap table-responsive">
                                <table class="table table-default">
                                    <thead>
                                    <th class="no-sort">
                                        <div class="mark-all-checkbox">
                                            <input type="checkbox" class="all-checkbox">
                                        </div>
                                    </th>
                                    <th>{{__('ID')}}</th>
                                    <th>{{__('Name')}}</th>
                                    <th>{{__('Status')}}</th>
                                    <th>{{__('Action')}}</th>
                                    </thead>
                                    <tbody>
                                    @foreach($all_category as $data)
                                        <tr>
                                            <td>
                                                <div class="bulk-checkbox-wrapper">
                                                    <input type="checkbox" class="bulk-checkbox" name="bulk_delete[]"
                                                           value="{{$data->id}}">
                                                </div>
                                            </td>
                                            <td>{{$data->id}}</td>
                                            <td>{{$data->title}}</td>
                                            <td>
                                                <x-status-span :status="$data->status"/>
                                            </td>
                                            <td>
                                                @can('image-gallery-category-delete')
                                                    <x-delete-popover :url="route('admin.gallery.category.delete',$data->id)"/>
                                                @endcan
                                                @can('image-gallery-category-edit')
                                                    <a href="#"
                                                       data-toggle="modal"
                                                       data-target="#image_category_item_edit_modal"
                                                       class="btn btn-xs btn-primary mb-3 mr-1 category_edit_btn"
                                                       data-id="{{$data->id}}"
                                                       data-name="{{$data->title}}"
                                                       data-lang="{{$data->lang}}"
                                                       data-status="{{$data->status}}"
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
@can('image-gallery-category-create')
    <div class="modal fade" id="image_category_item_new_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('New Category')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{route('admin.gallery.category.new')}}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="id" value="">
                        <div class="form-group">
                            <label for="title">{{__('Title')}}</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="status">{{__('Status')}}</label>
                            <select name="status" class="form-control">
                                <option value="publish">{{__('Publish')}}</option>
                                <option value="draft">{{__('Draft')}}</option>
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
    @can('image-gallery-category-edit')
    <div class="modal fade" id="image_category_item_edit_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Edit Category')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{route('admin.gallery.category.update')}}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="id" value="">

                        <div class="form-group">
                            <label for="title">{{__('Title')}}</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="status">{{__('Status')}}</label>
                            <select name="status" class="form-control">
                                <option value="publish">{{__('Publish')}}</option>
                                <option value="draft">{{__('Draft')}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                        <button id="update" type="submit" class="btn btn-primary">{{__('Update')}}</button>
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
            $(document).ready(function () {
                <x-bulk-action-js :url="route('admin.gallery.category.bulk.action')" />
                <x-btn.submit/>
                <x-btn.update/>

                $(document).on('click', '.category_edit_btn', function () {
                    var el = $(this);
                    var id = el.data('id');
                    var title = el.data('name');
                    var status = el.data('status');
                    var lang = el.data('lang');
                    var modalContainerId = $('#image_category_item_edit_modal');
                    modalContainerId.find('input[name="id"]').val(id);
                    modalContainerId.find('input[name="title"]').val(title);
                    modalContainerId.find('select[name="status"] option[value="' + status + '"]').attr('selected', true);
                });
            });
        })(jQuery)
    </script>
    <x-datatable.js/>
    <script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
    <x-media.js/>
@endsection
