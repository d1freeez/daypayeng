<?php 
namespace App\Helper;

class Filepond {
    static function clean($file_str){
        $file_str = str_replace("\/","/", $file_str);
        $file_str = str_replace('"',"", $file_str);
        if (!$file_str || trim($file_str) == '')
            return null;
            
        return $file_str;
    }

}