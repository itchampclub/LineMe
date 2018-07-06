<?php
require_once __DIR__ . '/Linebot.php';

$bot = new Linebot();
$text = $bot->getMessageText();
$text = "Farming Metal";

$arrtext = explode(" ", $text);
if($arrtext[0] == "Sriend"){
  $bot->reply(file_get_contents('Info.txt'));
}else{  
  $loc1 = strtolower("/".$arrtext[0]."/key.txt");
  $loc2 = strtolower("/".$arrtext[0]."/info.txt");
  echo file_get_contents($loc1);
  $arrayme = explode("\n", file_get_contents($loc1));
  $num = array_search($text, $arrayme);
  echo "\nNumber = ".$num;

  $arrayme = explode("~~~", file_get_contents($loc2));
  $result = $arrayme[$num];
  echo "\nResult = ".$result;
  $bot->reply($result);
}
?>
