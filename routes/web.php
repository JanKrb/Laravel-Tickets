<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    // Routes for Profile's
    Route::get('/profile', 'ProfileController@index')->name('profile'); // Show profile
    Route::post('/profile', 'ProfileController@update')->name('profile.update'); // Update profile

    // Routes for Permission System
    Route::get('/groups', 'PermissionController@listGroups')->name('groups'); // List all groups
    Route::put('/groups', 'PermissionController@createGroup')->name('createGroup');; // Create new group
    Route::post('/groups', 'PermissionController@updateGroup')->name('updateGroup');; // Update existing group
    Route::delete('/groups', 'PermissionController@deleteGroup')->name('deleteGroup');; // Delete existing group

    Route::get('/group/{groupid}', 'PermissionController@listPermissions')->name('permissions'); // List all groups
    Route::put('/group/{groupid}', 'PermissionController@createPermissions')->name('createPermission');; // Create new group
    Route::post('/group/{groupid}', 'PermissionController@updatePermissions')->name('updatePermission');; // Update existing group
    Route::delete('/group/{groupid}', 'PermissionController@deletePermissions')->name('deletePermission');; // Delete existing group
});



