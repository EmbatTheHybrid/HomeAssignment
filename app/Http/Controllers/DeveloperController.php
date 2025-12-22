<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Developer;

class DeveloperController extends Controller
{
    //

    function index() {
        $developers = Developer::sortable()->paginate(10);

        return view('developers.index', compact("developers"));
    }

    function create() {
        return view('developers.create');
    }

    function show($id) {
        $developer = Developer::find($id);
        return view('developers.show', compact("developer"));
    }

    function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255'
        ]);

        Developer::create($validatedData);

        return redirect('/developers');
    }

    function edit($id) {
        $developer = Developer::find($id);
        return view('developers.edit', compact('developer'));
    }

    function update($id) {
        $validatedData = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255'
        ]);

        $developer = Developer::find($id);
        $developer->update($validatedData);

        return redirect('/developers' . '/' . $id);
    }

    function delete($id) {
        $developer = Developer::find($id);
        $developer->delete();
        return redirect('/developers');
    }
}
