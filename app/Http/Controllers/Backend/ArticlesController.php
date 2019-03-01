<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\ArticlesCate;
use App\Models\Tag;
use App\Models\TagObjects;
use App\Models\Articles;
use Helper, File, Session, Auth;

class ArticlesController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index(Request $request)
    {
        $lang_id = isset($request->lang_id) ? $request->lang_id : 0;

        $title = isset($request->title) && $request->title != '' ? $request->title : '';
        
        $query = Articles::whereRaw('1');

        if( $lang_id > 0){
            $query->where('lang_id', $lang_id);
        }
        
        if( $title != ''){
            $query->where('alias', 'LIKE', '%'.$title.'%');
        }
        $items = $query->orderBy('id', 'desc')->paginate(20);
        
        return view('backend.articles.index', compact( 'items', 'title', 'lang_id' ));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create(Request $request)
    {

        $cateArr = ArticlesCate::all();
        
        $cate_id = $request->cate_id;

        return view('backend.articles.create', compact( 'cateArr', 'cate_id'));
    }
    public function ajaxTag(Request $request){

        $type = $request->type ? $request->type : 1;

        return view('backend.articles.ajax-tag', compact('tagList'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  Request  $request
    * @return Response
    */
    public function store(Request $request)
    {
        $dataArr = $request->all();
        
        $this->validate($request,[            
            'lang_id' => 'required',            
            'title' => 'required'
        ],
        [            
            'lang_id.required' => 'Bạn chưa chọn danh mục',            
            'title.required' => 'Bạn chưa nhập tiêu đề',
           
        ]);       
        
        $dataArr['alias'] = Helper::stripUnicode($dataArr['title']);  
        $dataArr['slug'] = str_slug($dataArr['title'], '-');
        $dataArr['created_user'] = Auth::user()->id;

        $dataArr['updated_user'] = Auth::user()->id;
        
        $dataArr['is_hot'] = isset($dataArr['is_hot']) ? 1 : 0;  
        $dataArr['content'] = str_replace("[Caption]", "", $dataArr['content']);
        $rs = Articles::create($dataArr);

        $object_id = $rs->id;

        Session::flash('message', 'Tạo mới tin tức thành công');

        return redirect()->route('articles.index',['cate_id' => $dataArr['cate_id']]);
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function show($id)
    {
    //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function edit($id)
    {
        $tagSelected = [];

        $detail = Articles::find($id);
        
        $cateArr = ArticlesCate::all();

        return view('backend.articles.edit', compact('detail', 'cateArr' ));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  Request  $request
    * @param  int  $id
    * @return Response
    */
    public function update(Request $request)
    {
        $dataArr = $request->all();
        
        $this->validate($request,[            
            'lang_id' => 'required',            
            'title' => 'required'
        ],
        [            
            'lang_id.required' => 'Bạn chưa chọn danh mục',            
            'title.required' => 'Bạn chưa nhập tiêu đề',
        ]);       
        
        $dataArr['alias'] = Helper::stripUnicode($dataArr['title']);        
        $dataArr['slug'] = str_slug($dataArr['title'], '-');
        $dataArr['content'] = str_replace("[Caption]", "", $dataArr['content']);
        $dataArr['updated_user'] = Auth::user()->id;
        $dataArr['is_hot'] = isset($dataArr['is_hot']) ? 1 : 0;
        $model = Articles::find($dataArr['id']);

        $model->update($dataArr);
       
        Session::flash('message', 'Cập nhật tin tức thành công');        

        return redirect()->route('articles.edit', $dataArr['id']);
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function destroy($id)
    {
        // delete
        $model = Articles::find($id);
        $model->delete();

        // redirect
        Session::flash('message', 'Xóa tin tức thành công');
        return redirect()->route('articles.index');
    }
}
