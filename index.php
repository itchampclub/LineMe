<?php
require_once __DIR__ . '/Linebot.php';
require_once __DIR__ . '/function.php';

$bot = new Linebot();
$text = $bot->getMessageText();
$userid  = $bot->getUserID();
$arrtext = explode(" ", $text);
$lentext = count($arrtext);
$keytext = strtolow($arrtext[0]);
//$text = "Farming Metal";

if($lentext == 1){
  if($keytext == "sriend"){
    $bot->reply(file_get_contents('Info.txt'));
  }else
  if($keytext == "farming"){
      // Get Key
      $arrayme = explode("\n", file_get_contents($keytext."/key.txt"));
      $num = array_search($text, $arrayme);
      // Get Content
      $arrayme = explode("~~~", file_get_contents($keytext."/info.txt"));
      $result = $arrayme[$num];
			bot->reply($result);
  }
}
?>
