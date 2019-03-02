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
                    <li><a href="{{ route('news', $lang)}}">{!! $textArr['tin-tuc']->$text_key !!}</a></li>
                    <li class="active">{!! $detail->title !!}</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- block-breadcrumb -->
<div class="block-products-detail">
    <div class="container">
        <h1 class="products-detail-title text-center">{!! $detail->title !!}</h1>
    </div>
    <div class="products-detail-imgdes">
        <img src="{{ Helper::showImage($detail->image_url_2) }}" alt="{!! $detail->title !!}">
    </div>
    <div class="container">
        <div class="block-fulltext">
            {!! $detail->content !!}
        </div>
    </div>
</div>
@endsection