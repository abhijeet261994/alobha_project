<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', [ProductController::class, 'index'])->name('productListing');
Route::get('/addproduct', [ProductController::class, 'addProduct'])->name('addproduct');
Route::post('/addproduct', [ProductController::class, 'addProduct'])->name('addproduct');
Route::get('/editproduct/{id}', [ProductController::class, 'editProduct'])->name('editproduct');
Route::post('/editproduct/{id}', [ProductController::class, 'editProduct'])->name('editproduct');
Route::get('/deleteProduct/{id}', [ProductController::class, 'deleteProduct'])->name('delete');