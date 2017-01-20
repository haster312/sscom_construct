<?php
namespace App\Business;
class UploadBusiness {

    public static function uploadFile($image) {
        $destination = public_path('/uploads/images/');
        $extension   = $image->getClientOriginalExtension();
        $newFile['name']      = str_random(10). "." .$extension;
        $newFile['path'] = "/uploads/images/".$newFile['name'];
        $image->move($destination,$newFile['name']);
        return $newFile;
    }
}