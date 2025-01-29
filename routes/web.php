<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\UserController;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/inventory', function (): View {
    return view('inventory');
})->name('inventory');
Route::get('/orders/create/table/{table}/select-user', [OrderController::class, 'selectUser'])->name('orders.create.selectUser');
Route::get('/orders/create/table/{table}/select-user/{user}/select-products', [OrderController::class, 'selectProducts'])->name('orders.create.selectProducts');
Route::get('/products/category/{category_id?}', [ProductController::class, 'index'])->name('products.index');
Route::resource("users", UserController::class)->except("show");
Route::resource("products", ProductController::class)->except("index");
Route::resource("orders", OrderController::class)->except("edit", "create");
Route::resource("categories", CategoryController::class)->except("show");
Route::resource("tables", TableController::class)->except("show");
