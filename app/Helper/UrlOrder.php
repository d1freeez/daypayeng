<?php 
namespace App\Helper;

use Illuminate\Support\Facades\Request;

class UrlOrder {
    static function getUrl($attr){
        $ar = Request::all();

        if (!isset($ar['orderBy']) ){
            $ar['orderBy'] = $attr;
            $ar['orderTo'] = 'desc';
        }
        else if (isset($ar['orderBy']) && !isset($ar['orderTo'])){
            $ar['orderBy'] = $attr;
            $ar['orderTo'] = 'desc';
        }
        else if (isset($ar['orderBy']) && $ar['orderTo'] == 'asc'){
            $ar['orderBy'] = $attr;
            $ar['orderTo'] = 'desc';
        }
        else {
            $ar['orderBy'] = $attr;
            $ar['orderTo'] = 'asc';
        }

        $link = http_build_query($ar);

        $ar_clean = Request::all();


        if (!isset($ar_clean['orderBy']) || $ar_clean['orderBy'] != $attr)
            $icon = '&#8250;';
        else if ($ar['orderTo'] == 'asc')
            $icon = '&#8593;';
        else if ($ar['orderTo'] == 'desc')
            $icon = '&#8595;';
        

        return '<a href="?'.$link.'">'.$icon.'</a>';
    }

}