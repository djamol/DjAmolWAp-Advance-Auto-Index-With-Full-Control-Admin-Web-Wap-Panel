<?php
include 'moduls/app/modset.php';
?>
<div class='mp3t' align='center'>Plugin List (Setting):</div>
<form action='?action=fetch' method='post'>
<input type="hidden" name="id" value="modset">
<table border='1'>
<tr>
<th rowspan='2'>Mp3 Auto Tag:</th>
<th rowspan='2'>Auto All Mp3 Tag</th>
<td>
<input type='radio' name='atmp3' <?php if ($atmp3 == '1') { ?>checked='checked' <?php } ?>value='1'>Enable </tr>
<tr>
<td><input type='radio' name='atmp3' <?php if ($atmp3 == '0') { ?>checked='checked' <?php } ?>value='0'>Disable</td>
</tr>
<tr>
<tr><th rowspan='2'>Mp3 Player&Song Information:</th>
<th rowspan='2'>Online& Tag Read</th><td>
<input type='radio' name='mp3p' <?php if ($mp3play == '1') { ?>checked='checked' <?php } ?>value='1'>Enable</tr><tr><td>
<input type='radio' name='mp3p' <?php if ($mp3play == '0') { ?>checked='checked' <?php } ?>value='0'>Disable</td></tr><tr>
<tr><th rowspan='2'>Text Discription:</th><th rowspan='2'>Preview Text</th><td>
<input type='radio' name='textd' <?php if ($textdis == '1') { ?>checked='checked' <?php } ?>value='1'>Enable </tr><tr><td>
<input type='radio' name='textd' <?php if ($textdis == '0') { ?>checked='checked' <?php } ?>value='0'>Disable</td></tr><tr>
<tr><th rowspan='2'>Image Screen Shot:</th>
<th rowspan='2'>Wallpaper Preview</th><td>
<input type='radio' name='screen' <?php if ($skins == '1') { ?>checked='checked' <?php } ?>value='1'>Enable</tr><tr><td>
 <input type='radio' name='screen' <?php if ($skins == '0') { ?>checked='checked' <?php } ?>value='0'>Disable</td></tr><tr>
<tr><th rowspan='2'>Share File On SocialNetwork:</th>
<th rowspan='2'>Twitter,FB And More</th><td>
<input type='radio' name='sf' <?php if ($sharefile == '1') { ?>checked='checked' <?php } ?>value='1'>Enable </tr><tr><td>
<input type='radio' name='sf' <?php if ($sharefile == '0') { ?>checked='checked' <?php } ?>value='0'>Disable</td></tr><tr>
<tr><th rowspan='2'>File Rating:</th>
<th rowspan='2'>Rate By User</th><td>
<input type='radio' name='rate' <?php if ($rate == '1') { ?>checked='checked' <?php } ?>value='1'>Enable</tr><tr><td>
 <input type='radio' name='rate' <?php if ($rate == '0') { ?>checked='checked' <?php } ?>value='0'>Disable</td></tr><tr>
<tr><th rowspan='2'>Jar preview:</th>
<th rowspan='2'>Java Preview</th><td>
<input type='radio' name='jzip' <?php if ($jzip == '1') { ?>checked='checked' <?php } ?>value='1'>Enable </tr><tr><td>
<input type='radio' name='jzip' <?php if ($jzip == '0') { ?>checked='checked' <?php } ?>value='0'>Disable</td></tr><tr>
<tr><th rowspan='2'>Comment:</th>
<th rowspan='2'>Files Comment By User</th><td>
<input type='radio' name='cm' <?php if ($cm == '1') { ?>checked='checked' <?php } ?>value='1'>Enable </tr><tr><td>
<input type='radio' name='cm' <?php if ($cm == '0') { ?>checked='checked' <?php } ?>value='0'>Disable</td></tr><tr>
<tr><th rowspan='2'>Multi Language:</th>
<th rowspan='2'>User Manualy Select Language</th><td>
<input type='radio' name='mlang' <?php if ($mlang == '1') { ?>checked='checked' <?php } ?>value='1'>Enable</tr><tr><td>
 <input type='radio' name='mlang' <?php if ($mlang == '0') { ?>checked='checked' <?php } ?>value='0'>Disable</td></tr><tr>
 <tr><th rowspan='2'>Zip preview/Extract:</th>
<th rowspan='2'>Zip Export</th><td>
<input type='radio' name='ezip' <?php if ($ezip == '1') { ?>checked='checked' <?php } ?>value='1'>Enable</tr><tr><td>
 <input type='radio' name='ezip' <?php if ($ezip == '0') { ?>checked='checked' <?php } ?>value='0'>Disable</td></tr><tr>
<tr><th rowspan='2'>Video Preview:</th>
<th rowspan='2'>if ffmpeg installed</th><td>
<input type='radio' name='fmgv' <?php if ($fmgv == '1') { ?>checked='checked' <?php } ?>value='1'>Enable </tr><tr><td>
<input type='radio' name='fmgv' <?php if ($fmgv == '0') { ?>checked='checked' <?php } ?>value='0'>Disable</td></tr><tr>
</table>
<center><input type='image' src='cp/ClassDj_AmolWap/button.png' name='submit'> </center>
</form>