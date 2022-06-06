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

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'index']);

// Image Controller
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/image_add', [App\Http\Controllers\ImageController::class, 'index'])->name('image.add');
Route::post('/image_add', [App\Http\Controllers\ImageController::class, 'store'])->name('image.store');
Route::get('/show', [App\Http\Controllers\ImageController::class, 'show'])->name('show');
Route::get('/image_view/{id}', [App\Http\Controllers\ImageController::class, 'view']);


//view Controller
Route::get('/shareview/{id}', [App\Http\Controllers\ShareController::class, 'shareview']);
Route::post('/share', [App\Http\Controllers\ShareController::class, 'share']);
Route::get('/sharelist', [App\Http\Controllers\ShareController::class, 'sharelist']);
Route::get('/request/{id}', [App\Http\Controllers\ShareController::class, 'request']);
Route::get('/requestlist', [App\Http\Controllers\ShareController::class, 'requestlist']);
Route::get('/changestatus/{id}', [App\Http\Controllers\ShareController::class, 'changeStatus']);


// Plan Controller
Route::get('/plan', [App\Http\Controllers\PlanController::class, 'plan']);
Route::get('/subscription/{id}', [App\Http\Controllers\PlanController::class, 'subscription']);

// Delete Controller
Route::get('image_delete/{id}', [App\Http\Controllers\DeleteController::class, 'destroy']);
Route::get('delete', [App\Http\Controllers\DeleteController::class, 'index'])->name('image.index');
Route::delete('Delete/{id}', [App\Http\Controllers\DeleteController::class, 'delete'])->name('image.delete');
Route::get('Delete/restore/one/{id}', [App\Http\Controllers\DeleteController::class, 'restore'])->name('image.restore');
Route::get('restoreAll', [App\Http\Controllers\DeleteController::class, 'restoreAll'])->name('image.restore.all');

//Notes Controller
##Route::get('/notes', [App\Http\Controllers\NotesController::class, 'notes'])->name('blocks');
Route::get('/add', [App\Http\Controllers\NotesController::class, 'add'])->name('add.notes');
Route::post('/add', [App\Http\Controllers\NotesController::class, 'store'])->name('notes.store');
Route::get('edit-notes/{id}', [App\Http\Controllers\NotesController::class, 'edit'])->name('edit.notes');
Route::post('update-notes/{id}', [App\Http\Controllers\NotesController::class, 'update'])->name('update.notes');
Route::get('/notes/show', [App\Http\Controllers\NotesController::class, 'show'])->name('notes.show');
Route::get('/view/{id}', [App\Http\Controllers\NotesController::class, 'view'])->name('notes.view');
Route::get('/notes_delete/{id}', [App\Http\Controllers\NotesController::class, 'destroy']);
##Route::get('/details', [App\Http\Controllers\NotesController::class, 'block'])->name('notedetails');


// Category Controller
Route::get('/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('add.category');
Route::POST('/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
