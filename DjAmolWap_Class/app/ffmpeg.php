<?php
###############DjAmol Group###############
//   DjAmolwap 12v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############



require '../../moduls/ini.php';
require '../../moduls/connect.php';

//header('Content-type: image/gif');
###############DjAmol Group###############
$W = intval($_GET['W']);
$H = intval($_GET['H']);
$id = intval($_GET['id']);

$file_info = mysql_fetch_row(mysql_query('SELECT TRIM(`path`) FROM `files` WHERE `id` = '.$id.' LIMIT 1'));
$pic = urldecode(htmlspecialchars($file_info[0]));

if(substr($pic,0,1) != '.'){

$mov = new ffmpeg_movie($pic, false);
$wn = $mov->GetFrameWidth();
$hn = $mov->GetFrameHeight();

$frame = $mov->getFrame(3);

$gd = $frame->toGDImage();

if(!$W and !$H)
{  //DjAmolGroup Inc
$size = explode('*',$setup['prev_size']);
$W = round(intval($size[0])); // width of the image
$H = round(intval($size[1])); // height image
}
$new = imageCreateTrueColor($W, $H);
imageCopyResized($new, $gd, 0, 0, 0, 0, $W, $H, $wn, $hn);
imageGif($new,null,100);

}
?>