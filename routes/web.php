<?php

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
	return redirect()->route('activites.form');
});

Route::group(['middleware' => 'auth'], function()
{
	Route::prefix('admin')->group(function () {

		Route::resource('/registrations', 'RegistrationsController');	
		Route::resource('/centers', 'CommunityCentersController');	
		Route::resource('/sessions', 'SessionsController');	

		Route::get('/', [
			'as' => 'admin.index',
			'uses' =>'RegistrationsController@index']
		);

		Route::get('/logout', [
			'as' => 'admin.logout',
			'uses' =>'AdminsController@logout']
		);

		Route::get('/session_dates/create/{id_session}', [
			'as' => 'session.dates.create',
			'uses' =>'SessionDatesController@create']
		);	

		Route::get('/scholar/export', [
			'as' => 'scholar.export',
			'uses' =>'ScholarSupportsController@export']
		);

		Route::resource('/scholar', 'ScholarSupportsController');	

		Route::get('/registrations/export/{session_id}/{center_id}', [
			'as' => 'registrations.export',
			'uses' =>'RegistrationsController@export']
		);		

		Route::get('/texts', [
			'as' => 'texts.index',
			'uses' =>'ConfigTextsController@index']
		);	

		Route::get('/centers/create/{id_session}', [
			'as' => 'centers.create',
			'uses' =>'CommunityCentersController@create']
		);

		Route::get('/configmails/', [
			'as' => 'configmails.index',
			'uses' =>'ConfigMailsController@index']
		);

		Route::get('/configmails/create/', [
			'as' => 'configmails.create',
			'uses' =>'ConfigMailsController@create']
		);

		Route::get('/centers/edit/{session_date_id}', [
			'as' => 'centers.edit',
			'uses' =>'CommunityCentersController@edit']
		);

		Route::post('/configmails/create/', [
			'as' => 'configmails.create',
			'uses' =>'ConfigMailsController@store']
		);

		Route::post('/centers/create/{id_session}', [
			'as' => 'centers.create',
			'uses' =>'CommunityCentersController@store']
		);

		Route::post('/sessions/create', [
			'as' => 'sessions.create',
			'uses' =>'SessionsController@store']
		);

		Route::post('/session_dates/create/{id_session}', [
			'as' => 'session.dates.create',
			'uses' =>'SessionDatesController@store']
		);	

		Route::post('/registrations/{id}/edit', [
			'as' => 'registrations.edit',
			'uses' =>'RegistrationsController@update']
		);
	});
});


Route::get('/login', [
	'as' => 'login',
	'uses' =>'AdminsController@login']
);

Route::post('/login', [
	'as' => 'login',
	'uses' =>'AdminsController@connection']
);

Route::get('/activites-dete', [
	'as' => 'activites.form',
	'uses' =>'RegistrationsController@form']
);

Route::post('/activites-dete', [
	'as' => 'activites.form',
	'uses' =>'RegistrationsController@store']
);

Route::get('/aide-scolaire-secondaire', [
	'as' => 'scholar.form',
	'uses' =>'ScholarSupportsController@form']
);

Route::post('/aide-scolaire-secondaire', [
	'as' => 'scholar.form',
	'uses' =>'ScholarSupportsController@store']
);
