<?php
#-----------------------------------------------------	#
# 	============DjAmol Group =============       		   	#
# 	 	    DjAmol Wap Script 														#
# 			E-mail : admin@djamol.com												#
# 			GTalk : djamolpatil@gmail.com										#
# 			Yahoo : djamolpatil@yahoo.com										#
# DjAmol Hosting Service SharedAnd Reseller Linux Host	#
#           http://host.djamol.com  										#
#-----------------------------------------------------	#
require 'moduls/ini.php';
require 'moduls/fun.php';
require 'moduls/connect.php';
$id = intval($_GET['id']);
$W = intval($_GET['W']);
$H = intval($_GET['H']);
// Получаем инфу о файле
$file_info = mysql_fetch_assoc(mysql_query('SELECT * FROM `files` WHERE `id` = '.$id));
if(!is_file($file_info['path'])){
die('File does not exist');
}
#############################DjAmolGroup######################
$path=$file_info['path'];

if(!empty($W) or !empty($H)){
$mov=&new ffmpeg_movie($path); 
$w=$mov->GetFrameWidth(); 
$h=$mov->GetFrameHeight(); 
if(!file_exists($cached)){ 
$frame=$mov->getFrame(10); 
if($frame){ 
$gd1 = $frame->toGDImage(); 
$gd2 = imagecreatetruecolor(100,100); 
imagecopyresampled($gd2, $gd1, 0,0,0,0, 100, 100, $w, $h); 
if($gd2){ 
header('Content-Type: image/jpeg'); 
imagejpeg($gd2); 
imagedestroy($gd1); 
imagedestroy($gd2); 
}
}
}
}
else {
echo'error';
}
?>
