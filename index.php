<?php
require_once __DIR__ . '/Linebot.php';

$bot = new Linebot();
$text = $bot->getMessageText();

$arrayme = explode("\n", file_get_contents('Keywords.txt'));
echo "\n array[0] = ".$arrayme[0];
$result = array_search("Sriend Help", $arrayme);
echo "\n result = ".$result;
//$bot->reply($result);
?>
