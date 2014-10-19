<?
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
//-----------------------------------DjAmolGroup-------------------------------------------------------
$error = 0;
if(empty($_SESSION['autorise'])) $error = 1;
if($_SESSION['autorise']!= $setup['password']) $error = 1;
if(empty($_SESSION['ipu'])) $error = 1;
if($_SESSION['ipu']!=clean($ip)) $error = 1;
if($error==1) die($setup['hackmess']);
//-----------------------------------djamol.com-------------------------------------------------------
//
require_once "config.php"; 
echo '<link rel="stylesheet" type="text/css" href="../style.css">'; 
if(empty($act)) { echo '<div class="title">Are you sure?</div><br>'; 
echo '<a href="alldel.php?act=alldel&amp;">Yes</a> | <a href="guest.php">No</a><br>'; 
include_once "foot.php"; } if($act=="alldel") {
$q=mysql_query("TRUNCATE TABLE `guest`;"); if($q) { echo 'Comments successfully cleaned!<br><a href="guest.php">Further</a><br>'; } else { echo "<font color=\"red\">Request Failed!</font><br>"; }  } ?>
