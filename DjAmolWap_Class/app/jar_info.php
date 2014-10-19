<?php
###############DjAmol Group###############
//   DjAmolwap 12v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############
/*include('DjAmolWap_Class/vvv.php');
$file = $file_info['path'];
$q = 'META-INF/MANIFEST.MF';
	$zip = new PclZip($file);
	$a=$zip->extract(PCLZIP_OPT_BY_NAME,$q,PCLZIP_OPT_EXTRACT_IN_OUTPUT);
	//echo $a; */

$id = intval($_GET['id']);
$tex2='http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/dashboard.php?avp=jad&amp;lang='.$lang.'&amp;id='.$id;
$tex2=str_replace('\/','/',$tex2);
$file=file($tex2);
//DjAmolGroup
$total = count($file);
for ($p=0; $p<$total; $p++) {
$dt = explode(":", $file[$p]);
if($dt[0]=="MIDlet-Vendor"){ $poz=$dt[0].':'.$dt[1].'';
}}
$poz = str_replace('MIDlet-Vendor:', '',$poz);
htmlspecialchars($poz);

//DjAmolGroup Inc
$total = count($file);
for ($p=0; $p<$total; $p++) {
$dt = explode(":", $file[$p]);
if($dt[0]=="MIDlet-Version"){ $ver=$dt[0].':'.$dt[1].'';
}}
$ver = str_replace('MIDlet-Version:', '',$ver);
htmlspecialchars($ver);

?>

