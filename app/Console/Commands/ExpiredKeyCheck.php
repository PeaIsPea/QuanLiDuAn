<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Key;
use Illuminate\Console\Command;

class ExpiredKeyCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'keys:check-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checking for any game\'s key expired';

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
        $expiredKeys = Key::where('expire_date', '<', Carbon::now())->get();

        foreach ($expiredKeys as $key) {
            $key->is_expired = 1;
            $key->save();
        }

        $this->info('Expired game keys checked successfully.');
    }
}
