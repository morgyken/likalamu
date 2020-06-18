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

//admin Question Controllers
Route::post('/a/admin/post', 'AskQuestionController@postQuestion')->name('post-question');



Route::post('/a/admin/post/comm/', 'AskQuestionController@PostComments')->name('post-comment');

Route::get('/a/admin/get/all', 'AdminQuestionController@getAllQuestions')->name('adm-view-questions');

Route::get('/a/admin/get/det/{questionid}', 'AdminQuestionController@viewQuestionDetails')
          ->name('admin-question-det');


//files

Route::any('file-download/{question_id}/{filename}/', ['as'=>'file-download',

		'uses' =>'AdminQuestionController@downloads']);

Route::any('file-downloads/{questionid}/{commentid}/{filename}/', ['as'=>'response-download',

		'uses' =>'AdminQuestionController@GetCommentsFiles']);
