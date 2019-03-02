<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Pages;
use App\Models\MetaData;
use App\Models\Tag;
use App\Models\TagObjects;

use Helper, File, Session, Auth;

class PagesController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index(Request $request)
    {
        $arrSearch['name'] = $name = isset($request->name) && trim($request->name) != '' ? trim($request->name) : '';
        
        $query = Pages::where('pages.status', 1);
              
        if( $name != ''){
            $query->where('pages.title_vi', 'LIKE', '%'.$name.'%');
            $query->orWhere('pages.title_en', 'LIKE', '%'.$name.'%');
        }
        $items = $query->paginate(50);
        return view('backend.pages.index', compact( 'items', 'arrSearch'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create()
    {
        return view('backend.pages.create');
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
            'title_vi' => 'required',           
            'title_en' => 'required',                
        ],
        [
            'title_vi.required' => 'Bạn chưa nhập tên trang VI',            
            'title_en.required' => 'Bạn chưa nhập tên trang EN',
                   
        ]);

        $dataArr['alias_vi'] = str_slug($dataArr['title_vi'],' ');
        //$dataArr['alias_cn'] = str_slug($dataArr['title_cn'],' ');
        $dataArr['alias_en'] = str_slug($dataArr['title_en'],' ');

        $dataArr['slug_vi'] = str_slug($dataArr['title_vi'],'-');
       // $dataArr['slug_cn'] = "c-".str_slug($dataArr['title_en'],'-');
        $dataArr['slug_en'] = str_slug($dataArr['title_en'],'-');

        $dataArr['content_vi'] = str_replace("[Caption]", "", $dataArr['content_vi']);
        $dataArr['content_en'] = str_replace("[Caption]", "", $dataArr['content_en']);
       // $dataArr['content_cn'] = str_replace("[Caption]", "", $dataArr['content_cn']);
                   
        $dataArr['created_user'] = Auth::user()->id;
        $dataArr['updated_user'] = Auth::user()->id;
        $rs = Pages::create($dataArr);
        $id = $rs->id;       
        dd($dataArr);
        $this->storeMeta( $id, 0, $dataArr);

        Session::flash('message', 'Tạo mới pages thành công');

        return redirect()->route('pages.index');
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
        $detail = Pages::find($id);

        $meta = (object) [];
        if ( $detail->meta_id > 0){
            $meta = MetaData::find( $detail->meta_id );
        }
        
        return view('backend.pages.edit', compact( 'detail', 'meta'));
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
            'title_vi' => 'required',           
            'title_en' => 'required',
  
        ],
        [
            'title_vi.required' => 'Bạn chưa nhập tên trang VI',
           
            'title_en.required' => 'Bạn chưa nhập tên trang EN',
        
        ]);

        $dataArr['alias_vi'] = str_slug($dataArr['title_vi'],' ');
       // $dataArr['alias_cn'] = str_slug($dataArr['title_cn'],' ');
        $dataArr['alias_en'] = str_slug($dataArr['title_en'],' ');

        $dataArr['slug_vi'] = str_slug($dataArr['title_vi'],'-');
       // $dataArr['slug_cn'] = "c-".str_slug($dataArr['title_en'],'-');
        $dataArr['slug_en'] = str_slug($dataArr['title_en'],'-');

        $dataArr['content_vi'] = str_replace("[Caption]", "", $dataArr['content_vi']);
        $dataArr['content_en'] = str_replace("[Caption]", "", $dataArr['content_en']);
       // $dataArr['content_cn'] = str_replace("[Caption]", "", $dataArr['content_cn']);
            
        $dataArr['updated_user'] = Auth::user()->id; 

        $model = Pages::find($dataArr['id']);
        $model->update($dataArr);        

        $this->storeMeta( $dataArr['id'], $dataArr['meta_id'], $dataArr);

        Session::flash('message', 'Cập nhật trang thành công');

        return redirect()->route('pages.edit', $dataArr['id']);
    }
    public function storeMeta( $id, $meta_id, $dataArr ){
       
        $arrData = [
            'title_vi' => $dataArr['meta_title_vi'], 
            'description_vi' => $dataArr['meta_description_vi'], 
            //'title_cn' => $dataArr['meta_title_cn'], 
            //'description_cn' => $dataArr['meta_description_cn'], 
            'custom_text_vi' => $dataArr['custom_text_vi'], 
            'title_en' => $dataArr['meta_title_en'], 
            'description_en' => $dataArr['meta_description_en'], 
            'custom_text_en' => $dataArr['custom_text_en'], 
           // 'custom_text_cn' => $dataArr['custom_text_cn'], 
            'updated_user' => Auth::user()->id
        ];
        if( $meta_id == 0){
            $arrData['created_user'] = Auth::user()->id;            
            $rs = MetaData::create( $arrData );
            $meta_id = $rs->id;
            
            $modelSp = Pages::find( $id );
            $modelSp->meta_id = $meta_id;
            $modelSp->save();
        }else {
            $model = MetaData::find($meta_id);           
            $model->update( $arrData );
        }              
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
        $model = Pages::find($id);
        $model->delete();

        // redirect
        Session::flash('message', 'Xóa trang thành công');
        return redirect()->route('pages.index');
    }   
}
