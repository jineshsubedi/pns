<?php

namespace App\Models;

use App\Constants\AppConstant;
use App\Library\Imagetool;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Employee extends Authenticatable
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'avatar',
        'status',
        'is_freelancer'
    ];

    protected $hidden = [
        'password',
    ];

    public function statusTitle(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->status == AppConstant::ACTIVE ? 'Active' : 'Inactive',
        );
    }
    public function avatarPath():Attribute
    {
        return Attribute::make(
            get: fn() => $this->avatar != null ? Imagetool::getImagePath($this->avatar) : "https://ui-avatars.com/api/?name=".$this->name."&size=100",
        );
    }
    public function avatarThumb():Attribute
    {
        return Attribute::make(
            get: fn() => $this->avatar != null ? Imagetool::getThumbPath($this->avatar) : "https://ui-avatars.com/api/?name=".$this->name."&size=100",
        );
    }
    public function detail()
    {
        return $this->belongsTo(EmployeeDetail::class, 'id');
    }
}
