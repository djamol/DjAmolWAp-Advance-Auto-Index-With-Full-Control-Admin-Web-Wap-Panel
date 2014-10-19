<?php
###############DjAmol Group###############
//   DjAmolwap 12v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############
require 'config.php';
require 'app/modset.php';
require 'app/ad.php';
$Class = "DjAmolWap_Class/";
$link = mysql_connect($SERVERmysql, $DB_USER, $DB_PASS) or die('Could not connect Please<br> <a href="install.php">Install Now</a>');
$db_id = mysql_select_db($DB, $link) or die('Could not db<br> <a href="install.php">Install Now</a>');
$charset = mysql_query('SET NAMES `utf8`');
//DjAmolGrou Inc
if($_SERVER['HTTP_X_FORWARDED_FOR']){
$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
}
else if($_SERVER['HTTP_CLIENT_IP']){
$ip=$_SERVER['HTTP_CLIENT_IP'];
}
else if($_SERVER['REMOTE_ADDR']){
$ip=$_SERVER['REMOTE_ADDR'];
}  //djamol

$time = time();
$setting = mysql_query('SELECT * FROM `setting`;');

while($set = mysql_fetch_assoc($setting)){
$setup[$set['name']] = $set['value'];
}
//DjAmol
$hackmess = $setup['hackmess'];
?>