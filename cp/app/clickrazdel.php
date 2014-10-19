<?php
#----------------------------------------#
# 	============DjAmol Group ============#
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
//DjAmol.Com
$error = 0;
if(empty($_SESSION['autorise'])) $error = 1;
if($_SESSION['autorise']!= $setup['password']) $error = 1;
if(empty($_SESSION['ipu'])) $error = 1;
if($_SESSION['ipu']!=clean($ip)) $error = 1;
if($error==1) die($setup['hackmess']);
//--DjAmolGroup Inc
//
$action = intval($_GET['action']);


//
if ($action)
{
 switch($_GET['action'])
 {
###############DjAmolGroup Inc
  case '1':
  if($_POST['kod'])
{
   $name32=$_POST['topath'];
  	$name32=str_replace('files/','',$name32);
  		$name32=str_replace('/',';',$name32);
  			$name32=str_replace('_',' ',$name32);
  				if (is_file('razdely/'.$name32.'1.dat')) //djamol
	{
  echo 'Раздел уже создан <br><a href="clickrazdel.php?action=2">Edit</a><br/>';
  }
  else
  {
  if ($_POST['kod1'])
  {
  $icon='<img align="middle" src="'.$_POST['kod1'].'"> ';
  }
  			 /////////www.djamol.com/////////////////
$fp = fopen('razdely/'.$name32.'1.dat',"a+"); //djamol
flock ($fp,LOCK_EX);
fputs($fp,''.$icon.'<b>'.$_POST['kod'].'</b>');
fflush ($fp);
flock ($fp,LOCK_UN);
fclose($fp);
$file=file('razdely/'.$name32.'1.dat');
$i = count($file);
echo 'Section created'; 
}
print '<div class="a"><a href="clickrazdel.php?action=1">Back</a></div>';
print '<div class="a"><a href="apanel.php">Admin</a></div>';
        ////////////////DjAmolGroup Inc///////////
}
else
{
$dirs = mysql_query("SELECT `path` FROM `files` WHERE `size` = '0';");
print '<form action="'.$_SERVER['PHP_SELF'].'?action=1" method="post">
<div>
Select folder<br>which will be attached to the section<font color="red">*</font><br>
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

echo '</select><br>
Enter the name of the section<font color="red">*</font><br/>
<input type="text" name="kod" value=""/><br/>
Enter your icons to section<br/>
<input type="text" name="kod1" value=""/><br/>
<input type="submit" value="Write"/>
<br/><br/><font color="red">*</font>-obezatelny required<br/>
</div>';
print '<div class="a"><a href="apanel.php">Admin</a></div>';
}
 
  break;
###########DjAmolGroup
   case '2':
   if($_GET['razdel'])
{
   $razdel=$_GET['razdel'];

  				if (is_file('razdely/'.$razdel.'1.dat')) //http://twitter.com/djamol
	{
 print '
<div class="menu">
Editing</div>';
$tex=file_get_contents('razdely/'.$razdel.'1.dat');
$tex = htmlentities($tex, ENT_QUOTES, 'UTF-8');
echo '<form action="clickrazdel.php?action=3&razdel='.$razdel.'" method="post">
<textarea class="enter" cols="15" rows="3" name="tex2" maxlength="256" value="">'.$tex.'</textarea><br><br>
<input class="buttom" type="submit" value="Edit"></form></div>';
  }
  else
  {
  echo 'This section is not created.<br><a href="clickrazdel.php?action=1">Write</a><br/>';
  }
print '<div class="a"><a href="clickrazdel.php?action=2">Back</a></div>';
print '<div class="a"><a href="apanel.php">Admin</a></div>';
        /////////////DjAmol//////////////
}
else
{
$dirs = mysql_query("SELECT `path` FROM `files` WHERE `size` = '0';");
print '
<div class="menu">
Select:</div><table style="margin: 0px; border-bottom: 1px solid #86929d;" width="100%" cellspacing="1">';
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
	###############DjAmolWap 12version
	$name32=$item['path'];
  	$name32=str_replace('files/','',$name32);
  		$name32=str_replace('/',';',$name32);
  			$name32=str_replace('_',' ',$name32);
		if (is_file('razdely/'.$name32.'1.dat')) //djamol
	{
	$option2=$name32;
	echo '<tr><td width="2%" align=left style="background: #DFE6EF;">'.$option.'</td><td width="1%" align=left style="background: #DFE6EF;"><a href="clickrazdel.php?action=2&razdel='.$option2.'">Edit</a></td><td width="5%" align=left style="background: #DFE6EF;"><a href="clickrazdel.php?razdel='.$option2.'&action=4">Del</a></td></tr>';
  $su4=1;
	}

}
if ($su4==NULL) echo 'DjAmolGroup<br/><a href="clickrazdel.php?action=1">Write</a><br/>';

print '</table><div class="a"><a href="apanel.php">Admin</a></div>';
}
   break;
   ////////////////Wap.DjAmol.Com
   case '3':
   if ($_POST['tex2'])
  {
  if (is_file('razdely/'.$_GET['razdel'].'1.dat')) //Twitter.com/djamol

	{
 
  			  /////////djamol////////////
  			  $fp=fopen('razdely/'.$_GET['razdel'].'1.dat',"w");
          flock ($fp,LOCK_EX);
          unset($file[0],$file[1]);
          fputs($fp, implode("",$file));
          flock ($fp,LOCK_UN);
          fclose($fp);
///////////////////djamol.com/////////////
$fp = fopen('razdely/'.$_GET['razdel'].'1.dat',"a+"); //djamol
flock ($fp,LOCK_EX);
fputs($fp,$_POST['tex2']);
fflush ($fp);
flock ($fp,LOCK_UN);
fclose($fp);
$file=file('razdely/'.$_GET['razdel'].'1.dat');
$i = count($file);
echo 'Section successfully changed.'; }
else echo 'Oshybka! Section exist for!';
 }
else echo 'Oshybka! Field empty.';
print '<div class="a"><a href="clickrazdel.php?action=2">Back</a></div>';
print '<div class="a"><a href="apanel.php">Admin</a></div>';
   break;
   ////////////DjAmolGroup\\\\\\\
      case '4':
   if ($_GET['razdel'] and empty($_GET['yes']) )
  {
  print '<div class="menu">
Удалить раздел? <a href="clickrazdel.php?action=4&yes=1&razdel='.$_GET['razdel'].'">Y</a>/<a href="clickrazdel.php?action=2">N</a></div>';
  }
  if (is_file('razdely/'.$_GET['razdel'].'1.dat') and $_GET['yes']==1 )//djamol group
  	{ 

if (unlink('razdely/'.$_GET['razdel'].'1.dat'))
{ echo "Section successfully deleted"; }
else
{ echo "Error deleting file"; }
 }

 

print '<div class="a"><a href="clickrazdel.php?action=2">Back</a></div>
<!--DjAmolGroup Inc. (WwW.DjAmol.Com)-->';
print '<div class="a"><a href="apanel.php">Admin</a></div>';
   break;
 }
}
else exit;
?>