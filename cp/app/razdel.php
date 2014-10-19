<?php

list($msec,$sec)=explode(chr(32),microtime());
$HeadTime=$sec+$msec;
include 'moduls/ini.php';
session_name ('SID') ;
session_start() ;
include 'moduls/fun.php';
include 'moduls/connect.php';
include 'moduls/header.php';
//------------------------------------------------------------------------------------------
$error = 0;
if(empty($_SESSION['autorise'])) $error = 1;
if($_SESSION['autorise']!= $setup['password']) $error = 1;
if(empty($_SESSION['ipu'])) $error = 1;
if($_SESSION['ipu']!=clean($ip)) $error = 1;
if($error==1) die($setup['hackmess']);
//------------------------------------------------------------------------------------------
//
$action = intval($_GET['action']);


//
if ($action)
{
 switch($_GET['action'])
 {
#####################################Создание разделов
  case '1':
  if($_POST['kod'])
{
   $name32=$_POST['topath'];
  	$name32=str_replace('files/','',$name32);
  		$name32=str_replace('/',';',$name32);
  			$name32=str_replace('_',' ',$name32);
  				if (is_file('razdely/'.$name32.'.txt')) //если раздел создан
	{
  echo 'The section has been created <br><a href="admin.php?cp=razdel&action=2">Edit</a><br/>';
  }
  else
  {
  if ($_POST['kod1'])
  {
  $icon='<img align="middle" src="'.$_POST['kod1'].'"> ';
  }
  			 //////////////////////////
$fp = fopen('razdely/'.$name32.'.txt',"a+"); //Создаем файл
flock ($fp,LOCK_EX);
fputs($fp,''.$icon.'<b>'.$_POST['kod'].'</b>');
fflush ($fp);
flock ($fp,LOCK_UN);
fclose($fp);
$file=file('razdely/'.$name32.'.txt');
$i = count($file);
echo 'Section created'; 
}
print '<div class="a"><a href="admin.php?cp=razdel&action=1">Back</a></div>';
print '<div class="a"><a href="apanel.php">Admin</a></div>';
        ///////////////////////////
}
else
{
$dirs = mysql_query("SELECT `path` FROM `files` WHERE `size` = '0';");
print '<form action="cp/app/razdel.php?action=1" method="post">
<div>
Select folder<br> which will be attached to the section<font color="red">*</font><br>';
if($_GET['razdel']) echo'<select class="buttom" size="1" width="70" name="topath"><option value="'.$_GET['razdel'].'">'.$_GET['razdel'].'</option>';
else echo'<select class="buttom" size="1" width="70" name="topath"><option value="'.$setup['path'].'/">./</option>';
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
Enter the section name<font color="red">*</font><br/>
<input type="text" name="kod" value=""/><br/>
Enter your icons to section<br/>
<input type="text" name="kod1" value=""/><br/>
<input type="submit" value="Create"/>
<br/><br/><font color="red">*</font>-obezatelny required<br/>
</div>';
print '<div class="a"><a href="admin.php?cp=razdel&action=2">Edit</a></div>';
print '<div class="a"><a href="apanel.php">Admin</a></div>';
}
 
  break;
#####################################Редактирование
   case '2':
   if($_GET['razdel'])
{
   $razdel=$_GET['razdel'];

  				if (is_file('razdely/'.$razdel.'.txt')) //если раздел создан
	{
 print '
<div class="menu">
Editing</div>';
$tex=file_get_contents('razdely/'.$razdel.'.txt');
$tex = htmlentities($tex, ENT_QUOTES, 'UTF-8');
echo '<form action="cp/app/razdel,php?action=3&razdel='.$razdel.'" method="post">
<textarea class="enter" cols="15" rows="3" name="tex2" maxlength="256" value="">'.$tex.'</textarea><br><br>
<input class="buttom" type="submit" value="Edit"></form></div>';
  }
  else
  {
  echo 'This section is not created.<br><a href="admin.php?cp=razdel&action=1">Create</a><br/>';
  }
print '<div class="a"><a href="admin.php?cp=razdel&action=2">Back</a></div>';
print '<div class="a"><a href="apanel.php">Admin</a></div>';
        ///////////////////////////
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
	###############Проверка на существование раздела к директории
	$name32=$item['path'];
  	$name32=str_replace('files/','',$name32);
  		$name32=str_replace('/',';',$name32);
  			$name32=str_replace('_',' ',$name32);
		if (is_file('razdely/'.$name32.'.txt')) //если раздел существует
	{
	$option2=$name32;
	echo '<tr><td width="2%" align=left style="background: #DFE6EF;">'.$option.'</td><td width="1%" align=left style="background: #DFE6EF;"><a href="admin.php?cp=razdel&action=2&razdel='.$option2.'">Edit</a></td><td width="5%" align=left style="background: #DFE6EF;"><a href="admin.php?cp=razdel&razdel='.$option2.'&action=4">Del</a></td></tr>';
  $su4=1;
	}

}
if ($su4==NULL) echo 'Sections are not created.<br/><a href="admin.php?cp=razdel&action=1">Create</a><br/>';

print '</table><div class="a"><a href="apanel.php">Admin</a></div>';
}
   break;
   ////////////////Запись изменений в файл
   case '3':
   if ($_POST['tex2'])
  {
  if (is_file('razdely/'.$_GET['razdel'].'.txt')) //если раздел создан

	{
 
  			  //////////////////////////удаляем все лишнее с файла
  			  $fp=fopen('razdely/'.$_GET['razdel'].'.txt',"w");
          flock ($fp,LOCK_EX);
          unset($file[0],$file[1]);
          fputs($fp, implode("",$file));
          flock ($fp,LOCK_UN);
          fclose($fp);
////////////////////////////////
$fp = fopen('razdely/'.$_GET['razdel'].'.txt',"a+"); //Создаем файл
flock ($fp,LOCK_EX);
fputs($fp,$_POST['tex2']);
fflush ($fp);
flock ($fp,LOCK_UN);
fclose($fp);
$file=file('razdely/'.$_GET['razdel'].'.txt');
$i = count($file);
echo 'Section successfully changed.'; }
else echo 'Oshybka! Section exist for!';
 }
else echo 'Oshybka! Field empty.';
print '<div class="a"><a href="admin.php?cp=razdel&action=2">Back</a></div>';
print '<div class="a"><a href="apanel.php">Admin</a></div>';
   break;
   ////////////\\\\\\\Уаление разделов
      case '4':
   if ($_GET['razdel'] and empty($_GET['yes']) )
  {
  print '<div class="menu">
Удалить раздел? <a href="admin.php?cp=razdel&action=4&yes=1&razdel='.$_GET['razdel'].'">Y</a>/<a href="admin.php?cp=razdel&action=2">N</a></div>';
  }
  if (is_file('razdely/'.$_GET['razdel'].'.txt') and $_GET['yes']==1 )//если раздел создан
  	{ 

if (unlink('razdely/'.$_GET['razdel'].'.txt'))
{ echo "Section successfully deleted"; }
else
{ echo "Error deleting file"; }
 }

 

print '<div class="a"><a href="admin.php?cp=razdel&action=2">Back</a></div>';
print '<div class="a"><a href="apanel.php">Admin</a></div>';
   break;
 }
}
else exit;
?>