@extends('frontend.frontend-page-master')
@section('page-title')
    {{__('Search For: ')}} {{$search_term}}
@endsection
@section('content')
    <div class="row pl-25 pr-15">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 mx-auto CampaignMendesak pt-4">

            @if(empty($search_term))

                <div class="alert alert-warning">
                    {{__('Please enter what you want to search..!')}}
                </div>
           @else

            <div class="scrolling-wrapper row mt-4 pb-4 pt-2 contentResponsive">
                @forelse($all_donations as $data)
                    <div class="col-xl-4 col-lg-4 col-md-4 col-6 float-start p-3px">
                        <div class="card">
                            {!! render_image_markup_by_attachment_id($data->image) !!}
                            <div class="card-custom-content">
                            <a href="{{route('frontend.donations.single',$data->slug)}}" class="main-title"><span class="judulCampaignMendesak">{{$data->title ?? __('No Title')}}</span></a>
                            <p>Terkumpul</p>
                            <div class="progress-content">
                            <span class="padding-progressbar">
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </span>

                                <div class="progress-item">
                                    <div class="single-progressbar">
                                        <div class="donation-progress" data-percentage="{{get_percentage($data->amount,$data->raised)}}"></div>
                                    </div>
                                </div>

                                <div class="goal">
                                    <h4 class="raised">{{__('Raised')}}: {{amount_with_currency_symbol($data->raised ?? 0 )}}</h4>
                                    <h4 class="raised">{{__('Goal')}}: {{amount_with_currency_symbol($data->amount)}}</h4>
                                </div>
                            </div>

                            <div class="footer-CampaignMendesak"><span class="text-start">1000 donatur</span><span class="text-end">10 hari lagi</span></div>
                        </div>
                    </div>
                    </div>
                @empty
                    <div class="alert alert-danger">
                        {{__('Nothing found related to').' '.$search_term}}
                    </div>
                @endforelse
                <div class="col-lg-12 text-center my-5">
                    <nav class="pagination-wrapper" aria-label="Page navigation ">
                        {{$all_donations->links()}}
                    </nav>
                </div>
            </div>
           @endif
        </div>
    </div>
{{--    <section class="blog-content-area padding-top-100 padding-bottom-80">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    @forelse($all_blogs as $data)--}}
{{--                        <x-frontend.blog.list01--}}
{{--                                :image="$data->image"--}}
{{--                                :date="$data->created_at"--}}
{{--                                :title="$data->title"--}}
{{--                                :slug="$data->slug"--}}
{{--                                :author="$data->author"--}}
{{--                                :catid="$data->blog_categories_id"--}}
{{--                                :content="$data->blog_content">--}}
{{--                        </x-frontend.blog.list01>--}}
{{--                    @empty--}}
{{--                        <div class="alert alert-danger">--}}
{{--                            {{__('Nothing found related to').' '.$search_term}}--}}
{{--                        </div>--}}
{{--                    @endforelse--}}
{{--                    <div class="pagination-wrapper" aria-label="Page navigation ">--}}
{{--                        {{$all_blogs->links()}}--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
@endsection
