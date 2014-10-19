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
//-------------------------------------------------------Djamol-----------------------------------
$error = 0;
if(empty($_SESSION['autorise'])) $error = 1;
if($_SESSION['autorise']!= $setup['password']) $error = 1;
if(empty($_SESSION['ipu'])) $error = 1;
if($_SESSION['ipu']!=clean($ip)) $error = 1;
if($error==1) die($setup['hackmess']);
//---------------------------------------ai.djamol.com---------------------------------------------------
//
$act=$_GET['act'];
require_once "config.php"; 
echo '<link rel="stylesheet" type="text/css" href="../style.css">';  
if(empty($act)) { $id=$_GET['id']; $start=$_GET['start']; $q=mysql_query("SELECT * FROM `guest` WHERE `id`='".$id."' LIMIT 1;"); if($q) { $guest=mysql_fetch_array($q); } else { echo '<font color="red">Request Failed!</font><br>'; } echo ' <form action="edit.php?act=edit&amp;" method="POST">Name (nickname):<br><input type="text" name="name" value="'.$guest['name'].'"><br>Message:<br><input type="text" name="msg" value="'.$guest['msg'].'"><br>Site:<br><input type="text" name="url" value="'.$guest['url'].'"><br>E-mail:<br><input type="text" name="mail" value="'.$guest['mail'].'"><br>Quick Reply:<br><input type="text" name="otvet" ><br>Link to ordered in file :<br><input type="text" value="http://" name="otvet1" ><input type="hidden" name="id" value="'.$id.'"><br><input type="hidden" name="start" value="'.$start.'"><input type="submit" value="submit!"></form>'; include_once "foot.php"; }  
if($act=="edit") 
{
 $tarakan=strlen($_POST["otvet1"]);
 if($tarakan==0)
 echo'';
 else
 $otvet1='<a href="'.$_POST["otvet1"].'"><font color="red"> '.$_POST["otvet1"].'</font></a>';
 $q=mysql_query("UPDATE `guest` SET `name`='".$_POST['name']."', `url`='".$_POST['url']."', `mail`='".$_POST['mail']."', `msg`='".$_POST["msg"]."', `otvet`='".$_POST["otvet"]."".$otvet1."' WHERE `id`='".$_POST["id"]."' LIMIT 1;"); if($q) { echo 'Message edited successfully!<br><a href="guest.php">Further</a><br>'; } else { echo '<font color="red">Request Failed!</font><br>'; } } 
?>
