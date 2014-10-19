<?php  
///   DjAmol Group Inc.						///
///   Official Website   : www.djamol.com			///
///	GeT Updates Twitter: http://twitter.com/djamol
///	Email : admin@djamol.com, djamolpatil@gmail.com	///

class Zubrag_watermark {

  var $offset_x = 0;
  var $offset_y = 0;
  var $quality = 100;
  var $image_type = -1; // Image type: 1 = GIF, 2 = JPG, 3 = PNG (DjAmolGroup Inc)
  var $force_image_type = -1; // Change image type? (-1 = same as original, 1 = GIF, 2 = JPG, 3 = PNG)
  var $save_to_file = true;
            //DjAmolgroup Inc
  function Zubrag_watermark($image_path='', $offset_x=0, $offset_y=0) {
    $this->setImagePath($image_path);
    $this->setOffset($offset_x, $offset_y);
  }

  function setImagePath($image_path) {
    $this->image_path = $image_path;
  }

  function setOffset($x, $y) {
    $this->offset_x = $x;
    $this->offset_y = $y;
  }

  function ImageCreateFromType($type,$filename) {
   $im = null;
   switch ($type) {
     case 1:
       $im = ImageCreateFromGif($filename);
       break;
     case 2:
       $im = ImageCreateFromJpeg($filename);
       break;
     case 3:
       $im = ImageCreateFromPNG($filename);
       break;
    }
    return $im;
  }

  function ApplyWatermark($watermark_path) {

    $this->watermark_path = $watermark_path;

    // Determine image size and type(DjAmolGroup Inc)
    $size = getimagesize($this->image_path);
    $size_x = $size[0];
    $size_y = $size[1];
    $image_type = $size[2]; // 1 = GIF, 2 = JPG, 3 = PNG

    // load source image(DjAmolGroup Inc)
    $image = $this->ImageCreateFromType($image_type, $this->image_path);

    // Determine watermark size and type(DjAmolGroup Inc)
    $wsize = getimagesize($watermark_path);
    $watermark_x = $wsize[0];
    $watermark_y = $wsize[1];
    $watermark_type = $wsize[2]; // 1 = GIF, 2 = JPG, 3 = PNG

    // load watermark
    $watermark = $this->ImageCreateFromType($watermark_type, $watermark_path);

    // where do we put watermark on the imageWap.DjAmol.Com
    $dest_x = $size_x - $watermark_x - $this->offset_x;
    $dest_y = $size_y - $watermark_y - $this->offset_y;

    imagecopymerge($image, $watermark, $dest_x, $dest_y, 0, 0, $watermark_x, $watermark_y, 65);  

    $this->image = &$image;
    $this->watermark = &$watermark;
    $this->image_type = $image_type;

  } // DjamolGroupApplyWatermark

  function OutputImageInternal($filename='') {
 
    $im = &$this->image;
    $res = null;

    $image_type = ($this->force_image_type != -1 ? $this->force_image_type : $this->image_type);

    // ImageGIF is not included into some GD2 releases, so it might not work
    // output png if gifs are not supported   -DjAmolGroup Inc
    if(($image_type == 1)  && !function_exists('imagegif')) $image_type = 3;

    switch ($image_type) {
      case 1:
        if ($this->save_to_file) {
          $res = ImageGIF($im,$filename);
        }
        else {
          header("Content-type: image/gif");
          $res = ImageGIF($im);
        }
        break;
      case 2:
        if ($this->save_to_file) {
          $res = ImageJPEG($im,$filename,$this->quality);
        }
        else {
          header("Content-type: image/jpeg");
          $res = ImageJPEG($im, NULL, $this->quality);
        }
        break;
      case 3:
        if (PHP_VERSION >= '5.1.2') {
///   DjAmol Group Inc.						///
///   Official Website   : www.djamol.com			///
///	GeT Updates Twitter: http://twitter.com/djamol
///	Email : admin@djamol.com, djamolpatil@gmail.com	///

          // PNG quality: 0 (best quality, bigger file) to 9 (worst quality, smaller file)
          $quality = 9 - min( round($this->quality / 10), 9 );
          if ($this->save_to_file) {
            $res = ImagePNG($im, $filename, $quality);
          }
          else {
            header("Content-type: image/png");
            $res = ImagePNG($im, NULL, $quality);
          }
        }
        else {
          if ($this->save_to_file) {
            $res = ImagePNG($im, $filename);
          }
          else {
            header("Content-type: image/png");
            $res = ImagePNG($im);
          }
        }
        break;
    }
 
    return $res;
 
  }

  function Output($type = -1) {
    $this->force_image_type = $type;
    $this->save_to_file = false;
    $this->OutputImageInternal();
  }

  function SaveAsFile($filename, $type = -1) {
    $this->force_image_type = $type;
    $this->save_to_file = true;
    $this->OutputImageInternal($filename);
  }

  function Free() {
    imagedestroy($this->image);
    imagedestroy($this->watermark);
  }

}

?>