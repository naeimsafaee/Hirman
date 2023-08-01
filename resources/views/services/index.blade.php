@extends('index')
@section('content')
    <main>
        @include('components.animation_top')
        <div class="services-main">
            <div class="services-header">
                <div class="header-page">
                    <h1>
                        خدمات
                    </h1>
                </div>
                <div class="button-slider-services"></div>
            </div>

            <div class="services-body">
                <div class="services-item-slider owl-carousel">
                    @each('components.service_section' , $services , 'service')
                </div>
            </div>
        </div>
    </main>
@endsection
@section('script')
    <script src={{asset("assets/js/owl.carousel.min.js")}}></script>
@endsection
