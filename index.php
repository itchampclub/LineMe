<?php
require_once __DIR__ . '/Linebot.php';
//require_once __DIR__ . '/function.php';

$bot = new Linebot();
$text = $bot->getMessageText();
$userid  = $bot->getUserID();
$text = "Sriend Help";
$arrtext = explode(" ", $text);
$lentext = count($arrtext);
$keytext = strtolower($arrtext[0]);
//$text = "Farming Metal";

echo "<br>".$text;
echo "<br>".$arrtext;
echo "<br>".$keytext;

if($lentext >= 1){
  echo "<br>".$lentext;
  /*
  if($keytext == "sriend"){
    $bot->reply(file_get_contents('Info.txt'));
  }else{
    // Get Key
    $arrayme = explode("\n", file_get_contents($keytext."/key.txt"));
    $num = array_search($text, $arrayme);
    echo "<br>".$num;
    // Get Content
    $arrayme = explode("~~~", file_get_contents($keytext."/info.txt"));
    $result = $arrayme[$num];
    echo "<br>".$result;
    bot->reply($result);
  }
  */
}

?>
