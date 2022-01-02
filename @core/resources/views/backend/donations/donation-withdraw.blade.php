@extends('backend.admin-master')
@section('style')
    @include('backend.partials.datatable.style-enqueue')
    <x-media.css/>
@endsection
@section('site-title')
    {{__('All Campaign Withdraw Requests')}}
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
                        <h4 class="header-title">{{__('All Campaign Withdraw Requests')}}</h4>
                        @can('donation-withdraw-delete')
                            <div class="bulk-delete-wrapper">
                                <x-bulk-action/>
                            </div>
                        @endcan

                        <div class="table-wrap table-responsive">
                            <table class="table table-default" id="all_blog_table">
                                <thead>
                                <x-bulk-th/>
                                <th>{{__('ID')}}</th>
                                <th>{{__('Info')}}</th>
                                <th>{{__('Withdraw Status')}}</th>
                                <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('backend.partials.media-upload.media-upload-markup')
@endsection

@section('script')
    <script src="{{asset('assets/backend/js/dropzone.js')}}"></script>

    @include('backend.partials.datatable.script-enqueue',['only_js' => true])
    @include('backend.partials.media-upload.media-js')
    <script>
        (function ($) {
            "use strict";
            $(document).ready(function () {
                <x-bulk-action-js :url="route('admin.donations.withdraw.bulk.action')"/>

                $(document).ready(function (){
                    $('.table-wrap > table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: "{{ route('admin.all.donation.withdraw.request') }}",
                        columns: [
                            {data: 'checkbox', name: '', orderable: false, searchable: false},
                            {data: 'id', name: 'id'},
                            {data: 'info', name: '' ,orderable: false, searchable: false},
                            {data: 'status'},
                            {data: 'action', name: '', orderable: false, searchable: false},
                        ]
                    });
                });

            });
        })(jQuery)
    </script>
@endsection
