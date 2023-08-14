<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacancyApply extends Model
{
    use HasFactory;

    protected $fillable = ['vacancy_id', 'employee_id', 'status'];

    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class, 'employee_id');
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
