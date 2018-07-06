<?php

function askSriend($ID,$Text,$Num){
  $bot->reply(file_get_contents('Info.txt'));
}

function askFarming($Text,$Num){
    if($Num == 1){
      $result = file_get_contents(Text."/key.txt");
    }else{
      // Get Key
      $arrayme = explode("\n", file_get_contents(Text."/key.txt"));
      $num = array_search($text, $arrayme);
      // Get Content
      $arrayme = explode("~~~", file_get_contents(Text."/info.txt"));
      $result = $arrayme[$num];
    }
    $bot->reply($result);  
}
