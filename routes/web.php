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

Route::get('/a/admina/home', 'HomeController@index')->name('admina-home');
Route::get('/b/adminb/home', 'HomeController@adminbhome')->name('adminb-home');
Route::get('/center/home', 'HomeController@center')->name('center-home');
Route::get('/student/home', 'HomeController@student')->name('student-home');
Route::get('/tutor/home', 'HomeController@tutor')->name('tutor-home');
//admin Question Controllers
Route::post('/a/admin/post', 'AskQuestionController@postQuestion')->name('post-question');
//rate tutor_ratings
Route::post('/a/admin/rate/{questionid}', 'QuestionDetailController@rateTutor')->name('rate-tutor');
//Admin get dtails
Route::post('/s/student/post', 'StudentAskQuestionController@postQuestion')->name('student-post-question');
Route::any('/a/admin/post/comm/', 'AskQuestionController@PostComments')->name('post-comment');
Route::get('/a/admin/get/all', 'AdminQuestionController@getAllQuestions')->name('adm-view-questions');
Route::get('/a/admin/get/det/{questionid}', 'AdminQuestionController@viewQuestionDetails')->name('admin-question-det');
Route::post('/dropzone', 'AskQuestionController@PostComments')->name('upload-files');
Route::get('/a/admin/calculate/tutor', 'AdminQuestionController@calculatePayments')->name('calcTutorQuestion');
//asign questions
Route::post('/admin/assign/{questionid}', 'QuestionDetailController@assignBids')->name('assign-questions');
//asign questions
Route::post('/admin/archive/', 'QuestionDetailController@archiveQuestion')->name('archive-questions');
//tutor routes
Route::post('/a/admin/tutor/pay/confirm/{data}', 'QuestionDetailController@payTutors')->name('pay-tutors');
//admin payment routes
Route::get('/a/admin/tutor/pay/details/{tutorid}', 'QuestionDetailController@viewTutorPaymentsDet')->name('view-tutor-paymentsdet');
Route::get('/a/admin/tutor/payments', 'QuestionDetailController@viewTutorPayments')->name('view-tutor-payments');

Route::get('/tutor/view/all/questions/{status?}', 'TutorController@TutorAllQuestions')->name('tutor-all-questions');
Route::get('/tutor/view/all/lastpayment/', 'TutorController@lastPayment')->name('last-payment');
Route::get('/tutor/view/question/details/{questionid}', 'TutorController@TutorQuestionDetails')->name('tutor-question-det');
Route::get('/tutor/view/details/', 'TutorController@TutorDetails')->name('tutor-det');
Route::post('/tutor/details/profile/', 'TutorController@UpdateProfile')->name('update-profile');
Route::post('/tutor/details/account/', 'TutorController@UpdateAccount')->name('update-account');
Route::post('/tutor/details/payments/', 'TutorController@UpdatePaymentDetails')->name('tutor-payment');
Route::post('/tutor/question/placebids/', 'QuestionDetailController@PlaceBids')->name('place-bid');
Route::post('/tutor/questions/takebids/', 'QuestionDetailController@takeBids')->name('take-bid');
Route::get('/tutor/payment/details/', 'StudentAskQuestionController@viewPaymentDetails')->name('student-view-payments');
//files
Route::any('file-download/{question_id}/{filename}/', ['as'=>'file-download','uses' =>'AdminQuestionController@downloads']);
Route::any('file-downloads/{questionid}/{commentid}/{type}/{filename}/',
      ['as'=>'response-download',	'uses' =>'AdminQuestionController@GetCommentsFiles']);


//paypal routes
Route::get('payment-with-paypal/{price}',
	['uses' => 'PaypalPayments@PayWithPaypal', 'as' =>'get.paypal']);
