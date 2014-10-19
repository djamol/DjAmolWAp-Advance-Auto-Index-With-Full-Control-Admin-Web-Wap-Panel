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
include '../../moduls/ini.php';
session_name ('SID') ;
session_start() ;
include '../../moduls/fun.php';
include '../../moduls/connect.php';
//
$id = intval($_GET['id']);


//DjAmolGroup


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
if($error==1) die($setup['hackmess']);

$file = $_POST["file"];

$search = array(".avi", ".jpg", ".apk", ".mp3");  //What file formats to search for[jo file format search karna hai,jede file format search karna pauna hai]

////////////////////////////////END SETTINGS
?>

<html>
<head>
<title>Copy Folder By DjAmol group</title>
</head>
<body>
<center>
<h3>DjAmolWap 12version</h3>
<br/>
<form action="<?=$_SERVER["PHP_SELF"]?>" method="post">
Folder: <input type="text" name="file"><br/>
Url: <input type="text" name="link"><br/>
<input type="submit" value="Submit"/>
</form>
<br/><br/>
Example New Folder :   Mynewalbumfolder/<br />
Example Url : http://path.com/files/Mp3data/2012/Newalbum/<br />
Files Added In RootOfScript/cp/tmp/<br />
DjAmolGroup Inc
<?
///////////////////DjAmol Group///////////FUNCTIONS
function getLinks($link)
{   $ret = array();
$dom = new domDocument;
@$dom->loadHTML(file_get_contents($link));
$dom->preserveWhiteSpace = false;
$links = $dom->getElementsByTagName('a');
foreach ($links as $tag)
{  
//   DjAmolwap 12v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############

$ret[$tag->getAttribute('href')] = $tag->childNodes->item(0)->nodeValue;
}
return $ret;
}

if(!is_dir($file)) mkdir($file);
$link = $_POST['link'];
if($link){
$urls = getLinks($link);
if(sizeof($urls) > 0)
{
foreach($urls as $key=>$value)
{  //DjAmolGroup Inc
$find = str_replace($search, '|',strtolower($key));
if(substr_count($find,'|')>0){
if(substr_count($key,'http')<1)
$key = $link.$key;
$ice = explode('/',$key);
$num = count($ice)-1;
$ice = str_replace('www.shiwaw.net','',$ice);
$num = str_replace('www.shiwaw.net','',$num);
$ice = str_replace('%20','_',$ice);
$num = str_replace('%20','_',$num);
$ice = str_replace('%5b','[',$ice);
$num = str_replace('%5b','[',$num);
$ice = str_replace('.apk','_(Wap.DjAmol.com).apk',$ice);
$num = str_replace('.apk','_(Wap.DjAmol.com).apk',$num);
$ice = str_replace('.mp3','_(Wap.DjAmol.com).mp3',$ice);
$num = str_replace('.mp3','_(Wap.DjAmol.com).mp3',$num);
$ice = str_replace('%5d',']',$ice);
$num = str_replace('%5d','[',$num);
$ice = str_replace('WWW.Freshmaza.COM','',$ice);
$num = str_replace('WWW.Freshmaza.COM','',$num);
if(copy($key, $file.$ice[$num])) //twitter.com/djamol
echo 'Copyied <a href="'.$file.$ice[$num].'">'.$ice[$num].' </a> Successfully<br/>';
else
echo 'Could Not Copy '.$ice[$num].'<br/>';
}
}
}else{
echo "No links found at $link";
}
}
//Powered By DjAmol Group
?>

</center>
</body>
</html>
