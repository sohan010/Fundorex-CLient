@extends('backend.admin-master')
@section('style')
    @include('backend.partials.datatable.style-enqueue')
    <x-media.css/>
@endsection
@section('site-title')
    {{__('All Donations')}}
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
                        <h4 class="header-title">{{__('All Donations Cause')}}</h4>
                        <div class="bulk-delete-wrapper">
                            @can('donation-delete')
                                <x-bulk-action/>
                            @endcan
                            @can('donation-create')
                                <div class="btn-wrapper pull-right mb-3">
                                    <a href="{{route('admin.donations.new')}}"
                                       class="btn btn-info">{{__('Add New Cause')}}</a>
                                </div>
                            @endcan
                        </div>

                        <div class="table-wrap table-responsive">
                            <table class="table table-default">
                                <thead>
                                <x-bulk-th/>
                                <th>{{__('ID')}}</th>
                                <th>{{__('Info')}}</th>
                                <th>{{__('Image')}}</th>
                                <th>{{__('Category')}}</th>
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
    <script>
        (function ($) {
            "use strict";
            $(document).ready(function () {
                <x-bulk-action-js :url="route('admin.donations.bulk.action')"/>
            })
        })(jQuery)
    </script>
    @include('backend.partials.datatable.script-enqueue',['only_js' => true])

    @include('backend.partials.media-upload.media-js')

    <script type="text/javascript">
        $(function () {

            $(document).ready(function () {
                $('.table-wrap > table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('admin.donations.all') }}",
                    columns: [
                        {data: 'checkbox', name: '', orderable: false, searchable: false},
                        {data: 'id', name: 'id'},
                        {data: 'info', name: '', orderable: false, searchable: false},
                        {data: 'image', name: '', orderable: false, searchable: false},
                        {data: 'category', name: ''},
                        {data: 'action', name: '', orderable: false, searchable: false},
                    ]
                });
            });

        });
    </script>
@endsection
