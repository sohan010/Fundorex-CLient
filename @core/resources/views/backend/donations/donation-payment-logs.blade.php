@extends('backend.admin-master')
@section('style')
    <x-datatable.css/>
@endsection
@section('site-title')
    {{__('All Donation Logs')}}
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
                                    <div id="winnder-msg-body"></div>
                                    <x-msg.error/>
                                    <x-msg.success/>
                                    <div class="header-wrap d-flex justify-content-between">
                                        <div class="left-part">
                                            <h4 class="header-title">{{__('All Donation Logs')}}</h4>
                                            <div class="bulk-delete-wrapper">
                                                <div class="select-box-wrap">
                                                    <select name="bulk_option" id="bulk_option">
                                                        <option value="">{{{__('Bulk Action')}}}</option>
                                                        <option value="delete">{{{__('Delete')}}}</option>
                                                    </select>
                                                    <button class="btn btn-primary btn-sm" id="bulk_delete_btn">{{__('Apply')}}</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="btn-wrapper">
                                            <a href="{{route('admin.donations.all')}}" class="btn btn-primary">{{__('All Causes')}}</a>
                                        </div>
                                    </div>
                                    <div class="data-tables datatable-primary table-responsive table-wrap">
                                        <table id="all_user_table" >
                                            <thead class="text-capitalize">
                                            <tr>
                                                <th class="no-sort">
                                                    <div class="mark-all-checkbox">
                                                        <input type="checkbox" class="all-checkbox">
                                                    </div>
                                                </th>
                                                <th>{{__('ID')}}</th>
                                                <th>{{__('Info')}}</th>
                                                <th>{{__('Status')}}</th>
                                                <th>{{__('Action')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>00
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="winners_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Winner(s)')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="winner-wrap">
                        <div class="alert alert-info">
                            {{__('if you choose new winner reload the page to see winner here')}}
                        </div>
                        <ul>
                            @forelse($winners as $winner)
                                <li class="individual-winner">
                                    <div class="thumb">
                                        <img src="{{asset('assets/uploads/winner.png')}}" alt="">
                                    </div>
                                    <div class="content">
                                        <h3 class="title">{{$winner->name}}</h3>
                                        <span class="email">{{$winner->email}}</span>
                                    </div>
                                </li>
                            @empty
                                <li>{{__('Now winner is selected')}}</li>
                            @endforelse

                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('backend.partials.datatable.script-enqueue',['only_js' => true])
    <script type="text/javascript">
        $(function () {


            <x-bulk-action-js :url="route('admin.donations.payment.bulk.action')" />

            $(document).ready(function (){
                $('.table-wrap > table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('admin.donations.donors',$id) }}",
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
    </script>
@endsection

