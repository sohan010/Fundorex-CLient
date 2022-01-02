<div class="blog-classic-item-01 margin-bottom-60">
    <div class="thumbnail">
        {!! render_image_markup_by_attachment_id($image) !!}
    </div>
    <div class="content-wrapper">
        <div class="news-date">
            <h5 class="title">{{date('d',strtotime($date))}}</h5>
            <span>{{date('M',strtotime($date))}}</span>
        </div>
        <div class="content">
            <ul class="post-meta">
                <li><a href="{{route('frontend.blog.single',$slug)}}">By <span>{{ ($author) ?? __("Anonymous")}}</span></a></li>
                <li class="cats"><i class="fas fa-microchip"></i>
                    {!! get_blog_category_by_id($catid,'link') !!}
                </li>
            </ul>
            <h4 class="title"><a href="{{route('frontend.blog.single',$slug)}}">{{$title ?? ''}}</a></h4>

        </div>
    </div>
    <div class="blog-bottom">
        <p>{!! Str::words(purify_html_raw($content),80) !!}</p>
        <div class="btn-wrapper">
            <a href="{{route('frontend.blog.single',$slug)}}" class="boxed-btn reverse-color">{{get_static_option('blog_page_read_more_btn_text')}}</a>
        </div>
    </div>
</div>