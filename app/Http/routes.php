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

Route::get('/', 'StaticController@home');
Route::get('about', 'StaticController@about');
	
/**Events route (index, show, create-store, edit-update, image upload)**/
Route::get('events', ['as' => 'eventsIndex', 'uses' => 'EventsController@index']);
	//Ajax request handling route for events index
Route::get('eventsAjax', 'EventsController@getEventsDatesAjax');
	
Route::get('events/create', ['as' => 'createEvent', 'uses' => 'EventsController@create']);
Route::post('events', 'EventsController@store');

Route::get('events/{events}', ['as' => 'showEvent', 'uses' => 'EventsController@show']);

Route::get('events/{events}/edit', ['as' => 'editEvent', 'uses' => 'EventsController@edit']);
Route::post('events/upload', ['as' => 'uploadImage', 'uses' => 'EventsController@uploadImage']);
Route::patch('events/{events}',['as' => 'updateEvent', 'uses' => 'EventsController@update']);

/**Event requests handling routes **/
Route::post('event/sendrequest', ['as' => 'sendRequest', 'uses' => 'ApplicationsController@sendRequest']);
Route::post('event/cancelrequest', ['as' => 'cancelRequest', 'uses' => 'ApplicationsController@cancelRequest']);

Route::post('event/confirmrequest', ['as' => 'confirmRequest', 'uses' => 'ApplicationsController@confirmRequest']);
Route::post('event/rejectrequest', ['as' => 'rejectRequest', 'uses' => 'ApplicationsController@rejectRequest']);

/**Userprofile routes **/
Route::get('profiles/{users}', ['as' => 'profile', 'uses' => 'ProfilesController@show']);
Route::get('profiles/{users}/edit', ['as' => 'editProfile', 'uses' => 'ProfilesController@edit']);
Route::post('profiles/upload', ['as' => 'uploadPhoto', 'uses' => 'ProfilesController@uploadPhoto']);
Route::patch('profiles/{users}', ['as' => 'updateProfile', 'uses' => 'ProfilesController@update']);

/**Userprofile routes**/
Route::get('myevents', ['as' => 'myevents', 'uses' => 'ProfilesController@showMyEvents']);
Route::get('myevents/{events}/requests', ['as' => 'requests', 'uses' => 'ProfilesController@showMyEventsRequests']);


/**Community page route**/
Route::get('{community?}', ['as' => 'eventsIndexCom', 'uses' => 'EventsController@indexCom']);
	//Ajax request handling route for events index
Route::post('eventsAjaxCom', 'EventsController@getEventsDatesAjaxCom');

// Authentication routes...
//Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
//Route::get('auth/requirelogin', 'StaticController@requireLogin');


// Registration routes...
//Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::controllers([
	'password' => 'Auth\PasswordController',
]);


//Route::post('eventsAjaxCom', 'EventsController@getEventsDatesAjaxCom');
