<?php

namespace App\Models;

use App\Constants\AppConstant;
use App\Library\Imagetool;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    protected $fillable = [
        'employer_id',
        'code',
        'title',
        'negotiable',
        'description',
        'specification',
        'image',
        'salary',
        'position',
        'type',
        'category_id',
        'start_date',
        'end_date',
        'status',
    ];
    public function statusTitle(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->status == AppConstant::ACTIVE ? 'Active' : 'Inactive',
        );
    }

    public function imagePath():Attribute
    {
        return Attribute::make(
            get: fn() => $this->image != null ? Imagetool::getImagePath($this->image) : null,
        );
    }
    public function imageThumb():Attribute
    {
        return Attribute::make(
            get: fn() => $this->image != null ? Imagetool::getThumbPath($this->image) : null,
        );
    }
}
