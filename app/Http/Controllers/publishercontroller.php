<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Publisher;
class publishercontroller extends Controller
{
    public function index()
    {
        return view('publisher.newpublisher');
    }
    public function publisher(Request $request)
    {
         print_r($request->all());
         $this->validate($request,
           [
                   'name'=>'required',
               ]
               );
          $publisher= new Publisher;
          $publisher->name=$request['name'];
          $publisher->save();
    }
    public function view(Publisher $publisher)
    {
        echo"hi";
        $publishers=Publisher::paginate(3);
        $data=compact('publishers');
      return view('publisher.publisher-view',compact('publishers'))->with($data);
    }
    public function delete(Publisher $publisher,$id)
{
          Publisher::destroy(array('id',$id));
          return redirect ('/publish/view');
}
}
