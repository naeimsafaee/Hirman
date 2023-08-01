@extends('index')
@section('content')
    @if($festival->isVideo)
        <div class="popup-video-layout">
            <div class="popup-video">
                <div class="button-close-popup">
                    <img src={{asset("assets/icon/close.svg")}} alt="">
                </div>
                <div class="child-layout">
                    <div class="play-video">
                        <img src="{{asset("assets/icon/play.svg")}}" alt="">
                    </div>
                    <img src={{ Voyager::image($festival->image) }} alt="">
                    <video controls id="video">
                        <source src="{{ $festival->video }}">
                    </video>
                </div>
            </div>
        </div>
    @endif
    <div class="top-site">
        <main>
            @include('components.animation_top')
            <div class="single-main">
                <div class="header-page">
                    <h1>
                        {{fa_number($festival->title)}}
                    </h1>
                </div>
                <div class="single-body">
                    @if(!$festival->isVideo)
                        <div class="image-layout">
                            <div class="image">
                                <img src={{ Voyager::image($festival->image)  }} alt="">
                            </div>
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
                                <img src={{ asset("assets/icon/clock.svg") }} alt="">
                            </div>
                        </div>
                    @else
                        <div class="video-layout">
                            <div class="video">
                                <img src={{ Voyager::image($festival->image) }} alt="">
                                <div class="icon-video">
                                    <img src={{ asset("assets/icon/play.svg") }} alt="">
                                </div>
                            </div>
                            <div class="date-push">
                                <p>
                                    {{ fa_number(verta($festival->created_at)->format('%d %B %Y')) }}
                                </p>
                                <img src={{ asset("assets/icon/video.svg") }} alt="">
                            </div>
                        </div>
                    @endif
                    <div class="explain">
                        <p>
                            {!! $festival->content !!}
                        </p>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
