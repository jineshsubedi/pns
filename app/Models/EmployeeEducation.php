<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeEducation extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'level', 'faculty', 'university', 'start', 'end', 'address'];
}
