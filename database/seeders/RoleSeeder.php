<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role as ModelsRole;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tableNames = config('permission.table_names');
        $hrPermissions = [
            'addRole',
            'editRole',
            'deleteRole',
            'activateRole',

            'addPermission',
            'editPermission',
            'deletePermission',
            'activatePermission',

            'assignRole',
            'assignPermission',

            'addUser',
            'editUser',
            'deleteUser',
        ];

        foreach (Role::ROLES as $key => $value) {
            DB::table(Role::retrieveTableName())
                ->insert(
                    [
                        'name' => $value,
                        'guard_name' => 'web'
                    ]
                );
        }

        $adminRole = ModelsRole::findByName('admin');
        $hrRole = ModelsRole::findByName('hr');

        $adminRole->syncPermissions(Permission::PERMISSIONS);
        $hrRole->syncPermissions($hrPermissions);
    }
}
