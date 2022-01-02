@extends('backend.admin-master')
@section('style')
    <x-datatable.css/>
@endsection
@section('site-title')
    {{__('All Posted Jobs')}}
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
                        <h4 class="header-title">{{__('All Posted Jobs')}}
                            @can('job-create')
                                <a class="btn btn-info btn-sm pull-right mb-3"
                                   href="{{route('admin.jobs.new')}}">{{__('Add New Jobs ')}}</a>
                            @endcan
                        </h4>
                        @can('job-delete')
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

                        <div class="table-wrap table-responsive">
                            <table class="table table-default" id="all_blog_table">
                                <thead>
                                <th class="no-sort">
                                    <div class="mark-all-checkbox">
                                        <input type="checkbox" class="all-checkbox">
                                    </div>
                                </th>
                                <th>{{__('ID')}}</th>
                                <th>{{__('Title')}}</th>
                                <th>{{__('Posted At')}}</th>
                                <th>{{__('Deadline')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                @foreach($all_jobs as $data)
                                    <tr>
                                        <td>
                                            <div class="bulk-checkbox-wrapper">
                                                <input type="checkbox" class="bulk-checkbox" name="bulk_delete[]"
                                                       value="{{$data->id}}">
                                            </div>
                                        </td>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->title}}</td>
                                        <td>{{date_format($data->created_at,'d - M - Y')}}</td>
                                        <td>{{date("d - M - Y", strtotime($data->deadline))}}</td>
                                        <td>
                                            @if($data->status == 'draft')
                                                <span class="alert alert-warning">{{__('Draft')}}</span>
                                            @else
                                                <span class="alert alert-success">{{__('Publish')}}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @can('job-delete')
                                                <x-delete-popover :url="route('admin.jobs.delete',$data->id)"/>
                                            @endcan
                                            @can('job-edit')
                                                <a class="btn btn-lg btn-primary btn-xs mb-3 mr-1"
                                                   href="{{route('admin.jobs.edit',$data->id)}}">
                                                    <i class="ti-pencil"></i>
                                                </a>
                                                <form action="{{route('admin.jobs.clone')}}" method="post"
                                                      style="display: inline-block">
                                                    @csrf
                                                    <input type="hidden" name="item_id" value="{{$data->id}}">
                                                    <button type="submit" title="clone this to new draft"
                                                            class="btn btn-xs btn-secondary btn-sm mb-3 mr-1"><i
                                                                class="far fa-copy"></i></button>
                                                </form>
                                            @endcan
                                            <a class="btn btn-lg btn-info btn-xs mb-3 mr-1" target="_blank"
                                               href="{{route('frontend.jobs.single',$data->slug)}}">
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
@endsection

@section('script')
    <x-datatable.js/>

    <script>
        (function ($) {
            "use strict";
            $(document).ready(function () {
                <x-bulk-action-js :url="route('admin.jobs.bulk.action')"/>
            });
        })(jQuery);
    </script>
@endsection
