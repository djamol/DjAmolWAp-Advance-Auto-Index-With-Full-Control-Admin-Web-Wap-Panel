<?php
###############DjAmol Group###############
//   DjAmolwap 12v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############
include 'moduls/app/atag.php';

echo "<form action='?action=fetch' method='post'>
<input type='hidden' name='id' value='atag'>
<div class='mp3t' align='center'>Auto Mp3 TAG (Setting):</div>
<center>Song's name:<br /> <input type='text' name='name' value='$name'><br /> 
Artist's name:<br /> <input type='text' name='artist' value='$artist'> <br /> 
Album's name:<br /> <input type='text' name='album' value='$album'><br />  
Song's year:<br /> <input type='text' name='year' value='$year'> <br /> 
Genre:<br /> <input type='text' name='genre' value='$genre'> <br /> 
comments:<br /> <input type='text' name='comments' value='$comments'> <br /> 
<input type='image' src='cp/ClassDj_AmolWap/button.png' name='submit'> </center>
</form><br /> ";
?>
<b>Note :Activate Auto Mp3 Plugin Setting, Change/Edit Mp3Tag Image Replace "albumart.jpg" File in root</b>