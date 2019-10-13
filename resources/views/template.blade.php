<!DOCTYPE html>
<!--[if IE 8]><html class="ie8" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <title>Chhapai - Control Panel</title>
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimum-scale=1,maximum-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta content="ClipTwo - Responsive Admin Template build with Bootstrap" name="description">
    <meta content="ClipTheme" name="author">
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('assets/images/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('assets/images/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('assets/images/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/images/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('assets/images/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('assets/images/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('assets/images/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('assets/images/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/images/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset('assets/images/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/images/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('assets/images/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('assets/images/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{asset('assets/images/ms-icon-144x144.png')}}">
    <meta name="theme-color" content="#ffffff">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,400italic,600,700|Raleway:100,300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/vendors.bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/theme.bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/themes/theme-1.min.css')}}" id="skin_color">
    
</head>

<body>
    <div id="app-main">
        @include('partials.aside')
        <div class="app-content">
          @include('partials.nav-top')
          
    <div class="main-content">
    <div class="wrap-content container" id="container">
      @yield('content')
    </div><!--wrap-content container-->
    </div><!--main-content-->
    </div><!-- app-content-->
        <footer>
            <div class="footer-inner">
                <div class="pull-left">&copy; <span class="current-year"></span> <span class="text-bold text-uppercase">Chhapai</span>. <span>All rights reserved</span></div>
                <div class="pull-right"><span class="go-top"><i class="ti-angle-up"></i></span></div>
            </div>
        </footer>
        
    </div><!--app-main-->
    <script src="{{asset('assets/js/vendors.bundle.min.js')}}"></script>
    <script src="{{asset('vendor/chart.js/dist/Chart.min.js')}}"></script>
    <script src="{{asset('vendor/jquery.sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('assets/js/main.min.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
    @yield('scripts')
    <script>
        NProgress.configure({
            showSpinner: !1
        }), NProgress.start(), NProgress.set(.4);
        var interval = setInterval(function() {
            NProgress.inc()
        }, 1e3);
        jQuery(document).ready(function() {
            NProgress.done(), clearInterval(interval), Main.init()
        })
    </script>
    <script src="assets/js/index.min.js"></script>
    <script>
        jQuery(document).ready(function() {
            //Index.init()
        })
    </script>


</body>

</html>