<?php
###############DjAmol Group###############
//   DjAmolwap 14v                      //
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
//--------------------------------------djamol group------------------------------------
$error = 0;
if(empty($_SESSION['autorise'])) $error = 1;
if($_SESSION['autorise']!= $setup['password']) $error = 1;
if(empty($_SESSION['ipu'])) $error = 1;
if($_SESSION['ipu']!=clean($ip)) $error = 1;
if($error==1) die($setup['hackmess']);
//-----------djamol group

$id = intval($_GET['id']);
$page = intval($_GET['page']);
$start = intval($_GET['start']);

$onpage = get2ses('onpage');
$sort = get2ses('sort');

is_num($onpage,'onpage');
###############DjAmol Group###############
//   DjAmolwap 14v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############






//-------DjAmolWap-----------------------------------------------------------------------------------
if(!$id){
$d['path'] = $setup['path'].'/';
}
else{
$d = mysql_fetch_array(mysql_query('SELECT `path` FROM `files` WHERE `id` = '.$id));
}

if(!is_dir ($d['path'])) die('This category does not exist!');
//-----------------DjAmolWap-------------------------------------------------------------------------

$all = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM `files` WHERE `infolder` = '".$d['path']."'"));
$all = $all[0];
if($all==0 AND empty($id)) {header('Location: admin.php?cp=scan2'); die();}
$pages = ceil($all/$onpage);
if(!$pages) $pages = 1;
if($page>$pages or $page<=0) $page=1;
if($start>$all or $start<=0) $start = 0;
if($page) $start = ($page - 1) * $onpage; else $start = 0;
###############DjAmol Group###############
//   DjAmolwap 14v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############


//------------------------------------------------------------------------------------------
$valid_sort = array('name' => '','data' => '','load' => '','size' => '','eval' =>'');
if(!isset($valid_sort[$sort]) ) die($hackmess);
if($sort == 'name') $MODE = '`priority` DESC,`name` ASC';
if($sort == 'data') $MODE = '`priority` DESC,`timeupload` DESC';
if($sort == 'size') $MODE = '`priority` DESC,`size` ASC';
if($sort == 'load') $MODE = '`priority` DESC,`loads` DESC';
if($sort == 'eval' and $setup['eval_change']==1) $MODE = '`priority` DESC,`yes` DESC ,`no` ASC';
//------------------------------------------------------------------------------------------
$query = mysql_query('SELECT `id` FROM `files` WHERE `infolder` = "'.$d['path'].'" ORDER BY '.$MODE.' LIMIT '.$start.', '.$onpage);
while($list_sw = mysql_fetch_array($query)) $array_id[] = $list_sw['id'];
//------------------------------------------------------------------------------------------
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
echo ' <div class="menu"><a href="admin.php?cp=ipanel2">Downloads</a>&raquo;'.$put.'</div><div class="a">';
//------------------------------------------------------------------------------------------
if($setup['eval_change']==1) $eval = ',<a href="admin.php?cp=ipanel2&sort=eval">rating</a>'; else $eval='';
if($sort == 'name') $sortlink = '<a href="admin.php?cp=ipanel2&sort=data">date</a>,<a href="admin.php?cp=ipanel2&sort=size">size</a>,<a href="admin.php?cp=ipanel2&sort=load">popularity</a>'.$eval;
if($sort == 'data') $sortlink = '<a href="admin.php?cp=ipanel2&sort=name">name</a>,<a href="admin.php?cp=ipanel2&sort=size">size</a>,<a href="admin.php?cp=ipanel2&sort=load">popularity</a>'.$eval;
if($sort == 'size') $sortlink = '<a href="admin.php?cp=ipanel2&sort=data">date</a>,<a href="admin.php?cp=ipanel2&sort=name">name,<a href="admin.php?cp=ipanel2&sort=load">popularity</a></a>'.$eval;
if($sort == 'load') $sortlink = '<a href="admin.php?cp=ipanel2&sort=data">date</a>,<a href="admin.php?cp=ipanel2&sort=name">name,<a href="admin.php?cp=ipanel2&sort=size">size</a>'.$eval;
if($sort == 'eval' and $setup['eval_change']==1) $sortlink = '<a href="admin.php?cp=ipanel2&sort=data">date</a>,<a href="admin.php?cp=ipanel2&sort=name">name,<a href="admin.php?cp=ipanel2&sort=size">size</a>,<a href="admin.php?cp=ipanel2&sort=load">popularity</a>';

echo '<div class="i_bar_t">Sort:<br>'.$sortlink.'</div><div class="i_bar_t"><a href="apanel.php?id='.$id.'&amp;action=newdir">New Folder</a></div></div></div>';
//------------------------------------------------------------------------------------------
if(!$all){
    ###############DjAmol Group###############
//   DjAmolwap 14v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############


echo '<strong>[Empty]</strong>';
}
else echo'<div class="title_bord">';
foreach($array_id as $key => $value)
{
if(is_integer($key / 2)) $row = '<div class="a">'; else $row = '<div class="b">';
click_change();
$file_info = mysql_fetch_array(mysql_query('SELECT `id`,`name`,`path`,`fastabout`,`timeupload`,`infolder`,`size` FROM `files` WHERE `id` = '.$value));
if(is_dir($file_info['path']))
{
###############DjAmol Group###############
//   DjAmolwap 14v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############


echo $row;
$allinfolder = mysql_fetch_array(mysql_query('SELECT COUNT(*) FROM `files` WHERE `infolder` LIKE "'.$file_info['path'].'%" AND `size` > 0'));
$allinfolder = $allinfolder[0];
$file_info['name'] = str_replace('*','',$file_info['name']);
if(!file_exists($file_info['path'].'folder.png'))
{
$ico = '<img src="ext/dir.png" alt="">';
$addico = '[<font color="#761DE2"><a href="apanel.php?action=addico&amp;id='.$file_info['id'].'">+I</a></font>]';
}
else
{
$ico = '<img src="'.$file_info['path'].'folder.png" alt="">';
$addico = '[<font color="#BF00BF"><a href="apanel.php?action=reico&amp;id='.$file_info['id'].'">-I</a></font>]';
}
$updown = '[<font color="#008080"><a href="apanel.php?id='.$file_info['id'].'&amp;action=pos&amp;to=up">Up</a></font>][<font color="#008080"><a href="apanel.php?id='.$file_info['id'].'&amp;action=pos&amp;to=down">Down</a></font>]';
if($setup['delete_dir']==1) $dl = '[<font color="#B90000"><a href="apanel.php?action=redir&amp;id='.$file_info['id'].'">D</a></font>]'; else $dl = '';
echo $ico.'<strong><a href="admin.php?cp=ipanel2&id='.$file_info['id'].'">'.$file_info['name'].'</a></strong>('.$allinfolder.')[<font color="#0080FF"><a href="admin.php?cp=scan2&d='.$file_info['id'].'">Refresh</a></font>]';
if(!empty($file_info['fastabout'])) echo '<br>'.str_replace("\n", '<br>',$file_info['fastabout']);
echo '</div>';
###############DjAmol Group###############
//   DjAmolwap 14v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############


}
elseif(is_file($file_info['path']))
{
$ex = pathinfo($file_info['path']);
$ext = strtolower($ex['extension']);
$filename = $ex['basename'];
if($file_info['size'] < 1024) $file_info['size'] = '('.$file_info['size'].'b)';
if($file_info['size'] < 1048576 and $file_info['size'] >= 1024) $file_info['size'] = '('.round($file_info['size']/1024, 2).'Kb)';
if($file_info['size'] > 1048576) $file_info['size'] = '('.round($file_info['size']/1024/1024, 2).'Mb)';

if(!file_exists("ext/$ext.png")) $ico = '<img src="ext/stand.png" alt="">'; else $ico = '<img src="ext/'.$ext.'.png" alt="">';

$file_info['timeupload'] = date('d.m.Y (H:i)', $file_info['timeupload']);

if($setup['ext']==1) $extension = '('.$ext.')'; else $extension = '';

if($setup['delete_file']==1) $dl = '[<font color="#B90000"><a href="apanel.php?action=refile&amp;id='.$file_info['id'].'">D</a></font>]'; else $dl = '';
//DjAmolGroup Inc
if($ext=='zip') $unzip = '[<font color="#FFFF00"><a href="apanel.php?id='.$file_info['id'].'&amp;action=unpack">U</a></font>]'; else $unzip = '';

if(!is_file($setup['spath'].'/'.$filename.'.gif')) $add_screen = '+S'; else $add_screen = '-S';
$screen = '[<font color="#FFFF00"><a href="apanel.php?id='.$file_info['id'].'&amp;action=screen">'.$add_screen.'</a></font>]';
echo $row;

echo $ico.'<strong><a href="apanel_view.php?id='.$file_info['id'].'">'.$file_info['name'].'</a></strong>'.$extension.$file_info['size'].'[<font color="#008080"><a href="apanel.php?id='.$file_info['id'].'&amp;action=rename">R</a></font>][<font color="#800080"><a href="apanel.php?id='.$file_info['id'].'&amp;action=editabout">O</a></font>][<font color="#000080"><a href="apanel.php?id='.$file_info['id'].'&amp;action=fast">Fast</a></font>]'.$unzip.$dl.$screen;
if(!empty($file_info['fastabout'])) echo '<br>'.str_replace("\n", '<br>',$file_info['fastabout']);
if ($sort=='data') echo '<br>Added: '.$file_info['timeupload'];
if ($sort=='load') echo '<br>Downloads '.$file_info['loads'].' раз(а)';
if ($sort=='eval' and $setup['eval_change']==1) echo "<br>Rating(+/-): $file_info[yes]/$file_info[no]<br>";
echo '</div>';
}
}
if($all){
echo '</div>';
} 
//------------------------------------------------------------------------------------------
echo '</div><div class="title_bord"><div class="a">Pages: ';
$asd= $page - 2;
$asd2= $page + 3;
if($asd<$all && $asd>0 && $page>3) echo '<a href="admin.php?cp=ipanel2&id='.$id.'&amp;page=1">1</a> ... ';
for($i=$asd; $i<$asd2;$i++)
{
if($i<$all && $i>0)
{
if ($i > $pages ) break;
if ($page==$i) 	echo '<strong>['.$i.']</strong> ';
else echo '<a href="admin.php?cp=ipanel2&id='.$id.'&amp;page='.$i.'">'.$i.'</a> ';
}
}

if ($i <= $pages)
{
if($asd2<$all) echo ' ... <a href="admin.php?cp=ipanel2&id='.$id.'&amp;page='.$pages.'">'.$pages.'</a>';
}
echo '<br>';
//      http://ai.djamol.com            //
###############DjAmol Group###############
if ($pages>$setup['pagehand'] and $setup['pagehand_change'] == 1)
{
echo 'Page '.$page.' of '.$pages.':<br>
<form action="admin.php?cp=ipanel2&id='.$id.'" method="post">
<input class="enter" name="page" type="text" maxlength="4" size="8" value="">
<input class="buttom" type="submit" value="Back">
</form>';
}
//DjAmolGroup Inc
if($setup['onpage_change'] == 1)
{
echo 'Files page: ';
for($i=10; $i<35; $i=$i+5)
{
if($i==$onpage) echo '<strong>['.$i.']</strong>';
else echo '[<a href="admin.php?cp=ipanel2&onpage='.$i.'&amp;id='.$id.'">'.$i.'</a>]';
}
echo '<br>';
}
//DjAmolGroup Inc
echo '</div><div class="a">';
//DjAmolGroup Inc
echo ' - <a href="apanel.php">Admin</a></div>';
list($msec,$sec)=explode(chr(32),microtime());
echo '<div class="title">'.round(($sec+$msec)-$HeadTime,4).' сек.<br>[&copy;DjAmol.Com]</div></body></html>';

?>