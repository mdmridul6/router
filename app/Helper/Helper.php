<?php

namespace App\Helper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class Helper extends Controller
{
    /**
     * @param Request $request
     * @return string|void
     */
    public static function imageUploader(Request $request)
    {

        if ($request->has('image')) {
            $image = $request->file('image');
            $input['image'] = time() . '.' . $image->getClientOriginalExtension();
            $path = 'storage/uploads/images';
            $destinationPath = public_path($path);
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 666, true);
            }
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $input['image']);
            $destinationPath = public_path($path);
            $url = $image->move($destinationPath, $input['image']);
            return $path . "/" . $input['image'];
        }
    }
}
