<header class="header">
  <div class="header-top">
      <div class="container">
              <div class="block-language">
                  <ul>
                      <li>
                          <span>Language</span>
                          <span>:</span>
                      </li>
                      <li>
                          <a href="{{ route('home', 'en') }}" title="English">
                              <span><img src="{{ URL::asset('public/assets/images/us.png') }}" alt=""></span>
                              <span>EN</span>
                          </a>
                      </li>
                      <li>
                          <a href="{{ route('home', 'vi') }}" title="Tiếng Việt">
                              <span><img src="{{ URL::asset('public/assets/images/VN.png') }}" alt=""></span>
                              <span>VN</span>
                          </a>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
  </div>
  <div class="stick-header">
      <div class="container">
          <div class="row">
              <div class="col-sm-4 col-xs-12 block-logo">
                  <h1 class="header-logo">
                      <a href="{{ route('home', $lang) }}" title="{!! $textArr['trang-chu']->$text_key !!}">
                          <img src="{{ URL::asset('public/assets/images/logo.png') }}" alt="">
                      </a>
                  </h1>
                  <button type="button" class="navbar-toggle">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>
              </div>
              <div class="col-sm-8 col-xs-12 block-menu">
                  <ul class="menu">
                      <li @if($routeName == 'home') class="active" @endif>
                          <a href="{{ route('home', $lang) }}" title="{!! $textArr['trang-chu']->$text_key !!}">{!! $textArr['trang-chu']->$text_key !!}</a>
                      </li>
                      <li @if($routeName == 'cates' || $routeName == 'detail') class="active" @endif>
                          <a href="{{ route('cates', $lang) }}" title="{!! $textArr['san-pham']->$text_key !!}">{!! $textArr['san-pham']->$text_key !!}</a>
                      </li>
                      <li @if($routeName == 'news' || $routeName == 'news-detail') class="active" @endif>
                          <a href="{{ route('news', $lang) }}" title="{!! $textArr['tin-tuc']->$text_key !!}">{!! $textArr['tin-tuc']->$text_key !!}</a>
                      </li>
                      <li @if($routeName == 'contact') class="active" @endif>
                          <a href="{{ route('contact', $lang) }}" title="{!! $textArr['lien-he']->$text_key !!}">{!! $textArr['lien-he']->$text_key !!}</a>
                      </li>
                      <li class="search">
                          <span><i class="fa fa-search"></i></span>
                          <form method="GET" action="{{ route('search') }}" autocomplete="on">
                              <input id="search" name="search" type="text" value="{{ isset($tu_khoa) ? $tu_khoa : trans('text.nhap-ten-san-pham') }}" placeholder="What're we looking for ?">
                              <button value="Submit" type="submit">
                                  <i class="fa fa-search"></i>
                              </button>
                          </form>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
  </div>
</header>