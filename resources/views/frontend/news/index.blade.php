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
          
          <li><strong itemprop="title">{!! $textArr['tin-tuc']->$text_key !!}</strong></li>
          
        </ul>
      </div>
    </div>
  </div>
</section>
<div class="container" style="margin-bottom: 150px;">
    <div class="row">
        <section class="right-content col-md-9 list-blog-page">	
			<div class="box-heading hidden">
				<h1 class="title-head">Tin tức</h1>
			</div>
			<section class="list-blogs blog-main margin-top-30">
				<div class="row">
					@foreach($articlesList as $articles)	
					<div class="col-md-12 col-sm-12 col-xs-12 clearfix">
						<article class="blog-item">
							<div class="blog-item-thumbnail">						
								<a href="{{ route('news-detail',['lang' => $lang, 'slug' => $articles->slug, 'id' => $articles->id]) }}">
									
									<img src="{{ Helper::showImage($articles->image_url) }}" alt="{!! $articles->title !!}" class="img-responsive center-block">
									
								</a>
								<div class="created-date">
									<i class="fa fa-calendar"></i> <span>{{ date('d/m/Y', strtotime($articles->created_at)) }}</span>
								</div>
							</div>
							<div class="blog-item-mains">
								<h3 class="blog-item-name"><a href="{{ route('news-detail',['lang' => $lang, 'slug' => $articles->slug, 'id' => $articles->id]) }}" title="{!! $articles->title !!}">{!! $articles->title !!}</a></h3>								
								<p class="blog-item-summary margin-bottom-5">{!! $articles->description !!}</p>
							</div>
						</article>
					</div>
					@endforeach
				</div>
			</section>
			
			
		</section>

        @include('frontend.detail.sidebar')

    </div>
</div>
@endsection