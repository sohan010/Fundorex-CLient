@extends('frontend.frontend-page-master')
@php
  $post_img = null;
  $blog_image = get_attachment_image_by_id($donation->image,"full",false);
  $post_img = !empty($blog_image) ? $blog_image['img_url'] : '';
 @endphp
@section('og-meta')
    <meta property="og:url" content="{{route('frontend.donations.single',$donation->slug)}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{$donation->title}}"/>
    {!! render_og_meta_image_by_attachment_id($donation->image) !!}
    
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{$donation->title}}">
    <meta property="og:description" content="{{strip_tags($donation->cause_content)}}">
    <meta property="og:image" content="{{$post_img}}"/>
    <meta property="og:image:type" content="{{$post_img}}" />
    <meta property="og:image:width" content="600" />
    <meta property="og:image:height" content="315" />
    <meta property="og:url" content="{{route('frontend.donations.single',$donation->slug)}}">
    <meta name="twitter:card" content="summary_large_image">
@endsection

@section('site-title')
    {{$donation->title}}
@endsection

@section('page-title')
    {{$donation->title}}
@endsection
@section('page-meta-data')
    <meta name="description" content="{{$donation->meta_tags}}">
    <meta name="tags" content="{{$donation->meta_description}}">
    <meta itemprop="name" content="{{$donation->title}}">
    <meta itemprop="description" content="{{$donation->meta_description}}">
    <meta itemprop="image" content="{{$post_img}}">
@endsection
@section('content')
    <div class="contatiner">
        <!-- detail -->
        <div class="row mb-100 pt-4 pl-25 pr-25">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 mx-auto">
                <div class="card w-100 cardDetail">
                   {!! render_image_markup_by_attachment_id($donation->image) !!}
                    <a href="{{url('/')}}" class="detailBack">
                        <i class="bi bi-arrow-left-circle-fill arrow-left-circle-fill-icon"></i>
                    </a>
                    <div class="single-custom-content">

                    <div class="card-body pl-25 pr-25">
                        <h5 class="fw-bold card-title">{{$donation->title ?? ''}}</h5>

                        <h6><i class="bi bi-people-fill people-fill-icon"></i> {{$donors_count ?? ''}} Donatur
                            <span class="p-5"><i class="bi bi-stopwatch-fill stopwatch-fill-icon"></i> {{$time_remaining}} Hari lagi</span></h6>
                        <p class="card-text">Dompet Dhuafa <i class="bi bi-check-circle-fill check-circle-fill-icon"></i></p>



                        <div class="progress-item">
                            <div class="single-progressbar">
                                <div class="donation-progress" data-percentage="{{get_percentage($donation->amount,$donation->raised)}}"></div>
                            </div>
                        </div>

                        <div class="goal">
                            <div class="left">
                                <span class="title">Terkumpul</span>
                                <h4 class="raised">{{__('Raised')}}: {{amount_with_currency_symbol($donation->raised ?? 0 )}}</h4>
                            </div>
                            <div class="right">
                                <span class="title">Target</span>
                                <h4 class="raised">{{__('Goal')}}: {{amount_with_currency_symbol($donation->amount)}}</h4>
                            </div>
                        </div>

                        <!-- tab -->
                        <ul class="nav nav-tabs pt-4" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="Campaign-tab" data-bs-toggle="tab" data-bs-target="#Campaign" type="button" role="tab" aria-controls="Campaign" aria-selected="true">Campaign</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="Perkembangan-tab" data-bs-toggle="tab" data-bs-target="#Perkembangan" type="button" role="tab" aria-controls="Perkembangan" aria-selected="false">Perkembangan</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="Donatur-tab" data-bs-toggle="tab" data-bs-target="#Donatur" type="button" role="tab" aria-controls="Donatur" aria-selected="false">Donatur</button>
                            </li>
                        </ul>

                        <div class="tab-content pt-4">
                            <div class="tab-pane active" id="Campaign" role="tabpanel" aria-labelledby="Campaign-tab">
                            {!! purify_html_raw($donation->cause_content) !!}
                            </div>
                            <div class="tab-pane" id="Perkembangan" role="tabpanel" aria-labelledby="Perkembangan-tab">
                                <div class="row">
                                    <div class="col-md-12 offset-md-12">
                                        <ul class="timeline">
                                            @foreach($withdraw_logs as $with)
                                            <li>
                                                <i class="bi bi-check-circle-fill check-circle-fill-icon"></i>
                                                <a href="#">{{ date('d M Y',strtotime($with->created_at)) }}</a>
                                                <p>Penarikan dana sebesar {{amount_with_currency_symbol($with->withdraw_request_amount)}} ke Fundraiser </p>
                                            </li>

                                             @endforeach

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="Donatur" role="tabpanel" aria-labelledby="Donatur-tab">


                                @foreach($all_donors as $donor)
                                <img src="{{asset('assets/frontend/img/donatur1.png')}}" class="img-circle float-start" alt="Donasi - Donatur">
                                <span class="float-start">{{$donor->name}}</span>
                                <span class="float-end">{{ amount_with_currency_symbol($donor->amount) }}</span>
                                <p class="testimoniDonatur">{{ optional($donor->cause)->title }}
                                    <br>{{$donor->created_at->diffForHUmans()}}</p>
                                @endforeach

                                <a href="{{route('frontend.donation.all.donor.page')}}" class="lihatSemuaDonatur d-block text-center">Lihat semua</a>
                            </div>
                        </div>

                      <div class="row">
                          <div class="col-5 d-grid float-start pr-5 pt-3">
                              {{--<a href="" type="button" class="btn btn-outline-success"><i class="bi bi-share share-icon"></i> Bagikan</a>--}}
                              <div class="share-list-icon">
                                  <h5 class="share-title"> {{__('Share:')}} </h5>
                                  <ul class="social-links">
                                      @php
                                          $image_url = get_attachment_image_by_id($donation->image);
                                          $img_url = $image_url['img_url'] ?? '';
                                      @endphp
                                      {!! single_post_share(route('frontend.donations.single',$donation->slug), $donation->title, $img_url) !!}
                                  </ul>
                              </div>
                          </div>
                          <div class="col-7 d-grid float-start pl-5 pt-3 text-right">
                              <a href="{{ route('frontend.donation.in.separate.page',$donation->id) }}"  class="btn btn-outline-success">Donasi</a>
                          </div>
                      </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /detail -->


    </div>




@endsection

@section('scripts')
 <script src="{{asset('assets/common/js/countdown.jquery.js')}}"></script>
    <script>
        (function ($) {
            'use strict';

            $(document).ready(function () {
                <x-btn.submit/>

            @if(!empty(get_static_option('donation_single_page_countdown_status')))
            var ev_offerTime = "{{$donation->deadline}}";
            var ev_year = ev_offerTime.substr(0, 4);
            var ev_month = ev_offerTime.substr(5, 2);
            var ev_day = ev_offerTime.substr(8, 2);

            if (ev_offerTime) {
                $('#event_countdown').countdown({
                    year: ev_year,
                    month: ev_month,
                    day: ev_day,
                    labels: true,
                    labelText: {
                        'days': "{{__('days')}}",
                        'hours': "{{__('hours')}}",
                        'minutes': "{{__('min')}}",
                        'seconds': "{{__('sec')}}",
                    }
                });
            }
            @endif

                //Cause content
                $(document).on('click', '#ReadMoreButton', function (e) {
                    e.preventDefault();
                    var data = "";


                    $('#main-data').html('{!!  $donation->cause_content !!}');
                    $(this).text('');

                });

                //Cause Comment Insert
                $(document).on('click', '#submitComment', function (e) {
                    e.preventDefault();
                    var erContainer = $(".error-message");
                    var el = $(this);
                    var form = $('#cause-comment-form');
                    var user_id = $('#user_id').val();
                    var cause_id = $('#cause_id').val();
                    var commented_by = $('#commented_by').val();
                    var comment_content = $('#comment_content').val();
                    el.text('{{__('Submitting')}}..');

                    $.ajax({
                        url: form.attr('action'),
                        method: 'POST',
                        data: {
                            _token: "{{csrf_token()}}",
                            user_id: user_id,
                            cause_id: cause_id,
                            commented_by: commented_by,
                            comment_content: comment_content,
                        },
                        success: function (data) {
                            location.reload();
                        },
                        error: function (data) {
                            var errors = data.responseJSON;
                            erContainer.html('<div class="alert alert-danger"></div>');
                            $.each(errors.errors, function (index, value) {
                                erContainer.find('.alert.alert-danger').append('<p>' + value + '</p>');
                            });
                            el.text('{{__('Comment')}}');
                        },

                    });

                });

                //Load More Cause Comment Data
                var _token = $('input[name="_token"]').val();
                load_comment_data("{{$donation->id}}", _token);

                function load_comment_data(id = "", _token) {
                    var page = $('#comment_data').attr('data-page');

                    $.ajax({
                        url: "{{ route('frontend.load.cause.comment.data') }}",
                        method: "POST",
                        data: {id: id, _token: _token, page: page},
                        success: function (data) {
                            var appendData = '';

                            $.each(data, function (index, value) {
                                appendData += ' <div class="donor-comment"> '+
                                    '<span class="commented_by"> {{__('By')}} '+value.commented_by+' {{__('at')}} ' + value.date + '</span>' +
                                    '<p class="description">' + value.comment_content + '</p>' +
                                    '</div>';
                            });

                            if (data.length > 4) {
                                appendData += '<div id="load_more_div"> <button type="button" class="load-more-btn" id="load_more_comment_button">{{__('Load More')}}</button> </div>';
                            }
                            $('#load_more_div').remove();
                            $('#comment_data').append(appendData);
                            $('#comment_data').attr('data-page', parseInt(page) + 5);

                        }
                    })
                }

                $(document).on('click', '#load_more_comment_button', function () {
                    $('#load_more_comment_button').html('<b>{{__('Loading...')}}</b>');
                    load_comment_data('{{$donation->id}}', _token);
                });


                //Load More Donors Data
                var _token = $('input[name="_token"]').val();


                $(document).on('click', '#load_more_case_update_button', function () {
                    $('#load_more_case_update_button').html('<b>{{__('Loading...')}}</b>');
                    load_donation_update('{{$donation->id}}');
                });


                load_donation_update("{{$donation->id}}");

                function load_donation_update(id){
                    var parentContainer = $('#recent_update_about_cause');
                    var page = parentContainer.attr('data-page');
                    $.ajax({
                        url: "{{ route('frontend.load.cause.donation.update.data') }}", // defaine route for update load more
                        method: "POST",
                        data: {id: id, _token: "{{csrf_token()}}", page: page},
                        success: function (data) {
                            var appendData = '';
                            $('#load_more_case_update_button').remove();
                            $.each(data,function (index,value){
                               appendData += '<div class="cause-update-section-body">';
                               if (value.img_url){
                                   appendData += '<div class="thumb">' +value.img_markup+'<div class="img-pop-wrap"><a href="'+value.img_url+'" class="image-popup"><i class="fas fa-search"></i></a></div></div>';
                               }
                             appendData += '<div class="content">'+
                            '<h3 class="title">'+value.title+'</h3>'+
                            '<div id="time-creator">'+value.date+' {{__('by ')}}'+
                            '<span id="creator">'+value.created_by+'</span>'+
                            '</div> <p>'+value.description+'</p></div></div>';
                            });
                            if (data.length < 1) {
                                appendData += '<p class="not-found-button">{{__('No more update found')}}</p>';
                            } else {
                                appendData += '<div class="btn-wrapper load_more"> <button type="button" class="load-more-btn" id="load_more_case_update_button">{{__('Load More')}}</button> </div>';
                            }
                            parentContainer.append(appendData);
                            parentContainer.attr('data-page', parseInt(page) + 5);

                            $('.image-popup').magnificPopup({
                                type: 'image',
                                gallery: {
                                    // options for gallery
                                    enabled: true
                                },
                            });
                        }
                    })
                }
                load_data("{{$donation->id}}", _token);

                function load_data(id = "", _token) {
                    var page = $('#post_data').attr('data-page');
                    $.ajax({
                        url: "{{ route('frontend.load.cause.donor.data') }}",
                        method: "POST",
                        data: {id: id, _token: _token, page: page},
                        success: function (data) {
                            var appendData = '';
                            $('#load_more').remove();
                            $.each(data, function (index, value) {
                                appendData += ' <div class="donoer-info">' +
                                    '<div class="icon"><i class="fas fa-donate"></i></div>' +
                                    '<div class="content"><h3 class="title">' + value.name + '</h3>' +
                                    '<div class="dinfo"><span>' + value.amount + '</span>{{__('at')}} ' + value.date + '</div>' +
                                    '</div></div>';
                            });
                            if (data.length < 1) {
                                appendData += '<p class="not-found-button">{{__('No donor found')}}</p>';
                            } else {
                                appendData += '<div id="load_more" class="btn-wrapper"> <button type="button" class="load-more-btn" id="load_more_button">{{__('Load More')}}</button> </div>';
                            }
                            $('#post_data').append(appendData);
                            $('#post_data').attr('data-page', parseInt(page) + 5);
                        }
                    })
                }

                $(document).on('click', '#load_more_button', function () {
                    $('#load_more_button').html('<b>{{__('Loading...')}}</b>');
                    load_data('{{$donation->id}}', _token);
                });

                //Donation Charge
                $(document).on('keyup', '#donation_amount_user_input', function () {
                    var donation_amount_user_input = $('#donation_amount_user_input').val();
                    var show_charge_amount = $('#show_charge_amount').val();

                    $.ajax({
                        url: "{{ route('frontend.get.donation.charges.by.ajax') }}",
                        type: 'get',
                        dataType: 'JSON',

                        success: function (data) {
                            if (data.amount === 'percentage' && data.donation_charge_button_on) {
                                $('.amount_show').text(parseInt(donation_amount_user_input) * data.percentage / 100 + '{{site_currency_symbol()}}');

                            } else if (data.amount === 'fixed' && data.donation_charge_button_on) {

                                $('.amount_show').text(parseInt(data.fixed) + parseInt(donation_amount_user_input + '{{site_currency_symbol()}}'));

                            } else if (!data.donation_charge_button_on) {
                                $('#show_charge_amount').val('');
                            } else {
                                $('#show_charge_amount').val('');
                            }

                        }
                    });
                })
                //Copy Url
                var url = $('#donation_copy_id').data(url);
                var copy_field = $('#copy_field').val(url.url);

                $(document).on('click','.copy_btn',function(){
                    navigator.clipboard.writeText(copy_field.val())
                    $(this).html('<i class="fas fa-check"> {{__('Copied')}}</i>');
                     setTimeout(function(){
                         $('.copy_btn').text('Copy');
                     },3000);
                 });
            });

        })(jQuery);
    </script>
    @include('frontend.partials.ajax-login-js')
@endsection
