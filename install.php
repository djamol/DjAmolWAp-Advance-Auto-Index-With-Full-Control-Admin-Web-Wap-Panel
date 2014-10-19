<?php
include 'moduls/ini.php';
include 'moduls/header.php';

if(!$_GET['level'])
{
print "<div class='mp3t' align='center'>Enter your details:</div>
<form action='install.php?level=1' method='post'>
<div class='djafile2'>Web Site Address:<small>Eg :http://djamol.com/mobile/</small></div>
<input name='wapsite' type='text' value='http://'>
<div class='djafile2'>Default Language:</div>
<select name='lang'><option value='en'>English</option><option value='ur'>(Urdu)اردو</option><option value='ru'>(Russian)России</option><option value='hl'>(Hindi)हिंदी</option><option value='gu'>(Gujrati)ગુજરાતી</option>
</select> 
<div class='djafile2'>Email Id:<small></small></div>
<input name='emailid' type='text' value=''>
<div class='djafile2'>Admin Password:</div>
<input name='pass' type='text' value='1234'>
<div class='djafile2'>Mysql Host:</div>
<input name='serv' type='text' value='localhost'><br>
<div class='djafile2'>Database Name :</div>
<input name='db' type='text' value='sea'><br>
<div class='djafile2'>Db Username:</div>
<input name='userbd' type='text' value='root'><br>
<div class='djafile2'>Db Password :</div>
<input name='passbd' type='text' value=''><br>
<input type='submit' value='Submit'>
</form>
<!--DjAmolGroup Inc. (WwW.DjAmol.Com) 
##########################################
//	DjAmol GRoup Inc.		//

//	WwW.DjAmol.Com			//
	
//	djamolpatil@gmail.com		//

//	Twitter.com/djamol		//

// Best Offer For New Buyer contact now //

//	http://ai.djamol.com/ <-Buy Now	//
##########################################-->";
}
else
{
@chmod('moduls/config.php',0666);
$file = fopen('moduls/config.php','w');
fputs($file,'<?php
$SERVERmysql = \''.$_POST[serv].'\';
$DB = \''.$_POST[db].'\';
$DB_USER = \''.$_POST[userbd].'\';
$DB_PASS = \''.$_POST[passbd].'\';
$wapsite = \''.$_POST[wapsite].'\';
$dlang = \''.$_POST[lang].'\';
?>') or die('It is not possible to write data to a file moduls / config.php');
fclose($file);

@chmod('moduls/config.php',0644);
@chmod('files/',0777);
@chmod('about/',0777);
@chmod('screen/',0777);
@chmod('mp3data/',0777);
@chmod('zipdata/',0777);
@chmod('jardata/',0777);
@chmod('themedata/',0777);

include 'moduls/config.php';
include 'moduls/connect.php';
include 'moduls/fun.php';
$query = mysql_query("DROP TABLE `files`,`setting`,`loginlog`,`komments`,`guest`,`bans`;");

$sql='CREATE TABLE `guest` (
 `id` int(11) NOT NULL auto_increment,
 `name` varchar(20) NOT NULL,
 `url` varchar(60) NOT NULL,
 `mail` varchar(50) NOT NULL,
 `msg` text NOT NULL,
 `ua` varchar(100) NOT NULL,
 `ip` varchar(30) NOT NULL,
 `dt` varchar(20) NOT NULL,
 `otvet` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;';

$res = mysql_query($sql);
$error = mysql_error();

$sql='   CREATE TABLE `bans` (
 `id` int(11) NOT NULL,
 `ip` varchar(50) NOT NULL,
 `agent` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;';

$res = mysql_query($sql);
$error = mysql_error();

$sql="CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL auto_increment,
  `path` text NOT NULL,
  `infolder` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `priority` tinyint(3) NOT NULL default '0',
  `size` bigint(20) NOT NULL,
  `about` text NOT NULL,
  `fastabout` text NOT NULL,
  `loads` int(11) NOT NULL default '0',
  `timeload` int(11) unsigned NOT NULL,
  `timeupload` int(11) NOT NULL,
  `ips` text NOT NULL,
  `yes` int(4) NOT NULL default '0',
  `no` int(4) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
$res = mysql_query($sql);
$error = mysql_error();
if($error) $er = $error.'<br>';
$sql='CREATE TABLE IF NOT EXISTS `komments` (
  `id` int(11) NOT NULL auto_increment,
  `file_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `text` text NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `file_id` (`file_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;';
$res = mysql_query($sql);
$error = mysql_error();
if($error) $er .= $error.'<br>';
$sql="CREATE TABLE IF NOT EXISTS `djamol_st_Day` (
  	`id` int(11) NOT NULL auto_increment,
	`day` varchar(10) NOT NULL default '',
	`user` int(10) NOT NULL default '0',
	`view` int(10) NOT NULL default '0',
	PRIMARY KEY  (`id`)
	) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='DjAmolGroup Inc. 2014' ;";
$res = mysql_query($sql);
$error = mysql_error();
if($error) $er .= $error.'<br>';
$sql="CREATE TABLE IF NOT EXISTS `djamol_st_IPs` (
	`id` int(11) NOT NULL auto_increment,
	`ip` varchar(15) NOT NULL default '',
	`time` int(20) NOT NULL default '0',
	`online` int(20) NOT NULL default '0',
	PRIMARY KEY  (`id`)
	) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='DjAmolGroup Inc. 2014' ;";
$res = mysql_query($sql);
$error = mysql_error();
if($error) $er .= $error.'<br>';
$sql="CREATE TABLE IF NOT EXISTS `djamol_st_Page` (
	`id` int(11) NOT NULL auto_increment,
	`day` varchar(10) NOT NULL default '',
	`page` varchar(255) NOT NULL default '',
	`view` int(10) NOT NULL default '0',
	PRIMARY KEY  (`id`)
	) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='DjAmolGroup Inc. 2014' ;";
$res = mysql_query($sql);
$error = mysql_error();
if($error) $er .= $error.'<br>';
$sql="CREATE TABLE IF NOT EXISTS `djamol_st_Referer` (
	`id` int(11) NOT NULL auto_increment,
	`day` varchar(10) NOT NULL default '',
	`referer` varchar(255) NOT NULL default '',
	`view` int(10) NOT NULL default '0',
	PRIMARY KEY  (`id`)
	) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='DjAmolGroup Inc. 2014' ;";
$res = mysql_query($sql);
$error = mysql_error();
if($error) $er .= $error.'<br>';
$sql="CREATE TABLE IF NOT EXISTS `djamol_st_Keyword` (
	`id` int(11) NOT NULL auto_increment,
	`day` varchar(10) NOT NULL default '',
	`keyword` varchar(255) NOT NULL default '',
	`view` int(10) NOT NULL default '0',
	PRIMARY KEY  (`id`)
	) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='DjAmolGroup Inc. 2014' ;";
$res = mysql_query($sql);
$error = mysql_error();
if($error) $er .= $error.'<br>';
$sql="CREATE TABLE IF NOT EXISTS `djamol_st_Language` (
	`id` int(11) NOT NULL auto_increment,
	`day` varchar(10) NOT NULL default '',
	`language` varchar(2) NOT NULL default '',
	`view` int(10) NOT NULL default '0',
	PRIMARY KEY  (`id`)
	) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='DjAmolGroup Inc. 2014' ;";
$res = mysql_query($sql);
$error = mysql_error();
if($error) $er .= $error.'<br>';

$sql='CREATE TABLE IF NOT EXISTS `online` (
  `id` int(11) NOT NULL auto_increment,
  `ip` varchar(23) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `ip` (`ip`,`time`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;';
$res = mysql_query($sql);
$query = mysql_query("INSERT INTO `online` (`time`) VALUES ('0');");
$error = mysql_error();
if($error) $er .= $error.'<br>';

$sql="CREATE TABLE `setting` (
`id` int(11) NOT NULL auto_increment,
`name` text NOT NULL,
`value` text NOT NULL,
PRIMARY KEY  (`id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
$res = mysql_query($sql);
$error = mysql_error();
if($error) $er .= $error.'<br>';
$sql="CREATE TABLE `loginlog` (
`id` int(11) NOT NULL auto_increment,
`ua` text NOT NULL,
`ip` text NOT NULL,
`time` int(11) NOT NULL,
`access_num` int(3) NOT NULL,
PRIMARY KEY  (`id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
$res = mysql_query($sql);
$error = mysql_error();
if($error) $er .= $error.'<br>';
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'password','".md5(trim($_POST[pass]))."');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'path', 'files');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'opath','about');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'spath', 'screen');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'jpath', 'jardata');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'zpath', 'zipdata');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'tpath', 'themedata');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'mp3path', 'mp3data');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'limit', '10');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'klimit', '25');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'onpage', '10');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'prew', '1');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'sort', 'name');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'pagehand', '10');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'hackmess', 'Error or wrong query! Plz Log out and login!');");

$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'marker', '0');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'text_marker', '".$_SERVER['HTTP_HOST']."');");

$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'countban', '2');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'autologin', '1');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'timeban', '10');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'site_url', 'http://".$_SERVER['HTTP_HOST']."');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'zag', 'Загруз центр');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'day_new', '2');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'komments_change', '1');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'top_change', '1');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'ext', '1');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'delete_dir', '1');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'delete_file', '1');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'search_change', '1');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'eval_change', '1');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'stat_change', '1');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'onpage_change',  '1');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'preview_change', '1');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'prev_size', '40*40');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'top_num',  '20');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'pagehand_change',  '1');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'zip_change',  '1');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'jad_change',  '1');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'cut_change',  '1');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'buy_change',  '1');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'online',  '1');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'online_time',  '60');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'buy',  '[b][red]".$_SERVER['HTTP_HOST']."[/red][/b]');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'randbuy',  '0');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'zakaz',  '1');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'zakaz_email',  'admin@".$_SERVER['HTTP_HOST']."');");
$query = mysql_query("INSERT INTO `loginlog` (`ua`, `ip`, `time`) VALUES ('', '', '');");

$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'send_sms',  '0');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'komm_num',  '20');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'new_komm',  '1');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'click_change',  '1');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'new_change',  '1');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'buy3',  '[url=http://".$_SERVER['HTTP_HOST']."][color=white]© Footer[/color][/url]');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'buy2',  '[b][red]".$_SERVER['HTTP_HOST']."[/red][/b]');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'click_pas',  '0932');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'stopcomp',  '1');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'links',  '');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'sms_pas',  '3728');");
$query = mysql_query("INSERT INTO `setting` (`name`,`value`) VALUES ( 'sms_info',  '[url=http://wap.djamol.com/?sms]SMS instructions on reference[/url]');");
    $site = $_SERVER['HTTP_HOST'];
    $sname = $_SERVER['SERVER_NAME'];
    $req = $_SERVER['REQUEST_URI'];
    $emailid = $_POST["emailid"];
    $to = "$emailid";
    $subject = "DjAmolWapv 13.0 Installed Success";

    $message = <<<EOF
<html>
  <body bgcolor="#FFFF00">
    <center>
        <b>Hi!!! DjAmol Wap 13.0v.....</b> <br>
    <font color="green">$wapsite</font> <br>
    <font color="green"><b>http://$sname$req</b></font> <br>
        <a href="http://$wapsite">$wapsite</a>
    </center>
<small>Install At $site</small>
      <br><br>*** Powered By DjAmol Group <br> Regards <br>Amol Patil - Administrator
  </body>
</html>
EOF;
    $headers  = "From: support@djamolwap.com\r\n";
    $headers .= "Content-type: text/html\r\n";

    
    mail($to, $subject, $message, $headers);

print '<div class="mp3t" align="center">Installed Successfully.. plz delete install.php and Keep Visiting Daily Login Admin Panel For Script new updates.</div><div class="djafile2"><a href="cp/">Admin Login</a></div>';

}
###############DjAmol Group###############
//   DjAmolwap 13v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############


print '</body></html>';
?>