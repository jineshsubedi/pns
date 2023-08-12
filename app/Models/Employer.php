<?php

namespace App\Models;

use App\Constants\AppConstant;
use App\Library\Imagetool;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Employer extends Authenticatable
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'description',
        'logo'
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
    public function logoPath():Attribute
    {
        return Attribute::make(
            get: fn() => $this->logo != null ? Imagetool::getImagePath($this->logo) : url(asset('images/logo.png')),
        );
    }
    public function logoThumb():Attribute
    {
        return Attribute::make(
            get: fn() => $this->logo != null ? Imagetool::getThumbPath($this->logo) : url(asset('images/logo.png')),
        );
    }
}
