<aside class="left left-content col-md-3">
			
	<aside class="aside-item collection-category blog-category">	
		<div class="heading">
			<h2 class="title-head"><span>Danh mục</span></h2>
		</div>	
		<div class="aside-content">
			<nav class="nav-category  navbar-toggleable-md">
				<ul class="nav navbar-pills">
					
					<li class="nav-item ">
						<a class="nav-link" href="{{ route('home', $lang) }}">{!! $textArr['trang-chu']->$text_key !!}</a>
					</li>					
					
					<li class="nav-item ">
						<a href="javascript:;" class="nav-link">{!! $textArr['gioi-thieu']->$text_key !!}</a>
						<i class="fa fa-angle-down"></i>
						<ul class="dropdown-menu">							
							@foreach($aboutList as $about)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('pages', ['lang' => $lang, 'slug' => $about->$slug_key])}}">{!! $about->$title_key !!}</a>
                            </li>
                            @endforeach
						</ul>
					</li>
					<li class="nav-item ">
						<a href="javascript:;" class="nav-link">{!! $textArr['san-pham']->$text_key !!}</a>
						<i class="fa fa-angle-down"></i>
						<ul class="dropdown-menu">							
							@foreach($cateList as $cate)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('cates', ['lang' => $lang, 'slug' => $cate->$slug_key])}}">{!! $cate->$name_key !!}</a>
                            </li>
                            @endforeach
						</ul>
					</li>

					<li class="nav-item ">
						<a class="nav-link" href="{{ route('news', $lang) }}">{!! $textArr['tin-tuc']->$text_key !!} </a>
					</li>
					<li class="nav-item ">
						<a class="nav-link" href="{{ route('contact', $lang) }}">{!! $textArr['lien-he']->$text_key !!} </a>
					</li>
					
				</ul>
			</nav>
		</div>
	</aside>
</aside>