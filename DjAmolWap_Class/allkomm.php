<?php
##########################################
//	DjAmol GRoup Inc.		//

//	WwW.DjAmol.Com			//
	
//	djamolpatil@gmail.com		//

//	Twitter.com/djamol		//

// Best Offer For New Buyer contact now //

//	http://ai.djamol.com/ <-Buy Now	//
##########################################
require 'moduls/ini.php';
session_name('SID') ;
session_start() ;
require 'moduls/fun.php';
require 'moduls/connect.php';
require 'moduls/header.php';
require 'online.php';
###############DjAmol(Amol Patil)##########
if($setup['new_komm'] == 0) die('Not found');
###############DjAmol#########################


$error = false;

if($_SESSION['autorise'] != $setup['password']){
$error = true;
}

if($_SESSION['ipu'] != clean($ip)){
$error = true;
}
if(!$error AND intval($_GET['id'])){

$del = mysql_query('DELETE FROM `komments` WHERE `id` = '.intval($_GET['id']).' LIMIT 1');
if($del) $say= '<font color="red">Post successfully deleted!</font><br>';
else $say= '<font color="red">Request Failed!</font><br>'; 
}

###############twitter.com/djamol#########################
$page = intval($_GET['page']);

$onpage = get2ses('onpage');
is_num($onpage,'onpage');

###############Youtube.com/DjAmolOfficial#####################
$file_info_real = mysql_fetch_array(mysql_query('SELECT * FROM `files` '));

###############Получаем комменты###############
if(!$error){
$query = mysql_query('SELECT * FROM `komments`  ORDER BY `time` DESC');
}
else $query = mysql_query('SELECT * FROM `komments`  ORDER BY `time` DESC LIMIT '.$setup['top_num']);
while($list_sw = mysql_fetch_array($query)){
$array_id[] = $list_sw['id'];
}
$all = sizeof($array_id);


###############DjAmolGroup#######################
if($say) echo'<div class="menu"><strong><img src="dis/in.png" alt="">'.$say.'</strong></div>';
else echo'<div class="menu"><strong><img src="dis/in.png" alt="">All comments</strong></div>';
//Страницы
$n = 0;
$pages = ceil($all/$onpage);
if($page>$pages or $page<=0) $page=1;
if(!$pages) $pages = 1;
if($page) $n = ($onpage*$page)-$onpage;
//Если комментов пока нет
if(!$all) echo '<div class="a">There are currently no comments. <br> Leave a comment and become the first!</div>';
else echo'</div>';
//Выводим комменты
for($i=1; $i<=$onpage; $i++)
{
if(!isset($array_id[$n]))
{
$n++;
continue;
}
$komments = mysql_fetch_array(mysql_query('SELECT * FROM `komments` WHERE `id` = '.$array_id[$n]));
echo '<div class="title_bord"><div class="t_block">';
$d = mysql_fetch_assoc(mysql_query('SELECT `name` FROM `files` WHERE `id` = '.$komments['file_id'].' LIMIT 1'));
echo '<a href="view.php?id='.$komments['file_id'].'">'.$d['name'].'</a>';
if(!$error){
echo ' |<a href="admin.php?cp=allkomm&id='.$array_id[$n].'"><font color="red"> Delete</font></a>';
}
if(is_integer($n / 2)) $row = '</div><div class="a">'; else $row = '</div><div class="a">';
$komments['time'] = date('d.m.Y/H:i', $komments['time']); //Время
$komments['text'] = str_replace("\n", '<br>',$komments['text']); //Текст
print $row.'<strong>'.$komments['name'].'</strong> ('.$komments['time'].')<br>'.$komments['text'].'</div></div>';
$n++;
}

//Страницы
if($all) echo '<div class="title_bord">';
echo '<div class="dl">Pages: ';
$asd = $page - 2;
$asd2 = $page + 3;
if($asd<$all && $asd>0 && $page>3) echo ' <a href="allkomm.php?page=1&amp;id='.$id.'">1</a> ... ';
for($i=$asd; $i<$asd2;$i++)
{
if($i<$all && $i>0)
{
if ($i > $pages ) break;
if ($page==$i) 	echo '<strong>['.$i.']</strong> ';
else echo '<a href="allkomm.php?page='.$i.'&amp;id='.$id.'">'.$i.'</a> ';
}
}
if ($i <= $pages)
{
if($asd2<$all) echo ' ... <a href="allkomm.php?page='.$pages.'&amp;id='.$id.'">'.$pages.'</a>';
}
echo '<br>';
##########################################
//	DjAmol GRoup Inc.		//

//	WwW.DjAmol.Com			//
	
//	djamolpatil@gmail.com		//

//	Twitter.com/djamol		//

// Best Offer For New Buyer contact now //

//	http://ai.djamol.com/ <-Buy Now	//
##########################################
echo '</div>';
if(!$error) print '<div class="a"><div class="i_bar_t"><a href="apanel.php">Admin</a></div></div>';
echo'<div class="a"><div class="i_bar_t"><a href="view.php?id='.$id.'">The description</a></div>
<div class="i_bar_t"><a href="index.php?id='.$back['id'].'">In category</a></div>
<div class="i_bar_t"><a href="index.php?">Downloads</a></div>';
echo'<div class="i_bar_t"><a href="'.$setup['site_url'].'">Home</a></div>';

if($setup['online'] == 1)echo '</div><div class="menu">Online: <strong>'.$all_online[0].'</strong></div>';

//Авточистка комментов
if($all > $setup['klimit'])
{
$max = mysql_fetch_row(mysql_query('SELECT MIN(`id`) FROM `komments`;'));
mysql_query('DELETE FROM `komments` WHERE `id` = '.$max[0]);
$page=1;
}
echo '<div class="title">';
require '../moduls/foot.php';
echo '</div></div>';
?>