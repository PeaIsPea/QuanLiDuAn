<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrderDetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('order_details')->delete();
        
        \DB::table('order_details')->insert(array (
            0 => 
            array (
                'id' => 1,
                'order_id' => 1,
                'game_id' => 67,
                'name' => 'Sea of Thieves 2023 Edition',
                'price' => 400000.0,
                'quantity' => 5,
                'created_at' => '2023-07-01 10:13:20',
                'updated_at' => '2023-07-01 10:13:20',
            ),
            1 => 
            array (
                'id' => 2,
                'order_id' => 1,
                'game_id' => 26,
                'name' => 'Jump King',
                'price' => 165000.0,
                'quantity' => 3,
                'created_at' => '2023-07-01 10:13:20',
                'updated_at' => '2023-07-01 10:13:20',
            ),
            2 => 
            array (
                'id' => 3,
                'order_id' => 2,
                'game_id' => 70,
                'name' => 'Library Of Ruina',
                'price' => 250000.0,
                'quantity' => 1,
                'created_at' => '2023-07-01 10:17:05',
                'updated_at' => '2023-07-01 10:17:05',
            ),
            3 => 
            array (
                'id' => 4,
                'order_id' => 3,
                'game_id' => 4,
                'name' => 'Don\'t Starve Together',
                'price' => 165000.0,
                'quantity' => 1,
                'created_at' => '2023-07-01 10:19:22',
                'updated_at' => '2023-07-01 10:19:22',
            ),
            4 => 
            array (
                'id' => 5,
                'order_id' => 3,
                'game_id' => 89,
                'name' => 'Cuphead',
                'price' => 188000.0,
                'quantity' => 2,
                'created_at' => '2023-07-01 10:19:22',
                'updated_at' => '2023-07-01 10:19:22',
            ),
            5 => 
            array (
                'id' => 6,
                'order_id' => 4,
                'game_id' => 11,
                'name' => 'Megaman 11',
                'price' => 398000.0,
                'quantity' => 1,
                'created_at' => '2023-07-01 10:21:02',
                'updated_at' => '2023-07-01 10:21:02',
            ),
            6 => 
            array (
                'id' => 7,
                'order_id' => 5,
                'game_id' => 69,
                'name' => 'Lobotomy Corporation | Monster Management Simulation',
                'price' => 220000.0,
                'quantity' => 1,
                'created_at' => '2023-07-01 10:21:43',
                'updated_at' => '2023-07-01 10:21:43',
            ),
            7 => 
            array (
                'id' => 8,
                'order_id' => 6,
                'game_id' => 42,
                'name' => 'Gunvolt Chronicles: Luminous Avenger iX 2',
                'price' => 274000.0,
                'quantity' => 11,
                'created_at' => '2023-07-01 10:24:22',
                'updated_at' => '2023-07-01 10:24:22',
            ),
            8 => 
            array (
                'id' => 9,
                'order_id' => 7,
                'game_id' => 47,
                'name' => 'One Step From Eden',
                'price' => 188000.0,
                'quantity' => 10,
                'created_at' => '2023-07-01 10:25:16',
                'updated_at' => '2023-07-01 10:25:16',
            ),
            9 => 
            array (
                'id' => 10,
                'order_id' => 8,
                'game_id' => 5,
                'name' => 'ELDEN RING',
                'price' => 800000.0,
                'quantity' => 3,
                'created_at' => '2023-07-01 10:25:48',
                'updated_at' => '2023-07-01 10:25:48',
            ),
            10 => 
            array (
                'id' => 11,
                'order_id' => 9,
                'game_id' => 73,
                'name' => 'Among Us',
                'price' => 70000.0,
                'quantity' => 6,
                'created_at' => '2023-07-01 10:26:17',
                'updated_at' => '2023-07-01 10:26:17',
            ),
            11 => 
            array (
                'id' => 12,
                'order_id' => 10,
                'game_id' => 40,
                'name' => '30XX',
                'price' => 188000.0,
                'quantity' => 1,
                'created_at' => '2023-07-01 10:26:44',
                'updated_at' => '2023-07-01 10:26:44',
            ),
            12 => 
            array (
                'id' => 13,
                'order_id' => 11,
                'game_id' => 50,
                'name' => 'Core Keeper',
                'price' => 215000.0,
                'quantity' => 2,
                'created_at' => '2023-07-01 10:30:02',
                'updated_at' => '2023-07-01 10:30:02',
            ),
            13 => 
            array (
                'id' => 14,
                'order_id' => 12,
                'game_id' => 71,
                'name' => 'Garry\'s Mod',
                'price' => 120000.0,
                'quantity' => 1,
                'created_at' => '2023-07-01 10:30:39',
                'updated_at' => '2023-07-01 10:30:39',
            ),
            14 => 
            array (
                'id' => 15,
                'order_id' => 12,
                'game_id' => 61,
                'name' => 'Rust',
                'price' => 510000.0,
                'quantity' => 2,
                'created_at' => '2023-07-01 10:30:39',
                'updated_at' => '2023-07-01 10:30:39',
            ),
            15 => 
            array (
                'id' => 16,
                'order_id' => 13,
                'game_id' => 82,
                'name' => 'Borderlands 2',
                'price' => 334500.0,
                'quantity' => 1,
                'created_at' => '2023-07-01 10:32:14',
                'updated_at' => '2023-07-01 10:32:14',
            ),
            16 => 
            array (
                'id' => 17,
                'order_id' => 13,
                'game_id' => 83,
                'name' => 'Borderlands 3',
                'price' => 990000.0,
                'quantity' => 1,
                'created_at' => '2023-07-01 10:32:14',
                'updated_at' => '2023-07-01 10:32:14',
            ),
            17 => 
            array (
                'id' => 18,
                'order_id' => 14,
                'game_id' => 29,
                'name' => 'A Dance of Fire and Ice',
                'price' => 80000.0,
                'quantity' => 7,
                'created_at' => '2023-07-01 10:32:56',
                'updated_at' => '2023-07-01 10:32:56',
            ),
            18 => 
            array (
                'id' => 19,
                'order_id' => 14,
                'game_id' => 71,
                'name' => 'Garry\'s Mod',
                'price' => 120000.0,
                'quantity' => 1,
                'created_at' => '2023-07-01 10:32:56',
                'updated_at' => '2023-07-01 10:32:56',
            ),
        ));
        
        
    }
}