<div class="client-area-two padding-bottom-115">
    <div class="container">
        <div class="client-slider d-flex align-items-center">
            @foreach($all_client_area as $key=> $data)
                <div class="single-slider">
                    <div class="slider-thumb">
                        <a href="{{$data->url}}" data-toggle="tooltip" data-title="{{$data->title}}">  {!! render_image_markup_by_attachment_id($data->image) !!} </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>