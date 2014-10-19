<?php
###############DjAmol Group###############
//   DjAmolwap 12v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############


class getid3_doc
{

	function getid3_doc(&$fd, &$ThisFileInfo) {

		$ThisFileInfo['fileformat'] = 'doc';

		$ThisFileInfo['error'][] = 'MS Office (.doc, .xls, etc) parsing not enabled in this version of getID3()';
		return false;

	}

}


?>