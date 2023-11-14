<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

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
// });

Route::get('/biodata', [HomeController::class, 'biodata']);

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/profile', [HomeController::class, 'profile'])->name('profile');


Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::delete('/products/{id}', [ProductController::class, 'delete'])->name('products.delete');

Route::get('/products/create', [ProductController::class, 'createForm'])->name('products.createForm');
Route::post('/products/create', [ProductController::class, 'create'])->name('products.create');

Route::get('/products/{product}/edit',[ProductController::class, 'editForm'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
