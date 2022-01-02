@extends('frontend.frontend-page-master')
@section('site-title')
    {{get_static_option('team_page_name')}}
@endsection
@section('page-title')
    {{get_static_option('team_page_name')}}
@endsection
@section('page-meta-data')
    <meta name="description" content="{{get_static_option('team_page_meta_description')}}">
    <meta name="tags" content="{{get_static_option('team_page_meta_tags')}}">
@endsection
@section('content')

    <div class="team-member-area gray-bg team-page padding-top-110 padding-bottom-80">
        <div class="container">
            <div class="row">
                @php $a = 1;@endphp
                @foreach($all_team_members as $data)
                    <div class="col-lg-3  col-sm-6 padding-bottom-40">
                        <div class="team-single-item">
                            <div class="thumb">
                                {!! render_image_markup_by_attachment_id($data->image) !!}
                                <div class="content style-{{$a}}">
                                    <h4 class="title">{{$data->name}} </h4>
                                    <div class="social-link">
                                        <ul>
                                            @if(!empty($data->icon_one) && !empty($data->icon_one_url))
                                                <li><a href="{{$data->icon_one_url}}"><i
                                                                class="{{$data->icon_one}}"></i></a></li>
                                            @endif
                                            @if(!empty($data->icon_two) && !empty($data->icon_two_url))
                                                <li><a href="{{$data->icon_two_url}}"><i
                                                                class="{{$data->icon_two}}"></i></a></li>
                                            @endif
                                            @if(!empty($data->icon_three) && !empty($data->icon_three_url))
                                                <li><a href="{{$data->icon_three_url}}"><i
                                                                class="{{$data->icon_three}}"></i></a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php $a++; if ($a == 5){$a=1;} @endphp
                @endforeach
                <div class="col-lg-12">
                    <div class="pagination-wrapper text-center">
                        {{$all_team_members->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
