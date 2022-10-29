<?php

namespace App\Services;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ImageService
{

    public static function saveImage($image, $size, $storage)
    {
        $resize_image = Image::make($image)
                            ->fit($size['height'], $size['width'])
                            ->orientate()
                            ->encode('webp');

        $file_name = time() . '.' . 'webp';

        $path = storage_path($storage);
        dd($path);
        $resize_image->save($path . $file_name);

        return $file_name;
    }

    public static function deleteImage($image_name, $storage)
    {
        $image_path = $storage . $image_name;

        if (Storage::disk('local')->exists($image_path)) {
            Storage::disk('local')->delete($image_path);
        }
    }
}
