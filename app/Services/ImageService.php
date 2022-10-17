<?php

namespace App\Services;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ImageService
{

    public static function saveImage($image, $size, $storage)
    {
        $resize_image = Image::make($image)
                            ->fit($size['height'])
                            ->orientate()
                            ->encode('webp');

        $file_name = time() . '.' . 'webp';

        // $path = storage_path('app/public/images/news/');
        $path = storage_path('app/'. $storage);
        $resize_image->save($path . $file_name);
        
        return $file_name;
    }

    public static function deleteImage($image_name, $storage)
    {
        // $image_path = 'public/images/news/'.$image_name;
        $image_path = $storage . $image_name;

        if (Storage::disk('local')->exists($image_path)) {
            Storage::disk('local')->delete($image_path);
        }
    }
}
