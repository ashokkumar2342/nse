<?php

use App\Helper\MyFuncs;

 

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
 Route::get('video', 'MailController@video')->name('video');
 Route::post('video-store', 'MailController@videoStore')->name('video.store');
 Route::get('send', 'MailController@index')->name('home');
 Route::post('send-email', 'MailController@sendEmail')->name('send.email');
 Route::get('calculator', 'MailController@calculator')->name('calculator');
 Route::post('number-one', 'MailController@numberone')->name('number.one');
 Route::post('number-two', 'MailController@numbertwo')->name('number.two');
Route::get('/func', function () {
    return MyFuncs::full_name("John","Doe");

});
 
Route::get('/', function () {
	 Route::get('index', 'HomeController@index'); 
 
});
Route::get('index', 'HomeController@index'); 
Route::get('place-order', 'HomeController@placeOrder'); 
Route::get('get-profile', 'HomeController@getProfile'); 

 
Route::prefix('parent')->group(function () {
    Route::get('login', 'Front\ParentRegistrationController@login')->name('parent.login.form'); 
});
Route::prefix('resitration')->group(function () {
    Route::get('form', 'Front\ParentRegistrationController@firststep')->name('student.resitration.firststep');
     Route::post('form', 'Front\ParentRegistrationController@store')->name('student.resitration.firststep.store');
     Route::get('verification/{id}', 'Front\ParentRegistrationController@verification')->name('student.resitration.verification');
     Route::post('mobile-verify', 'Front\ParentRegistrationController@verifyMobile')->name('student.resitration.verifyMobile');
     Route::post('email-verify', 'Front\ParentRegistrationController@verifyEmail')->name('student.resitration.verifyEmail');
     Route::get('resitration-form', 'Front\ParentRegistrationController@resitrationForm')->name('student.resitration.resitrationForm'); 

 Route::get('resitration-form1', 'Front\ParentRegistrationController@resitrationForm')->name('student.resitration.resitrationForm'); 
});

Auth::routes();

Route::get('resitration-form/{id}', 'Front\ParentRegistrationController@resitrationForm')->name('student.resitration.resitrationForm'); 

Route::get('/home', 'HomeController@index')->name('home'); 






















 




