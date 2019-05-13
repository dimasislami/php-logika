<?php

function getPage($page){
	if ($page != ""){
		include("page/".$page.".php");
	}else{
		include("page/dashboard.php");
	}
}


function getsidebar() {
	include("layout/sidebar.php");
}




