<?php
list($msec,$sec)=explode(chr(32),microtime());
$HeadTime=$sec+$msec;
session_name ('SID') ;
session_start() ;
include '../moduls/fun.php';
include '../moduls/connect.php';
echo '<title>Index Editor</title><link href="../style.css" rel="stylesheet" style="text/css"><div class="search">Admin</div>
';
//
$id = intval($_GET['id']);
###############DjAmol Group###############
//   DjAmolwap 12v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############
mysql_query('UPDATE `loginlog` SET `time`="", `access_num`=0 WHERE `id` = 1;');
$all = mysql_fetch_row(mysql_query('SELECT COUNT(`id`) FROM `loginlog`;'));
if($all[0] > 21)
{
$min = mysql_fetch_row(mysql_query('SELECT MIN(`id`) FROM `loginlog` WHERE `id` > 1;'));
$query = mysql_query('DELETE FROM `loginlog` WHERE `id` = '.$min[0]);
}
################################DjAmol.Com###################
$error = 0;
if(empty($_SESSION['autorise'])) $error = 1;
if($_SESSION['autorise']!= $setup['password']) $error = 1;
if(empty($_SESSION['ipu'])) $error = 1;
if($_SESSION['ipu']!=clean($ip)) $error = 1;
if($error==1) die($setup['hackmess']);

$file = $_GET["file"].'.php';

echo '<div class="mp3t">DjAmol Group  ::You Are Edit ' . $file . ' </div><div style="border: 1px solid; text-align:center;">';
if (isset($_POST['edit']))
{
  $contents = stripslashes($HTTP_POST_VARS['edit_file']);

  $handle = fopen($file, 'w');
  fwrite($handle, $contents);
  fclose($handle);
###############DjAmol Group###############
//   DjAmolwap 12v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############
  echo "\n<br />File Updated Successfully!<br />\n";
}

$contents = (@file_get_contents($file)) ? htmlspecialchars(file_get_contents($file)) : 'Error: file NOt Found Contact To djamolpatil@gmail.com';

echo '<br /><form method="post">
<textarea name="edit_file" wrap="virtual" cols="30" rows="2">' . $contents . '</textarea>
<br /><br /><input type="submit" name="edit" value="Save"></form>
</div><div class="a">
<table border="1">
<th style="padding:3px;">Index Header</th><th style="padding:3px;">Ads Edit</th>
</tr>
<tr>
<td style="padding:3px;"><a href="index.php?file=top20">Top Files/Update Text</a></td><td style="padding:3px;"><a href="index.php?file=ad1">Index Header Ad</a></td>
</tr>
<tr>
<td style="padding:3px;"><a href="index.php?file=added">Latest Added</a></td><td style="padding:3px;"><a href="index.php?file=ad2">Index Footer Ad</a></td>
</tr>
<tr>
<td style="padding:3px;"><a href="index.php?file=service">Service/External Links</a></td><td style="padding:3px;"><a href="index.php?file=ad3">File Header Ad</a></td>
</tr>
<tr>
<td style="padding:3px;"><a href="index.php?file=support">Support Footer</a></td><td style="padding:3px;"><a href="index.php?file=ad4">File Footer Ad</a></td>
</tr>
</table>
<br>
<br
<center><div class="mp3t"><a href="../apanel.php">Admin Area</a></div></center>
</div>';
?>