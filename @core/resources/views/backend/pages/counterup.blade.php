@extends('backend.admin-master')
@section('site-title')
    {{__('Counterup Item')}}
@endsection
@section('style')
    @include('backend.partials.datatable.style-enqueue')
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <x-msg.success/>
                <x-msg.error/>
            </div>

            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__('Counterup Items')}}</h4>
                        <div class="bulk-delete-wrapper">
                            @can('counterup-delete')
                                <x-bulk-action/>
                            @endcan
                            @can('counterup-create')
                                <div class="btn-wrapper">
                                    <a data-toggle="modal" class="btn btn-info text-white pull-right mb-4"
                                       data-target="#new_coutnerup_item">{{__('New Counterup')}}</a>
                                </div>
                            @endcan
                        </div>

                        <div class="table-wrap table-responsive">
                            <table class="table table-default">
                                <thead>
                                <x-bulk-th/>
                                <th>{{__('ID')}}</th>
                                <th>{{__('Icon')}}</th>
                                <th>{{__('Number')}}</th>
                                <th>{{__('Title')}}</th>
                                <th>{{__('Extra Text')}}</th>
                                <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                @foreach($all_counterups as $data)
                                    <tr>
                                        <td>
                                            <x-bulk-delete-checkbox :id="$data->id"/>
                                        </td>
                                        <td>{{$data->id}}</td>
                                        <td><i class="{{$data->icon}}" style="font-size: 40px"></i></td>
                                        <td>{{$data->number}}</td>
                                        <td>{{$data->title}}</td>
                                        <td>{{$data->extra_text}}</td>
                                        <td>
                                            @can('counterup-delete')
                                                <x-delete-popover :url="route('admin.counterup.delete',$data->id)"/>
                                            @endcan
                                            @can('counterup-edit')
                                                <a href="#"
                                                   data-toggle="modal"
                                                   data-target="#counterup_item_edit_modal"
                                                   class="btn btn-primary btn-xs mb-3 mr-1 counterup_edit_btn"
                                                   data-id="{{$data->id}}"
                                                   data-action="{{route('admin.counterup.update')}}"
                                                   data-title="{{$data->title}}"
                                                   data-number="{{$data->number}}"
                                                   data-lang="{{$data->lang}}"
                                                   data-icon="{{$data->icon}}"
                                                   data-extra="{{$data->extra_text}}"
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
    @can('counterup-create')
    <div class="modal fade" id="new_coutnerup_item" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('New Counterup Item')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{route('admin.counterup')}}" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="title">{{__('Title')}}</label>
                            <input type="text" class="form-control" id="title" name="title"
                                   placeholder="{{__('Title')}}">
                        </div>
                        <div class="form-group">
                            <label for="icon" class="d-block">{{__('Icon')}}</label>
                            <div class="btn-group ">
                                <button type="button" class="btn btn-primary iconpicker-component">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </button>
                                <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                                        data-selected="fas fa-exclamation-triangle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu"></div>
                            </div>
                            <input type="hidden" class="form-control" id="icon" value="fas fa-exclamation-triangle"
                                   name="icon">
                        </div>
                        <div class="form-group">
                            <label for="number">{{__('Number')}}</label>
                            <input type="number" class="form-control" id="number" name="number"
                                   placeholder="{{__('Number')}}">
                        </div>
                        <div class="form-group">
                            <label for="extra_text">{{__('Extra Text')}}</label>
                            <input type="text" class="form-control" id="extra_text" name="extra_text"
                                   placeholder="{{__('Extra Text')}}">
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
    @can('counterup-edit')
    <div class="modal fade" id="counterup_item_edit_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Edit Counterup Item')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="#" id="counterup_edit_modal_form" method="post">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="id" id="counterup_id" value="">

                        <div class="form-group">
                            <label for="edit_title">{{__('Title')}}</label>
                            <input type="text" class="form-control" id="edit_title" name="title"
                                   placeholder="{{__('Title')}}">
                        </div>
                        <div class="form-group">
                            <label for="edit_icon" class="d-block">{{__('Icon')}}</label>
                            <div class="btn-group ">
                                <button type="button" class="btn btn-primary iconpicker-component">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </button>
                                <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                                        data-selected="fas fa-exclamation-triangle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu"></div>
                            </div>
                            <input type="hidden" class="form-control" id="edit_icon" value="fas fa-exclamation-triangle"
                                   name="icon">
                        </div>
                        <div class="form-group">
                            <label for="edit_number">{{__('Number')}}</label>
                            <input type="number" class="form-control" id="edit_number" name="number"
                                   placeholder="{{__('Number')}}">
                        </div>
                        <div class="form-group">
                            <label for="edit_extra_text">{{__('Extra Text')}}</label>
                            <input type="text" class="form-control" id="edit_extra_text" name="extra_text"
                                   placeholder="{{__('Extra Text')}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                        <button id="update" type="submit" class="btn btn-primary">{{__('Save Changes')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endcan
@endsection
@section('script')
    <script>
        (function ($) {
            "use strict";
            $(document).ready(function () {
                <x-bulk-action-js :url="route('admin.counterup.bulk.action')"/>
                <x-btn.submit/>
                <x-btn.update/>
                $(document).on('click', '.counterup_edit_btn', function () {
                    var el = $(this);
                    var id = el.data('id');
                    var title = el.data('title');
                    var number = el.data('number');
                    var action = el.data('action');
                    var icon = el.data('icon');
                    var extra = el.data('extra');
                    var form = $('#counterup_edit_modal_form');
                    form.attr('action', action);
                    form.find('#counterup_id').val(id);
                    form.find('#edit_title').val(title);
                    form.find('#edit_number').val(number);
                    form.find('#edit_extra_text').val(extra);
                    form.find('.icp-dd').attr('data-selected', el.data('icon'));
                    form.find('input[name="icon"]').val(el.data('icon'));
                    form.find('.iconpicker-component i').attr('class', el.data('icon'));
                });
                $('.icp-dd').iconpicker();
                $('.icp-dd').on('iconpickerSelected', function (e) {
                    var selectedIcon = e.iconpickerValue;
                    $(this).parent().parent().children('input').val(selectedIcon);
                });
            });
        })(jQuery)
    </script>
    @include('backend.partials.datatable.script-enqueue')
@endsection
