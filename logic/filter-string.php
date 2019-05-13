<?php 
function word ($string){
	$string = strip_tags($string);
    $string = str_replace('‘', "\'", $string);
    $string = htmlspecialchars($string, ENT_QUOTES);
    $string = filter_var($string, FILTER_SANITIZE_STRING);
	echo $string;
}

word("<p>Test paragraph.</p><!-- Comment --> <a href='#fragment'>Other text</a> nur sa‘adah");
?>