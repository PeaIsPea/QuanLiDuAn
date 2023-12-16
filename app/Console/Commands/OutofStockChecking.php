<?php

namespace App\Console\Commands;

use App\Models\Key;
use App\Models\Game;
use Illuminate\Console\Command;

class OutofStockChecking extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'game:stock-checking';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update stock status for game on daily';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $games = Game::all();

        foreach ($games as $game) {
            $availableKeysCount = Key::where('game_id', $game->id)
                ->where('is_redeemed', 0)
                ->where('is_expired', 0)
                ->count();

            if ($availableKeysCount == 0) {
                $game->status = Game::STATUS[1];
                $game->save();
            }
        }

        $this->info('Game stock availability checked successfully.');
    }
}
