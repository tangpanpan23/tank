<?php
class CuteCrawler{
public function getContentByFopen($url){
 $file = fopen($url, "r");
 $content = " ";
 if($file){
 while(($buffer = fgets($file,10240)) != false ){
  $content = $content.$buffer;
 }
 fclose($file);
 }

return $content;
}

}

$url = "http://www.baidu.com/";
$CuteCrawler = new CuteCrawler;
$content = $CuteCrawler->getContentByFopen($url);
  
var_dump($content);
?>