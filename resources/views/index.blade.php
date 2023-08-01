<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="{{ Voyager::image(setting('site.logo')) }}"/>
    <link rel="stylesheet" href="{{ asset("assets/css/bootstrap-grid.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/circle.carusel.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/master.css") }}?xa=54578">
    <link rel="stylesheet" href="{{ asset("assets/css/owl.carousel.min.css") }}">


    <title>{{ setting('site.title') }}</title>
    <meta name="description" content="{{ setting('site.description') }}">
    @yield('style')
</head>
<body>

@yield('modal')

@yield('start_op')

@include('header')

@yield('content')

@include('footer')

@yield('end_op')


<script src={{asset("assets/js/jquery.min.js")}}></script>
@yield('script')
<script src={{asset("assets/js/master.js")}}></script>
</body>
</html>



