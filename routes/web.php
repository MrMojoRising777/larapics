<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

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

Route::get('/', [ImageController::class, 'index'])->name('images.index');
Route::get('/images/{image}', [Imagecontroller::class, 'show'])->name('images.show');
Route::get('/images', [Imagecontroller::class, 'create'])->name('images.create');
Route::post('/images', [Imagecontroller::class, 'store'])->name('images.store');

Route::get('/images/{image}/edit', [Imagecontroller::class, 'edit'])->name('images.edit');
Route::put('/images/{image}', [Imagecontroller::class, 'update'])->name('images.update');

Route::delete('/images/{image}', [Imagecontroller::class, 'destroy'])->name('images.destroy');

Route::view('/test-blade', 'test');