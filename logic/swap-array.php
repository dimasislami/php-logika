<?php
$a = 101;
$b = 46;
echo "\nBefore swapping:  ". $a . ', ' . $b .'<br>';
list($a, $b) = array($b, $a);
echo "\nAfter swapping:  ". $a . ', ' . $b."\n";
?>