@extends('index')
@section('content')
    <main>
        @include('components.animation_top')
        <div class="asaar-main">
            <div class="team-winner-header">
                <div class="header-page">
                    <h1>
                        تیم های برنده
                    </h1>
                </div>
               <div class="button-slider-team-winner"></div>
            </div>
            <div class="asaar-body">
                <div class="team-winner-carousel owl-carousel">
                    @each('components.winner_section' , $winners , 'winner')
                </div>
            </div>
        </div>
    </main>
@endsection
@section('script')
    <script src={{asset("assets/js/owl.carousel.min.js")}}></script>
@endsection
