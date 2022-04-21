<?php
use Illuminate\support\Facades\Route;
// use App\Http\Controllers\DemoController;
use App\Http\Controllers\registerationcontroller;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\bookcontroller;
use App\Http\Controllers\authorcontroller;
use App\Http\Controllers\categorycontroller;
use App\Http\Controllers\publishercontroller;
use App\Http\Controllers\issuecontroller;
use App\Student;
use App\Book;
use App\Authors;
use App\Publisher;
use App\Categories;
use App\Admin;
use App\Issue;
use App\Setting;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/', DemoController::class, 'index');
Route::get('/',function(){
  return view('home');
});
// Route::get('/auth/delete/{id}','authorcontroller@delete');
// Route::get('/author','authorcontroller@index');
// Route::post('/author','authorcontroller@author');
// Route::get('/category','categorycontroller@index');
// Route::post('/category','categorycontroller@category');
// Route::get('/publisher','publishercontroller@index');
// Route::post('/publisher','publishercontroller@');
// Route::get('/','DemoController@index');
// Route::get('/auth/view','authorcontroller@view');
// Route::get('/auth',function(){
//   $author=Authors::all();
// });
// Route::get('/publish',function(){
//   $publisher=Publisher::all();
//   echo"<pre>";
//   print_r($publisher->toArray());
// });
// Route::get('/publish/view','publishercontroller@view');
// Route::get('/publish/delete/{id}','publishercontroller@delete');

// Route::get('/cat',function(){
//   $category=Categories::all();
//   echo"<pre>";
//   print_r($category->toArray());
// });
// Route::get('/cat/view','categorycontroller@view');
// Route::get('/cat/delete/{id}','categorycontroller@delete');
Route::get('/admin','admincontroller@loginindex');
Route::post('/admin','admincontroller@loginadmin');

Route::group(['middleware' => ['web']], function (){
Route::get('/student',function(){
  $student=Student::all();
  echo"<pre>";
  print_r($student->toArray());
});
Route::get('/student/view','registerationcontroller@view');
Route::get('/student/create','registerationcontroller@create');
Route::get('/student/edit/{s_id}','registerationcontroller@edit');
Route::post('/student/update/{s_id}','registerationcontroller@update');
Route::get('/student/delete/{s_id}','registerationcontroller@delete');

Route::get('/issue-teacher','issuecontroller@teacherView');

Route::get('/book',function(){
  $book=Book::all();
});
Route::get('/book/view','bookcontroller@view');
Route::get('/book/delete/{b_id}','bookcontroller@delete');
Route::get('/book/edit/{b_id}','bookcontroller@edit');
Route::post('/book/update/{b_id}','bookcontroller@update');

Route::get('/bookentry','bookcontroller@index');
Route::post('/bookentry','bookcontroller@addnew');
});
Route::get('/logout', function () {
  if(session()->has('name'))
  {
      session()->forget('name',null);
  }
  return redirect('/admin');
});



Route::get('/register','registerationcontroller@index');
Route::post('/register','registerationcontroller@register');


Route::get('/login','logincontroller@loginindex');
Route::post('/student-personal','logincontroller@login');

Route::group(['middleware' => ['guard']], function (){
Route::get('/issue-view','issuecontroller@view');
Route::get('/reissue/{id}','issuecontroller@edit');
Route::post('/reissue/{id}','issuecontroller@update');
Route::get('/return/{id}','issuecontroller@return');
Route::post('/return/{id}','issuecontroller@return2');
Route::get('/fine/{id}','issuecontroller@fine');
Route::get('/issue','issuecontroller@index');
Route::post('/issue','issuecontroller@store');
Route::get('/book-student','bookcontroller@studentView');
Route::get('/student-edit/{s_id}','registerationcontroller@editStudent');
Route::post('/student-update/{s_id}','registerationcontroller@updateStudent');
});
Route::get('/slogout', function () {
  if(session()->has('email'))
  {
      session()->forget('email',null);
  }
  return redirect('/register');
});