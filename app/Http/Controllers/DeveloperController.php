<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Developer;

class DeveloperController extends Controller
{
    //

    function index() {
        $developers = Developer::all();
        return view('developers.index', compact("developers"));
    }

    function create() {
        return view('developers.create');
    }

    function show($id) {
        $developer = Developer::find($id);
        return view('developers.show', compact("developer"));
    }
}
