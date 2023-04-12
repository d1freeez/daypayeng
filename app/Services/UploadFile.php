<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

class UploadFile
{
    public static function upload(UploadedFile $file): bool|string|null
    {
        $file_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $file_name = UploadFile::cleanUTF($file_name);
        $file_name =  $file_name . '.' . $file->getClientOriginalExtension();

        return $file->storeAs('store/' . date('Y') . '/' . date('m') . '/' . date('d') . '/' . rand(0, 9), $file_name);
    }

    public static function cleanUTF($name): string
    {
        $name = str_replace(array('š', 'č', 'đ', 'č', 'ć', 'ž', 'ñ'), array('s', 'c', 'd', 'c', 'c', 'z', 'n'), $name);
        $name = str_replace(array('Š', 'Č', 'Đ', 'Č', 'Ć', 'Ž', 'Ñ'), array('S', 'C', 'D', 'C', 'C', 'Z', 'N'), $name);
        $name = str_replace(
            array('а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'љ', 'м', 'н', 'њ', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'џ', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я', 'А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'Љ', 'М', 'Н', 'Њ', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Џ', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я'),
            array('a', 'b', 'v', 'g', 'd', 'e', 'e', 'z', 'z', 'i', 'j', 'k', 'l', 'lj', 'm', 'n', 'nj', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'c', 'dz', 's', 's', 'i', 'j', 'j', 'e', 'ju', 'ja', 'A', 'B', 'V', 'G', 'D', 'E', 'E', 'Z', 'Z', 'I', 'J', 'K', 'L', 'Lj', 'M', 'N', 'Nj', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'C', 'C', 'Dz', 'S', 'S', 'I', 'J', 'J', 'E', 'Ju', 'Ja'),
            $name
        );

        //$name = preg_replace("/[^а-яёa-z,]/iu", '', $name);
        return mb_strimwidth($name, 0, 20, '');
    }
}
