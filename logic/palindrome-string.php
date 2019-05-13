<?php

function check_plaindrome($string) {
    $string     = str_replace(' ', '', $string);
    $string     = strtolower($string);
    $reverse    = strrev($string);
    if ($string == $reverse) {
        echo $string." merupakan palindrome";
    } 
    else {
        echo $string." bukan palindrome";
    }
}

$string = "Katak";
check_plaindrome($string);

?>