<?php

namespace App\Http\Traits;

trait media
{

    public function uploadMedia($image,$folder)
    {
        $photoName = time() . '.' . $image->extension(); // image name of input
        $image->move(public_path('images\\'.$folder), $photoName);// create absolute path
        return $photoName;
    }
    public function deleteMedia($oldImageOfProductName,$folder)
    {
        $photoOldPath = public_path("images\\$folder\\". $oldImageOfProductName);
        if (file_exists($photoOldPath)) {
            unlink($photoOldPath);
            return TRUE;
        }
        return FALSE;
    }
}
