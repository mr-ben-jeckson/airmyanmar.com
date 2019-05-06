<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Air Myanmar Admin Panel" name="description" />
    <meta content="Airmyanmar" name="author" />
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <!-- GLOBAL STYLES -->
    <link rel="icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{url('/assets/plugins/bootstrap/css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{url('/assets/css/main.css')}}" />
    <link rel="stylesheet" href="{{url('/assets/css/theme.css')}}" />
    <link rel="stylesheet" href="{{url('/assets/css/custom.css')}}">
    <link rel="stylesheet" href="{{url('/assets/css/MoneAdmin.css')}}" />
    <link rel="stylesheet" href="{{url('/assets/plugins/Font-Awesome/css/font-awesome.css')}}" />
    <link rel="stylesheet" href="{{url('/css/font-awesome.min.css')}}">
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    @yield('style')
    <![endif]-->
</head>
<body class="padTop53">
<div id="wrap">
@include('layouts.admin.topbar')
@include('layouts.admin.sidebar')
@yield('content')
</div>
<div id="footer">
    <p>&copy;  Airmyanmar.com | Tech Department </p>
</div>
<!-- GLOBAL SCRIPTS -->
<script src="{{url('/assets/plugins/jquery-2.0.3.min.js')}}"></script>
<script src="{{url('/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{url('/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js')}}"></script>
<!-- END GLOBAL SCRIPTS -->

<!-- PAGE LEVEL SCRIPTS -->
@yield('script')
</body>
</html>
