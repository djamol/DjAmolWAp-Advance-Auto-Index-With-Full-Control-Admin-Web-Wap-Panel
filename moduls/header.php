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
$kop=616;
//Twitter@djAmol
if(@$_SERVER['HTTP_ACCEPT_ENCODING'])
{$compress = strtolower(@$_SERVER['HTTP_ACCEPT_ENCODING']);}
else
{$compress = strtolower(@$_SERVER['HTTP_TE']);}

if(substr_count($compress,'deflate'))
{
function compress_output_deflate($output)
{return gzdeflate($output,5);}
header('Content-Encoding: deflate');
ob_start('compress_output_deflate');
ob_implicit_flush(0);
}
elseif(substr_count($compress,'gzip'))
{
function compress_output_gzip($output)
{return gzencode($output,5);}
header('Content-Encoding: gzip');
ob_start('compress_output_gzip');
ob_implicit_flush(0);
}
elseif(substr_count($compress,'x-gzip'))
{
function compress_output_x_gzip($output)
{
$x = "\x1f\x8b\x08\x00\x00\x00\x00\x00";
$size = strlen($output);
$crc = crc32($output);
$output = gzcompress($output,5);
$output = substr($output, 0, strlen($output) - 5);
$x.= $output;
$x.= pack('V',$crc);
$x.= pack('V',$size);
return $x;
}

header('Content-Encoding: x-gzip');
ob_start('compress_output_x_gzip');
ob_implicit_flush(0);
}


session_name('lid');
session_start();

header('Content-type: text/html; charset=utf-8');
header('Expires: Thu, 21 Jul 1977 07:30:00 GMT');
header('Last-Modified: '.gmdate('r').' GMT');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
print '<!DOCTYPE html><html>
<head>
<meta content="text/html; charset=UTF-8" http-equiv="content-type">
<link rel="shortcut icon" href="icon.ico" />
<meta name="geo.placename" content="India" />
<meta name="robot" content="index,follow"/>
<meta name="author" content="Amol Patil(DjAmol)" />
<meta name="software" content="DjAmolWap"/>
<meta name="version" content="10.2"/>
<meta name="language" content="en"/>
'; ?><script>
var server    = window.location.hostname;
var lastmod   = document.lastModified;   
var referrer  = document.referrer;   
var browser   = navigator.appName;
var os        = navigator.platform;
var useragent = navigator.userAgent;
var src = "cp/app/djamolst/counter.php"
src += "?ref=" + escape( document.referrer );
src += "&anticache=" + new Date().getTime();
src += "&br=+browser+&o=+os+&agent=+useragent";
var body = document.getElementsByTagName( "body" )[0];
var image = document.createElement( "img" );
image.src = src;
body.appendChild( image );
</script>
<?php
###############DjAmol Group###############
$dirloc = 'DjAmolWap_Class/lang/'; require_once ('DjAmolWap_Class/lang.php');
$foldr = $s['name']; $foldr2 = str_replace(" ", ",", $foldr); ?>
<?php
echo '
<meta name="description" content="'.$foldr.' '.$rdxml->eng->dis.'"/>
<meta name="keywords" content="'.$foldr2.','.$foldr.'"/>
</head>
<title>'.$foldr.'-'.$_SERVER['SERVER_NAME'].''.$rdxml->eng->t.'</title>';
echo'
<link href="style.css" rel="stylesheet" style="text/css">';
if($setup['buy_change']==1)
{   //DjAmolWap 12 Version
echo '<div class="djahead"><div class="djalogo">';
$list = explode("\n",$setup['buy']);
if($setup['randbuy']==1) echo '<div class="i_bar_t">'.bbcode($list[mt_rand(0,sizeof($list)-1)]).'</div> ';
else foreach($list as $value) echo '<div class="i_bar_t">'.bbcode($value).'</div></div> ';
echo'</div>';
}
?>