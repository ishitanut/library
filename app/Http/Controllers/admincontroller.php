<?php

namespace App\Http\Controllers;
use App\Admin;
use App\http\Requests\adminRequest;
class admincontroller extends Controller
{
    public function loginindex()
    {
        return view('adminlogin');
    }
    public function loginadmin(adminRequest $request)
    {
        $request->validate();
        $name = $request->input('name');
        $password = $request->input('password');
        try {
            $data = Admin::adminLogin($name, $password, $request);
        } catch (\Exception $e) {
            return view('error');
        }
        if (isset($data)) {
            return redirect('/student/view');
        }
        echo 'alert("login failed Wrong Name or password");';
    }
    public function adminLogout()
    {
        if (session()->has('name')) {
            session()->forget('name', null);
        }
        return redirect('/admin');
    }
}