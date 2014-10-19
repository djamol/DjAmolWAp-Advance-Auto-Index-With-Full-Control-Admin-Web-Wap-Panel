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
session_start() ;
include 'moduls/fun.php';
include 'moduls/connect.php';
include 'moduls/header.php';
//===========DjAmolGroup Inc===============
$error = 0;
if(empty($_SESSION['autorise'])) $error = 1;
if($_SESSION['autorise']!= $setup['password']) $error = 1;
if(empty($_SESSION['ipu'])) $error = 1;
if($_SESSION['ipu']!=clean($ip)) $error = 1;
if($error==1) die($setup['hackmess']);
//============DjAmolGroup INc===============
$id = intval($_GET['id']);

$onpage = get2ses('onpage');
$prew = get2ses('prew');
$sort = get2ses('sort');

$start = intval($_GET['start']);
$page = intval($_GET['page']);

is_num($onpage,'onpage');
is_num($prew,'prew');

if($prew != 0 and $prew != 1){
$prew = $setup['preview'];
}


$valid_sort = array('name' => '','data' => '','load' => '','size' => '');
if(!isset($valid_sort[$sort])) die($hackmess);

//DjAmolGroup Inc
$file_info = mysql_fetch_assoc(mysql_query('SELECT * FROM `files` WHERE `id` = '.$id));
if(!is_file($file_info['path'])) die('Файл не существует!');
$all_komments = (int)@mysql_num_rows(mysql_query('SELECT * FROM `komments` WHERE file_id = '.$id));
//DjAmolGroup Inc
$filename = pathinfo($file_info['path']);
$ext = strtolower($filename['extension']);
$dir = $filename['dirname'];
$filename = $filename['basename'];
$back = mysql_fetch_array(mysql_query("SELECT * FROM `files` WHERE `path` = '".clean($dir)."'"));
//DjAmol Group Inc

if($file_info['size'] < 1024) $file_info['size'] = $file_info['size'].'b';
if($file_info['size'] < 1048576 and $file_info['size'] >= 1024) $file_info['size'] = round($file_info['size']/1024, 2).'Kb';
if($file_info['size'] > 1048576) $file_info['size'] = round($file_info['size']/1024/1024, 2).'Mb';

###############DjAmolGroup Inc###################
echo '<div class="menu">Досье на файл '.$filename.'</div><div class="a">
<strong>Размер:</strong> '.$file_info['size'].'<br>
<strong>Скачано:</strong> '.$file_info['loads'].' раз(а)<br>';

###############WwW.DjAmol.Com###################
if($file_info['timeload'])
{
$file_info['timeload'] = date('d.m.Y (H:i)', $file_info['timeload']);
print '<strong>Недавнее скачивание:</strong><br>'.$file_info['timeload'].'<br>';
}
###############DjAmolGroup Inc################################
if($file_info['lastloader'])
{
print '<strong>Лоадером был:</strong><br>'.$file_info['lastloader'].'<br>';
}
$file_info['timeupload'] = date('d.m.Y (H:i)', $file_info['timeupload']);
########DjAmolGroup Inc
print '<strong>Время добавления:</strong><br>'.$file_info['timeupload'];
########DjAmolWap

if($ext == 'gif' or $ext == 'jpg' or $ext == 'jpe' or $ext == 'jpeg' or $ext == 'png'){
$arr = array('130x130','120x160','132x176','176x220','240x320');
echo '<hr noshade size="1" width="100%" class="hr"><strong>Особый размер:</strong>';
foreach($arr as $v){
list($W,$H) = explode('x',$v);
echo "<br><a href='dashboard.php?avp=im&?id=$id&amp;H=$H&amp;W=$W'>$v</a>";
}
}

###############Инфа о mp3###########################
if($ext == 'mp3' or $ext == 'wav')
{
include 'moduls/classAudioFile.php';
$AF = new AudioFile;
$AF->loadFile($file_info['path']);
$AF->printSampleInfo();

if($ext = 'mp3'){
print '[<strong><a href="apanel.php?action=id3&amp;id='.$id.'">Редактировать теги</a></strong>]';
}

}


// DjAmolGroup
elseif(($ext == '3gp' || $ext == 'avi' || $ext == 'mp4') && extension_loaded('ffmpeg')){
$mov = new ffmpeg_movie($file_info['path']);


// 80x80
print '<br><img src="dashboard.php?avp=ffmpeg&id='.$id.'&amp;W=80&amp;H=80" alt="prev">
<hr noshade size="1" width="100%" class="hr">
Koдeк: '.$mov->getVideoCodec().'<br>
Paзpeшeниe: '.$mov->GetFrameWidth().' x '.$mov->GetFrameHeight().'<br>
Bpeмя: '.round($mov->getDuration(),1).' сек<br>';

if($bt = $mov->getVideoBitRate()){
print 'Битpeйт: '.$bt.'<br>';
}
if($ac = $mov->getAudioCodec()){
print 'Aудиo: '.$ac.'<br>';
}
if($abt = $mov->getAudioBitRate()){
print 'Битpeйт: '.$abt.'<br>';
}

}


#############DjAmol Group##########################
if(is_file($setup['spath'].'/'.$filename.'.gif')){
echo '<hr noshade size="1" width="100%" class="hr"><strong>Скриншот:</strong><br><img src="'.$setup['spath'].'/'.$filename.'.gif" alt="screen"/>';
}
else{
echo '<br>[<strong><a href="apanel.php?action=screen&amp;id='.$id.'">Добавить скриншот</a></strong>]';
}

##########DjAmol Group#############################
if(!empty($file_info['about'])) //если оно в базе
{
$file_info['about'] = str_replace("\n", '<br>',$file_info['about']);
echo '<hr noshade size="1" width="100%" class="hr"><strong>Описание:</strong><br>'.$file_info[about];
}
elseif(is_file($setup['opath'].'/'.$filename.'.txt')) //DjAmol.Com
{
$f = str_replace("\n",'<br>',file_get_contents($setup['opath'].'/'.$filename.'.txt'));
echo '<hr noshade size="1" width="100%" class="hr"><strong>Описание:</strong><br>'.$f;
}
print '<br>[<a href="apanel.php?action=fast&amp;id='.$id.'"><strong>Добавить/изменить описание</strong></a>]';
###############WwW.DjAmol.Com#########################
if($setup['eval_change'] == 1)
{
$i = @round(($file_info['yes'])/($file_info['yes']+$file_info['no'])*100,0);
echo '<hr noshade size="1" width="100%" class="hr">
<strong>Рейтинг файла(+/-): <font color="#FF8000">'.$file_info['yes'].'</font>/<font color="#004080">'.$file_info['no'].'</font></strong>[<a href="apanel.php?id='.$file_info['id'].'&amp;action=cleareval">Сбросить</a>]<br>
<img src="dashboard.php?avp=rate&i='.$i.'" alt=""><br>
Полезный файл?: <a href="view.php?id='.$id.'&amp;eval=1"><strong>Да</strong></a>/<a href="view.php?id='.$id.'&amp;eval=0"><strong>Нет</strong></a>';
}

###########DjAmol.Com#########################
echo '</div><div class="a">';
if($setup['cut_change'] == 1)
{
if($ext == 'mp3' or $ext == 'wav'){
print '<a href="dashboard.php?avp=cut&?id='.$id.'"><strong>Нарезка</strong></a><br>';
}
}

############WwW.DjAmol.Com###################
if($setup['zip_change'] == 1)
{
if($ext == 'zip'){
print '<a href="dashboard.php?avp=zip&id='.$id.'"><strong>Просмотр архива</strong></a><br>';
}
}

###########Wap.DjAmol.Com#####################
if($setup['komments_change'] == 1)
{
echo '<a href="dashboard.php?avp=komm&id='.$id.'"><strong>Комментарии ['.$all_komments.'</strong>]</a>[<a href="apanel.php?id='.$file_info['id'].'&amp;action=clearkomm">Очистить</a>]<br>';
}


// Wap.DjAmol.Com
if($ext == 'txt'){
print '<a href="dashboard.php?avp=txt_zip&id='.$id.'">Скачать [ZIP]</a><br/>
<a href="dashboard.php?avp=txt_jar&id='.$id.'">Скачать [JAR]</a><br/>';
}

//DjAmol.Com
echo '<a href="dashboard.php?avp=load&id='.$id.'><strong>Скачать ['.ucfirst($ext).']</strong></a><br>';
if($ext == 'jar' and $setup['jad_change'] == 1){
echo '<a href="dashboard.php?avp=jad&id='.$id.'><strong>Скачать [Jad]</strong></a><br>';
}
//DjAmolGroup Inc
echo '</div>
<div class="a">- <a href="admin.php?cp=ipanel&id='.$back['id'].'">Назад</a><br>
- <a href="apanel.php">Админка</a></div>';

list($msec,$sec)=explode(chr(32),microtime());
//DjAmolGroup Inc
echo '<div class="title">'.round(($sec+$msec)-$HeadTime,4).' сек.<br>[&copy;DjAmol Group Inc.]</div></body></html>';

?>