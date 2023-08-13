<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'designation', 'email', 'description', 'organization'];

    public function avatarPath():Attribute
    {
        return Attribute::make(
            get: fn() => "https://ui-avatars.com/api/?name=".$this->name."&size=100",
        );
    }
}
