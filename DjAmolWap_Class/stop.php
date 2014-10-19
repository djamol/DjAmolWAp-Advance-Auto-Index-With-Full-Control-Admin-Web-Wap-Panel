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

include('config_click.php');



include 'moduls/header.php';
echo '<div class="menu">Досутуп к разделу закрыт!</div>';
echo '<div class="a">';  

$surl = str_replace('http://','',$url);

echo "<b>ОШИБКА</b><br/>
Извините, но с компьютера или Opera-Mini вход запрещен.<br/>
Пожалуйста перейдите по адресу<br/>
<a href=\"$url\">$surl</a><br/>
с браузера мобильного телефона.<br/>";

echo '</div>';
echo '
<div class="a"><div class="i_bar_t"><a href="index.php?">Загрузки</a></div>
<div class="i_bar_t"><a href="'.$setup['site_url'].'">На главную</a></div>
';

echo '</div><div class="title">';
include 'moduls/foot.php';
echo '</div></div>';

?>