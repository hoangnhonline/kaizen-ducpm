<?php
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Pages;
use App\Models\Product;
use App\Models\LoaiSp;
use App\Models\Cate;

use Helper, File, Session, Auth;
use Mail;

class PageController extends Controller
{
    public function index(Request $request)
    {
      Helper::counter(1, 3);
       $lang = $request->lang ? $request->lang : 'vi';
       $text_key = "text_".$lang;
        $slug_key = "slug_".$lang;
        $name_key = "name_".$lang;
        $title_key = "title_".$lang;
        $content_key = "content_".$lang;
       $slug = $request->slug;
       $detail = Pages::where('slug_'.$lang, $slug)->first();
       
       if(!$detail){
          return redirect()->route('home');
       }      
        return view('frontend.pages.index', compact('detail', 'lang', 'loaiSp', 'cateList', 'saleList'
           ,'text_key',
                'slug_key',
                'name_key',
                'title_key',
                'content_key',
                'lang' ));
    }
}

