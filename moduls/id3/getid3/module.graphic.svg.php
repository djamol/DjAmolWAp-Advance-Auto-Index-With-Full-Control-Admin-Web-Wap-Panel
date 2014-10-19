<?php
###############DjAmol Group###############
//   DjAmolwap 12v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############

class getid3_svg
{


	function getid3_svg(&$fd, &$ThisFileInfo) {
		fseek($fd, $ThisFileInfo['avdataoffset'], SEEK_SET);

		// I'm making this up, please modify as appropriate
		$SVGheader = fread($fd, 32);
		$ThisFileInfo['svg']['magic']  = substr($SVGheader, 0, 4);
		if ($ThisFileInfo['svg']['magic'] == 'aBcD') {

			$ThisFileInfo['fileformat']                  = 'svg';
			$ThisFileInfo['video']['dataformat']         = 'svg';
			$ThisFileInfo['video']['lossless']           = true;
			$ThisFileInfo['video']['bits_per_sample']    = 24;
			$ThisFileInfo['video']['pixel_aspect_ratio'] = (float) 1;

			$ThisFileInfo['svg']['width']  = getid3_lib::LittleEndian2Int(substr($fileData, 4, 4));
			$ThisFileInfo['svg']['height'] = getid3_lib::LittleEndian2Int(substr($fileData, 8, 4));

			$ThisFileInfo['video']['resolution_x'] = $ThisFileInfo['svg']['width'];
			$ThisFileInfo['video']['resolution_y'] = $ThisFileInfo['svg']['height'];

			return true;
		}
		$ThisFileInfo['error'][] = 'Did not find SVG magic bytes "aBcD" at '.$ThisFileInfo['avdataoffset'];
		unset($ThisFileInfo['fileformat']);
		return false;
	}

}


?>