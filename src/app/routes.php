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

Route::get('login', array('uses' => 'UserController@showLogin'));
Route::post('login', array('uses' => 'UserController@doLogin'));
Route::post('logout', array('uses' => 'UserController@doLogout'));

Route::get('register', array('uses' => 'UserController@showRegister'));
Route::post('register', array('uses' => 'UserController@doRegister'));

Route::get('/', array('uses' => 'HomeController@showHome'));

Route::get('gallery', array('uses' => 'GalleryController@showGallery'));
Route::get('gallery/{id}', array('uses' => 'GalleryController@showThisGallery'))->where('id', '[0-9]+');
Route::get('gallery/{name}', array('uses' => 'GalleryController@showThisGallery'))->where('name', '[A-Za-z]+');
Route::get('gallery/add', array('uses' => 'GalleryController@showAddGallery'));
Route::post('gallery/add', array('uses' => 'GalleryController@doAddGallery'));
Route::get('gallery/edit/{id}', array('uses' => 'GalleryController@showEditThisGallery'))->where('id', '[0-9]+');
Route::post('gallery/edit/{id}', array('uses' => 'GalleryController@doEditThisGallery'))->where('id', '[0-9]+');


Route::get('item', array('uses' => 'ItemController@showItem'));
Route::get('item/{id}', array('uses' => 'ItemController@showThisItem'));
Route::get('item/edit/{id}', array('uses' => 'ItemController@showEditThisItem'));
Route::post('item/edit/{id}', array('uses' => 'ItemController@doEditThisItem'));
Route::get('item/add', array('uses' => 'ItemController@showAddItem'));
Route::post('item/add', array('uses' => 'ItemController@doAddItem'));

Route::get('group', array('uses' => 'GroupController@showGroup'));
Route::get('group/{id}', array('uses' => 'GroupController@showThisGroup'))->where('id', '[0-9]+');
Route::get('group/{name}', array('uses' => 'GroupController@showThisGroup'))->where('name', '[A-Za-z]+');
Route::get('group/add', array('uses' => 'GroupController@showAddGroup'));
Route::post('group/add', array('uses' => 'GroupController@doAddGroup'));
Route::get('group/edit/{id}', array('uses' => 'GroupController@showEditThisGroup'))->where('id', '[0-9]+');
Route::post('group/edit/{id}', array('uses' => 'GroupController@doEditThisGroup'))->where('id', '[0-9]+');