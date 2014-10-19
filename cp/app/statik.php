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
//Djamolgroup inc
$error = 0;
if(empty($_SESSION['autorise'])) $error = 1;
if($_SESSION['autorise']!= $setup['password']) $error = 1;
if(empty($_SESSION['ipu'])) $error = 1;
if($_SESSION['ipu']!=clean($ip)) $error = 1;
if($error==1) die($setup['hackmess']);
//------djamolgroup inc

$id = intval($_GET['id']);
$page = intval($_GET['page']);
$start = intval($_GET['start']);

$onpage = get2ses('onpage');
$sort = get2ses('sort');

is_num($onpage,'onpage');





//DjamolGroup Inc
if(!$id){
$d['path'] = $setup['path'].'/';
}
else{
$d = mysql_fetch_array(mysql_query('SELECT `path` FROM `files` WHERE `id` = '.$id));
}

if(!is_dir ($d['path'])) die('Такой категории не существует!');
//Djamol

$all = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM `files` WHERE `infolder` = '".$d['path']."'"));
$all = $all[0];
$pages = ceil($all/$onpage);
if(!$pages) $pages = 1;
if($page>$pages or $page<=0) $page=1;
if($start>$all or $start<=0) $start = 0;
if($page) $start = ($page - 1) * $onpage; else $start = 0;
//-
$valid_sort = array('name' => '','data' => '','load' => '','size' => '','eval' =>'');
if(!isset($valid_sort[$sort]) ) die($hackmess);
if($sort == 'name') $MODE = '`priority` DESC,`name` ASC';
if($sort == 'data') $MODE = '`priority` DESC,`timeupload` DESC';
if($sort == 'size') $MODE = '`priority` DESC,`size` ASC';
if($sort == 'load') $MODE = '`priority` DESC,`loads` DESC';
if($sort == 'eval' and $setup['eval_change']==1) $MODE = '`priority` DESC,`yes` DESC ,`no` ASC';
//----------------DjAmol Group Inc(Www.djamol.com)------------------------
$query = mysql_query('SELECT `id` FROM `files` WHERE `infolder` = "'.$d['path'].'" ORDER BY '.$MODE.' LIMIT '.$start.', '.$onpage);
while($list_sw = mysql_fetch_array($query)) $array_id[] = $list_sw['id'];
//----------------DjAmol Group Inc(Www.djamol.com)------------------------
$ex=explode('/',$d['path']);
foreach($ex as $k=>$v)
{
if ($v[0]!='.' AND $v AND $v!=$setup['path'])
{
$s = mysql_fetch_array(mysql_query("SELECT `id`,`name` FROM `files` WHERE `path` LIKE '%".clean($v)."/' AND `size` = 0"));
$s['name'] = str_replace('*','',$s['name']);
if($k >= sizeof($ex)-2) $put .= $s['name'];
else $put .= '<a href="index.php?id='.$s['id'].'">'.$s['name'].'</a>&raquo;';
}
}








foreach($array_id as $key => $value)
{
if(is_integer($key / 2)) $row = '<div class="mainzag">'; else $row = '<div class="row">';
$file_info = mysql_fetch_array(mysql_query('SELECT `id`,`name`,`path`,`fastabout`,`timeupload`,`infolder`,`size` FROM `files` WHERE `id` = '.$value));
$pyti="$file_info[path]|";
echo"$file_info[path]";
if($postu=fopen("pyti.txt", "w"))
{
fgetss($postu);   //djamol
if(fwrite($postu, "$pyti"))
print('');
else
die("Ошибка! Поставте права 666 на файл pyti.txt");  //djamol
}
if($postu=fopen("pyti.txt", "r"))
{
$post=fgets($postu, 1000);
}
$ken=1;
while($ken!=0)
{
$a++;
  $viewmess = explode("|", $post);
  $ben = $viewmess[$a];
  $ken=strlen($ben); 
}
  $a=$a-1;
  $viewmess = explode("|", $post);
  $pyt1 = $viewmess[$a];
  $a=$a-1;  
  $pyt2    = $viewmess[$a];
  $a=$a-1; 
  $pyt3  = $viewmess[$a];
  $a=$a-1;
  $pyt4 = $viewmess[$a];
  $a=$a-1;  
  $pyt5    = $viewmess[$a];
  $a=$a-1; 
  $pyt6  = $viewmess[$a];
  $a=$a-1;
  $pyt7  = $viewmess[$a];
  $a=$a-1;
  $pyt8  = $viewmess[$a];
  $a=$a-1;
  $pyt9  = $viewmess[$a];
  $a=$a-1;
  $pyt10  = $viewmess[$a];
  $a=$a-1;
  $pyt11  = $viewmess[$a];
  $a=$a-1;
  $pyt12  = $viewmess[$a];
  $a=$a-1;   
  echo"<br>$pyt1 -1<br>  $pyt2-2<br>  $pyt3-3<br><br>";     

//djamolgroup
}
function count_files($directory) 
{ 
    GLOBAL $i,$size; 
    $dir=opendir($directory); 
    while (false!==($file=readdir($dir))) 
    { 
        if (is_file($directory.'/'.$file)) 
        { 
            $i++; //DjAmolGroup Inc
            $size+=filesize($directory.'/'.$file); 
        } 
        elseif (is_dir($directory.'/'.$file) && $file!='.' && $file!='..') 
        { 
            count_files($directory.'/'.$file); 
        } 
    } //DjAmol
    closedir($dir); 
} 

$i=0; 
$size=0; 
count_files("$file_info[path]"); 
###############DjAmol Group###############
//   DjAmolwap 12v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############
echo 'файлов :'.$i; 
echo ' размером :'.$size; 
?>