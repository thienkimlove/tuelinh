<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8"/>
    <link href="https://plus.google.com/107515763736347546999" rel="publisher"/>
    <link rel="stylesheet" href="{{url('css/frontend.css')}}" type="text/css"/>
    <title>{{(!empty($meta_title)) ? $meta_title : 'Homepage | Tuệ Linh'}}</title>
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{Request::url()}}">
    <meta property="og:image" content="{{ empty($meta_image) ? url('images/logo.png') : $meta_image  }}">
    <meta property="og:site_name" content="Tuệ Linh">

    <!--[if lte IE 8]>
    <script src="{{url('js/html5.js')}}" type="text/javascript"></script>
    <![endif]-->
    <!--[if lte IE 7]>
    <link rel="stylesheet" href="{{url('css/ie.css')}}" type="text/css"/>
    <![endif]-->

    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
    <script src="{{url('js/modernizr.custom.js')}}"></script>
</head>
<body class="{{$page}}">
<div id="fb-root"></div>

<script>(function(d, s, id) {

        var js, fjs = d.getElementsByTagName(s)[0];

        if (d.getElementById(id)) return;

        js = d.createElement(s); js.id = id;

        js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.4&appId=1684069428493677";

        fjs.parentNode.insertBefore(js, fjs);

    }(document, 'script', 'facebook-jssdk'));</script>
<div class="wrapper" id="wrapper">
    <div class="wrapper-in" id="wrapper-in">
        @include('frontend.header')<!--//header-->
        @if(!empty($page) && $page == 'page-solution')
            <section class="box-banner" id="box-banner" data-set="space-slider" data-fix="header">
                <h1>
                    <a class="thumb" href="" title="">
                        <img src="{{url('images/example/banner-1356x450.jpg')}}" alt="" width="1356" height="450">
                    </a>
                </h1>
            </section><!--//box-banner-->
        @endif
        @yield('content')
        @include('frontend.footer')<!--//footer-->
    </div><!--//wrapper-in-->
    <div class="overlay" id="overlay"></div><!--//overlay-->
    @include('frontend.menu_right')<!--//menu-right-->
</div><!--//wrapper-->

<script src="{{url('js/frontend.js')}}"></script>

<script type="text/javascript" src="{{url('js/common.js')}}"></script>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-22753009-1', 'auto');
    ga('send', 'pageview');
    window.base_url = '{{url('/')}}';
    window.currentUrl = '{{\Illuminate\Support\Facades\Request::url()}}';
    $(function(){
        $('#nav-language a').click(function(){
            window.location.href = window.base_url + '/language/' + $(this).attr('key') + '?return=' + window.currentUrl;
        });
    });
</script>
@yield('footer')
</body>
</html>