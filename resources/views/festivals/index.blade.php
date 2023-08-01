@extends('index')
@section('content')
    <main>
        @include('components.animation_top')
        <div class="news-main">
            <div class="news-header">
                <div class="header-page">
                    <h1>
                        @if(!$festivals->isEmpty())
                            @if ($festivals->first()->type == 'news')
                                اخبار و اتفاقات
                            @else
                                زمان برگذاری
                            @endif
                        @else
                            موضوعی ثبت نشده است.
                        @endif
                    </h1>
                </div>
                <div class="button-slider-news"></div>
            </div>

            <div class="news-body">
                <div class="news-carousel owl-carousel">
                    @foreach($festivals as $festival)
                        <div class="item">
                            <div class="figure">
                                <img src="{{ Voyager::image($festival->image) }}" alt="">
                            </div>
                            <div class="figcaption">
                                <div class="caption-header">
                                    <div class="text">
                                        <h2>
                                            {{fa_number($festival->title)}}
                                        </h2>
                                    </div>

                                </div>
                                <div class="caption-body">
                                    <p>
                                        {{ mb_substr($festival->content , 0 , 70) }}...
                                    </p>
                                </div>

                                <div class="link-view-single-layout">
                                    <div class="date-push">
                                        <p>
                                            @if($festival->type == 'news')
                                                {{ fa_number(verta($festival->created_at)->format('%d %B %Y')) }}
                                            @elseif($festival->festivity_at != null)
                                                {{ fa_number(verta($festival->festivity_at)->format('%d %B %Y')) }}
                                            @else
                                                {{ fa_number(verta($festival->created_at)->format('%d %B %Y')) }}
                                            @endif
                                        </p>
                                        <img src="@if($festival->isVideo) {{asset("assets/icon/video.svg")}}  @else {{asset("assets/icon/clock.svg")}} @endif" alt="">
                                    </div>
                                    <div class="link-view-single">
                                        <a href=" @if($festival->type == 'news') {{ route('news.show',$festival->slug) }} @else {{ route('playtime.show',$festival->slug) }} @endif ">
                                            اطلاعات بیشتر
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection
@section('script')
    <script src={{asset("assets/js/owl.carousel.min.js")}}></script>
@endsection
