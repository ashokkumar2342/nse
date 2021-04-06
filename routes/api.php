<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
 
	Route::group(['prefix' => 'student'], function() {
		Route::post('imageweb/{student}/update', function(Request $request) {
			return $request->all();
		    // return response()->json($data);
		})->name('admin.student.profilepic.webupdate');
	   
	    // Route::post('imageweb/{student}/update', 'Admin/backupstudent@imageWebUpdate')->name('admin.student.profilepic.webupdate');
	          
	    // });
	});
Route::get('index', 'HomeController@index'); 
Route::post('place-order', 'HomeController@placeOrder'); 
Route::get('get-profile', 'HomeController@getProfile');  
Route::post('paper-trade', 'HomeController@paperTrade'); 
Route::get('paper-trade-report/{symble}/{indicator}/{date}/{time}', 'HomeController@paperTradeReport'); 

 
