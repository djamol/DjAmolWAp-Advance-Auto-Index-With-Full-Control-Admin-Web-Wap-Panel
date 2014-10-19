<?php
#-----------------------------------------------------	#
# 	============DjAmol Group =============       		#
# 	 	    DjAmol Wap Script 							#
# 			E-mail : admin@djamol.com					#
# 			GTalk : djamolpatil@gmail.com				#
# 			Yahoo : djamolpatil@yahoo.com				#
# DjAmol Hosting Service SharedAnd Reseller Linux Host	#
#           http://host.djamol.com  					#
#-----------------------------------------------------	#
include '../moduls/ini.php';
list($msec,$sec)=explode(chr(32),microtime());
$HeadTime=$sec+$msec;
session_name('SID') ;
session_start() ;
include '../moduls/fun.php';
include '../moduls/connect.php';
$info = mysql_fetch_array(mysql_query('SELECT * FROM `loginlog` WHERE `id`=1'));
$timeban = $time - $info['time'];
//---------------DjAmol Wap 12 Version----------------
if($timeban < $setup['timeban']){
include '..moduls/header.php';
die('DjAmolGroup inc '.($setup['timeban']-$timeban).' секунд!');
}
//Twitter.com/DjAmol

###############DjAmol Group###############
//   DjAmolwap 14v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############

if($info['access_num'] > $setup['countban'])
{
	include '../moduls/header.php';
	$query = mysql_query('UPDATE `loginlog` SET `time`='.$time.', `access_num`=0 WHERE `id` = 1;');
	die('Вы '.$setup['countban'].' раза ввели неверный пароль.Вы заблокированы на '.$setup['timeban'].' секунд');
}
//------------------DjAmolWap 12 version-------------
//if ($_SESSION['autorise']!="" && $_SESSION['ip']!="" && $_SESSION['autorise']==$setup['password'] && $_SESSION['ip']==$ip)  header("Location: web.php?".SID."");
if(!isset($_POST['p']) and !isset($_GET['p']))
{
?>
<head>
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
       <title>DjAmolGroup-DjAmolWap Admin Login</title>
       <meta name="description" content="djamolgrouplogin">
       <style type="text/css">
       * {
              margin: 0px;
              padding: 0px;outline: none;
       }
       body {
              background: #00FF99;
       }
       form {
              border: 1px solid #270644;
              width: 250px;
              -moz-border-radius: 20px;
              -webkit-border-radius: 20px;
              background:  -moz-linear-gradient(19% 75% 90deg,#CC66FF, #66FFFF);
              background:-webkit-gradient(linear, 0% 0%, 0% 100%, from(#66FFFF), to(#CC66FF));
              margin:50px auto;
              padding: 20px;
              -moz-box-shadow:0px -5px 300px #270644;
              -webkit-box-shadow:0px -5px 300px #270644;
       }
       label {
              font-size: 12px;
              font-family: arial, sans-serif;
              list-style-type: none;
              color: #fff;
              text-shadow: #000 1px 1px;
              margin-bottom: 10px;
              font-weight: bold;
              letter-spacing: 1px;
              text-transform: uppercase;
              display: block;
       }
       input {
         -webkit-transition-property: -webkit-box-shadow, background;
         -webkit-transition-duration: 0.25s;
              padding: 6px;
              border-bottom: 0px;
              border-left: 0px;
              border-right: 0px;
              border-top: 1px solid #ad64e0;
              -moz-box-shadow: 0px 0px 2px #000;
              -webkit-box-shadow: 0px 0px 2px #000;
              margin-bottom: 10px;
              background: #8a33c6;
              width: 230px;
       }
       input.submit {
         -webkit-transition-property: -webkit-box-shadow, background;
         -webkit-transition-duration: 0.25s;
              width: 100px;
              background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#66FFFF), to(#781bb9));
              background:  -moz-linear-gradient(19% 75% 90deg,#781bb9, #66FFFF);
              color: #fff;
              text-transform: uppercase;
              text-shadow: #000 1px 1px;
              border-top: 1px solid #ad64e0;
              margin-top: 10px;
       }
       input.submit:hover {
              -webkit-box-shadow: 0px 0px 2px #000;
              background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#66FFFF), to(#781bb9));
              background:  -moz-linear-gradient(19% 75% 90deg,#781bb9, #66FFFF);
       }
       input.submit:active {
              background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#781bb9), to(#66FFFF));
              background:  -moz-linear-gradient(19% 75% 90deg,#66FFFF, #781bb9);
       }
       input:hover {
              -webkit-box-shadow: 0px 0px 4px #000;
              background: #9d39e1;
       }
       </style>
</head>
<body>
<?php
echo '
<form method="post" action="index.php?">
<h3>Login Admin</h3>
<br>Password :<br><!--DjAmolWap12v Powered By DjAmolGroup Inc. (WwW.DjAmol.Com) -->
<input class="enter" type="password" name="p"><br>
<input class="submit" type="submit" value="Submit">

</br>';
list($msec,$sec)=explode(chr(32),microtime());
echo ''.round(($sec+$msec)-$HeadTime,4).' сек.<br>[&copy; Wap.DjAmol.Com]<br>[&reg; DjAmolGroup]</form></body></html><!--DjAmolWap12v -->';
exit;
}

###############DjAmol Group###############
//   DjAmolwap 14v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############

if(($_POST['p'] && md5(clean($_POST['p'])) == $setup['password']) or ($setup['autologin']==1 && isset($_GET['p']) && $_GET['p']!='' && md5(clean($_GET['p'])) == $setup['password']))
{
$ua = getenv('HTTP_USER_AGENT');
$_SESSION['ipu'] = $ipu = $ip;
mysql_query("INSERT INTO `loginlog` (`ua`, `ip`, `time`) VALUES ('".clean($ua)."', '".clean($ip)."', '".$time."');");
$_SESSION['autorise'] = $autorise = md5(clean($_POST['p']));
header('Location: web.php?'.SID);
exit;
}
else{
include '../moduls/header.php';
print 'Password is entered incorrectly. It remains to attempt to lock: '.($setup['countban']-$info['access_num']);
mysql_query('UPDATE `loginlog` SET `access_num`=`access_num`+1 WHERE `id` = 1;');
}
?>