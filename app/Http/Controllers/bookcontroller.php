<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\http\Requests\bookRequest;
use App\Book;
use App\Authors;
use App\Publisher;
use App\Categories;
class bookcontroller extends Controller
{
    public function index()
    {
        return view('Book.bookform');
    }
    public function addnew(bookRequest $request)
    {
      if(session()->has('name'))
      {
        $request->validate();
        $name=$request->input('name');
        $author=$request->input('author');
        $category=$request->input('category');
        $publisher=$request->input('publisher');
        try{
        Book::storeBook($name,$author,$category,$publisher);
        }
        catch(\Exception $e)
        {
          return view('error');
        }
        return redirect ('/book/view');
      }
      else return redirect('/admin');
    }
    public function view()
    {
      if(session()->has('name'))
      {
        $books=Book::paginate(5);
        $data=compact('books');
        return view('book.book-view',compact('books'))->with($data);
      }
      else return redirect('/admin');
    }
    public function studentView()
    {
      if(session()->has('email'))
      {
        try
        {
         $books=Book::paginate(1);
        }
        catch(\Exception $e)
        {
          return view('error');
        }
        $data=compact('books');
        return view('book.book-student',compact('books'))->with($data);
      }
         else return redirect('/register');
    }

    public function delete(Book $book,$b_id)
    {
      if(session()->has('name'))
      {
        Book:: delBook($b_id);
        return redirect ('/book/view');
      }
      else return redirect('/admin');
    }
    public function edit(Book $book,$b_id)
    {
      $book=Book::find($b_id);
      return view('book.book-edit',compact('book'));
    }
    public function update(Request $request,$b_id)
    {
      if(session()->has('name'))
      {
        $name=$request->get('name');
        $author=$request->get('author');
        $category=$request->get('category');
        $publisher=$request->get('publisher');
        Book::updateBook($b_id,$name,$author,$category,$publisher);
        return redirect('/book/view');
      }
      else return redirect('/admin');
    }
}
