<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('sharemail', function () {
    return view('email.shareimagemail');
});
Auth::routes();

#Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('login');

// Image controller
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/add', [App\Http\Controllers\ImageController::class, 'index']);
Route::post('/store', [App\Http\Controllers\ImageController::class, 'store']);
Route::get('/show', [App\Http\Controllers\ImageController::class, 'show']);
Route::get('delete/{id}', [App\Http\Controllers\ImageController::class, 'destroy']);
Route::get('/view/{id}', [App\Http\Controllers\ImageController::class, 'view']);


//view controller
Route::get('/shareview/{id}', [App\Http\Controllers\ShareController::class, 'shareview']);
Route::post('/share', [App\Http\Controllers\ShareController::class, 'share']);
Route::get('/sharelist', [App\Http\Controllers\ShareController::class, 'sharelist']);
Route::get('/request/{id}', [App\Http\Controllers\ShareController::class, 'request']);
Route::get('/requestlist', [App\Http\Controllers\ShareController::class, 'requestlist']);
Route::get('/changestatus/{id}', [App\Http\Controllers\ShareController::class, 'changeStatus']);


// Plan controller
Route::get('/plan', [App\Http\Controllers\PlanController::class, 'plan']);
Route::get('/subscription/{id}', [App\Http\Controllers\PlanController::class, 'subscription']);

