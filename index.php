<?php
require_once __DIR__ . '/Linebot.php';

$bot = new Linebot();
$text = $bot->getMessageText();
$reply = "I am Reply you.";
$bot->reply($reply);

?>
