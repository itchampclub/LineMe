<?php

function Checkmessage($userId,$text){
	$file = "/Shuiyin/"$userId.".txt";
	if(!file_exists($file)){
		fwrite($file,$text);
	}
}

?>