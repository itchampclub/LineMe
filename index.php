<?php
  require_once __DIR__ "/LineBot.php";
  $bot = new Linebot();
  $text = $bot->getMessageText();
  //
  $retext = "I am Shui Yin. Nice To meet You";
  //
  $bot->Reply($retext);
?>
