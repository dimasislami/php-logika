<?php
echo '===========SAMPLE 1===========';
echo '<br>';
for ($i=1; $i <=5 ; $i++) {
 # code...
 for ($j=4; $j>=$i ; $j--) {
 # code...
 echo "&nbsp;&nbsp;";
 }
 
for ($k=1; $k <=$i ; $k++) {
 # code...
 echo "$k";
 }
 echo "<br>";
}
?>

<?php
echo '<br>';
echo '===========SAMPLE 2===========';
echo '<br>';
for ($i=1; $i <=5 ; $i++) {
 # code...
 for ($j=4; $j>=$i ; $j--) {
 # code...
 echo "&nbsp;&nbsp;";
 }
 
for ($k=$i; $k >=1 ; $k--) {
 # code...
 echo "$k";
 }
 echo "<br>";
}
?>

<?php
echo '<br>';
echo '===========SAMPLE 3===========';
echo '<br>';
for ($i=1;$i<=10;$i++){
    for ($j=$i;$j>=1;$j--){
        echo $j;
    }
    echo "<br>";
}
?>

<?php
echo '<br>';
echo '===========SAMPLE 4===========';
echo '<br>';
for ($i=1;$i<=10;$i++){
     for ($j=10;$j>=$i;$j--){
    echo $j;
      }
     echo "<br>";
}
?>

<?php
echo '<br>';
echo '===========SAMPLE 5===========';
echo '<br>';
for ($i=10;$i>=1;$i--){
     for ($j=$i;$j>=1;$j--){
    echo $j;
    }
     echo "<br>";
}
?>