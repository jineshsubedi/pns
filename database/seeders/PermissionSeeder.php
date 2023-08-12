<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'create-user']);
        Permission::create(['name' => 'read-user']);
        Permission::create(['name' => 'update-user']);
        Permission::create(['name' => 'delete-user']);
        Permission::create(['name' => 'create-role']);
        Permission::create(['name' => 'read-role']);
        Permission::create(['name' => 'update-role']);
        Permission::create(['name' => 'delete-role']);
        Permission::create(['name' => 'create-setting']);
        Permission::create(['name' => 'read-setting']);
        Permission::create(['name' => 'update-setting']);
        Permission::create(['name' => 'delete-setting']);
        Permission::create(['name' => 'create-employer']);
        Permission::create(['name' => 'read-employer']);
        Permission::create(['name' => 'update-employer']);
        Permission::create(['name' => 'delete-employer']);
        Permission::create(['name' => 'create-employee']);
        Permission::create(['name' => 'read-employee']);
        Permission::create(['name' => 'update-employee']);
        Permission::create(['name' => 'delete-employee']);
    }
}
