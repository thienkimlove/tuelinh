<?php

namespace App;


class ImageReverse
{
   public static function img($image)
   {
       if (!file_exists(public_path('files/images/'.$image))) {
           return '0ca1f3d3ef0f455ddec7d078693eae00.jpg';
       }
       return $image;
   }
}