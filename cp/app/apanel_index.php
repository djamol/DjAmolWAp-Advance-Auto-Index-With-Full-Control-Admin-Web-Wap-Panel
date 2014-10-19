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
//DjAmolGroup Inc
$error = 0;
if(empty($_SESSION['autorise'])) $error = 1;
if($_SESSION['autorise']!= $setup['password']) $error = 1;
if(empty($_SESSION['ipu'])) $error = 1;
if($_SESSION['ipu']!=clean($ip)) $error = 1;
if($error==1) die($setup['hackmess']);
//DjAmolGroup Inc
$id = intval($_GET['id']);
if($_GET['faq']!=1){
$page = intval($_GET['page']);
$start = intval($_GET['start']);

$onpage = get2ses('onpage');
$sort = get2ses('sort');

is_num($onpage,'onpage');





//DjAmolGroup Inc
if(!$id){
$d['path'] = $setup['path'].'/';
}
else{
$d = mysql_fetch_array(mysql_query('SELECT `path` FROM `files` WHERE `id` = '.$id));
}

if(!is_dir ($d['path'])) die('This category does not exist!');
//------------------------------------------------------------------------------------------

$all = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM `files` WHERE `infolder` = '".$d['path']."'"));
$all = $all[0];
if($all==0 AND empty($id)) {header('Location: admin.php?cp=scan2'); die();}
$pages = ceil($all/$onpage);
if(!$pages) $pages = 1;
if($page>$pages or $page<=0) $page=1;
if($start>$all or $start<=0) $start = 0;
if($page) $start = ($page - 1) * $onpage; else $start = 0;
//-----------------------------------------DjAmol.Com
$valid_sort = array('name' => '','data' => '','load' => '','size' => '','eval' =>'');
if(!isset($valid_sort[$sort]) ) die($hackmess);
if($sort == 'name') $MODE = '`priority` DESC,`name` ASC';
if($sort == 'data') $MODE = '`priority` DESC,`timeupload` DESC';
if($sort == 'size') $MODE = '`priority` DESC,`size` ASC';
if($sort == 'load') $MODE = '`priority` DESC,`loads` DESC';
if($sort == 'eval' and $setup['eval_change']==1) $MODE = '`priority` DESC,`yes` DESC ,`no` ASC';
//------------------DjAmolGroup Inc------------------------------------------------------------------------
$query = mysql_query('SELECT `id` FROM `files` WHERE `infolder` = "'.$d['path'].'" ORDER BY '.$MODE.' LIMIT '.$start.', '.$onpage);
while($list_sw = mysql_fetch_array($query)) $array_id[] = $list_sw['id'];
//----------------------------------------------------DjAmolGroup iNc--------------------------------------
$ex=explode('/',$d['path']);
foreach($ex as $k=>$v)
{
if ($v[0]!='.' AND $v AND $v!=$setup['path'])
{
$s = mysql_fetch_array(mysql_query("SELECT `id`,`name` FROM `files` WHERE `path` LIKE '%".clean($v)."/' AND `size` = 0"));
$s['name'] = str_replace('*','',$s['name']);
if($k >= sizeof($ex)-2) $put .= $s['name'];
else $put .= '<a href="admin.php?cp=ipanel&id='.$s['id'].'">'.$s['name'].'</a>&raquo;';
}
}
echo ' <div class="menu"><a href="admin.php?cp=ipanel2">Downloads</a>&raquo;'.$put.'</div><div class="a">';
//-------DjAmolGroup inc
if($setup['eval_change']==1) $eval = ',<a href="admin.php?cp=ipanel&sort=eval">rating</a>'; else $eval='';
if($sort == 'name') $sortlink = '<a href="admin.php?cp=ipanel&sort=data">date</a>,<a href="admin.php?cp=ipanel&sort=size">size</a>,<a href="admin.php?cp=ipanel&sort=load">popularity</a>'.$eval;
if($sort == 'data') $sortlink = '<a href="admin.php?cp=ipanel&sort=name">name</a>,<a href="admin.php?cp=ipanel&sort=size">size</a>,<a href="admin.php?cp=ipanel&sort=load">popularity</a>'.$eval;
if($sort == 'size') $sortlink = '<a href="admin.php?cp=ipanel&sort=data">date</a>,<a href="admin.php?cp=ipanel&sort=name">name,<a href="admin.php?cp=ipanel&sort=load">popularity</a></a>'.$eval;
if($sort == 'load') $sortlink = '<a href="admin.php?cp=ipanel&sort=data">date</a>,<a href="admin.php?cp=ipanel&sort=name">name,<a href="admin.php?cp=ipanel&sort=size">size</a>'.$eval;
if($sort == 'eval' and $setup['eval_change']==1) $sortlink = '<a href="admin.php?cp=ipanel&sort=data">date</a>,<a href="admin.php?cp=ipanel&sort=name">name,<a href="admin.php?cp=ipanel&sort=size">size</a>,<a href="admin.php?cp=ipanel&sort=load">popularity</a>';

echo '<div class="i_bar_t">Sort:<br>'.$sortlink.'</div><div class="i_bar_t"><a href="apanel.php?id='.$id.'&amp;action=newdir">New Folder</a></div></div></div>';
//--DjAmol Group Inc
if(!$all){
echo '<strong>[Empty]</strong>';
} else echo'<div class="title_bord">';
foreach($array_id as $key => $value)
{
if(is_integer($key / 2)) $row = '<div class="a">'; else $row = '<div class="b">';
$file_info = mysql_fetch_array(mysql_query('SELECT `id`,`name`,`path`,`fastabout`,`timeupload`,`infolder`,`size` FROM `files` WHERE `id` = '.$value));
if(is_dir($file_info['path']))
{
###WAp.DjAmol.Com
click_change();
$razd=false;
$name32=$file_info['path']; 
$name32=str_replace('files/','',$name32);
$name32=str_replace('/',';',$name32);
$name32=str_replace('_',' ',$name32);
		if (is_file('razdely/'.$name32.'.txt')) 
	{
 	$razd = file_get_contents('razdely/'.$name32.'.txt');
echo '<div class="block_top_s_l"> '.$razd.' [<a href="admin.php?cp=razdel&action=2&razdel='.$name32.'">ред.</a>][<a href="admin.php?cp=razdel&action=4&razdel='.$name32.'">del.</a>]</div>';

	}
###
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
echo $ico.'<strong><a href="admin.php?cp=ipanel&id='.$file_info['id'].'">'.$file_info['name'].'</a></strong>('.$allinfolder.')[<font color="#0080FF"><a href="apanel.php?id='.$file_info['id'].'&amp;action=flash">F</a></font>][<font color="#008080"><a href="apanel.php?id='.$file_info['id'].'&amp;action=rename">R</a></font>][<font color="#000080"><a href="apanel.php?id='.$file_info['id'].'&amp;action=fast">Fast</a></font>][<font color="#0080FF"><a href="admin.php?cp=scan2&id='.$file_info['id'].'">Upd.</a></font>]'.$dl.$addico.$updown;
if(!$razd) echo '[<font color="#761DE2"><a href="admin.php?cp=razdel&action=1&razdel='.$name32.'">§.</a></font>]';
if(!empty($file_info['fastabout'])) echo '<br>'.str_replace("\n", '<br>',$file_info['fastabout']);
echo '</div>';
}
elseif(is_file($file_info['path']))
{
$ex = pathinfo($file_info['path']);
$ext = strtolower($ex['extension']);
$filename = $ex['basename'];
if($file_info['size'] < 1024) $file_info['size'] = '('.$file_info['size'].'b)';
if($file_info['size'] < 1048576 and $file_info['size'] >= 1024) $file_info['size'] = '('.round($file_info['size']/1024, 2).'Kb)';
if($file_info['size'] > 1048576) $file_info['size'] = '('.round($file_info['size']/1024/1024, 2).'Mb)';
click_change();
if(!file_exists("ext/$ext.png")) $ico = '<img src="ext/stand.png" alt="">'; else $ico = '<img src="ext/'.$ext.'.png" alt="">';

$file_info['timeupload'] = date('d.m.Y (H:i)', $file_info['timeupload']);

if($setup['ext']==1) $extension = '('.$ext.')'; else $extension = '';

if($setup['delete_file']==1) $dl = '[<font color="#B90000"><a href="apanel.php?action=refile&amp;id='.$file_info['id'].'">D</a></font>]'; else $dl = '';

if($ext=='zip') $unzip = '[<font color="#FFFF00"><a href="apanel.php?id='.$file_info['id'].'&amp;action=unpack">U</a></font>]'; else $unzip = '';

if(!is_file($setup['spath'].'/'.$filename.'.gif')) $add_screen = '+S'; else $add_screen = '-S';
$screen = '[<font color="#FFFF00"><a href="apanel.php?id='.$file_info['id'].'&amp;action=screen">'.$add_screen.'</a></font>]';
echo $row;
###############DjAmol Group###############
//   DjAmolwap 14v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############
echo $ico.'<strong><a href="admin.php?cp=view&id='.$file_info['id'].'">'.$file_info['name'].'</a></strong>'.$extension.$file_info['size'].'[<font color="#008080"><a href="apanel.php?id='.$file_info['id'].'&amp;action=rename">R</a></font>][<font color="#800080"><a href="apanel.php?id='.$file_info['id'].'&amp;action=editabout">O</a></font>][<font color="#000080"><a href="apanel.php?id='.$file_info['id'].'&amp;action=fast">Fast</a></font>]'.$unzip.$dl.$screen;
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
//ai.djamol.com
echo '</div><div class="title_bord"><div class="a">Pages: ';
$asd= $page - 2;
$asd2= $page + 3;
if($asd<$all && $asd>0 && $page>3) echo '<a href="admin.php?cp=ipanel&id='.$id.'&amp;page=1">1</a> ... ';
for($i=$asd; $i<$asd2;$i++)
{
if($i<$all && $i>0)
{
if ($i > $pages ) break;
if ($page==$i) 	echo '<strong>['.$i.']</strong> ';
else echo '<a href="admin.php?cp=ipanel&id='.$id.'&amp;page='.$i.'">'.$i.'</a> ';
}
}

if ($i <= $pages)
{
if($asd2<$all) echo ' ... <a href="admin.php?cp=ipanel&id='.$id.'&amp;page='.$pages.'">'.$pages.'</a>';
}
echo '<br>';
//DjAmolGroup Inc
if ($pages>$setup['pagehand'] and $setup['pagehand_change'] == 1)
{
echo 'Page '.$page.' of '.$pages.':<br>
<form action="admin.php?cp=ipanel&id='.$id.'" method="post">
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
else echo '[<a href="admin.php?cp=ipanel&onpage='.$i.'&amp;id='.$id.'">'.$i.'</a>]';
}
echo '<br>';
}
echo '</div>';
}
else 
echo'</div>
<div class="title_bord">
<div class="menu">Working with directories (Folder)</div><div class="a">
[F] - Complete update of all that is behind the chosen folder.<br>
[R] - Renaming.<br>
[Fast] - Description.<br>
[Upd.] - Upgrading just the fact that Nekhoda in the chosen folder, nezatragivaya subsections.<br>
[D] - Remove.<br>
[+I] - Manualy Upload Folder Logo (Folder Id).png in <b>folderpre</b><br>
[Up] - Raise the folder on the list for 1-up.<br>
[Down] - Lower folder list on 1 down.<br>
[§.] - Add section (description to grupe directories).<br>
</div>
<div class="menu">Working with files</div><div class="a">
[R] - Renaming.<br>
[O] - The description zasyvaetsya in the database (using [Fast]).<br>
[Fast] - The description zasyvaetsya to file.<br>
[D] - Remove.<br>
[+S] - Adding screenshots.<br>
[-S] - Removing screenshot.<br>
</div></div><div class="title_bord">
<div class="a">- <a href="admin.php?cp=ipanel&id='.$id.'">Back</a> </div>
';
//-DjAmolGroup Inc
echo '<div class="a">';
###############DjAmol Group###############
//   DjAmolwap 14v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############
echo ' - <a href="admin.php?cp=ipanel&id='.$id.'&faq=1">FAQ</a><br/>';
echo ' - <a href="apanel.php">Admin</a></div>';
//DjAmolGroup Inc
list($msec,$sec)=explode(chr(32),microtime());
echo '<div class="title">'.round(($sec+$msec)-$HeadTime,4).' сек.<br>[&copy;www.DjAmol.Com]</div></body></html>';

?>