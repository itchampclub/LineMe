<?php
require_once __DIR__ . '/Linebot.php';
require_once __DIR__ . '/Function.php';

$bot = new Linebot();
$text = $bot->getMessageText();
//$text = "Farming Metal";

$arrtext = explode(" ", $text);
$lentext = count($arrtext);
$keytext = $arrtext[0];
$userid  = $bot->getUserID();

switch($keytext){
  case "Sriend":
    askSriend($keytext,$lentext,$userid);
  case "Farming":
    askFarming($keytext);
  default:
    return 0;
}
?>
