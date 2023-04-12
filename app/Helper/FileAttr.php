<?php 
namespace App\Helper;

class FileAttr {
    static function getExt($link){
        $path_info = pathinfo('/'.$link);
        
        if (!isset($path_info['extension']))
            return 'file';
        
        return $path_info['extension'];
    }

    static function getFileName($link){
        $path_info = pathinfo('/'.$link);
        
        if (!isset($path_info['filename']))
            return 'Файл';
        
        return $path_info['filename'];
        
    }

}