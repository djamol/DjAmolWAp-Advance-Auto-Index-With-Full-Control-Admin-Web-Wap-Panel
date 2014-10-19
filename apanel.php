<?php

##########################################
//	DjAmol GRoup Inc.		//

//	WwW.DjAmol.Com			//
	
//	djamolpatil@gmail.com		//

//	Twitter.com/djamol		//

// Best Offer For New Buyer contact now //

//	http://ai.djamol.com/ <-Buy Now	//
##########################################
list($msec,$sec)=explode(chr(32),microtime());
$HeadTime=$sec+$msec;
include 'moduls/ini.php';
session_name ('SID') ;
session_start() ;
include 'moduls/fun.php';
include 'moduls/connect.php';
include 'moduls/header.php';
//
$id = intval($_GET['id']);
//
mysql_query('UPDATE `loginlog` SET `time`="", `access_num`=0 WHERE `id` = 1;');
$all = mysql_fetch_row(mysql_query('SELECT COUNT(`id`) FROM `loginlog`;'));
if($all[0] > 21)
{
$min = mysql_fetch_row(mysql_query('SELECT MIN(`id`) FROM `loginlog` WHERE `id` > 1;'));
$query = mysql_query('DELETE FROM `loginlog` WHERE `id` = '.$min[0]);
}
###################################################
$error = 0;
if(empty($_SESSION['autorise'])) $error = 1;
if($_SESSION['autorise']!= $setup['password']) $error = 1;
if(empty($_SESSION['ipu'])) $error = 1;
if($_SESSION['ipu']!=clean($ip)) $error = 1;
if($error==1) die($setup['hackmess'].'<div class="mp3t"><a href="cp">Admin Login</a><div>');
####################?????##########################

if($_GET['action']=='exit')
{
session_destroy();
echo 'You are successfully loged out.<br>
<a href="index.php">Downloads</a>';
}

##########################################
//	DjAmol GRoup Inc.		//

//	WwW.DjAmol.Com			//
	
//	djamolpatil@gmail.com		//

//	Twitter.com/djamol		//

// Best Offer For New Buyer contact now //

//	http://ai.djamol.com/ <-Buy Now	//
##########################################
switch($_GET['action']){
default:
include 'moduls/id3/getid3/write.idpanel.php';
echo '
        </b><font color="#00FF00">::</font> 
        </marquee></font></div>
<div class="mp3t">Files</div><div class="a">
<a href="admin.php?cp=ipanel">File Manager</a><br/>
<a href="apanel.php?action=upload">Upload file</a><br/>
<a href="apanel.php?action=import">Import files</a><br/>
<a href="apanel.php?action=import2">Import / Grub</a><br/>
<a href="admin.php?cp=rename">Mass renaming files</a><br/>
<a href="table/guest.php">Advance orders</a><br/>
<!--DjAmolGroup Inc. (WwW.DjAmol.Com) 
##########################################
//	DjAmol GRoup Inc.		//

//	WwW.DjAmol.Com			//
	
//	djamolpatil@gmail.com		//

//	Twitter.com/djamol		//

// Best Offer For New Buyer contact now //

//	http://ai.djamol.com/ <-Buy Now	//
##########################################-->
</div><div class="mp3t">Sections</div><div class="a">
<a href="admin.php?cp=razdel&action=1">Sections</a><br/>
<a href="admin.php?cp=blok&action=1">Close Access to SMS</a><br/>
<a href="admin.php?cp=blok&action=4">Close free-activation options</a><br/>
<a href="apanel.php?action=smsinfo">Reports</a><br/>
<a href="apanel.php?action=payset">Settings</a><br/>

</div><div class="mp3t">Comments</div><div class="a">
<a href="admin.php?cp=allkomm">All comments</a><br/>
<a href="apanel.php?action=cleankomm">Cleanup comments</a><br/>

<!--DjAmolGroup Inc. (WwW.DjAmol.Com)-->
</div><div class="mp3t">MySQL database</div><div class="a">
<a href="admin.php?cp=scan">Full update database</a><br/>
<a href="admin.php?cp=ipanel2">Semi-automatic update database</a><br/>
<a href="apanel.php?action=rot">Cleaning debris from the database</a><br/>
<a href="apanel.php?action=optm">Optimize DB</a><br/>
<a href="apanel.php?action=clean">Cleaning DB</a><br/>

</div><div class="mp3t">Settings</div><div class="a">
<a href="apanel.php?action=plug">Plugin</a><br/>
<a href="apanel.php?action=adset">Ads Setting</a><br/>
<a href="apanel.php?action=setting">Settings</a><br/>
<a href="apanel.php?action=lang">Language Setting</a><br/>
<a href="apanel.php?action=modules">Modules</a><br/>
<a href="apanel.php?action=atag">AutoMatic Mp3 Tag v2 Setting</a><br/>
<a href="apanel.php?action=id3">MP3 tag</a><br/>
<a href="apanel.php?action=mark">Tag Image</a><br/>
<a href="urlcopy.php">Url Copy file</a><br/>
<a href="urlmp3tag.php">Url Mp3 Tag</a><br/>
<a href="mp3tag.php">Mp3 Tag Manager</a><br/>
<a href="apanel.php?action=water2">WaterMark2</a><br/>
</div><div class="mp3t">Seach Engine Op.(SEO)</div><div class="a">
<a href="apanel.php?action=seo"">Sitemap</a><br/>


</div><div class="mp3t">Index/ Logo</div><div class="a">
<a href="html/index.php?file=added">Index Editor</a><br/>
<a href="html/index.php?file=ad1"">Ads Editor</a><br/>
<a href="apanel.php?action=buy">Header Logo</a><br/>
<a href="apanel.php?action=buy3">Footer Company Code</a><br/>

</div><div class="mp3t">Security</div><div class="a">
<a href="apanel.php?action=sec">Security</a><br/>
<a href="apanel.php?action=log">Log authorizations</a><br/>
<a href="apanel.php?action=exit">Exit</a></div>
<div class="search"><a href="/">Home</a><br/><a href="apanel.php?action=exit">Log OUt</a></div>';
break;

#########################################??????2222222####################################################################
case 'import2':
set_time_limit(99999);

if($_POST['url'])
{
$b = file('browser.dat');
$s = sizeof($b)-1;

$ot = trim($_POST['ot']);
$do = trim($_POST['do']);
$dir = trim($_POST['topath']);
$url = trim($_POST['url']);
$referer = trim($_POST['referer']);
$dir=''.$_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['PHP_SELF']).'/'.$topath;
if(strlen($ot)>1 && $ot[0]=='0'){
$null = substr_count($ot,'0');
for($i=0; $i<$null; ++$i){
$temp.= '0';
}
}


$ref = $get =array();

for($i=$ot; $i<=$do; ++$i)
{

if($temp!==false){
$num = $i/10;
if($num==1 || $num==10 || $num==100 || $num==1000 || $num==10000 || $num==100000 || $num==1000000){
$temp = substr($temp,0,-1);
}
}


if($temp!==false && $i!=$ot){
$get[].= str_replace('$',$temp.$i,$url);
$ref[].= str_replace('$',$temp.$i,$referer);
}
else{
$get[].= str_replace('$',$i,$url);
$ref[].= str_replace('$',$i,$referer);
}

}


mkdir($dir,0777);
chmod($dir,0777);

for($i=0; $i<=sizeof($get); $i++)
{
ini_set('user_agent',trim($b[rand(0,$s)])."\r\nReferer: $ref[$i]\r\nAccept: */*\r\nAccept-Charset: utf-8\r\nAccept-language: ru-RU");
if(copy($get[$i],$dir.basename($get[$i]))){++$g;}
}

chmod($dir,0755);

print 'Copied '.$g.' File(S)'; 
}
else
{
$dirs = mysql_query("SELECT `path` FROM `files` WHERE `size` = '0';");
print '<form action="'.$_SERVER['PHP_SELF'].'?action=import2" method="post">
<div>
Save:<br>
<select class="buttom" size="1" width="70" name="topath"><option value="'.$setup['path'].'/">./</option>';
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
URL<br/>
<input type="text" name="url" value="http://"/><br/>
Referer<br/>
<input type="text" name="referer" value="http://"/><br/>
Start with<br/>
<input type="text" name="ot" value="1"/><br/>
Finish<br/>
<input type="text" name="do" value="100"/><br/>
<input type="submit" value="Submit"/>
</div>
</form>FAQ(????)<br/>----------<br/>
For example, we write:<br/>
Where Copy - dir/<br/>
URL - http://wap.djamol.com/$.gif<br/>
Referer - http://wap.djamol.com/$.gif<br/>
Start with- 001 (do not start with all zeros)<br/>
Finish - 100<br/>----------';
}
if(!empty($faq)) echo "Where to copy - a folder on your host, where the files will be copied, the name \u003cbr/\u003e about this script, if this folder does not exist, it will be created<br/>
URL - address of the resource from which we download content, the $ symbol to be replaced <br/>Figures / LETTERS<br/>
Referer - referrer, the $ symbol will be replaced by the number / letter<br/>
In the parameters of 'Start with' and 'Finish' is entered Figures / letters from which will be launched <br/>count and who finished respectively<br/>
<br/>

<br/>
In this case somebody.com will be copied to your host files dir <br/>http://wap.djamol.com/001.gif, http://wap.djamol.com/002.gif ... <br/>http://wap.djamol.com/100.gif<br/>
<br/>
DjAmolgroup Inc.<br/>";
break;
#####################################??????????
case 'mark':
if(!$_POST){
print '<div class="mainzag">Tag Image<br>In the pictures will be marked specified label, remove it would be impossible<br></div>
<div class="row">
<form action="apanel.php?action=mark" method="post">
Inscription<br>
<input name="text" type="text"><br>
Location<br>
<select name="y">
<option value="top">top</option>
<option value="foot">below</option>
</select><br>
Font<br>
<input name="size" type="text" size="3" maxlength="1" value="2"><br>
????<br>
<input name="color[]" type="text" size="3" maxlength="3" value="200">
<input name="color[]" type="text" size="3" maxlength="3" value="200">
<input name="color[]" type="text" size="3" maxlength="3" value="200"><br>
<input class="buttom" type="submit" value="Submit">
</form>
</div>';
}
else{
@set_time_limit(0);

$q = mysql_query('SELECT `path` FROM `files` WHERE `path` LIKE "%.jpg" OR `path` LIKE "%.jpe" OR `path` LIKE "%.jpeg" OR `path` LIKE "%.gif" OR `path` LIKE "%.png"');
$all = mysql_num_rows($q);
$i = 0;
while($arr = mysql_fetch_row($q)){

$path = pathinfo($arr[0]);
if($path['extension'] == 'gif'){
$pic = imageCreateFromGif($arr[0]);
$f = 'imageGif';
}
elseif($path['extension'] == 'png'){
$pic = imageCreateFromPng($arr[0]);
$f = 'imagePng';
}
elseif($path['extension'] == 'jpg' || $path['extension'] == 'jpe' || $path['extension'] == 'jpeg'){
$pic = imageCreateFromJpeg($arr[0]);
$f = 'imageJpeg';
}
if($pic){
// ????
$color = imagecolorallocate($pic, $_POST['color'][0], $_POST['color'][1], $_POST['color'][2]);

// ????/???
if($_POST['y']=='foot'){
$y = imageSY($pic)-($_POST['size']*8);
}
else{
$y = 1;
}

imagestring($pic, $_POST['size'], (imageSX($pic)/2)-(strlen($_POST['text'])*3), $y, $_POST['text'], $color);

if($f($pic,$arr[0],100))
$i++;
}
$pic = null;
}

print 'Total Image: '.$all.', promarkerovany: '.$i;
}
break;


// ???????? MP3 ?????
case 'id3':

include 'moduls/id.php';
$id3 = &new MP3_Id();
$genres = $id3->genres();

if(!$_POST){

if($id){
$tmp = mysql_fetch_row(mysql_query('SELECT `path` FROM `files` WHERE `id`='.$id.' LIMIT 1'));
$id3->read($tmp[0]);

function code($str){
$charset = strtolower(mb_detect_encoding($str, 'UTF-8, Windows-1251'));
if($charset != 'utf-8'){
$str = iconv('windows-1251','utf-8',$str);
}
return $str;
}

$name = code($id3->name);
$artists = code($id3->artists);
$album = code($id3->album);
$year = code($id3->year);
$track = code($id3->track);
$genre = code($id3->genre);
$comment = code($id3->comment);


print '<div class="mainzag">MP3 Tag Editor<br></div>
<div class="row">
<form action="apanel.php?action=id3&amp;id='.$id.'" method="post">
Name<br>
<input name="name" type="text" value="'.$name.'"><br>
Artist<br>
<input name="artists" type="text" value="'.$artists.'"><br>
Album<br>
<input name="album" type="text" value="'.$album.'"><br>
Year<br>
<input name="year" type="text" value="'.$year.'"><br>
Track<br>
<input name="track" type="text" value="'.$track.'"><br>
Genre<br>
<select name="genre"><option value="'.$genre.'">'.$genre.'</option>';

foreach($genres as $var){
if($var == $genre){
continue;
}
$var = htmlspecialchars($var);
print '<option value="'.$var.'">'.$var.'</option>';
}

print '</select><br>
Comments<br>
<textarea name="comment" rows="2" cols="32">'.$comment.'</textarea><br>
<input class="buttom" type="submit" value="Submit">
</form>
</div>';
}
else{
print '<div class="mainzag">The module will set all the MP3 files, these tags. If the field is empty, the tag will not change<br></div>
<div class="row">
<form action="apanel.php?action=id3" method="post">
Name<br>
<input name="name" type="text"/><br>
Artist<br>
<input name="artists" type="text"/><br>
Album<br>
<input name="album" type="text"/><br>
Year<br>
<input name="year" type="text"/><br>
Track<br>
<input name="track" type="text"/><br>
Genre<br>
<select name="genre"><option value=""></option>';

foreach($genres as $var){
$var = htmlspecialchars($var);
print '<option value="'.$var.'">'.$var.'</option>';
}

print '</select><br>
Comments<br>
<textarea name="comment" rows="2" cols="32"></textarea><br>
<input class="buttom" type="submit" value="Submit">
</form>
</div>';
}
}
else{
if($id){
$tmp = mysql_fetch_row(mysql_query('SELECT `path` FROM `files` WHERE `id`='.$id.' LIMIT 1'));
$id3->read($tmp[0]);

$id3->name = iconv('utf-8','windows-1251',$_POST['name']);
$id3->artists = iconv('utf-8','windows-1251',$_POST['artists']);
$id3->album = iconv('utf-8','windows-1251',$_POST['album']);
$id3->year = iconv('utf-8','windows-1251',$_POST['year']);
$id3->track = iconv('utf-8','windows-1251',$_POST['track']);
$id3->genre = iconv('utf-8','windows-1251',$_POST['genre']);
$id3->comment = iconv('utf-8','windows-1251',$_POST['comment']);

$id3->write();

print 'Tags changed';
}
else{
$arr = array();

$q = mysql_query('SELECT TRIM(`path`) FROM `files`');
while($f = mysql_fetch_row($q)){
if(strtoupper(strrchr($f[0],'.'))=='.MP3'){
$arr[] = $f[0];
}
}

if($_POST['name']!=''){
$_POST['name'] = iconv('utf-8','windows-1251',$_POST['name']);
}
if($_POST['artists']!=''){
$_POST['artists'] = iconv('utf-8','windows-1251',$_POST['artists']);
}
if($_POST['album']!=''){
$_POST['album'] = iconv('utf-8','windows-1251',$_POST['album']);
}
if($_POST['year']!=''){
$_POST['year'] = iconv('utf-8','windows-1251',$_POST['year']);
}
if($_POST['track']!=''){
$_POST['track'] = iconv('utf-8','windows-1251',$_POST['track']);
}
if($_POST['genre']!=''){
$_POST['genre'] = iconv('utf-8','windows-1251',$_POST['genre']);
}
if($_POST['comment']!=''){
$_POST['comment'] = iconv('utf-8','windows-1251',$_POST['comment']);
}

$all = sizeof($arr);
for($i=0; $i<=$all; ++$i){
$id3->read($arr[$i]);

if($_POST['name']!=''){
$id3->name = $_POST['name'];
}
if($_POST['artists']!=''){
$id3->artists = $_POST['artists'];
}
if($_POST['album']!=''){
$id3->album = $_POST['album'];
}
if($_POST['year']!=''){
$id3->year = $_POST['year'];
}
if($_POST['track']!=''){
$id3->track = $_POST['track'];
}
if($_POST['genre']!=''){
$id3->genre = $_POST['genre'];
}
if($_POST['comment']!=''){
$id3->comment = $_POST['comment'];
}
$id3->write();
}

print 'Tags are set for '.$all.' file';
}
}
break;

##########################################
//	DjAmol GRoup Inc.		//

//	WwW.DjAmol.Com			//
	
//	djamolpatil@gmail.com		//

//	Twitter.com/djamol		//

// Best Offer For New Buyer contact now //

//	http://ai.djamol.com/ <-Buy Now	//
##########################################
case 'fast':


$file = mysql_fetch_array(mysql_query('SELECT * FROM `files` WHERE `id` = '.$id));
$filename = pathinfo($file['path']);
$filename = $filename['basename'];
$file_z=file_get_contents($setup['opath'].'/'.$filename.'.txt');
$file_f=$setup['opath'].'/'.$filename.'.txt';
echo $setup['opath'].'/'.$filename.'.txt<br/>';
//////////////////////////

if(!$_POST)
{
echo '<div class="mainzag">Description '.$file['name'].':</div>
<div class="row">
<form action="apanel.php?action=fast&amp;id='.$id.'" method="post" name="REPLIER">
<textarea class=enter cols="70" rows="10" name="text">'.htmlspecialchars($file_z).'</textarea><br><br>

<input class="buttom" type="submit" value="Submit">
</form></div>';
}
else
{
if($_POST['text']=='') $res='removed!'; 
else $res='Added!';
$fp = fopen($file_f,"w+"); //??????? ????
flock ($fp,LOCK_EX);
fputs($fp,bbcode(clean($_POST['text'])));
fflush ($fp);
flock ($fp,LOCK_UN);
fclose($fp);


echo 'Description '.$res.'<br><a href="admin.php?cp=view&id='.$id.'">The description</a>';}
break;

######################################Water Mark###################
case 'water2':

if(!$_POST)
{
echo '<form method="post" action="apanel.php?action=water2">';
echo '
Image Folder:<small>Ex:<b>files/Wallpaper/Car/</b></small><br />
<input type="text" name="imgfolder" value="files/" size="35" />
<br />
WaterMark Folder:<small>Ex:<b>files/Wallpaper/Car/</b></small><br />
<input type="text" name="imgfolder2" size="35" />
<br />
WaterMark Image(PNG):<small>Ex:<b>cp/watermark.png</b></small><br />
<input type="text" name="imgwater" value="cp/watermark.png" size="35" />
<br />
<input type="submit" value="Make Water" />
</form>
<div class="c"><!--DjAmolGroup Inc. (WwW.DjAmol.Com) 
##########################################
//	DjAmol GRoup Inc.		//

//	WwW.DjAmol.Com			//
	
//	djamolpatil@gmail.com		//

//	Twitter.com/djamol		//

// Best Offer For New Buyer contact now //

//	http://ai.djamol.com/ <-Buy Now	//
##########################################-->
<center><small>Images folder, must end with slash.<br>Path to the watermark image (apply this image as waretmark)<br>Work With Only jpg Files</small></center></div>';
}
else
{
///   DjAmol Group Inc.						///
///   Official Website   : www.djamol.com			///
///	GeT Updates Twitter: http://twitter.com/djamol
///	Email : admin@djamol.com, djamolpatil@gmail.com	///


// Images folder, must end with slash.
$images_folder = $_POST['imgfolder'];

// Save watermarked images to this folder, must end with slash.
$destination_folder = $_POST['imgfolder2'];

// Path to the watermark image (apply this image as waretmark)
$watermark_path = $_POST['imgwater'];

// MOST LIKELY YOU WILL NOT NEED TO CHANGE CODE BELOW

// Load functions for image watermarking
include("cp/app/djamolimg.class.php");

// Watermark all the "jpg" files from images folder
// and save watermarked images into destination folder
foreach (glob($images_folder."*.jpg") as $filename) {

  // Image path
  $image_path = $filename;

  // Where to save watermarked image
  $imgdestpath = $destination_folder . basename($filename);

  // Watermark image
  $img = new Zubrag_watermark($image_path);
  $img->ApplyWatermark($watermark_path);
  $img->SaveAsFile($imgdestpath);
  $img->Free();
echo '<a href="'.$imgdestpath.'">'.$filename.'</a><br>';
}

echo '<a href="apanel.php">Admin</a>';}
break;

######################################???######################################################
case 'pos':
$file_info = mysql_fetch_assoc(mysql_query('SELECT `name`,`path` FROM `files` WHERE `id`='.$id));
if(!is_dir($file_info['path'])) die('Error');
$file_info['name'] = str_replace('*','',$file_info['name']);
if($_GET['to'] == 'down'){
$query = 'UPDATE `files` SET `priority`=`priority`-1 WHERE `id` = '.$id;
}
elseif($_GET['to'] == 'up'){
$query = 'UPDATE `files` SET `priority`=`priority`+1 WHERE `id` = '.$id;
}
if(mysql_query($query)){
echo '<div class="mainzag">Priority directory '.$file_info['name'].' changed!</div>';
}
else{
echo '<div class="minizag">Failed to change priority</div>';
}
break;

######################################???######################################################
case 'rot':
$delfiles = 0;
$reses = mysql_query('SELECT `id`,`path` FROM `files`;');
while($array = mysql_fetch_assoc($reses)){
$array_path[$array['id']] = $array['path'];
}
foreach($array_path as $key=>$value){
if(file_exists($value)==false ){
$res = mysql_query('DELETE FROM `files` WHERE `id` = '.$key);
$res = mysql_query('DELETE FROM `komments` WHERE `file_id` = '.$key);
$delfiles++;
}
}
echo '<div class="mainzag">Database successfully updated!</div><div class="row">To remove the incorrect entries: '.$delfiles.'</div>';
break;

######################################???######################################################
case 'editabout':
$file_info = mysql_fetch_assoc(mysql_query('SELECT `id`,`fastabout`,`name`,`path` FROM `files` WHERE `id` = '.$id));
$file_info['name'] = str_replace('*','',$file_info['name']);
if(!is_dir ($file_info['path']) and !is_file($file_info['path'])) die('Error');
if(!$_POST){
echo '<div class="mainzag">File description '.$file_info['name'].':</div>
<div class="row">
<form action="apanel.php?action=editabout&amp;id='.$id.'" method="post" name="REPLIER">
<textarea class="enter" cols="50" rows="7" name="text">'.htmlspecialchars($file_info['fastabout']).'</textarea><br><br>
<input class="buttom" type="submit" value="Add">
</form>
</div>';
}
else{
$write_bd = mysql_query("UPDATE `files` SET fastabout='".bbcode(clean($_POST['text']))."' WHERE `id` = ".$id);
echo 'Short description changed!';
}
break;
######################################???? (???,????????)######################################################
case 'smsinfo':
$gocount=file("gocount.txt");
// ?? ???????
$today=@intval($gocount[0]);
// ?????
$all=@intval($gocount[1]);
// ???? ?????????? ??????
echo '<div class="menu">Activation options :</div>
<div class="a">
Today: '.$today.' person (s)<br/> 
Altogether: '.$all.' person (s)<br/>
</div><div class="menu">SMS :</div><div class="a">
Altogether: '.$setup['send_sms'].' person (s)<br/>
</div>';
break;

######################################???######################################################
case 'flash':
$file_info = mysql_fetch_assoc(mysql_query('SELECT `path` FROM `files` WHERE `id` = '.$id.' AND `size` = 0;'));
if(!is_dir($file_info['path'])) die('This category does not exist.');
function scaner ($paths)
{
$paths = $paths.'/*';
$array = glob($paths);
static $file_aray;
foreach($array as $vv)
{
if(is_dir($vv)){
$file_aray[] = $vv.'/';
scaner($vv);
}
else{
if(basename($vv)=='folder.png') continue;
$file_aray[] = $vv;
}
}
return $file_aray;
}
$file_array = scaner(substr($file_info['path'],0,strlen($file_info['path'])-1));
$addfolder = $addfiles = $addfilesbad =0;
$reses = mysql_query('SELECT `id`,`path` FROM `files`;');
while($array = mysql_fetch_assoc($reses)){
$array_path[$array['id']] = $array['path'];
}
foreach($file_array as $value){
if(@in_array($value,$array_path)===false)
{
$upltime = filectime($value);
$name = basename($value);
$pathinfo = pathinfo($value);
$ext = $pathinfo['extension'];
$name = str_replace('.'.$ext,'',$name);
$infolder = dirname($value).'/';
$size = filesize($value);
if(is_dir($value) AND preg_match('|([?-??-?]+)|',$name)==False){
if(strpos($name , '!') !== false){
$name = trans($name);
}
else{
$name = trans2($name);
}
mysql_query("INSERT INTO `files` (`path`, `name`, `infolder`, `timeupload`, `loads`, `yes` ) VALUES ('$value', '*".$name."', '$infolder', '9999999999', '9999999999', '9999');");
$addfolder++;
}
elseif(preg_match('|([?-??-?]+)|',$name)==False){
if(strpos($name , '!') !== false){
$name = trans($name);
}
else{
$name = trans2($name);
}
mysql_query("INSERT INTO `files` (`path`, `name`, `infolder`, `size` , `timeupload`) VALUES ('$value', '$name', '$infolder' , '$size' , '$upltime');");
$addfiles++;
}
else $addfilesbad++;
}
}
echo '<div class="menu">Database successfully updated!</div><div class="row">Added folders: '.$addfolder.' <br>Upload file: '.$addfiles.'<br>';
if ($addfilesbad>0) echo 'Not Added:'.$addfilesbad.'</div>';
break;
######################################???######################################################
case 'flash1':
$file_info = mysql_fetch_assoc(mysql_query('SELECT `path` FROM `files` WHERE `id` = '.$id.' AND `size` = 0;'));
if(!is_dir($file_info['path'])) die('This category does not exist.');
function scaner ($paths)
{
$paths = $paths.'/*';
$array = glob($paths);
static $file_aray;
foreach($array as $vv)
{
if(is_dir($vv)){
$file_aray[] = $vv.'/';
scaner($vv);
}
else{
if(basename($vv)=='folder.png') continue;
$file_aray[] = $vv;
}
}
return $file_aray;
}
$file_array = scaner(substr($file_info['path'],0,strlen($file_info['path'])-1));
$addfolder = $addfiles = 0;
$reses = mysql_query('SELECT `id`,`path` FROM `files`;');
while($array = mysql_fetch_assoc($reses)){
$array_path[$array['id']] = $array['path'];
}
foreach($file_array as $value){
if(@in_array($value,$array_path)===false)
{
$upltime = filectime($value);
$name = basename($value);
$pathinfo = pathinfo($value);
$ext = $pathinfo['extension'];
$name = str_replace('.'.$ext,'',$name);
$infolder = dirname($value).'/';
$size = filesize($value);
if(strpos($name , '!') !== false){
$name = trans($name);
}
else{
$name = trans2($name);
}
if(is_dir($value)){

}
else{
$query = mysql_query("INSERT INTO `files` (`path`, `name`, `infolder`, `size` , `timeupload`) VALUES ('$value', '$name', '$infolder' , '$size' , '$upltime');");
$addfiles++;
}
}
}
echo '<div class="mainzag">Database successfully updated!</div><div class="row">Upload file: '.$addfiles.'</div>';
break;
#########################################################################################
case 'log':
$query = mysql_query('SELECT * FROM `loginlog` WHERE `id` > 1 ORDER BY `time` DESC;');
echo '<div class="mainzag "> Log last 20 visits to admin([UserAgent][IP][Time]):</div><div class="row">';
while($log = mysql_fetch_assoc($query)){
echo '<strong>[</strong>'.$log['ua'].'<strong>][</strong>'.$log['ip'].'<strong>][</strong>'.date('d.m.Y (H:i)',$log['time']).'<strong>]</strong><br>';
}
echo '</div>';
break;

############folder logo#####################################################
case 'addico':
$file_info = mysql_fetch_assoc(mysql_query('SELECT * FROM `files` WHERE `id` = '.$id));
if(!$_FILES)
{
echo '<div class="mainzag">Loading icons to a folder</div>
<div class="row">
<form action="apanel.php?action=addico&amp;id='.$id.'" method="post" enctype="multipart/form-data">
The file will be copied to the destination folder:<br>
<input name="ico" type="file"><br>
<input class="buttom" type="submit" value="Add">
</form>
</div>';
}
else
{
$name = $_FILES['ico']['name'];
$ext = pathinfo($name);
$ext = strtolower($ext['extension']);
$to = $file_info['path'].'folder.png';
if($ext=='php' or $ext=='php3' or $ext=='php4' or $ext=='php5' or $ext=='php6' or $ext=='phtml' or $ext=='cgi' or $ext=='asp' or $ext=='js' or $ext=='phtm' or $ext=='py' or $ext=='pl') die ($setup['hackmess']);
if($ext!='png') die('Supports only png format icons');
if(file_exists($to)) die('File already exists');
chmod($file_info['path'], 0777);
if(move_uploaded_file($_FILES['ico']['tmp_name'], $to))
{
echo 'Downloading icon successful.<br>';
chmod($to, 0644);
}
else{
echo 'Downloading icons ended unsuccessfully.<br>';
//chmod($file_info['path'], 0777);
}
}
break;

######################################???######################################################
case 'reico':
$file_info = mysql_fetch_assoc(mysql_query('SELECT * FROM `files` WHERE `id` = '.$id));
if(!file_exists($file_info['path'].'folder.png')) die('Icons in this folder does not exist');
chmod($file_info['path'].'folder.png',0777);
if(unlink($file_info['path'].'folder.png')) echo 'Remove icon was successful.<br>';
else echo 'Removing icons ended unsuccessfully.<br>';
break;
########Plugin Setting##########
case 'plug':
include 'cp/ClassDj_AmolWap/plug.php';
break;
########Auto Mp3 Tag Setting##########
case 'atag':
include 'cp/ClassDj_AmolWap/atag.php';
break;
########Change Default Language Setting##########
case 'lang':
include 'moduls/config.php';
if(!$_GET['change'])
{
echo "<div class='mp3t' align='center'>SELECT Default Website Language:</div>
<form action='apanel.php?action=lang&change=1' method='post'>
<center><div class='djafile2'>Web Site Address:<small>Eg :http://djamol.com/mobile/</small></div>
<input name='wapsite' type='text' value='$wapsite'>
<div class='djafile2'>Default Language:</div>
<select name='lang'><option value='en'>English</option><option value='ur'>(Urdu)????</option><option value='ru'>(Russian)??????</option><option value='hl'>(Hindi)?????</option><option value='gu'>(Gujrati)???????</option>
</select> <br>
<input type='image' src='cp/ClassDj_AmolWap/button.png' name='submit'> </center>
</form>";
}else{
@chmod('moduls/config.php',0666);
$file = fopen('moduls/config.php','w');
fputs($file,'<?php
$SERVERmysql = \''.$SERVERmysql.'\';
$DB = \''.$DB.'\';
$DB_USER = \''.$DB_USER.'\';
$DB_PASS = \''.$DB_PASS.'\';
$wapsite = \''.$_POST[wapsite].'\';
$dlang = \''.$_POST[lang].'\';
?>') or die('It is not possible to write data to a file moduls / config.php');
fclose($file);
echo 'Setting Save......Done';
}
break;
########Ad setting##########
case 'adset':
include 'cp/ClassDj_AmolWap/adset.php';
break;
############################Edit File Setting ############################################
case 'fetch':
if(!$_POST['id'])
{ 
echo '<div class="mp3t">opps wrong select section for edit Setting<div>';
}
else
{
$id = $_POST[id];
@chmod('moduls/app/'.$id.'.php',0666);
$file = fopen('moduls/app/'.$id.'.php','w');
include 'cp/ClassDj_AmolWap/fetch.php';
fclose($file);
###############DjAmol Group###############
//   DjAmolwap 12v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############
@chmod('moduls/app/'.$id.'.php',0644);
###############DjAmol Group###############
//      http://ai.djamol.com            //
###############DjAmol Group###############

print '<div class="mp3t" align="center">Plugin/Config (('.$id.')) Setting Successfully Saved</div><div class="panel1"><a href="apanel.php">Admin Panel</a></div>';
}

print '</body></html>';
break;
######################################???????????###############################################
case 'unpack':
$file = mysql_fetch_assoc(mysql_query('SELECT * FROM `files` WHERE `id` = '.$id));
$dir = dirname($file['path']).'/';
chmod($folder['path'], 0777);
include 'moduls/pclzip.lib.php';
$zip = new PclZip($file['path']);
if(!$zip->extract(PCLZIP_OPT_PATH, $dir)) die('Error while unpacking.'); else die('Ahriv unpacked in '.$dir.'<br>Do not forget to update the database.');
chmod($folder['path'], 0777);
break;

######################################???????? ?????######################################################
case 'redir':
if($setup['delete_dir']==0) die($hackmess);
if(!$_GET['level']){
echo 'This will delete all files in the directory and the directory. Continue?<br><a href="apanel.php?action=redir&amp;level=1&amp;id='.$id.'">Yes, continue</a>';
}
else{
$file = mysql_fetch_assoc(mysql_query('SELECT * FROM `files` WHERE `id` = '.$id.' ORDER BY `name`;'));
if(!is_dir ($file['path'])) die('This category does not exist!');

$ex = explode('/',$file['path']);
$f_chmod = null;
foreach($ex as $chmod){
$f_chmod.=$chmod.'/';
chmod($f_chmod,0777);
}

$array = glob($file['path'].'*');
foreach($array as $vv){
if(is_dir($vv)) die('Allowed only delete folders with a nesting level!');
else{
if(!unlink($vv)) die('Removing file '.$vv);
}
}
$query = mysql_query("DELETE FROM `files` WHERE `infolder` = '".$file['path']."'") or die('Error while deleting files from the database');

if(!rmdir($file['path'])) die('Error deleting directory');
$query = mysql_query('DELETE FROM `files` WHERE `id` = '.$id) or die('Error while removing a directory from the database');


$f_chmod = null;
foreach($ex as $chmod){
$f_chmod.=$chmod.'/';
if($f_chmod!=$setup['path'].'/'){
chmod($f_chmod.'/',0777);
}
}


echo 'Directory successfully deleted!';
}
break;

######################################???????? ?????###############################################
case 'refile':
if($setup['delete_dir']==0) die($hackmess);
$file = mysql_fetch_assoc(mysql_query('SELECT * FROM `files` WHERE `id` = '.$id.' ORDER BY `name`;'));
if(!is_file ($file['path'])) die('This file does not exist!');


$ex = explode('/',$file['path']);
$f_chmod = null;
foreach($ex as $chmod){
$f_chmod.=$chmod;
if(is_dir($f_chmod)){
$f_chmod = $f_chmod.'/';
}

chmod($f_chmod,0777);
}

if(!unlink($file['path'])) die('Removing file '.$file['path']);
$query = mysql_query('DELETE FROM `files` WHERE `id` = '.$id) or die('Error deleting a file from the database');

$f_chmod = null;
foreach($ex as $chmod){
$f_chmod.=$chmod;
if(is_dir($f_chmod)){
$f_chmod = $f_chmod.'/';
}

if($f_chmod!=$setup['path'].'/'){
chmod($f_chmod,0777);
}
}

echo 'File <strong>'.$file['name'].'</strong> deleted!';
break;

######################################???????##################################################
case 'buy':
if(!$_POST)
{
$file = mysql_fetch_array(mysql_query('SELECT * FROM `files` WHERE `id` = '.clean($id)));
echo '<div class="menu">Advertising block top:</div>
<div class="a">
<form action="apanel.php?action=buy" method="post">
<textarea class="enter" cols="70" rows="10" name="text">'.$setup['buy'].'</textarea></div>
<div class="menu">Advertising block downhill:</div>
<div class="a"><textarea class="enter" cols="70" rows="10" name="buy2">'.$setup['buy2'].'</textarea></div><div class="a">
<input name="randbuy" type="checkbox" value="1" '.check($setup['randbuy']).'>The output of the random links<br>
<input name="buy_change" type="checkbox" value="ON" '.check($setup['buy_change']).'>Incl.</div><div class="a">
<input class="buttom" type="submit" value="Save"></form></div>';
}
else
{
$_POST['randbuy'] = intval($_POST['randbuy']);
if($_POST['text']=='') die('Do not fill out the field.');
$query = mysql_query("UPDATE `setting` SET `value`='".clean($_POST['text'])."' WHERE `name` = 'buy';");
$query = mysql_query("UPDATE `setting` SET `value`='".clean($_POST['buy2'])."' WHERE `name` = 'buy2';");
if ($_POST['buy_change'] == 'ON') $_POST['buy_change']=1; else $_POST['buy_change']=0;
$query = mysql_query("UPDATE `setting` SET `value` = '".intval($_POST['buy_change'])."' WHERE `name` = 'buy_change';");
$query = mysql_query("UPDATE `setting` SET `value`='".$_POST['randbuy']."' WHERE `name` = 'randbuy';");
echo 'Settings saved.';
}
break;
######################################??????? ????? ????????,???????
case 'buy3':
if(!$_POST)
{
$file = mysql_fetch_array(mysql_query('SELECT * FROM `files` WHERE `id` = '.clean($id)));
echo '
<form method="post" action="apanel.php?action=buy3"">
<div class="a"><textarea class="enter" cols="70" rows="10" name="buy3">'.$setup['buy3'].'</textarea><br>
<input class="buttom" type="submit" value="Save"></form></div>';
}
else
{
$query = mysql_query("UPDATE `setting` SET `value`='".clean($_POST['buy3'])."' WHERE `name` = 'buy3';");
echo 'Settings saved.';
}
break;
######################################??????????????##################################################
case 'rename':

$file = mysql_fetch_assoc(mysql_query('SELECT * FROM `files` WHERE `id` = '.$id));
if(!$_POST)
{
if(is_dir($file['path'])) $file['name'] = str_replace('*','',$file['name']);
echo '<div class="mainzag">Enter a new name :</div>
<div class="row">
<form method="post" action="apanel.php?action=rename&amp;id='.$id.'"">
<input class="enter" type="text" name="newname" size="70" value="'.$file['name'].'"><br>
<input class="buttom" type="submit" value="Done" >
</form></div>';
}
else
{
$newname = clean(del($_POST['newname']));
if(is_dir($file['path'])) $newname = '*'.$newname;
$query = mysql_query("UPDATE `files` SET name='".$newname."' WHERE `id` = ".$id);
$error = mysql_error();
if($error) die('Error renaming.<br>'.$error);
echo 'File renamed.';
}
break;

#########################################??????? ????????? ? ?????#########################################
case 'clearkomm':
$query = mysql_query('DELETE FROM `komments` WHERE `file_id` = '.$id);
$error = mysql_error();
if($error) die('Error reset.<br>'.$error);
echo 'Comments removed.';
break;

##############################################??????? ???????? ? ?????#######################################
case 'cleareval':
$query = mysql_query('UPDATE `files` SET `ips`="",`yes`=0,`no`=0 WHERE `id` = '.$id);
$error = mysql_error();
if($error) die('Error reset.<br>'.$error);
echo 'Rating deleted.';
break;

#############################################??????????? ??###########################################
case 'optm':
mysql_query('OPTIMIZE TABLE `files`;');
mysql_query('OPTIMIZE TABLE `komments`;');
mysql_query('OPTIMIZE TABLE `loginlog`;');
mysql_query('OPTIMIZE TABLE `online`;');
mysql_query('OPTIMIZE TABLE `setting`;');
echo 'Databases are optimized.';
break;

################################################??????? ??########################################
case 'clean':
if(!$_GET['level'])
{
echo 'This will delete all data on the database, including descriptions, counters downloads, ratings and comments. okay?<br><a href="apanel.php?action=clean&amp;level=1">Yes, continue</a>';
}
else
{
mysql_query('TRUNCATE TABLE `files`;');
mysql_query('TRUNCATE TABLE `komments`;');

echo 'Database cleaned.<br>';
}
break;

##########################################??????? ???? ?????????##############################################
case 'cleankomm':
if(!$_GET['level'])
{
echo 'This will delete all comments to the files! Continue?<br><a href="apanel.php?action=cleankomm&amp;level=1">Yes, continue</a>';
}
else
{
$result = mysql_query('TRUNCATE TABLE `komments`;');
echo 'Database comments clean.<br>';
}
break;

#########################################?????????? ? ????????? ????????#########################################
case 'about':

$file = mysql_fetch_assoc(mysql_query('SELECT * FROM `files` WHERE `id` = '.$id));
if(!$_POST)
{
echo '<div class="mainzag">File description '.$file['name'].':</div>
<div class="row">
<form action="apanel.php?action=about&amp;id='.$id.'" method="post" name="REPLIER">
<textarea class="enter" cols="70" rows="10" name="text">'.htmlspecialchars($file['about']).'</textarea><br><br>
<input class="buttom" type="submit" value="Submit"></form></div>';
}
else
{
if($_POST['text']=='') $res='deleted'; else $res='Added';
$filename = pathinfo($file['path']);
$dir = $filename['dirname'];
$back = mysql_fetch_assoc(mysql_query("SELECT `id` FROM `files` WHERE `path` = '".bbcode(clean($dir))."';"));
$write_bd = mysql_query("UPDATE `files` SET about='".bbcode(clean($_POST['text']))."' WHERE `id` = ".$id);
echo "Description $res
<br><a href='admin.php?cp=ipanel&id=".$back['id']."'>File Manager</a>
<br><a href='admin.php?cp=view&id=".$id."'>The description</a>";
}
break;

#########################################??????####################################################################
case 'import':
if(!$_POST)
{
$dirs = mysql_query('SELECT `path` FROM `files` WHERE `size` = 0');
echo '<div class="mainzag">Import files</div>
<div class="row">
Save:<br>
<form action="apanel.php?action=import" method="post" name="REPLIER">
<select class="buttom" size="1" width="70" name="topath"><option value="'.$setup['path'].'/">./</option>';
while($item = mysql_fetch_assoc($dirs)){
$name = str_replace($setup['path'].'/','',$item['path']);
$path = explode('/',$name);
$option = '';
unset($path[sizeof($path)-1]);
foreach($path as $value){
if(strpos($value , '!') !== false) $name = trans($value); else $name = $value;
$option = $option.$name.'/';
}
echo '<option value="'.$item['path'].'">'.$option.'</option>';
}

echo '</select><br>
Files:<br>
<textarea class="enter" cols="70" rows="10" name="files"></textarea><br><br>
<input class="buttom" type="submit" value="Imports">
</form></div>';
}
else
{
$newpath = trim($_POST['topath']);
if(empty($newpath)) die ('No final journey!');
$text=explode("\n",$_POST['files']);
for($i=0; $i<sizeof($text); $i++)
{
$parametr = explode('#',trim($text[$i]));
if(!isset($parametr[1])) $parametr[1] = basename(trim($parametr[0]));
$to = $newpath.trim($parametr[1]);
if(file_exists($to)) die('File '.$to.' exists<br>');
$ex = pathinfo(trim($parametr[0]));
$ext = strtolower($ex['extension']);
if($ext=='php' or $ext=='php3' or $ext=='php4' or $ext=='php5' or $ext=='php6' or $ext=='phtml' or $ext=='cgi' or $ext=='asp' or $ext=='js' or $ext=='phtm' or $ext=='py' or $ext=='pl') die ($setup[hackmess]);
chmod($newpath, 0777);

@ini_set('user_agent',$_SERVER['HTTP_USER_AGENT']);
if(copy(trim($parametr[0]),$to))
{
echo 'Import File '.$parametr[1].' successfull<br>';
$upltime = filectime($to);
$ex = pathinfo($to);
$ex = $ex['extension'];
$name = str_replace('.'.$ex,'',basename($to));
if(strpos($name , '!') !== false){
$name = trans($name);
}
else{
$name = trans2($name);
}
$size = filesize($to);
$infolder = dirname($to).'/';
$query = mysql_query("INSERT INTO `files` (`path`, `name`, `infolder`, `size` , `timeupload`) VALUES ('$to', '$name', '$infolder' , '$size' , '$upltime');");
}
else echo 'Import File '.$parametr[1].' failed<br>';
}
chmod($newpath, 0777);
}
break;
#####################################

###################################################
case 'seo':
echo '<h1>DjAmolWap13v Seo Service</h1>
<h3>1.Submit Sitemap Without Login Webmaster</h3><br>
<br>	<b>Google</b>---	  <a href="http://www.google.com/webmasters/tools/ping?sitemap=http://'.$_SERVER['SERVER_NAME'].'/xml/sitemap/folder.xml target="_Blank">Folder</a>  &  <a href="http://www.google.com/webmasters/tools/ping?sitemap=http://'.$_SERVER['SERVER_NAME'].'/xml/sitemap/folder.xml" target="_Blank">Files</a>
<br>	<b>Bing</b>---	  <a href="http://www.bing.com/webmaster/ping.aspx?siteMap=http://'.$_SERVER['SERVER_NAME'].'/xml/sitemap/folder.xml" target="_Blank">Folder</a>  &  <a href="http://www.bing.com/webmaster/ping.aspx?siteMap=http://'.$_SERVER['SERVER_NAME'].'/xml/sitemap/folder.xml" target="_Blank">Files</a>
<br>	<b>Yahoo</b>---	  <a href="http://search.yahooapis.com/SiteExplorerService/V1/updateNotification?appid=YahooDemo&amp;url=http://'.$_SERVER['SERVER_NAME'].'/xml/sitemap/folder.xml" target="_Blank">Folder</a>  &  <a href="http://search.yahooapis.com/SiteExplorerService/V1/updateNotification?appid=YahooDemo&amp;url=http://'.$_SERVER['SERVER_NAME'].'/xml/sitemap/folder.xml" target="_Blank">Files</a><small>(Yahoo Using Bing Data)</small>
<br>	<b>Ask</b>---	  <a href="http://submissions.ask.com/ping?sitemap=http://'.$_SERVER['SERVER_NAME'].'/xml/sitemap/folder.xml" target="_Blank">Folder</a>  &  <a href="http://submissions.ask.com/ping?sitemap=http://'.$_SERVER['SERVER_NAME'].'/xml/sitemap/folder.xml" target="_Blank">Files</a>
<br>	<b>Moreover</b>---	  <a href="http://api.moreover.com/ping?u=http://'.$_SERVER['SERVER_NAME'].'/xml/sitemap/folder.xml" target="_Blank">Folder</a>  &  <a href="http://api.moreover.com/ping?u=http://'.$_SERVER['SERVER_NAME'].'/xml/sitemap/folder.xml" target="_Blank">Files</a>
<br><h3>2. Submit Your Sitemap Link Google Yahoo Bing Ask Search Engine Login With Webmaster</h3><br>
Create By DjAmolWap12v : Sitemap Link<br>
<!--DjAmolGroup Inc. (WwW.DjAmol.Com) 
##########################################
//	DjAmol GRoup Inc.		//

//	WwW.DjAmol.Com			//
	
//	djamolpatil@gmail.com		//

//	Twitter.com/djamol		//

// Best Offer For New Buyer contact now //

//	http://ai.djamol.com/ <-Buy Now	//
##########################################-->
<b>http://'.$_SERVER['SERVER_NAME'].'/xml/sitemap/files.xml</b>  - All files<br>
<b>http://'.$_SERVER['SERVER_NAME'].'/xml/sitemap/folder.xml</b>  - All folder<br>
<b>Multi Language SiteMap :</b>Sitemap Url(Eg. ..xml/sitemap/files.xml?l=[enter Language Code(en,gu,hl,ru])<br>
Link Of Webmasters ::<a href="http://www.google.com/webmasters/tools/">Google</a>||<a href="http://www.bing.com/webmaster/">Bing</a>||<a href="https://siteexplorer.search.yahoo.com/">Yahoo</a>::
';
break;
case 'rtxt':
echo '<h2>Edit Your Robots</h2>';
$file = 'robots.txt';

if (isset($_POST['edit']))
{
  $contents = stripslashes($HTTP_POST_VARS['edit_file']);

  $handle = fopen($file, 'w');
  fwrite($handle, $contents);
  fclose($handle);

  echo "\n<br />Robots Updated Successfully!<br />\n";
}

$contents = (@file_get_contents($file)) ? htmlspecialchars(file_get_contents($file)) : 'Error: file NOt Found <b>robots.txt</b> Contact To djamolpatil@gmail.com';

echo '<br /><form method="post">
<textarea name="edit_file" wrap="virtual" cols="30" rows="2">' . $contents . '</textarea>
<br /><br /><input type="submit" name="edit" value="Save"></form>
</div>';
echo '<h2>Reset/ Defualt Robot Setting</h2>
<br>Copy And Paste in Edit Robots Section Click On Save<br> <textarea name="restart" wrap="virtual" cols="30" rows="2">User-agent: *
Allow: /
sitemap: http://'.$_SERVER['SERVER_NAME'].'/xml/sitemap/files.xml
sitemap: http://'.$_SERVER['SERVER_NAME'].'/xml/sitemap/folder.xml</textarea>';
include 'cp/app/robo.html';
break;
#####################################?????? ??????###################################################
case 'screen':
$info = mysql_fetch_assoc(mysql_query('SELECT * FROM `files` WHERE `id` = '.$id));
$nf = pathinfo($info['path']);
$filename = $nf['basename'];
if(!is_file($setup['spath'].'/'.$filename.'.gif')){
if(!$_FILES)
{
echo '<div class="mainzag">Download Scrin</div>
<div class="row">
<form action="apanel.php?action=screen&amp;id='.$id.'" method="post" enctype="multipart/form-data">
The file will be copied to a folder with screenshots:<br>
<input name="scr" type="file"><br>
<input class="buttom" type="submit" value="Add">
</form>';
}
else
{
$name = $_FILES['scr']['name'];
$ex = pathinfo($name);
$ext = strtolower($ex['extension']);
$filenm = pathinfo($info['path']);
$to = $setup['spath'].'/'.$filenm['basename'].'.gif';
if($ext!='gif' && $ext!='jpg' && $ext!='jpe' && $ext!='jpeg' && $ext!='png') die('Supports screens only gif, jpeg, png formats');
if(file_exists($to)) die('File already exists');
chmod($setup['spath'], 0777);

if(move_uploaded_file($_FILES['scr']['tmp_name'], $to)){
echo 'Downloading Scrin '.$name.' successful.<br>';

chmod($to,0666);

if($ext=='jpg' || $ext=='jpe' || $ext=='jpeg'){
$im = imagecreatefromjpeg($to);
imagegif($im,$to);
imagedestroy($im);
}
elseif($ext=='png'){
$im = imagecreatefrompng($to);
imagegif($im,$to);
imagedestroy($im);
}

}
else{
echo 'Downloading Scrin '.$name.' ended unsuccessfully.<br>';
}
}
}
else {
chmod($setup['spath'], 0777);
unlink ($setup['spath'].'/'.$filename.'.gif');
}
break;
#####################################?????? ?????? ??? ????????###################################################
case 'screen1':
$info = mysql_fetch_assoc(mysql_query('SELECT * FROM `files` WHERE `id` = '.$id));
$nf = pathinfo($info['path']);
$filename = $nf['basename'];
if(is_file($setup['spath'].'/'.$filename.'.gif')) //???? ???? ?????
 {
 echo '<font color="red">Srin already exists:</font><a href="'.$setup['spath'].'/'.$filename.'.gif">View</a>/<a href="apanel.php?action=delscreen&amp;id='.$id.'">Delete</a><br/>';

 }
else { 
if(!$_FILES)
{
echo '<div class="mainzag">Download Scrin</div>
<div class="row">
<form action="apanel.php?action=screen1&amp;id='.$id.'" method="post" enctype="multipart/form-data">
The file will be copied to a folder with screenshots:<br>
<input name="scr" type="file"><br>
<input class="buttom" type="submit" value="Add">
</form>';
}
else
{
$name = $_FILES['scr']['name'];
$ex = pathinfo($name);
$ext = strtolower($ex['extension']);
$filenm = pathinfo($info['path']);
$to = $setup['spath'].'/'.$filenm['basename'].'.gif';
if($ext!='gif' && $ext!='jpg' && $ext!='jpe' && $ext!='jpeg' && $ext!='png') die('Supports screens only gif, jpeg, png formats');
if(file_exists($to)) die('File already exists');
chmod($setup['spath'], 0777);

if(move_uploaded_file($_FILES['scr']['tmp_name'], $to)){
echo 'Downloading Scrin '.$name.' successful.<br>';
 echo '<a href="'.$setup['spath'].'/'.$filename.'.gif">View</a>/<a href="apanel.php?action=delscreen&amp;id='.$id.'">Delete</a><br/>';
chmod($to,0666);

if($ext=='jpg' || $ext=='jpe' || $ext=='jpeg'){
$im = imagecreatefromjpeg($to);
imagegif($im,$to);
imagedestroy($im);
}
elseif($ext=='png'){
$im = imagecreatefrompng($to);
imagegif($im,$to);
imagedestroy($im);
}

}
else{
echo 'Downloading Scrin '.$name.' unsuccessful.<br>';
}
}
}
echo '<div class="a"><a href="bioread.php?action=2">By the manager of descriptions</a><br/>';
print '</div>';
break;

case 'delscreen':
$info = mysql_fetch_assoc(mysql_query('SELECT * FROM `files` WHERE `id` = '.$id));
$nf = pathinfo($info['path']);
$filename = $nf['basename'];
chmod($setup['spath'], 0777);
unlink ($setup['spath'].'/'.$filename.'.gif');
echo'Screen deleted successfully.';
print '<div class="a"><a href="apanel.php?action=screen1">Download the screenshot</a></div>';
echo '<div class="a"><a href="bioread.php?action=2">By the manager of descriptions</a><br/>';
print '</div>';
break;

#####################################??????###################################################
case 'upload':
if(!$_POST)
{
$dirs = mysql_query('SELECT `path` FROM `files` WHERE `size` = 0');

echo '<div class="mainzag">Upload file (max '.ini_get('upload_max_filesize').')</div>
<div class="row">
Save:<br>
<form action="apanel.php?action=upload" method="post" enctype="multipart/form-data">
<select class="buttom" size="1" width="70" name="topath"><option value="'.$setup['path'].'/">./</option>';
while($item = mysql_fetch_assoc($dirs))
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
Add Files:<br>
<input name="userfile[]" type="file"><br>
<input name="userfile[]" type="file"><br>
<input name="userfile[]" type="file"><br>
<input name="userfile[]" type="file"><br>
<input name="userfile[]" type="file"><br>
<input class="buttom" type="submit" value="Add">
</form>';
}
else
{
$newpath = trim($_POST['topath']);
if(empty($newpath)) die ('No final path! '.$newpath);
for($i=0; $i<sizeof($_FILES['userfile']['name']); $i++)
{
if(empty($_FILES['userfile']['name'][$i])){
continue;
}
$name = $_FILES['userfile']['name'][$i];
$ex = pathinfo($name);
$ext = strtolower($ex['extension']);
$to = $newpath.$name;
if($ext=='php' or $ext=='php3' or $ext=='php4' or $ext=='php5' or $ext=='php6' or $ext=='phtml' or $ext=='cgi' or $ext=='asp' or $ext=='js' or $ext=='phtm' or $ext=='py' or $ext=='pl') die ($setup[hackmess]);
if(file_exists($to)) die('File already exists');
chmod($newpath, 0777);
if(move_uploaded_file($_FILES['userfile']['tmp_name'][$i], $to))
{
echo 'Uploads '.$name.' successful.<br>';
$upltime = filectime($to);
$ex = pathinfo($to);
$ex = $ex['extension'];
$name = str_replace('.'.$ex,'',basename($to));
$size = filesize($to);
$infolder = dirname($to).'/';
if(strpos($name , '!') !== false){
$name = trans($name);
}
else{
$name = trans2($name);
}

$query = mysql_query("INSERT INTO `files` (`path`, `name`, `infolder`, `size` , `timeupload`) VALUES ('$to', '$name', '$infolder' , '$size' , '$upltime');");
chmod($to, 0644);
}
else echo 'Uploads '.$name.' ended unsuccessfully.<br>';
}
chmod($newpath, 0777);
}
break;

######################################???????? ?????? ????????##############################################
case 'newdir':
if(!$_POST)
{
echo '<div class="mainzag">Creating a new category:</div>
<div class="row">
<form action="apanel.php?action=newdir&amp;id='.$id.'" method="post">
Name the new folder:<br>
<input class="enter" name="dirnew" type="text" size="70" value=""><br>
<input name="tr" type="checkbox" value="1" checked="checked">Translation (if there are Russian letters - including compulsory!)<br>
<input class="buttom" type="submit" value="Add">
</form>';
}
else{
if(empty($_POST['dirnew'])){
die('Do not fill in the!');
}
$dirnew = clean(del($_POST['dirnew']));
$name = '*'.$dirnew;

if($_POST['tr'] == 1){
$dirnew = '!'.retrans($dirnew);
}
if(!$id){
$d['path'] = $setup['path'].'/';
}
else{
$d = mysql_fetch_assoc(mysql_query('SELECT * FROM `files` WHERE `id` = '.$id));
}
chmod($d['path'],0777);
$dirnew = trim($d['path']).trim($dirnew).'/';
if(mkdir($dirnew, 0777) AND $query = mysql_query("INSERT INTO `files` (`path`, `name`, `infolder`, `timeupload`, `loads`, `yes` ) VALUES ('".$dirnew."', '$name', '".$d['path']."', '9999999999', '9999999999', '9999');")){
chmod($dirnew, 0777);
echo 'The new catalog is created.';
}
else{
echo 'Error creating a new directory.';
//chmod($d['path'],0777);
}
}
break;

#########################################????????? ???????###############################################
case 'modules':
if(!$_POST)
{
echo '<div class="mainzag">Plugins:</div>
<form action="apanel.php?action=modules" method="post">
<div class="row">
<input name="komments_change" type="checkbox" value="ON" '.check($setup['komments_change']).'>Comments<br>
<input name="eval_change" type="checkbox" value="ON" '.check($setup['eval_change']).'>Rating<br>
<input name="jad_change" type="checkbox" value="ON" '.check($setup['jad_change']).'>Jad Generator<br>
<input name="cut_change" type="checkbox" value="ON" '.check($setup['cut_change']).'>Narezchik MP3<br>
<input name="zip_change" type="checkbox" value="ON" '.check($setup['zip_change']).'>Browse archives<br>
<input name="zakaz" type="checkbox" value="ON" '.check($setup['zakaz']).'>Advance orders<br>
<input name="buy_change" type="checkbox" value="ON" '.check($setup['buy_change']).'>Advertising block<br>
<input name="onpage_change" type="checkbox" value="ON" '.check($setup['onpage_change']).'>Menu, select count wa files on this page<br>
<input name="preview_change" type="checkbox" value="ON" '.check($setup['preview_change']).'>Selection menu display predosmotra<br>
<input name="top_change" type="checkbox" value="ON" '.check($setup['top_change']).'>TOP<br>
<input name="new_change" type="checkbox" value="ON" '.check($setup['new_change']).'>Novelty<br>
<input name="new_komm" type="checkbox" value="ON" '.check($setup['new_komm']).'>Recent Comments<br>
<input name="stat_change" type="checkbox" value="ON" '.check($setup['stat_change']).'>Statistics<br>
<input name="pagehand_change" type="checkbox" value="ON" '.check($setup['pagehand_change']).'>Manual entry pages<br>
<input name="search_change" type="checkbox" value="ON" '.check($setup['search_change']).'>Find Files<br><br>
<input class="buttom" type="submit" value="Save">
</form>
</div>';
}
else
{
if ($_POST['new_komm'] == 'ON') $_POST['new_komm']=1; else $_POST['new_komm']=0;
if ($_POST['komments_change'] == 'ON') $_POST['komments_change']=1; else $_POST['komments_change']=0;
if ($_POST['eval_change'] == 'ON') $_POST['eval_change']=1; else $_POST['eval_change']=0;
if ($_POST['onpage_change'] == 'ON') $_POST['onpage_change']=1; else $_POST['onpage_change']=0;
if ($_POST['preview_change'] == 'ON') $_POST['preview_change']=1; else $_POST['preview_change']=0;
if ($_POST['top_change'] == 'ON') $_POST['top_change']=1; else $_POST['top_change']=0;
if ($_POST['new_change'] == 'ON') $_POST['new_change']=1; else $_POST['new_change']=0;
if ($_POST['stat_change'] == 'ON') $_POST['stat_change']=1; else $_POST['stat_change']=0;
if ($_POST['search_change'] == 'ON') $_POST['search_change']=1; else $_POST['search_change']=0;
if ($_POST['pagehand_change'] == 'ON') $_POST['pagehand_change']=1; else $_POST['pagehand_change']=0;
if ($_POST['zip_change'] == 'ON') $_POST['zip_change']=1; else $_POST['zip_change']=0;
if ($_POST['jad_change'] == 'ON') $_POST['jad_change']=1; else $_POST['jad_change']=0;
if ($_POST['zakaz'] == 'ON') $_POST['zakaz']=1; else $_POST['zakaz']=0;
if ($_POST['buy_change'] == 'ON') $_POST['buy_change']=1; else $_POST['buy_change']=0;
if ($_POST['cut_change'] == 'ON') $_POST['cut_change']=1; else $_POST['cut_change']=0;
foreach($_POST as $key=>$value)
{
if($key=='password' or $key=='delete_dir' or $key=='delete_file') die($hackmess);
$query = mysql_query("UPDATE `setting` SET `value` = '".intval($value)."' WHERE `name` = '$key';");
}
echo 'List of modules changed';
}
break;

##########################################
//	DjAmol GRoup Inc.		//

//	WwW.DjAmol.Com			//
	
//	djamolpatil@gmail.com		//

//	Twitter.com/djamol		//

// Best Offer For New Buyer contact now //

//	http://ai.djamol.com/ <-Buy Now	//
##########################################
case 'sec':
if(!$_POST)
{
echo '<div class="mainzag">Security:</div>
<form action="apanel.php?action=sec" method="post">
<div class="row">
Password(if you do not want to leave me empty): <br>
<input class="enter" name="password" type="password" value=""></div><div class="row">
The number of incorrect password attempts before locking: <br>
<input class="enter" name="countban" type="text" value="'.$setup['countban'].'"></div><div class="row">
Time Lock(???.): <br>
<input class="enter" name="timeban" type="text" value="'.$setup['timeban'].'"><br>
<input name="autologin" type="checkbox" value="ON" '.check($setup['autologin']).'>Autologin<br>
<input name="delete_file" type="checkbox" value="ON" '.check($setup['delete_file']).'>Function delete files<br>
<input name="delete_dir" type="checkbox" value="ON" '.check($setup['delete_dir']).'>Function to delete directories
</div><div class="row">
Enter a password for SPEAKER PANEL: <br>
<input class="enter" name="pwd" type="password" value=""><br>
<input class="buttom" type="submit" value="Save">
</form>
</div>';

}
else
{
if ($_POST['autologin'] == 'ON') $_POST['autologin']=1; else $_POST['autologin']=0;
if ($_POST['delete_dir'] == 'ON') $_POST['delete_dir']=1; else $_POST['delete_dir']=0;
if ($_POST['delete_file'] == 'ON') $_POST['delete_file']=1; else $_POST['delete_file']=0;
if (md5(clean($_POST['pwd'])) != $setup['password'] or empty($_POST['pwd'])) die($setup['hackmess']);
is_num($_POST['countban'],'countban');
is_num($_POST['timeban'],'timeban');
foreach($_POST as $key=>$value)
{
if($value=='' and $key!='password' and $key!='autologin' and $key!='delete_dir' and $key!='delete_file') die('Do not fill one of the fields.');
}
if(!empty($_POST['password'])) $query = mysql_query("UPDATE `setting` SET `value` = '".md5(clean($_POST['password']))."' WHERE `name` = 'password';");
$query = mysql_query("UPDATE `setting` SET `value` = '".clean($_POST['countban'])."' WHERE `name` = 'countban';");
$query = mysql_query("UPDATE `setting` SET `value` = '".clean($_POST['timeban'])."' WHERE `name` = 'timeban';");
$query = mysql_query("UPDATE `setting` SET `value` = '".$_POST['autologin']."' WHERE `name` = 'autologin';");
$query = mysql_query("UPDATE `setting` SET `value` = '".$_POST['delete_file']."' WHERE `name` = 'delete_file';");
$query = mysql_query("UPDATE `setting` SET `value` = '".$_POST['delete_dir']."' WHERE `name` = 'delete_dir';");
echo 'Options changed.';
}
break;

##########################################
// Best Offer For New Buyer contact now //

//	http://ai.djamol.com/ <-Buy Now	//
##########################################
case 'setting':
if(!$_POST)
{
echo '<div class="menu">Preferences App Center:</div>
<form action="apanel.php?action=setting" method="post">
<div class="a">
Folder with files:<br>
<input class="enter" name="path" type="text" value="'.$setup['path'].'"></div><div class="a">
Folder with descriptions:<br>
<input class="enter" name="opath" type="text" value="'.$setup['opath'].'"></div><div class="a">
Folder with screen<br>
<input class="enter" name="spath" type="text" value="'.$setup['spath'].'"></div><div class="a">

Folder c JAVA books:<br>
<input class="enter" name="jpath" type="text" value="'.$setup['jpath'].'"></div><div class="a">

Folder c ZIP books:<br>
<input class="enter" name="zpath" type="text" value="'.$setup['zpath'].'"></div><div class="a">

????? ??? ???????:<br>
<input class="enter" name="mp3path" type="text" value="'.$setup['mp3path'].'"></div><div class="a">
Limit cuts (??):<br>
<input class="enter" name="limit" type="text" value="'.$setup['limit'].'"></div><div class="a">
Limit comments to one file:<br>
<input class="enter" name="klimit" type="text" value="'.$setup['klimit'].'"></div><div class="a">
Files, the default page:<br>
<select class="enter" size="1" name="onpage">
<option '.sel(10,$setup['onpage']).'>10</option>
<option '.sel(15,$setup['onpage']).'>15</option>
<option '.sel(20,$setup['onpage']).'>20</option>
<option '.sel(25,$setup['onpage']).'>25</option>
<option '.sel(30,$setup['onpage']).'>30</option>
</select></div><div class="a">
Preview default:<br>
<select class="enter" size="1" name="prew">
<option value="1" '.sel(1,$setup['prew']).'>Enabled</option>
<option value="0" '.sel(0,$setup['prew']).'>Off</option>
</select></div><div class="a">
Size thumbnails(width * height, the sign "*" required!):<br>
<input class="enter" name="prev_size" type="text" value="'.$setup['prev_size'].'"></div><div class="a">


Tag Image:<br>
<select class="enter" size="1" name="marker">
<option value="0" '.sel(0,$setup['marker']).'>Off</option>
<option value="1" '.sel(1,$setup['marker']).'>Enabled</option>
</select></div><div class="a">

Text marker:<br>
<input class="enter" name="text_marker" type="text" value="'.$setup['text_marker'].'"></div><div class="a">


Show expansion:<br>
<select class="enter" size="1" name="ext">
<option value="1" '.sel(1,$setup['ext']).'>Enabled</option>
<option value="0" '.sel(0,$setup['ext']).'>Off</option>
</select></div><div class="a">
Time for new files (days,0 - off): <br>
<input class="enter" name="day_new" type="text" value="'.$setup['day_new'].'"></div><div class="a">
Time online(sec.):<br>
<input class="enter" name="online_time" type="text" value="'.$setup['online_time'].'"></div><div class="a">
The number of pages, after which it is possible to manually enter the pages: <br>
<input class="enter" name="pagehand" type="text" value="'.$setup['pagehand'].'"></div><div class="a">
Number of Files TOP:<br>
<input class="enter" name="top_num" type="text" value="'.$setup['top_num'].'"></div><div class="a">
Number of output PEFC. ????????:<br>
<input class="enter" name="komm_num" type="text" value="'.$setup['komm_num'].'"></div><div class="a">
Message for gifted:<br>
<input class="enter" name="hackmess" type="text" value="'.$setup['hackmess'].'"></div><div class="a">
Sort by Default:<br>
<select class="enter" size="1" name="sort">
<option value="name" '.sel('name',$setup['sort']).'>Name</option>
<option value="size" '.sel('size',$setup['sort']).'>Size</option>
<option value="data" '.sel('data',$setup['sort']).'>Date</option>
<option value="load" '.sel('load',$setup['sort']).'>Popularity</option>
<option value="eval" '.sel('eval',$setup['sort']).'>Rating</option>
</select></div><div class="a">
Email:<br>
<input class="enter" name="zakaz_email" type="text" value="'.$setup['zakaz_email'].'">
</div><div class="a">
Title: <br>
<input class="enter" name="zag" type="text" value="'.$setup['zag'].'">
</div><div class="a">
Main Site:<br>
<input class="enter" name="site_url" type="text" value="'.$setup['site_url'].'"><br><br>
<input class="buttom" type="submit" value="Save">
</div></form>
</form>';
}
else
{
if($_POST['password'] OR $_POST['delete_dir'] OR $_POST['delete_file']){
die($hackmess);
}
foreach($_POST as $key=>$value){
if(!isset($value) or $value=='') die('Do not fill one of the fields.');
mysql_query("DELETE FROM `setting` WHERE `name`='".$key."'");
mysql_query("INSERT INTO `setting`(`name`,`value`) VALUES( '".$key."', '".clean($value)."');");
print mysql_error();
}
echo 'Settings saved';
}
break;
//	Twitter.com/djamol		//
case 'payset':
if(!$_POST)
{
if($setup['stopcomp']==1) $stopcomp='Yes'; else $stopcomp='No';
echo '<div class="menu">Settings Lock. sections (activation options):</div>
<form action="apanel.php?action=payset" method="post">
<div class="a">
Password:<br>
<input class="enter" name="click_pas" type="text" value="'.$setup['click_pas'].'"></div><div class="a">
Allow input from computer and opera mini?:<br>
<select class="enter" size="1" name="stopcomp">
<option value="'.$setup['stopcomp'].'">'.$stopcomp.'</option>
<option value="1">Yes</option>
<option value="0">No</option>
</select></div><div class="a">
References(<font color="red">http://cite1.ru, http://cite2.ru</font>):<br>
<textarea class="enter" cols="30" rows="10" name="links" maxlength="256" value="">'.$setup['links'].'</textarea>
</div>
<div class="menu">Settings Lock. sections (sms):</div><div class="a">
Password that will receive the sender sms to log in:<br>
<input class="enter" name="sms_pas" type="text" value="'.$setup['sms_pas'].'"></div><div class="a">
Information about sending sms:<br>
<textarea class="enter" cols="30" rows="10" name="sms_info" maxlength="256" value="">'.$setup['sms_info'].'</textarea></div><div class="a">
<input class="buttom" type="submit" value="Save">


</form></div>';

}
else
{
if($_POST['password'] OR $_POST['delete_dir'] OR $_POST['delete_file']){
die($hackmess);
}
foreach($_POST as $key=>$value){
if(!isset($value) or $value=='') die('Do not fill one of the fields.');
mysql_query("DELETE FROM `setting` WHERE `name`='".$key."'");
mysql_query("INSERT INTO `setting`(`name`,`value`) VALUES( '".$key."', '". clean($value)."');");
print mysql_error();
}
echo 'Settings saved';
}
break;
}
######################################?????##################################################
if($_GET['action']){
print '<div class="a"><center><a href="apanel.php">Admin</a></center></div>

<!--DjAmolGroup Inc. (WwW.DjAmol.Com-->';
}

list($msec,$sec)=explode(chr(32),microtime());
echo '<div class="djafoot"><div class="djacopy">'.round(($sec+$msec)-$HeadTime,4).' DjAmol Group v5.0.</div></body></html>';
?>