@extends('backend.admin-master')
@section('style')
    <x-datatable.css/>
    <link rel="stylesheet" href="{{asset('assets/backend/css/media-uploader.css')}}">
@endsection
@section('site-title')
    {{__('All Feedback')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                @include('backend/partials/message')
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__('All Feedback')}}</h4>
                        <div class="bulk-delete-wrapper">
                            <div class="select-box-wrap">
                                <select name="bulk_option" id="bulk_option">
                                    <option value="">{{{__('Bulk Action')}}}</option>
                                    <option value="delete">{{{__('Delete')}}}</option>
                                </select>
                                <button class="btn btn-primary btn-sm" id="bulk_delete_btn">{{__('Apply')}}</button>
                            </div>
                        </div>
                        <div class="table-wrap table-responsive">
                            <table class="table table-default" id="all_blog_table">
                                <thead>
                                <th class="no-sort">
                                    <div class="mark-all-checkbox">
                                        <input type="checkbox" class="all-checkbox">
                                    </div>
                                </th>
                                <th>{{__('ID')}}</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Email')}}</th>
                                <th>{{__('Ratings')}}</th>
                                <th>{{__('Date')}}</th>
                                <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                @foreach($all_feedback as $data)
                                    <tr>
                                        <td>
                                            <div class="bulk-checkbox-wrapper">
                                                <input type="checkbox" class="bulk-checkbox" name="bulk_delete[]" value="{{$data->id}}">
                                            </div>
                                        </td>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->email}}</td>
                                        <td><div class="ratings">{!! ratings_markup($data->ratings) !!}</div></td>
                                        <td>{{date("d - M - Y", strtotime($data->created_at))}}</td>
                                        <td>

                                            <x-delete-popover :url="route('admin.feedback.delete',$data->id)"/>

                                            <a href="#"
                                               data-toggle="modal"
                                               data-target="#view_order_details_modal"
                                               data-email="{{$data->email}}"
                                               data-name="{{$data->name}}"
                                               data-ratings="{{$data->ratings}}"
                                               data-description="{{$data->description}}"
                                               data-date="{{date_format($data->created_at,'d M Y')}}"
                                               data-customfield="{{json_encode(unserialize($data->custom_fields))}}"
                                               data-attachment="{{json_encode(unserialize($data->attachment))}}"
                                               class="btn btn-lg btn-primary btn-xs mb-3 mr-1 view_order_details_btn"
                                            >
                                                <i class="ti-eye"></i>
                                            </a>
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
    <div class="modal fade" id="view_order_details_modal" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="view-order-details-info">
                    <h4 class="title">{{__('View Feedback Details')}}</h4>
                    <div class="view-order-top-wrap">
                        <div class="data-wrap">
                            {{__('Feedback Date:')}} <span class="order-date-span"></span>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="order-all-custom-fields table-striped table-bordered"></table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- Start datatable js -->
    <x-datatable.js/>
    <script>

        (function($){
            "use strict";
            $(document).ready(function() {
                <x-bulk-action-js :url="route('admin.feedback.bulk.action')"/>

                $(document).on('click','.view_order_details_btn',function (e) {
                    e.preventDefault();
                    var el = $(this);
                    var allData = el.data();
                    var parent = $('#view_order_details_modal');
                    var statusClass = allData.status == 'pending' ? 'alert alert-warning' : 'alert alert-success';

                    parent.find('.order-status-span').text(allData.status).addClass(statusClass);
                    parent.find('.order-date-span').text(allData.date);
                    parent.find('.order-all-custom-fields').html('');
                    $.each(allData.customfield,function (index,value) {
                        parent.find('.order-all-custom-fields').append('<tr><td class="fname">'+index.replace('-',' ')+'</td> <td class="fvalue">'+value+'</td></tr>');
                    });

                    if(allData.attachment){
                        $.each(allData.attachment,function (index,value) {
                            parent.find('.order-all-custom-fields tbody').append('<tr class="attachment_list"><td class="fname">'+index.replace('-',' ')+'</td><td class="fvalue"><a href="{{url('/')}}'+'/'+value+'" download>'+value.substr(26)+'</a></td></tr>');
                        });
                    }
                });

            } );
        })(jQuery);
    </script>
@endsection
