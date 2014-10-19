<?php
###############DjAmol Group###############
//   DjAmolwap 12v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############
include 'moduls/app/ad.php';
?>
<div class='mp3t' align='center'>Advertisment (Setting):</div>
<form action='?action=fetch' method='post'>
<input type="hidden" name="id" value="ad">
<table border='1'>
<tr>
<th rowspan='2'>Category Header</th>
<td><input type='radio' name='ad1' <?php if ($ad1 == '1') { ?>checked='checked' <?php } ?>value='1'>Enable
</tr>
<tr>
<td><input type='radio' name='ad1' <?php if ($ad1 == '0') { ?>checked='checked' <?php } ?>value='0'>Disable</td>
</tr>
<tr>
<th rowspan='2'>Category Footer</th>
<td><input type='radio' name='ad2' <?php if ($ad2 == '1') { ?>checked='checked' <?php } ?>value='1'>Enable
</tr>
<tr>
<td><input type='radio' name='ad2' <?php if ($ad2 == '0') { ?>checked='checked' <?php } ?>value='0'>Disable</td>
</tr>
<tr>
<th rowspan='2'>Details Header</th>
<td><input type='radio' name='ad3' <?php if ($ad3 == '1') { ?>checked='checked' <?php } ?>value='1'>Enable
</tr>
<tr>
<td><input type='radio' name='ad3' <?php if ($ad3 == '0') { ?>checked='checked' <?php } ?>value='0'>Disable</td>
</tr>
<tr>
<th rowspan='2'>Details Header</th>
<td><input type='radio' name='ad4' <?php if ($ad4 == '1') { ?>checked='checked' <?php } ?>value='1'>Enable
</tr>
<tr>
<td><input type='radio' name='ad4' <?php if ($ad4 == '0') { ?>checked='checked' <?php } ?>value='0'>Disable</td>
</tr>
</table>
<center><input type='image' src='cp/ClassDj_AmolWap/button.png' name='submit'> </center>
</form>