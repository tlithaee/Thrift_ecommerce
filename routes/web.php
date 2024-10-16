<?php

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ShippingAddressController;

// Home route
Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

// Authenticated routes
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard route
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile routes
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Menu Route
    Route::get('/menus', function () {
        $menus = Menu::with('category')->get();
        $categories = Category::all();
        return view('menus', ['menus' => $menus, 'categories' => $categories]);
    });

    Route::get('/menus/{menu:slug}', function (Menu $menu) {
        $menu->load('category', 'chef');
        return view('menu', ['menu' => $menu]);
    });

    // Categories Route
    Route::get('/categories/{slug}', [CategoryController::class, 'index'])->name('categories.index');

    // Chef Routes
    Route::get('/chefs', function () {
        return view('chefs', ['title' => 'Chefs Page']);
    });
    Route::get('/chefs/{slug}', [ChefController::class, 'filterByCategory'])->name('chefs.filterByCategory');
    Route::get('/chef/{slug}', [ChefController::class, 'show'])->name('chefs.show');

    // Cart Routes
    Route::post('/cart/add/{menu}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/order', [CartController::class, 'showCart'])->name('cart.show'); 
    Route::patch('/cart/update/{cartItem}', [CartController::class, 'updateCart'])->name('cart.update');
    Route::delete('/cart/remove/{cartItem}', [CartController::class, 'removeFromCart'])->name('cart.remove');

    // POST route for submitting shipping address
    Route::post('/order', [ShippingAddressController::class, 'store'])->name('order.store');


    Route::get('/chefs', [ChefController::class, 'index'])->name('chefs.index');
});

// Authentication routes
require __DIR__ . '/auth.php';
