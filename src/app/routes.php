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
	Route::get('item/all', array('uses' => 'AdminController@showAllItem'));
	Route::get('item/toggle/{id}', array('uses' => 'AdminController@doToggleItem'))->where('id', '[0-9]+');
	Route::get('item/delete/{id}', array('uses' => 'AdminController@doDeleteItem'))->where('id', '[0-9]+');
	Route::get('item/edit/{id}', array('uses' => 'AdminController@showEditThisItem'))->where('id', '[0-9]+');
	Route::post('item/edit/{id}', array('uses' => 'AdminController@doEditThisItem'))->where('id', '[0-9]+');
	Route::get('item/add', array('uses' => 'AdminController@showAddItem'));
	Route::post('item/add', array('uses' => 'AdminController@doAddItem'));
	/*
	* ---------------------------------------------------------------------
	*							Gallery Admin Routes
	* ---------------------------------------------------------------------
	*/
	Route::get('gallery/all', array('uses' => 'AdminController@showAllGallery'));
	Route::get('gallery/add', array('uses' => 'AdminController@showAddGallery'));
	Route::post('gallery/add', array('uses' => 'AdminController@doAddGallery'));
	Route::get('gallery/edit/{id}', array('uses' => 'AdminController@showEditThisGallery'))->where('id', '[0-9]+');
	Route::post('gallery/edit/{id}', array('uses' => 'AdminController@doEditThisGallery'))->where('id', '[0-9]+');
	Route::get('gallery/toggle/{id}', array('uses' => 'AdminController@doToggleGallery'))->where('id', '[0-9]+');
	Route::get('gallery/delete/{id}', array('uses' => 'AdminController@doDeleteGallery'))->where('id', '[0-9]+');
	/*
	* ---------------------------------------------------------------------
	*							Group Admin Routes
	* ---------------------------------------------------------------------
	*/
	Route::get('group/all', array('uses' => 'AdminController@showAllGroup'));
	Route::get('group/add', array('uses' => 'AdminController@showAddGroup'));
	Route::post('group/add', array('uses' => 'AdminController@doAddGroup'));
	Route::get('group/edit/{id}', array('uses' => 'AdminController@showEditThisGroup'))->where('id', '[0-9]+');
	Route::post('group/edit/{id}', array('uses' => 'AdminController@doEditThisGroup'))->where('id', '[0-9]+');
	Route::get('group/toggle/{id}', array('uses' => 'AdminController@doToggleGroup'))->where('id', '[0-9]+');
	Route::get('group/delete/{id}', array('uses' => 'AdminController@doDeleteGroup'))->where('id', '[0-9]+');
	/*
	* ---------------------------------------------------------------------
	*							URL Admin Routes
	* ---------------------------------------------------------------------
	*/
	Route::get('url/all', array('uses' => 'UrlController@showAllURL'));
	Route::get('url', array('uses' => 'UrlController@showAllURL'));
	Route::get('url/add', array('uses' => 'UrlController@showAddURL'));
	Route::post('url/add', array('uses' => 'UrlController@doAddURL'));
	Route::post('url/edit/{id}', array('uses' => 'UrlController@doEditThisURL'))->where('id', '[0-9]+');
	Route::get('url/toggle/{id}', array('uses' => 'UrlController@showEditThisURL'))->where('id', '[0-9]+');
	/*
	* ---------------------------------------------------------------------
	*							Inbox Routes
	* ---------------------------------------------------------------------
	*/
	Route::get('inbox', array('uses' => 'inboxController@showInbox'));
	Route::get('inbox/test', array('uses' => 'inboxController@showInboxTest'));
	Route::get('inbox/message/{id}', array('uses' => 'inboxController@showInboxMessage'))->where('id', '[0-9]+');
	/*
	* ----------------------------------------------------------------------------
	*							Other Routes
	* ----------------------------------------------------------------------------
	*/
	Route::get('admin', array('uses' => 'AdminController@showAdminHome'));

	Route::get('admin/settings/site', array('uses' => 'AdminController@showAdminSettingsSite'));
	Route::get('admin/settings/user', array('uses' => 'AdminController@showAdminSettingsUser'));
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
Route::get('home', array('uses' => 'HomeController@showHome'));
Route::post('email/add', array('before' => 'csrf', 'uses' => 'EmailController@doAddEmail'));


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
