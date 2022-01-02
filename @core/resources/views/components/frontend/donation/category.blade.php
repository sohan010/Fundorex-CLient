<div class="single-donation-category-item"
        {!! render_background_image_markup_by_attachment_id($image,'grid') !!}
>
    <a href="{{route('frontend.donations.category',['id' => $id,'any' => Str::slug($title) ?? '' ])}}">

        <div class="hover-content">
            <h3 class="title">{{$title}} <span class="count">({{$count}})</span>
            </h3>
            <p class="description">{{$description}}</p>
        </div>
    </a>
</div>