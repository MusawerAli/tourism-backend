<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'role_uuid' =>(string) Str::uuid(),
                'role_name' => 'admin',
            ],
            [
                'role_uuid' =>(string) Str::uuid(),
                'role_name' => 'superuser',
            ],
            [
                'role_uuid' =>(string) Str::uuid(),
                'role_name' => 'driver',
            ],
            [
                'role_uuid' =>(string) Str::uuid(),
                'role_name' => 'passanger',
            ],
            [
                'role_uuid' =>(string) Str::uuid(),
                'role_name' => 'patient',
            ],
            [
                'role_uuid' =>(string) Str::uuid(),
                'role_name' => 'staff',
            ],

        ]);
    }
}
