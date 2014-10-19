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

##############DjA mol.Com#######
if($setup['jad_change'] == 0){
die('Not found');
}
##############D j a m o l . c o m##############
$id = intval($_GET['id']);
#############DjAmol#######
$d = mysql_fetch_row(mysql_query('SELECT TRIM(`path`) FROM `files` WHERE `id` = '.$id.' LIMIT 1'));

if(file_exists($d[0])){
mysql_query('UPDATE `files` SET `loads`=`loads`+0, `timeload`='.$time.' WHERE `id`='.$id
);

$filesize = filesize($d[0]);

include '../../moduls/pclzip.lib.php';

$zip = new PclZip($d[0]);  //DjA_MOL
$content = $zip->extract(PCLZIP_OPT_BY_NAME,'META-INF/MANIFEST.MF',PCLZIP_OPT_EXTRACT_AS_STRING);

header('Content-type: text/vnd.sun.j2me.app-descriptor');
header('Content-Disposition: attachment; filename="'.basename($d[0]).'.jad";');
//DjAmol
echo $content[0]['content']."\n".'MIDlet-Jar-Size: '.$filesize."\n".'MIDlet-Jar-URL: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/'.$d[0];
}
else{
print $hackmess;
}
?>