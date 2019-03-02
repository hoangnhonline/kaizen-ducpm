@extends('frontend.layout') 
@include('frontend.partials.meta') 
@section('content')
<div class="block-breadcrumb">
    <div class="container">
        <div class="clearfix">
            <div class="breadcrumb-header pull-left"></div>
            <div class="pull-right">
                <ol class="breadcrumb">
                    <li><a href="{{ route('home', $lang)}}">{!! $textArr['trang-chu']->$text_key !!}</a></li>
                    <li><a href="{{ route('cates', $lang)}}">{!! $textArr['san-pham']->$text_key !!}</a></li>
                    <li class="active">{!! $detail->$name_key !!}</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- block-breadcrumb -->
<div class="block-products-detail">
    <div class="container">
        <h1 class="products-detail-title text-center">{!! $detail->$name_key !!}</h1>
    </div>
    <div class="products-detail-imgdes">
        <img src="{{ Helper::showImage($detail->image_url_2) }}" alt="{!! $detail->title !!}">
    </div>
    <div class="container">
        <div class="block-fulltext">
            {!! $detail->$content_key !!}
        </div>
    </div>
</div>
@endsection