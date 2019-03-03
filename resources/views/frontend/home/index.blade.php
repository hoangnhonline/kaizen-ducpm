@extends('frontend.layout')
@include('frontend.partials.meta')
@section('content')
@if(isset($bannerArr[1]))
<section class="block-mainvisual">
    <ul  class="owl-carousel" data-nav="true" data-dots="false" data-margin="0" data-items='1' data-autoplayTimeout="700" data-autoplay="false" data-loop="true">
       
         <?php $i = 0; ?>
        @foreach($bannerArr[1] as $banner)
        <?php $i++; ?>
        <li class="item">
            @if($banner->ads_url !='')
            <a href="{{ $banner->ads_url }}" title="banner slide {{ $i }}">
            @endif
                <img src="{{ Helper::showImage($banner->image_url) }}" alt="banner slide {{ $i }}" class="img-responsive center-block" />
            @if($banner->ads_url !='')
            </a>
            @endif
            <!-- <div class="figcaption">
                <div class="box-table">
                    <div class="box-td">
                        <div class="box-des">
                            <h2 class="text-large">MAKE YOUR CAR LAST LONGER</h2>
                            <h3 class="text-medium">Free oil change, April 15. Only if you have a "5" on your license plate.</h3>
                        </div>
                    </div>
                </div>
            </div> -->
        </li>
        @endforeach
    </ul>
    <!-- /.products -->
</section>

@endif
<!-- /.block-mainvisual -->
<section class="block block-about">
    <div class="container">
        <h2 class="block-title block-title-style1">{!! $textArr['ve-chung-toi']->$text_key !!}</h2>
        <div class="block-content">
            <div class="row">
                <div class="col-sm-5 col-xs-12 block-txt">
                    <div class="box-table">
                        <div class="box-td">
                            @php                         
                            $aboutNameKey = 'title_'.$lang;
                            $aboutContentKey = 'content_'.$lang;
                            @endphp
                            <p class="txt">{!! $about->$aboutNameKey!!}</p>
                            <p class="des">{!! $about->$aboutContentKey !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-7 col-xs-12 block-img">
                    <img src="{{ Helper::showImage($about->image_url) }}" alt="{!! $textArr['ve-chung-toi']->$text_key !!}">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.block-about -->
<section class="block block-why-us">
    <div class="container">
        <h2 class="block-title block-title-style1">{!! $textArr['tai-sao-chon']->$text_key !!}</h2>
        <div class="block-sub-title text-center">
            <p>{!! $textArr['tucson']->$text_key !!}<br>
                {!! $textArr['mechanics']->$text_key !!}
            </p>
        </div>
        <div class="block-content row">
            <div class="col-sm-4 col-xs-12">
                <div class="why-us-item">
                    <div class="hexagon"><div class="sl-small-user-chat"></div></div>
                    <h4 class="why-us-item-title">{!! $textArr['pro']->$text_key !!}</h4>
                    <p class="why-us-item-des">{!! $textArr['found-it']->$text_key !!}</p>
                </div>
            </div>
            <div class="col-sm-4 col-xs-12">
                <div class="why-us-item">
                    <div class="hexagon">
                        <div class="sl-small-wrench-screwdriver"></div>
                    </div>
                    <h4 class="why-us-item-title">{!! $textArr['best']->$text_key !!}</h4>
                    <p class="why-us-item-des">{!! $textArr['vehicle']->$text_key !!}</p>
                </div>
            </div>
            <div class="col-sm-4 col-xs-12">
                <div class="why-us-item">
                    <div class="hexagon">
                        <div class="sl-small-truck-tow"></div>
                    </div>
                    <h4 class="why-us-item-title">{!! $textArr['value']->$text_key !!}</h4>
                    <p class="why-us-item-des">{!! $textArr['problem']->$text_key !!}</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- block-why-us -->
@if($commentList->count() > 0)
<div class="block block-cunstomer-reviews">
    <div class="container">
        <div class="block-content">
            <ul class="owl-carousel" data-nav="true" data-dots="false" data-margin="0" data-items='1' data-autoplayTimeout="700" data-autoplay="false" data-loop="true">
                @foreach($commentList as $comment)
                <li class="item">
                    <div class="hexagon small">
                        <div class="sl-small-pen"></div>
                    </div>
                    <p class="cunstomer-reviews-title">"{!! $comment->$content_key!!}"
                    </p>
                    <div class="cunstomer-reviews-author">
                        <h6>{!! $comment->name !!}</h6>
                    </div>
                </li>
               @endforeach
            </ul>
        </div>
    </div>
</div>
@endif
<!-- /.block-cunstomer-reviews -->
<section class="block block-partner">
    <div class="container">
        <h2 class="block-title block-title-style1">{!! $textArr['partner']->$text_key !!}</h2>
        <ul class="owl-carousel owl-theme owl-style2" data-nav="false" data-dots="true" data-loop="true" data-autoplay="true" data-margin="30" data-responsive='{"0":{"items":3},"480":{"items":3},"600":{"items":3},"768":{"items":4},"800":{"items":5},"992":{"items":6}}'>
            <li class="item" data-dot="1"><img src="{{ URL::asset('public/assets/images/partner/partner1.png') }}" alt=""></li>
            <li class="item" data-dot="2"><img src="{{ URL::asset('public/assets/images/partner/partner2.png') }}" alt=""></li>
            <li class="item" data-dot="3"><img src="{{ URL::asset('public/assets/images/partner/partner3.png') }}" alt=""></li>
            <li class="item" data-dot="4"><img src="{{ URL::asset('public/assets/images/partner/partner4.png') }}" alt=""></li>
            <li class="item" data-dot="5"><img src="{{ URL::asset('public/assets/images/partner/partner5.png') }}" alt=""></li>
            <li class="item" data-dot="6"><img src="{{ URL::asset('public/assets/images/partner/partner6.png') }}" alt=""></li>
            <li class="item" data-dot="7"><img src="{{ URL::asset('public/assets/images/partner/partner1.png') }}" alt=""></li>
            <li class="item" data-dot="8"><img src="{{ URL::asset('public/assets/images/partner/partner2.png') }}" alt=""></li>
            <li class="item" data-dot="9"><img src="{{ URL::asset('public/assets/images/partner/partner3.png') }}" alt=""></li>
            <li class="item" data-dot="10"><img src="{{ URL::asset('public/assets/images/partner/partner4.png') }}" alt=""></li>
            <li class="item" data-dot="11"><img src="{{ URL::asset('public/assets/images/partner/partner5.png') }}" alt=""></li>
            <li class="item" data-dot="12"><img src="{{ URL::asset('public/assets/images/partner/partner6.png') }}" alt=""></li>
        </ul>
    </div>
</section>
<!-- /.block-partner -->
@stop