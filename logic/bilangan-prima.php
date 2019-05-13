<?php

echo "BILANGAN PRIMA";
echo "<br><br>";

function prima($n){
    
    for ($i = 1; $i <= $n; $i++) {
        $counter = 0;
        for ($j = 1; $j <= $i; $j++) {            
            if ($i % $j == 0) {
                
                $counter++;
            }
        }        
        if ($counter == 2) {
            print $i . " adalah bilangan prima <br/>";
        }else{
            print $i . " adalah bukan bilangan prima <br/>";
        }
    }
}

prima(20);
?>