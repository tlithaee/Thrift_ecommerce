<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChefController;
use Illuminate\Support\Facades\Route;
use App\Models\Menu;
use App\Models\Category;

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
    Route::get('/categories/{category:slug}', function (Category $category) {
        $menus = $category->menus; 
        return view('category', ['menus' => $menus, 'category' => $category]);
    });

    // Chef Routes
    Route::get('/chefs', function () {
        return view('chefs', ['title' => 'Chefs Page']);
    });

    // Order Routes
    Route::get('/order', function () {
        return view('order', ['title' => 'Order Page']);
    });

    Route::get('/chefs', [ChefController::class, 'index'])->name('chefs.index');
});

// Authentication routes
require __DIR__ . '/auth.php';
