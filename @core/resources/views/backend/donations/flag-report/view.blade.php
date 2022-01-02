@extends('backend.admin-master')
@section('site-title')
    {{__('Flag Report View')}}
@endsection
@section('style')
    <x-media.css/>
@endsection

@section('content')
    <div class="col-lg-12 col-ml-12 margin-top-40">
        <div class="row">
            <div class="col-lg-12 mt-t">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="left">
                                <h4 class="header-title">{{__('Flag Report View')}}</h4>
                            </div>
                            <div class="right">
                                <a href="{{route('admin.donations.flag.reports')}}" class="btn btn-primary btn-sm">{{__('All Flag Report')}}</a>
                            </div>
                        </div>
                        <ul>
                            <li><strong>{{__('Cause Name ')}}:</strong> {{$flag_report->cause->name ?? ''}}</li>
                            <li><strong>{{__('Name')}}:</strong> {{$flag_report->name}}</li>
                            <li><strong>{{__('Email')}}:</strong> {{$flag_report->email}}</li>
                            <li><strong>{{__('Subject')}}:</strong> {{$flag_report->subject}}</li>
                            <li><strong>{{__('Description')}} :</strong> {{ $flag_report->description }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
