<?php

	$json1 = 
	'[
	    {
	        "no": 1,
	        "nama": "Dimas",
	        "alamat": "Benowo"
	    },
	    {
	        "no": 2,
	        "nama": "Neymar",
	        "alamat": "Brazil"
	    }
	]';

	$json2 = 
	'{
		"host" : "www.google.com"
	}';

	function isJSON($string){
	   return is_string($string) && is_array(json_decode($string, true)) ? true : false;
	}

	if(isJSON($json1)){
	 	echo "Ini adalah format JSON yang benar";
	}else{
		echo "Ini bukan format JSON yang benar";
	}
 ?>