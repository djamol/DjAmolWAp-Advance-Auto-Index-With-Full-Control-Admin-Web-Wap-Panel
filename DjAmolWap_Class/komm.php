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
require 'moduls/fun.php';
require 'moduls/connect.php';
require 'moduls/header.php';
require $Class.'online.php';
###############Если комменты выключены##########
if($setup['komments_change'] == 0) die(''.$rdxml->eng->sr->s9.'-Visit http://Wap.DjAmol.Com or contact Administrative');
###############Проверка#########################

$id = intval($_GET['id']);
$page = intval($_GET['page']);

$onpage = get2ses('onpage');
is_num($onpage,'onpage');

###############Инфа о файле#####################
$file_info_real = mysql_fetch_array(mysql_query('SELECT * FROM `files` WHERE id = '.$id));
if(!is_file ($file_info_real['path'])) die(''.$rdxml->eng->nw->n2.'!');
###############Получаем комменты###############
$query = mysql_query('SELECT * FROM `komments` WHERE `file_id` = '.$id.' ORDER BY `time` DESC');
while($list_sw = mysql_fetch_array($query)){
$array_id[] = $list_sw['id'];
}
$all = sizeof($array_id);
$filepath = pathinfo($file_info_real['path']);
$namefile = $filepath[basename];
#######Получаем имя файла и обратный каталог#####
$dir = $filepath[dirname].'/';
$back = mysql_fetch_array(mysql_query("SELECT * FROM `files` WHERE `path` = '".$dir."'"));
###############Запись###########################
if($_GET['act']=='add')
{
//Проверка на ошибки
$error = null;
if(!$_POST['msg'] || !$_POST['name']) $error .= ''.$rdxml->eng->db3->d1.'<br>';
if(strlen($_POST['msg'])<6) $error .= ''.$rdxml->eng->db3->d2.'<br>';
if(empty($file_info_real['loads'])) $error .= ''.$rdxml->eng->db3->d3.'<br>';

$_POST['msg'] = bbcode(clean(del(substr($_POST['msg'],0,256))));
$_POST['name'] = clean(del(substr($_POST['name'],0,10)));

$currtime = time();
$tr = mysql_query("SELECT * FROM `komments` WHERE `text` = '".$_POST['msg']."'");
if(mysql_fetch_row($tr)) $error .= ''.$rdxml->eng->db3->d4.'<br>';
//Если нет ошибок пишем в базу
if($error) die('<div class="row">'.$error.'</div>');
mysql_query("INSERT INTO `komments` (`file_id`, `name`, `text`, `time`) VALUES ('".$id."', '".$_POST['name']."', '".$_POST['msg']."' , '".$currtime."');");
echo '<div class="iblock">'.$rdxml->eng->db3->d5.'</div><div class="iblock">';
}
##########################################
//	DjAmol GRoup Inc.		//

//	WwW.DjAmol.Com			//
	
//	djamolpatil@gmail.com		//

//	Twitter.com/djamol		//

// Best Offer For New Buyer contact now //

//	http://ai.djamol.com/ <-Buy Now	//
##########################################
else
{
echo'<div class="mp3t"><strong><img src="dis/in.png" alt="">'.$rdxml->eng->db3->d6.''.$namefile.'</strong></div>';
//Страницы
$n = 0;
$pages = ceil($all/$onpage);
if($page>$pages or $page<=0) $page=1;
if(!$pages) $pages = 1;
if($page) $n = ($onpage*$page)-$onpage;
//Если комментов пока нет
if(!$all) echo '<div class="a">'.$rdxml->eng->db3->d7.'<br>'.$rdxml->eng->db3->d8.'</div>';
//Выводим комменты
for($i=1; $i<=$onpage; $i++)
{
if(!isset($array_id[$n]))
{
$n++;
continue;
}
if(is_integer($n / 2)) $row = '<div class="even">'; else $row = '<div class="even">';
$komments = mysql_fetch_array(mysql_query('SELECT * FROM `komments` WHERE `id` = '.$array_id[$n]));
$komments['time'] = date('d.m.Y/H:i', $komments['time']); //Время
$komments['text'] = str_replace("\n", '<br>',$komments['text']); //Текст
print $row.'<strong>'.$komments['name'].'</strong> ('.$komments['time'].')</div><div class="odd">'.$komments['text'].'</div>';
$n++;
}
//Форма добавления камментов
echo '<div class="even"><form action="dashboard.php?avp=cm&amp;act=add&amp;lang='.$lang.'&amp;id='.$id.'" method="post">
'.$rdxml->eng->db1->d2.':<br><input class="enter" name="name" type="text" value="" maxlength="10"><br>
'.$rdxml->eng->db1->d5.':<br>
<textarea class="enter" cols="15" rows="3" name="msg" maxlength="256"></textarea><br><br>
<input class="buttom" type="submit" value="Submit"></form></div>';
//Страницы
echo '<div class="dl">'.$rdxml->eng->st->s1.': ';
$asd = $page - 2;
$asd2 = $page + 3;
if($asd<$all && $asd>0 && $page>3) echo ' <a href="dashboard.php?avp=cm&amp;page=1&amp;id='.$id.'&amp;lang='.$lang.'">1</a> ... ';
for($i=$asd; $i<$asd2;$i++)
{
if($i<$all && $i>0)
{
if ($i > $pages ) break;
if ($page==$i) 	echo '<strong>['.$i.']</strong> ';
else echo '<a href="dashboard.php?avp=cm&amp;page='.$i.'&amp;id='.$id.'&amp;lang='.$lang.'">'.$i.'</a> ';
}
}
if ($i <= $pages)
{
if($asd2<$all) echo ' ... <a href="dashboard.php?avp=cm&amp;page='.$pages.'&amp;id='.$id.'&amp;lang='.$lang.'">'.$pages.'</a>';
}
echo '<br>';
}
echo '<div class="a">
<div class="djaline"></div><a href="show-'.$id.'_'.$lang.'-'.basename($d['path']).'.html">'.$rdxml->eng->vs->v10.'</a></div>
<div class="djaline"></div><a href="'.$back['id'].'_'.$lang.'-Go Back.html">'.$rdxml->eng->db2->d2.'</a></div>
<div class="djaline"></div><a href="?lang='.$lang.'">'.$rdxml->eng->h1.'</a></div>
<div class="djaline"></div><a href="'.$setup['site_url'].'?lang='.$lang.'">'.$rdxml->eng->i4.'</a></div></div>';
if($setup['online'] == 1)echo '</div><div class="mp3t">'.$rdxml->eng->st->s5.': <strong>'.$all_online[0].'</strong></div>
<div class="mp3t"><center><a href="http://wap.djamol.com?lang='.$lang.'">'.$rdxml->eng->h1.'</a></center></div><div class="djafoot"><div class="djacopy">DjAmol Group 2012</div></div></td></td></body></html>';

//Авточистка комментов
if($all > $setup['klimit'])
{
$max = mysql_fetch_row(mysql_query('SELECT MIN(`id`) FROM `komments`;'));
mysql_query('DELETE FROM `komments` WHERE `id` = '.$max[0]);
$page=1;
}
echo '<div class="title">';
require 'moduls/foot.php';
echo '</div></div>';
?>