<html>
<form action="" method="POST">
  Masukkan suatu bilangan bulat positif : <input name="bilangan" type="text" size="3">
  <br>
  <input name="faktorial" type="submit" value="Hitung">
</form>
</html>

<?php
if(isset($_POST['faktorial'])){
  $bilangan=$_POST["bilangan"];
   if($bilangan>=1)
{
  echo "Faktorial secara ascending:<br>";
        
  for($i=1; $i <= $bilangan; $i++)  {
     $faktorial = 1;

     echo $i. "! = ";
        
     for($j=$i; $j > 0; $j--) //karena ascending, nilai awal dimulai dari $i dan tiap kali perulangan dikurang 1
     {
    if($j == 1)
    {
            echo " 1 = " .$faktorial;
        }
    else
        {            echo $j ." x ";       }
    ;        $faktorial*=$j; //menghitung hasil faktorial
     }echo "</br>";
  }
}
else if($bilangan == 0)
{
 
   echo "0! = 1";
}
else  //jika memasukkan nilai yang lebih kecil dari 0
{
   echo "Anda salah memasukkan bilangan.";
}
}
   
?>