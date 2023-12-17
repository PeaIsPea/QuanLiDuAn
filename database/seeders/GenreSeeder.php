<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $publishers = file(storage_path() . "/resources/genre.txt", FILE_IGNORE_NEW_LINES);
        $publishers = collect($publishers)->map(function ($item) {
            return [
                'name' => $item
            ];
        })->toArray();

        Genre::insert($publishers);
    }
}
