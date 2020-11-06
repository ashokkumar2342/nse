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
    return view('front.home');
 
});

 
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
Route::post('/student', 'Front\ParentRegistrationController@student')->name('student');
Route::post('/previous-school', 'Front\ParentRegistrationController@previousSchool')->name('previous.school');
Route::post('/address', 'Front\ParentRegistrationController@address')->name('address');
Route::post('/father', 'Front\ParentRegistrationController@father')->name('father');
Route::post('/mother', 'Front\ParentRegistrationController@mother')->name('mother');
Route::post('/guardian', 'Front\ParentRegistrationController@guardian')->name('guardian');
Route::post('/sibling', 'Front\ParentRegistrationController@sibling')->name('sibling');
Route::post('/career', 'Front\ParentRegistrationController@career')->name('career');
Route::post('/other', 'Front\ParentRegistrationController@other')->name('other');
Route::post('/document', 'Front\ParentRegistrationController@document')->name('document');
Route::post('/declaration', 'Front\ParentRegistrationController@declaration')->name('declaration');
Route::get('/preivew/{id}', 'Front\ParentRegistrationController@preview')->name('preview');
 

 


// facebook
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');
//google
Route::get('login/google', 'Auth\LoginController@googleredirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@googlehandleProviderCallback');









Route::get('ayush', 'AyushController@ayush');
Route::get('add', 'AyushController@add');
Route::get('delete', 'AyushController@delete');


Route::get('Aaradhya', 'AyushController@aaradhya');
Route::get('store', 'AyushController@store');
Route::get('navya', 'AyushController@navya');
Route::get('nidhi', 'AyushController@nidhi');
Route::get('chhotya', 'AyushController@chhotya');
Route::get('mango', 'AyushController@mango');
Route::get('mango-store', 'AyushController@mangostore');
Route::get('nidhi-store', 'AyushController@nidhistore');
Route::get('delete', 'AyushController@destroy');

Route::get('car', 'AyushController@car');
Route::get('baik', 'AyushController@baik');
Route::get('saveapi', 'AyushController@saveapi')->name('saveapi');
Route::post('data-store', 'AyushController@dataStore')->name('data.store');























 




