
<div class="tab-area-new">
    <div class="author-data-tab">
        <ul class="tabs">
            @if(get_static_option('donation_descriptions_show_hide'))
                 <li class="active" data-tab="tab-one"> {{__('Description')}} </li>
            @endif
           @if(get_static_option('donation_faq_show_hide'))
            <li data-tab="tab-two"> {{__('FAQ')}} </li>
           @endif
         @if(get_static_option('donation_updates_show_hide'))
            <li data-tab="tab-three"> {{__('Updates')}} </li>
         @endif
            <li data-tab="tab-four"> {{__('Comments')}} </li>
        </ul>
    </div>

    <div id="tab-one" class="tab-content active">
        <div class="single-tabs">
            @if(get_static_option('donation_descriptions_show_hide'))
            <div id="main-data">
                {!! Str::words(purify_html_raw($donation->cause_content),70) !!}
            </div>
            <div class="btn-wrapper">
                <a id="ReadMoreButton" class="text-primary" href="">{{__('Read More')}}</a>
            </div>
             @endif
        </div>
    </div>

    <div id="tab-two" class="tab-content">
        <div class="single-tabs">

    @if(get_static_option('donation_faq_show_hide'))
            @php
                $faq_items = !empty($donation->faq) ? unserialize($donation->faq,['class' => false]) : ['title' => []];
                 $rand_number = rand(9999,99999999);
            @endphp
            @if(!empty(current($faq_items['title'])) )
                <div class="accordion-wrapper">
                    <h2 class="title">{{get_static_option('donation_single_faq_title')}}</h2>
                    <div id="accordion_{{$rand_number}}">
                        @foreach($faq_items['title'] as $faq)
                            @php
                                $aria_expanded = 'false';
                            @endphp
                            <div class="card" itemscope itemprop="mainEntity"
                                 itemtype="https://schema.org/Question">
                                <div class="card-header" id="headingOne_{{$loop->index}}"
                                     itemprop="name">
                                    <h5 class="mb-0">
                                        <a data-toggle="collapse"
                                           data-target="#collapseOne_{{$loop->index}}" role="button"
                                           aria-expanded="{{$aria_expanded}}"
                                           aria-controls="collapseOne_{{$loop->index}}">
                                            {{purify_html($faq)}}
                                        </a>
                                    </h5>
                                </div>

                                <div id="collapseOne_{{$loop->index}}" class="collapse "
                                     aria-labelledby="headingOne_{{$loop->index}}"
                                     data-parent="#accordion_{{$rand_number}}" itemscope
                                     itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                    <div class="card-body" itemprop="text">
                                        {{purify_html($faq_items['description'][$loop->index] ?? '')}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

        @endif
        </div>
    </div>

    @if(get_static_option('donation_updates_show_hide'))
    <div id="tab-three" class="tab-content">
        <div class="single-tabs">
            @if($donation->cause_update_id && $causeUpCount->count() > 0)
                <div class="cause-update-section">
                    <h3 class="title">{{__('Updates')}} ({{ $causeUpCount->count()}}) </h3>
                    <div id="recent_update_about_cause" data-page="0"></div>
                </div>
                <hr>
            @else
                <p class="alert alert-warning">{{__('No Update Found')}}</p>
            @endif
        </div>
    </div>
    @endif

    <div id="tab-four" class="tab-content">
        <div class="single-tabs">
        @if(get_static_option('donation_comments_show_hide'))
            <div class="cause-comment-section">
                <h3>{{__('Comments')}} ({{ $causeCommentCount->count()}}) </h3>
            </div>
            <div class="cause-comment-body">
                {{-- Fetching donors By Ajax--}}
                <div class="box donor-load-box">
                    <div class="panel panel-default">
                        <div class="panel-body" id="comment_content_div">
                            {{ csrf_field() }}
                            <div id="comment_data" data-page="0">
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Fetching donors By Ajax--}}

                <div class="error-message"></div>
                @if(auth()->guard('web')->check())
                    <form action="{{route('cause.comment.store')}}" method="post"
                          id="cause-comment-form">
                        @csrf
                        <input type="hidden" name="cause_id" id="cause_id"
                               value="{{$donation->id}}">
                        <input type="hidden" name="user_id" id="user_id"
                               value="{{auth()->guard('web')->user()->id}}">
                        <input type="hidden" name="commented_by" id="commented_by"
                               value="{{auth()->guard('web')->user()->name}}">
                        <div class="form-group">
                                                <textarea name="comment_content" class="form-control" rows="2"
                                                          placeholder="{{__('Write Comments..')}}"
                                                          id="comment_content"></textarea>
                        </div>
                        <div class="btn-wrapper">
                            <button id="submitComment" type="submit"
                                    class="boxed-btn reverse-color btn-sm">{{__('Comment')}}</button>
                        </div>
                    </form>
                @endif

                @if(!auth()->guard('web')->check())
                    @include('frontend.partials.ajax-user-login-markup',['title' => __('Login To Leave a Comment')])
                @endif
            </div>
            @endif

        </div>
    </div>
</div>