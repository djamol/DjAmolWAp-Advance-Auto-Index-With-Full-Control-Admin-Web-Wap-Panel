<?php

#-----------------------------------------------------	#
# 	============DjAmol Group =============       		   	#
# 	 	    DjAmol Wap Script 														#
# 			E-mail : admin@djamol.com												#
# 			GTalk : djamolpatil@gmail.com										#
# 			Yahoo : djamolpatil@yahoo.com										#
# DjAmol Hosting Service SharedAnd Reseller Linux Host	#
#           http://host.djamol.com  										#
#-----------------------------------------------------	#


require 'moduls/ini.php';
require 'moduls/fun.php';
require 'moduls/connect.php';
require 'moduls/header.php';
require 'online.php';
###############Если стол выключен###############
if($setup['zakaz'] == 0) die('Not found');
###############Проверка переменных###############

echo '
<div class="menu"><strong>Advance orders</strong></div>
<div class="a">
What do you want to see in the App Center?<br>Writing admin!<br>
</div><div class="a">';
require_once "table/config.php";
$rand=rand(111,999);
echo '<div class="i_bar_t"><a href="table/add.php">Click here to Request</a></div></div>';
  if(empty($_GET['start'])) { $start=0; } else { $start=$_GET['start']; }
   if(
   !ctype_digit($start)) { $start=0; } $q="SELECT count(*) FROM guest";
    $total=mysql_query($q); $num=5; $num=(int)$num;
      $q="SELECT * FROM guest ORDER BY id DESC LIMIT $start,$num";
      $soob=mysql_query($q); $count=mysql_result($total,0);
      if($count<1) { echo '</div><div class="title_bord"><div class="a"><font color="red">Order desk is empty :(</font></div></div>'; }
      else  echo '</div>';
      while($v=mysql_fetch_array($soob))
      { $id=trim($v['id']); $id=(int)$id; $name=trim($v['name']); $url=trim($v['url']); $mail=trim($v['mail']); $msg=trim($v['msg']); $ua=trim($v['ua']); $ip=trim($v['ip']); $dt=trim($v['dt']); $otvet=trim($v['otvet']);
      echo '<div class="title_bord"><div class="t_block">'.$name.' | '.$dt.'</div>';
            echo '<div class="a">'.$msg.'<br><font color="696969">'.$ua.','.$ip.'</font>';
      if($otvet!="no") { echo "</div><div class=\"a\"><font color=\"red\">A. ADMIN: $otvet</font>"; }
      echo '</div></div>';  }
      echo "<div class=\"title_bord\"><div class=\"a\"><center>";
      if($start!=0)
      { echo '<a href="table.php?start='.($start-$num).'">Back</a>'; }
      else { echo 'Back'; } echo ' | ';
      if($count>$start +$num)
      { echo '<a href="table.php?start='.($start+$num).'">Further</a><br>'; }
      else { echo 'Further<br>'; }
      echo "</center></div>";

echo '<div class="a">
<div class="i_bar_t"><a href="index.php">Downloads</a></div>
<div class="i_bar_t"><a href="'.$setup['site_url'].'">Home</a></div>';
echo '</div>';
if($setup['online'] == 1)echo '<div class="menu">Online: <strong>'.$all_online[0].'</strong></div>';
echo'<div class="title">';
include 'moduls/foot.php';
echo '</div></div>';
?>