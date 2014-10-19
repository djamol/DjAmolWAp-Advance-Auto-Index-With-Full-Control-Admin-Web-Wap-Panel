<?php
###############DjAmol Group###############
//   DjAmolwap 12v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############

class getid3_rar
{

	var $option_use_rar_extension = false;

	function getid3_rar(&$fd, &$ThisFileInfo) {

		$ThisFileInfo['fileformat'] = 'rar';

		if ($this->option_use_rar_extension === true) {
			if (function_exists('rar_open')) {
				if ($rp = rar_open($ThisFileInfo['filename'])) {
					$ThisFileInfo['rar']['files'] = array();
					$entries = rar_list($rp);
					foreach ($entries as $entry) {
						$ThisFileInfo['rar']['files'] = getid3_lib::array_merge_clobber($ThisFileInfo['rar']['files'], getid3_lib::CreateDeepArray($entry->getName(), '/', $entry->getUnpackedSize()));
					}
					rar_close($rp);
					return true;
				} else {
					$ThisFileInfo['error'][] = 'failed to rar_open('.$ThisFileInfo['filename'].')';
				}
			} else {
				$ThisFileInfo['error'][] = 'RAR support does not appear to be available in this PHP installation';
			}
		} else {
			$ThisFileInfo['error'][] = 'PHP-RAR processing has been disabled (set $getid3_rar->option_use_rar_extension=true to enable)';
		}
		return false;

	}

}


?>