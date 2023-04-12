<?php 
namespace App\Helper;

use Illuminate\Support\Facades\Request;

class UrlRequest {
    static function getUrl($attr, $value){
        $ar = Request::all();

        if (isset($ar['page']))
            unset($ar['page']);

        $ar[$attr] = $value;


        return http_build_query($ar);
    }

}