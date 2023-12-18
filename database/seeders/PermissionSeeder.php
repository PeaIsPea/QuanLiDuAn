<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Permission::PERMISSIONS as $key => $value) {
            DB::table(Permission::retrieveTableName())
                ->insert(
                    [
                        'name' => $value,
                        'guard_name' => 'web'
                    ]
                );
        }
    }
}
