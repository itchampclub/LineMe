<?php

class Setting{
  public function getChannelAccessToken(){
    $channelAccessToken = "1B8pMUtZdLgdebgTuRrxV3YirCQv91mbXGnxvlTbX7Cxn471Fs0bBgwGVpedxnPKm7tZUWxnMrT2NqCBCLAG8L7r6vtYoZwb3iqRvYr3BZGrZX/mRNFG8lzNbLr5CHO4PWfTicerD5PVHYjC8mpQ4wdB04t89/1O/w1cDnyilFU=";
    Return $channelAccessToken;
  }
  public function getChannelSecret(){
    $channelSecret = "69b2d81ee6e8ff48d2cacdc8c7d8c337";
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
  /*
  // Post
  public function getAccessToken(){
    $api = "https://api.line.me/v2/oauth/accessToken";
    return $api;
  }
  public function getRevoke(){
    $api = "https://api.line.me/v2/oauth/revoke";
    return $api;
  }
  public function getMulticast(){
    $api = "https://api.line.me/v2/bot/message/multicast";
    return $api;
  }
  // Get
  public function getMessage($messageId){
    $api = "https://api.line.me/v2/bot/message/".$messageId."/content";
    return $api;
  }
  public function getGroupUser($groupId,$userId){
    $api = "https://api.line.me/v2/bot/group/".$groupId."/member/".$userId;
    return $api;
  }
  public function getGroupMemberId($groupId){
    $api = "https://api.line.me/v2/bot/group/".$groupId."/members/ids";
    return $api;
  }
  public function getLeaveRequest($groupId){
    $api = "https://api.line.me/v2/bot/group/".$groupId."/leave";
    return $api;
  }
  public function getRoomUserProfile($roomId,$userId){
    $api = "https://api.line.me/v2/bot/room/".$roomId."/member/".$userId;
    return $api;
  }
  */
  
}

?>
