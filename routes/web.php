<?php

use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\Client\ClientsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
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

/*Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');*/

///////Routes of web site
Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/nos-tarifs', [HomeController::class, 'tarifs'])->name('site-tarifs');
Route::get('/reserver', [HomeController::class, 'createReservation'])->name('site-create-reservation');

Route::post('/submit-reservation', [ClientsController::class, 'post'])->middleware('auth', 'verified')->name('post-reservation');

Route::get('/contact', [HomeController::class, 'contacts'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('send-contact');

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

///////End of routes of web site




/////Routes admin
Route::prefix('admin')->middleware('auth')->group(function (){

    Route::get('/dashboard', [AdminsController::class, 'index'])->name('admin-dashboard');

    Route::get('/itineraires', [AdminsController::class, 'destinations'])->name('admin-destinations');
    Route::post('/save-itineraire', [AdminsController::class, 'saveDestination'])->name('admin-create-destination');
    Route::post('/edit-itineraire', [AdminsController::class, 'editDestination'])->name('admin-edit-destination');

    Route::get('/tarifs', [AdminsController::class, 'tarifs'])->name('admin-tarifs');

    Route::get('/travel-status/{id}/{status}', [AdminsController::class, 'changeTravelStatus'])->name('admin-change-status');

    Route::post('/gare/edit/{id}', [AdminsController::class, 'editGare'])->name('admin-edit-gare');
    Route::delete('/gare/delete/{id}', [AdminsController::class, 'deleteGare'])->name('admin-delete-gare');

    Route::post('/ville/edit/{id}', [AdminsController::class, 'editVille'])->name('admin-edit-ville');
    Route::delete('/ville/delete/{id}', [AdminsController::class, 'deleteVille'])->name('admin-delete-ville');

    Route::get('/utilisateurs', [AdminsController::class, 'users'])->name('admin-users');
    Route::get('/mon-compte', [AdminsController::class, 'user'])->name('admin-my-account');
    Route::post('/update-user', [AdminsController::class, 'updateUser'])->name('admin-update-user');
    Route::delete('/users/{id}', [AdminsController::class, 'destroy'])->name('admin-delete-user');
    Route::post('/users/{id}', [AdminsController::class, 'updatePassword'])->name('admin-update-password');

});
/////End routes admin

///////Routes client
Route::prefix('client')->middleware('auth')->group(function(){

    Route::get('/dashboard', [ClientsController::class, 'index'])->name('client-dashboard');
    Route::get('/mon-compte', [ClientsController::class, 'user'])->name('client-my-account');
    Route::get('/cancel-travel/{travel_id}', [ClientsController::class, 'travelDenied'])->name('client-cancel-travel');
    Route::post('/update-user', [ClientsController::class, 'updateUser'])->name('client-update-user');
    Route::post('/users/{id}', [AdminsController::class, 'updatePassword'])->name('admin-update-password');

});
///////End routes client

require __DIR__.'/auth.php';
