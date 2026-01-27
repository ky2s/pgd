<?php

function removeCommasAndConvertToInt($string) {
    // Menghilangkan koma dari string
    $stringWithoutCommas = str_replace('.', '', $string);
    $stringWithoutRP = str_replace('Rp', '', $stringWithoutCommas);
    // Mengkonversi string tanpa koma menjadi integer
    $integerValue = intval($stringWithoutRP);
    
    return $integerValue;
}
?>