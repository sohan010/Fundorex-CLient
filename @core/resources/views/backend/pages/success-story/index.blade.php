@extends('backend.admin-master')
@section('style')
    @include('backend.partials.datatable.style-enqueue')
    <x-media.css/>
@endsection
@section('site-title')
    {{__('Success Stories')}}
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
                        <h4 class="header-title">{{__('All Success Stories Items')}}</h4>
                        <div class="bulk-delete-wrapper">
                                @can('success-story-delete')
                                <x-bulk-action/>
                                @endcan

                                @can('success-story-create')
                               <div class="btn-wrapper">
                                   <a href="{{route('admin.success.story.new')}}" class="btn btn-info pull-right mb-3">{{__("Add New")}}</a>
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
                                <th>{{__('Date')}}</th>
                                <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                @foreach($all_success_stories as $data)
                                    <tr>
                                        <td>
                                            <x-bulk-delete-checkbox :id="$data->id"/>
                                        </td>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->title}}</td>
                                        <td>
                                            {!! render_attachment_preview_for_admin($data->image) !!}
                                        </td>
                                        <td>{{ $data->category->name ?? 'Uncategorized' }}</td>
                                        <td>
                                            <x-status-span :status="$data->status"/>
                                        </td>
                                        <td>{{date_format($data->created_at,'d M Y')}}</td>
                                        <td>
                                            @can('success-story-delete')
                                            <x-delete-popover :url="route('admin.success.story.delete',$data->id)"/>
                                            @endcan

                                           @can('success-story-edit')
                                            <x-edit-icon :url="route('admin.success.story.edit',$data->id)"/>
                                            <x-clone-icon :action="route('admin.success.story.clone')" :id="$data->id"/>
                                           @endcan

                                            <x-view-icon :url="route('frontend.success.story.single', $data->slug)"/>
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
        <x-bulk-action-js :url="route('admin.success.story.bulk.action')"/>
    </script>
    @include('backend.partials.datatable.script-enqueue')
@endsection
