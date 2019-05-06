<!doctype html>
<html lang="en">
<?php $code = \App\code::first(); ?>
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="author" content="Air Myanmar / Myanmar Flights Center">

    <!-- Schema Org -->
    <meta itemprop="name" content="Flights, Online Flight Tickets & Deals">
    <meta itemprop="description" content="Myanmar 20 years experience flights center, Ticket Sales, Deals">
    <meta itemprop="image" content="{{asset('images/logo.png')}}">

    <!-- Search & Crawling -->
    @yield('markup')

    <link rel="icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900,900i%7CMerriweather:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- Bootstrap Stylesheet -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    <!-- Font Awesome Stylesheet -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">

    <!-- Custom Stylesheets -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" id="cpswitch" href="{{asset('css/orange.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">

    <!-- Owl Carousel Stylesheet -->
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.css')}}">

    <!-- Flex Slider Stylesheet -->
    <link rel="stylesheet" href="{{asset('css/flexslider.css')}}" type="text/css" />

    <!--Date-Picker Stylesheet-->
    <link rel="stylesheet" href="{{asset('css/datepicker.css')}}">

    <!-- Magnific Gallery -->
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">

    <!-- Slick Stylesheet -->
    <link rel="stylesheet" href="{{url('css/slick.css')}}">
    <link rel="stylesheet" href="{{url('css/slick-theme.css')}}">
    <!-- Google Translate -->


    {!! $code->head !!}
</head>
<body id="main-homepage">
@include('layouts.nav')
@yield('content')
@include('layouts.footer')
<!-- Page Scripts Starts -->
<script type="text/javascript" src="{{asset('/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/jquery.magnific-popup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.flexslider.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap-datepicker.js')}}"></script>
<script type="text/javascript" src="{{asset('js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/custom-navigation.js')}}"></script>
<script type="text/javascript" src="{{asset('js/custom-flex.js')}}"></script>
<script type="text/javascript" src="{{asset('js/custom-owl.js')}}"></script>
<script type="text/javascript" src="{{asset('js/custom-date-picker.js')}}"></script>
<script type="text/javascript" src="{{asset('js/custom-video.js')}}"></script>
<script type="text/javascript" src="{{asset('js/slick.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/custom-slick.js')}}"></script>
<script>
    $(function () {
        $("#date").datepicker({startDate:'01/01/1997'});
        $("#date1").datepicker({startDate:'01/01/1997'});
    });
</script>
@if(count($errors))
<script type="text/javascript">
    $(window).load(function()
    {
        $('#error').modal('show');
    });
</script>
@endif
@if(session('status'))
    <script type="text/javascript">
        $(window).load(function()
        {
            $('#status').modal('show');
        });
    </script>
    @endif
<!-- Page Scripts Ends -->
@yield('script')

<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
    }
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

{!! $code->body !!}
</body>
</html>