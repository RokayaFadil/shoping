<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', [ShopController::class, 'index'])->name(name: 'shop.index');
Route::get('/create', [ShopController::class, 'create'])->name(name:'shop.create');
Route::post('/store', [ShopController::class, 'store'])->name(name:'shop.store');
Route::get('/create/categorie', [ShopController::class, 'createcategorie'])->name(name:'shop.createcategorie');
Route::post('/stor/categorie', [ShopController::class, 'storecategorie'])->name(name:'shop.storecategorie');

//cart
Route::get('/cart', [CartController::class, 'index'])->name(name:'cart.index');

//search
Route::post('/search', [SearchController::class, 'search'])->name('search.perform');


//admin
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    // Add more admin routes here
});


Route::get('/{shop}', [ShopController::class, 'show'])->name(name:'shop.show');

//cart
Route::delete('/cart/{cart}', [CartController::class, 'destroy'])->name(name:'cart.destroy');
Route::post('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');



