@extends('backend.admin-master')
@section('site-title')
    {{__('Home Variant Settings')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <!-- basic form start -->
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                @include('backend/partials/message')
                @include('backend/partials/error')
            </div>
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__('Home Variant')}}</h4>
                        <form action="{{route('admin.home.variant')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" class="form-control"  id="home_page_variant" value="{{get_static_option('home_page_variant')}}" name="home_page_variant">
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-6">
                                    <div class="img-select selected">
                                        <div class="img-wrap">
                                            <img src="{{asset('assets/frontend/home-variant/home-01.png')}}" data-home_id="01" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="img-select">
                                        <div class="img-wrap">
                                            <img src="{{asset('assets/frontend/home-variant/home-02.png')}}" data-home_id="02" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="img-select">
                                        <div class="img-wrap">
                                            <img src="{{asset('assets/frontend/home-variant/home-03.png')}}" data-home_id="03" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="img-select">
                                        <div class="img-wrap">
                                            <img src="{{asset('assets/frontend/home-variant/home-04.png')}}" data-home_id="04" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="img-select">
                                        <div class="img-wrap">
                                            <img src="{{asset('assets/frontend/home-variant/home-05.png')}}" data-home_id="05" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="img-select">
                                        <div class="img-wrap">
                                            <img src="{{asset('assets/frontend/home-variant/home-06.png')}}" data-home_id="06" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button id="update" type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Home Variant')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        (function($){
            "use strict";

            $(document).ready(function () {
                <x-btn.update/>
                var imgSelect = $('.img-select');
                var id = $('#home_page_variant').val();
                imgSelect.removeClass('selected');
                $('img[data-home_id="'+id+'"]').parent().parent().addClass('selected');
                $(document).on('click','.img-select img',function (e) {
                    e.preventDefault();
                    imgSelect.removeClass('selected');
                    $(this).parent().parent().addClass('selected').siblings();
                    $('#home_page_variant').val($(this).data('home_id'));
                })
            })

        })(jQuery);
    </script>
@endsection