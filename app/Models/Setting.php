<?php

namespace App\Models;

use App\Constants\AppConstant;
use App\Library\Imagetool;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'address', 'phone', 'logo', 'icon', 'description_limit', 'item_perpage', 'status'
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
    public function iconPath():Attribute
    {
        return Attribute::make(
            get: fn() => $this->icon != null ? Imagetool::getImagePath($this->icon) : url(asset('images/logo.png')),
        );
    }
    public function iconThumb():Attribute
    {
        return Attribute::make(
            get: fn() => $this->icon != null ? Imagetool::getThumbPath($this->icon) : url(asset('images/logo.png')),
        );
    }
}
