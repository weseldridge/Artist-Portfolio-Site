<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*
* ----------------------------------------------------------------------------
*							User Routes
* ----------------------------------------------------------------------------
*/
Route::get('login', array('as' => 'login', 'uses' => 'UserController@showLogin'));
Route::post('login', array('uses' => 'UserController@doLogin'));
Route::get('logout', array('uses' => 'UserController@doLogout'));

Route::get('register', array('uses' => 'UserController@showRegister'));
Route::post('register', array('uses' => 'UserController@doRegister'));

/*
* ----------------------------------------------------------------------------
*							Admin Routes
* ----------------------------------------------------------------------------
*/
// Admin Access Only
Route::group(array('before' => 'admin_level_0'), function()
{
	Route::get('admin', array('uses' => 'AdminController@showAdmin'));
	Route::get('admin/user', array('uses' => 'AdminController@showAdminUser'));
	Route::post('admin/user', array('uses' => 'AdminController@doAdminUser'));
	/*
	* ---------------------------------------------------------------------
	*							Item Admin Routes
	* ---------------------------------------------------------------------
	*/
	Route::get('item/edit/{id}', array('uses' => 'AdminController@showEditItem'));
	Route::post('item/edit/{id}', array('uses' => 'AdminController@doEditItem'));
	Route::get('item/add', array('uses' => 'AdminController@showAddItem'));
	Route::post('item/add', array('uses' => 'AdminController@doAddItem'));
	/*
	* ---------------------------------------------------------------------
	*							Gallery Admin Routes
	* ---------------------------------------------------------------------
	*/
	Route::get('gallery/add', array('uses' => 'AdminController@showAddGallery'));
	Route::post('gallery/add', array('uses' => 'AdminController@doAddGallery'));
	Route::get('gallery/edit/{id}', array('uses' => 'AdminController@showEditThisGallery'))->where('id', '[0-9]+');
	Route::post('gallery/edit/{id}', array('uses' => 'AdminController@doEditThisGallery'))->where('id', '[0-9]+');
	/*
	* ---------------------------------------------------------------------
	*							Group Admin Routes
	* ---------------------------------------------------------------------
	*/
	Route::get('group/add', array('uses' => 'AdminController@showAddGroup'));
	Route::post('group/add', array('uses' => 'AdminController@doAddGroup'));
	Route::get('group/edit/{id}', array('uses' => 'AdminController@showEditThisGroup'))->where('id', '[0-9]+');
	Route::post('group/edit/{id}', array('uses' => 'AdminController@doEditThisGroup'))->where('id', '[0-9]+');
});

/*
* ----------------------------------------------------------------------------
*							Gallery Routes
* ----------------------------------------------------------------------------
*/
// Public Access
Route::get('gallery', array('uses' => 'GalleryController@showGallery'));
Route::get('gallery/{id}', array('uses' => 'GalleryController@showThisGalleryById'))->where('id', '[0-9]+');
Route::get('gallery/{name}', array('uses' => 'GalleryController@showThisGalleryByName'))->where('name', '[A-Za-z0-9]+');

/*
* ----------------------------------------------------------------------------
*							Item Routes
* ----------------------------------------------------------------------------
*/
// Public Access
Route::get('item', array('uses' => 'ItemController@showItem'));
Route::get('item/{id}', array('uses' => 'ItemController@showThisItem'));

/*
* ----------------------------------------------------------------------------
*							Group Routes
* ----------------------------------------------------------------------------
*/
// Public Access
Route::get('group', array('uses' => 'GroupController@showGroup'));
Route::get('group/{id}', array('uses' => 'GroupController@showThisGroupById'))->where('id', '[0-9]+');
Route::get('group/{name}', array('uses' => 'GroupController@showThisGroupByName'))->where('name', '[A-Za-z0-9]+');


/*
* ----------------------------------------------------------------------------
*							Other Routes
* ----------------------------------------------------------------------------
*/
Route::get('/', array('uses' => 'HomeController@showHome'));


/*
* ----------------------------------------------------------------------------
*							Fliters
* ----------------------------------------------------------------------------
*/

/**
*	checks to see if user has the ability to post, edit, and delete resources
*/
Route::filter('admin_level_0', function()
{
  	if(Session::get('role') < 1) return Redirect::to('login');
});
