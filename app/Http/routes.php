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


//Skill Test 
Route::get('total',function(){
	return view('total');
});
Route::get('api/total',function(){
	return App\Total::latest()->get();
});
Route::post('api/total','TotalController@store');
Route::delete('api/total/{id}',function($id){
		App\Total::findOrFail($id)->delete();
});
Route::put('api/update/{id}','TotalController@update');





/*add content to DB*/
Route::post('api/tasks','ApiController@store');

Route::get('api/tasks',function(){
		return App\Task::latest()->get();

});
Route::delete('api/tasks/{id}',function($id){
		App\Task::findOrFail($id)->delete();
		
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('single','SingleController@index');
