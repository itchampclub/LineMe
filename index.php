<?php
require_once __DIR__ . '/Linebot.php';

$bot = new Linebot();
$text = $bot->getMessageText();

$arrayme = explode("\n", file_get_contents('Keywords.txt'));
$num = array_search($text, $arrayme);

$arrayme = explode("~~~", file_get_contents('Information.txt'));
$result = $arrayme[$num];
$bot->reply($result);
?>
