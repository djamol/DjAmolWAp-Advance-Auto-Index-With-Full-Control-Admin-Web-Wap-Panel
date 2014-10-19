<?php
###############DjAmol Group###############
//   DjAmolwap 12v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############
 session_start(); 
include '../moduls/config.php';
 $host=$SERVERmysql;
  $dbuser=$DB_USER; 
  $dbbase=$DB;
   $dbpass=$DB_PASS; $connect=mysql_connect($host,$dbuser,$dbpass) or die("Сервер базы данных недоступен!<br>"); 
   mysql_select_db($dbbase,$connect) or die("База данных недоступна!<br>"); 
   $close="no"; /*Если дать значение переменной close 'yes'  то гостя будет закрыта для(DjamolGroup Inc) добавления сообщений*/ 
  
$start = intval($_GET['start']);
$id = intval($_GET['id']);  



   ?>
