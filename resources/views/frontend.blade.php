<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8"/>
    <link href="https://plus.google.com/107515763736347546999" rel="publisher"/>
    <link rel="stylesheet" href="{{url('css/frontend.css')}}" type="text/css"/>
    <title>Homepage | Tuệ Linh</title>


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

</body>
</html>