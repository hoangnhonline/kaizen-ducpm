<?php
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Contact;


use Helper, File, Session, Auth;

class ContactController extends Controller
{ 
   
    public function store(Request $request)
    {
        $dataArr = $request->all();
        
        $this->validate($request,[            
           
            'email' => 'email|required',
            'fullname' => 'required',
            'content' => 'required',
            'phone' => 'required',            
        ],
        [
                  
            'fullname.required' => 'Bạn chưa nhập họ và tên.',
            'email.required' => 'Bạn chưa nhập email.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
            'phone.required' => 'Bạn chưa nhập số điện thoại.',
            'content.required' => 'Bạn chưa nhập nội dung.',
            
        ]);       

        $rs = Contact::create($dataArr);
        $lang = $request->lang ? $request->lang : (Session::get('locale') ? Session::get('locale') : 'vi');
        $lang = in_array($lang,['vi', 'en', 'cn']) ? $lang : 'vi';
        Session::flash('message', 'Gửi liên hệ thành công.');

        return redirect()->route('contact',$lang );
    }
    
}
