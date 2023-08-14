<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Vacancy;
use App\Models\VacancyApply;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VacancyApplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VacancyApply::create([
            'vacancy_id' => Vacancy::first()->id,
            'employee_id'   => Employee::first()->id,
            'status'    => 'Pending'
        ]);
    }
}
