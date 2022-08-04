<?php
namespace App\Media;

class Media {
public static function upload ($image,$dir){
    $newImage=$image->hashName();
   $image->move($dir,$newImage);
   return $newImage;
}
public static function delete($patholdimage)
{
    if(file_exists($patholdimage)){
        unlink($patholdimage);
        return true;
    }
    return false;
}
}
