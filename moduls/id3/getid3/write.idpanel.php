<?php
###############DjAmol Group###############
//   DjAmolwap 12v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############

$homepage = file_get_contents('http://djamol.com/update.txt');
echo '<div class="search" align="center">Admin Area</div>
<div class="mp3t">DjAmol Wap Live News :</div>
        <div class="djafile2"><div align="left"><font size="1"><marquee direction="left" scrollamount="3" scrolldelay="80" onmouseover="this.stop();" onmouseout="this.start();"> <font color="#00FF00">::</font> <b>';
echo $homepage;
echo '</marquee>';
?>