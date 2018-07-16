<?php
require_once __DIR__ . '/Linebot.php';
//require_once __DIR__ . '/function.php';

$bot = new Linebot();
$text = $bot->getMessageText();
$userid  = $bot->getUserID();
$userid  = "U08b392c8b5b02d5c2605b02b94186104";
$result = $bot->getUserProfile();
echo "Result Get User Profile:";
echo "<br>".$result;

$bot->pushText($userid,$result);
$arrtext = explode(" ", $text);
$lentext = count($arrtext);
$keytext = $arrtext[0];

//echo "<br>".$text;
//echo "<br>".$keytext;

if($lentext >= 1){
  if(strtolower($keytext) == "shuiyin"){
    //echo "<br>".$keytext;
    if(strtolower($text) == "shuiyin help"){$bot->reply(file_get_contents('Info.txt'));}else{
      $arrayme = explode("\n", file_get_contents("shuiyin/key.txt"));
      $num = array_search($text, $arrayme);
      $arrayme = explode("\n", file_get_contents("shuiyin/info.txt"));
      $result = $arrayme[$num];
      $bot->reply($result);
    }
  }else{
    $text    = strtolower($text);
    $keytext = strtolower($keytext);

    switch ($keytext) {
      case 'recipe':
        $arrayme = explode("\n", file_get_contents("recipe/key.txt"));
        $num = array_search(str_replace($keytext." ","",$text), $arrayme);
        $arrayme = explode("\n", file_get_contents("recipe/info.txt"));
        $arrtext = explode("\t",$arrayme[$num]);

        $result  = $arrtext[0]." [".$arrtext[1]."] [Lv ".$arrtext[2]." |Dif ".$arrtext[3]."]\n";
        $result .= "Materials: \n".$arrtext[4]." ".$arrtext[5];
        if($arrtext[6]  != "-" && $arrtext[6]  != ""){$result .= "\n".$arrtext[6] ." ".$arrtext[7];}
        if($arrtext[8]  != "-" && $arrtext[8]  != ""){$result .= "\n".$arrtext[8] ." ".$arrtext[9];}
        if($arrtext[10] != "-" && $arrtext[10] != ""){$result .= "\n".$arrtext[10]." ".$arrtext[11];}
        //
        if($num > 0){$bot->reply($result);}
        break;
      case 'item':
        break;
      case 'farm':
      case 'farming':
        $arrayme = explode("\n", file_get_contents("farming/key.txt"));
        $num = array_search($text, $arrayme);
        $arrayme = explode("~~~", file_get_contents("farming/info.txt"));
        $result = $arrayme[$num];
        $bot->reply($result);
        break;
      case 'lvling':
        $arrayme = explode("\n", file_get_contents("lvling/key.txt"));
        $num = array_search(str_replace($keytext." ","",$text), $arrayme);
        $arrayme = explode("\n", file_get_contents("lvling/info.txt"));
        $arrtext = explode("\t",$arrayme[$num]);

        if($num >= 1 && $num <= 160){
          $result = "";
          for ($i = 1; $i < count($arrtext) ; $i++) {$result .= $arrtext[$i]; if($i <= count($arrtext)-1){$result .= "\n";}}

          $bot->reply($result);
        }else if($num >= 161){
          $result = "Wait For Next Update.";
          $bot->reply($result);
        }
        break;
      case 'quest':
        $result = "Quest Name: ".$arrtext[0];
        if($num > 0){$bot->reply($result);}
        break;
      default:
        $arrayme = explode("\n", file_get_contents("shuiyin/key.txt"));
        $num = array_search(strtolower($text), $arrayme);
        $arrayme = explode("\n", file_get_contents("shuiyin/info.txt"));
        $result = $arrayme[$num];
        $bot->reply($result);  
        break;
    }
  }
}
date_default_timezone_set("Asia/Jakarta");
$date = "2018-07-26 23:00:00";
$numdate = date("d-m-Y H:i:s",strtotime($date)) - date("d-m-Y H:i:s");
while($numdate >= date("d-m-Y H:i:s")){
   if(date("i:s") == "00:00"){$bot->reply("Important Announcement.");
  $temp2 = strval(intval(substr($time,2))+1);
}
?>
