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
    <div id="app">
        @include('partials.aside')
        <div class="app-content">
          @include('partials.nav-top')
          
    <div class="main-content">
    <div class="wrap-content container" id="container">
      @yield('content')
    </div>
    </div>
    </div>
        <footer>
            <div class="footer-inner">
                <div class="pull-left">&copy; <span class="current-year"></span> <span class="text-bold text-uppercase">Chhapai</span>. <span>All rights reserved</span></div>
                <div class="pull-right"><span class="go-top"><i class="ti-angle-up"></i></span></div>
            </div>
        </footer>
        <div id="off-sidebar" class="sidebar">
            <div class="sidebar-wrapper">
                <ul id="offTab" class="nav nav-tabs nav-justified">
                    <li class="nav-item"><a href="#off-users" class="nav-link active" aria-controls="off-users" role="tab" data-toggle="tab"><i class="ti-comments"></i></a></li>
                    <li class="nav-item"><a href="#off-activities" class="nav-link" aria-controls="off-activities" role="tab" data-toggle="tab"><i class="ti-check-box"></i></a></li>
                    <li class="nav-item"><a href="#off-favorites" class="nav-link" aria-controls="off-favorites" role="tab" data-toggle="tab"><i class="ti-heart"></i></a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="off-users">
                        <div id="users" toggleable active-class="chat-open">
                            <div class="users-list">
                                <div class="sidebar-content perfect-scrollbar">
                                    <h5 class="sidebar-title">On-line</h5>
                                    <ul class="list-unstyled media-list">
                                        <li class="media"><a data-toggle-class="chat-open" data-toggle-target="#users" href="#"><i class="fa fa-circle status-online"></i> <img alt="..." src="assets/images/avatar-2.jpg" class="media-object"><div class="media-body"><h4 class="media-heading">Nicole Bell</h4><span>Content Designer</span></div></a></li>
                                        <li class="media">
                                            <a data-toggle-class="chat-open" data-toggle-target="#users" href="#">
                                                <div class="user-label"><span class="badge badge-success">3</span></div><i class="fa fa-circle status-online"></i> <img alt="..." src="assets/images/avatar-3.jpg" class="media-object">
                                                <div class="media-body">
                                                    <h4 class="media-heading">Steven Thompson</h4><span>Visual Designer</span></div>
                                            </a>
                                        </li>
                                        <li class="media"><a data-toggle-class="chat-open" data-toggle-target="#users" href="#"><i class="fa fa-circle status-online"></i> <img alt="..." src="assets/images/avatar-4.jpg" class="media-object"><div class="media-body"><h4 class="media-heading">Ella Patterson</h4><span>Web Editor</span></div></a></li>
                                        <li class="media"><a data-toggle-class="chat-open" data-toggle-target="#users" href="#"><i class="fa fa-circle status-online"></i> <img alt="..." src="assets/images/avatar-5.jpg" class="media-object"><div class="media-body"><h4 class="media-heading">Kenneth Ross</h4><span>Senior Designer</span></div></a></li>
                                    </ul>
                                    <h5 class="sidebar-title">Off-line</h5>
                                    <ul class="list-unstyled media-list">
                                        <li class="media">
                                            <a data-toggle-class="chat-open" data-toggle-target="#users" href="#"><img alt="..." src="assets/images/avatar-6.jpg" class="media-object">
                                                <div class="media-body">
                                                    <h4 class="media-heading">Nicole Bell</h4><span>Content Designer</span></div>
                                            </a>
                                        </li>
                                        <li class="media">
                                            <a data-toggle-class="chat-open" data-toggle-target="#users" href="#">
                                                <div class="user-label"><span class="badge badge-success">3</span></div><img alt="..." src="assets/images/avatar-7.jpg" class="media-object">
                                                <div class="media-body">
                                                    <h4 class="media-heading">Steven Thompson</h4><span>Visual Designer</span></div>
                                            </a>
                                        </li>
                                        <li class="media">
                                            <a data-toggle-class="chat-open" data-toggle-target="#users" href="#"><img alt="..." src="assets/images/avatar-8.jpg" class="media-object">
                                                <div class="media-body">
                                                    <h4 class="media-heading">Ella Patterson</h4><span>Web Editor</span></div>
                                            </a>
                                        </li>
                                        <li class="media">
                                            <a data-toggle-class="chat-open" data-toggle-target="#users" href="#"><img alt="..." src="assets/images/avatar-9.jpg" class="media-object">
                                                <div class="media-body">
                                                    <h4 class="media-heading">Kenneth Ross</h4><span>Senior Designer</span></div>
                                            </a>
                                        </li>
                                        <li class="media">
                                            <a data-toggle-class="chat-open" data-toggle-target="#users" href="#"><img alt="..." src="assets/images/avatar-10.jpg" class="media-object">
                                                <div class="media-body">
                                                    <h4 class="media-heading">Ella Patterson</h4><span>Web Editor</span></div>
                                            </a>
                                        </li>
                                        <li class="media">
                                            <a data-toggle-class="chat-open" data-toggle-target="#users" href="#"><img alt="..." src="assets/images/avatar-5.jpg" class="media-object">
                                                <div class="media-body">
                                                    <h4 class="media-heading">Kenneth Ross</h4><span>Senior Designer</span></div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="user-chat">
                                <div class="chat-content">
                                    <div class="sidebar-content perfect-scrollbar"><a class="sidebar-back pull-left" href="#" data-toggle-class="chat-open" data-toggle-target="#users"><i class="ti-angle-left"></i> <span>Back</span></a>
                                        <ol class="discussion">
                                            <li class="messages-date">Sunday, Feb 9, 12:58</li>
                                            <li class="self">
                                                <div class="message">
                                                    <div class="message-name">Peter Clark</div>
                                                    <div class="message-text">Hi, Nicole</div>
                                                    <div class="message-avatar"><img src="assets/images/avatar-1.jpg" alt=""></div>
                                                </div>
                                                <div class="message">
                                                    <div class="message-name">Nicole Bell</div>
                                                    <div class="message-text">How are you?</div>
                                                    <div class="message-avatar"><img src="assets/images/avatar-1.jpg" alt=""></div>
                                                </div>
                                            </li>
                                            <li class="other">
                                                <div class="message">
                                                    <div class="message-name">Nicole Bell</div>
                                                    <div class="message-text">Hi, i am good</div>
                                                    <div class="message-avatar"><img src="assets/images/avatar-2.jpg" alt=""></div>
                                                </div>
                                            </li>
                                            <li class="self">
                                                <div class="message">
                                                    <div class="message-name">Peter Clark</div>
                                                    <div class="message-text">Glad to see you ;)</div>
                                                    <div class="message-avatar"><img src="assets/images/avatar-1.jpg" alt=""></div>
                                                </div>
                                            </li>
                                            <li class="messages-date">Sunday, Feb 9, 13:10</li>
                                            <li class="other">
                                                <div class="message">
                                                    <div class="message-name">Nicole Bell</div>
                                                    <div class="message-text">What do you think about my new Dashboard?</div>
                                                    <div class="message-avatar"><img src="assets/images/avatar-2.jpg" alt=""></div>
                                                </div>
                                            </li>
                                            <li class="messages-date">Sunday, Feb 9, 15:28</li>
                                            <li class="other">
                                                <div class="message">
                                                    <div class="message-name">Nicole Bell</div>
                                                    <div class="message-text">Alo...</div>
                                                    <div class="message-avatar"><img src="assets/images/avatar-2.jpg" alt=""></div>
                                                </div>
                                                <div class="message">
                                                    <div class="message-name">Nicole Bell</div>
                                                    <div class="message-text">Are you there?</div>
                                                    <div class="message-avatar"><img src="assets/images/avatar-2.jpg" alt=""></div>
                                                </div>
                                            </li>
                                            <li class="self">
                                                <div class="message">
                                                    <div class="message-name">Peter Clark</div>
                                                    <div class="message-text">Hi, i am here</div>
                                                    <div class="message-avatar"><img src="assets/images/avatar-1.jpg" alt=""></div>
                                                </div>
                                                <div class="message">
                                                    <div class="message-name">Nicole Bell</div>
                                                    <div class="message-text">Your Dashboard is great</div>
                                                    <div class="message-avatar"><img src="assets/images/avatar-1.jpg" alt=""></div>
                                                </div>
                                            </li>
                                            <li class="messages-date">Friday, Feb 7, 23:39</li>
                                            <li class="other">
                                                <div class="message">
                                                    <div class="message-name">Nicole Bell</div>
                                                    <div class="message-text">How does the binding and digesting work in AngularJS?, Peter?</div>
                                                    <div class="message-avatar"><img src="assets/images/avatar-2.jpg" alt=""></div>
                                                </div>
                                            </li>
                                            <li class="self">
                                                <div class="message">
                                                    <div class="message-name">Peter Clark</div>
                                                    <div class="message-text">oh that's your question?</div>
                                                    <div class="message-avatar"><img src="assets/images/avatar-1.jpg" alt=""></div>
                                                </div>
                                                <div class="message">
                                                    <div class="message-name">Peter Clark</div>
                                                    <div class="message-text">little reduntant, no?</div>
                                                    <div class="message-avatar"><img src="assets/images/avatar-1.jpg" alt=""></div>
                                                </div>
                                                <div class="message">
                                                    <div class="message-name">Peter Clark</div>
                                                    <div class="message-text">literally we get the question daily</div>
                                                    <div class="message-avatar"><img src="assets/images/avatar-1.jpg" alt=""></div>
                                                </div>
                                            </li>
                                            <li class="other">
                                                <div class="message">
                                                    <div class="message-name">Nicole Bell</div>
                                                    <div class="message-text">I know. I, however, am not a nerd, and want to know</div>
                                                    <div class="message-avatar"><img src="assets/images/avatar-2.jpg" alt=""></div>
                                                </div>
                                            </li>
                                            <li class="self">
                                                <div class="message">
                                                    <div class="message-name">Peter Clark</div>
                                                    <div class="message-text">for this type of question, wouldn't it be better to try Google?</div>
                                                    <div class="message-avatar"><img src="assets/images/avatar-1.jpg" alt=""></div>
                                                </div>
                                            </li>
                                            <li class="other">
                                                <div class="message">
                                                    <div class="message-name">Nicole Bell</div>
                                                    <div class="message-text">Lucky for us :)</div>
                                                    <div class="message-avatar"><img src="assets/images/avatar-2.jpg" alt=""></div>
                                                </div>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                                <div class="message-bar">
                                    <div class="message-inner"><a class="link icon-only" href="#"><i class="fa fa-camera"></i></a>
                                        <div class="message-area"><textarea placeholder="Message"></textarea></div><a class="link" href="#">Send</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="off-activities">
                        <div class="sidebar-content perfect-scrollbar">
                            <h5 class="sidebar-title">Activities</h5>
                            <div class="list-group no-margin">
                                <a class="media list-group-item list-group-item-action text-center" href=""><img class="rounded-circle" alt="Avatar" src="assets/images/avatar-1.jpg"> <span class="media-body block no-margin">Use awesome animate.css <small class="block text-grey">10 minutes ago</small> </span></a><a class="media list-group-item list-group-item-action text-center"
                                    href=""><span class="media-body block no-margin">1.0 initial released <small class="block text-grey">1 hour ago</small> </span></a><a class="media list-group-item list-group-item-action text-center" href=""><span class="media-body block no-margin">Briefing project <small class="block text-grey">2 hour ago</small> </span></a>
                                <a class="media list-group-item list-group-item-action text-center" href=""><span class="media-body block no-margin">Update jQuery <small class="block text-grey">3 hour ago</small></span></a>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="off-favorites">
                        <div class="users-list">
                            <div class="sidebar-content perfect-scrollbar">
                                <h5 class="sidebar-title">Favorites</h5>
                                <ul class="list-unstyled media-list">
                                    <li class="media">
                                        <a href="#"><img alt="..." src="assets/images/avatar-7.jpg" class="media-object">
                                            <div class="media-body">
                                                <h4 class="media-heading">Nicole Bell</h4><span>Content Designer</span></div>
                                        </a>
                                    </li>
                                    <li class="media">
                                        <a href="#">
                                            <div class="user-label"><span class="badge badge-success">3</span></div><img alt="..." src="assets/images/avatar-6.jpg" class="media-object">
                                            <div class="media-body">
                                                <h4 class="media-heading">Steven Thompson</h4><span>Visual Designer</span></div>
                                        </a>
                                    </li>
                                    <li class="media">
                                        <a href="#"><img alt="..." src="assets/images/avatar-10.jpg" class="media-object">
                                            <div class="media-body">
                                                <h4 class="media-heading">Ella Patterson</h4><span>Web Editor</span></div>
                                        </a>
                                    </li>
                                    <li class="media">
                                        <a href="#"><img alt="..." src="assets/images/avatar-2.jpg" class="media-object">
                                            <div class="media-body">
                                                <h4 class="media-heading">Kenneth Ross</h4><span>Senior Designer</span></div>
                                        </a>
                                    </li>
                                    <li class="media">
                                        <a href="#"><img alt="..." src="assets/images/avatar-4.jpg" class="media-object">
                                            <div class="media-body">
                                                <h4 class="media-heading">Ella Patterson</h4><span>Web Editor</span></div>
                                        </a>
                                    </li>
                                    <li class="media">
                                        <a href="#"><img alt="..." src="assets/images/avatar-5.jpg" class="media-object">
                                            <div class="media-body">
                                                <h4 class="media-heading">Kenneth Ross</h4><span>Senior Designer</span></div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="settings panel panel-default hidden-xs hidden-sm" id="settings"><button ct-toggle="toggle" data-toggle-class="active" data-toggle-target="#settings" class="btn btn-default"><i class="fa fa-spin fa-gear"></i></button>
            <div class="panel-heading">Style Selector</div>
            <div class="panel-body">
                <div class="setting-box clearfix"><span class="setting-title float-left">Fixed header</span> <span class="setting-switch float-right"><label class="tgl"><input type="checkbox" id="fixed-header"> <span class="tgl_body"><span class="tgl_switch"></span> <span class="tgl_track"><span class="tgl_bgd"></span>                    <span class="tgl_bgd tgl_bgd-negative"></span></span>
                    </span>
                    </label>
                    </span>
                </div>
                <div class="setting-box clearfix"><span class="setting-title float-left">Fixed sidebar</span> <span class="setting-switch float-right"><label class="tgl"><input type="checkbox" id="fixed-sidebar"> <span class="tgl_body"><span class="tgl_switch"></span> <span class="tgl_track"><span class="tgl_bgd"></span>                    <span class="tgl_bgd tgl_bgd-negative"></span></span>
                    </span>
                    </label>
                    </span>
                </div>
                <div class="setting-box clearfix"><span class="setting-title float-left">Closed sidebar</span> <span class="setting-switch float-right"><label class="tgl"><input type="checkbox" id="closed-sidebar"> <span class="tgl_body"><span class="tgl_switch"></span> <span class="tgl_track"><span class="tgl_bgd"></span>                    <span class="tgl_bgd tgl_bgd-negative"></span></span>
                    </span>
                    </label>
                    </span>
                </div>
                <div class="setting-box clearfix"><span class="setting-title float-left">Fixed footer</span> <span class="setting-switch float-right"><label class="tgl"><input type="checkbox" id="fixed-footer"> <span class="tgl_body"><span class="tgl_switch"></span> <span class="tgl_track"><span class="tgl_bgd"></span>                    <span class="tgl_bgd tgl_bgd-negative"></span></span>
                    </span>
                    </label>
                    </span>
                </div>
                <div class="colors-row setting-box">
                    <div class="color-theme theme-1">
                        <div class="color-layout"><label><input type="radio" name="setting-theme" value="theme-1"> <span class="ti-check"></span> <span class="split header"><span class="color th-header"></span> <span class="color th-collapse"></span> </span><span class="split"><span class="color th-sidebar"><i class="element"></i> </span><span class="color th-body"></span></span></label></div>
                    </div>
                    <div class="color-theme theme-2">
                        <div class="color-layout"><label><input type="radio" name="setting-theme" value="theme-2"> <span class="ti-check"></span> <span class="split header"><span class="color th-header"></span> <span class="color th-collapse"></span> </span><span class="split"><span class="color th-sidebar"><i class="element"></i> </span><span class="color th-body"></span></span></label></div>
                    </div>
                </div>
                <div class="colors-row setting-box">
                    <div class="color-theme theme-3">
                        <div class="color-layout"><label><input type="radio" name="setting-theme" value="theme-3"> <span class="ti-check"></span> <span class="split header"><span class="color th-header"></span> <span class="color th-collapse"></span> </span><span class="split"><span class="color th-sidebar"><i class="element"></i> </span><span class="color th-body"></span></span></label></div>
                    </div>
                    <div class="color-theme theme-4">
                        <div class="color-layout"><label><input type="radio" name="setting-theme" value="theme-4"> <span class="ti-check"></span> <span class="split header"><span class="color th-header"></span> <span class="color th-collapse"></span> </span><span class="split"><span class="color th-sidebar"><i class="element"></i> </span><span class="color th-body"></span></span></label></div>
                    </div>
                </div>
                <div class="colors-row setting-box">
                    <div class="color-theme theme-5">
                        <div class="color-layout"><label><input type="radio" name="setting-theme" value="theme-5"> <span class="ti-check"></span> <span class="split header"><span class="color th-header"></span> <span class="color th-collapse"></span> </span><span class="split"><span class="color th-sidebar"><i class="element"></i> </span><span class="color th-body"></span></span></label></div>
                    </div>
                    <div class="color-theme theme-6">
                        <div class="color-layout"><label><input type="radio" name="setting-theme" value="theme-6"> <span class="ti-check"></span> <span class="split header"><span class="color th-header"></span> <span class="color th-collapse"></span> </span><span class="split"><span class="color th-sidebar"><i class="element"></i> </span><span class="color th-body"></span></span></label></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('assets/js/vendors.bundle.min.js')}}"></script>
    <script src="{{asset('vendor/chart.js/dist/Chart.min.js')}}"></script>
    <script src="{{asset('vendor/jquery.sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('assets/js/main.min.js')}}"></script>
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
            Index.init()
        })
    </script>
</body>

</html>