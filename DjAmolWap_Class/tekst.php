<?php
###############DjAmol Group###############
//   DjAmolwap 12v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############
require 'moduls/ini.php';
require 'moduls/fun.php';
require 'moduls/connect.php';
require 'moduls/header.php';
require 'online.php';
########DjAmol.Com###################
if (isset ($_GET['pic']))  
{  
   $file=$_GET[pic];  
   if (strtolower (end (explode ('.', $_GET[pic]))) == 'jpg') $i     = ImageCreateFromJpeg($file);  
   elseif (strtolower (end (explode ('.', $_GET[pic]))) == 'png') $i = ImageCreateFromPNG($file);  
   else die ("Невозможно обработать изображение в формате GIF");  
   $o = ImageCreate(imagesx($i), imagesy($i));  

   for ($n = 0; $n < 256; $n++)   
   {  //DjAmol.Com
      imagecolorallocate($o, $n, $n, $n);  
   }  

   imagecopy ($o, $i, 0, 0, 0, 0, imagesx ($i), imagesy ($i));  

   $lim = 256/2;  

   echo '<pre style="font-size: 8px; letter-spacing: 0px; line-height: 80%;">';  
     
   for ($y = 0; $y < imagesy ($o); $y++)  
   {  
      for ($x = 0; $x < imagesx ($o); $x++)  
      {  
         if ((imagecolorat($o, $x, $y) & 0xFF)>$lim) echo _; else echo 0;  
      }   
      echo "\n";  
   }  

   echo '</pre>';     //Twitter.com/djAmol
}  
echo '</div>';
echo '<div class="i_bar_t"><a href="'.$setup['site_url'].'">На главную</a></div>';
if($setup['online'] == 1)echo '<div class="menu">Online: <strong>'.$all_online[0].'</strong></div>';
echo '<div class="title">';
require 'moduls/foot.php';
echo '</div></div>';
?>