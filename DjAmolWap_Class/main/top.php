<?php
###############DjAmol Group###############
//   DjAmolwap 12v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############
require 'moduls/ini.php';
require 'moduls/fun.php';
require 'moduls/connect.php';
require 'moduls/header.php';
require $Class.'online.php';
###############DjAmol Group###############
//      http://ai.djamol.com            //
###############DjAmol Group###############
if($setup['top_change'] == 0) die(''.$rdxml->eng->sr->s9.'-Visit http://Wap.DjAmol.Com');


$onpage = get2ses('onpage');
$prew = get2ses('prew');
$sort = get2ses('sort');
$id = intval($_GET['id']);
$page = intval($_GET['page']);

is_num($onpage,'onpage');
is_num($prew,'prew');

if($prew != 0 and $prew != 1){
$prew = $setup['preview'];
}


$valid_sort = array('load' => '','eval' =>'');
if(!isset($valid_sort[$sort])) $sort = 'load';
if($sort == 'load') $MODE = '`loads` > 0 AND `size` > 0 ORDER BY `loads` DESC';
if($sort == 'eval' and $setup['eval_change']) $MODE = '`yes` > 0 AND `size` > 0 ORDER BY `yes` DESC';
###############Готовим заголовок###################
if($setup['eval_change']==1) $eval = '<a href="dashboard.php?avp=top&sort=eval&lang='.$lang.'">'.$rdxml->eng->i8.'</a>'; else $eval='';
if ($sort == 'load') $sortlink = $eval;
if ($sort == 'eval' and $setup['eval_change']==1) $sortlink = '<a href="dashboard.php?avp=top&sort=load&lang='.$lang.'">'.$rdxml->eng->sort->a3.'</a>';
###############Получаем список файлов###############
$query = mysql_query('SELECT * FROM `files` WHERE '.$MODE.' LIMIT 0, '.$setup['top_num']);

while($list_sw = mysql_fetch_array($query)){
$array_id[] = $list_sw['id'];
}
$all = sizeof($array_id);
###############Вывод###############
echo '<div class="mp3t"><img src="dis/about.png" alt="">ТОP '.$setup['top_num'].' '.$rdxml->eng->vs->v11.': </div><div class="even">'.$rdxml->eng->i2.': '.$sortlink.'</div>';
###############Cтраницы###############
if(!isset($page)) $page=1;
$n = 0;
$pages = ceil($all/$onpage);
if(!$pages) $pages = 1;
if ($page) $n = ($onpage*$page)-$onpage;
###############Если их нет...###########
if($all == 0) echo ''.$rdxml->eng->db2->d3.' :(';
###############Вывод списка#############
for($i=1; $i<=$onpage; $i++)
{
if(!isset($array_id[$n])){
$n++;
continue;
}
if(is_integer($n / 2)) $row = '<div class="odd22"><div class="djaline">'; else $row = '<div class="odd22"><div class="djaline">';
$file_info = mysql_fetch_array(mysql_query('SELECT * FROM `files` WHERE `id` = '.$array_id[$n]));
$backdir = @mysql_fetch_array(mysql_query("SELECT * FROM `files` WHERE `path` = '".clean($file_info['infolder'])."'"));
$basename = basename($file_info['path']);
$ex = pathinfo($file_info['path']);
$ext = strtolower($ex['extension']);
$name_file = str_replace('.'.$ex,'',$basename);
//Транслит
if(strpos($basename , '!') !== false){
$name_file = trans($name_file);
}
else{
$name_file = trans2($name_file);
}

//Красивый размер
if($file_info['size'] < 1024) $file_info['size'] = '('.$file_info['size'].'b)';
elseif($file_info['size'] < 1048576 and $file_info['size'] >= 1024) $file_info['size'] = '('.round($file_info['size']/1024, 2).'Kb)';
else $file_info['size'] = '('.round($file_info['size']/1024/1024, 2).'Mb)';

//Предосмотр
$pre='';
if($prew==1)
{
if($ext == 'bmp'){
$pre = ''.$rdxml->eng->db2->d1.'<br>';
}
elseif($ext == 'gif' or $ext == 'jpeg' or $ext == 'jpe' or $ext == 'jpg' or $ext == 'png'){
$pre = '<img style="margin: 1px;" src="im.php?bab=1&id='.$file_info['id'].'" alt=""/><br/>';
}
}
###############DjAmol Group###############
//   DjAmolwap 12v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############
$new_info='';
if ($sort=='load') $info = '[<font color="#FFFF00">'.$file_info['loads'].'</font>]';
if ($sort=='eval' and $setup['eval_change']==1) $info = '[<font color="#800000">'.$file_info['yes'].'</font>/<font color="#004080">'.$file_info['no'].'</font>]';
$filtime2 = $file_info['timeupload']+(3600*24*$setup['day_new']);
if($filtime2>=$time) $new_info = '(New)';
//djAmolGroup
if(!file_exists("ext/$ext.png")) $ico = '<img src="ext/stand.png" alt="">'; else $ico = '<img src="ext/'.$ext.'.png" alt="">';
if($setup['ext']==1) $extension = '('.$ext.')'; else $extension = '';
//djamol.com
echo $row.$pre.' '.$ico.'<strong><a href="show-'.$file_info[id].'_'.$lang.'-'.$name_file.'.html">'.$name_file.'</a></strong>'.$extension.$file_info['size'].$info.'[<a href="'.$backdir['id'].'_'.$lang.'-TopCat.html">'.$rdxml->eng->db2->d2.'</a>]<br></div>';
$n++;
}
//---------------------------------------------------------------------------------DjAmolGroup Inc---------
echo '
<div class="even">'.$rdxml->eng->st->s1.': ';
$asd = $page - 2;
$asd2 = $page + 3;
if($asd<$all && $asd>0 && $page>3) echo '<a href="dashboard.php?avp=top&page=1&lang='.$lang.'">1</a> ... ';
for($i=$asd; $i<$asd2;$i++)
{
if($i<$all && $i>0)
{
if ($i > $pages ) break;
if ($page==$i) 	echo '<strong>['.$i.']</strong> ';
else echo '<a href="dashboard.php?avp=top&page='.$i.'&lang='.$lang.'">'.$i.'</a> ';
}
}

if ($i <= $pages)
{
if($asd2<$all) echo ' ... <a href="dashboard.php?avp=top&page='.$pages.'&lang='.$lang.'">'.$pages.'</a></div>';
}
//------------------------------------------------------------DjAmol.Com------------------------------
echo '
</div>
<div class="mp3t"><center><a href="'.$setup['site_url'].'?lang='.$lang.'">//-'.$rdxml->eng->h1.'-//</a></center></div>
';
echo '</div>';
###############DjAmol Group###############
//   http://twitter.com/djamol          //
###############DjAmol Group###############
if($setup['online'] == 1)echo '<div class="mp3t">'.$rdxml->eng->st->s5.': <strong>'.$all_online[0].'</strong></div>';
echo'<div class="title">';
include '../moduls/foot.php';
echo '</div>';
?>