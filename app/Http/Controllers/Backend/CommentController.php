<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Helper, File, Session, Auth;

class CommentController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index(Request $request)
    {
       
        $query = Comment::where('comment.status', 1);
       
        $items = $query->paginate(50);
        return view('backend.comment.index', compact( 'items'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create()
    {
        return view('backend.comment.create');
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
            'name' => 'required',           
            'content_vi' => 'required',  
            'content_en' => 'required',               
        ],
        [
            'name.required' => 'Bạn chưa nhập tên',            
            'content_vi.required' => 'Bạn chưa nhập nội dung tiếng Việt',
            'content_en.required' => 'Bạn chưa nhập nội dung tiếng Anh',
                   
        ]);
                   
        $dataArr['display_order'] = (int) $dataArr['display_order'];
        $rs = Comment::create($dataArr);
        $id = $rs->id;       
        

        Session::flash('message', 'Tạo mới thành công');

        return redirect()->route('comment.index');
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
        $detail = Comment::find($id);

        $meta = (object) [];
        if ( $detail->meta_id > 0){
            $meta = MetaData::find( $detail->meta_id );
        }
        
        return view('backend.comment.edit', compact( 'detail', 'meta'));
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
            'name' => 'required',           
            'content_vi' => 'required',  
            'content_en' => 'required',               
        ],
        [
            'name.required' => 'Bạn chưa nhập tên',            
            'content_vi.required' => 'Bạn chưa nhập nội dung tiếng Việt',
            'content_en.required' => 'Bạn chưa nhập nội dung tiếng Anh',
                   
        ]);
        $dataArr['display_order'] = (int) $dataArr['display_order'];
        $model = Comment::find($dataArr['id']);
        $model->update($dataArr);
        Session::flash('message', 'Cập nhật thành công');

        return redirect()->route('comment.index');
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
        $model = Comment::find($id);
        $model->delete();

        // redirect
        Session::flash('message', 'Xóa thành công');
        return redirect()->route('comment.index');
    }   
}
