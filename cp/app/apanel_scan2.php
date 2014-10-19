<?php

set_time_limit(99999999);
ignore_user_abort(1);
###############DjAmol Group###############
//   DjAmolwap 14v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############
list($msec,$sec)=explode(chr(32),microtime());
$HeadTime=$sec+$msec;
include 'moduls/ini.php';
session_name('SID') ;
session_start() ;
include 'moduls/fun.php';
include 'moduls/connect.php';
//
$error = false;

if($_SESSION['autorise'] != $setup['password']){
$error = true;
}

if($_SESSION['ipu'] != clean($ip)){
$error = true;
}

if($error){
die($setup['hackmess']);
}

$id = intval($_GET['id']);

if(!$id){
$d['path'] = $setup['path'].'/';
}
else{
$d = mysql_fetch_assoc(mysql_query('SELECT `path` FROM `files` WHERE `id` = '.$id.' LIMIT 1'));
}
if(!is_dir($d['path'])) $d['path'] = $setup['path'].'/';
$path1=$d['path'];
//DjAmolGroup Inc
$currtime = time();
$addfolder = $addfiles = $addfilesbad = 0;

$reses = mysql_query('SELECT `id`,`path` FROM `files`;');
while($arr = mysql_fetch_row($reses)){
$array_path[$arr[0]] = $arr[1];
}

function scaner($path1)
{
static $f_arr;

chmod($path,0777);
//DjAmolGrouP INc
$arr = glob($path1.'*');

foreach($arr as $vv){

if(is_dir($vv)){
$f_arr[] = $vv.'/';
###############DjAmol Group###############
}
else{
if(basename($vv)=='folder.png'){
continue;
}
else{
$f_arr[] = $vv;
}
}
}
###############DjAmol Group###############
//   DjAmolwap 14v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############
return $f_arr;
}

$file_array = scaner($path1);

$upltime = time();
foreach($file_array as $value){
if(!in_array($value,$array_path))
{
//$upltime = filectime($value);
$pathinfo = pathinfo($value);
$name = str_replace('.'.$pathinfo['extension'],'',basename($value));
$infolder = dirname($value).'/';
$size = filesize($value);
###############DjAmol Group###############
//      http://ai.djamol.com            //
###############DjAmol Group###############
if(is_dir($value) AND preg_match('|([а-яА-Я]+)|',$name)==False){
if(strpos($name , '!') !== false){
$name = trans($name);
}
else{
$name = trans2($name);
}
mysql_query("INSERT INTO `files` (`path`, `name`, `infolder`, `timeupload`, `loads`, `yes` ) VALUES ('$value', '*".$name."', '$infolder', '9999999999', '9999999999', '9999');");
$addfolder++;
}
elseif(preg_match('|([а-яА-Я]+)|',$name)==False){
if(strpos($name , '!') !== false){
$name = trans($name);
}
else{
$name = trans2($name);
}
mysql_query("INSERT INTO `files` (`path`, `name`, `infolder`, `size` , `timeupload`) VALUES ('$value', '$name', '$infolder' , '$size' , '$upltime');");
$addfiles++;
}
else $addfilesbad++;
}
}

###############DjAmol Group###############
//   DjAmolwap 12v                      //
###############DjAmol Group###############
include 'moduls/header.php';
echo '<div class="menu">Database successfully updated!</div><div class="row">Added folders: '.$addfolder.' <br>';
echo'Added files: '.$addfiles.'<br>'; 
if ($addfilesbad>0) echo 'DjAmolGroupINc:'.$addfilesbad.'<br>';
if($id) echo '<div class="a"><a href="admin.php?cp=ipanel2&id=3">update folder</a></div>';
echo'<div class="menu">update the files in the folder,<br><a href="admin.php?cp=ipanel2">File Manager</a></div>';
###############DjAmol Group###############
//      http://ai.djamol.com            //
###############DjAmol Group###############

print '<div class="a"><a href="apanel.php">Admin cp</a></div>';
?>