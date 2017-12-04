function imageblurfunc($imgpath, $percentage){
  //header('Content-Type: image/jpeg');
  $file = $imgpath;

  $info = pathinfo( $file );
    $ext  = empty( $info['extension'] ) ? '' : $info['extension'];

    if($ext == 'jpg' || $ext == 'jpeg'){
      $image = imagecreatefromjpeg($file);
    }elseif($ext == 'png'){
      $image = imagecreatefrompng($file);
    }
  

      /* Get original image size */
      list($w, $h) = getimagesize($file);
      $bh = ($h * $percentage) /100 ;

      /* Create array with width and height of down sized images */
      $size = array('sm'=>array('w'=>intval($w/4), 'h'=>intval($h/4)),
                     'md'=>array('w'=>intval($w/2), 'h'=>intval($h/2))
                    );                       

      /* Scale by 25% and apply Gaussian blur */
      $sm = imagecreatetruecolor($size['sm']['w'],$size['sm']['h']);
      imagecopyresampled($sm, $image, 0, 0, 0, 0, $size['sm']['w'], $size['sm']['h'], $w, $bh);

      for ($x=1; $x <=40; $x++){
          imagefilter($sm, IMG_FILTER_GAUSSIAN_BLUR, 999);
      } 

      imagefilter($sm, IMG_FILTER_SMOOTH,99);
      imagefilter($sm, IMG_FILTER_BRIGHTNESS, 10);        

      /* Scale result by 200% and blur again */
      $md = imagecreatetruecolor($size['md']['w'], $size['md']['h']);
      imagecopyresampled($md, $sm, 0, 0, 0, 0, $size['md']['w'], $size['md']['h'], $size['sm']['w'], $size['sm']['h']);
      imagedestroy($sm);

          for ($x=1; $x <=40; $x++){
              imagefilter($md, IMG_FILTER_GAUSSIAN_BLUR, 999);
          } 

      imagefilter($md, IMG_FILTER_SMOOTH,99);
      imagefilter($md, IMG_FILTER_BRIGHTNESS, 10);        

  /* Scale result back to original size */
  imagecopyresampled($image, $md, 0, 0, 0, 0, $w, $bh, $size['md']['w'], $size['md']['h']);
  imagedestroy($md);  

  ob_start(); 
    if($ext == 'jpg' || $ext == 'jpeg'){
    imagejpeg($image,NULL,100);
  }elseif($ext == 'png'){
      imagepng($image,NULL,100);
    }
    imagedestroy( $image ); 
    $i = ob_get_clean(); 

  echo "<img src='data:image/jpeg;base64," . base64_encode( $i )."'>"; //saviour line!
}
