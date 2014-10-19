<?php
switch ($id)
{
case "modset":
fputs($file,'<?php
$atmp3 = \''.$_POST[atmp3].'\';
$mp3play = \''.$_POST[mp3p].'\';
$textdis = \''.$_POST[textd].'\';
$skins = \''.$_POST[screen].'\';
$sharefile = \''.$_POST[sf].'\';
$rate = \''.$_POST[rate].'\';
$jzip = \''.$_POST[jzip].'\';
$ezip = \''.$_POST[ezip].'\';
$fmgv = \''.$_POST[fmgv].'\';
$mlang = \''.$_POST[mlang].'\';
$cm = \''.$_POST[cm].'\';
?>') or die('It is not possible to write data to a file moduls /app/ '.$id.'.php');
  break;
case "atag":
fputs($file,'<?php
$name = \''.$_POST[name].'\';
$artist = \''.$_POST[artist].'\';
$album = \''.$_POST[album].'\';
$year = \''.$_POST[year].'\';
$genre = \''.$_POST[genre].'\';
$comments = \''.$_POST[comments].'\';
?>') or die('It is not possible to write data to a file moduls /app/ '.$id.'.php');
  break;
case "ad":
fputs($file,'<?php
$ad1 = \''.$_POST[ad1].'\';
$ad2 = \''.$_POST[ad2].'\';
$ad3 = \''.$_POST[ad3].'\';
$ad4 = \''.$_POST[ad4].'\';
?>') or die('It is not possible to write data to a file moduls /app/ '.$id.'.php');
  break;
default:
  echo "Wrong Select Setting Please Go Back OR Admin Pack!";
}
?>