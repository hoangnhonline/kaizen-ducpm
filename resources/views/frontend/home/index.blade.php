@extends('frontend.layout')
@include('frontend.partials.meta')
@section('content')
@if(isset($bannerArr[1]))
 <section class="awe-section-1">
    <div class="home-slider owl-carousel not-dqowl">
       
         <?php $i = 0; ?>
        @foreach($bannerArr[1] as $banner)
        <?php $i++; ?>
        <div class="item">
            @if($banner->ads_url !='')
        <a href="{{ $banner->ads_url }}" title="banner slide {{ $i }}">
        @endif
                <img src="{{ Helper::showImage($banner->image_url) }}" alt="banner slide {{ $i }}" class="img-responsive center-block" />
            @if($banner->ads_url !='')
            </a>
            @endif
        </div>
        @endforeach
    </div>
    <!-- /.products -->
</section>

@endif


<section class="awe-section-2">
    <div class="section_about">
        <div class="section-full bg-gray">
            <div class="container">
                <div class="section-head text-center">                    
                    <h2 class="text-uppercase">{!! $textArr['ve-chung-toi']->$text_key !!}</h2>
                    <div class="wt-separator-outer">
                        <div class="wt-separator style-square">
                            <span class="separator-left bg-primary"></span>
                            <span class="separator-right bg-primary"></span>
                        </div>
                    </div>
                    <p>
                      <div class="col-md-3"><img src="{{ URL::asset('public/assets/gioi-thieu.JPG') }}" class="img-responsive img-thumbnail"></div>
                      <div class="col-md-9" style="text-align: justify;">
                        {!! $textArr['gioi-thieu-trang-chu']->$text_key !!}
                      </div>

                    </p>
                </div>
            </div>                
        </div>
    </div>
</section>
<section class="awe-section-6">

    <div class="section_product">
        <div class="container">
            <div class="section-head text-center">
                <h2 class="text-uppercase">{!! $textArr['san-pham-moi-nhat']->$text_key !!}</h2>
                <div class="wt-separator-outer">
                    <div class="wt-separator style-square">
                        <span class="separator-left bg-primary"></span>
                        <span class="separator-right bg-primary"></span>
                    </div>
                </div>
                <p>

                </p>
            </div>
        </div>
        @if($productList->count() > 0)
        <div class="container">
            <div class="row">
                <div class="col-md-12 e-tabs not-dqtab ajax-tab-1" data-section="ajax-tab-1">
                    <div class="content">
                        <div>                               

                            <div class="tab-1 tab-content">

                                <div class="section-tour-owl products products-view-grid owl-carousel" data-lg-items='6' data-md-items='6' data-sm-items='3' data-xs-items="2" data-xss-items="2" data-margin='10' data-nav="true" data-dot="true">
                                    @foreach($productList as $product)                                    
                                    <div class="item">

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

                            </div>                               

                            <script>
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
@if($articlesList->count() >0)
<section class="awe-section-7">
    <section class="section-news">
        <div class="container">
            <div class="section-head text-center">
                <h2 class="text-uppercase">{!! $textArr['tin-tuc']->$text_key !!}</h2>
                <div class="wt-separator-outer">
                    <div class="wt-separator style-square">
                        <span class="separator-left bg-primary"></span>
                        <span class="separator-right bg-primary"></span>
                    </div>
                </div>                
            </div>
        </div>
        <div class="container">
            <div class="section-content">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">

                        <div class="blog-post latest-blog-3 overlay-wraper">
                            <div class="blog-big-main">
                                <a href="{{ route('news-detail',['lang' => $lang, 'slug' => $articlesList[0]->slug, 'id' => $articlesList[0]->id]) }}">

                                    <img src="{{ Helper::showImage($articlesList[0]->image_url) }}" alt="{!! $articlesList[0]->title !!}" class="img-responsive center-block" />

                                </a>
                            </div>
                            <div class="wt-post-info">
                                <div class="post-overlay-position">
                                    <div class="wt-post-title">
                                        <h3 class="post-title">
                                            <a href="{{ route('news-detail',['lang' => $lang, 'slug' => $articlesList[0]->slug, 'id' => $articlesList[0]->id]) }}" title="{!! $articlesList[0]->title !!}">{!! $articlesList[0]->title !!}</a>
                                        </h3>
                                    </div>
                                    <div class="wt-post-meta">
                                        <ul>
                                            <li class="post-date">
                                                <i class="fa fa-calendar"></i> {{ date('d/m/Y', strtotime($articlesList[0]->created_at)) }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="wt-post-text">{!! $articlesList[0]->description !!}</div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <?php $i = 0; ?>

                    <div class="col-md-6 col-sm-12">
                        @foreach($articlesList as $articles)
                        <?php $i++; ?>
                        @if($i > 1)
                        <div class="blog-post blog-post-small clearfix">
                            <div class="wt-post-media">
                                <a href="{{ route('news-detail',['lang' => $lang, 'slug' => $articles->slug, 'id' => $articles->id]) }}">

                                    <img src="{{ Helper::showImage($articles->image_url) }}" alt="{!! $articles->title !!}" class="img-responsive center-block" />

                                </a>
                                <div class="post-date">
                                    <strong>{{ date('d/m', strtotime($articles->created_at)) }}</strong>
                                    <span>{{ date('Y', strtotime($articles->created_at)) }}</span>
                                </div>
                            </div>
                            <div class="wt-post-info">
                                <div class="wt-post-title">
                                    <h4 class="post-title">
                                        <a href="{{ route('news-detail',['lang' => $lang, 'slug' => $articles->slug, 'id' => $articles->id]) }}" title="{!! $articles->title !!}">{!! $articles->title !!}</a>
                                    </h4>
                                </div>
                                
                                <div class="wt-post-text">
                                    {!! $articles->description !!}
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach

                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="a-more">
                            <a href="{{ route('news', $lang) }}" title="Xem thêm tin">Xem thêm tin</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
@endif
@endsection