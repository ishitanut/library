<?php
use Illuminate\support\Facades\Route;
// use App\Http\Controllers\DemoController;
use App\Http\Controllers\registerationController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\bookController;
use App\Http\Controllers\issueController;
use App\Student;
use App\Book;
use App\Admin;
use App\Issue;
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
Route::get('/','registerationController@dashboardView');

Route::get('/admin','adminController@loginindex');
Route::post('/admin','adminController@loginadmin');

Route::group(['middleware' => ['web']], function () {

  Route::group(['prefix' => '/student'], function () {
    Route::get('/view', 'registerationController@view');
    Route::get('/create', 'registerationController@create');
    Route::get('/edit/{s_id}', 'registerationController@edit');
    Route::put('/update/{s_id}', 'registerationController@update');
    Route::delete('/delete/{s_id}', 'registerationController@delete');
  });

  Route::get('/issue-teacher', 'issueController@teacherView');

  Route::group(['prefix' => '/book'], function () {
    Route::get('/view', 'bookController@view');
    Route::delete('/delete/{b_id}', 'bookController@delete');
    Route::get('/edit/{b_id}', 'bookController@edit');
    Route::put('/update/{b_id}', 'bookController@update');
  });
  Route::get('/bookentry', 'bookController@index');
  Route::post('/bookentry', 'bookController@addnew');
});

Route::get('/logout','adminController@adminLogout');


Route::get('/register','registerationController@index');
Route::post('/register','registerationController@store');

Route::get('/login','loginController@loginindex');
Route::post('/student-personal','loginController@login');

Route::group(['middleware' => ['guard']], function () {
  Route::get('/issue_view', 'issueController@view');
  Route::get('/reissue/{id}', 'issueController@edit');
  Route::post('/reissue/{id}', 'issueController@update');
  Route::get('/return/{id}', 'issueController@returnView');
  Route::post('/return/{id}', 'issueController@return');
  Route::get('/fine/{id}', 'issueController@fine');
  Route::get('/issue', 'issueController@index');
  Route::post('/issue', 'issueController@store');
  Route::get('/book_student', 'bookController@studentView');
});
Route::get('/slogout','loginController@studentLogout');

