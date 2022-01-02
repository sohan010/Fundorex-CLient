@extends('backend.admin-master')
@section('site-title')
    {{__('All Pages')}}
@endsection
@section('style')
    <x-datatable.css/>
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
                            <h4 class="header-title">{{__('All Pages')}}  </h4>
                            @can('page-create')
                                <div class="header-title">
                                    <a href="{{ route('admin.page.new') }}"
                                       class="btn btn-primary mt-4 pr-4 pl-4">{{__('Add New Page')}}</a>
                                </div>
                            @endcan
                        </div>
                        @can('page-delete')
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
                                <th>{{__('Title')}}</th>
                                <th>{{__('Date')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                @foreach($all_pages as $data)
                                    <tr class="{{ $data['id']}}">
                                        <td>
                                            <x-bulk-delete-checkbox :id="$data->id"/>
                                        </td>
                                        <td>{{$data->id}}</td>
                                        <td>{{($data->title) ?? __('Untitled')}}</td>
                                        <td>{{$data->created_at->diffForHumans()}}</td>
                                        <td>
                                            <x-status-span :status="$data->status"/>
                                        </td>
                                        <td>
                                            @can('page-delete')
                                                <x-delete-popover :url="route('admin.page.delete',$data->id)"/>
                                            @endcan
                                            @can('page-edit')
                                                <x-edit-icon :url="route('admin.page.edit',$data->id)"/>
                                            @endcan

                                            <x-view-icon :url="route('frontend.dynamic.page',[$data->slug,$data->id])"/>
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
@endsection

@section('script')
    @include('backend.partials.datatable.script-enqueue')
    <script>
        (function ($) {
            "use strict";
            $(document).ready(function () {
                <x-bulk-action-js :url="route('admin.page.bulk.action')" />
            });
        })(jQuery);
    </script>
@endsection
