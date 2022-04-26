<?php

namespace App\Http\Controllers;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class logincontroller extends Controller
{
 public function loginindex()
 {
   return view('login');
 }
 public function login(Request $request)
 {
  $email=$request->input('email');
  $password=$request->input('password');
  try
  {
  $data=Student::studentLogin($email,$password,$request);
  }
  catch(\Exception $e)
  {
    return view('error');
  }
  if(isset($data))
  {
    return view('student-personal')->with($data);
  }
  else
  {
    return redirect('/register');
  }
 }
 public function studentLogout()
 {
   if(session()->has('email'))
    {
     session()->forget('email',null);
    }
    return redirect('/register')   ;
 }

}
        // $user= Student::where('name',$request->input('name'))->get();
        // //   return Crypt::decrypt($user[0]->password);
    //     print_r($request->all());

    //     $this->validate($request,
    //     [
    //             'name'=>'required',
    //             'password'=>'required|confirmed',
    //              'password_confirmation'=>'required'
    //            ]
    //            );    /// this method is overriden form Illuminate\Foundation\Auth\AuthenticatesUsers; class
