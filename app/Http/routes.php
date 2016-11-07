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

//Admin area


Route::group(['middleware' => 'auth'], function() {
    Route::get('admin', function(){
        return redirect('/admin/post');
    });

    Route::resource('admin/post', 'Admin\PostController', ['except' => 'show']);
    Route::resource('admin/tag', 'Admin\TagController');
    Route::get('admin/upload', 'Admin\UploadController@index');
    Route::post('admin/upload/file', 'Admin\UploadController@uploadFile');
    Route::delete('admin/upload/file', 'Admin\UploadController@deleteFile');
    Route::post('admin/upload/folder', 'Admin\UploadController@createFolder');
    Route::delete('admin/upload/folder', 'Admin\UploadController@deleteFolder');

    //Blog pages
    Route::get('/', function () {
        return redirect('/blog');
    });
    Route::get('blog','BlogController@index');
    Route::get('blog/{slug}','BlogController@showPost');
});

//Route::resource('/user', 'Auth\UserController');
Route::resource('/infos', 'InfosController');

Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');

Route::get('mail/send','MailController@send');