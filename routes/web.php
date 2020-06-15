<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/a/admin', 'HomeController@index')->name('admina-home');
Route::get('/b/admin', 'HomeController@adminbhome')->name('adminb-home');
Route::get('/center/home', 'HomeController@center')->name('center-home');
Route::get('/student/home', 'HomeController@student')->name('student-home');
Route::get('/tutor/home', 'HomeController@tutor')->name('tutor-home');

//Question Controllers
Route::post('/admin/post', 'AskQuestionController@postQuestion')->name('post-question');
