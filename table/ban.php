<?php 
/*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*.*/
###############DjAmol Group###############
//   DjAmolwap 12v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############
list($msec,$sec)=explode(chr(32),microtime());
$HeadTime=$sec+$msec;
include '../moduls/ini.php';
session_name ('SID') ;
session_start() ;
include '../moduls/fun.php';
include '../moduls/connect.php';
include '../moduls/header.php';
//-----------------------DjAmolGroup-------------------------------------------------------------------
$error = 0;
if(empty($_SESSION['autorise'])) $error = 1;
if($_SESSION['autorise']!= $setup['password']) $error = 1;
if(empty($_SESSION['ipu'])) $error = 1;
if($_SESSION['ipu']!=clean($ip)) $error = 1;
if($error==1) die($setup['hackmess']);
//-------------------------------------------------twitter.com/djamol-----------------------------------------
//
require_once "config.php"; 
echo '<link rel="stylesheet" type="text/css" href="../style.css">'; 
$_GET['id']=$id; $q=mysql_query("SELECT `ip`, `ua` FROM `guest` WHERE `id`='".(int)$id."' LIMIT 1;"); $bans=mysql_fetch_array($q); $ip=$bans['ip']; $ua=$bans['ua']; $prov=mysql_query("SELECT `ip`, `agent` FROM `bans` WHERE `ip`='".$ip."' AND `agent`='".$ua."';"); if(mysql_num_rows($prov) !=0) {  die("<font color=\"red\">Such a ban already exists in the database!</font><br>"); } $query=mysql_query("INSERT INTO `bans` VALUES ('$id', '$ip', '$ua')"); if($query) { echo 'User has successfully banned!<br><a href="guest.php">Further</a><br>';} else { echo '<font color="red">Request Failed!</font><br>'; } 
?>
