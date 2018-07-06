<?php
require_once __DIR__ . '/Linebot.php';

$bot = new Linebot();
$text = $bot->getMessageText();

$arrayme = split(fopen('Keywords.txt','r'),'\n');
echo "array[0] = ".$arrayme[0];
$result = array_search("Sriend Help", $arrayme);
echo "result = ".$result;
//$bot->reply($result);
?>
