<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
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
// });
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/about', [DashboardController::class, 'about'])->name('about');
Route::get('/maps', [DashboardController::class, 'maps'])->name('maps');
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/index', [ProductController::class, 'productIndex'])->name('index');
Route::get('/product/add', [ProductController::class, 'productCreate'])->name('product.create');
Route::post('/product/store', [ProductController::class, 'productStore'])->name('product.store');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('/products/{id}/detail', [ProductController::class, 'detailProduct'])->name('product.detail');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
