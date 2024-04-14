<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    private $contact;
    public function __construct()
    {
        $this->contact=new Contact;
    }
    public function index(){
        return view('Clients.contact-us');
    }
    public function postContact(Request $request){
        $request->validate(
            [
                'fullname'=> 'required|min:5',
                'email'=>'required|email',
                'phone'=>'required|numeric|min:10',
                'message'=> 'required',
            ],
            [
                'fullname.required'=>'Họ và tên không được bỏ trống',
                'fullname.min'=>'Họ và tên phải trên 5 kí tự',
                'email.required'=>'Email không được bỏ trống',
                'email.email'=>'Email không hợp lệ',
                'phone.required'=>'Phone không được bỏ trống',
                'phone.numeric'=>'Phone là số',
                'phone.min'=>'Phone được 10 số',
                'message.required'=>'message không được bỏ trống'
            ]
            );
            $dataInsert=[
                'fullname'=>$request->fullname,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'message'=>$request->message
            ];
            $this->contact->postContact($dataInsert);
            return redirect()->route('user.contact-us')->with('msg', 'Gửi thành công');
    }
}
