<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{

    public function form()
    {
        $genre = Genre::all();
        $games = Game::all();

        return view('assigngenre', [
            'games' => $games,
            'genres' => $genre
        ]);
    }

    public function assignGen(Request $request)
    {
        // dd($request);
        $gameId = DB::table(Game::retrieveTableName())
            ->where('name', '=', $request->get('name'))
            ->first();
        $genreId = DB::table(Genre::retrieveTableName())
            ->where('name', '=', $request->get('genre'))
            ->first();

        DB::table(Genre::INTERMEDIATE_TABLE[0])
            ->insert(
                [
                    'game_id' => $gameId->id,
                    'genre_id' => $genreId->id
                ]
            );

        return redirect()->back();
    }

    public function addGen(Request $request)
    {
        $genre = $request->get('genre');

        DB::table(Genre::retrieveTableName())
            ->insert(
                [
                    'name' => $genre
                ]
            );
            
        return redirect()->back();
    }
}
