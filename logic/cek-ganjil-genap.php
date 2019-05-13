<?php 

function isEven($n){ 
    $isEven = true; 
    for ($i = 1; $i <= $n; $i++)  
        $isEven = !$isEven; 
    return $isEven; 
} 
  
$is=isEven(56) ? "Genap" : "Ganjil"; 
echo $is;
  
?> 