@extends('frontend.user.dashboard.user-master')
@section('style')
    <x-media.css/>
@endsection
@section('section')
    <div class="dashboard-form-wrapper">
        <h2 class="title text-center mb-4">{{__('KYC Verify Form')}}</h2>
        <form action="{{route('user.dashboard.verify.info.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{auth()->guard('web')->user()->id}}">
            <div class="form-group">
                <label for="name">{{__('Name according to ID Card')}}</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Your Name">
            </div>

            <div class="form-group">
                <label for="email">{{__('Date of Birth')}}</label>
                <input type="date" id="tanggal" name="date_of_birth" class="form-control d-block mb-25" placeholder="yyyy/mm/dd">
            </div>

            <div class="form-group">
                <label for="image">{{__('Family Card Photo')}}</label>
                <div class="media-upload-btn-wrapper">
                    <div class="img-wrap">
{{--                        {!! render_attachment_preview_for_admin($user_details->image) !!}--}}
                    </div>
                    <input type="hidden" name="family_card_photo">
                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                        {{__('Upload Image')}}
                    </button>
                </div>
                <small>{{__('Recommended image size max: 5mb')}}</small>
            </div>

            <div class="form-group">
                <label for="image">{{__('Selfie Image')}}</label>
                <div class="media-upload-btn-wrapper">
                    <div class="img-wrap">

                    </div>
                    <input type="hidden" name="selfie_photo">
                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                        {{__('Upload Image')}}
                    </button>
                </div>
                <small>{{__('Recommended image size max: 5mb')}}</small>
            </div>

            <div class="form-group">
                <label for="image">{{__('Selfie Photo Using KTP')}}</label>
                <div class="media-upload-btn-wrapper">
                    <div class="img-wrap">

                    </div>
                    <input type="hidden" name="selfie_with_family_card_photo">
                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                        {{__('Upload Image')}}
                    </button>
                </div>
                <small>{{__('Recommended image size max: 5mb')}}</small>
            </div>

            <div class="btn-wrapper">
              <button type="submit" class="btn btn-primary btn-md mt-3">{{__('Submit')}}</button>
          </div>
        </form>
    </div>
    <x-media.markup
            :userUpload="true"
            :imageUploadRoute="route('user.upload.media.file')">
    </x-media.markup>
@endsection

@section('scripts')

    <x-media.js
            :deleteRoute="route('user.upload.media.file.delete')"
            :imgAltChangeRoute="route('user.upload.media.file.alt.change')"
            :allImageLoadRoute="route('user.upload.media.file.all')">
    </x-media.js>
@endsection
