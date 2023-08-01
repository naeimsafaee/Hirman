@extends('index')
@section('content')
    <main>
        @include('components.animation_top')
        <div class="news-main">
            <div class="news-header">
                <div class="header-page">
                    <h1>
                        @if(!$mags->isEmpty())
                            @switch($mags->first()->type)
                                @case('blog')
                                {{ setting('site.blog') }}
                                @break
                                @case('foreign')
                                {{ setting('site.foreign') }}
                                @break
                                @case('internal')
                                {{ setting('site.internal') }}
                                @break
                            @endswitch
                        @else
                            موضوعی ثبت نشده است.
                        @endif
                    </h1>
                </div>
                <div class="button-slider-news"></div>
            </div>
            <div class="news-body">
                <div class="news-carousel owl-carousel">
                    @each('components.mag_section' , $mags , 'mag')
                </div>
            </div>
        </div>
    </main>
@endsection
@section('script')
    <script src={{asset("assets/js/owl.carousel.min.js")}}></script>
@endsection
