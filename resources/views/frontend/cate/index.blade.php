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
                    <li class="active">{!! $textArr['san-pham']->$text_key !!}</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- block-breadcrumb -->
<div class="block-products">
    <div class="container">
        @if($productList->count() > 0)
        <ul class="product-list">
            <li class="row">
                @php
                $i = 0;
                @endphp
                <ul>
                @foreach($productList as $product)
                @php $i++; @endphp
                
                    <li class="col-sm-4 col-xs-12 product-item">
                        <div class="row">
                            <a href="{{ route('detail',['lang' => $lang, 'slug' => $product->$slug_key, 'id' => $product->id]) }}" title="{!! $product->$name_key !!}">
                                <img src="{{ Helper::showImage($product->image_url) }}" alt="{!! $product->$name_key !!}" title="{!! $product->$name_key !!}">
                            </a>
                            <h4 class="box-header">
                                <a href="{{ route('detail',['lang' => $lang, 'slug' => $product->$slug_key, 'id' => $product->id]) }}" title="{!! $product->$name_key !!}">{!! $product->$name_key !!}</a>
                            </h4>
                        </div>
                    </li>
                    
                
                @if($i%3 == 0)
                </ul>
                <ul>
                @endif
                @endforeach
                </ul>
            </li>            
        </ul>
        @endif
    </div>
</div>
@endsection