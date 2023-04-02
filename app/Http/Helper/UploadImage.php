<?php

namespace App\Http\Helper;

class UploadImage
{
    public static function uploadImage($image, $path)
    {
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        // cek jika extension file selain jpg, jpeg, png
        if (!in_array($image->getClientOriginalExtension(), ['jpg', 'jpeg', 'png'])) {
            return response()->json([
                'message' => 'File extension not allowed',
            ], 400);
        }
        // cek jika ukuran file lebih dari 2MB
        if ($image->getSize() > 2000000) {
            return response()->json([
                'message' => 'File size too large',
            ], 400);
        }
        $image->move(public_path($path), $image_name);
        return $image_name;
    }
}
