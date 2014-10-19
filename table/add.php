<?php
###############DjAmol Group###############
//   DjAmolwap 12v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############
require '../moduls/ini.php';
require '../moduls/fun.php';
require '../moduls/connect.php';
require '../moduls/header.php';
###############Если стол выключен###############
if($setup['zakaz'] == 0) die('Not found');
##############djamolgroup inc##############
   $act = $_GET['act'];
   $name= $_POST['name'];
   $mail= $_POST["mail"];
   $msg= $_POST['msg'];
   $site= $_POST["site"];
   $submit= $_POST["submit"];
   
require_once "config.php";
require "antimat.php";
echo '<link rel="StyleSheet" type="text/css" href="../style.css">';
if($close=="yes") { echo "<font color=\"red\">Guestbook is closed for adding messages!</font><br>"; } else {  $ua=htmlspecialchars($_SERVER['HTTP_USER_AGENT']); $ip=htmlspecialchars($_SERVER['REMOTE_ADDR']); $dt=date("d.m.y H:i"); if(empty($act)) {  echo '<form action="add.php?act=add&amp;" method="POST"><br>Name (nickname): <font color="red">*</font><br><input type="text" name="name"><br>E-mail:<br><input type="text" name="mail"><br>Message: <font color="red">*</font><br><input type="text" name="msg"><br><input type="submit" name="submit" value="Submit"></form><p><font color="red">* </font> - Fields are required!<hr>'; echo '<div class="a">
<div class="i_bar_t"><a href="../table.php?">Advance orders</a></div>
<div class="i_bar_t"> <a href="../">Downloads</a></div>
<div class="i_bar_t"><a href="/">Home</a></div>'; } 
if($act=="add") { $ban=mysql_query("SELECT `ip`, `agent` FROM `bans`;"); 
while($prov=mysql_fetch_array($ban)) 
{ if( $ip==$prov['ip'] AND $ua==$prov['agent']) 
die("<font color=\"red\">You can not add a message in the guestbook! you ban?</font><br>"); } 
if(empty($name)) die("<font color=\"red\">Not put a name (nickname)!</font><br>");  
if(empty($msg)) die("<font color=\"red\">Not put a message!</font><br>"); 
if(isset($submit)) { 
if(isset($_POST["site"]) && $_POST["site"]!="") { 
if(eregi("[^0-9a-z\._-]",$site)) { 
echo'<font color="red">Do not put right site!<br></font>'; //djamol
exit(); } else { $url="http://$site"; } }  
if(isset($_POST["mail"]) && $_POST["mail"]!="") { 
if(!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i",$_POST["mail"])) { 
echo "<font color=\"red\">An incorrect E-mail!<br>Enter E-mail in the form<i>domen@mail.com</i></font><br>"; 
exit; } } $namelen=strlen($_POST['name']); 
if($namelen<3) 
die("<font color=\"red\">Too short name!</font><br>"); 
if($namelen>20) 
die("<font color=\"red\">Name is too long!</font><br>"); 
$msglen=strlen($_POST['msg']); 
if($msglen<6) 
die("<font color=\"red\">Too short message!</font><br>"); 
if($msglen>1024) 
die("<font color=\"red\">Message is too long!</font><br>"); 
$name=substr($_POST["name"],0,15); 
$site=substr($_POST["site"],0,60); 
$msg=substr($_POST["msg"],0,1024); 
$name=htmlspecialchars(stripslashes($name));  
$site=htmlspecialchars(stripslashes($site)); 
$msg=htmlspecialchars(stripslashes($msg)); 
$name=antimat($name); 
$msg=antimat($msg); 
$msg=str_replace("[b]","<b>",$msg); $msg=str_replace("[/b]","</b>",$msg); 
$msg=str_replace("[i]","<i>",$msg); $msg=str_replace("[/i]","</i>",$msg); 
$msg=str_replace("[u]","<u>",$msg); $msg=str_replace("[/u]","</u>",$msg); 
$msg=eregi_replace("(.*)\\[url\\](.*)\\[/url\\](.*)","\\1<a href=\\2>\\2></a>\\3",$msg); 
$q=mysql_query("SELECT msg FROM guest;"); 
while($anti=mysql_fetch_array($q)) { 
if($anti['msg']==$msg) 
die("<font color=\"red\">This message is already in the guest!</font><br>"); } 
$msg=str_replace("\r"," ",$msg); $msg=str_replace("\n"," ",$msg); 
$name=mysql_real_escape_string($name); $url=mysql_real_escape_string($url); 
$mail=mysql_real_escape_string($mail); $msg=mysql_real_escape_string($msg);  
$q="INSERT INTO guest VALUES ('','".addslashes($name)."','".addslashes($url)."','".addslashes($mail)."','".addslashes($msg)."','$ua','$ip','$dt','no');"; if(mysql_query($q)) { echo 'The report successfully added!<br><a href="../table.php">Further<a><br>'; } else { echo "<font color=\"red\">Error adding record!</font><br>"; } }  else { echo "<font color=\"red\">Button is not pressed!</font><br>"; exit; }  } } ?>
