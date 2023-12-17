<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('genres')->delete();
        
        \DB::table('genres')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Tower Defense',
                'created_at' => '2023-07-03 23:25:17',
                'updated_at' => '2023-07-03 23:25:17',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '3D',
                'created_at' => '2023-07-03 23:25:17',
                'updated_at' => '2023-07-03 23:25:17',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => '2D',
                'created_at' => '2023-07-03 23:25:17',
                'updated_at' => '2023-07-03 23:25:17',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Survival',
                'created_at' => '2023-07-03 23:25:17',
                'updated_at' => '2023-07-03 23:25:17',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'RPG',
                'created_at' => '2023-07-03 23:25:17',
                'updated_at' => '2023-07-03 23:25:17',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Action',
                'created_at' => '2023-07-03 23:25:17',
                'updated_at' => '2023-07-03 23:25:17',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Open World',
                'created_at' => '2023-07-03 23:25:17',
                'updated_at' => '2023-07-03 23:25:17',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Platformer',
                'created_at' => '2023-07-03 23:25:17',
                'updated_at' => '2023-07-03 23:25:17',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Fantasy',
                'created_at' => '2023-07-03 23:25:17',
                'updated_at' => '2023-07-03 23:25:17',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'PvP',
                'created_at' => '2023-07-03 23:25:17',
                'updated_at' => '2023-07-03 23:25:17',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Co-op',
                'created_at' => '2023-07-03 23:25:17',
                'updated_at' => '2023-07-03 23:25:17',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'FPS',
                'created_at' => '2023-07-03 23:25:17',
                'updated_at' => '2023-07-03 23:25:17',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Strategy',
                'created_at' => '2023-07-03 23:25:17',
                'updated_at' => '2023-07-03 23:25:17',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Family Friendly',
                'created_at' => '2023-07-03 23:28:00',
                'updated_at' => '2023-07-03 23:28:00',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Simulation',
                'created_at' => '2023-07-03 23:31:34',
                'updated_at' => '2023-07-03 23:31:34',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Indie',
                'created_at' => '2023-07-03 23:31:46',
                'updated_at' => '2023-07-03 23:31:46',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Adventure',
                'created_at' => '2023-07-03 23:32:02',
                'updated_at' => '2023-07-03 23:32:02',
            ),
        ));
        
        
    }
}