<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $games = file(storage_path() . "/resources/game.txt", FILE_IGNORE_NEW_LINES);
        $games = collect($games)->map(function ($item) {
            $game = explode("^", $item);
            return [
                'name' => $game[0],
                'description' => $game[1],
                'price' => $game[2],
                'image' => $game[3],
                'publisher_id' => $game[4],
                'like' => rand(10, 1000)
            ];
        })->toArray();

        Game::insert($games);
    }
}
