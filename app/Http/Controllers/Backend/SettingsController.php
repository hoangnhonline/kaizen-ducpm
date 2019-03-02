<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Helpers\Helper;
use App\Models\Settings;
use File, Session, DB, Auth;

class SettingsController  extends Controller
{
    public function index(Request $request)
    {              
        $settingArr = Settings::whereRaw('1')->lists('value', 'name');

        return view('backend.settings.index', compact( 'settingArr'));
    }

    public function update(Request $request){

    	$dataArr = $request->all();

    	$this->validate($request,[
            'site_name_vi' => 'required',
            'site_name_en' => 'required',
            'site_title_vi' => 'required',                  
            'site_description_vi' => 'required', 
            'site_title_en' => 'required',                  
            'site_description_en' => 'required',            
                                              
        ],
        [            
            'site_name_vi.required' => 'Bạn chưa nhập tên site VI',            
            'site_title_vi.required' => 'Bạn chưa nhập meta title VI',
            'site_description_vi.required' => 'Bạn chưa nhập meta desciption VI',            
            'site_name_en.required' => 'Bạn chưa nhập tên site EN',            
            'site_title_en.required' => 'Bạn chưa nhập meta title EN',
            'site_description_en.required' => 'Bạn chưa nhập meta desciption EN',           
        ]);  
  

        $dataArr['updated_user'] = Auth::user()->id;


    	foreach( $dataArr as $key => $value ){
    		$data['value'] = $value;
    		Settings::where( 'name' , $key)->update($data);
    	}

    	Session::flash('message', 'Cập nhật thành công.');

    	return redirect()->route('settings.index');
    }
}
