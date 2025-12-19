<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Category;
use App\Models\Developer;
use App\Enums\PlayerType;



class GameController extends Controller
{
    function index() {
        $games = Game::all();
        $types =  PlayerType::asArray();
        $categories = Category::all();
        array_unshift($types, "All");
        $developerOwned = [];

        $icons = [
            "action" => "fa-solid fa-hand-fist",
            "strategy" => "fa-solid fa-chess-pawn",
            "adventure" => "fa-solid fa-map"
        ];

        foreach ($games as $game) {
            $developer = Developer::where('id','=',$game->developer_id)->first();
            $developerOwned[] = $developer->name;

            // Get category icons
        };

        return view('games.index', compact("games", "types", 'developerOwned', 'categories', 'icons'));
    }

    function create() {
        return view('games.create');
    }

    function show($id) {
        $game = Game::find($id);
        return view('developers.show', compact("game"));
    }

}
