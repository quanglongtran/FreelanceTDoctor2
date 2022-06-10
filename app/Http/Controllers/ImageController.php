<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Image;

class ImageController extends Controller
{
    //
    public function resize()
    {
        $image = Image::make('/path/to/image.jpg');
        $image->fit(600, 600)->save('path/to/save/large.jpg');
        $image->fit(400, 400)->save('path/to/save/medium.jpg');
        $image->fit(150, 150)->save('path/to/save/thumbnail.jpg');
         
        return 'Done';
    }
    public function flyResize($size, $imagePath)
    {

        $imageFullPath = public_path($imagePath);
        $sizes = config('image.sizes');
     
        if (!file_exists($imageFullPath) || !isset($sizes[$size])) {
            return redirect('/404');
            abort(404);
        }
     
        $savedPath = public_path('resizes/' . $size . '/' . $imagePath);
        $savedDir = dirname($savedPath);
        if (!is_dir($savedDir)) {
            mkdir($savedDir, 777, true);
        }
     
        list($width, $height) = $sizes[$size];
        if($size == 'full'){
            $image = Image::make($imageFullPath)->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($savedPath);
        }else{
            $image = Image::make($imageFullPath)->fit($width, $height)->save($savedPath);
        }
     
        return $image->response();
    }
}
