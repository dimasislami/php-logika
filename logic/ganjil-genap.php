<?php 

function ganjil_genap($n){
	for ($i=1; $i <= $n ; $i++) { 
		if($i % 2 == 0){
			echo $i.' Adalah bilangan genap'.'<br>';
		}else{
			echo $i.' Adalah bilangan ganjil'.'<br>';
		}
	}
}

ganjil_genap(10);

?>