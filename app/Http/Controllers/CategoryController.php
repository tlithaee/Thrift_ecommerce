<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;

class CategoryController extends Controller
{
    public function index($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $menus = Menu::where('category_id', $category->id)->with('category')->paginate(8); 
        return view('category', compact('category', 'menus'));
    }
}