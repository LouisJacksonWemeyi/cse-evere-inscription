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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::prefix('admin')->group(function () {

	Route::post('/sessions/active/{id}', [
		'as' => 'sessions.active',
		'uses' =>'SessionsController@active']
	);	

	Route::post('/sessions/unactive', [
		'as' => 'sessions.unactive',
		'uses' =>'SessionsController@unactive']
	);		

	Route::post('/centers/active/{id}', [
		'as' => 'center.active',
		'uses' =>'CommunityCentersController@active']
	);	

	Route::post('/configmails/active/{id}', [
		'as' => 'configmails.active',
		'uses' =>'ConfigMailsController@active']
	);	

	Route::post('/configmails/edit/{id}', [
		'as' => 'configmails.edit',
		'uses' =>'ConfigMailsController@update']
	);	

	Route::post('/session/edit/{id}', [
		'as' => 'session.editfield',
		'uses' =>'SessionsController@updateField']
	);	

	Route::post('/session_dates/edit/{id}', [
		'as' => 'session.dates.edit',
		'uses' =>'SessionDatesController@updateField']
	);	

	Route::post('/sessions/destroy/{id}', [
		'as' => 'session.destroy',
		'uses' =>'SessionsController@destroy']
	);

	Route::post('/session_dates/destroy/{id}', [
		'as' => 'session.date.destroy',
		'uses' =>'SessionDatesController@destroy']
	);

	Route::post('/centers/update/{id}', [
		'as' => 'center.update',
		'uses' =>'CommunityCentersController@update']
	);	

	Route::post('/centers/destroy/{id}', [
		'as' => 'center.destroy',
		'uses' =>'CommunityCentersController@destroy']
	);

	Route::post('/registrations/destroy/{id}', [
		'as' => 'registration.destroy',
		'uses' =>'RegistrationsController@destroy']
	);

	Route::post('/scholar/destroy/{id}', [
		'as' => 'scholars.destroy',
		'uses' =>'ScholarSupportsController@destroy']
	);

	Route::post('/configmails/destroy/{id}', [
		'as' => 'configmails.destroy',
		'uses' =>'ConfigMailsController@destroy']
	);

	Route::post('/texts/update/{id}', [
		'as' => 'texts.update',
		'uses' =>'ConfigTextsController@update']
	);

	Route::post('/session_dates/get/{session_id}', [
		'as' => 'session.dates.get',
		'uses' =>'SessionDatesController@get']
	);

});