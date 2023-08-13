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
        Permission::create(['name' => 'create-jobs']);
        Permission::create(['name' => 'read-jobs']);
        Permission::create(['name' => 'update-jobs']);
        Permission::create(['name' => 'delete-jobs']);
        Permission::create(['name' => 'create-category']);
        Permission::create(['name' => 'read-category']);
        Permission::create(['name' => 'update-category']);
        Permission::create(['name' => 'delete-category']);
        Permission::create(['name' => 'create-blog']);
        Permission::create(['name' => 'read-blog']);
        Permission::create(['name' => 'update-blog']);
        Permission::create(['name' => 'delete-blog']);
        Permission::create(['name' => 'create-testimonial']);
        Permission::create(['name' => 'read-testimonial']);
        Permission::create(['name' => 'update-testimonial']);
        Permission::create(['name' => 'delete-testimonial']);
    }
}
