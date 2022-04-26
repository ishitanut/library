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
Route::get('/','registerationcontroller@dashboardView');

Route::get('/admin','admincontroller@loginindex');
Route::post('/admin','admincontroller@loginadmin');

Route::group(['middleware' => ['web']], function (){

Route::group(['prefix'=>'/student'],function(){
Route::get('/view','registerationcontroller@view');
Route::get('/create','registerationcontroller@create');
Route::get('/edit/{s_id}','registerationcontroller@edit');
Route::post('/update/{s_id}','registerationcontroller@update');
Route::get('/delete/{s_id}','registerationcontroller@delete');
});
Route::get('/issue-teacher','issuecontroller@teacherView');

Route::group(['prefix'=>'/book'],function(){
Route::get('/view','bookcontroller@view');
Route::get('/delete/{b_id}','bookcontroller@delete');
Route::get('/edit/{b_id}','bookcontroller@edit');
Route::post('/update/{b_id}','bookcontroller@update');
});
Route::get('/bookentry','bookcontroller@index');
Route::post('/bookentry','bookcontroller@addnew');
});
Route::get('/logout','admincontroller@adminLogout');


Route::get('/register','registerationcontroller@index');
Route::post('/register','registerationcontroller@store');


Route::get('/login','logincontroller@loginindex');
Route::post('/student-personal','logincontroller@login');

Route::group(['middleware' => ['guard']], function (){
Route::get('/issue_view','issuecontroller@view');
Route::get('/reissue/{id}','issuecontroller@edit');
Route::post('/reissue/{id}','issuecontroller@update');
Route::get('/return/{id}','issuecontroller@returnView');
Route::post('/return/{id}','issuecontroller@return2');
Route::get('/fine/{id}','issuecontroller@fine');
Route::get('/issue','issuecontroller@index');
Route::post('/issue','issuecontroller@store');
Route::get('/book_student','bookcontroller@studentView');
Route::get('/student_edit/{s_id}','registerationcontroller@editStudent');
Route::post('/student_update/{s_id}','registerationcontroller@updateStudent');
});
Route::get('/slogout','registerationcontroller@studentLogout');

