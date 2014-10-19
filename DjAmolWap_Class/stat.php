<?php
##########################################
//	DjAmol GRoup Inc.		//

//	WwW.DjAmol.Com			//
	
//	djamolpatil@gmail.com		//

//	Twitter.com/djamol		//

// Best Offer For New Buyer contact now //

//	http://ai.djamol.com/ <-Buy Now	//
##########################################

require 'moduls/ini.php';
require 'moduls/fun.php';
require 'moduls/connect.php';
require 'moduls/header.php';
###############If stats disabled###############
if($setup['stat_change'] == 0) die(''.$rdxml->eng->sr->s9.'-Visit http://Wap.DjAmol.Com or contact Administrative');
#######################################################

$all_size = mysql_fetch_row(mysql_query('SELECT SUM(`size`) FROM `files` WHERE `size` > 0'));

if($all_size[0] < 1048576){
$all_size[0] = round($all_size[0]/1024, 2).'Kb';
}
else{
$all_size[0] = round($all_size[0]/1024/1024, 2).'Mb';
}
##########################################
//	DjAmol GRoup Inc.		//

//	WwW.DjAmol.Com			//
	
//	djamolpatil@gmail.com		//

//	Twitter.com/djamol		//

// Best Offer For New Buyer contact now //

//	http://ai.djamol.com/ <-Buy Now	//
##########################################
$all_files = mysql_fetch_row(mysql_query('SELECT COUNT(*) FROM `files` WHERE `size` > 0'));
$all_loads = mysql_fetch_row(mysql_query('SELECT SUM(`loads`) FROM `files` WHERE `size` > 0'));
$new_all_files = mysql_fetch_row(mysql_query('SELECT COUNT(*) FROM `files` WHERE `timeupload` > '.($time-(86400*$setup['day_new'])).' AND `size` > 0'));

$max_online = mysql_fetch_row(mysql_query('SELECT `time` FROM `online` WHERE `id` = 1'));

echo '<h2>'.$rdxml->eng->st->s4.':</h2><!--DjAmolWap12v Powered By DjAmolGroup Inc. (WwW.DjAmol.Com) -->
<div class="even">
'.$rdxml->eng->nw->n5.': '.(int)$all_files[0].'</div><div class="even">
'.$rdxml->eng->nw->n1.': '.(int)$new_all_files[0].'</div><div class="even">
'.$rdxml->eng->nw->n7.': '.$all_size[0].'</div><div class="even">
'.$rdxml->eng->nw->n8.': '.(int)$all_loads[0].'</div><div class="even">
'.$rdxml->eng->nw->n9.': '.(int)$max_online[0].'
</div>
<div class="a">
<h2><a href="http://wap.djamol.com/index.php?lang='.$lang.'">'.$rdxml->eng->i4.'</a></h2>
<h2><p align="center"><a href="'.$setup['site_url'].'?lang='.$lang.'">'.$rdxml->eng->h1.'</a></div>
';

echo '</div><div class="title">';
include 'moduls/foot.php';
echo '</div>';

?>