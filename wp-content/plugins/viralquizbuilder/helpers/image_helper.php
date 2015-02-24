<?php
/**
 * Image processing helper
 */

/**
 * Generate image from image/color background & custom text and then save it to file or return its binary data (depends on return_format)
 * 
 * @param array $options (background_image, background_color, text, value, text_color, font_id, fontsize_id)
 * @param string $return_format The return format: 'base_64' (default: return encoded data of the result image) / 'file' (save image to file) / 'echo' (send image to browser)
 * @param string $file_path The file path to save the result image if the return format = file
 * @return string
 */
function vqzb_get_result_img(array $options = array(),$return_format = 'base_64', $file_path = NULL)
{
    //create image background
    if(isset($options['background_image']))
    {
	$ext = vqzb_get_file_extension($options['background_image']);
	//Create image subject to the extension
        switch($ext){
            case 'gif': $img = imagecreatefromgif($options['background_image']); break;
            case 'jpeg': $img = imagecreatefromjpeg($options['background_image']); break;
            case 'png': $img = imagecreatefrompng($options['background_image']); break;
        }
    }
    else
    {
	$bg_color = vqzb_hex_to_rgb(isset($options['background_color']) ? $options['background_color'] : VQZB_DEFAULT_BG_COLOR);
	$img = imagecreate (250, 250);
	$background_color = imagecolorallocate($img, $bg_color['r'], $bg_color['g'], $bg_color['b']);
	$ext = 'jpeg';
    }
    
    //get text
    $text = $options['text'];
    $value = $options['value'];
    
    //insert the original value into text
    $text = str_replace(VQZB_RESULT_VALUE_PLHDR, $value, $text);
    
    //get text color
    $text_color = vqzb_hex_to_rgb(isset($options['text_color']) ? $options['text_color'] : VQZB_DEFAULT_TXT_COLOR);
    //get font type
    $font = VQzBuilder_FontModel::getInstance()->get_one(isset($options['font_id']) ? $options['font_id'] : VQZB_DEFAULT_FONT_ID);
    //get font size
    $fontsize = VQzBuilder_FontsizeModel::getInstance()->get_one(isset($options['fontsize_id']) ? $options['fontsize_id'] : VQZB_DEFAULT_TXT_SIZE);
    
$line_height = 12;
foreach(explode(PHP_EOL, $text) as $key => $piece)
{
    //add text to image
    imagettftext($img, $fontsize['name'], 0, 0, ($key+1)*$line_height, imagecolorallocate($img, $text_color['r'], $text_color['g'], $text_color['b']), VQZB_FONTS_DIR.$font['name'].".ttf", $piece);
}
    
    switch($return_format)
    {
	case 'echo':
	    header('Content-Type: image/jpeg');
	    vqzb_create_image_by_ext($ext, $img);
	    imagedestroy($img);
	    break;
	
	case 'base_64':
	    ob_start();
	    vqzb_create_image_by_ext($ext, $img);
	    $new_img = ob_get_contents();
	    ob_end_clean();
	    imagedestroy($img);
	    return array('base_64' => base64_encode($new_img), 'mime_type' => $ext);
	    break;
	
	case 'file':
	    ob_start();
	    vqzb_create_image_by_ext($ext, $img);
	    $img_name = md5(ob_get_clean ()).".".$ext;
	    vqzb_create_image_by_ext($ext, $img, $file_path.$img_name);
	    imagedestroy($img);
	    return $img_name;
	    break;
    }
    return;
}

/**
 *
 * @param string File to resize
 * @param string $ext File extension
 * @param string $path_to File path to upload
 * @return boolean 
 */
function vqzb_image_resize($file, $ext, $path_to){
        //Set required width and height
        $width = 250;
        $height = 250;
        
        //Get image width and height
        $img_size = getimagesize($file);//get image dimension
        $w = $img_size[0];
        $h = $img_size[1];

        //Create image subject to the extension
        switch($ext){
            case 'gif': $img = imagecreatefromgif($file); break;
            case 'jpeg': $img = imagecreatefromjpeg($file); break;
            case 'png': $img = imagecreatefrompng($file); break;
        }

        //Resize image
        $ratio = min($width/$w, $height/$h);
        $width = $w * $ratio;
        $height = $h * $ratio;
        $x = 0;
        
        //Create a new true color image
        $new = imagecreatetruecolor($width, $height);

        //Make some transformations if the image extension is gif or png. 
        if($ext == "gif" or $ext == "png"){
            imagecolortransparent($new, imagecolorallocatealpha($new, 0, 0, 0, 127));
            imagealphablending($new, false);
            imagesavealpha($new, true);
        }

        //Copy a rectangular portion of the original image to new image
        imagecopyresampled($new, $img, 0, 0, $x, 0, $width, $height, $w, $h);

        //Output image to file
	vqzb_create_image_by_ext($ext, $new, $path_to);
        
        //Free any memory associated with images
        imagedestroy($new);
        imagedestroy($img);
        return true;
}

/**
 * Uploads image on server with checking image extension
 * @param string $filename File name in $_FILES array ($_FILES[filename])
 * @param string $path_to File path to upload
 * @param string $new_filename Uploaded file name (default: NULL (origonal file name))
 * @return array 
 */
function vqzb_upload_img($filename, $path_to, $new_filename = NULL)
{
    //allowed file extensions
    $ext_white_list = explode(', ', VQZB_IMG_TYPES);
    
    //check if file size is more then the max_file_size
    if($_FILES[$filename]['size'] > VQZB_MAX_FILE_SIZE) return array('result' => FALSE, 'msg' => "Too large image size - it must be less then ".$max_file_size);

    // check if file is uploaded successfully
    if(!is_uploaded_file($_FILES[$filename]['tmp_name'])) return array('result' => FALSE, 'msg' => 'File upload error. Please, try again.');
    $file_name = $_FILES[$filename]['name'];
  
    //get image extension
    $file_ext = vqzb_get_file_extension($file_name);
    
    $new_filename = $new_filename == NULL ? $file_name : $new_filename.".".$file_ext;
    $file_to = $path_to.$new_filename;
    
    //check if file extension is allowed
    if (!in_array($file_ext, $ext_white_list)) return array('result' => FALSE, 'msg' => 'Not allowed file extension. ('. VQZB_IMG_TYPES .' are available)');
    
    // save file to path_to
    if (!move_uploaded_file($_FILES[$filename]['tmp_name'], $file_to)) return array('result' => FALSE, 'msg' => 'File upload error. Please, try again');
    
    return array('result' => TRUE, 'filename' => $new_filename, 'ext' => $file_ext, 'full_path' => $file_to);
}

/**
 * Convert hex color (consists of 6 symbols) to RGB color
 * @param string $color Hex color
 * @return array Array keys: 'r' - red light, 'g' - green light, 'b' - blue light.
 */
function vqzb_hex_to_rgb($color)
{
    return array
    (
	'r' => hexdec(substr($color,0,2)),
	'g' => hexdec(substr($color,2,2)),
	'b' => hexdec(substr($color,4,2))
    );
}

/**
 * Get file extension from the file name
 * @param string $file_name File name
 * @return string  File extension
 */
function vqzb_get_file_extension($file_name)
{
    $file_ext =  str_replace(".", "", strtolower(strrchr($file_name, ".")));
    if($file_ext == 'jpg') $file_ext = 'jpeg';
    return $file_ext;
}

/**
 * Create image by its extension
 * @param type $ext Image extension
 * @param type $image Image
 * @param type $path_to File path - if you need to save the image to file (default NULL)
 */
function vqzb_create_image_by_ext($ext, $image, $path_to = NULL)
{
    // just create image
    if($path_to === NULL)
    {
	switch($ext)
	{
	    case 'gif': imagegif($image); break;
	    case 'jpeg': imagejpeg($image); break;
	    case 'png': imagepng($image); break;
	}
    }
    //save image
    else
    {
	switch($ext)
	{
	    case 'gif': imagegif($image, $path_to); break;
	    case 'jpeg': imagejpeg($image, $path_to); break;
	    case 'png': imagepng($image, $path_to); break;
	}
    }
}