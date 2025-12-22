<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //

    function index() {
        $categories = Category::sortable()->paginate(10);
        return view("categories.index", compact("categories"));
    }
}
