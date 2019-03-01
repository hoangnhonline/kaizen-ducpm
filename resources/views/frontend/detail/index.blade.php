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
          <li>
            <a itemprop="url" href="{{ route('cates', ['lang' => $lang, 'slug' => $rsCate->$slug_key])}}" title="{!! $rsCate->$name_key !!}">
              <span itemprop="title">{!! $rsCate->$name_key !!}</span>
            </a>
            <span><i class="fa fa-angle-right"></i></span>
          </li>
          
          <li><strong itemprop="title">{!! $detail->$name_key !!}</strong></li>
          
        </ul>
      </div>
    </div>
  </div>
</section>
<div class="container" style="margin-bottom: 200px">
    <div class="row">
        <div class="col-lg-9 col-md-8">
        <div class="row product-bottom">
          <div class="clearfix padding-bottom-10">
            <div class="col-xs-12 col-sm-6 col-lg-6 col-md-6">
              <div class="relative product-image-block ">
                <div class="large-image">
                  
                      <img id="zoom_01" src="{{ Helper::showImage($detail->image_url) }}" alt="{!! $detail->$name_key !!}" class="img-responsive center-block" style="width: 100%">
                               
                  
                </div>                  
               
                
              </div>
              
             
              
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-6 col-md-6 details-pro">
              <div class="product-top clearfix">
                <h1 class="title-head">{!! $detail->$name_key !!}</h1>
               
              </div>
            </div>
          </div>
        </div>
        
        <div class="row margin-top-10">
          <div class="col-md-12">
            <div class="product-tab e-tabs padding-bottom-10">    
              <div class="border-ghghg margin-bottom-20">
                <ul class="tabs tabs-title clearfix"> 
                  
                  <li class="tab-link current" data-tab="tab-1">
                    <h3><span>Mô tả</span></h3>
                  </li>                                               
                  
                </ul>                                                 
              </div>
              
              <div id="tab-1" class="tab-content current">
                <div class="rte">
                  
                  
                  
                  <div class="product-well expanded">
                    {!! $detail->$content_key !!}
                    
                  </div>
                  
                  
                </div>
              </div>
              
              
            </div>        
          </div>
        </div> 
        
      </div>

        @include('frontend.detail.sidebar')

    </div>
</div>
@endsection