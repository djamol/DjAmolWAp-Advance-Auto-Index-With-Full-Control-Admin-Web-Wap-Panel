<?php

##########################################
//	DjAmol GRoup Inc.		//

//	WwW.DjAmol.Com			//
	
//	djamolpatil@gmail.com		//

//	Twitter.com/djamol		//

// Best Offer For New Buyer contact now //

//	http://ai.djamol.com/ <-Buy Now	//
##########################################

include 'moduls/ini.php';
include 'moduls/connect.php';
include 'moduls/fun.php';
###############DjAmol Group Inc###############

$id = intval($_GET['id']);
###############DjAmol Group###############
//   DjAmolwap 14v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############


$d = mysql_fetch_row(mysql_query('SELECT TRIM(`path`) FROM `files` WHERE `id` = '.$id.' LIMIT 1'));
click_change();
if(file_exists($d[0])){
mysql_query('UPDATE `files` SET `loads`=`loads`+1, `timeload`='.$time.' WHERE `id`='.$id);
$tex2=$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).''.$d[0];
$tex2=str_replace('\/','/',$tex2);
header('Location: http://'.$tex2,true,301);
}
else{
print $hackmess;
}
?>