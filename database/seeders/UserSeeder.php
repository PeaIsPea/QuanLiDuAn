<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tableNames = config('permission.table_names');

        $adminId = DB::table((new User)->getTable())->insertGetId([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'verified' => 1,
            'remember_token' => null,
        ]);

        $hrId = DB::table((new User)->getTable())->insertGetId(
            [
                'name' => 'hr',
                'email' => 'hr@gmail.com',
                'password' => Hash::make('password'),
                'verified' => 1,
                'remember_token' => null,
            ]
        );

        $adminRoleId = DB::table(Role::retrieveTableName())->where('name', '=', 'admin')->get('id');
        $hrRoleId = DB::table(Role::retrieveTableName())->where('name', '=', 'hr')->get('id');
        $leaderRoleId = DB::table(Role::retrieveTableName())->where('name', '=', 'leader')->get('id');

        // admin
        DB::table($tableNames['model_has_roles'])
            ->insert([
                'role_id' => $adminRoleId[0]->id,
                'model_type' => User::class,
                'user_id' => $adminId
            ]);

        // hr
        DB::table($tableNames['model_has_roles'])
            ->insert([
                'role_id' => $hrRoleId[0]->id,
                'model_type' => User::class,
                'user_id' => $hrId
            ]);

        DB::table($tableNames['model_has_roles'])
            ->insert([
                'role_id' => $leaderRoleId[0]->id,
                'model_type' => User::class,
                'user_id' => $hrId
            ]);


        DB::table('users')->insert(array(
            2 =>
            array(
                'id' => 3,
                'name' => 'Toryu Kira',
                'email' => 'kiratoryu122@gmail.com',
                'verified' => 1,
                'otp' => NULL,
                'password' => '$2y$10$ZA.vjBPfETVwEo6vnNhLiuervQswSAqVMOV6hhRDqO9LczYuEJCsC',
                'last_sent' => '2023-07-07 16:08:54',
                'remember_token' => NULL,
                'gender' => 'Male',
                'biography' => NULL,
                'address' => NULL,
                'created_at' => '2023-07-07 21:45:15',
                'updated_at' => '2023-07-07 21:45:15',
                'social' => 'Google',
                'social_id' => '101908197917112750588',
            )
        ));
    }
}
