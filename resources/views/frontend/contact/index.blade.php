@extends('frontend.layout') 
@include('frontend.partials.meta') 
@section('content')
<div class="block-breadcrumb">
    <div class="container">
        <div class="clearfix">
            <div class="breadcrumb-header pull-left"></div>
            <div class="pull-right">
                <ol class="breadcrumb">
                    <li><a href="{{ route('home', $lang) }}">{!! $textArr['trang-chu']->$text_key !!}</a></li>
                    <li class="active">{!! $textArr['lien-he']->$text_key !!}</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- block-breadcrumb -->
<div class="block-map">
    <object class="mymap"
        data="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.761686580405!2d106.68566031418239!3d10.752841262570378!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f05f44613b5%3A0xbb3b2749bdf9a76c!2zV2FyZCAxMCwgMTIzIELhur9uIFbDom4gxJDhu5NuLCBwaMaw4budbmcgMSwgUXXhuq1uIDQsIEjhu5MgQ2jDrSBNaW5oLCBWaWV0bmFt!5e0!3m2!1sen!2s!4v1527634071490"></object>
</div>
<!-- block-map -->
<div class="block-get-in-touch">
    <div class="container">
        <div class="block-title">
            <h2 class="title">{!! $textArr['touch']->$text_key !!}</h2>
            <p class="description">{!! $textArr['help']->$text_key !!}</p>
        </div>
        <div class="block-form">
            <div class="row">
              <div class="col-sm-4"></div>
              <div class="col-sm-6">
                @if(Session::has('message'))            
                <p class="alert alert-info" >{{ Session::get('message') }}</p>                
                @endif
                @if (count($errors) > 0)                        
                  <div class="alert alert-danger ">
                    <ul>                           
                        <li>{!! $textArr['fill']->$text_key !!}</li>                            
                    </ul>
                  </div>                        
                @endif
              </div>
            </div>
            
            <form class="block-form" action="{{ route('send-contact') }}" method="POST">
                {{ csrf_field() }}
            
            <div class="row block-form-sec">
                <div class="col-sm-4">
                    <div class="clearfix">
                        <p class="img"><img src="{{ URL::asset('public/assets/images/mail.svg') }}" alt=""></p>
                        <p class="title">
                            <span class="name">{!! $textArr['cemail']->$text_key !!}</span>
                            <span class="value">{!! $settingArr['email'] !!}</span>
                        </p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <input type="input" name="fullname" id="fullname" value="{{ old('fullname') }}" class="form-control" placeholder="{!! $textArr['name']->$text_key !!}">
                </div>
            </div>
            <div class="row block-form-sec">
                <div class="col-sm-4">
                    <div class="clearfix">
                        <p class="img"><img src="{{ URL::asset('public/assets/images/phone.svg') }}" alt=""></p>
                        <p class="title">
                            <span class="name">{!! $textArr['cphone']->$text_key !!}</span>
                            <span class="value">{!! $settingArr['phone'] !!}</span>
                        </p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <input type="input" name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="row block-form-sec">
                <div class="col-sm-4">
                    <div class="clearfix">
                        <p class="img"><img src="{{ URL::asset('public/assets/images/place.svg') }}" alt=""></p>
                        <p class="title">
                            <span class="name">{!! $textArr['dia-chi']->$text_key !!}</span>
                            <span class="value">{!! $textArr['dia-chi-cty']->$text_key !!}</span>
                        </p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <textarea name="content" id="content" class="form-control" rows="5" style="max-width: 100%;"
                        placeholder="{!! $textArr['message']->$text_key !!}">{{ old('content') }}</textarea>
                </div>
            </div>
            <div class="row block-form-sec">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-primary">{!! $textArr['gui']->$text_key !!}</button>
                </div>
            </div>
          </form>
        </div>
    </div>
</div>
@stop

@section('js')
<script type="text/javascript">
  $(document).ready(function(){
      @if (count($errors) > 0 || Session::has('message'))  
      $("html, body").animate({
          scrollTop: $('.block-get-in-touch').offset().top 
      }, 500);
      @endif
  });
</script>
@stop