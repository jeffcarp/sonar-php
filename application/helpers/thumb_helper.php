<?php
/* 
Modified extensively from:
http://jrtashjian.com/2009/02/image-thumbnail-creation-caching-with-codeigniter/ 
*/

function thumb($photo_ID, $width, $imgtag = true)
{
  // Get the CodeIgniter super object
  $CI =& get_instance();
  $CI->load->model('photo');
  $CI->load->library('S3/s3');

  $p = $CI->Photo->find_row($photo_ID);
  $orig_s3_path = 'https://s3.amazonaws.com/thecolbyecho/'.$p->photo_ID.'.'.$p->photo_Extension;
  $thumb_s3_path = 'https://s3.amazonaws.com/thecolbyecho/'.$p->photo_ID.'_'.$width.'.'.$p->photo_Extension;
  $thumb_path = 'public/images/thumbs/' . $p->photo_ID . '_' .$width . '.'.$p->photo_Extension;
  $orig_path = 'public/images/originals/'.$p->photo_ID.'.'.$p->photo_Extension;

  // TODO: check if s3 image exists before making thumb 
  $headers = get_headers($thumb_s3_path, 1);

  if (strpos($headers[0], "403") !== false) {

    // Download file locally for resizing
    copy($orig_s3_path, $orig_path);

    $CI->load->library('image_lib');

    $config['image_library']    = 'gd2';
    $config['source_image']     = $orig_path;
    $config['new_image']        = $thumb_path;
    $config['maintain_ratio']   = TRUE;
    $config['height']           = 10000; // requires height but does not use it
    $config['width']            = $width;

    $CI->image_lib->initialize($config);
    $CI->image_lib->resize();
    $CI->image_lib->clear();
        
    //show_error($CI->image_lib->display_errors());
    // Write file back to S3

    // Push thumb to S3
    $s3 = new S3(getenv('AWS_KEY'), getenv('AWS_SECRET'));
   
    $thumb_upload_name = $p->photo_ID . '_' .$width . '.'.$p->photo_Extension;
    
    $s3->putObject($s3->inputResource(fopen($thumb_path, 'rb'), filesize($thumb_path)), 'thecolbyecho', $thumb_upload_name, S3::ACL_PUBLIC_READ);

    // TODO: Delete thumbs and originals
  }    

	if ($imgtag) {
    return '<img src="'.$thumb_s3_path.'" />';
	} else {
    return $thumb_s3_path;
  }
}
