@extends('backend.admin-master')
@section('style')
    <x-datatable.css/>
@endsection
@section('site-title')
    {{__('All Event Payment Logs')}}
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
                                    <h4 class="header-title">{{__('All Event Payment Logs')}}</h4>
                                   @can('event-payment-log-delete')
                                        <div class="bulk-delete-wrapper">
                                            <div class="select-box-wrap">
                                                <select name="bulk_option" id="bulk_option">
                                                    <option value="">{{{__('Bulk Action')}}}</option>
                                                    <option value="delete">{{{__('Delete')}}}</option>
                                                </select>
                                                <button class="btn btn-primary btn-sm" id="bulk_delete_btn">{{__('Apply')}}</button>
                                            </div>
                                        </div>
                                    @endcan
                                    <div class="data-tables datatable-primary table-responsive table-wrap">
                                        <table  >
                                            <thead class="text-capitalize">
                                            <tr>
                                                <th class="no-sort">
                                                    <div class="mark-all-checkbox">
                                                        <input type="checkbox" class="all-checkbox">
                                                    </div>
                                                </th>
                                                <th>{{__('ID')}}</th>
                                                <th>{{__('Payer Name')}}</th>
                                                <th>{{__('Package Gateway')}}</th>
                                                <th>{{__('Status')}}</th>
                                                <th>{{__('Date')}}</th>
                                                <th>{{__('Action')}}</th>
                                            </tr>
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
            </div>
        </div>
    </div>


@endsection

@section('script')
        <x-datatable.js :onlyjs="true"/>
    <script>
        (function($){
            "use strict";
            $(document).ready(function($) {
            <x-bulk-action-js :url="route('admin.event.payment.bulk.action')"/>

                $('.table-wrap > table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('admin.event.payment.logs') }}",
                    columns: [
                        {data: 'checkbox', name: '', orderable: false, searchable: false},
                        {data: 'id', name: 'id'},
                        {data: 'payer_name', name: '' ,orderable: false, searchable: false},
                        {data: 'payment_gateway'},
                        {data: 'status'},
                        {data: 'date'},
                        {data: 'action', name: '', orderable: false, searchable: false},
                    ]
                });

            } );
        })(jQuery)
    </script>
@endsection

