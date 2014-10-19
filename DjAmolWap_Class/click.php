<?php
##########################################
//	DjAmol GRoup Inc.		//

//	WwW.DjAmol.Com			//
	
//	djamolpatil@gmail.com		//

//	Twitter.com/djamol		//

// Best Offer For New Buyer contact now //

//	http://ai.djamol.com/ <-Buy Now	//
##########################################
require 'moduls/fun.php';
require 'moduls/connect.php';

ob_start();
error_reporting(0);
// Проверка переменных
$gid = intval($_GET['gid']);
$gid = $_GET['gid'];
$kod = $_POST['kod'];
$gosite= $_POST['gosite'];
$sid = $_GET['sid'];
$action = $_GET['action'];

include('config_click.php');



// djamolpatil@gmail.com
session_name("click");
// запускаем сессию
session_start();
// twitter.com/djamol
$sid=session_id();

	if ($_SESSION['ok']==1) {            //djamol.com

          header('Location: '.$file);
          die();
}

if ($stopcomp==0) { 
if (strstr($_SERVER['HTTP_USER_AGENT'], 'Opera') or strstr($_SERVER['HTTP_USER_AGENT'], 'Mozilla')) {
     header("Location: stop.php?gid=$gid");
     exit;
}
}

else{
if ($action)
{
 switch($_GET['action'])
 {
##########################################
//	DjAmol GRoup Inc.		//

//	WwW.DjAmol.Com			//
	
//	djamolpatil@gmail.com		//

//	Twitter.com/djamol		//

// Best Offer For New Buyer contact now //

//	http://ai.djamol.com/ <-Buy Now	//
##########################################
  case '1':
  
include 'moduls/header.php';
echo '<div class="menu">Досутуп к разделу закрыт!</div>';
echo '<div class="a">';  
$time = date("H");

if($time > 5 && $time < 13) echo("Доброе утро!<br />");
elseif($time > 12 && $time < 19) echo("Добрый день!<br />");
elseif($time > 18 && $time < 23) echo("Добрый вечер!<br />");
else echo("Доброй ночи!<br />");



echo "$textvhod";
echo '</div><div class="menu">Введите полученый вами код:</div><div class="a">
<form action="click.php?gid='.$gid.'&action=3" method="post">
<input maxlength="10" class="enter" type="text" name="kod"/><br>
<input class="buttom" type="submit" name="a" value="ок"/>
</form>
</div>';

echo '
<div class="a"><div class="i_bar_t"><a href="index.php?">Загрузки</a></div>
<div class="i_bar_t"><a href="'.$setup['site_url'].'">На главную</a></div>
';
echo '</div>';
echo '<div class="title">';
include 'moduls/foot.php';
echo '</div></div>';
  break;
#####################################Активация
  case '2':
include 'moduls/header.php';  




echo '<div class="menu">Досутуп к разделу закрыт!</div>';
echo '<div class="a">';  


// отключаем куки и переходящие sid-ы
ini_set('session.use_cookies', '0');
ini_set('session.use_trans_sid', '0');


// загружаем файл счетчика
$gocount=file("gocount.txt");
// за сегодня
$today=@intval($gocount[0]);
// всего
$all=@intval($gocount[1]);
// дата последнего вызова
$ldate=@intval($gocount[2]);
// если дата поледнего вызова не совпадает с текущей датой
if ($ldate!=date('d')) {
	// то обнуляем счетчик за сегодня и перезаписываеи файл
	$today=0;
	$ldate=date('d');
	$fp=fopen('gocount.txt', 'w');
	fwrite($fp, "$today\n");
	fwrite($fp, "$all\n");
	fwrite($fp, "$ldate\n");
	fclose($fp);
}

##########################################
//	DjAmol GRoup Inc.		//
header("Cache-Control: no-cache,no-store,must-revalidate");
header("Pragma: no-cache");

$active=false;
foreach ($links as $n=>$link) {
     if (@$_SESSION['link'.$n]!=true) {
          $active=true;
     }
}

// если не передан sid, то выдаем редирект на себя (для старых браузеров)
if (!isset($_GET['sid'])) {
	header("Location: click.php?sid=$sid&gid=$gid&action=2");
	exit;
}

// если передан параметр gosite (войти на сайт)
if (@$_GET['gosite']=='true') {
	// увеличиваем счетчики
	$today++;
	$all++;	
	$id=($gid+30)/2;
	// редирект на сайт
	header("Location: $file");
	// перезаписываем файл счетчика
	$fp=fopen('gocount.txt', 'w');
	fwrite($fp, "$today\n");
	fwrite($fp, "$all\n");
	fwrite($fp, "$ldate\n");
	fclose($fp);
	exit;
}

// если передан GET-параметр go с номером ссылки
if (isset($_GET['go'])) {
	// номер ссылки, по которой собирается перейти юзарь
	$l=$_GET['go'];
//	http://ai.djamol.com/ <-Buy Now	//
##########################################
	$_SESSION['link'.$l]=true;
	// выдаеи редирект на ссылку из массива links
	header("Location: $links[$l]");
} else {


	
	if (@!$active) {
          echo "$textaktiv";
          $ok=1;
          session_register ("ok") ;
       } else {
echo "$textlinks";
}
	
	// если нет активных ссылок
	if (@!$active) {	        
		// ссылка на этот файл с параметром gosite (чтобы подсчитать количество переходов)
		echo "<a href=\"click.php?action=2&gid=$gid&gosite=true&amp;sid=$sid\">$filename</a><br/>";
	}
		
	// идем по массиву links 
	foreach ($links as $n=>$link) {
		// n - номер текущего елемента, link - значение (урл ссылки) 
		// если в сессии присуствует параметр с номером ссылки и значением true
		// @ надо, чтобы не возникало ошибки notice
		if (@$_SESSION['link'.$n]==true) {
			echo "Ссылка $n [активна]<br/>";
		} else {
			// иначе выводим ссылку на этот файл с параметром go с номером ссылки и интедификатором сессии
			// сразу урл нельзя выводить потому, что тогда не узнать, перешел ли юзарь по ссылке
			echo "<a href=\"click.php?action=2&gid=$gid&go=$n&amp;sid=$sid\">Ссылка $n</a> [не активна]<br/>";
			// это означает, что есть еще активные ссылки и нельзя войти на сайт
			$active=true;
		}
	}
	
        echo "<br/>";
	// счетчик
	echo "$countname<br/>
Сегодня: $today человек(а)<br/> 
Всего: $all человек(а)<br/><br/>";
echo '</div>';
echo '
<div class="a"><div class="i_bar_t"><a href="index.php?">Загрузки</a></div>
<div class="i_bar_t"><a href="'.$setup['site_url'].'">На главную</a></div>
';

echo '</div><div class="title">';
include 'moduls/foot.php';
echo '</div></div>';
	

}

// для отмены переходяших sid-ов, НЕ ИЗМЕНЯТЬ!!!
$text=ob_get_contents();
ob_end_clean();
echo $text;
  break;
###########################################
//	http://ai.djamol.com/ <-Buy Now	//
##########################################
  case '3':  
    if ($kod==$pas)
     {
     $id=($gid+30)/2;
      header('Location: index.php?id='.$id.'');
      die();
     }
else {
include 'moduls/header.php';
echo '<div class="menu"><font color="red">Пароль неверный!Повторите ввод.</font></div>';
echo '<div class="menu">Досутуп к разделу закрыт!</div>';
echo '<div class="a">';  
$time = date("H");

if($time > 5 && $time < 13) echo("Доброе утро!<br />");
elseif($time > 12 && $time < 19) echo("Добрый день!<br />");
elseif($time > 18 && $time < 23) echo("Добрый вечер!<br />");
else echo("Доброй ночи!<br />");

##########################################
//	DjAmol GRoup Inc.		//

//	WwW.DjAmol.Com			//
	
//	djamolpatil@gmail.com		//

//	Twitter.com/djamol		//

// Best Offer For New Buyer contact now //

//	http://ai.djamol.com/ <-Buy Now	//
##########################################

echo "$textvhod";
echo '</div><div class="menu">Введите полученый вами код:</div><div class="a">
<form action="click.php?gid='.$gid.'&action=3" method="post">
<input maxlength="10" class="enter" type="text" name="kod"/><br>
<input class="buttom" type="submit" name="a" value="ок"/>
</form>
</div>';

echo '
<div class="a"><div class="i_bar_t"><a href="index.php?">Загрузки</a></div>
<div class="i_bar_t"><a href="'.$setup['site_url'].'">На главную</a></div>
';
echo '</div>';
echo '<div class="title">';
include 'moduls/foot.php';
echo '</div></div>';
    }
  break;
 }
}
else exit;}
?>
