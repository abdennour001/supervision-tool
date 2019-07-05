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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Login route
Route::get('/login', 'Auth\LoginController@index');

// Logout route
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

// Login post action route
Route::post('/login/check', 'Auth\LoginController@login')->name('login');



// Protect /add route.
Route::get('/admin/new-profile/add', function () {
    abort(404);
})->middleware('auth');

// Add new profile.
Route::post('/admin/new-profile/add', 'Admin\RegisterController@store')->name('add')->middleware('auth');


// Delete a profile.
Route::delete('/admin/profile/{profileId}', 'Admin\ProfilesController@destroy')->middleware('auth')->name('admin.profile.destroy');

Route::get('/admin/edit-profile/', function () {
    abort(404);
});

Route::get('/admin/list-profile/{id_profil}/edit-profile', 'Admin\ProfilesController@edit')->middleware('auth')->name('admin.profile.edit');
Route::patch('/admin/list-profile/{profile}', 'Admin\ProfilesController@update')->middleware('auth')->name('admin.profile.update');

// Engineer routes
Route::get('/engineer/{item}', function($item) {
    return view('engineer/' . $item);
})->name('engineer')->middleware('auth');

// Admin routes
Route::get('/admin/{item}', function($item) {
    return view('admin/' . $item);
})->name('admin')->middleware('auth');

// Manager routes
Route::get('/manager/{item}', function($item) {
    return view('manager/' . $item);
})->name('manager')->middleware('auth');

//Auth::routes();

// Add new support.
Route::post('/admin/external-support-management/add', 'Admin\SupportsController@store')->name('support.add')->middleware('auth');
// Delete a support.
Route::delete('/admin/support/{id}', 'Admin\SupportsController@destroy')->middleware('auth')->name('admin.support.destroy');


// Add new type hardware.
Route::post('/admin/manage-hardware/add', 'Admin\HardwareController@storeType')->name('admin.hardware.type-hardware.add')->middleware('auth');
// Add new type hardware.
Route::post('/admin/manage-hardware/add-marque', 'Admin\HardwareController@storeMArque')->name('admin.hardware.marque-hardware.add')->middleware('auth');
// Delete a type hardware.
Route::delete('/admin/hardware/type-hardware/{id}', 'Admin\HardwareController@destroyType')->middleware('auth')->name('admin.hardware.type-hardware.destroy');
// Delete a marque hardware.
Route::post('/admin/hardware/marque-hardware/{id}', 'Admin\HardwareController@destroyMarque')->middleware('auth')->name('admin.hardware.marque-hardware.destroy');
// Search for marque
Route::get('/admin/hardware/marque-hardware/search', 'Admin\HardwareController@action')->name('admin.hardware.marque-hardware.search');


// Add new type software.
Route::post('/admin/manage-software-type/add', 'Admin\SoftwareController@storeType')->name('admin.software.type-software.add')->middleware('auth');
// Delete a type software.
Route::delete('/admin/software/type-software/{id}', 'Admin\SoftwareController@destroyType')->middleware('auth')->name('admin.software.type-software.destroy');
// Update a type software.
Route::put('/admin/software/type-software/update/{id}', 'Admin\SoftwareController@updateType')->middleware('auth')->name('admin.software.type-software.update');


// Add new software.
Route::post('/admin/manage-software/add', 'Admin\SoftwareController@storeSoftware')->name('admin.software.add')->middleware('auth');
// Delete a software.
Route::delete('/admin/software/{id}', 'Admin\SoftwareController@destroySoftware')->middleware('auth')->name('admin.software.destroy');
// Update a type software.
Route::put('/admin/software/update/{id}', 'Admin\SoftwareController@updateSoftware')->middleware('auth')->name('admin.software.update');
