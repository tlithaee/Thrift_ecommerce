<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\Category;
use Illuminate\Http\Request;

class ChefController extends Controller
{
    public function index(Request $request)
    {
        // Initialize the query builder for Chef
        $query = Chef::query();

        // Check if the 'category' filter is present in the request
        if ($request->has('category') && $request->category) {
            // Apply the category filter to the chefs query
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('id', $request->category);
            });
        }

        // Paginate the chefs, 6 per page
        $chefs = $query->paginate(6);

        // Retrieve all categories to populate the dropdown filter
        $categories = Category::all();

        // Pass the chefs and categories to the view
        return view('chefs.index', compact('chefs', 'categories'));
    }

    public function filterByCategory($slug)
    {
        // Find the category by slug
        $category = Category::where('slug', $slug)->firstOrFail();

        // Get the chefs associated with the category
        $chefs = Chef::whereHas('categories', function($query) use ($category) {
            $query->where('category_id', $category->id);
        })->paginate(6);  // Adjust pagination as needed

        // Retrieve all categories for filter dropdown (if needed)
        $categories = Category::all();

        // Return the view with the filtered chefs and current category
        return view('chefs.index', compact('chefs', 'categories', 'category'));
    }

    public function show($slug)
    {
        $chef = Chef::where('slug', $slug)->firstOrFail();
        return view('chefs.show', compact('chef'));
    }

}
