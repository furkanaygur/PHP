<?php
function Seflink($str)
{

    $str = mb_strtolower($str, 'UTF-8');
    // for turkish letters
    $str = str_replace(
        ['ğ', 'ı', 'ü', 'ç', 'ö', 'ş'],
        ['g', 'i', 'u', 'c', 'o', 's'],
        $str
    );

    $str = preg_replace('/[^a-z0-9]/', '-', $str);
    $str = preg_replace('/-+/', '-', $str);

    return trim($str, '-');
}

$str = "Benim için 2021 nasıl geçiyor?";
echo Seflink($str);
