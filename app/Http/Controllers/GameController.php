<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    function index() {
        $games = Game::all();
        return view('games.index', compact("games"));
    }

    function create() {
        return view('games.create');
    }

    function show($id) {
        $game = Game::find($id);
        return view('developers.show', compact("game"));
    }

}
