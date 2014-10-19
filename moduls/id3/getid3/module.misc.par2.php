<?php
###############DjAmol Group###############
//   DjAmolwap 12v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############


class getid3_par2
{

	function getid3_par2(&$fd, &$ThisFileInfo) {

		$ThisFileInfo['fileformat'] = 'par2';

		$ThisFileInfo['error'][] = 'PAR2 parsing not enabled in this version of getID3()';
		return false;

	}

}


?>