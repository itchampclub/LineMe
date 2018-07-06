<?php
require_once __DIR__ . '/Linebot.php';

$bot = new Linebot();
$text = $bot->getMessageText();

$arrayme = split(fopen('keywords.txt','w'),'\n');
$result = array_search($text, $arrayme);
echo $result;
$bot->reply($result);
?>
