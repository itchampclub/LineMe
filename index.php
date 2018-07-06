<?php
require_once __DIR__ . '/Linebot.php';
//require_once __DIR__ . '/function.php';

$bot = new Linebot();
$text = $bot->getMessageText();
$userid  = $bot->getUserID();
//$text = "Recipe Adventure Garb";
$arrtext = explode(" ", $text);
$lentext = count($arrtext);
$keytext = $arrtext[0];

//echo "<br>".$text;

if($lentext >= 1){
  if(strtolower($keytext) == "shuiyin"){
    //echo "<br>".$keytext;
    $bot->reply(file_get_contents('Info.txt'));
  }else if(strtolower($keytext) == "farming"){
    $arrayme = explode("\n", file_get_contents($keytext."/key.txt"));
    $num = array_search($text, $arrayme);
    echo "<br>".$num;
    $arrayme = explode("~~~", file_get_contents($keytext."/info.txt"));
    $result = $arrayme[$num];
   // echo "<br>".$result;
    $bot->reply($result);
  }else{
    $text    = strtolower($text);
    $keytext = strtolower($keytext);

    $arrayme = explode("\n", file_get_contents($keytext."/key.txt"));
    $num = array_search(str_replace($keytext." ","",$text), $arrayme);
    $arrayme = explode("\n", file_get_contents($keytext."/info.txt"));
    $arrtext = explode("\t",$arrayme[$num]);

    switch ($keytext) {
      case 'recipe':
        $result  = $arrtext[0]." [".$arrtext[1]."] [Lv ".$arrtext[2]." |Dif ".$arrtext[3]."]\n";
        $result .= "Materials: ".$arrtext[4]." ".$arrtext[5];
        $result .= if($arrtext[6]){", ".$arrtext[6]." ".$arrtext[7];}else{"";}
        $result .= if($arrtext[6]){", ".$arrtext[8]." ".$arrtext[9];}else{"";}
        $result .= if($arrtext[6]){", ".$arrtext[10]." ".$arrtext[11];}else{".";}

        if($num > 0){$bot->reply($result);}
        break;
      case 'quest':
        $result = "Quest Name: ".$arrtext[0];
        if($num > 0){$bot->reply($result);}
      default:
        break;
    }
  }
}

?>
