<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


use App\Transactions;


Route::get('/', function () {
    return view('auth.login');
});
Route::get('/api/transactions',function(){
	return Transactions::all();
});
Route::get('/api/transactions/{userId}',function($id){
	return Transactions::find($id);
});


Route::auth();
Route::get('/topup',function()
{
	return view('topup');
});
Route::get('/home', 'HomeController@index');
//Route::get('/','sendMoneyController@create');
Route::post('/transaction','sendMoneyController@store')->name('send');
Route::post('/','TopUpController@topup')->name('topup');