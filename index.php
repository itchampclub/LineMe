<?php
require_once __DIR__ . '/LineBot.php';

$bot = new Linebot();
$text = $bot->getMessageText();
$reply = "I am Reply you.";
$bot->reply($reply);
