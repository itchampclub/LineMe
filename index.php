<?php
require_once __DIR__ . '/Linebot.php';
//require_once __DIR__ . '/function.php';

$bot = new Linebot();
$text = $bot->getMessageText();
$userid  = $bot->getUserID();
$text = "Recipe Adventure Garb";
$arrtext = explode(" ", $text);
$lentext = count($arrtext);
$keytext = $arrtext[0];

//echo "<br>".$text;

if($lentext >= 1){
  if(strtolower($keytext) == "shuiyin"){
    //echo "<br>".$keytext;
    $bot->reply(file_get_contents('Info.txt'));
  }else if(strtolower($keytext) == "recipe"){
    $arrayme = explode("\n", file_get_contents(strtolower($keytext)."/key.txt"));
    $num = array_search(str_replace($keytext." ","",$text), $arrayme);
    echo "<br>".str_replace($keytext." ","",$text);
    $arrayme = explode("\n", file_get_contents(strtolower($keytext)."/info.txt"));
    $arrtext = explode("\t",$arrayme[$num]);
    echo "<br>".$arrayme[$num];
    $result = $arrtext[0]." [".$arrtext[1]."] [Lv ".$arrtext[2]." |Dif ".$arrtext[3]."]";
    echo "<br>".$result;
    $bot->reply($result);
  }else{
    $arrayme = explode("\n", file_get_contents($keytext."/key.txt"));
    $num = array_search($text, $arrayme);
    echo "<br>".$num;
    $arrayme = explode("~~~", file_get_contents($keytext."/info.txt"));
    $result = $arrayme[$num];
    echo "<br>".$result;
    $bot->reply($result);
  }
}

?>
