<?php
$jumlah = 10;

echo "Segitiga Setengah : <br>";
for($a=1; $a<=$jumlah; $a++){
    for($b=1; $b<=$a; $b++){
        echo '*';
    }
    echo "<br>";
}

echo "<br><br>Segitiga Setengah Terbalik : <br>";
for($a=1; $a<=$jumlah; $a++){
    for($c=$jumlah; $c>=$a; $c-=1){
        echo '*';
    }
    echo "<br>";
}

echo "<br><br>Segitiga Full : <br>";
for($a=1; $a<=$jumlah; $a++){
    for($b=1; $b<=$a; $b++){
        echo '*';
    }
    echo "<br>";
}
for($a=1; $a<=$jumlah; $a++){
    for($b=$jumlah; $b>=$a; $b-=1){
        echo '*';
    }
    echo "<br>";
}


echo "<br><br>Segitiga Diamond : <br>";
for($a=1; $a<=$jumlah; $a++){
    for($b=$jumlah; $b>=$a; $b-=1){
        echo '&nbsp;';
    }
    for($c=1; $c<=$a; $c++){
        echo '*';
    }
    echo "<br>";
}
for($a=1; $a<=$jumlah+1; $a++){
    echo '*';
}
echo "<br>";
for($a=1; $a<=$jumlah; $a++){
    for($b=1; $b<=$a; $b++){
        echo '&nbsp;';
    }
    for($c=$jumlah; $c>=$a; $c-=1){
        echo '*';
    }
    echo "<br>";
}

?>