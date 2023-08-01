@extends('index')
@section('style')
    <link rel="stylesheet" href={{asset("assets/css/owl.theme.default.min.css")}}>
@endsection
@section('content')
    <main>
        @include('components.animation_top')
        <div class="asaar-main">
            <div class="asaar-header">
                <div class="header-page">
                    <h1>
                        آثار
                    </h1>
                </div>
                <div class="button-slider-asaar"></div>
            </div>

            <div class="asaar-body">
                <div class="asaar-carousel owl-carousel">
                    @each('components.movie_section' , $movies , 'movie')
                </div>
            </div>
        </div>
    </main>
@endsection
@section('script')
    <script src={{asset("assets/js/owl.carousel.min.js")}}></script>
@endsection

