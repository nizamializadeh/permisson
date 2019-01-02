<?php

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
        $permissions = ["create","read","update","delete"];
        foreach ($permissions as $permission)
        {
            DB::table('permissions')->insert([
                'name' => $permission
            ]);
        }

    }
}
