<?php
###############DjAmol Group###############
//   DjAmolwap 12v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############

class getid3_pdf
{

	function getid3_pdf(&$fd, &$ThisFileInfo) {

		$ThisFileInfo['fileformat'] = 'pdf';

		$ThisFileInfo['error'][] = 'PDF parsing not enabled in this version of getID3()';
		return false;

	}

}


?>