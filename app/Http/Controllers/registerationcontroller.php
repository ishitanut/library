<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\http\Requests\registerationRequest;
use App\Student;
use \Crypt;
class registerationcontroller extends Controller
{
    public function index()
    {
        return view('form');
    }
    public function register(registerationRequest $request)
    {
      $request->validate();
         
          $name=$request->input('name');
          $Rollnumber=$request->input('Rollnumber');
          $gender=$request->input('gender');
          $phonenumber=$request->input('phonenumber');
          $email=$request->input('email');
          $password=$request->input('password');
          Student::val($name,$Rollnumber,$gender,$phonenumber,$email,$password);
          return view ('login');
    }
    public function view(Student $student)
    {
      if(session()->has('name'))
      {  
         $students=Student::paginate(3);
         $data=compact('students');
         return view('student-view',compact('students'))->with($data);
      }
      else return view('adminlogin');
    }
    public function delete(Student $student,$s_id)
    {
            Student::Del($s_id);
            return redirect ('/student/view');
    }
    public function create()
    {
           return view('create');
    }
    public function edit(Student $student,$s_id)
    {
      $student=Student::Find($s_id);
      return view('edit',compact('student'));
    }
    public function update(Request $request,$s_id)
    {
      $name=$request->get('name');
      $phonenumber=$request->get('phonenumber');
      $Rollnumber=$request->get('Rollnumber');
      Student::up($s_id,$name,$Rollnumber,$phonenumber);
      return redirect('/student/view');
    }  
}
