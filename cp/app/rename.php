<?php
###############DjAmol Group###############
//   DjAmolwap 12v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############

list($msec,$sec)=explode(chr(32),microtime());
$HeadTime=$sec+$msec;
include 'moduls/ini.php';
session_name ('SID') ;
session_start() ;
include 'moduls/fun.php';
include 'moduls/connect.php';
include 'moduls/header.php';
//twitter.com/djamol
//DjAmolGroup
$id = intval($_GET['id']);


//  twitter.com/djamol


mysql_query('UPDATE `loginlog` SET `time`="", `access_num`=0 WHERE `id` = 1;');
$all = mysql_fetch_row(mysql_query('SELECT COUNT(`id`) FROM `loginlog`;'));
if($all[0] > 21)
{
$min = mysql_fetch_row(mysql_query('SELECT MIN(`id`) FROM `loginlog` WHERE `id` > 1;'));
$query = mysql_query('DELETE FROM `loginlog` WHERE `id` = '.$min[0]);
}
####################DjAmol.Com###############################
$error = 0;
if(empty($_SESSION['autorise'])) $error = 1;
if($_SESSION['autorise']!= $setup['password']) $error = 1;
if(empty($_SESSION['ipu'])) $error = 1;
if($_SESSION['ipu']!=clean($ip)) $error = 1;
if($error==1) die($setup['hackmess']);


if(!($_POST[papka]))
{
echo("<b><br>Mass renaming files</b><p>");
echo('<form action="cp/app/rename.php" method="post">
Folder with files:<br>(example files /! kartinki / kotiki)<br><input type=text name=papka value=files/!><p>
Your website :<br><input type=text name=url maxlength=20 size=21><p><!--DjAmolGroup Inc. (WwW.DjAmol.Com)-->
Prefix (img_) :<br><input type=text name=pered maxlength=20 size=21 value=Text_><p>
<input type=submit value=Accept!><br>
<br><b><a href="apanel.php"><<<Back</a><br/></b>');
}
else
{


$dir=$_POST[papka];
if(!($panika=@opendir($dir)))
die('No such folder<br><b><a href="cp/app/rename.php"><<<Back</a><br/></b>');

function my_rename($dirname) 
{ //DjAmolGroup Inc. (WwW.DjAmol.Com)
   
    $s=strlen($_POST[url]);
    $s=$s+5;
    $kol=strlen($_POST[pered]);
    $nomer=$s+$kol;
    $ext_arr = array('jpeg', 'jpg', 'gif', 'txt', 'gif'); 
    $dir = opendir($dirname); 
    $count = 1; 
    while (($file = readdir($dir)) !== false) { 
     $bexa=strlen($count);
     $bumer=$nomer+$bexa-4;                         //DjAmolGroup Inc. (WwW.DjAmol.Com)//
        if (is_file($dirname . '/' . $file)) { 
            $info = pathinfo($dirname . '/' . $file); 
            if (in_array(strtolower($info['extension']), $ext_arr)) { 
                rename($dirname . '/' . $file, $dirname . '/' . str_pad($count, $bumer , "$_POST[pered]$_POST[url]_", STR_PAD_LEFT) . '.' . strtolower($info['extension'])); 
                $count ++ ; 
            } 
        } elseif (is_dir($dirname . '/' . $file) && $file != '.' && $file != '..')my_rename($dirname . '/' . $file); 
    } 
    closedir($dir); 
} 
if($_POST[papka])
{
$dir="$_POST[papka]";
my_rename("$dir"); 
print("Rename completed");
}}
?>