<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\http\Requests\bookRequest;
use App\Book;
class bookcontroller extends Controller
{
  public function index()
  {
    return view('Book.bookform');
  }
  public function addnew(bookRequest $request)
  {
    if (session()->has('name')) {
      $request->validate();

      $name = $request->input('name');
      $author = $request->input('author');
      $category = $request->input('category');
      $publisher = $request->input('publisher');
      try {
        Book::storeBook($name, $author, $category, $publisher);
      } catch (\Exception $e) {
        return view('error');
      }
      return redirect('/book/view');
    }
    return redirect('/admin');
  }
  public function view()
  {
    if (session()->has('name')) {
      try {
        $books = Book::paginate(5);
      } catch (\Exception $e) {
        return view('error');
      }
      $data = compact('books');
      return view('book.book-view', compact('books'))->with($data);
    }
    return redirect('/admin');
  }
  public function studentView()
  {
    if (session()->has('email')) {
      try {
        $books = Book::paginate(5);
      } catch (\Exception $e) {
        return view('error');
      }
      $data = compact('books');
      return view('book.book-student', compact('books'))->with($data);
    }
    return redirect('/register');
  }
  public function delete($b_id)
  {
    if (session()->has('name')) {
      try {
        Book::deleteBook($b_id);
      } catch (\Exception $e) {
        return view('error');
      }
      return redirect('/book/view');
    }
    return redirect('/admin');
  }
  public function edit($b_id)
  {
    try {
      $book = Book::find($b_id);
    } catch (\Exception $e) {
      return view('error');
    }
    return view('book.book-edit', compact('book'));
  }
  public function update(Request $request, $b_id)
  {
    if (session()->has('name')) {
      $name = $request->get('name');
      $author = $request->get('author');
      $category = $request->get('category');
      $publisher = $request->get('publisher');
      try {
        Book::updateBook($b_id, $name, $author, $category, $publisher);
      } catch (\Exception $e) {
        return view('error');
      }
      return redirect('/book/view');
    }
    return redirect('/admin');
  }
}
