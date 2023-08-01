@extends('index')

@section('modal')
    @if($mag->isVideo)
        <div class="popup-video-layout">
            <div class="popup-video">
                <div class="button-close-popup">
                    <img src={{asset("assets/icon/close.svg")}} alt="">
                </div>
                <div class="child-layout">
                    <div class="play-video">
                        <img src="{{asset("assets/icon/play.svg")}}" alt="">
                    </div>
                    <img src={{ Voyager::image($mag->image ) }} alt="">
                    <video controls id="video">
                        <source src="{{ $mag->video }}">
                    </video>
                </div>
            </div>
        </div>
    @else
        <div class="popup-photo-layout">
            <div class="popup-photo">
                <div class="button-close-popup">
                    <img src="{{ asset('assets/icon/close.svg') }}" alt="">
                </div>
                <div class="child-layout">
                    <img src="{{ Voyager::image($mag->image ) }}" alt="">
                </div>
            </div>
        </div>
    @endif

@endsection

@section('content')

    <main>
        @include('components.animation_top')
        <div class="single-main">
            <div class="header-page">
                <h1>
                    {{fa_number($mag->title)}}
                </h1>
            </div>
            <div class="single-body single-asaar-body">
                @if(!$mag->isVideo)
                    <div class="image-layout photo-layout">نی

                        <div class="image photo">
                            <img src="{{ Voyager::image($mag->image , 'cropped') }}" alt="">
                        </div>
                        <div class="date-push">
                            <p>
                                {{ fa_number(verta($mag->created_at)->format('%d %B %Y')) }}
                            </p>
                            <img src="{{ asset("assets/icon/clock.svg") }}" alt="">
                        </div>
                    </div>
                @else
                    <div class="video-layout">
                        <div class="video">
                            <img src={{ Voyager::image($mag->image , 'cropped') }} alt="">
                            <div class="icon-video">
                                <img src={{ asset("assets/icon/play.svg") }} alt="">
                            </div>
                        </div>
                        <div class="date-push">
                            <p>
                                {{ fa_number(verta($mag->created_at)->format('%d %B %Y')) }}
                            </p>
                            <img src={{ asset("assets/icon/video.svg") }} alt="">
                        </div>
                    </div>
                @endif
                <div class="explain">
                    <p>
                        {!! $mag->content !!}
                    </p>
                </div>
            </div>
        </div>
    </main>

@endsection

@section('start_op')
    <div class="top-site">
@endsection

@section('end_op')
    </div>
@endsection
