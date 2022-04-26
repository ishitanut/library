<?php

namespace App;
// use Illuminate\Database\Eloquent\Factory\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Student extends Model
{
    // use HasFactory;
    protected $table="student";
    protected $primaryKey="s_id";
    protected $filllable=['name',
                          'Rollnumber',
                          'gender',
                          'phonenumber',
                          'email'];

    public static function val($name,$Rollnumber,$gender,$phonenumber,$email,$password)
    {
    $student= new Student;
    $student->name=$name;
    $student->Rollnumber=$Rollnumber;
    $student->gender=$gender;
    $student->phonenumber=$phonenumber;
    $student->email=$email;
    $student->password=$password;
    $student->save();
}
    public static function Del($s_id){
    DB::delete('delete from student where s_id = ?',[$s_id]);
    }
    public static function up($s_id,$name,$Rollnumber,$phonenumber)
    {
        $student=Student::find($s_id);
        $student->name=$name;
        $student->Rollnumber=$Rollnumber;
        $student->phonenumber=$phonenumber;
        $student->update();
    }
    public static function ed(Student $student,$s_id)
    {
        return $student=Student::find($s_id);
    }
    public static function studentLogin($email,$password,$request)
    {
        $checklogin=Student::where(['email'=>$email,'password'=>$password])->get();
        if(count($checklogin)>0)
        {
            $student=Student::where(['email'=>$email,'password'=>$password])->get();
            $use=$request->input('email');
            $request->session()->put('email',$use);
            //$s_id=$request->session()->get('s_id');
            $data=compact('student');
            return $data;
        }
    }
    public static function edStudent(Student $student,$s_id)
    {
        return $student=Student::find($s_id);
    }
    public static function upStudent($s_id,$name,$Rollnumber,$phonenumber)
    {
        $student=Student::find($s_id);
        $student->name=$name;
        $student->Rollnumber=$Rollnumber;
        $student->phonenumber=$phonenumber;
        $student->update();
    }
}
