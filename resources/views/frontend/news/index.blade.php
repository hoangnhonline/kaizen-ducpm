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
                    <li class="active">News</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- block-breadcrumb -->
<div class="block-news">
    <div class="container">
        <div class="news-items">
            <ul>
            	@foreach($articlesList as $articles)	
                <li class="news-item">
                    <div class="row">
                        <div class="col-sm-6 col-xs-12 block-img">
                            <a href="{{ route('news-detail',['lang' => $lang, 'slug' => $articles->slug, 'id' => $articles->id]) }}"><img src="{{ Helper::showImage($articles->image_url) }}" alt="{!! $articles->title !!}"></a>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="news-content">
                                <h3 class="title"><a title="{!! $articles->title !!}" href="{{ route('news-detail',['lang' => $lang, 'slug' => $articles->slug, 'id' => $articles->id]) }}">{!! $articles->title !!}</a></h3>
                                <div class="news-widgets">
                                    <p class="date">
                                        <img src="{{ URL::asset('public/assets/images/calendar.svg') }}" alt="calendar">
                                        <span>{{ date('d/m/Y', strtotime($articles->created_at)) }}</span>
                                    </p>
                                    <!-- <p class="comments">
                                        <img src="images/comment.svg" alt="comments">
                                        <span>1 comments</span>
                                    </p> -->
                                </div>
                                <p class="description">{!! $articles->description !!}</p>
                                <a href="{{ route('news-detail',['lang' => $lang, 'slug' => $articles->slug, 'id' => $articles->id]) }}" class="btn btn-primary">See more</a>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach					
            </ul>
        </div>
        <div class="block-loadmore">
            <a href="Load more" title="Load more">Load more</a>
            <p><img src="{{ URL::asset('public/assets/images/shape.svg') }}" alt="shape"></p>
        </div>
    </div>
</div>
@endsection