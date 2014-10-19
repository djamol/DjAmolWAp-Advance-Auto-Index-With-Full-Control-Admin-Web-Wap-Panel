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
//---------------------Twitter@djamol---------------------------------------------------------------------
$error = 0;
if(empty($_SESSION['autorise'])) $error = 1;
if($_SESSION['autorise']!= $setup['password']) $error = 1;
if(empty($_SESSION['ipu'])) $error = 1;
if($_SESSION['ipu']!=clean($ip)) $error = 1;
if($error==1) die($setup['hackmess']);
//----------------------Youtube@DjAmolOfficial--------------------------------------------------------------------
//
require_once "config.php"; 
echo '<link rel="stylesheet" type="text/css" href="../style.css">'; 
$q=mysql_query("DELETE FROM `guest` WHERE `id`='".(int)$_GET["id"]."' LIMIT 1;"); if($q) { echo 'Post successfully deleted!<br><a href="guest.php">Further</a><br>';} else { echo '<font color="red">Request Failed!</font><br>'; } 
?>
