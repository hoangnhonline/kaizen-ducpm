@extends('frontend.layout') 
@include('frontend.partials.meta') 
@section('content')
<section class="bread-crumb margin-bottom-10">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <ul class="breadcrumb" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">         
          <li class="home">
            <a itemprop="url" href="{{ route('home', $lang)}}" title="Trang chủ"><span itemprop="title">{!! $textArr['trang-chu']->$text_key !!}</span></a>           
            <span><i class="fa fa-angle-right"></i></span>
          </li>
          
          <li><strong itemprop="title">{!! $textArr['lien-he']->$text_key !!}</strong></li>
          
        </ul>
      </div>
    </div>
  </div>
</section>
<div class="container contact">
  <div class="row">
    <div class="col-md-4">
      <div class="widget-item info-contact in-fo-page-content">
        <h1 class="title-head">Thông tin liên hệ</h1>
        <!-- End .widget-title -->
        @if($lang == 'vi')
        <h4 style="color:#0184E9">CÔNG TY TNHH TM KT GIA GIA PHÚ</h4>
        @elseif($lang == 'en')
        <h4>Gia Gia Phu Engineering Trading Company Limited</h4>
        @else
        <h4>家家富贸易有限公司</h4>
        @endif
        <ul class="widget-menu contact-info-page">
          @if($lang == 'vi')
          <li><i class="fa fa-map-marker" aria-hidden="true"></i> 22 đường số 8 Cư xá Bình Thới, P8, Q11, HCM</li>
          @elseif($lang == 'en')
          <li><i class="fa fa-map-marker" aria-hidden="true"></i> 22 No.8 Str., Bình Thới Resident, Ward 8, Dist 11, Ho Chi Minh ity</li>
          @else
          <li><i class="fa fa-map-marker" aria-hidden="true"></i> 第11郡.第8坊.平泰住宅区.8号街.22号门牌.胡志明市</li>
          @endif
		  
          <li><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:02839626288">028 39 62 62 88 - 028 39 62 62 99</a></li>
          <li><i class="fa fa-fax" aria-hidden="true"></i> 028 38 545 595</li>  
          <li><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:anhthu@giagiaphu.com.vn">anhthu@giagiaphu.com.vn</a></li>
		  <li style="font-weight:bold">Hotline: <a href="tel:0829102288" style="color:#ca0808">082 910 22 88</a></li>
          
        </ul>
        <!-- End .widget-menu -->
      </div>
      <div class="box-maps margin-top-10 margin-bottom-10">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.656869219266!2d106.64812471513916!3d10.760906062421732!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752e92f3d4b18d%3A0x372438f63e76a724!2zMjIgxJDGsOG7nW5nIFPhu5EgOCwgUGjGsOG7nW5nIDgsIFF14bqtbiAxMSwgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1539679491625" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
    </div>
    <div class="col-md-8">
      <div class="page-login">
        <div id="login">
          <h3 class="title-head">Gửi thông tin</h3>   
          @if(Session::has('message'))
                
                <p class="alert alert-info" >{{ Session::get('message') }}</p>
                
                @endif
                @if (count($errors) > 0)                        
                  <div class="alert alert-danger ">
                    <ul>                           
                        <li>Vui lòng nhập đầy đủ thông tin.</li>                            
                    </ul>
                  </div>                        
                @endif        
          <form class="block-form" action="{{ route('send-contact') }}" method="POST">
                {{ csrf_field() }}
          
          <div class="form-signup clearfix">
            <div class="row">
              <div class="col-sm-6 col-xs-12">
                <fieldset class="form-group">
                  <label>Họ tên<span class="required">*</span></label>
                  <input type="text" name="fullname" id="fullname" class="form-control  form-control-lg" >
                </fieldset>
              </div>
              <div class="col-sm-6 col-xs-12">
                <fieldset class="form-group">
                  <label>Email<span class="required">*</span></label>
                  <input type="email" name="email"  id="email" class="form-control form-control-lg">
                </fieldset>
              </div>
              <div class="col-sm-12 col-xs-12">
                <fieldset class="form-group">
                  <label>Điện thoại<span class="required">*</span></label>
                  <input type="tel" name="phone" id="phone" class="number-sidebar form-control form-control-lg" >
                </fieldset>
              </div>
              <div class="col-sm-12 col-xs-12">
                <fieldset class="form-group">
                  <label>Nội dung<span class="required">*</span></label>
                  <textarea name="content" id="content" class="form-control form-control-lg" rows="5" ></textarea>
                </fieldset>
                <div class="pull-xs-left" style="margin-top:20px;">
                  <button type="submit" class="btn btn-blues btn-style btn-style-active">Gửi tin nhắn</button>
                </div> 
              </div>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@stop