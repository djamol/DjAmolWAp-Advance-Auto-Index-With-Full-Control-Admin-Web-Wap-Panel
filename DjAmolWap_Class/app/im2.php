<?php
###############DjAmol Group###############
//   DjAmolwap 12v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############
 @$file = $_GET["pic"];
 @$heightfile = $_GET["H"];
 @$weightfile = $_GET["W"];
   if(preg_match("[http]",$file)) exit("Sorry");
  if(preg_match("[\.\.]",$file)) exit("Sorry");
  if(preg_match("[%]",$file)) exit("Sorry");
  if($heightfile > 500) exit('Sorry');
if($weightfile > 500) exit('Sorry');
  if(preg_match("[\.png]",$file) or preg_match("[\.PNG]",$file)) {
 $old = imagecreatefrompng("$file"); 
 } elseif(preg_match("[\.gif]",$file) or preg_match("[\.GIF]",$file))  {
  $old = imagecreatefromgif("$file"); 
  } elseif(preg_match("[\.jpg]",$file) or preg_match("[\.JPG]",$file)) {
  $old = imagecreatefromjpeg("$file"); 
  }   //Copy Right DjAmolGroup Inc
    elseif(preg_match("[\.jpeg]",$file) or preg_match("[\.JPEG]",$file)) {
  $old = imagecreatefromjpeg("$file"); 
  }
 $weight = imageSX($old); 
 $height = imageSY($old);
 if($heightfile) {
 $wn = $weightfile;
 $hn = $heightfile;
 } else {
$wn = 37;
$hn = 49;
}
$new =  imagecreatetruecolor($wn, $hn);
imageCopyResized($new, $old, 0, 0, 0, 0, $wn, $hn, $weight, $height);
Header("Content-type: image/jpeg");
imagejpeg($new); 

?>