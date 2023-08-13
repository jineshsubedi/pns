<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['title' => 'Teaching', 'icon' => 'fas fa-chalkboard-teacher']);
        Category::create(['title' => 'Technical', 'icon' => 'fas fa-laptop']);
        Category::create(['title' => 'Engineering', 'icon' => 'fas fa-tools']);
        Category::create(['title' => 'Driver', 'icon' => 'fas fa-tuck']);
        Category::create(['title' => 'Management', 'icon' => 'fas fa-tasks']);
        Category::create(['title' => 'Bank', 'icon' => 'fas fa-piggy-bank']);
    }
}
