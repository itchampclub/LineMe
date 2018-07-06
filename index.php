<?php
require_once __DIR__ . '/Linebot.php';

$bot = new Linebot();
$text = $bot->getMessageText();
$text = "Farming Metal";

$arrtext = explode(" ", $text);
if($arrtext[0] == "Sriend"){
  $bot->reply(file_get_contents('Info.txt'));
}else{  
  $loc = '/'.$arrtext[0].'/';
  echo "\n".$loc;
  $arrayme = explode("\n", file_get_contents($loc.'Key.txt'));
  $num = array_search($text, $arrayme);
  echo "\nNumber = ".$num;

  $arrayme = explode("~~~", file_get_contents($loc.'Info.txt'));
  $result = $arrayme[$num];
  echo "\nResult = ".$result;
  $bot->reply($result);
}
?>
