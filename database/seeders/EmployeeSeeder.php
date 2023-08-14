<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\EmployeeDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $employee = Employee::factory()->create([
        //     'name' => 'Employee',
        //     'email' => 'employee@gmail.com',
        // ]);

            $employee = Employee::first();
            EmployeeDetail::create([
                'employee_id' => $employee->id,
                'bio'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ultrices justo vitae nisl varius, et laoreet turpis eleifend. Sed feugiat, velit ut volutpat consectetur, arcu leo iaculis quam, nec dictum arcu elit eget dui.',
                'designation'   => 'CTO',
                'skills' => 'PHP, LARAVEL, JQUERY, API, SWAGGER',
                'gender'    => 'male',
                'marital_status' => 'married',
                'blood_group'   => 'A+',
            ]);
    }
}
