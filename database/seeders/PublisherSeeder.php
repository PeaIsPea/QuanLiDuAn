<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $publishers = file(storage_path() . "/resources/publisher.txt", FILE_IGNORE_NEW_LINES);
        $publishers = collect($publishers)->map(function ($item) {
            return [
                'name' => $item
            ];
        })->toArray();

        Publisher::insert($publishers);
    }
}
