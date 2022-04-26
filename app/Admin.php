<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table="admin";
    protected $primarykey="id";

    public static function adminLogin($name,$password,$request)
    {
        $checklogin=Admin::where(['name'=>$name,'password'=>$password])->get();
        if(count($checklogin)>0)
          {
            $admin=Admin::where(['name'=>$name,'password'=>$password])->get();
            $use=$request->input('name');
            $request->session()->put('name',$use);
            $data=compact('admin');
            return $data;
          }
    }
}
