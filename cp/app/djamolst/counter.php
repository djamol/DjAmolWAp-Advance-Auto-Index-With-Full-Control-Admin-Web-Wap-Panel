<?PHP

require_once('config.php');

//
//DjAmolGroup Inc.
//
###############DjAmol Group###############
//   DjAmolwap 12v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############

// Date Time
$time=time();
$day=date("Y.m.d",$time); // YYYY.MM.DD   -(DjAmolGroup)
$month=date("Y.m",$time); // YYYY.MM              -(DjAmolGroup)

// IP adress
$ip=$_SERVER['REMOTE_ADDR']; 

// Get Referrer and Page
if ($_GET["ref"] <> "" ) 
	{
	// from javascript(DjAmolgroup)
	$referer = $_GET["ref"];
	$page = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_PATH);	
	} 
else 
	{
	// from php
	$referer=$_SERVER['HTTP_REFERER'];
	$page=$_SERVER['PHP_SELF']; // DjAmolGroupInc	
	} 	
// cleanup
if (basename($page) == basename(__FILE__)) $page="" ; // count not counter.php

$server_host=$_SERVER["HTTP_HOST"]; // Server Host
if (substr($server_host,0,4) == "www.") $server_host=substr($server_host,4); // Server Host without www.

$referer_host=parse_url($referer, PHP_URL_HOST); // Referrer Host
if (substr($referer_host,0,4) == "www.") $referer_host=substr($referer_host,4); // Referer Host without www.

// adjust search engines 
if (strstr($referer_host, "google."))
	{
	$referer_query=parse_url($referer, PHP_URL_QUERY);
	$referer_query.="&";
	preg_match('/q=(.*)&/UiS', $referer_query, $keys);
	
	$keyword=urldecode($keys[1]); // These are the search terms
	$referer_host="Google"; // adjust host
	}
if (strstr($referer_host, "yahoo."))
	{
	$referer_query=parse_url($referer, PHP_URL_QUERY);
	$referer_query.="&";
	preg_match('/p=(.*)&/UiS', $referer_query, $keys);
	
	$keyword=urldecode($keys[1]); // These are the search terms(DjAmolGroup)
	$referer_host="Yahoo"; // adjust host(DjAmolGroup)
	}
if (strstr($referer_host, "bing."))
	{
	$referer_query=parse_url($referer, PHP_URL_QUERY);
	$referer_query.="&";
	preg_match('/q=(.*)&/UiS', $referer_query, $keys);
	
	$keyword=urldecode($keys[1]); // These are the search terms(DjAmolGroup)
	$referer_host="Bing"; // adjust host(DjAmolGroup)
	}
		
// Language
$language = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2);

//
// Counter
//

// delete old IPs(DjAmolGroup)
$anfangGestern = mktime(0, 0, 0, date(n), date(j), date(Y)) - 48*60*60 ; // 48*60*60 => after(DjAmolGroup) 48 hours
$delete=mysql_query("delete from ".$db_prefix."IPs where time<'$anfangGestern'");
if (!$delete) {echo"Es ist ein Fehler aufgetreten, möglicherweise ist die Tabelle nicht angelegt."; exit;}

// delete old page,referrer,language and keywords(DjAmolGroup)
$old_day=date("Y.m.d",mktime(0, 0, 0, date("n"), date("j")-$oldentries, date("Y"))); // delete older than $oldentries(config.php) days
$delete=mysql_query("delete from ".$db_prefix."Page where day<='$old_day'");
$delete=mysql_query("delete from ".$db_prefix."Referer where day<='$old_day'");
$delete=mysql_query("delete from ".$db_prefix."Keyword where day<='$old_day'");
$delete=mysql_query("delete from ".$db_prefix."Language where day<='$old_day'");
if (!$delete) {echo"Es ist ein Fehler aufgetreten, möglicherweise ist die Tabelle nicht angelegt."; exit;}

// insert a new day(DjAmolGroup)
$neuerTag=mysql_query("select id from ".$db_prefix."Day where day='$day'");
if (!$neuerTag) {echo"Es ist ein Fehler aufgetreten, möglicherweise ist die Tabelle nicht angelegt."; exit;}
if (mysql_num_rows($neuerTag)==0)
	{ 
	mysql_query("insert into ".$db_prefix."Day (day, user, view) values ('$day', '0', '0')");
	}
	
// check reload and set online time(DjAmolGroup)
$newuser=0;
$oldreload = $time-$reload;
$gesperrt=mysql_query("select id from ".$db_prefix."IPs where ip='$ip' AND time>'$oldreload' order by id desc limit 1");
if (!$gesperrt) {echo"Es ist ein Fehler aufgetreten, möglicherweise ist die Tabelle nicht angelegt."; exit;}
if (mysql_num_rows($gesperrt)==0)
	{
	// new visitor
	$newuser=1;
	mysql_query("insert into ".$db_prefix."IPs (ip, time, online) values ('$ip', '$time', '$time')");
	mysql_query("update ".$db_prefix."Day set user=user+1, view=view+1 where day='$day'");
	}
else
	{
	// reload visitor
	$gesperrtID=mysql_result($gesperrt,0,0);
	mysql_query("update ".$db_prefix."IPs set online='$time' where id='$gesperrtID'");
	mysql_query("update ".$db_prefix."Day set view=view+1 where day='$day'");
	}

// Page
if($page <> "") {
	$ergebnis = mysql_query("SELECT id from ".$db_prefix."Page WHERE page='$page' AND day='$day'");
	if (!$ergebnis) {echo"Es ist ein Fehler aufgetreten, möglicherweise ist die Tabelle nicht angelegt."; exit;}
	if (mysql_num_rows($ergebnis)==0)
		{
		mysql_query("insert into ".$db_prefix."Page (day, page, view) values ('$day', '$page', '1')");
		}
	else
		{ 
		$pageid=mysql_result($ergebnis,0,0);
		mysql_query("update ".$db_prefix."Page set view=view+1 where id='$pageid'");
		}
	}
// Referer   (DjAmolGroup)
if(stristr($server_host, $referer_host) === FALSE AND $referer_host<>"" AND $newuser == 1) {
	$ergebnis = mysql_query("SELECT id from ".$db_prefix."Referer WHERE referer='$referer_host' AND day='$day'");
	if (!$ergebnis) {echo"Es ist ein Fehler aufgetreten, möglicherweise ist die Tabelle nicht angelegt."; exit;}
	if (mysql_num_rows($ergebnis)==0)
		{
		mysql_query("insert into ".$db_prefix."Referer (day, referer, view) values ('$day', '$referer_host', '1')");
		}
	else
		{ 
		$refererid=mysql_result($ergebnis,0,0);
		mysql_query("update ".$db_prefix."Referer set view=view+1 where id='$refererid'");
		}
	}

// keywords      (DjAmolGroup)
if($keyword<>"" AND $newuser == 1) {
	$ergebnis = mysql_query("SELECT id from ".$db_prefix."Keyword WHERE keyword='$keyword' AND day='$day'");
	if (!$ergebnis) {echo"Es ist ein Fehler aufgetreten, möglicherweise ist die Tabelle nicht angelegt."; exit;}
	if (mysql_num_rows($ergebnis)==0)
		{
		mysql_query("insert into ".$db_prefix."Keyword (day, keyword, view) values ('$day', '$keyword', '1')");
		}
	else
		{ 
		$keywordid=mysql_result($ergebnis,0,0);
		mysql_query("update ".$db_prefix."Keyword set view=view+1 where id='$keywordid'");
		}
	}
// Language     (DjAmolGroup)
if($language<>"" AND $newuser == 1) {
	$ergebnis = mysql_query("SELECT id from ".$db_prefix."Language WHERE language='$language'");
	if (!$ergebnis) {echo"Es ist ein Fehler aufgetreten, möglicherweise ist die Tabelle nicht angelegt."; exit;}
	if (mysql_num_rows($ergebnis)==0)
		{
		mysql_query("insert into ".$db_prefix."Language (day, language, view) values ('$day', '$language', '1')");
		}
	else
		{ 
		$languageid=mysql_result($ergebnis,0,0);
		mysql_query("update ".$db_prefix."Language set view=view+1 where id='$languageid'");
		}
	}


?>