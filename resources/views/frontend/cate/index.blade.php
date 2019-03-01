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
					
					<li><strong itemprop="title">{!! $detailCate->$name_key !!}</strong></li>
					
				</ul>
			</div>
		</div>
	</div>
</section>
<div class="container" style="margin-bottom: 150px;">
    <div class="row">
        <section class="main_container collection col-md-9 col-md-push-3">
            <h1 class="hidden title-head margin-top-0">{!! $detailCate->$name_key !!}</h1>
            <div class="category-products products margin-top-15 category-products-grids">

                <section class="products-view products-view-grid">
                	@if($productList->count() > 0)
                    <div class="row">
                    	@foreach($productList as $product)
                        <div class="col-xs-6 col-sm-4 col-md-4">
                            <div class="single-product">
                                <div class="pro-img">
                                    <a href="{{ route('detail',['lang' => $lang, 'slug' => $product->$slug_key, 'id' => $product->id]) }}">
                                        <img class="primary-img img-responsive center-block" src="{{ Helper::showImage($product->image_url) }}" alt="{!! $product->$name_key !!}" >
                                    </a>
                                </div>
                                <div class="pro-content">                                   
                                    <h4><a href="{{ route('detail',['lang' => $lang, 'slug' => $product->$slug_key, 'id' => $product->id]) }}" title="{!! $product->$name_key !!}">{!! $product->$name_key !!}</a></h4>
                                </div>

                            </div>
                        </div>  
                        @endforeach                    
                    </div>
                    @endif

                </section>

            </div>
        </section>

        @include('frontend.pages.sidebar')

    </div>
</div>
@endsection