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

/*
 * Done to override Blade Templating Tags
 * that conflict with AngularJS
 */

Blade::setContentTags('<%', '%>');        // for variables and all things Blade
Blade::setEscapedContentTags('<%%', '%%>');   // for escaped data

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', ['as' => 'home', 'uses' => 'PostController@index']);

Route::get('/home', ['as' => 'home', 'uses' => 'PostController@index']);

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::group(['middleware' => ['auth']], function () {
    // show new post form
    Route::get('new-post', 'PostController@create');

    // save new post
    Route::post('new-post', 'PostController@store');

    // edit post form
    Route::get('edit/{slug}', 'PostController@edit');

    // update post
    Route::post('update', 'PostController@update');

    // delete post
    Route::get('delete/{id}', 'PostController@destroy');

});

/*
 * Rest APIs
 */

Route::group(['prefix' => 'api/v1/'], function () {

    Route::get('getUser', array('uses' => 'Rest\UserRestController@getUser'));

});