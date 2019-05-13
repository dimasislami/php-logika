<?php

function fizzbuz($no){
    for ($i = 1; $i <= $no; $i++) {
        if ($i % 3 == 0) {
            echo "Fizz ";
        } elseif ($i % 5 == 0) {
            echo "Buzz ";
        } elseif ($i % 3 == 0 && $i % 5 == 0) {
            echo "FizzBuzz ";
        } else {
            echo $i . " ";
        }
    }
}

fizzbuz(100);
?>