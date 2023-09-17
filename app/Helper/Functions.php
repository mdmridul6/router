<?php

use App\Models\AboutUs;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;


if (!function_exists('setting')) {
    function setting(string $column = null)
    {
        if (isset($column)) {
            if (isset(AboutUs::first($column)->$column)) {
                return AboutUs::first($column)->$column;
        } else {
                return "";
            }

        } else {
            return AboutUs::first();
        }

    }
}


if (!function_exists('uploadImage')) {

    function uploadImage(?object $file, string $path, int $width = 200, int $height = 260, $watermark = false): string
    {
        // $width = 850;
        // $height = 650;
        $blank_img = Image::canvas($width, $height, '#EBEEF7');
        $pathCreate = public_path("/uploads/$path/");
        if (!File::isDirectory($pathCreate)) {
            File::makeDirectory($pathCreate, 0777, true, true);
        }

        $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $updated_img = Image::make($file->getRealPath());
        $imageWidth = $updated_img->width();
        $imageHeight = $updated_img->height();
        if ($imageWidth > $width) {

            $updated_img->resize($width, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        }
        if ($imageHeight > $height) {

            $updated_img->resize(null, $height, function ($constraint) {
                $constraint->aspectRatio();
            });
        }


        $blank_img->insert($updated_img, 'center');
        $blank_img->save(public_path('/uploads/' . $path . '/') . $fileName);
        return "uploads/$path/" . $fileName;
    }
}
