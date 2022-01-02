@extends('backend.admin-master')
@section('site-title')
    {{__('All Flags')}}
@endsection
@section('style')
    <x-datatable.css/>
    <x-summernote.css/>
    <link rel="stylesheet" href="{{asset('assets/backend/css/dropzone.css')}}">
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
                        <div class="header-wrapp">
                            <h4 class="header-title">{{__('All Flags')}}  </h4>
                        </div>
                        @can('donations-flag-report-delete')
                            <x-bulk-action/>
                        @endcan
                        <div class="table-wrap table-responsive">
                            <table class="table table-default">
                                <thead>
                                <th class="no-sort">
                                    <div class="mark-all-checkbox">
                                        <input type="checkbox" class="all-checkbox">
                                    </div>
                                </th>
                                <th>{{__('ID')}}</th>
                                <th>{{__('Cause Title')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Email')}}</th>
                                <th>{{__('Subject')}}</th>
                                <th>{{__('Date')}}</th>
                                <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                @foreach($all_flag_reports as $data)
                                    <tr class="{{ $data['id']}}">
                                        <td>
                                            <x-bulk-delete-checkbox :id="$data->id"/>
                                        </td>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->cause->title ?? ''}}</td>
                                        <td>
                                            <x-status-span :status="$data->cause->status"/>
                                        </td>
                                        <td>{{$data->name}}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{$data->subject}}</td>
                                        <td>{{$data->created_at->diffForHumans()}}</td>

                                        <td>
                                            @can('donations-flag-report-delete')
                                                <x-delete-popover :url="route('admin.donations.flag.reports.delete',$data->id)"/>
                                            @endcan

                                                @can('donations-flag-report-view')
                                                    <x-view-icon :url="route('admin.donations.flag.reports.view',$data->id)"/>
                                                @endcan
                                                @can('donations-flag-report-status-update')
                                                <a href="#"
                                                   data-id="{{$data->id}}"
                                                   data-causeid="{{$data->cause_id}}"
                                                   data-status="{{$data->cause->status}}"
                                                   data-toggle="modal"
                                                   data-target="#cause_status_change_modal"
                                                   class="btn btn-lg btn-warning btn-sm mb-3 mr-1 cause_status_change_btn"
                                                >
                                                    {{__("Update Status")}}
                                                </a>

                                                @endcan

                                                @can('donations-flag-report-mail-send')
                                                    <a class="btn btn-lg btn-primary btn-sm mb-3 mr-1 send_mail_modal_btn"
                                                       href="#"
                                                       data-toggle="modal"
                                                       data-target="#send_mail_to_subscriber_modal"
                                                       data-email="{{$data->email}}"
                                                    >
                                                        <i class="ti-email"></i>
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

    @can('donations-flag-report-mail-send')
        <div class="modal fade" id="send_mail_to_subscriber_modal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{__('Send Mail To Flag Sender')}}</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                    </div>
                    <form action="{{route('admin.donations.flag.report.mail.send')}}" id="send_mail_to_subscriber_edit_modal_form"  method="post">
                        <div class="modal-body">
                            @csrf
                            <div class="form-group">
                                <label for="email">{{__('Email')}}</label>
                                <input type="text" readonly class="form-control"  id="email" name="email" placeholder="{{__('Email')}}">
                            </div>
                            <div class="form-group">
                                <label for="edit_icon">{{__('Subject')}}</label>
                                <input type="text" class="form-control"  id="subject" name="subject" placeholder="{{__('Subject')}}">
                            </div>
                            <div class="form-group">
                                <label for="message">{{__('Message')}}</label>
                                <input type="hidden" name="message" >
                                <div class="summernote"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                            <button id="submit" type="submit" class="btn btn-primary">{{__('Send Mail')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endcan

    @can('donations-flag-report-status-update')
    <div class="modal fade" id="cause_status_change_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">{{__('Cause Status Change')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>

                <form action="{{route('admin.donations.flag.reports.cause.status.change')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="cause_id" id="cause_id">
                        <div class="form-group">
                            <label for="cause_status">{{__('Cause Status')}}</label>
                                <select name="status" id="cause_status"  class="form-control">
                                    <option value="publish">{{__('Publish')}}</option>
                                    <option value="draft">{{__('Draft')}}</option>
                                    <option value="archive">{{__('Archive')}}</option>
                                    <option value="banned">{{__('Banned')}}</option>
                                </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('Change Status')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endcan
@endsection

@section('script')
    @include('backend.partials.datatable.script-enqueue')
    <script src="{{asset('assets/backend/js/summernote-bs4.js')}}"></script>
    <script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
    <script>
        (function ($) {
            "use strict";
            $(document).ready(function () {
                <x-bulk-action-js :url="route('admin.donations.flag.reports.bulk.action')" />

                $(document).on('click','.send_mail_modal_btn',function(){
                    var el = $(this);
                    var email = el.data('email');
                    var form = $('#send_mail_to_subscriber_edit_modal_form');
                    form.find('#email').val(email);

                    $('.summernote').summernote({
                        height: 300,   //set editable area's height
                        codemirror: { // codemirror options
                            theme: 'monokai'
                        },
                        callbacks: {
                            onChange: function(contents, $editable) {
                                $(this).prev('input').val(contents);
                            }
                        }
                    });

                });

                $(document).on('click','.cause_status_change_btn',function(e){
                    e.preventDefault();
                    var el = $(this);
                    console.log(el.data('causeid'));
                    var form = $('#cause_status_change_modal');
                    form.find('#cause_id').val(el.data('causeid'));
                    form.find('#cause_status option[value="'+el.data('status')+'"]').attr('selected',true);
                });
            });
        })(jQuery);
    </script>
@endsection
