<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'SuperAdmin']);
        $role->givePermissionTo('create-user');
        $role->givePermissionTo('read-user');
        $role->givePermissionTo('update-user');
        $role->givePermissionTo('delete-user');
        $role->givePermissionTo('create-role');
        $role->givePermissionTo('read-role');
        $role->givePermissionTo('update-role');
        $role->givePermissionTo('delete-role');

        $admin = User::where('email', 'admin@gmail.com')->first();
        $admin->assignRole(['SuperAdmin']);
    }
}
