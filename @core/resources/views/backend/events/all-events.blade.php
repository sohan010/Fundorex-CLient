@extends('backend.admin-master')
@section('style')
    @include('backend.partials.datatable.style-enqueue')
    <x-media.css/>
@endsection
@section('site-title')
    {{__('All Events')}}
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
                        <h4 class="header-title">{{__('All Events')}}</h4>
                        <div class="bulk-delete-wrapper">
                            @can('event-delete')
                                <x-bulk-action/>
                            @endcan
                            @can('event-create')
                                <div class="btn-wrapper">
                                    <a href="{{route('admin.events.new')}}"
                                       class="btn btn-info pull-right mb-3">{{__('Add New Event')}}</a>
                                </div>
                            @endcan
                        </div>

                        <div class="table-wrap table-responsive">
                            <table class="table table-default" id="all_blog_table">
                                <thead>
                                <x-bulk-th/>
                                <th>{{__('ID')}}</th>
                                <th>{{__('Title')}}</th>
                                <th>{{__('Image')}}</th>
                                <th>{{__('Category')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                @foreach($all_events as $data)
                                    <tr>
                                        <td>
                                            <x-bulk-delete-checkbox :id="$data->id"/>
                                        </td>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->title}}</td>
                                        <td>
                                            <div class="img-wrap">
                                                {!! render_attachment_preview_for_admin($data->image) !!}
                                            </div>
                                        </td>
                                        <td>{{get_events_category_by_id($data->category_id)}}</td>
                                        <td>
                                            <x-status-span :status="$data->status"/>
                                        </td>
                                        <td>
                                            @can('event-delete')
                                                <x-delete-popover :url="route('admin.events.delete',$data->id)"/>
                                            @endcan
                                            @can('event-edit')
                                                <x-edit-icon :url="route('admin.events.edit',$data->id)"/>
                                                <x-clone-icon :action="route('admin.events.clone')" :id="$data->id"/>
                                            @endcan
                                            <x-view-icon :url="route('frontend.events.single',$data->slug)"/>
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
    <script>
        (function ($) {
            "use strict";
            $(document).ready(function () {
                <x-bulk-action-js :url="route('admin.events.bulk.action')"/>
            })
        })(jQuery);
    </script>
    @include('backend.partials.datatable.script-enqueue')
@endsection
