<?php


require 'moduls/ini.php';
require 'moduls/fun.php';
require 'moduls/connect.php';
require 'moduls/app/head/search.php';
require $Class.'online.php';
#########DjAmolGroup##############
if($setup['search_change'] == 0) die('-'.$rdxml->eng->sr->s9.'-');
##############DjAmol.Com#############
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
#############Wap.DjAmol.Com############
if(!$_GET['act'])
{
echo '<div class="menu"><img src="dis/s.png" alt=""> Find Files</div><div class="a">
<form name="sfiles" action="dashboard.php?act=search&lang='.$lang.'" method="post">
'.$rdxml->eng->sr->s1.':</div>
<div class="a">
<div class="row">
<form>
<input class="enter" name="word" type="text" maxlength="20" value="'.$ti1.'"><br>
<input class=buttom type="submit" value="Search!">
</form></div></div>
<div class="a">
<div class="i_bar_t"><a href="index.php?lang='.$lang.'">Downloads</a><br></div>
<div class="i_bar_t"><a href="'.$setup['site_url'].'?lang='.$lang.'">Home</a><br></div>
';
if($setup['online'] == 1)echo '</div><div class="menu">?'.$rdxml->eng->st->s5.': <strong>'.$all_online[0].'</strong>';
echo '</div><div class="title">';
include 'moduls/foot.php';
echo '</div>';
}
#########DjAmolGroup Inc#############
if(!empty($_POST['word'])){
$word = $_POST['word'];
}else{
$word = $_GET['word'];
}
if($_GET['act']=='search')
{
if(!$word) die (''.$rdxml->eng->sr->s2.'Powered by Amol Patil<a href="'.$setup['site_url'].'?lang='.$lang.'">'.$rdxml->eng->h1.'</a>');
$word = clean(del(cut($word,15)));
$word_search_query = mysql_query("SELECT * FROM `files` WHERE `name` LIKE '%".$word."%' AND `size` > 0");
$i = 0;
while($result = mysql_fetch_array($word_search_query)) $array_id[] = $result['id'];
$all = count($array_id);
if(!isset($page)) $page=1;
$n = 0;
$pages = ceil($all/$onpage);
if(!$pages) $pages = 1;
if ($page) $n = ($onpage*$page)-$onpage;
echo '<div class="menu"><img src="dis/in.png" alt="">'.$rdxml->eng->sr->s3.' "'.$word.'" '.$rdxml->eng->sr->s4.' '.$all.' '.$rdxml->eng->sr->s5.'</div>';
if($all == 0) echo '<div class="a"><font color="red">'.$rdxml->eng->sr->s6.'</font></div>';
for($i=1; $i<=$onpage; $i++)
{
if (!isset($array_id[$n]))
{
$n++;
continue;
}
if(is_integer($n / 2)) $row = '<div class="odd22"><div class="djaline">'; else $row = '<div class="odd22"><div class="djaline">';
$file_info = mysql_fetch_array(mysql_query('SELECT * FROM `files` WHERE `id` = '.$array_id[$n]));
$backdir = @mysql_fetch_array(mysql_query("SELECT * FROM `files` WHERE `path` = '".$file_info['infolder']."'"));
$basename = basename($file_info['path']);
$ex = pathinfo($file_info['path']);
$ext = strtolower($ex['extension']);
$name_file = str_replace('.'.$ex,'',$basename);
//Транслит   (DjAmol)
if(strpos($basename , '!') !== false){
$name_file = trans($name_file);
}
else{
$name_file = trans2($name_file);
}
//Красивый размер  (DjAmolGroup)
if($file_info['size'] < 1024) $file_info['size'] = '('.$file_info['size'].'b)';
if($file_info['size'] < 1048576 and $file_info['size'] >= 1024) $file_info['size'] = '('.round($file_info['size']/1024, 2).'Kb)';
if($file_info['size'] > 1048576) $file_info['size'] = '('.round($file_info['size']/1024/1024, 2).'Mb)';
//Новизна файла
$new_info=null;
$filtime2 = $file_info['timeupload']+(3600*24*$setup['day_new']);
if($filtime2>=$time){ $new_info = '[<font color="#FFFF00">New</font>]';}
//Предосмотр
$pre = null;
if($prew==1)
{
if($ext == 'bmp'){
$pre = ''.$rdxml->eng->db2->d1.'<br>';
}
elseif($ext == 'gif' or $ext == 'jpeg' or $ext == 'jpe' or $ext == 'jpg' or $ext == 'png'){
$pre = '<img style="margin:1px;" src="im.php?id='.$file_info['id'].'" alt=""/><br>';
}
}
###############DjAmol Group###############
//   DjAmolwap 12v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############
if(!file_exists("ext/$ext.png")){
$ico = '<img src="ext/stand.png" alt="">';
}
else{
$ico = '<img src="ext/'.$ext.'.png" alt="">';
}
if($setup['ext']==1){
$extension = '('.$ext.')';
}
else{
$extension = '';
}
//DjAmolGroup
echo $row.$pre.' '.$ico.'<strong><a href="show-'.$file_info['id'].'_'.$lang.'-'.$name_file.'.html">'.$name_file.'</a></strong>'.$extension.$file_info['size'].'[<a href="'.$backdir['id'].'_'.$lang.'-InCategory.html">In category</a>]<br></div>';
$n++;
}
//----------------------------------------------------------------------DjAmolGroup Inc--------------------
echo '<div class="a">'.$rdxml->eng->st->s1.': ';
$asd = $page - 2;
$asd2 = $page + 3;
if($asd<$all && $asd>0 && $page>3) echo '<a href="dashboard.php?act=search&amp;page=1&amp;lang='.$lang.'&amp;onpage='.$onpage.'&amp;prew='.$prew.'&amp;word='.$word.'">1</a> ... ';
for($i=$asd; $i<$asd2;$i++)
{
if($i<$all && $i>0)
{
if($i > $pages) break;
if($page==$i) 	echo '<strong>['.$i.']</strong> ';
else echo '<a href="dashboard.php?act=search&amp;page='.$i.'&amp;onpage='.$onpage.'&amp;lang='.$lang.'&amp;prew='.$prew.'&amp;word='.$word.'">'.$i.'</a> ';
}
}
if($i <= $pages)
{
if($asd2<$all) echo ' ... <a href="dashboard.php?act=search&amp;page='.$pages.'&amp;onpage='.$onpage.'&amp;lang='.$lang.'&amp;prew='.$prew.'&amp;word='.$word.'">'.$pages.'</a>';
}
echo '<br>';
//--------------------------------------DjAmolGroup Inc----------------------------------------------------
if($pages>$setup['pagehand'] and $setup['pagehand_change'] == 1)
{
echo ''.$rdxml->eng->st->s1.' '.$page.' Of '.$pages.':<br>
<form action="dashboard.php?act=search&amp;word='.$word.'&lang='.$lang.'" method="post">
<input class="enter" name="page" type="text" maxlength="4" size="8" value="">
<input class="buttom" type="submit" value="Go">
</form>';
}
//--------------DjAmolGroup
echo '</div><div class="a">';
//----------------------------------------------------------------------DjAmolGroup
include 'moduls/app/lastsearch.php';
echo '<div class="i_bar_t"><a href="'.$setup['site_url'].'?lang='.$lang.'">'.$rdxml->eng->h1.'</a></div>
';  //twitter.com/djamol
if($setup['online'] == 1)echo '</div><div class="menu">'.$rdxml->eng->st->s5.': <strong>'.$all_online[0].'</strong>';
//echo '<noscript><a href="cp/app/djamolst/stats.php"><img src="cp/app/djamolst/counter.php" /></a></noscript>';
echo '</div><div class="title">';
###############DjAmol Group###############
//   DjAmolwap 12v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############
include 'moduls/foot.php';
echo '</div>';
}
?>