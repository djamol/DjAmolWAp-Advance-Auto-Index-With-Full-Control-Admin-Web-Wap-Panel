<?php

###############DjAmol Group###############
//   DjAmolwap 12v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############


$defaultDest = ".";            
$password = "temppass"; 
$os = "1"; 

$submit="hah!";
set_time_limit(60000);

echo "<form method=\"POST\" action=\"$PHP_SELF\">";

echo "<fieldset>\n<legend>http uploader</legend>\n";

echo "<label for=\"file\">File Url</label><br>";

echo "Example: http://wapocean.com/file.zip<br>";

echo "<input type=\"text\" name=\"file\" id=\"file\" tabindex=\"1\" value=\"\"><br>";

echo "<label for=\"new\">New file name</label><br>";

echo "Example: file.zip<br>";

echo "<input type=\"text\" name=\"new\" id=\"new\" tabindex=\"2\" value=\"\"><br>";

if ($password) {

 echo "<label for=\"password\">Password</label><br>";

 echo "<input type=\"password\" name=\"password\" id=\"password\" tabindex=\"3\" value=\"\"><br>";

}

echo "<p><input name=\"submit\" type=\"submit\" id=\"submit\" value=\"submit\"></p>";

echo "</fieldset>\n</form>";



$submit = $_POST['submit'];

if($submit) {

if($password) {

 if ($_POST['password']!=$password) {

  echo "Password incorrect!";

  } else {

  $access = "09023456353999";

  }
###############DjAmol Group###############
//   DjAmolwap 12v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############

   } else {

$access = "09023456353999";

}
###############DjAmol Group###############
//   DjAmolwap 12v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############

if($access=="09023456353999") {



if($os==2) {

 $slash="\\";

} else {

 $slash="/";

}



$file = $_POST['file'];

$newfilename = $_POST['new'];



if($_POST['otherdest']) {

 $dest = $_GET['otherdest'];

} else {

 $dest = $defaultDest;

}



$ds = array($dest, $slash, $newfilename);

 $ds = implode("", $ds);



if (file_exists($ds)) {

 echo "<p>File already exists! <br>\n Adding random digits to beginning of filename.</p>\n";

 $ds = array($dest, $slash, rand(0,9999), $newfilename);

 $ds = implode("", $ds);

}

###############DjAmol Group###############
//   DjAmolwap 12v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############


echo "<p>New destination $ds</p>\n";

if (!copy($file, $ds)) {

 echo "<p>Was unable to copy $file <br>\n See if your path and destination are correct.Pls make sure that you have chmod the destinaion folder to 777</p> \n";

} else {

 echo "<p><strong>Copy successful!</strong></p> \n";

}}}



?>