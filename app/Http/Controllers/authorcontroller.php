<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Authors;
class authorcontroller extends Controller
{
    public function index()
    {
        return view('author.newauthor');
    }
    public function author(Request $request)
    {
         print_r($request->all());
         $this->validate($request,
           [
                   'name'=>'required',
               ]
               );
          $author= new Authors;
          $author->name=$request['name'];
          $author->save();
          return redirect ('/auth/view');
    }
    public function view(Authors $author)
    {
         $authors=Authors::paginate(3);
           $data=compact('authors');
         return view('author.author-view',compact('authors'))->with($data);
    }
    public function delete(Authors $author,$id)
{
          Authors::destroy(array('id',$id));
          return redirect ('/auth/view');
}
}
