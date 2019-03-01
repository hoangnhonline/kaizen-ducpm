<?php
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\LoaiSp;
use App\Models\Cate;
use App\Models\Settings;
use App\Models\Articles;
use App\Models\MetaData;
use App\Models\Product;

use App\Models\CustomerNotification;
use Helper, File, Session, Auth, Hash;

class NewsController extends Controller
{
    
    public static $loaiSp = []; 
    public static $loaiSpArrKey = [];    

    public function __construct(){

    }
    
    public function loadSlider(){
        return view('frontend.home.ajax-slider');
    }
    public function index(Request $request){
    Helper::counter(1, 3);
        $lang = $request->lang ? $request->lang : (Session::get('locale') ? Session::get('locale') : 'vi');   
        $lang_id = $lang == 'vi' ? ($lang == 'en' ? 2 : 1) : 3; 
        $articlesList = Articles::where('status', 1)->where('lang_id', $lang_id)->orderBy('id', 'desc')->paginate(24);

        $seo['title'] = $seo['description'] = $seo['keywords'] = "Tin tức";
        $text_key = "text_".$lang;
        $slug_key = "slug_".$lang;
        $name_key = "name_".$lang;
        $title_key = "title_".$lang;
        $content_key = "content_".$lang; 
        return view('frontend.news.index', compact('articlesList', 'seo', 'lang', 
                'text_key',
                'slug_key',
                'name_key',
                'title_key',
                'content_key',
                'lang'
            ));
    }
    public function detail(Request $request)
    {             
       Helper::counter(1, 3);
        $lang = $request->lang ? $request->lang : (Session::get('locale') ? Session::get('locale') : 'vi');
        $id = $request->id;
        $detail = Articles::find($id);
        if(!$detail){
            return redirect()->route('home');
        }             

        if( $detail->meta_id > 0){
           $meta = MetaData::find( $detail->meta_id )->toArray();
           $seo['title'] = $meta['title_'.$lang] != '' ? $meta['title_'.$lang] : $detail->name_vi;
           $seo['description'] = $meta['description_'.$lang] != '' ? $meta['description_'.$lang] : $detail->name_vi;
           $seo['keywords'] = $meta['keywords_'.$lang] != '' ? $meta['keywords_'.$lang] : $detail->name_vi;
        }else{
            $seo['title'] = $seo['description'] = $seo['keywords'] = $detail->name_vi;
        }
        $text_key = "text_".$lang;
        $slug_key = "slug_".$lang;
        $name_key = "name_".$lang;
        $title_key = "title_".$lang;
        $content_key = "content_".$lang; 
        $relatedList = Articles::where('cate_id', $detail->cate_id)->where('id', '<>', $id)->orderBy('id', 'desc')->limit(5)->get(); 
        return view('frontend.news.detail', compact('detail', 'hinhArr', 'seo', 'lang', 'loaiSp', 'cateList', 'saleList', 
                'text_key',
                'slug_key',
                'name_key',
                'title_key',
                'content_key',
                'lang',
                'relatedList'));
    }

    
}
