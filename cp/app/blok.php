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
session_start();
include 'moduls/fun.php';
include 'moduls/connect.php';
include 'moduls/header.php';
//DjAmolgroup Inc
$error = 0;
if(empty($_SESSION['autorise'])) $error = 1;
if($_SESSION['autorise']!= $setup['password']) $error = 1;
if(empty($_SESSION['ipu'])) $error = 1;
if($_SESSION['ipu']!=clean($ip)) $error = 1;
if($error==1) die($setup['hackmess']);
//DjAmolGroup Inc
$action = intval($_GET['action']);


                // DjAmolGroup Inc
if ($action)
{
 switch($_GET['action'])
 {
###############Wap.DjAmol.Com
  case '1':
  if($_POST['topath'])
{
   $name32=$_POST['topath'];
  	$name32=str_replace('files/','',$name32);
  		$name32=str_replace('/',';',$name32);
  			$name32=str_replace('_',' ',$name32);
  				if (is_file('razdely/'.$name32.'.dat')) //если раздел создан
	{
  echo 'By section already banned<br/>';
  }
  else
  {
  if ($_POST['kod1'])
  {
  $icon='<img align="middle" src="'.$_POST['kod1'].'"> ';
  }
  			 /////////////DjAmol.Com/////////////
$fp = fopen('razdely/'.$name32.'.dat',"a+"); //ai.djamol.com
flock ($fp,LOCK_EX);
fputs($fp,''.$icon.'<b>'.$_POST['kod'].'</b>');
fflush ($fp);
flock ($fp,LOCK_UN);
fclose($fp);
$file=file('razdely/'.$name32.'.dat');
$i = count($file);
echo 'Access closed successfully'; 
}
print '<div class="a"><a href="blok.php?action=1">Back</a></div>';
print '<div class="a"><a href="apanel.php">Admin</a></div>';
        ///////////////DjAmolGroup Inc////////////
}
else
{
$dirs = mysql_query("SELECT `path` FROM `files` WHERE `size` = '0';");
print '<form action="'.$_SERVER['PHP_SELF'].'?action=1" method="post">
<div>
Select folder<br> to which would be barred<font color="red">*</font><br>
<select class="buttom" size="1" width="70" name="topath"><option value="'.$setup['path'].'/">./</option>';
while($item = mysql_fetch_array($dirs))
{

$name = str_replace($setup['path'].'/','',$item['path']);
$path = explode('/',$name);
$option = '';
unset($path[sizeof($path)-1]);
foreach($path as $value)
{
if(strpos($value , '!') !== false) $name = trans($value); else $name = $value;
$option = $option.$name.'/';
}
echo '<option value="'.$item['path'].'">'.$option.'</option>';
}

echo '</select>
<input type="submit" value="Close"/>

</div>';
print '<div class="a"><a href="smsrazdel.php?action=2">Edit</a></div>';
print '<div class="a"><a href="apanel.php">Admin</a></div>';
}
 
  break;

####################DjAmolGroup Inc
  case '4':
  if($_POST['topath'])
{
   $name32=$_POST['topath'];
  	$name32=str_replace('files/','',$name32);
  		$name32=str_replace('/',';',$name32);
  			$name32=str_replace('_',' ',$name32);
  				if (is_file('razdely/'.$name32.'1.dat')) //Wap.DjAmol.Com
	{
  echo 'By section already banned<br/>';
  }
  else
  {
  if ($_POST['kod1'])
  {
  $icon='<img align="middle" src="'.$_POST['kod1'].'"> ';
  }
  			 ///////////DjAmol.Com///////////////
$fp = fopen('razdely/'.$name32.'1.dat',"a+"); //Wap.DjAmol.Com
flock ($fp,LOCK_EX);
fputs($fp,''.$icon.'<b>'.$_POST['kod'].'</b>');
fflush ($fp);
flock ($fp,LOCK_UN);
fclose($fp);
$file=file('razdely/'.$name32.'1.dat');
$i = count($file);
echo 'Access closed successfully'; 
}
print '<div class="a"><a href="blok.php?action=4">Back</a></div>';
print '<div class="a"><a href="apanel.php">Admin</a></div>';
        /////////////DjAmolGroup Inc//////////////
}
else
{
$dirs = mysql_query("SELECT `path` FROM `files` WHERE `size` = '0';");
print '<form action="'.$_SERVER['PHP_SELF'].'?action=4" method="post">
<div>
Select folder<br> to which would be barred<font color="red">*</font><br>
<select class="buttom" size="1" width="70" name="topath"><option value="'.$setup['path'].'/">./</option>';
while($item = mysql_fetch_array($dirs))
{

$name = str_replace($setup['path'].'/','',$item['path']);
$path = explode('/',$name);
$option = '';
unset($path[sizeof($path)-1]);
foreach($path as $value)
{
if(strpos($value , '!') !== false) $name = trans($value); else $name = $value;
$option = $option.$name.'/';
}
echo '<option value="'.$item['path'].'">'.$option.'</option>';
}

echo '</select>
<input type="submit" value="Close"/>

</div>';
print '<div class="a"><a href="clickrazdel.php?action=2">Edit</a></div>';
print '<div class="a"><a href="apanel.php">Admin</a></div>';
}
                                        //DjAmolGroup Inc
  break;   
   
 }
}
else exit;
?>