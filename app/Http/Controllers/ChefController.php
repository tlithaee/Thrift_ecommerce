<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use Illuminate\Http\Request;

class ChefController extends Controller
{
    public function index()
    {
        // Paginate chefs from the database
        $chefs = Chef::paginate(6);
        return view('chefs.index', compact('chefs'));

        // Pass the data to the 'chefs.index' view
        return view('chefs.index', compact('chefs'));
    }
}
