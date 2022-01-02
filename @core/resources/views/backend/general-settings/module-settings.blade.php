@extends('backend.admin-master')
@section('style')
    <link rel="stylesheet" href="{{asset('assets/backend/css/colorpicker.css')}}">
@endsection
@section('site-title')
    {{__('Module Settings')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                @include('backend.partials.message')
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__("Module Settings")}}</h4>
                        <form action="{{route('admin.general.module.settings')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="job_module_status"><strong>{{__('Jobs Module Enable/Disable')}}</strong></label>
                                <label class="switch">
                                    <input type="checkbox" name="job_module_status"  @if(!empty(get_static_option('job_module_status'))) checked @endif id="job_module_status">
                                    <span class="slider onff"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="events_module_status"><strong>{{__('Events Module Enable/Disable')}}</strong></label>
                                <label class="switch">
                                    <input type="checkbox" name="events_module_status"  @if(!empty(get_static_option('events_module_status'))) checked @endif id="events_module_status">
                                    <span class="slider onff"></span>
                                </label>
                            </div>

                            <div class="form-group">
                                <label for="donations_module_status"><strong>{{__('Donations Module Enable/Disable')}}</strong></label>
                                <label class="switch">
                                    <input type="checkbox" name="donations_module_status"  @if(!empty(get_static_option('donations_module_status'))) checked @endif id="donations_module_status">
                                    <span class="slider onff"></span>
                                </label>
                            </div>

                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Changes')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
