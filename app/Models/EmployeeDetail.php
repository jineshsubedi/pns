<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeDetail extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'bio', 'cv', 'gender', 'marital_status', 'blood_group', 'dob', 'designation', 'skills'];

    public function skills(): Attribute
    {
        return Attribute::make(
            get: fn($value) => ($value != null ? explode(',', $value) : []),
            set: fn($value) => $value != null ? implode(',', $value) : null
        );
    }
}
