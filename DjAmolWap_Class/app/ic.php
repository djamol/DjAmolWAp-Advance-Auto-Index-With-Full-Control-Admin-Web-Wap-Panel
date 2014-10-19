<?php
###############DjAmol Group###############
//   DjAmolwap 12v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############
include('DjAmolWap_Class/vvv.php');
$file = $_GET["lf"];
$q = array("icon.png","ico.png","i.png","icono.png","Icon.png","Ico.png","I.png","Icono.png","ICON.png","ICO.png","I.png","ICONO.png","ICON.PNG","ICO.PNG","I.PNG","ICONO.PNG","icons/icon.png","icons/ico.png","icons/i.png","icons/icono.png","i","I");
	$zip = new PclZip($file);
	$ar = $zip->extract(PCLZIP_OPT_BY_NAME,$q,PCLZIP_OPT_EXTRACT_IN_OUTPUT);
	if(!empty($ar)) {
Header("Content-type: image/png");
}
//else {  Header("Content-type: ext/jar.png"); }   @djamol
?>