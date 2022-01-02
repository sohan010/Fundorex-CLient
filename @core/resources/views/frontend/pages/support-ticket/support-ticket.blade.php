@extends('frontend.frontend-page-master')
@section('site-title')
    {{get_static_option('support_ticket_page_name')}}
@endsection
@section('page-title')
    {{get_static_option('support_ticket_page_name')}}
@endsection
@section('page-meta-data')
    <meta name="description" content="{{get_static_option('about_page_meta_description')}}">
    <meta name="tags" content="{{get_static_option('about_page_meta_tags')}}">
@endsection
@section('content')
    <section class="support-ticket-page-area padding-top-120 padding-bottom-120">
        <div class="container">
            <div class="row justify-content-center">
               <div class="col-lg-8">
                   <div class="support-ticket-wrapper">
                       @if(auth()->guard('web')->check())
                           <h3 class="title">{{get_static_option('support_ticket_form_title')}}</h3>
                          <x-msg.success/>
                          <x-msg.error/>
                           <form action="{{route('frontend.support.ticket.store')}}" method="post" class="support-ticket-form-wrapper" enctype="multipart/form-data">
                               @csrf
                               <input type="hidden" name="via" value="{{__('website')}}">
                                <div class="form-group">
                                    <label>{{__('Title')}}</label>
                                    <input type="text" class="form-control" name="title" placeholder="{{__('Title')}}">
                                </div>
                               <div class="form-group">
                                   <label>{{__('Subject')}}</label>
                                    <input type="text" class="form-control" name="subject" placeholder="{{__('Subject')}}">
                                </div>
                               <div class="form-group">
                                   <label>{{__('Priority')}}</label>
                                   <select name="priority" class="form-control">
                                       <option value="low">{{__('Low')}}</option>
                                       <option value="medium">{{__('Medium')}}</option>
                                       <option value="high">{{__('High')}}</option>
                                       <option value="urgent">{{__('Urgent')}}</option>
                                   </select>
                               </div>
                               <div class="form-group">
                                   <label>{{__('Departments')}}</label>
                                   <select name="department_id" class="form-control">
                                       @foreach($departments as $dep)
                                       <option value="{{$dep->id}}">{{$dep->name}}</option>
                                       @endforeach
                                   </select>
                               </div>
                               <div class="form-group">
                                   <label>{{__('Description')}}</label>
                                   <textarea name="description"class="form-control" cols="30" rows="10" placeholder="{{__('Description')}}"></textarea>
                               </div>
                              <div class="btn-wrapper text-center">
                                  <button type="submit">{{get_static_option('support_ticket_button_text')}}</button>
                              </div>
                           </form>
                       @else
                           @include('frontend.partials.ajax-login-form',['title' => get_static_option('support_ticket_login_notice')])
                       @endif
                   </div>
               </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    @include('frontend.partials.ajax-login-js')
@endsection
