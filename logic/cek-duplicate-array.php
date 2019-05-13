<?php

$array1 = array("111", "222", "333", "111");

$array2 = array(
		[
			"id" => 1,
			"value" => 111
		],
		[
			"id" => 2,
			"value" => 222
		],
		[
			"id" => 3,
			"value" => 333
		],
		[
			"id" => 4,
			"value" => 222
		],
	);

function check_duplicate($arr){
	if (count($arr) == count($arr, COUNT_RECURSIVE)) {
		echo "Merupakan array 1 dimensi";
		echo "<br><br>";
	 	$count = 0;
		$output ='';
		$ischeckedvalueArray = array();
		for ($i=0; $i < sizeof($arr); $i++) {
		    $eachArrayValue = $arr[$i];
		    if(! in_array($eachArrayValue, $ischeckedvalueArray)) {
		        for( $j=$i; $j < sizeof($arr); $j++) {
		            if ($arr[$j] === $eachArrayValue) {
		                $count++;
		            }
		        }
		        $ischeckedvalueArray[] = $eachArrayValue;
		        if($count > 1 ){
		        	$output .= $eachArrayValue. " Terdapat pengulangan value sebanyak ". $count.' kali'."<br/>";
		        }else{
		        	$output .= $eachArrayValue. " Tidak terdapat pengulangan value dan hanya ada ". $count.' kali'."<br/>";
		        }
		        $count = 0;
		    }
		}
		echo $output;
	}else{
		echo "Merupakan array multidimensi";
		echo "<br><br>";
		$count = 0;
		$output ='';
		$ischeckedvalueArray = array();
		for ($i=0; $i < sizeof($arr); $i++) {
		    $eachArrayValue = $arr[$i]['value'];
		    if(! in_array($eachArrayValue, $ischeckedvalueArray)) {
		        for( $j=$i; $j < sizeof($arr); $j++) {
		            if ($arr[$j]['value'] === $eachArrayValue) {
		                $count++;
		            }
		        }
		        $ischeckedvalueArray[] = $eachArrayValue;
		        if($count > 1 ){
		        	$output .= $eachArrayValue. " Terdapat pengulangan value sebanyak ". $count.' kali'."<br/>";
		        }else{
		        	$output .= $eachArrayValue. " Tidak terdapat pengulangan value dan hanya ada ". $count.' kali'."<br/>";
		        }
		        $count = 0;
		    }
		}
		echo $output;
	}
}

check_duplicate($array2);

?>