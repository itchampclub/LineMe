<?php
require_once __DIR__ . '/lineBot.php';

$bot = new Linebot();

// TEXT
$text = $bot->getMessageText();
$bot->reply($text);

// USER ID
//$userId = $bot->getUserId();
//$bot->pushText($userId, 'Hello Simple Text!');

// IMAGE
//$imageUrl = "https://example.com/panda.jpg";
//$bot->pushImage($userId, $imageUrl);

// VIDEO
//$videoUrl = "https://example.com/avengers.mp4";
//$coverImage = "https://example.com/cover.jpg";
//$bot->pushVideo($userId, $videoUrl, $coverImage);

?>