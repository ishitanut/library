<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
class categorycontroller extends Controller
{
    public function index()
    {
        return view('categories.newcategory');
    }
    public function category(Request $request)
    {
         print_r($request->all());
         $this->validate($request,
           [
                   'name'=>'required',
               ]
               );
        //   echo"<pre>";
        //   print_r ($request->all());
          $category= new Categories;
          $category->name=$request['name'];
          $category->save();
          return redirect('/cat/view');
    }
    public function view(Categories $category)
    {
         $categorys=Categories::paginate(3);
           $data=compact('categorys');
         return view('categories.category-view',compact('categorys'))->with($data);
    }
    public function delete(Categories $category,$id)
{
          Categories::destroy(array('id',$id));
          return redirect ('/cat/view');
}
}
