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

Route::get('/', 'PagesControler@home');
Route::get('/about','PagesControler@about');
Route::get('/tickets','TicketsController@index');//show tickets list
Route::get('/tickets/{slug?}','TicketsController@show');//show ticket content
Route::get('/tickets/{slug?}/edit','TicketsController@edit');//edit ticket form
Route::get('/contacts', 'TicketsController@create');//fill in ticket form
Route::post('/contacts','TicketsController@store');//create ticket
Route::post('/tickets/{slug?}/edit','TicketsController@update');//edit ticket
Route::post('/tickets/{slug?}/delete','TicketsController@destroy');//delete ticket
Route::post('/comment','CommentsController@newComment');//add comment
Route::get('/users/register','Auth\AuthController@getRegister');//show register form
Route::post('/users/register','Auth\AuthController@postRegister');//process form data
Route::get('/users/logout','Auth\AuthController@getLogout');//logout user and redirect to homescreen
Route::get('/users/login','Auth\AuthController@getLogin');//show login form
Route::post('/users/login','Auth\AuthController@postLogin');//process login 

Route::group(array('prefix' => 'admin', 'namespace' => 'Admin','middleware'=> 'manager'), function(){
	Route::get('/','PagesController@home');
	//========Role-User=Routes======================================
 	Route::get('users','UsersController@index');
 	Route::get('roles','RolesController@index');
 	Route::get('roles/create','RolesController@create');
 	Route::post('roles/create','RolesController@store');
 	Route::get('users/{id?}/edit','UsersController@edit');
 	Route::post('users/{id?}/edit','UsersController@update');
 	//===================Admin Posts================================
 	Route::get('/posts','PostsController@index');
 	Route::get('/posts/create','PostsController@create');
 	Route::post('/posts/create','PostsController@store');
 	Route::get('/posts/{id?}/edit','PostsController@edit');
 	Route::post('/posts/{id?}/edit','PostsController@update');
 	Route::get('/posts/{id?}/delete','PostsController@destroy');
 	//=================Admin Category===============================
 	Route::get('/categories','CategoryController@index');
 	Route::get('/categories/create','CategoryController@create');
 	Route::post('/categories/create','CategoryController@store');
 	Route::get('/categories/{id?}/delete','CategoryController@destroy');
});
Route::get('/blog','BlogController@index');
Route::get('/blog/{slug?}','BlogController@show');
Route::post('/blog/{slug?}','BlogController@comment');
Route::get('/blog/{slug?}/delete','BlogController@destroy');


/*
Route::get('/sendmail',function (){
	$data=array(
		'name'=>'Learn Laravel',
	);
	Mail::send('emails.welcome',$data,function($message){
		$message->from('laravel0smtptest@gmail.com','Laravel Test');
		$message->to('emoeumen@gmail.com')->subject('Laravel Test');
	});
	return 'Your email has been send successfully!';
});
*/
?>