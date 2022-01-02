@extends('backend.admin-master')
@section('site-title')
    {{__('Donation Single Page Bottom Variant')}}
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
                        <h4 class="header-title">{{__('Donation Single Page Bottom Variant')}}</h4>
                        <form action="{{route('admin.donations.single.page.variant')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" class="form-control"  id="donation_single_page_variant" value="{{get_static_option('donation_single_page_variant')}}" name="donation_single_page_variant">
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-6">
                                    <div class="img-select selected">
                                        <div class="img-wrap">
                                            <img title="General View"  src="{{asset('assets/frontend/donation-single-bottom-variant/general-view.png')}}" data-donation_single_page_variant_id="01" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="img-select">
                                        <div class="img-wrap">
                                            <img title="Tab View"src="{{asset('assets/frontend/donation-single-bottom-variant/tab-view.png')}}" data-donation_single_page_variant_id="02" alt="">
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
                var id = $('#donation_single_page_variant').val();
                imgSelect.removeClass('selected');
                $('img[data-donation_single_page_variant_id="'+id+'"]').parent().parent().addClass('selected');

                $(document).on('click','.img-select img',function (e) {
                    e.preventDefault();
                    imgSelect.removeClass('selected');
                    $(this).parent().parent().addClass('selected').siblings();
                    $('#donation_single_page_variant').val($(this).data('donation_single_page_variant_id'));
                })



            })

        })(jQuery);
    </script>
@endsection