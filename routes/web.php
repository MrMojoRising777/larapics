<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ListImageController;
use App\Http\Controllers\ShowImageController;
use App\Http\Controllers\ShowAuthorController;

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

Route::get('/', ListImageController::class)->name('images.all');
Route::get('/images/{image}', ShowImagecontroller::class)->name('images.show');
Route::post('/images/{image}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/@{user:username}', ShowAuthorController::class)->name('author.show');
Route::resource('/account/images', ImageController::class)->except('show');
Route::get('/account/comments', [CommentController::class, 'index'])->name('comments.index');
Route::put('/account/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
Route::delete('/account/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::get('/account/settings', [SettingController::class, 'edit'])->name('settings.edit');
Route::put('/account/settings', [SettingController::class, 'update'])->name('settings.update');

Route::view('/test-blade', 'test');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
