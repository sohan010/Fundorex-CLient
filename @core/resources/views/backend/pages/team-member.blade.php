@extends('backend.admin-master')
@section('site-title')
    {{__('Team Member Item')}}
@endsection
@section('style')
    <x-media.css/>
    <x-datatable.css/>
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
                        <h4 class="header-title">{{__('Team Member Items')}}</h4>
                        <div class="bulk-delete-wrapper">
                            @can('team-member-delete')
                                <div class="select-box-wrap">
                                    <x-bulk-action/>
                                </div>
                            @endcan
                            @can('team-member-create')
                                <div class="btn-wrapper">
                                    <a href="" class="btn btn-info pull-right mb-4" data-toggle="modal"
                                       data-target="#new_team_member">{{__('Add New')}}</a>
                                </div>
                            @endcan
                        </div>
                        <div class="table-wrap table-responsive">
                            <table class="table table-default">
                                <thead>
                                <x-bulk-th/>
                                <th>{{__('ID')}}</th>
                                <th>{{__('Image')}}</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Designation')}}</th>
                                <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                @foreach($all_team_member as $data)
                                    @php $img_url =''; @endphp
                                    <tr>
                                        <td>
                                            <x-bulk-delete-checkbox :id="$data->id"/>
                                        </td>

                                        <td>{{$data->id}}</td>
                                        <td>
                                            @php
                                                $brand_img = get_attachment_image_by_id($data->image,null,true);
                                            @endphp
                                            @if (!empty($brand_img))
                                                <div class="attachment-preview">
                                                    <div class="thumbnail">
                                                        <div class="centered">
                                                            <img class="avatar user-thumb"
                                                                 src="{{$brand_img['img_url']}}" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                @php  $img_url = $brand_img['img_url']; @endphp
                                            @endif
                                        </td>
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->designation}}</td>
                                        <td>
                                            @can('team-member-delete')
                                            <x-delete-popover :url="route('admin.team.member.delete',$data->id)"/>
                                            @endcan
                                            @can('team-member-edit')
                                            <a href="#"
                                               data-toggle="modal"
                                               data-target="#team_member_item_edit_modal"
                                               class="btn btn-primary btn-xs mb-3 mr-1 team_member_edit_btn"
                                               data-id="{{$data->id}}"
                                               data-action="{{route('admin.team.member.update')}}"
                                               data-name="{{$data->name}}"
                                               data-imageid="{{$data->image}}"
                                               data-image="{{$img_url}}"
                                               data-designation="{{$data->designation}}"
                                               data-iconOne="{{$data->icon_one}}"
                                               data-iconTwo="{{$data->icon_two}}"
                                               data-iconThree="{{$data->icon_three}}"
                                               data-iconOneUrl="{{$data->icon_one_url}}"
                                               data-iconTwoUrl="{{$data->icon_two_url}}"
                                               data-iconThreeUrl="{{$data->icon_three_url}}"
                                            >
                                                <i class="ti-pencil"></i>
                                            </a>
                                            <x-clone-icon :action="route('admin.team.member.clone')" :id="$data->id"/>
                                            @endcan
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
    @can('team-member-create')
    <div class="modal fade" id="new_team_member" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('New Team Member')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{route('admin.team.member')}}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="name">{{__('Name')}}</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="{{__('Name')}}">
                        </div>
                        <div class="form-group">
                            <label for="designation">{{__('Designation')}}</label>
                            <input type="text" class="form-control" id="designation" name="designation"
                                   placeholder="{{__('Designation')}}">
                        </div>
                        <div class="form-group">
                            <label for="icon_one" class="d-block">{{__('Social Profile One')}}</label>
                            <div class="btn-group ">
                                <button type="button" class="btn btn-primary iconpicker-component">
                                    <i class="fab fa-instagram"></i>
                                </button>
                                <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                                        data-selected="fab fa-instagram" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu"></div>
                            </div>
                            <input type="hidden" class="form-control" id="icon_one" value="fab fa-instagram"
                                   name="icon_one">
                        </div>
                        <div class="form-group">
                            <label for="icon_one_url">{{__('Social Profile One URL')}}</label>
                            <input type="text" class="form-control" id="icon_one_url" name="icon_one_url"
                                   placeholder="{{__('Social Profile One URL')}}">
                        </div>
                        <div class="form-group">
                            <label for="icon_two" class="d-block">{{__('Social Profile Two')}}</label>
                            <div class="btn-group ">
                                <button type="button" class="btn btn-primary iconpicker-component">
                                    <i class="fab fa-twitter"></i>
                                </button>
                                <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                                        data-selected="fab fa-twitter" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu"></div>
                            </div>
                            <input type="hidden" class="form-control" id="icon_two" value="fab fa-twitter"
                                   name="icon_two">
                        </div>
                        <div class="form-group">
                            <label for="icon_two_url">{{__('Social Profile Two URL')}}</label>
                            <input type="text" class="form-control" id="icon_two_url" name="icon_two_url"
                                   placeholder="{{__('Social Profile Two URL')}}">
                        </div>
                        <div class="form-group">
                            <label for="icon_three" class="d-block">{{__('Social Profile Three')}}</label>
                            <div class="btn-group ">
                                <button type="button" class="btn btn-primary iconpicker-component">
                                    <i class="fab fa-facebook-f"></i>
                                </button>
                                <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                                        data-selected="fab fa-facebook-f" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu"></div>
                            </div>
                            <input type="hidden" class="form-control" id="icon_three" value="fab fa-facebook-f"
                                   name="icon_three">
                        </div>
                        <div class="form-group">
                            <label for="icon_three_url">{{__('Social Profile Three URL')}}</label>
                            <input type="text" class="form-control" id="icon_three_url" name="icon_three_url"
                                   placeholder="{{__('Social Profile Three URL')}}">
                        </div>
                        <div class="form-group">
                            <label for="image">{{__('Image')}}</label>
                            <div class="media-upload-btn-wrapper">
                                <div class="img-wrap"></div>
                                <input type="hidden" name="image">
                                <button type="button" class="btn btn-info media_upload_form_btn"
                                        data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}"
                                        data-toggle="modal" data-target="#media_upload_modal">
                                    {{__('Upload Image')}}
                                </button>
                            </div>
                            <small>{{__('Recommended image size 270x280')}}</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                        <button id="submit" type="submit" class="btn btn-primary">{{__('Submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endcan
    @can('team-member-edit')
    <div class="modal fade" id="team_member_item_edit_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Edit Team Member Item')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="#" id="team_member_edit_modal_form" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="id" id="team_member_id" value="">

                        <div class="form-group">
                            <label for="edit_name">{{__('Name')}}</label>
                            <input type="text" class="form-control" id="edit_name" name="name"
                                   placeholder="{{__('Name')}}">
                        </div>
                        <div class="form-group">
                            <label for="edit_designation">{{__('Designation')}}</label>
                            <input type="text" class="form-control" id="edit_designation" name="designation"
                                   placeholder="{{__('Designation')}}">
                        </div>
                        <div class="form-group">
                            <label for="edit_icon_one" class="d-block">{{__('Social Profile One')}}</label>
                            <div class="btn-group edit_icon_one">
                                <button type="button" class="btn btn-primary iconpicker-component">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </button>
                                <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                                        data-selected="fas fa-exclamation-triangle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu"></div>
                            </div>
                            <input type="hidden" class="form-control" id="edit_icon_one"
                                   value="fas fa-exclamation-triangle" name="icon_one">
                        </div>
                        <div class="form-group">
                            <label for="edit_icon_one_url">{{__('Social Profile One URL')}}</label>
                            <input type="text" class="form-control" id="edit_icon_one_url" name="icon_one_url"
                                   placeholder="{{__('Social Profile One URL')}}">
                        </div>
                        <div class="form-group">
                            <label for="edit_icon_two" class="d-block">{{__('Social Profile Two')}}</label>
                            <div class="btn-group edit_icon_two">
                                <button type="button" class="btn btn-primary iconpicker-component">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </button>
                                <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                                        data-selected="fas fa-exclamation-triangle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu"></div>
                            </div>
                            <input type="hidden" class="form-control" id="edit_icon_two"
                                   value="fas fa-exclamation-triangle" name="icon_two">
                        </div>
                        <div class="form-group">
                            <label for="edit_icon_two_url">{{__('Social Profile Two URL')}}</label>
                            <input type="text" class="form-control" id="edit_icon_two_url" name="icon_two_url"
                                   placeholder="{{__('Social Profile Two URL')}}">
                        </div>
                        <div class="form-group">
                            <label for="edit_icon_three" class="d-block">{{__('Social Profile Three')}}</label>
                            <div class="btn-group edit_icon_three">
                                <button type="button" class="btn btn-primary iconpicker-component">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </button>
                                <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                                        data-selected="fas fa-exclamation-triangle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu"></div>
                            </div>
                            <input type="hidden" class="form-control" id="edit_icon_three"
                                   value="fas fa-exclamation-triangle" name="icon_three">
                        </div>
                        <div class="form-group">
                            <label for="edit_icon_three_url">{{__('Social Profile Three URL')}}</label>
                            <input type="text" class="form-control" id="edit_icon_three_url" name="icon_three_url"
                                   placeholder="{{__('Social Profile Three URL')}}">
                        </div>
                        <div class="form-group">
                            <label for="image">{{__('Image')}}</label>
                            <div class="media-upload-btn-wrapper">
                                <div class="img-wrap"></div>
                                <input type="hidden" id="edit_image" name="image" value="">
                                <button type="button" class="btn btn-info media_upload_form_btn"
                                        data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}"
                                        data-toggle="modal" data-target="#media_upload_modal">
                                    {{__('Upload Image')}}
                                </button>
                            </div>
                            <small>{{__('Recommended image size 270x280')}}</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                        <button id="update" type="submit" class="btn btn-primary">{{__('Save Changes')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endcan
    <x-media.markup/>
@endsection
@section('script')
    <script>
        (function ($) {
            "use strict";
            $(document).ready(function () {
                <x-bulk-action-js :url="route('admin.team.member.bulk.action')" />
                <x-btn.submit/>
                <x-btn.update/>

                $(document).on('click', '.team_member_edit_btn', function () {
                    var el = $(this);
                    var id = el.data('id');
                    var name = el.data('name');
                    var designation = el.data('designation');
                    var action = el.data('action');
                    var image = el.data('image');
                    var imageid = el.data('imageid');
                    var form = $('#team_member_edit_modal_form');

                    form.attr('action', action);
                    form.find('#team_member_id').val(id);
                    form.find('#edit_name').val(name);
                    form.find('#edit_designation').val(designation);
                    form.find('#edit_description').val(el.data('description'));
                    form.find('#edit_icon_one').val(el.data('iconone'));
                    form.find('#edit_icon_two').val(el.data('icontwo'));
                    form.find('#edit_icon_three').val(el.data('iconthree'));
                    form.find('#edit_icon_one_url').val(el.data('icononeurl'));
                    form.find('#edit_icon_two_url').val(el.data('icontwourl'));
                    form.find('#edit_icon_three_url').val(el.data('iconthreeurl'));
                    form.find('#preview_image').attr('src', image);

                    form.find('.edit_icon_three .icp-dd').attr('data-selected', el.data('iconthree'));
                    form.find('.edit_icon_three .iconpicker-component i').attr('class', el.data('iconthree'));
                    form.find('.edit_icon_two .icp-dd').attr('data-selected', el.data('icontwo'));
                    form.find('.edit_icon_two .iconpicker-component i').attr('class', el.data('icontwo'));
                    form.find('.edit_icon_one .icp-dd').attr('data-selected', el.data('iconone'));
                    form.find('.edit_icon_one .iconpicker-component i').attr('class', el.data('iconone'));

                    if (imageid != '') {
                        form.find('.media-upload-btn-wrapper .img-wrap').html('<div class="attachment-preview"><div class="thumbnail"><div class="centered"><img class="avatar user-thumb" src="' + image + '" > </div></div></div>');
                        form.find('.media-upload-btn-wrapper input').val(imageid);
                        form.find('.media-upload-btn-wrapper .media_upload_form_btn').text('Change Image');
                    }

                });

                $('.icp-dd').iconpicker();
                $('.icp-dd').on('iconpickerSelected', function (e) {
                    var selectedIcon = e.iconpickerValue;
                    $(this).parent().parent().children('input').val(selectedIcon);
                });

            });
        })(jQuery)
    </script>
    <!-- Start datatable js -->
    <x-datatable.js/>
    <script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
    <x-media.js/>
@endsection
