<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductsController;
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

Route::get('/', [PagesController::class, 'index']);
Route::get('/products', [PagesController::class, 'products']);
Route::get('/receipt', [PagesController::class, 'receipt']);
Route::get('/edit-products', [PagesController::class, 'editProducts']);
Route::post('/checkout', [CheckoutController::class, 'checkout']);
Route::post('/add', [ProductsController::class, 'add']);
Route::post('/update', [ProductsController::class, 'update']);
Route::post('/delete', [ProductsController::class, 'delete']);
