<?php

class Setting{
  public function getChannelAccessToken(){
    $channelAccessToken = "qok5zfpttYHz+w4qJHwQ2/0BHGHvgH6Lc8umSfLZIhpOTmI2Dg1qAbwYO3qcyBzvcAJFpSa3sOD9xthTRiBVWdW+B/6t2sJ7iNHEa2IdOSGB4ntwOat/9nXE/rX9cbaF0L4yOIkWghAZAgX7R6wylwdB04t89/1O/w1cDnyilFU=";
    Return $channelAccessToken;
  }
  public function getChannelSecret(){
    $channelSecret = "e1a8ccfacec550e50fd32a335eb13930";
    Return $channelSecret;
  }
  public function getApiReply(){
    $api = "https://api.line.me/v2/bot/message/reply";
    Return $api;
  }
  public function getApiPush(){
    $api = "https://api.line.me/v2/bot/message/push";
    Return $api;
  }
  
}

?>
