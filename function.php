<?php

function Checkmessage($userId,$text){

	$bot->reply($text);
	$file = "/Shuiyin/"$userId.".txt";
	if(!file_exists($file)){
		fwrite($file,$text);
		$bot->reply("...");
		return;
	}
}

?>