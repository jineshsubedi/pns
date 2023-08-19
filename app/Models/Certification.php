<?php

namespace App\Models;

use App\Library\Imagetool;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'banner'];

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

    public function bannerPath(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->banner != null ? Imagetool::getImagePath($this->banner) : 'https://t4.ftcdn.net/jpg/03/98/21/61/360_F_398216158_DvHqY48QOTKsijC0oil0nzltKGPIhZTl.jpg',
        );
    }
}