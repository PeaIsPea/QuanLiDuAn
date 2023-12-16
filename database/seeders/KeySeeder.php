<?php

namespace Database\Seeders;

use App\Common\Helper;
use App\Models\Key;
use App\Models\Game;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\FacadesDB;
use Illuminate\Support\Facades\DB;

class KeySeeder extends Seeder
{
    private $key_length = 5;
    private $key_type = [
        'AAAAA-BBBBB-CCCCC-AAAAA-BBBBB-CCCCC-DDDDD-EEEEE',
        'AAAAA-BBBBB-CCCCC-DDDDD-EEEEE'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $games = Game::pluck('id')->all();

        collect($games)->map(function ($id) {
            $amount = rand(5, 8);
            $keyType = $this->key_type[array_rand($this->key_type)];
            for ($i = 1; $i <= $amount; $i++) {
                $key = $this->keyGenerate($keyType);
                DB::table(Key::retrieveTableName())
                    ->insert(
                        [
                            'game_id' => $id,
                            'cd_key' => Helper::encrypt($key, 'cdkey'),
                        ]
                    );
            }
        });
     
    }

    public function keyGenerate($key_type)
    {
        $key = "";

        if ($key_type == $this->key_type[0]) {
            for ($i = 1; $i <= 8; $i++) {
                $key .= Str::upper(Str::random($this->key_length));
            }
        } elseif ($key_type == $this->key_type[1]) {
            for ($i = 1; $i <= 5; $i++) {
                $key .= Str::upper(Str::random($this->key_length));
            }
        }

        $separated = str_split($key, 5);
        $key = implode("-", $separated);

        return $key;
    }
}
