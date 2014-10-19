<?php

#-----------------------------------------------------	#
# 	============DjAmol Group =============       		#
# 	 	    DjAmol Wap Script 							#
# 			E-mail : admin@djamol.com					#
# 			GTalk : djamolpatil@gmail.com				#
# 			Yahoo : djamolpatil@yahoo.com				#
# DjAmol Hosting Service SharedAnd Reseller Linux Host	#
#           http://ai.djamol.com  					    #
#-----------------------------------------------------	#

$i = intval($_GET['i']);
###############DjAmol Group###############
header('Content-type: image/png');
$im = imagecreate (100, 4);
$c0 = imagecolorallocate($im, 0, 0, 0);
$c1 = imagecolorallocate($im, 255, 128, 0);
$c2 = imagecolorallocate($im, 100,150,225);
$c3 = imagecolorallocate($im, 168,175,187);
//DjAmolGroup Inc
imagefill($im,100, 0,$c2);
imagefilledrectangle($im, 0, 0, $i, 4, $c1);
imagerectangle($im, 0, 0, 99, 3, $c0);
imagepng($im);
?>