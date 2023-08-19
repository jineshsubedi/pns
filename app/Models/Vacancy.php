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
    function shortenText($text, $maxLength = 100, $ellipsis = '...')
    {
        if (strlen($text) <= $maxLength) {
            return strip_tags($text); // No need to truncate
        }

        return substr($text, 0, $maxLength) . $ellipsis;
    }

    public function getShortDescriptionAttribute()
    {
        return $this->shortenText($this->description, 100);
    }

    public function imagePath():Attribute
    {
        return Attribute::make(
            get: fn() => $this->image != null ? Imagetool::getImagePath($this->image) : 'https://png.pngtree.com/thumb_back/fh260/back_pic/00/05/66/755627593b47110.jpg',
        );
    }
    public function imageThumb():Attribute
    {
        return Attribute::make(
            get: fn() => $this->image != null ? Imagetool::getThumbPath($this->image) : 'https://png.pngtree.com/thumb_back/fh260/back_pic/00/05/66/755627593b47110.jpg',
        );
    }
    public function employer()
    {
        return $this->belongsTo(Employer::class, 'employer_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
