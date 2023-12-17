<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GameGenreTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('game_genre')->delete();
        
        \DB::table('game_genre')->insert(array (
            0 => 
            array (
                'id' => 1,
                'game_id' => 1,
                'genre_id' => 1,
                'created_at' => '2023-07-03 23:28:28',
                'updated_at' => '2023-07-03 23:28:28',
            ),
            1 => 
            array (
                'id' => 2,
                'game_id' => 1,
                'genre_id' => 6,
                'created_at' => '2023-07-03 23:28:28',
                'updated_at' => '2023-07-03 23:28:28',
            ),
            2 => 
            array (
                'id' => 3,
                'game_id' => 1,
                'genre_id' => 11,
                'created_at' => '2023-07-03 23:28:28',
                'updated_at' => '2023-07-03 23:28:28',
            ),
            3 => 
            array (
                'id' => 4,
                'game_id' => 1,
                'genre_id' => 13,
                'created_at' => '2023-07-03 23:28:28',
                'updated_at' => '2023-07-03 23:28:28',
            ),
            4 => 
            array (
                'id' => 5,
                'game_id' => 1,
                'genre_id' => 14,
                'created_at' => '2023-07-03 23:28:28',
                'updated_at' => '2023-07-03 23:28:28',
            ),
            5 => 
            array (
                'id' => 6,
                'game_id' => 2,
                'genre_id' => 1,
                'created_at' => '2023-07-03 23:29:21',
                'updated_at' => '2023-07-03 23:29:21',
            ),
            6 => 
            array (
                'id' => 7,
                'game_id' => 2,
                'genre_id' => 11,
                'created_at' => '2023-07-03 23:29:21',
                'updated_at' => '2023-07-03 23:29:21',
            ),
            7 => 
            array (
                'id' => 8,
                'game_id' => 2,
                'genre_id' => 13,
                'created_at' => '2023-07-03 23:29:21',
                'updated_at' => '2023-07-03 23:29:21',
            ),
            8 => 
            array (
                'id' => 9,
                'game_id' => 3,
                'genre_id' => 5,
                'created_at' => '2023-07-03 23:30:26',
                'updated_at' => '2023-07-03 23:30:26',
            ),
            9 => 
            array (
                'id' => 10,
                'game_id' => 3,
                'genre_id' => 7,
                'created_at' => '2023-07-03 23:30:26',
                'updated_at' => '2023-07-03 23:30:26',
            ),
            10 => 
            array (
                'id' => 11,
                'game_id' => 4,
                'genre_id' => 4,
                'created_at' => '2023-07-03 23:32:51',
                'updated_at' => '2023-07-03 23:32:51',
            ),
            11 => 
            array (
                'id' => 12,
                'game_id' => 4,
                'genre_id' => 5,
                'created_at' => '2023-07-03 23:32:51',
                'updated_at' => '2023-07-03 23:32:51',
            ),
            12 => 
            array (
                'id' => 13,
                'game_id' => 4,
                'genre_id' => 6,
                'created_at' => '2023-07-03 23:32:51',
                'updated_at' => '2023-07-03 23:32:51',
            ),
            13 => 
            array (
                'id' => 14,
                'game_id' => 4,
                'genre_id' => 7,
                'created_at' => '2023-07-03 23:32:51',
                'updated_at' => '2023-07-03 23:32:51',
            ),
            14 => 
            array (
                'id' => 15,
                'game_id' => 4,
                'genre_id' => 11,
                'created_at' => '2023-07-03 23:32:51',
                'updated_at' => '2023-07-03 23:32:51',
            ),
            15 => 
            array (
                'id' => 16,
                'game_id' => 4,
                'genre_id' => 13,
                'created_at' => '2023-07-03 23:32:51',
                'updated_at' => '2023-07-03 23:32:51',
            ),
            16 => 
            array (
                'id' => 17,
                'game_id' => 4,
                'genre_id' => 15,
                'created_at' => '2023-07-03 23:32:51',
                'updated_at' => '2023-07-03 23:32:51',
            ),
            17 => 
            array (
                'id' => 18,
                'game_id' => 4,
                'genre_id' => 16,
                'created_at' => '2023-07-03 23:32:51',
                'updated_at' => '2023-07-03 23:32:51',
            ),
            18 => 
            array (
                'id' => 19,
                'game_id' => 4,
                'genre_id' => 17,
                'created_at' => '2023-07-03 23:32:51',
                'updated_at' => '2023-07-03 23:32:51',
            ),
            19 => 
            array (
                'id' => 20,
                'game_id' => 5,
                'genre_id' => 5,
                'created_at' => '2023-07-03 23:33:34',
                'updated_at' => '2023-07-03 23:33:34',
            ),
            20 => 
            array (
                'id' => 21,
                'game_id' => 5,
                'genre_id' => 6,
                'created_at' => '2023-07-03 23:33:34',
                'updated_at' => '2023-07-03 23:33:34',
            ),
            21 => 
            array (
                'id' => 22,
                'game_id' => 5,
                'genre_id' => 7,
                'created_at' => '2023-07-03 23:33:34',
                'updated_at' => '2023-07-03 23:33:34',
            ),
            22 => 
            array (
                'id' => 23,
                'game_id' => 6,
                'genre_id' => 3,
                'created_at' => '2023-07-03 23:34:23',
                'updated_at' => '2023-07-03 23:34:23',
            ),
            23 => 
            array (
                'id' => 24,
                'game_id' => 6,
                'genre_id' => 6,
                'created_at' => '2023-07-03 23:34:23',
                'updated_at' => '2023-07-03 23:34:23',
            ),
            24 => 
            array (
                'id' => 25,
                'game_id' => 6,
                'genre_id' => 8,
                'created_at' => '2023-07-03 23:34:23',
                'updated_at' => '2023-07-03 23:34:23',
            ),
            25 => 
            array (
                'id' => 26,
                'game_id' => 6,
                'genre_id' => 16,
                'created_at' => '2023-07-03 23:34:23',
                'updated_at' => '2023-07-03 23:34:23',
            ),
            26 => 
            array (
                'id' => 27,
                'game_id' => 7,
                'genre_id' => 3,
                'created_at' => '2023-07-03 23:34:59',
                'updated_at' => '2023-07-03 23:34:59',
            ),
            27 => 
            array (
                'id' => 28,
                'game_id' => 7,
                'genre_id' => 6,
                'created_at' => '2023-07-03 23:34:59',
                'updated_at' => '2023-07-03 23:34:59',
            ),
            28 => 
            array (
                'id' => 29,
                'game_id' => 7,
                'genre_id' => 8,
                'created_at' => '2023-07-03 23:34:59',
                'updated_at' => '2023-07-03 23:34:59',
            ),
            29 => 
            array (
                'id' => 30,
                'game_id' => 7,
                'genre_id' => 16,
                'created_at' => '2023-07-03 23:34:59',
                'updated_at' => '2023-07-03 23:34:59',
            ),
            30 => 
            array (
                'id' => 31,
                'game_id' => 8,
                'genre_id' => 3,
                'created_at' => '2023-07-03 23:35:42',
                'updated_at' => '2023-07-03 23:35:42',
            ),
            31 => 
            array (
                'id' => 32,
                'game_id' => 8,
                'genre_id' => 6,
                'created_at' => '2023-07-03 23:35:42',
                'updated_at' => '2023-07-03 23:35:42',
            ),
            32 => 
            array (
                'id' => 33,
                'game_id' => 8,
                'genre_id' => 8,
                'created_at' => '2023-07-03 23:35:42',
                'updated_at' => '2023-07-03 23:35:42',
            ),
            33 => 
            array (
                'id' => 34,
                'game_id' => 8,
                'genre_id' => 17,
                'created_at' => '2023-07-03 23:35:42',
                'updated_at' => '2023-07-03 23:35:42',
            ),
            34 => 
            array (
                'id' => 35,
                'game_id' => 9,
                'genre_id' => 5,
                'created_at' => '2023-07-03 23:36:08',
                'updated_at' => '2023-07-03 23:36:08',
            ),
            35 => 
            array (
                'id' => 36,
                'game_id' => 9,
                'genre_id' => 6,
                'created_at' => '2023-07-03 23:36:08',
                'updated_at' => '2023-07-03 23:36:08',
            ),
            36 => 
            array (
                'id' => 37,
                'game_id' => 9,
                'genre_id' => 16,
                'created_at' => '2023-07-03 23:36:08',
                'updated_at' => '2023-07-03 23:36:08',
            ),
            37 => 
            array (
                'id' => 38,
                'game_id' => 10,
                'genre_id' => 6,
                'created_at' => '2023-07-03 23:36:54',
                'updated_at' => '2023-07-03 23:36:54',
            ),
            38 => 
            array (
                'id' => 39,
                'game_id' => 10,
                'genre_id' => 11,
                'created_at' => '2023-07-03 23:36:54',
                'updated_at' => '2023-07-03 23:36:54',
            ),
            39 => 
            array (
                'id' => 40,
                'game_id' => 10,
                'genre_id' => 12,
                'created_at' => '2023-07-03 23:36:54',
                'updated_at' => '2023-07-03 23:36:54',
            ),
            40 => 
            array (
                'id' => 41,
                'game_id' => 11,
                'genre_id' => 6,
                'created_at' => '2023-07-03 23:38:19',
                'updated_at' => '2023-07-03 23:38:19',
            ),
            41 => 
            array (
                'id' => 42,
                'game_id' => 11,
                'genre_id' => 8,
                'created_at' => '2023-07-03 23:38:19',
                'updated_at' => '2023-07-03 23:38:19',
            ),
            42 => 
            array (
                'id' => 43,
                'game_id' => 12,
                'genre_id' => 5,
                'created_at' => '2023-07-03 23:39:04',
                'updated_at' => '2023-07-03 23:39:04',
            ),
            43 => 
            array (
                'id' => 44,
                'game_id' => 13,
                'genre_id' => 1,
                'created_at' => '2023-07-03 23:40:07',
                'updated_at' => '2023-07-03 23:40:07',
            ),
            44 => 
            array (
                'id' => 45,
                'game_id' => 13,
                'genre_id' => 13,
                'created_at' => '2023-07-03 23:40:07',
                'updated_at' => '2023-07-03 23:40:07',
            ),
            45 => 
            array (
                'id' => 46,
                'game_id' => 14,
                'genre_id' => 3,
                'created_at' => '2023-07-03 23:40:56',
                'updated_at' => '2023-07-03 23:40:56',
            ),
            46 => 
            array (
                'id' => 47,
                'game_id' => 14,
                'genre_id' => 4,
                'created_at' => '2023-07-03 23:40:56',
                'updated_at' => '2023-07-03 23:40:56',
            ),
            47 => 
            array (
                'id' => 48,
                'game_id' => 14,
                'genre_id' => 5,
                'created_at' => '2023-07-03 23:40:56',
                'updated_at' => '2023-07-03 23:40:56',
            ),
            48 => 
            array (
                'id' => 49,
                'game_id' => 14,
                'genre_id' => 6,
                'created_at' => '2023-07-03 23:40:56',
                'updated_at' => '2023-07-03 23:40:56',
            ),
            49 => 
            array (
                'id' => 50,
                'game_id' => 14,
                'genre_id' => 7,
                'created_at' => '2023-07-03 23:40:56',
                'updated_at' => '2023-07-03 23:40:56',
            ),
            50 => 
            array (
                'id' => 51,
                'game_id' => 14,
                'genre_id' => 16,
                'created_at' => '2023-07-03 23:40:56',
                'updated_at' => '2023-07-03 23:40:56',
            ),
            51 => 
            array (
                'id' => 52,
                'game_id' => 14,
                'genre_id' => 17,
                'created_at' => '2023-07-03 23:40:56',
                'updated_at' => '2023-07-03 23:40:56',
            ),
            52 => 
            array (
                'id' => 53,
                'game_id' => 15,
                'genre_id' => 5,
                'created_at' => '2023-07-03 23:43:22',
                'updated_at' => '2023-07-03 23:43:22',
            ),
            53 => 
            array (
                'id' => 54,
                'game_id' => 15,
                'genre_id' => 11,
                'created_at' => '2023-07-03 23:43:22',
                'updated_at' => '2023-07-03 23:43:22',
            ),
            54 => 
            array (
                'id' => 55,
                'game_id' => 15,
                'genre_id' => 15,
                'created_at' => '2023-07-03 23:43:22',
                'updated_at' => '2023-07-03 23:43:22',
            ),
            55 => 
            array (
                'id' => 56,
                'game_id' => 15,
                'genre_id' => 16,
                'created_at' => '2023-07-03 23:43:22',
                'updated_at' => '2023-07-03 23:43:22',
            ),
            56 => 
            array (
                'id' => 57,
                'game_id' => 16,
                'genre_id' => 16,
                'created_at' => '2023-07-03 23:44:01',
                'updated_at' => '2023-07-03 23:44:01',
            ),
            57 => 
            array (
                'id' => 58,
                'game_id' => 16,
                'genre_id' => 17,
                'created_at' => '2023-07-03 23:44:01',
                'updated_at' => '2023-07-03 23:44:01',
            ),
            58 => 
            array (
                'id' => 59,
                'game_id' => 17,
                'genre_id' => 3,
                'created_at' => '2023-07-03 23:44:40',
                'updated_at' => '2023-07-03 23:44:40',
            ),
            59 => 
            array (
                'id' => 60,
                'game_id' => 17,
                'genre_id' => 4,
                'created_at' => '2023-07-03 23:44:40',
                'updated_at' => '2023-07-03 23:44:40',
            ),
            60 => 
            array (
                'id' => 61,
                'game_id' => 17,
                'genre_id' => 5,
                'created_at' => '2023-07-03 23:44:40',
                'updated_at' => '2023-07-03 23:44:40',
            ),
            61 => 
            array (
                'id' => 62,
                'game_id' => 17,
                'genre_id' => 6,
                'created_at' => '2023-07-03 23:44:40',
                'updated_at' => '2023-07-03 23:44:40',
            ),
            62 => 
            array (
                'id' => 63,
                'game_id' => 17,
                'genre_id' => 7,
                'created_at' => '2023-07-03 23:44:40',
                'updated_at' => '2023-07-03 23:44:40',
            ),
            63 => 
            array (
                'id' => 64,
                'game_id' => 17,
                'genre_id' => 16,
                'created_at' => '2023-07-03 23:44:40',
                'updated_at' => '2023-07-03 23:44:40',
            ),
            64 => 
            array (
                'id' => 65,
                'game_id' => 17,
                'genre_id' => 17,
                'created_at' => '2023-07-03 23:44:40',
                'updated_at' => '2023-07-03 23:44:40',
            ),
            65 => 
            array (
                'id' => 66,
                'game_id' => 18,
                'genre_id' => 5,
                'created_at' => '2023-07-03 23:45:08',
                'updated_at' => '2023-07-03 23:45:08',
            ),
            66 => 
            array (
                'id' => 67,
                'game_id' => 18,
                'genre_id' => 16,
                'created_at' => '2023-07-03 23:45:08',
                'updated_at' => '2023-07-03 23:45:08',
            ),
            67 => 
            array (
                'id' => 68,
                'game_id' => 19,
                'genre_id' => 17,
                'created_at' => '2023-07-03 23:45:40',
                'updated_at' => '2023-07-03 23:45:40',
            ),
            68 => 
            array (
                'id' => 69,
                'game_id' => 20,
                'genre_id' => 3,
                'created_at' => '2023-07-03 23:46:20',
                'updated_at' => '2023-07-03 23:46:20',
            ),
            69 => 
            array (
                'id' => 70,
                'game_id' => 20,
                'genre_id' => 6,
                'created_at' => '2023-07-03 23:46:20',
                'updated_at' => '2023-07-03 23:46:20',
            ),
            70 => 
            array (
                'id' => 71,
                'game_id' => 20,
                'genre_id' => 8,
                'created_at' => '2023-07-03 23:46:20',
                'updated_at' => '2023-07-03 23:46:20',
            ),
            71 => 
            array (
                'id' => 72,
                'game_id' => 21,
                'genre_id' => 3,
                'created_at' => '2023-07-03 23:46:52',
                'updated_at' => '2023-07-03 23:46:52',
            ),
            72 => 
            array (
                'id' => 73,
                'game_id' => 21,
                'genre_id' => 6,
                'created_at' => '2023-07-03 23:46:52',
                'updated_at' => '2023-07-03 23:46:52',
            ),
            73 => 
            array (
                'id' => 74,
                'game_id' => 21,
                'genre_id' => 8,
                'created_at' => '2023-07-03 23:46:52',
                'updated_at' => '2023-07-03 23:46:52',
            ),
            74 => 
            array (
                'id' => 75,
                'game_id' => 23,
                'genre_id' => 3,
                'created_at' => '2023-07-03 23:47:29',
                'updated_at' => '2023-07-03 23:47:29',
            ),
            75 => 
            array (
                'id' => 76,
                'game_id' => 23,
                'genre_id' => 6,
                'created_at' => '2023-07-03 23:47:29',
                'updated_at' => '2023-07-03 23:47:29',
            ),
            76 => 
            array (
                'id' => 77,
                'game_id' => 23,
                'genre_id' => 8,
                'created_at' => '2023-07-03 23:47:29',
                'updated_at' => '2023-07-03 23:47:29',
            ),
            77 => 
            array (
                'id' => 78,
                'game_id' => 22,
                'genre_id' => 3,
                'created_at' => '2023-07-03 23:48:04',
                'updated_at' => '2023-07-03 23:48:04',
            ),
            78 => 
            array (
                'id' => 79,
                'game_id' => 22,
                'genre_id' => 5,
                'created_at' => '2023-07-03 23:48:04',
                'updated_at' => '2023-07-03 23:48:04',
            ),
            79 => 
            array (
                'id' => 80,
                'game_id' => 22,
                'genre_id' => 6,
                'created_at' => '2023-07-03 23:48:04',
                'updated_at' => '2023-07-03 23:48:04',
            ),
            80 => 
            array (
                'id' => 81,
                'game_id' => 24,
                'genre_id' => 6,
                'created_at' => '2023-07-03 23:48:34',
                'updated_at' => '2023-07-03 23:48:34',
            ),
            81 => 
            array (
                'id' => 82,
                'game_id' => 24,
                'genre_id' => 8,
                'created_at' => '2023-07-03 23:48:34',
                'updated_at' => '2023-07-03 23:48:34',
            ),
            82 => 
            array (
                'id' => 83,
                'game_id' => 25,
                'genre_id' => 4,
                'created_at' => '2023-07-03 23:49:05',
                'updated_at' => '2023-07-03 23:49:05',
            ),
            83 => 
            array (
                'id' => 84,
                'game_id' => 25,
                'genre_id' => 6,
                'created_at' => '2023-07-03 23:49:05',
                'updated_at' => '2023-07-03 23:49:05',
            ),
            84 => 
            array (
                'id' => 85,
                'game_id' => 25,
                'genre_id' => 11,
                'created_at' => '2023-07-03 23:49:05',
                'updated_at' => '2023-07-03 23:49:05',
            ),
            85 => 
            array (
                'id' => 86,
                'game_id' => 26,
                'genre_id' => 6,
                'created_at' => '2023-07-03 23:49:42',
                'updated_at' => '2023-07-03 23:49:42',
            ),
            86 => 
            array (
                'id' => 87,
                'game_id' => 26,
                'genre_id' => 8,
                'created_at' => '2023-07-03 23:49:42',
                'updated_at' => '2023-07-03 23:49:42',
            ),
            87 => 
            array (
                'id' => 88,
                'game_id' => 26,
                'genre_id' => 16,
                'created_at' => '2023-07-03 23:49:42',
                'updated_at' => '2023-07-03 23:49:42',
            ),
            88 => 
            array (
                'id' => 89,
                'game_id' => 26,
                'genre_id' => 17,
                'created_at' => '2023-07-03 23:49:42',
                'updated_at' => '2023-07-03 23:49:42',
            ),
            89 => 
            array (
                'id' => 90,
                'game_id' => 27,
                'genre_id' => 5,
                'created_at' => '2023-07-03 23:50:24',
                'updated_at' => '2023-07-03 23:50:24',
            ),
            90 => 
            array (
                'id' => 91,
                'game_id' => 27,
                'genre_id' => 16,
                'created_at' => '2023-07-03 23:50:24',
                'updated_at' => '2023-07-03 23:50:24',
            ),
            91 => 
            array (
                'id' => 92,
                'game_id' => 27,
                'genre_id' => 17,
                'created_at' => '2023-07-03 23:50:24',
                'updated_at' => '2023-07-03 23:50:24',
            ),
            92 => 
            array (
                'id' => 93,
                'game_id' => 28,
                'genre_id' => 3,
                'created_at' => '2023-07-03 23:50:53',
                'updated_at' => '2023-07-03 23:50:53',
            ),
            93 => 
            array (
                'id' => 94,
                'game_id' => 28,
                'genre_id' => 6,
                'created_at' => '2023-07-03 23:50:53',
                'updated_at' => '2023-07-03 23:50:53',
            ),
            94 => 
            array (
                'id' => 95,
                'game_id' => 28,
                'genre_id' => 8,
                'created_at' => '2023-07-03 23:50:53',
                'updated_at' => '2023-07-03 23:50:53',
            ),
            95 => 
            array (
                'id' => 96,
                'game_id' => 28,
                'genre_id' => 16,
                'created_at' => '2023-07-03 23:50:53',
                'updated_at' => '2023-07-03 23:50:53',
            ),
            96 => 
            array (
                'id' => 97,
                'game_id' => 29,
                'genre_id' => 16,
                'created_at' => '2023-07-03 23:51:19',
                'updated_at' => '2023-07-03 23:51:19',
            ),
            97 => 
            array (
                'id' => 98,
                'game_id' => 30,
                'genre_id' => 4,
                'created_at' => '2023-07-03 23:51:54',
                'updated_at' => '2023-07-03 23:51:54',
            ),
            98 => 
            array (
                'id' => 99,
                'game_id' => 30,
                'genre_id' => 5,
                'created_at' => '2023-07-03 23:51:54',
                'updated_at' => '2023-07-03 23:51:54',
            ),
            99 => 
            array (
                'id' => 100,
                'game_id' => 30,
                'genre_id' => 6,
                'created_at' => '2023-07-03 23:51:54',
                'updated_at' => '2023-07-03 23:51:54',
            ),
            100 => 
            array (
                'id' => 101,
                'game_id' => 30,
                'genre_id' => 11,
                'created_at' => '2023-07-03 23:51:54',
                'updated_at' => '2023-07-03 23:51:54',
            ),
        ));
        
        
    }
}