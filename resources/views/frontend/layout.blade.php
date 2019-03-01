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
    <link rel="canonical" href="http://giagiaphu.com.vn" />
    <meta name='revisit-after' content='1 days' />    
    <link rel="icon" href="{{ URL::asset('public/assets/favicon.ico') }}" type="image/x-icon" />
    <meta property="og:type" content="website">
    <meta property="og:title" content="Gia Gia Phú">
    <meta property="og:image" content="http:assets/logo.png">
    <meta property="og:image:secure_url" content="">
    <meta property="og:description" content="">
    <meta property="og:url" content="http://giagiaphu.com.vn">
    <meta property="og:site_name" content="Gia Gia Phú">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/ionicons@4.1.1/dist/css/ionicons.min.css">
    <link href="{{ URL::asset('public/assets/plugin.scss.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ URL::asset('public/assets/owl.carousel.min.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ URL::asset('public/assets/base.scss.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ URL::asset('public/assets/style.scss.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ URL::asset('public/assets/ant-construction.scss.css') }}" rel='stylesheet' type='text/css' />
    <script src="{{ URL::asset('public/assets/jquery-2.2.3.min.js') }}" type='text/javascript'></script>
</head>

<body>
    <!-- Main content -->
    <header class="header">

        <div class="container">
            <div class="header-main">
                <div class="row">
                    <div class="col-md-6 col-100-h">
                        <button type="button" class="navbar-toggle collapsed visible-sm visible-xs" id="trigger-mobile">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="logo">
                            <a href="{{ route('home') }}" class="logo-wrapper ">
                                <img class="img-responsive center-block" src="{{ URL::asset('public/assets/logo.png') }}" alt="logo Gia Gia Phú">
                            </a>
                        </div>
                        <div class="mobile-cart visible-sm visible-xs col-xs-12">
                            <ul>
                            @if($lang != 'vi')
                            <li><a href="{{ route('home', 'vi')}}"><img src="{{ URL::asset('public/assets/images/vn.png') }}"> Vietnamese</a></li>  
                            @endif
                            @if($lang != 'cn')
                            <li><a href="{{ route('home', 'cn')}}"><img src="{{ URL::asset('public/assets/flag_cn.gif') }}"> Chineses</a></li>
                            @endif
                            @if($lang != 'en')
                            <li><a href="{{ route('home', 'en')}}"><img src="{{ URL::asset('public/assets/flag_en.gif') }}"> English</a></li>           
                            @endif
                          </ul> 
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="search">
                            <div class="header_search search_form">
                                <form class="input-group search-bar search_form" action="/search" method="get" role="search">
                                    <input type="search" name="query" value="" placeholder="Tìm kiếm sản phẩm... " class="input-group-field st-default-search-input search-text" autocomplete="off">
                                    <span class="input-group-btn">
			<button class="btn icon-fallback-text">
				<i class="fa fa-search"></i>
			</button>
		</span>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 hidden-sm hidden-xs">                       
                        <div id="TopMenu">
					    	<ul>
                            @if($lang != 'vi')
					    	<li><a href="{{ route('home', 'vi')}}"><img src="{{ URL::asset('public/assets/images/vn.png') }}"> Vietnamese</a></li>	
                            @endif
                            @if($lang != 'cn')
					    	<li><a href="{{ route('home', 'cn')}}"><img src="{{ URL::asset('public/assets/flag_cn.gif') }}"> Chineses</a></li>
					    	@endif
                            @if($lang != 'en')
					    	<li><a href="{{ route('home', 'en')}}"><img src="{{ URL::asset('public/assets/flag_en.gif') }}"> English</a></li>	        
					        @endif
					      </ul> 
					    </div>
                                          
                    </div>
                </div>
            </div>
        </div>
        <nav class="hidden-sm hidden-xs">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul id="nav" class="nav">

                            <li class="nav-item active"><a class="nav-link" href="{{ route('home') }}">{!! $textArr['trang-chu']->$text_key !!}</a></li>

                            <li class="nav-item "> 
                                <a href="javascript:;" class="nav-link">{!! $textArr['gioi-thieu']->$text_key !!} <i class="fa fa-angle-down" data-toggle="dropdown"></i></a>
                                <ul class="dropdown-menu">
                                    @foreach($aboutList as $about)
                                    <li>
                                        <a class="nav-link" href="{{ route('pages', ['lang' => $lang, 'slug' => $about->$slug_key])}}">{!! $about->$title_key !!}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>

                            <li class="nav-item ">
                                <a href="javascript:;" class="nav-link">{!! $textArr['san-pham']->$text_key !!}  <i class="fa fa-angle-down" data-toggle="dropdown"></i></a>
                                <ul class="dropdown-menu">
                                    @foreach($cateList as $cate)
                                    <li>
                                        <a class="nav-link" href="{{ route('cates', ['lang' => $lang, 'slug' => $cate->$slug_key])}}">{!! $cate->$name_key !!}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="nav-item ">
                                <a href="{{ route('news', $lang) }}" class="nav-link">{!! $textArr['tin-tuc']->$text_key !!}</a>
                            </li>

                            <li class="nav-item "><a class="nav-link" href="{{ route('contact', $lang) }}">{!! $textArr['lien-he']->$text_key !!}</a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>  

    @yield('content')

    <footer class="footer">
        <div class="site-footer">
            <div class="container">
                <div class="footer-inner padding-top-25 padding-bottom-10">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-no-mb">
                            <div class="footer-widget">
                                <h3><span>Thông tin liên hệ</span></h3>
                                <ul class="list-menu ul-footer-contact">
                                    @if($lang == 'vi')
                                      <li><span><i class="fa fa-map-marker" aria-hidden="true"></i></span> 22 đường số 8 Cư xá Bình Thới, P8, Q11, HCM</li>
                                      @elseif($lang == 'en')
                                      <li><i class="fa fa-map-marker" aria-hidden="true"></i> 22 No.8 Str., Bình Thới Resident, Ward 8, Dist 11, Ho Chi Minh ity</li>
                                      @else
                                      <li><i class="fa fa-map-marker" aria-hidden="true"></i> 第11郡.第8坊.平泰住宅区.8号街.22号门牌.胡志明市</li>
                                      @endif
                                    <li><span><i class="fa fa-phone" aria-hidden="true"></i></span> <a class="a-phone" href="tel:02839626288">028 39 62 62 88 - 028 39 62 62 99</a></li>
									<li style="font-weight:bold"><span>Hotline </span><a href="tel:0829102288" style="color:#ca0808"> &nbsp;082 910 22 88</a></li>
									<li><span><i class="fa fa-fax" aria-hidden="true"></i></span> 028 38 545 595</li>
                                    <li><span><i class="fa fa-envelope" aria-hidden="true"></i></span> <a href="mailto:anhthu@giagiaphu.com.vn">anhthu@giagiaphu.com.vn </a></li>
                                    <li><span><i class="fa fa-internet-explorer" aria-hidden="true"></i></span> <a href="http://giagiaphu.com.vn">https://giagiaphu.com.vn</a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 col-mb">
                            <div class="footer-widget">
                                <h3><span>Menu</span></h3>
                                <ul class="list-menu footer-has-border">

                                    <li><a href="{{ route('home') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> {!! $textArr['trang-chu']->$text_key !!}</a></li>

                                    <li><a href="{{ route('pages', [$lang, 'gioi-thieu-cong-ty'])}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> {!! $textArr['gioi-thieu']->$text_key !!}</a></li>

                                    <li><a href="{{ route('news', $lang) }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> {!! $textArr['tin-tuc']->$text_key !!}</a></li>

                                    <li><a href="{{ route('contact', $lang) }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> {!! $textArr['lien-he']->$text_key !!}</a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-mb">
                            <div class="footer-widget dat-hang">
                                <h3><span>{!! $textArr['ho-tro-dat-hang']->$text_key !!}</span></h3>
                                <ul class="list-menu">
                                    <li>
                                       <p>028 39 62 62 88</p>                                       
                                    </li>
                                    <li>
                                       <p>028 39 62 62 99</p>                                       
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-mb">
                            <div class="footer-widget">
                                <h3><span>{!! $textArr['ho-tro-online']->$text_key !!}</span></h3>
                                <ul class="list-menu footer-has-border online">

                                    <li>
                                       <p>Ms Anh Thư - 0908 088 933</p>                                       
                                    </li>
                                    <li>
                                       <p>Mr Tường - 0932 662 633</p>                                       
                                    </li>

                                </ul>
                                <ul class="counter">
                                    <li><span>Truy cập hôm nay:</span> {{ number_format(Helper::view(1, 3, 1)) }}</li>
                                    <li><span>Tổng lượt truy cập:</span> {{ number_format(Helper::view(1, 3)) }}</li>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="constrot-strip"></div>
        <div class="copyright clearfix">
            <div class="container">
                <div class="inner clearfix">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <span>© Bản quyền thuộc về <b>GIA GIA PHU</b> <span class="s480-f">|</span> Cung cấp bởi <a href="http://sahoweb.com" title="sahoweb" target="_blank" rel="nofollow">sahoweb</a></span>

                        </div>
                    </div>
                </div>

                <div class="back-to-top"><i class="fa  fa-arrow-circle-up"></i></div>

            </div>
        </div>
    </footer>
    <!-- Bizweb javascript -->
    <script src="{{ URL::asset('public/assets/option-selectors.js') }}" type='text/javascript'></script>
    <script src="{{ URL::asset('public/assets/api.jquery.js') }}" type='text/javascript'></script>
    <!-- Plugin JS -->
    <script src="{{ URL::asset('public/assets/owl.carousel.min.js') }}" type='text/javascript'></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
        $.validate({});
    </script>   
    <script src="{{ URL::asset('public/assets/appear.js') }}" type='text/javascript'></script>
    <script src="{{ URL::asset('public/assets/cs.script.js') }}" type='text/javascript'></script>

    <script src="{{ URL::asset('public/assets/counterup-min.js') }}" type='text/javascript'></script>   

    <script src="{{ URL::asset('public/assets/main.js') }}" type='text/javascript'></script>

    <div class="backdrop__body-backdrop___1rvky"></div>
    <div class="mobile-main-menu">               
        <div class="la-scroll-fix-infor-user">
            <!--CATEGORY-->
            <div class="la-nav-menu-items">                
                <ul class="la-nav-list-items">

                    <li class="ng-scope">
                        <a href="{{ route('home', $lang) }}">{!! $textArr['trang-chu']->$text_key !!}</a>
                    </li>

                    <li class="ng-scope ng-has-child1">
                        <a href="javascript:;">{!! $textArr['gioi-thieu']->$text_key !!} <i class="fa fa-plus fa1" aria-hidden="true"></i></a>
                        <ul class="ul-has-child1">
                            @foreach($aboutList as $about)
                            <li class="ng-scope">
                                <a href="{{ route('pages', ['lang' => $lang, 'slug' => $about->$slug_key])}}">{!! $about->$title_key !!}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="ng-scope ng-has-child1">
                        <a href="javascript:;">{!! $textArr['san-pham']->$text_key !!} <i class="fa fa-plus fa1" aria-hidden="true"></i></a>
                        <ul class="ul-has-child1">
                            @foreach($cateList as $cate)
                            <li class="ng-scope">
                                <a href="{{ route('cates', ['lang' => $lang, 'slug' => $cate->$slug_key])}}">{!! $cate->$name_key !!}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="ng-scope">
                        <a href="{{ route('news', $lang) }}">{!! $textArr['tin-tuc']->$text_key !!} </a>
                    </li>

                    <li class="ng-scope">
                        <a href="{{ route('contact', $lang) }}">{!! $textArr['lien-he']->$text_key !!}</a>
                    </li>

                </ul>
            </div>
        </div>        
    </div>
</body>

</html>