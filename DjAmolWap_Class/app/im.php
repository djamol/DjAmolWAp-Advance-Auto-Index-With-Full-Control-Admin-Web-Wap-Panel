<?php
###############DjAmol Group###############
//   DjAmolwap 12v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############
require 'moduls/ini.php';
require 'moduls/connect.php';
//DjAmol
header('Content-type: image/jpeg');

$W = intval($_GET['W']);
$H = intval($_GET['H']);
$id = intval($_GET['id']);

$file_info = mysql_fetch_row(mysql_query('SELECT TRIM(`path`) FROM `files` WHERE `id` = '.$id.' LIMIT 1'));
$pic = urldecode(htmlspecialchars($file_info[0]));  //DjAmolGroup

if(substr($pic,0,1) != '.'){

if(preg_match('/\.gif$/i', $pic)){$old = imageCreateFromGif($pic);}
elseif(preg_match('/\.jpg$|\.jpeg$|\.jpe$/i', $pic)){$old = imageCreateFromJpeg($pic);}
elseif(preg_match('/\.png$/i', $pic)){$old = imageCreateFromPNG($pic);}
{
$wn = imageSX($old);
$hn = imageSY($old);
$prew = 1;
if(!$W and !$H)
{
$prew = 0;
$size = explode('*',$setup['prev_size']);
$W = round(intval($size[0])); // DjAmol.Com
$H = round(intval($size[1])); // Twitter@djamol
}
$new = imageCreateTrueColor($W, $H);
imageCopyResampled($new, $old, 0, 0, 0, 0, $W, $H, $wn, $hn);

if($setup['marker'] && $prew){
// фон
$bg = imagecolorallocate($new, 255, 255, 255);
// цвет
$color = imagecolorallocate($new, 200, 200, 200);

imagestring($new, 2, ($W/2)-(strlen($setup['text_marker'])*3), 1, $setup['text_marker'], $color);
}
###############DjAmol Group###############
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############
imageJpeg($new,null,100);
if($_GET['bab']==1)
echo'';
else
{
mysql_query('UPDATE `files` SET `loads`=`loads`+1, `timeload`='.$time.' WHERE `id`='.$id);
}
}
}
?>