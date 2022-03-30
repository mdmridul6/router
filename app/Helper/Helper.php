<?php

namespace App\Helper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            $file = $request->file('image');
            $filename = $file->hashName();
            $path = $request->file('image')->storeAs('public/uploads/images', $filename);
            return 'storage/uploads/images/'  . $filename;
        }
    }
}
