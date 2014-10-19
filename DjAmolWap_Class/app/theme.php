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

//DjAmol.Com Echo
$id = intval($_GET['id']);
$W = intval($_GET['W']);
$H = intval($_GET['H']);

$file_info = mysql_fetch_row(mysql_query('SELECT TRIM(`path`), LOWER(RIGHT(`path`,4)) FROM `files` WHERE `id` = '.$id.' LIMIT 1'));
$theme = urldecode(htmlspecialchars($file_info[0]));
$type = $file_info[1];

$name = $setup['tpath'].'/'.basename($theme).'.gif';

if(file_exists($name)){
header('Location: '.$name, true, 301);
exit;
}


$size = explode('*',$setup['prev_size']);
if($W AND $H)
{
$g_preview_image_w = $H;
$g_preview_image_h = $H;
}
else
{
$g_preview_image_w = 100; // ширина картинки
$g_preview_image_h = 100; // высота картинки
}
//Php Department http://ai.djamol.com
if($type == '.nth'){
include '../../moduls/pclzip.lib.php';

$nth = &new PclZip($theme);
$content = $nth->extract(PCLZIP_OPT_BY_NAME,'theme_descriptor.xml',PCLZIP_OPT_EXTRACT_AS_STRING);

$teg = simplexml_load_string($content[0]['content'])->wallpaper['src'] or $teg = simplexml_load_string($content[0]['content'])->wallpaper['main_display_graphics'];
$image = $nth->extract(PCLZIP_OPT_BY_NAME, trim($teg), PCLZIP_OPT_EXTRACT_AS_STRING);

$im = array_reverse(explode('.',$teg));
$im = 'imageCreateFrom'.str_ireplace('jpg','jpeg',trim($im[0]));

file_put_contents($name,$image[0]['content']);
$f = $im($name);

$h = imagesy($f);
$w = imagesx($f);

$ratio = $w/$h;
if($g_preview_image_w/$g_preview_image_h > $ratio){
$g_preview_image_w = $g_preview_image_h*$ratio;
}
else{
$g_preview_image_h = $g_preview_image_w/$ratio;
}
//PHp Ai.djamol.Com

$new = imagecreatetruecolor($g_preview_image_w, $g_preview_image_h);
imagecopyresampled($new, $f, 0, 0, 0, 0, $g_preview_image_w, $g_preview_image_h, $w, $h);

imageGif($new, $name, 100);
}
elseif($type == '.thm'){
include '../../moduls/tar.php';

$thm = &new Archive_Tar($theme);
$deskside_file = $thm->extractInString('Theme.xml');
$load = simplexml_load_string($deskside_file)->Standby_image['Source'] or $load = simplexml_load_string($deskside_file)->Desktop_image['Source'] or $load = simplexml_load_string($deskside_file)->Desktop_image['Source'];
$image = $thm->extractInString(trim($load));

$im = array_reverse(explode('.',$load));
$im = 'imageCreateFrom'.str_ireplace('jpg','jpeg',trim($im[0]));

file_put_contents($name,$image);
$f = $im($name);

$h = imagesy($f);
$w = imagesx($f);
//http://djamol.com
$ratio = $w/$h;
if($g_preview_image_w/$g_preview_image_h > $ratio){
$g_preview_image_w = $g_preview_image_h*$ratio;
}
else{
$g_preview_image_h = $g_preview_image_w/$ratio;
}


$new = imagecreatetruecolor($g_preview_image_w, $g_preview_image_h);
imagecopyresampled($new, $f, 0, 0, 0, 0, $g_preview_image_w, $g_preview_image_h, $w, $h);

imageGif($new, $name, 100);
}


header('Location: '.$name, true, 301);
?>