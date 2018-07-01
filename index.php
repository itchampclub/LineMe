<?php
require __DIR__ . '/vendor/autoload.php';
 
use \LINE\LINEBot;
use \LINE\LINEBot\HTTPClient\CurlHTTPClient;
use \LINE\LINEBot\MessageBuilder\MultiMessageBuilder;
use \LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use \LINE\LINEBot\MessageBuilder\StickerMessageBuilder;
use \LINE\LINEBot\MessageBuilder\ImageMessageBuilder;
use \LINE\LINEBot\MessageBuilder\AudioMessageBuilder;
use \LINE\LINEBot\MessageBuilder\VideoMessageBuilder;
use \LINE\LINEBot\SignatureValidator as SignatureValidator;
 
// set false for production
$pass_signature = true;
 
// set LINE channel_access_token and channel_secret
$channel_access_token = "qok5zfpttYHz+w4qJHwQ2/0BHGHvgH6Lc8umSfLZIhpOTmI2Dg1qAbwYO3qcyBzvcAJFpSa3sOD9xthTRiBVWdW+B/6t2sJ7iNHEa2IdOSGB4ntwOat/9nXE/rX9cbaF0L4yOIkWghAZAgX7R6wylwdB04t89/1O/w1cDnyilFU=";
$channel_secret = "e1a8ccfacec550e50fd32a335eb13930";
$channel_id = "1591176021";
 
// inisiasi objek bot
$httpClient = new CurlHTTPClient($channel_access_token);
$bot = new LINEBot($httpClient, ['channelSecret' => $channel_secret]);
 
$configs =  [
    'settings' => ['displayErrorDetails' => true],
];
$app = new Slim\App($configs);
 
// buat route untuk url homepage
$app->get('/', function($req, $res)
{
  echo "Welcome at Slim Framework";
});
 
// buat route untuk webhook
$app->post('/', function ($request, $response) use ($bot, $pass_signature)
{
    // get request body and line signature header
    $body        = file_get_contents('php://input');
    $signature = isset($_SERVER['HTTP_X_LINE_SIGNATURE']) ? $_SERVER['HTTP_X_LINE_SIGNATURE'] : '';
 
    // log body and signature
    file_put_contents('php://stderr', 'Body: '.$body);
 
    if($pass_signature === false)
    {
        // is LINE_SIGNATURE exists in request header?
        if(empty($signature)){
            return $response->withStatus(400, 'Signature not set');
        }
 
        // is this request comes from LINE?
        if(! SignatureValidator::validateSignature($body, $channel_secret, $signature)){
            return $response->withStatus(400, 'Invalid signature');
        }
    }
 
    // kode aplikasi nanti disini
  $data = json_decode($body, true);
  if(is_array($data['events'])){
      foreach ($data['events'] as $event)
      {
          if ($event['type'] == 'message')
          {
              if($event['message']['type'] == 'text')
              {
                  // send same message as reply to user
                  //$result = $bot->replyText($event['replyToken'], $event['message']['text']);
                  // or we can use replyMessage() instead to send reply message
                  $result = $bot->replyText($replyToken, 'ini pesan balasan');
                  // $textMessageBuilder = new TextMessageBuilder($event['message']['text']);
                  // $result = $bot->replyMessage($event['replyToken'], $textMessageBuilder);
   
                  return $response->withJson($result->getJSONDecodedBody(), $result->getHTTPStatus());
              }
          }
      }
  }
});

$app->run();