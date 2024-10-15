<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChefController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/menu', function () {
        return view('menu', ['title' => 'Menu Page']);
    });

    Route::get('/chefs', function () {
        return view('chefs', ['title' => 'Chefs Page']);
    });

    Route::get('/order', function () {
        return view('order', ['title' => 'Order Page']);
    });

    Route::get('/chefs', [ChefController::class, 'index'])->name('chefs.index');

});

require __DIR__.'/auth.php';
