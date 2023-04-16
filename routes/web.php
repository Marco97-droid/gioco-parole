<?php

use App\Http\Controllers\StatsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

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
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('gioco');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/profilo/{id}', [App\Http\Controllers\UsersController::class, 'profilo'])->name('profilo');
    Route::resource('users' , UsersController::class);
    Route::resource('stats' , StatsController::class);
    Route::get('/premi' , function() {return view('premi'); })->name('premi');
});