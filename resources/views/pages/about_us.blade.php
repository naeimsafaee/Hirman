@extends('index_about')
@section('content')
    <main>
        @include('components.animation_top')
        <div class="aboutus-page-main">
            <div class="header-page">
                <h1>
                    {{ setting('site.about_us_title') }}
                </h1>
            </div>
            <div class="aboutus-body">
                <div class="image">
                    <img src="{{ Voyager::image(setting('site.about_us_image')) }}" alt="">
                    <div class="date-aboutus">
{{--                        <p>--}}
{{--                            {{ setting('site.about_us_date') }}--}}
{{--                        </p>--}}
{{--                        <img src={{ asset("assets/icon/clock.svg") }} alt="">--}}
                    </div>
                </div>
                <div class="explain">
                    <p>
                        {!! setting('site.about_us')  !!}
                    </p>
                </div>
            </div>
        </div>
    </main>
@endsection
