<?php
require_once __DIR__ . '/Linebot.php';

$bot = new Linebot();
$text = $bot->getMessageText();
if($text == "Sriend Help"){
  $reply = "How I can Help You?";
  $bot->reply($reply);
}else if($text == "Hello"){
  $reply = "Hello ^^/";
  $bot->reply($reply);
}

?>
