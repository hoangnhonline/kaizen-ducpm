<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>@yield('title')</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="robots" content="index,follow"/>
        <meta http-equiv="content-language" content="en"/>
        <meta name="description" content="@yield('site_description')"/>      
        <link rel="canonical" href="" />
        <meta name='revisit-after' content='1 days' />    
        <link rel="icon" href="{{ URL::asset('public/assets/favicon.ico') }}" type="image/x-icon" />
        <meta property="og:type" content="website">
        <meta property="og:title" content="Gia Gia Phú">
        <meta property="og:image" content="">
        <meta property="og:image:secure_url" content="">
        <meta property="og:description" content="">
        <meta property="og:url" content="http://giagiaphu.com.vn">
        <meta property="og:site_name" content="Gia Gia Phú">        
        <!-- Css Style -->
        <link href="{{ URL::asset('public/assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Font-Awesome -->
        <link href="{{ URL::asset('public/assets/css/font-awesome.min.css') }}" rel="stylesheet">
        <!-- Carousel -->
        <link href="{{ URL::asset('public/assets/libs/owl/owl.carousel.min.css') }}" rel="stylesheet">
        <!-- Css Style -->
        <link href="{{ URL::asset('public/assets/css/style.css') }}" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js') }}"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js') }}"></script>
        <![endif]-->
    </head>
    <body>
        @include('frontend.partials.header')
        <!-- Header -->
        <section class="wrapper">
            @yield('content')
        </section>
        <!-- Wrapper -->
        @include('frontend.partials.footer')
        <input type="hidden" id="route-set-lang" value="{{ route('set-lang') }}">
        <!-- Footer -->
        <a id="return-to-top" class="td-scroll-up" href="javascript:void(0)">
            <i class="fa fa-angle-up"></i>
        </a>
        <!-- Return to top -->

        <!-- jQuery -->
        <script src="{{ URL::asset('public/assets/js/jquery.min.js') }}"></script>
        <!-- ===== JS Owl ===== -->
        <script src="{{ URL::asset('public/assets/js/bootstrap.min.js') }}"></script>
        <!-- ===== JS Owl ===== -->
        <script src="{{ URL::asset('public/assets/libs/owl/owl.carousel.min.js') }}"></script>
        <!-- ===== JS Sticky ===== -->
        <script src="{{ URL::asset('public/assets/libs/sticky/jquery.sticky.js') }}"></script>
        <!-- JS main -->
        <script src="{{ URL::asset('public/assets/js/main.js') }}"></script>
        @yield('js')
    </body>
</html>