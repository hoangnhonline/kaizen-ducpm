@extends('frontend.layout')

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
					
					<li><strong itemprop="title">{!! $detail->$title_key !!}</strong></li>
					
				</ul>
			</div>
		</div>
	</div>
</section>
<div class="container article-wraper" style="margin-bottom: 150px;">
	<div class="row">		
		<section class="right-content col-md-9 col-md-push-3">
			<article class="article-main" itemscope="" itemtype="http://schema.org/Article">				
				
				<div class="row">
					<div class="col-md-12">
						<h1 class="title-head">{!! $detail->$title_key !!}</h1>
						
						
						<div class="article-details">						
							<div class="article-content">
								<div class="rte">
									{!! $detail->$content_key !!}
								</div>
							</div>
						</div>
					</div>
					
				
				</div>				
			</article>
		</section>		
		
		@include('frontend.pages.sidebar')
		
	</div>
</div>
@endsection