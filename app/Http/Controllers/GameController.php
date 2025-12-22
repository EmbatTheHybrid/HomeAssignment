<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Category;
use App\Models\Developer;
use App\Enums\PlayerType;
use Illuminate\Validation\Rule;
use BenSampo\Enum\Rules\EnumKey;
use Illuminate\Support\Facades\Storage;
use ColumnSortable;


class GameController extends Controller
{
     

    function index() {
        $games = Game::sortable()->paginate(10);
        $types =  PlayerType::asArray();
        $categories = Category::all();
        array_unshift($types, "All");
        $developerOwned = [];

        // $validated = request()->validate([
        //     'player_type' => ['required', new EnumKey(PlayerType::class)],
        // ]);



        // dd($validated);
        $request = request();

        if ($request->has("s_categories")) {
            $games = Game::whereHas('categories', function($query) use($request) {
                $query->whereIn('categories.id', $request->input('s_categories'));
            }, '=', count($request->input('s_categories')))->get();
        };
        
        if ($request->has("player_type") && $request->input('player_type') != 'All') {
            // dd(gettype(PlayerType::fromKey($request->input("player_type"))));
            $games = $games->where('player_type', '=', PlayerType::fromValue($request->input('player_type')));
        }

        

        
        $icons = [
            "action" => "fa-solid fa-hand-fist",
            "strategy" => "fa-solid fa-chess-pawn",
            "adventure" => "fa-solid fa-map",
            "cozy" => "fa-solid fa-bahai",
            "shmup" => "fa-brands fa-space-awesome"
        ];
       

        foreach ($games as $game) {
            $developer = Developer::where('id','=',$game->developer_id)->first();
            $developerOwned[] = $developer->name;

            // Get category icons
        };



        return view('games.index', compact("games", "types", 'developerOwned', 'categories', 'icons'));
    }

    function create() {
        $types =  PlayerType::asArray();
        $categories = Category::orderBy('name')->get();
        $developers = Developer::orderBy('name')->pluck('name', 'id');

        return view('games.create', compact('types', 'developers', 'categories'));
    }

    function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:255',
            'price' => 'required|decimal:0,2',
            'player_type' => ['required', new EnumKey(PlayerType::class)],
            'categories' => 'required',
            'developer_id' => 'required|exists:developers,id',
            'image_icon' => 'mimetypes:image/jpeg',
            'image_main' => 'mimetypes:image/jpeg',
            'video_main' => 'mimetypes:video/mp4'
        ]);
        // dd($validatedData);
        
        $data = collect($validatedData)->only(['name', 'description', 'price', 'player_type', 'developer_id', 'categories'])->toArray();
        $baseName = str_replace(' ', '', preg_replace('/[^a-z0-9 ]/i', '', strtolower($data['name'])));
        $data['image_path'] = $baseName;
        
        
        $request->file('image_icon')->storeAs('public/images', $baseName . '_icon.' . $request->file('image_icon')->extension());
        $request->file('image_main')->storeAs('public/images', $baseName . '_main.' . $request->file('image_main')->extension());
        $request->file('video_main')->storeAs('public/videos', $baseName . '_video.' . $request->file('video_main')->extension());
        
        $categories = array_values($data['categories']);

        $game = Game::create($data);
        $game->categories()->sync($categories);

        return redirect('/games');
    }

    function show($id) {
        $game = Game::find($id);
        return view('games.show', compact("game"));
    }

    function delete($id) {
        $game = Game::find($id);
        $game->delete();
        return redirect('/games');
    }

    function edit($id) {
        $types =  PlayerType::asArray();
        $categories = Category::orderBy('name')->get();
        $developers = Developer::orderBy('name')->pluck('name', 'id');
        $game = Game::find($id);

        return view('games.edit', compact('types', 'developers', 'categories', 'game'));
    }

    function update($game_id) {
        $validatedData = request()->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:255',
            'price' => 'required|decimal:0,2',
            'player_type' => ['required', new EnumKey(PlayerType::class)],
            'categories' => 'required',
            'developer_id' => 'required|exists:developers,id'
        ]);

        $game = Game::find($game_id);
        $game->update($validatedData);

        $categories = array_values($validatedData['categories']);
        $game->categories()->sync($categories);

        return redirect('/games'.'/'.$game_id);
    }

}
