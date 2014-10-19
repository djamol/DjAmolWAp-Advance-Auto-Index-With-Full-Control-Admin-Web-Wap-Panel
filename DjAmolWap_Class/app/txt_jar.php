<?php
###############DjAmol Group###############
//   DjAmolwap 12v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############
include 'moduls/ini.php';
include 'moduls/connect.php';
include 'moduls/fun.php';
// DjAmol

$id = intval($_GET['id']);
// DjAmol Group Inc
$d = mysql_fetch_row(mysql_query('SELECT TRIM(`path`) FROM `files` WHERE `id` = '.$id.' LIMIT 1'));


if(file_exists($d[0])){
mysql_query('UPDATE `files` SET `loads`=`loads`+1, `timeload`='.$time.' WHERE `id`='.$id);

$nm = array_reverse(explode('.',basename($d[0])));
$nm = $nm[1];

$tmp = $setup['jpath'].'/'.basename($d[0]).'.jar';

if(!file_exists($tmp)){

$f = file_get_contents($d[0]);

$charset = strtolower(mb_detect_encoding($f, 'UTF-8, windows-1251'));

if($charset != 'windows-1251'){
$f = iconv('utf-8','windows-1251',$f);
}   //DjAmol@TWitter

copy('moduls/book.zip',$tmp);
copy('moduls/props.ini',$setup['jpath'].'/props.ini');
copy('moduls/MANIFEST.MF',$setup['jpath'].'/MANIFEST.MF');

$arr = str_split($f,25600);
$all = sizeof($arr);
$ar = file('moduls/props.ini');


function encode($str){
$ln = strlen($str);
for($i=0; $i<$ln; $i++){
$st.= $str[$i].chr(0);
}
return $st;
}
//Youtube@DjAmolOfficial
$ar[] = chr(0).chr(10).chr(0).encode('J/textfile.txt.label=1');
for($i=1; $i<$all; $i++){
$ar[] = chr(10).chr(0).encode('J/textfile'.$i.'.txt.label='.($i+1));
}
$ar[] = chr(10);

file_put_contents($setup['jpath'].'/props.ini',$ar);
file_put_contents($setup['jpath'].'/MANIFEST.MF',"Manifest-Version: 1.0\r\nMicroEdition-Configuration: CLDC-1.0\r\nMicroEdition-Profile: MIDP-1.0\r\nMIDlet-Name: $nm\r\nMIDlet-Vendor: Gemor Reader\r\nMIDlet-1: $nm, /icon.png, br.BookReader\r\nMIDlet-Version: 1.6\r\nMIDlet-Info-URL: $_SERVER[HTTP_HOST]\r\nMIDlet-Delete-Confirm: GoodBye =)");

include 'moduls/pclzip.lib.php';
$zip = new PclZip(dirname(__FILE__).DIRECTORY_SEPARATOR.$tmp);
//echo 'ERROR : '.$zip->errorInfo(true);

$zip->add(dirname(__FILE__).'/'.$setup['jpath'].'/props.ini',PCLZIP_OPT_REMOVE_ALL_PATH);
//echo 'ERROR : '.$zip->errorInfo(true);

$zip->add(dirname(__FILE__).'/'.$setup['jpath'].'/MANIFEST.MF',PCLZIP_OPT_REMOVE_ALL_PATH,PCLZIP_OPT_ADD_PATH,'META-INF');
//echo 'ERROR : '.$zip->errorInfo(true);

unlink($setup['jpath'].'/MANIFEST.MF');
unlink($setup['jpath'].'/props.ini');

$fp = fopen($setup['jpath'].'/textfile.txt','w');
fputs($fp,$arr[0]);
fclose($fp);
###############DjAmol Group###############
//   DjAmolwap 12v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############



$zip->add(dirname(__FILE__).'/'.$setup['jpath'].'/textfile.txt',PCLZIP_OPT_REMOVE_ALL_PATH);
//echo 'ERROR : '.$zip->errorInfo(true);
unlink($setup['jpath'].'/textfile.txt');

for($i=1; $i<$all; $i++)
{

$fp = fopen($setup['jpath'].'/textfile'.$i.'.txt','w');
fputs($fp,$arr[$i]);
fclose($fp);
$zip->add(dirname(__FILE__).'/'.$setup['jpath'].'/textfile'.$i.'.txt',PCLZIP_OPT_REMOVE_ALL_PATH);
//echo 'ERROR : '.$zip->errorInfo(true);
unlink($setup['jpath'].'/textfile'.$i.'.txt');
}

chmod($tmp,0644);
}
//      http://ai.djamol.com            //
###############DjAmol Group###############


header('Location: '.$tmp, true, 301);
}
else{
print $hackmess;
}

?>