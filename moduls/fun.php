<?php
###############DjAmol Group###############
//   DjAmolwap 12v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############
function trans($t){
$str = explode('!',$t);
$a = array('_','YA','Ya','ya','yee','YO','yo','Yo','ZH','zh','Zh','Z','z','CH','ch','Ch','SH','sh','Sh','YE','ye','Ye','YU','yu','Yu','JA','ja','Ja','A','a','B','b','V','v','G','g','D','d','E','e','I','i','J','j','K','k','L','l','M','m','N','n','O','o','P','p','R','r','S','s','T','t','U','u','F','f','H','h','W','w','x','q','Y','y','C','c','!');
$b = array(' ','Я','Я','я','ые','Ё','ё','Ё','Ж','ж','Ж','З','з','Ч','ч','Ch','Ш','ш','Ш','Э','э','Э','Ю','ю','Ю','Я','я','Я','А','а','Б','б','В','в','Г','г','Д','д','Е','е','И','и','Й','й','К','к','Л','л','М','м','Н','н','О','о','П','п','Р','р','С','с','Т','т','У','у','Ф','ф','Х','х','Щ','щ','ъ','ь','Ы','ы','Ц','ц','');
return $str[0].str_replace($a,$b,$str[1]);
}

function retrans($t){
$a = array('_','YA','Ya','ya','yee','YO','yo','Yo','ZH','zh','Zh','Z','z','CH','ch','Ch','SH','sh','Sh','YE','ye','Ye','YU','yu','Yu','JA','ja','Ja','A','a','B','b','V','v','G','g','D','d','E','e','I','i','J','j','K','k','L','l','M','m','N','n','O','o','P','p','R','r','S','s','T','t','U','u','F','f','H','h','W','w','x','q','Y','y','C','c','!');
$b = array(' ','Я','Я','я','ые','Ё','ё','Ё','Ж','ж','Ж','З','з','Ч','ч','Ch','Ш','ш','Ш','Э','э','Э','Ю','ю','Ю','Я','я','Я','А','а','Б','б','В','в','Г','г','Д','д','Е','е','И','и','Й','й','К','к','Л','л','М','м','Н','н','О','о','П','п','Р','р','С','с','Т','т','У','у','Ф','ф','Х','х','Щ','щ','ъ','ь','Ы','ы','Ц','ц','');
return str_replace($b,$a,$t);
}

function trans2($t){
return str_replace('_',' ',$t);
}

function bbcode($text){
//DjAmolGroup Inc
// ББ коды
$bbcode = array(
'/\[url\](.+)\[\/url\]/isU'=>'<a href="$1">$1</a>',
'/\[url=(.+)\](.+)\[\/url\]/isU'=>'<a href="$1">$2</a>',
'/\[img=(.+)\]/isU'=>'<img src="$1">',
'/\[br]/isU'=>'<br>',
'/\[i\](.+)\[\/i\]/isU'=>'<em>$1</em>',
'/\[b\](.+)\[\/b\]/isU'=>'<strong>$1</strong>',
'/\[u\](.+)\[\/u\]/isU'=>'<span style="text-decoration:underline">$1</span>',
'/\[big\](.+)\[\/big\]/isU'=>'<big>$1</big>',
'/\[small\](.+)\[\/small\]/isU'=>'<small>$1</small>',
'/\[code\](.+)\[\/code\]/isU'=>'<code>$1</code>',
'/\[red\](.+)\[\/red\]/isU'=>'<font color="#ff0000">$1</font>',
'/\[yellow\](.+)\[\/yellow\]/isU'=>'<font color="#ffff22">$1</font>',
'/\[green\](.+)\[\/green\]/isU'=>'<font color="#00bb00">$1</font>',
'/\[color=(.+)\](.+)\[\/color\]/isU'=>'<font color="$1">$2</font>',
'/\[blue\](.+)\[\/blue\]/isU'=>'<font color="#0000bb">$1</font>'
);
return preg_replace(array_keys($bbcode),array_values($bbcode),$text);
}

function clean($txt){
return mysql_escape_string(addslashes(trim(htmlspecialchars(stripslashes($txt)))));
}

function cut($txt,$k){
return substr($txt, 0, $k);
}

function del($text)
{
	$text=str_replace('&','', $text);
	$text=str_replace('$','', $text);
	$text=str_replace('>','', $text);
	$text=str_replace('<','', $text);
	$text=str_replace('~','', $text);
	$text=str_replace('`','', $text);
	$text=str_replace('#','', $text);
	$text=str_replace('*','', $text);
	return $text;
}

function is_num($txt,$name)
{
	global $hackmess,$_POST,$_GET,$_SESSION;
	if(isset($_POST[$name])) $txt = $_POST[$name];
	elseif (isset($_GET[$name])) $txt = $_GET[$name];
	elseif (isset($_SESSION[$name])) $txt = $_SESSION[$name];
	if ((!ctype_digit($txt) or $txt < 0) AND !empty($txt)) die($hackmess);
}

function click_change()
{   //DjAmol.Com
	global $hackmess,$_POST,$setup;
	if(isset($_POST['click_change']) AND $setup['click_pas']==$_POST['click_pas'])
  { 
  $set_komm = intval($_POST['click_change']);
  if ($set_komm==1) mysql_query('UPDATE `setting` SET `value` ="1" WHERE `name`="click_change"');
  if ($set_komm==0) mysql_query('UPDATE `setting` SET `value` ="0" WHERE `name`="click_change"');
  }
  if ($setup['click_change']==0) die($hackmess);
}

function check($value){
if(!$value){
return;
}
else{
return 'checked="cecked"';   //DjAmol.Com
}
}

function sel($value,$real){
if($value != $real){
return;
}
else{
return 'selected="selected"';
}
}
//Twitter.com/djamol
function get2ses($name)
{
global $_GET, $_SESSION, $setup;
$d = $name;
if(!isset($_SESSION[$name])) {$_SESSION[$name] =  $setup[$name];}
if(isset($_GET[$name])) {$_SESSION[$name] = $_GET[$name];}
return $$name = $_SESSION[$d];
}
?>