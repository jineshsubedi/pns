<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeDetail extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'bio', 'cv', 'gender', 'marital_status', 'blood_group', 'dob', 'designation', 'skills'];

    // public function skills(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn($value) => ($value != null ? explode(',', $value) : []),
    //         set: fn($value) => $value != null ? implode(',', $value) : null
    //     );
    // }

    public function getSkillSetAttribute()
    {
        return $this->skills != '' ? explode(',', $this->skills) : [];
    }
    public function getShortBioAttribute()
    {
        return $this->shortenText($this->bio, 50);
    }
    function shortenText($text, $maxLength = 100, $ellipsis = '...')
    {
        if (strlen($text) <= $maxLength) {
            return strip_tags($text); // No need to truncate
        }

        return substr($text, 0, $maxLength) . $ellipsis;
    }
}
