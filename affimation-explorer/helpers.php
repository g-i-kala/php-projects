<?php


function removePolishSmallChars($text) {
    // table
    $polish_chars = array(
        'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 
        'ś' => 's', 'ż' => 'z', 'ź' => 'z', 'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'E', 
        'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'O', 'Ś' => 'S', 'Ż' => 'Z', 'Ź' => 'Z'
    );
    
    // change
    $text = strtr($text, $polish_chars);
    
    // small letters
    return mb_strtolower($text, 'UTF-8');
}


?>