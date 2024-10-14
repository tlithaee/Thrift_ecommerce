<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/menu', function () {
    return view('menu', ['title' => 'Menu Page']);
});

Route::get( '/chefs', function () {
    return view('chefs', ['title' => 'Chefs Page']);
});

Route::get( '/order', function () {
    return view('order', ['title' => 'Order Page']);
});