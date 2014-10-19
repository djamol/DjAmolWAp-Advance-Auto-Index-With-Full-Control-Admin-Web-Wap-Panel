<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv='Content-Type' content='text/html; charset=ISO-8859-1;charset=windows-1252' />
<meta name="keywords" content="mp3 tag editor,php mp3 tag editor,automatic mp3 tag editor" />
<meta name="description" content="Edit mp3 tags online." />
<meta http-equiv="Cache-Control" content="max-age=0" />
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="Expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
<meta http-equiv="Pragma" content="no-cache" />
<style type="">
</style>
</head>
<body>
<pre>
<h2>Mp3 tag editor-DjAmol Group</h2>
<?php

###############DjAmol Group###############
//   DjAmolwap 14v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############

function friendly_size($size,$round=2){
    $sizes=array(' Byts',' Kb',' Mb',' Gb',' Tb');
    $total=count($sizes)-1;
    for($i=0;$size>1024 && $i<$total;$i++){
        $size/=1024;
    }
    return round($size,$round).$sizes[$i];
}

$default_mp3_directory =  "./tmp/";
$default_filename_prefix = "-(Wap.DjAmol.Com).mp3";
$default_songname_prefix = "Wap.DjAmol.com_";
$default_comment = "Mp3 Tag Editor by DjAmol Group";
$default_artist = "DjAmol";
$default_album = "DjAmol.Com";
$default_year = date("Y");
$default_genre = "DjAmolWap";
$default_mp3image = array(
    "path" = "albumart.jpg", // Albumart image must be present at this path.
    "type" = "image/jpeg", // Albumart image's mime type.
    "name" = "albumart.jpg" // Albumart image's name.
    )

if(isset($_POST['submit'])){
    $mp3_filepath = $_POST['mp3_filepath'];
    $mp3_filename = $_POST['mp3_filename'];
    $mp3_songname = $_POST['mp3_songname'];
    $mp3_comment = $_POST['mp3_comment'];
    $mp3_artist = $_POST['mp3_artist'];
    $mp3_album = $_POST['mp3_album'];
    $mp3_year = $_POST['mp3_year'];
    $mp3_genre = $_POST['mp3_genre'];
	
    if(filter_var($mp3_filepath,FILTER_VALIDATE_URL)){
        if($mp3_filename!=""){
            $mp3_filename = str_replace(DIRECTORY_SEPARATOR,"-X-",$mp3_filename);
            
            if(strtolower(end(explode(".",basename($mp3_filepath))))!="mp3"){
                exit("<br />URL must have a .mp3 exntension !");
            }

            if(strtolower(end(explode(".",basename($mp3_filename))))!="mp3"){
                exit("<br />Filename must have a .mp3 exntension !");
            }
            
            $sname = $default_mp3_directory.$mp3_filename;
            if(copy($mp3_filepath,$sname)){
                $size = friendly_size(filesize($sname));
                echo"<br />Copied <a href='$mp3_filepath'>$mp3_filepath<a> to <a href='$sname'>".basename($sname)."</a> ( $size )";
                                
                $mp3_tagformat = 'UTF-8';
                
                require_once('getid3/getid3.php');
                $mp3_handler = new getID3;
                $mp3_handler->setOption(array('encoding'=>$mp3_tagformat));
                require_once('getid3/write.php');
                
                
                $mp3_writter = new getid3_writetags;
                $mp3_writter->filename       = $sname;
                $mp3_writter->tagformats     = array('id3v1', 'id3v2.3');
                $mp3_writter->overwrite_tags = true;
                $mp3_writter->tag_encoding   = $mp3_tagformat;
                $mp3_writter->remove_other_tags = true;
                
                
                $mp3_data['title'][]   = $mp3_songname;
                $mp3_data['artist'][]  = $mp3_artist;
                $mp3_data['album'][]   = $mp3_album;
                $mp3_data['year'][]    = $mp3_year;
                $mp3_data['genre'][]   = $mp3_year;
                $mp3_data['comment'][] = $mp3_comment;
                
                
                if(is_array($default_mp3image)){
		$mp3_data['attached_picture'][0]['data'] = file_get_contents($default_mp3image['path']);
        $mp3_data['attached_picture'][0]['picturetypeid'] = $default_mp3image['type'];
        $mp3_data['attached_picture'][0]['description'] = $default_mp3image['name'];
        $mp3_data['attached_picture'][0]['mime'] = $default_mp3image['type'];
	}
                    else{
                        echo"<br />Incompartible image !"; 
                    }
                }                
                
                $mp3_writter->tag_data = $mp3_data;
                
                if($mp3_writter->WriteTags()) {
                    echo"<br />Tags were successfully written.";
                }
                else{
                    echo"<br />Failed to write tags!<br>".implode("<br /><br />",$mp3_writter->errors);
                }
            }
            else{echo"<br />Unable to copy file.";}
        }
        else{echo"<br />Empty filename.";}
    }
    else{echo"<br />Invalid FilePath.";}
}
else{
    
###############DjAmol Group###############
//   DjAmolwap 14v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############

?>
<form method="post" action="" enctype="multipart/form-data">&raquo; Mp3 url
<br /><input size="50" type="text" class="input" name="mp3_filepath" value="" />
<br />&raquo; Filename 
<br /><input size="50" type="text" class="input" name="mp3_filename" value="<?php echo $default_filename_prefix ; ?>" />
<br />&raquo; Song name / title
<br /><input size="50" type="text" class="input" name="mp3_songname" value="<?php echo $default_songname_prefix ; ?>" />
<br />&raquo; Comment
<br /><input size="50" type="text" class="input" name="mp3_comment" value="<?php echo $default_comment ; ?>" />
<br />&raquo; Artist(s)
<br /><input size="50" type="text" class="input" name="mp3_artist" value="<?php echo $default_artist ; ?>" />
<br />&raquo; Album
<br /><input size="50" type="text" class="input" name="mp3_album" value="<?php echo $default_album ; ?>" />
<br />&raquo; Year
<br /><input size="50" type="text" class="input" name="mp3_year" value="<?php echo $default_year ; ?>" />
<br />&raquo; Genre
<br /><input size="50" type="text" class="input" name="mp3_genre" value="<?php echo $default_genre ; ?>" />
<br />&raquo; Album art
<br /><input size="50" type="text" class="input" name="mp3_genre" value="<?php echo $default_mp3image ; ?>" />
<br /><input size="50" type="submit" name="submit" value="Edit Tags" />
</form><!--DjAmolGroup Inc. (WwW.DjAmol.Com)-->
<br />
<a href="../apanel.php">Admin Home</a><br/></center>
<?php
}
?>
</pre>
</body>
</html>