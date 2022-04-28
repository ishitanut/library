<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\http\Requests\registerationRequest;
use App\Student;
class registerationcontroller extends Controller
{
  public function index()
  {
    return view('form');
  }
  public function store(registerationRequest $request)
  {
    $request->validate();

    $name = $request->input('name');
    $rollnumber = $request->input('Rollnumber');
    $gender = $request->input('gender');
    $phonenumber = $request->input('phonenumber');
    $email = $request->input('email');
    $password = $request->input('password');
    try {
      Student::storeStudent($name, $rollnumber, $gender, $phonenumber, $email, $password);
    } catch (\Exception $e) {
      return view('error');
    }
    return view('login');
  }
  public function view()
  {
    try{
    $students = Student::paginate(3);
    }catch(\Exception $e){
      return view('error');
    }
    $data = compact('students');
    return view('student-view', compact('students'))->with($data);
  }
  public function delete($s_id)
  {
    try {
      $data=Student::find($s_id);
      $data->delete();
    } catch (\Exception $e) {
      return view('error');
    }
    return redirect('/student/view');
  }
  public function create()
  {
    return view('create');
  }
  public function edit($s_id)
  {
    try {
      $student = Student::Find($s_id);
    } catch (\Exception $e) {
      return view('error');
    }
    return view('edit', compact('student'));
  }
  public function update(Request $request, $s_id)
  {
    $name = $request->get('name');
    $phonenumber = $request->get('phonenumber');
    $Rollnumber = $request->get('Rollnumber');
    try {
      Student::updateStudent($s_id, $name, $Rollnumber, $phonenumber);
    } catch (\Exception $e) {
      return view('error');
    }
    return redirect('/student/view');
  }  
}
