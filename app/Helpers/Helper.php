<?php

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


function uploadImage($new_image, $width, $height, $old_image, $path){
    if(Storage::disk('s3')->exists($path.substr($old_image, strrpos($old_image, '/')+1))):
        Storage::disk('s3')->delete($path.substr($old_image, strrpos($old_image, '/')+1));
    endif;
    $filename = $path.$new_image->hashName();
    $image = Image::make($new_image->getRealPath())->resize($width, $height, function ($constraint) {
        $constraint->aspectRatio();
    });
    $path = Storage::disk('s3')->put($filename, $image->stream()->__toString(), 'public');
    $path = Storage::disk('s3')->url($filename);       
    return $path;
}

?>