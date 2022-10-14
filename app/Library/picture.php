<?php

namespace app\Library;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class Picture
{

    public static function save($request, $storage)
    {
        $image_name = time() . '.' . 'webp';
        $save_path = storage_path($storage . $image_name);
        Image::make($request->image)->resize(10, 10)->encode('webp')->save($save_path);

        return $image_name;
    }

    public static function delete($image, $storage)
    {
        $image_path = storage_path($storage . $image);
        dd($image_path);
        // dd(Storage::disk('local'));
        dd(Storage::exists($image_path));

        if (Storage::exists($image_path)) {
            Storage::disk('local')->delete($image_path);
        }
    }
}
