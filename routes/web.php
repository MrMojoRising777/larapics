<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ListImageController;
use App\Http\Controllers\ShowImageController;

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

Route::get('/', ListImageController::class)->name('images.index');
Route::get('/images/{image}', ShowImagecontroller::class)->name('images.show');
Route::get('/images', [Imagecontroller::class, 'create'])->name('images.create');
Route::post('/images', [Imagecontroller::class, 'store'])->name('images.store');

Route::get('/images/{image}/edit', [Imagecontroller::class, 'edit'])->name('images.edit'); //->can('update', 'image');  // option 1
Route::put('/images/{image}', [Imagecontroller::class, 'update'])->name('images.update');

Route::delete('/images/{image}', [Imagecontroller::class, 'destroy'])->name('images.destroy');

Route::view('/test-blade', 'test');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
