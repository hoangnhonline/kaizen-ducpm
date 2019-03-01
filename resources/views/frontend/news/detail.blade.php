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
          
          <li><strong itemprop="title">{!! $detail->title !!}</strong></li>
          
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
            <h1 class="title-head">{!! $detail->title !!}</h1>
            
            <div class="postby">
              <span>{{ date('d/m/Y', strtotime($detail->created_at)) }}</span>
            </div>
            <div class="article-details">           
              <div class="article-content">
                <div class="rte">
                  <div class="caption">
                    {!! $detail->content !!}
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          
          <div class="col-md-12">
         
          </div>
          
          <div class="col-md-12">
            <div class="blog_related">
              <h2>Bài viết liên quan</h2>
              @foreach($relatedList as $articles)
              <article class="blog_entry clearfix">
                <h3 class="blog_entry-title"><a rel="bookmark" href="{{ route('news-detail',['lang' => $lang, 'slug' => $articles->slug, 'id' => $articles->id]) }}" title="{!! $articles->title !!}"><i class="fa fa-angle-right" aria-hidden="true"></i> {!! $articles->title !!}</a></h3>
              </article>              
              @endforeach
            </div>
          </div>         
          
        </div>        
      </article>
    </section>

        @include('frontend.pages.sidebar')

    </div>
</div>
@endsection