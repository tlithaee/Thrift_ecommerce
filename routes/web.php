<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Menu;

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

    // Menu routes
    Route::get('/menus', function () {
        $menus = Menu::all(); 
        return view('menus', ['menus' => $menus]); 
    });

    Route::get('/menus/{menu:slug}', function (Menu $menu) {
        return view('menu', ['menu' => $menu]); 
    });

    // Other pages
    Route::get('/chefs', function () {
        return view('chefs', ['title' => 'Chefs Page']);
    });

    Route::get('/order', function () {
        return view('order', ['title' => 'Order Page']);
    });
});

// Authentication routes
require __DIR__ . '/auth.php';
