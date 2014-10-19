<?php
###############DjAmol Group###############
//   DjAmolwap 12v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############
require 'moduls/ini.php';
require 'moduls/connect.php';
require 'moduls/fun.php';
require 'moduls/pclzip.lib.php';
require 'moduls/header.php';
require $Class.'online.php';
###############d j a m o l##########
if($setup['zip_change']==0) die(''.$rdxml->eng->sr->s9.'-Visit http://Wap.DjAmol.Com or contact Administrative');
############D J A M O L############


$onpage = get2ses('onpage');
is_num($onpage,'onpage');

$prew = get2ses('prew');
$id = intval($_GET['id']);
$page = intval($_GET['page']);
$start = intval($_GET['start']);

if($onpage < 1){
$onpage = $setting['onpage'];
}

$d = mysql_fetch_array(mysql_query('SELECT * FROM `files` WHERE `id` = '.$id));
if(!file_exists($d['path'])) die(''.$rdxml->eng->nw->n2.'');
##########DjAmol.Com#############
$filename = pathinfo($d['path']);
$ext = strtolower($filename['extension']);
if($ext!='zip') die(''.$rdxml->eng->nw->n3.' ZIP archive');
$dir = $filename['dirname'].'/';
$back = mysql_fetch_array(mysql_query("SELECT * FROM `files` WHERE `path` = '".$dir."'"));
#############Wap.DjAmol.Com#############
echo '<div class="menu"><img src="dis/in.png" alt=""><strong>'.$rdxml->eng->nw->n4.' '.basename($d['path']).'</strong></div><div class="a">';
######ai.djamol.com##########
if(!$_GET['action'])
{
$zip = new PclZip($d['path']);
if(!$list = $zip->listContent()) die(''.$rdxml->eng->er.': '.$zip->errorInfo(true));
for($i=0; $i<sizeof($list); $i++)
{
for(reset($list[$i]); $key = key($list[$i]); next($list[$i]))
{
$zfilesize = strstr($listcontent,'--size');
$zfilesize = str_replace('--size:','',$zfilesize);
$zfilesize = str_replace($zfilesize,$zfilesize.'|',$zfilesize);
$sizelist .= $zfilesize;
$listcontent = "[$i]--$key:".$list[$i][$key];
$zfile = strstr($listcontent,'--filename');
$zfile = str_replace('--filename:','',$zfile);
$zfile = str_replace($zfile,$zfile.'|',$zfile);
$savelist .= $zfile;
}
}
$sizefiles2 = explode('|',$sizelist);

$sizelist2=array_sum($sizefiles2);
$obkb=round($sizelist2/1024,2);
$preview=$savelist;

$preview = explode('|',$preview);

$count = count($preview)-1;
echo '<div class="djaline"></div>'.$rdxml->eng->nw->n5.': '.$count.'<div class="djaline"></div>'.$rdxml->eng->nw->n4.': '.$obkb.' kb</div>';
if (!isset($page)) $page=1;
$n = 0;
$pages = ceil($count/$onpage);
if(!$pages) $pages = 1;
if ($page) $n = ($onpage*$page)-$onpage;
if ($count == 0) echo '<div class="title_bord"><div class="a">'.$rdxml->eng->nw->n6.' :(</div></div>'; else echo '<div class="djaline"></div>';
$sizefiles = explode('|',$sizelist);
$selectfile = explode('|',$savelist);
//-------------------------Buy now http://ai.djamol.com-----------------------------------------------------------------
for ($i = 1; $i<=$onpage; $i++)
{
if (empty($selectfile[$n]))
{
$n++;
continue;
}
$path = $selectfile[$n];
$fname = ereg_replace(".*[\\/]",'',$path);
$zdir = ereg_replace("[\\/]?[^\\/]*$",'',$path);
echo '<div class="a">'.$zdir.'/<a href="'.$_SERVER['PHP_SELF'].'?action=preview&amp;id='.$id.'&amp;open='.$path.'&amp;lang='.$lang.'">'.$fname.'</a>';
if($sizefiles[$n]!='0') echo ' ['.round($sizefiles[$n]/1024,2).'kb]';
echo'</div>';
$n++;
}
//djamol.com
echo '</div><div class="djaline"></div><div class="a">'.$rdxml->eng->st->s1.': ';
$asd= $page - 2;
$asd2= $page + 3;
if($asd<$count && $asd>0 && $page>3) echo '<a href="dashboard.php?avp=zip&amp;id='.$id.'&amp;page=1&amp;lang='.$lang.'">1</a> ... ';
for($i=$asd; $i<$asd2;$i++)
{
if($i<$count && $i>0)
{
if ($i > $pages ) break;
if ($page==$i) echo '<strong>['.$i.']</strong> ';
else echo '<a href="dashboard.php?avp=zip&amp;id='.$id.'&amp;page='.$i.'&&amp;lang='.$lang.'">'.$i.'</a> ';  //DjAmol.Com
}
}
if ($i <= $pages)
{
if($asd2<$count) echo ' ... <a href="dashboard.php?avp=zip&amp;id='.$id.'&amp;page='.$pages.'&&amp;lang='.$lang.'">'.$pages.'</a>';
}
echo '</div>';
}
##############DjAmol.Com##############
if($_GET['action']=='preview')
{
if(strpos($_GET['open'] , '..') !== false or strpos($_GET['open'] , './') !== false) die($hackmess);
$_GET['open'] = clean(del($_GET['open']));
$zip = new PclZip($d['path']);
$content = $zip->extract(PCLZIP_OPT_BY_NAME, $_GET['open'] ,PCLZIP_OPT_EXTRACT_AS_STRING);
$content = $content[0]['content'];
$letters=array('а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п','р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я','А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','П','Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Ъ','Ы','Ь','Э','Ю','Я');
for($b=0; $b<66; $b++)
{
if(strstr($content,$letters[$b])!== false){$utf='ok';}
}
$preview2 = explode("\r\n",$content);
$count = count($preview2);
function highlight_code($code)
{
$code=trim($code);
return highlight_string($code,true);
}
echo '<strong>strings: '.$_GET['open'].'</strong><br>Строк: '.$count.'</div><div class="a">';
if($utf=='ok') echo highlight_code($content); else echo highlight_code(iconv('windows-1251','utf-8',$content));   //DjAmol.Com
echo'</div>';
}
###############DjAmol Group###############
//      http://ai.djamol.com            //
###############DjAmol Group###############
echo '<div class="a">
<div class="djaline"></div><a href="/show-'.$id.'_'.$lang.'-'.basename($d['path']).'.html">'.$rdxml->eng->vs->v10.'</a></div>
<div class="djaline"></div><a href="/'.$back['id'].'_'.$lang.'-Go Back.html">'.$rdxml->eng->db2->d2.'</a></div>
<div class="djaline"></div><a href="/?lang='.$lang.'">'.$rdxml->eng->h1.'</a></div>
<div class="djaline"></div><a href="'.$setup['site_url'].'?lang='.$lang.'">'.$rdxml->eng->i4.'</a></div></div>';
if($setup['online'] == 1)echo '</div><div class="mp3t">'.$rdxml->eng->st->s5.': <strong>'.$all_online[0].'</strong></div>';
echo'<div class="title">';
include 'moduls/foot.php';
echo '</div></div>';
?>