@extends('backend.admin-master')
@section('style')
    <link rel="stylesheet" href="{{asset('assets/backend/css/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/media-uploader.css')}}">
    <x-datatable.css/>
@endsection
@section('site-title')
    {{__('All Applicant')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12 mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <x-msg.error/>
                                    <x-msg.success/>
                                    <h4 class="header-title">{{__('All Applicant')}}</h4>
                                    <div class="bulk-delete-wrapper">
                                        <div class="select-box-wrap">
                                            <select name="bulk_option" id="bulk_option">
                                                <option value="">{{{__('Bulk Action')}}}</option>
                                                <option value="delete">{{{__('Delete')}}}</option>
                                            </select>
                                            <button class="btn btn-primary btn-sm" id="bulk_delete_btn">{{__('Apply')}}</button>
                                        </div>
                                    </div>
                                    <div class="data-tables datatable-primary table-responsive table-wrap">
                                        <table >
                                            <thead class="text-capitalize">
                                            <tr>
                                                <th class="no-sort">
                                                    <div class="mark-all-checkbox">
                                                        <input type="checkbox" class="all-checkbox">
                                                    </div>
                                                </th>
                                                <th>{{__('ID')}}</th>
                                                <th>{{__('Job Title')}}</th>
                                                <th>{{__('Job Position')}}</th>
                                                <th>{{__('Date')}}</th>
                                                <th>{{__('Action')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
{{--                                            @foreach($all_applicant as $data)--}}
{{--                                                <tr>--}}
{{--                                                    <td>--}}
{{--                                                        <div class="bulk-checkbox-wrapper">--}}
{{--                                                            <input type="checkbox" class="bulk-checkbox" name="bulk_delete[]" value="{{$data->id}}">--}}
{{--                                                        </div>--}}
{{--                                                    </td>--}}
{{--                                                    <td>{{$data->id}}</td>--}}
{{--                                                    <td>{{!empty($data->job) ? $data->job->title : __('This job is not available or delete')}}</td>--}}
{{--                                                    <td>{{!empty($data->job) ? $data->job->position : __('This job is not available or delete')}}</td>--}}
{{--                                                    <td>{{date_format($data->created_at,'d M Y')}}</td>--}}

{{--                                                    <td>--}}

{{--                                                        <x-delete-popover :url="route('admin.jobs.applicant.delete',$data->id)"/>--}}

{{--                                                        <a target="_blank" href="{{route('admin.jobs.applicant.view',$data->id)}}"--}}
{{--                                                           class="btn btn-lg btn-primary btn-sm mb-3 mr-1 view_order_details_btn"--}}
{{--                                                        >--}}
{{--                                                            <i class="ti-eye"></i>--}}
{{--                                                        </a>--}}
{{--                                                        <a href="#"--}}
{{--                                                           data-toggle="modal"--}}
{{--                                                           data-target="#send_mail_modal"--}}
{{--                                                           data-id="{{$data->id}}"--}}
{{--                                                           data-name="{{$data->name}}"--}}
{{--                                                           data-email="{{$data->email}}"--}}
{{--                                                           class="btn btn-lg btn-info btn-sm mb-3 mr-1 send_mail_btn"--}}
{{--                                                        >--}}
{{--                                                            <i class="ti-email"></i>--}}
{{--                                                        </a>--}}
{{--                                                    </td>--}}
{{--                                                </tr>--}}
{{--                                            @endforeach--}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="send_mail_modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Send Mail To Applicant')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>

                <form action="{{route('admin.jobs.applicant.mail')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="applicant_id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">{{__('Name')}}</label>
                            <input type="text" class="form-control" readonly name="name">
                        </div>
                        <div class="form-group">
                            <label for="email">{{__('Email')}}</label>
                            <input type="email" class="form-control" readonly name="email">
                        </div>
                        <div class="form-group">
                            <label for="Subject">{{__('Subject')}}</label>
                            <input type="text" class="form-control" name="subject" >
                        </div>
                        <div class="form-group">
                            <label>{{__('Message')}}</label>
                            <input type="hidden" name="message">
                            <div class="summernote"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('Send Mail')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('backend.partials.media-upload.media-upload-markup')
@endsection

@section('script')
    <!-- Start datatable js -->
    <script src="{{asset('assets/backend/js/summernote-bs4.js')}}"></script>
    <x-datatable.js :onlyjs="true"/>
    <script>
        (function($){
            "use strict";
            $(document).ready(function() {
                <x-bulk-action-js :url="route('admin.jobs.applicant.bulk.delete')"/>

                $('.summernote').summernote({
                    height: 250,   //set editable area's height
                    codemirror: { // codemirror options
                        theme: 'monokai'
                    },
                    callbacks: {
                        onChange: function(contents, $editable) {
                            $(this).prev('input').val(contents);
                        }
                    }
                });

                $(document).on('click','.send_mail_btn',function(){
                    var el = $(this);
                    var name = el.data('name');
                    var email = el.data('email');
                    var id = el.data('id');
                    var modalContainerId = $('#send_mail_modal form');

                    modalContainerId.find('input[name="name"]').val(name);
                    modalContainerId.find('input[name="email"]').val(email);
                    modalContainerId.find('input[name="applicant_id"]').val(id);
                });

                $('.table-wrap > table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('admin.jobs.applicant') }}",
                    columns: [
                        {data: 'checkbox', name: '', orderable: false, searchable: false},
                        {data: 'id', name: 'id'},
                        {data: 'job_title', name: '' ,orderable: false, searchable: false},
                        {data: 'job_position'},
                        {data: 'date'},
                        {data: 'action', name: '', orderable: false, searchable: false},
                    ]
                });
            } );
        })(jQuery);
    </script>
    <script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
    @include('backend.partials.media-upload.media-js')
@endsection

