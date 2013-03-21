<?php
/* 
Modified extensively from:
http://jrtashjian.com/2009/02/image-thumbnail-creation-caching-with-codeigniter/ 
*/

function thumb($photo_ID, $width, $imgtag = true)
{


  $image_thumb = $image_path;

  if ($imgtag) {
    return '<img src="'. $image_thumb.'" />';
  } else {
    return $image_thumb;
  }

	
  // Get the CodeIgniter super object
  $CI =& get_instance();
  $path = pathinfo($image_path);

    // Path to image thumbnail
    $image_thumb = 'public/images/application/thumbs/' . $photo_ID . '_' .$width . '.'.$extension;

    if( ! file_exists($image_thumb))
    {
        // LOAD LIBRARY
        $CI->load->library('image_lib');

        // CONFIGURE IMAGE LIBRARY
        $config['image_library']    = 'gd2';
        $config['source_image']     = $image_path;
        $config['new_image']        = $image_thumb;
        $config['maintain_ratio']   = TRUE;
        $config['height']           = 10000; // requires height but does not use it
        $config['width']            = $width;

        $CI->image_lib->initialize($config);
        $CI->image_lib->resize();
        $CI->image_lib->clear();
        
        //show_error($CI->image_lib->display_errors());

    }

	$image_thumb = '/'.$image_thumb; // directory bullshit

	if ($imgtag):
	    return '<img src="' . $image_thumb . '" />';
	else:
		return $image_thumb;
	endif;
}

/* End of file thumb_helper.php */
/* Location: ./application/helpers/thumb_helper.php */
