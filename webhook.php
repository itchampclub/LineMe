<?php // callback.php
define("LINE_MESSAGING_API_CHANNEL_SECRET", 'e1a8ccfacec550e50fd32a335eb13930');
define("LINE_MESSAGING_API_CHANNEL_TOKEN", 'qok5zfpttYHz+w4qJHwQ2/0BHGHvgH6Lc8umSfLZIhpOTmI2Dg1qAbwYO3qcyBzvcAJFpSa3sOD9xthTRiBVWdW+B/6t2sJ7iNHEa2IdOSGB4ntwOat/9nXE/rX9cbaF0L4yOIkWghAZAgX7R6wylwdB04t89/1O/w1cDnyilFU=');

require __DIR__."/../vendor/autoload.php";

$bot = new \LINE\LINEBot(
    new \LINE\LINEBot\HTTPClient\CurlHTTPClient(LINE_MESSAGING_API_CHANNEL_TOKEN),
    ['channelSecret' => LINE_MESSAGING_API_CHANNEL_SECRET]
);

$signature = $_SERVER["HTTP_".\LINE\LINEBot\Constant\HTTPHeader::LINE_SIGNATURE];
$body = file_get_contents("php://input");

$events = $bot->parseEventRequest($body, $signature);

foreach ($events as $event) {
    if ($event instanceof \LINE\LINEBot\Event\MessageEvent\TextMessage) {
        $reply_token = $event->getReplyToken();
        $text = $event->getText();
        $bot->replyText($reply_token, $text);
    }
}

echo "OK";