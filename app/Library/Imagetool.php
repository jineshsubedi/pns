<?php

namespace App\Library;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;

class Imagetool
{
    public static function storeImage($file, $name)
    {
        $img = Image::make($file)->encode();
        Storage::put($name, $img);
    }
    public static function getImagePath($path)
    {
        $default = 'https://png.pngtree.com/thumb_back/fh260/back_pic/00/05/66/755627593b47110.jpg';
        if(Storage::exists($path))
        {
            return Storage::url($path);
        }
        return $default;
    }
    public static function getThumbPath($path)
    {
        $default = url(asset('images/logo.png'));
        if(Storage::exists('thumb/'.$path))
        {
            return Storage::url('thumb/'.$path);
        } elseif (Storage::exists($path)) {
            return Storage::url($path);
        } else {
            if(Storage::exists($path))
            {
                $img = Image::make('storage/'.$path);
                $img->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->encode();
                Storage::put('thumb/'.$path, $img);
                return Storage::url('thumb/'.$path);
            }
        }
        return $default;
    }
}
