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

// Add new support.
Route::post('/manager/external-support-management/add', 'Admin\SupportsController@store')->name('manager.support.add')->middleware('auth');
// Delete a support.
Route::delete('/manager/support/{id}', 'Admin\SupportsController@destroy')->middleware('auth')->name('manager.support.destroy');



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

// Add new type hardware.
Route::post('/manager/manage-hardware/add', 'Admin\HardwareController@storeType')->name('manager.hardware.type-hardware.add')->middleware('auth');
// Add new type hardware.
Route::post('/manager/manage-hardware/add-marque', 'Admin\HardwareController@storeMArque')->name('manager.hardware.marque-hardware.add')->middleware('auth');
// Delete a type hardware.
Route::delete('/manager/hardware/type-hardware/{id}', 'Admin\HardwareController@destroyType')->middleware('auth')->name('manager.hardware.type-hardware.destroy');
// Delete a marque hardware.
Route::post('/manager/hardware/marque-hardware/{id}', 'Admin\HardwareController@destroyMarque')->middleware('auth')->name('manager.hardware.marque-hardware.destroy');
// Search for marque
Route::get('/manager/hardware/marque-hardware/search', 'Admin\HardwareController@action')->name('manager.hardware.marque-hardware.search');


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

// Add new software.
Route::post('/manager/manage-software/add', 'Admin\SoftwareController@storeSoftware')->name('manager.software.add')->middleware('auth');
// Delete a software.
Route::delete('/manager/software/{id}', 'Admin\SoftwareController@destroySoftware')->middleware('auth')->name('manager.software.destroy');
// Update a type software.
Route::put('/manager/software/update/{id}', 'Admin\SoftwareController@updateSoftware')->middleware('auth')->name('manager.software.update');


// New type tâche
Route::post('/admin/manage-task/add-type-tache', 'Admin\TacheController@storeTypeTache')->name('admin.manage-task.add-type-tache')->middleware('auth');
// Delete type tâche
Route::delete('/admin/manage-task/delete-type-tache/{id}', 'Admin\TacheController@deleteTypeTache')->name('admin.manage-task.delete-type-tache')->middleware('auth');
// Update type tâche
Route::put('/admin/manage-task/update-type-tache/{id}', 'Admin\TacheController@updateTypeTache')->name('admin.manage-task.update-type-tache')->middleware('auth');
// Search for type tache
Route::get('/admin/manage-task/search-type-tache', 'Admin\TacheController@searchTypeTache')->name('admin.manage-task.search-type-tache')->middleware('auth');

// Associate Hardware
Route::post('/admin/manage-task/associate-hardware/{id}', 'Admin\TacheController@associateHardware')->name('admin.manage-task.associate-hardware');
// Associate Software
Route::post('/admin/manage-task/associate-software/{id}', 'Admin\TacheController@associateSoftware')->name('admin.manage-task.associate-software');
// Disassociate Hardware
Route::delete('/admin/manage-task/disassociate-hardware/{id_type_tache}&{id_type_hardware}', 'Admin\TacheController@disassociateHardware')->name('admin.manage-task.disassociate-hardware');
// Disassociate Software
Route::delete('/admin/manage-task/disassociate-software/{id_type_tache}&{id_type_software}', 'Admin\TacheController@disassociateSoftware')->name('admin.manage-task.disassociate-software');


// New famille type tâche
Route::post('/admin/manage-task/add-famille-type-tache', 'Admin\TacheController@storeFamille')->name('admin.manage-task.add-famille-type-tache')->middleware('auth');
// Delete famille type tâche
Route::delete('/admin/manage-task/delete-famille-type-tache/{id}', 'Admin\TacheController@deleteFamille')->name('admin.manage-task.delete-famille-type-tache')->middleware('auth');
// Update famille type tâche
Route::put('/admin/manage-task/update-famille-type-tache/{id}', 'Admin\TacheController@updateFamille')->name('admin.manage-task.update-famille-type-tache')->middleware('auth');

// Add new Boutique
Route::post('/manager/list-boutique/store', 'Manager\BoutiqueController@storeBoutique')->name('manager.list-boutique.store')->middleware('auth');
// Delete Boutique
Route::delete('/manager/list-boutique/delete/{id_boutique}', 'Manager\BoutiqueController@deleteBoutique')->name('manager.list-boutique.delete')->middleware('auth');
// Update Boutique
Route::put('/manager/list-boutique/update/{id_boutique}', 'Manager\BoutiqueController@updateBoutique')->name('manager.list-boutique.update')->middleware('auth');


// Search for type tache for a famille type tache
Route::get('/manager/manage-task/search-type-tache', 'Manager\TacheController@searchTypeTache')->name('manager.manage-task.search-type-tache')->middleware('auth');
// Create a new TacheIT
Route::post('/manager/manage-task/add-tache-it/{id}', 'Manager\TacheController@storeTacheIT')->name('manager.manage-task.add-tache-it');
Route::delete('/manager/manage-task/destroy-tache-it/{id}', 'Manager\TacheController@destroyTacheIT')->name('manager.manage-task.destroy-tache-it');

// Create Etape
Route::post('/manager/manage-etape/store/{id}', 'Manager\EtapeController@store')->name('manager.manage-etape.store');
Route::delete('/manager/manage-etape/destroy/{id}', 'Manager\EtapeController@destroy')->name('manager.manage-etape.destroy');


// Create new incident
Route::post('/manager/list-incident/store', 'Manager\IncidentController@store')->name('manager.list-incident.store')->middleware('auth');
// Delete an incident
Route::delete('/manager/list-incident/delete/{id}', 'Manager\IncidentController@delete')->name('manager.list-incident.delete')->middleware('auth');
// Update incident
Route::put('/manager/list-incident/update/{id}', 'Manager\IncidentController@update')->name('manager.list-incident.update')->middleware('auth');
// Search for incident by état
Route::get('/manager/list-incident/search', 'Manager\IncidentController@search')->middleware('auth')->name('manager.list-incident.search');

// Add new project
Route::post('/manager/new-project/store', 'Manager\ProjectController@store')->name('manager.project.store')->middleware('auth');
// Delete a project
Route::delete('/manager/list-project/delete/{id}', 'Manager\ProjectController@delete')->name('manager.project.delete')->middleware('auth');
Route::delete('/engineer/notification/delete/{id}', 'Engineer\NotificationController@delete')->name('engineer.notification.destroy')->middleware('auth');
// Update a project
Route::get('/manager/list-project/update/{id}', 'Manager\ProjectController@update')->name('manager.project.update')->middleware('auth');
// Get all projects Ajax method
Route::get('manager/list-project/search', 'Manager\ProjectController@search')->name('manager.project.search')->middleware('auth');
// Get all etapes of a project Ajax method
Route::get('manager/list-project/etape/search', 'Manager\ProjectController@searchEtapes')->name('manager.project.etape.search')->middleware('auth');
Route::get('manager/list-project/tache/search', 'Manager\ProjectController@searchTaches')->name('manager.project.tache.search')->middleware('auth');
Route::get('manager/hardware/use/search', 'Manager\HardwareController@search')->name('manager.hardware.use.search')->middleware('auth');
Route::get('manager/softwarema/use/search', 'Manager\SoftwareController@search')->name('manager.software.use.search')->middleware('auth');