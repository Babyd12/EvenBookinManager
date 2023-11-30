<?php

use App\Http\Controllers\Association\AssociationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Evenement\EvenementController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
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

Route::get('/home', [HomeController::class,  'index'] )->name('home'); 

Route::get('/register', [RegisterController::class,  'index'] )->name('register');    
Route::post('/register', [RegisterController::class,  'store'] );

Route::get('/login', [AuthController::class,  'goLogin'] )->middleware('guest:clients')->name('login');    
Route::post('/login', [AuthController::class,  'login'] );  
Route::delete('/logoutClient', [AuthController::class,  'logoutClient'] )->middleware('auth:clients')->name('logoutClient');    

Route::prefix('association')->name('association.')->group(function (){
    Route::resource('/', AssociationController::class)->except(['show']);
    Route::resource('/evenement', EvenementController::class)->except(['show']);
});

