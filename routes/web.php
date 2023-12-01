<?php

use App\Http\Controllers\Association\AssociationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Evenement\EvenementController;
use App\Http\Controllers\EvenementController as ControllersEvenementController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');
Route::group(['middleware' => 'auth:clients'], function () {
    // Vos routes protégées ici
});

Route::get('/home', [HomeController::class,  'index'])->name('home');
Route::get('/home/show', [HomeController::class,  'index'])->name('voir');

Route::prefix('register')->controller(RegisterController::class)->name('register.')->group(function () {
    Route::get('/', 'index')->name('form');
    Route::post('/', 'storeClient')->name('client');
    Route::post('/association', 'storeAssociation')->name('association');
});


Route::get('/login', [AuthController::class, 'clientLoginForm'])->middleware('guest:clients')->name('clientLoginForm');
Route::post('/authentificationClient', [AuthController::class,  'loginClient'])->name('authClient');
Route::delete('/logoutClient', [AuthController::class,  'logoutClient'])->middleware('auth:clients')->name('logoutClient');


Route::post('/loginAssociation', [AuthController::class,  'loginAssociation'])->name('loginAssociation');

Route::prefix('association')->name('association.')->group(function () {
    Route::resource('/', AssociationController::class)->except(['show']);
    Route::resource('/evenement', EvenementController::class)->except(['show']);
})->middleware('auth:associations');

Route::get('/reservation/{evenement_id}/{association_id}', [ReservationController::class, 'create'])->name('est_il_accompagner');
Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation');
