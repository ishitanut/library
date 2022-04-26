<?php

namespace App\Http\Controllers;
use App\Admin;
use Illuminate\Http\Request;
use App\http\Requests\adminRequest;
use App\Authors;
use Illuminate\Support\Facades\DB;
class admincontroller extends Controller
{
    public function loginindex()
    {
        return view('adminlogin');
    }
    public function loginadmin(Request $request)
    {
     $name=$request->input('name');
     $password=$request->input('password');
     $data=Admin::adminLogin($name,$password,$request);
     if(isset($data))
     {
         return redirect ('/student/view');
     }
     else
     {
         echo "login failed Wrong Name or password";
     } 
    }
    public function adminLogout()
    {
      if(session()->has('name'))
      {
       session()->forget('name',null);
      }
      return redirect('/admin');
    }
}