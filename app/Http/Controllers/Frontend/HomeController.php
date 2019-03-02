<?php
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Cate;
use App\Models\Product;
use App\Models\ProductImg;
use App\Models\Articles;
use App\Models\ArticlesCate;
use App\Models\Newsletter;
use App\Models\Settings;
use App\Models\Pages;
use App\Models\Banner;

use App\Models\CustomerNotification;
use Helper, File, Session, Auth, Hash, App;

class HomeController extends Controller
{
    
    public static $loaiSpList = []; 
    public static $loaiSpListArrKey = [];    

    public function __construct(){

    }
    public function setLang(Request $request){
        $lang = $request->lang;        
        Session::put('locale', $lang);
    }    
    public function index(Request $request)
    {            
        Helper::counter(1, 3);   
        $lang = $request->lang ? $request->lang : (Session::get('locale') ? Session::get('locale') : 'vi');
        $lang = in_array($lang,['vi', 'en', 'cn']) ? $lang : 'vi';
        $productArr = [];        
        $lang_id = $lang == 'vi' ? ($lang == 'en' ? 2 : 1) : 3;        
        $articlesList = Articles::where('status', 1)->where('lang_id', $lang_id)->orderBy('id', 'desc')->limit(3)->get();     
        $settingArr = Settings::whereRaw('1')->lists('value', 'name');   
        $seo = $settingArr;
        $seo['title'] = $settingArr['site_title_'.$lang];
        $seo['description'] = $settingArr['site_description_'.$lang];
        $seo['keywords'] = $settingArr['site_keywords_'.$lang];
        $socialImage = $settingArr['banner'];        
        $text_key = "text_".$lang;
        $slug_key = "slug_".$lang;
        $name_key = "name_".$lang;
        $title_key = "title_".$lang;
        $content_key = "content_".$lang;
        $productList = Product::where('is_hot', 1)->where('status', 1)->orderBy('id', 'desc')->limit(6)->get();   
        $bannerList = Banner::where('object_type', 3)->get();
        $bannerArr = [];
        foreach($bannerList as $banner){
            $bannerArr[$banner->object_id][] = $banner;
        }        
        $about = Pages::find(1);
        return view('frontend.home.index', compact( 'socialImage', 'seo', 'articlesList', 
                'text_key',
                'slug_key',
                'name_key',
                'title_key',
                'content_key',
                'lang', 
                'productList',
                'bannerArr',
                'about'));
    }

    
    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function search(Request $request)
    {
        $lang = Session::get('locale') ? Session::get('locale') : 'vi';
        $tu_khoa = $request->keyword;       

        if($lang == 'vi'){
            $sql = Product::where('alias_vi', 'LIKE', '%'.$tu_khoa.'%');    
        }else{
            $sql = Product::where('alias_en', 'LIKE', '%'.$tu_khoa.'%');
        }
        
        $sql->leftJoin('product_img', 'product_img.id', '=','product.thumbnail_id')
                        ->select('product_img.image_url', 'product.*')
                        ->orderBy('id', 'desc');
        $productArr = $sql->paginate(24);
        $seo['title'] = $seo['description'] = $seo['keywords'] = "Tìm kiếm sản phẩm theo từ khóa '".$tu_khoa."'";        
        $loaiSp = LoaiSp::where('status', 1)->orderBy('display_order')->get();
        foreach($loaiSp as $loai){
            $cateList[$loai->id] = Cate::where('loai_id', $loai->id)->orderBy('display_order')->get();
        }
        return view('frontend.search.index', compact('productArr', 'tu_khoa', 'seo', 'lang', 'loaiSp', 'cateList'));
    }
    public function ajaxTab(Request $request){
        $lang = Session::get('locale') ? Session::get('locale') : 'vi';
        $table = $request->type ? $request->type : 'category';
        $id = $request->id;

        $arr = Film::getFilmHomeTab( $table, $id);

        return view('frontend.index.ajax-tab', compact('arr'));
    }
    public function contact(Request $request){        
        Helper::counter(1, 3);
        $seo['title'] = 'Liên hệ';
        $seo['description'] = 'Liên hệ';
        $seo['keywords'] = 'Liên hệ';
        $socialImage = '';
        
        $lang = $request->lang ? $request->lang : (Session::get('locale') ? Session::get('locale') : 'vi');
        $text_key = "text_".$lang;
        $slug_key = "slug_".$lang;
        $name_key = "name_".$lang;
        $title_key = "title_".$lang;
        $content_key = "content_".$lang; 
        return view('frontend.contact.index', compact('seo', 'socialImage', 
                'text_key',
                'slug_key',
                'name_key',
                'title_key',
                'content_key',
                'lang'));
    }

    public function newsList(Request $request)
    {
        Helper::counter(1, 3);
        $slug = $request->slug;
        $cateArr = $cateActiveArr = $moviesActiveArr = [];
       
        $cateDetail = ArticlesCate::where('slug' , $slug)->first();

        $title = trim($cateDetail->meta_title) ? $cateDetail->meta_title : $cateDetail->name;

        $articlesArr = Articles::where('cate_id', $cateDetail->id)->orderBy('id', 'desc')->paginate(10);

        $hotArr = Articles::where( ['cate_id' => $cateDetail->id, 'is_hot' => 1] )->orderBy('id', 'desc')->limit(5)->get();
        $seo['title'] = $cateDetail->meta_title ? $cateDetail->meta_title : $cateDetail->title;
        $seo['description'] = $cateDetail->meta_description ? $cateDetail->meta_description : $cateDetail->title;
        $seo['keywords'] = $cateDetail->meta_keywords ? $cateDetail->meta_keywords : $cateDetail->title;
        $socialImage = $cateDetail->image_url;       
        return view('frontend.news.index', compact('title', 'hotArr', 'articlesArr', 'cateDetail', 'seo', 'socialImage'));
    }      

     public function newsDetail(Request $request)
    {     
        Helper::counter(1, 3);
        $id = $request->id;

        $detail = Articles::where( 'id', $id )
                ->select('id', 'title', 'slug', 'description', 'image_url', 'content', 'meta_title', 'meta_description', 'meta_keywords', 'custom_text', 'created_at', 'cate_id')
                ->first();
        $is_km = $is_news = $is_kn = 0;
        if( $detail ){           

            $title = trim($detail->meta_title) ? $detail->meta_title : $detail->title;

            $hotArr = Articles::where( ['cate_id' => 1, 'is_hot' => 1] )->where('id', '<>', $id)->orderBy('id', 'desc')->limit(5)->get();
            $otherArr = Articles::where( ['cate_id' => 1] )->where('id', '<>', $id)->orderBy('id', 'desc')->limit(5)->get();
            $seo['title'] = $detail->meta_title ? $detail->meta_title : $detail->title;
            $seo['description'] = $detail->meta_description ? $detail->meta_description : $detail->title;
            $seo['keywords'] = $detail->meta_keywords ? $detail->meta_keywords : $detail->title;
            $socialImage = $detail->image_url; 
            $is_km = $detail->cate_id == 2 ? 1 : 0;
            $is_news = $detail->cate_id == 1 ? 1 : 0;
            $is_kn = $detail->cate_id == 4 ? 1 : 0;
            return view('frontend.news.news-detail', compact('title',  'hotArr', 'detail', 'otherArr', 'seo', 'socialImage', 'is_km', 'is_news', 'is_kn'));
        }else{
            return view('erros.404');
        }
    }

    public function registerNews(Request $request)
    {

        $register = 0; 
        $email = $request->email;
        $newsletter = Newsletter::where('email', $email)->first();
        if(is_null($newsletter)) {
           $newsletter = new Newsletter;
           $newsletter->email = $email;
           $newsletter->is_member = Customer::where('email', $email)->first() ? 1 : 0;
           $newsletter->save();
           $register = 1;
        }

        return $register;
    }

}
