<?php
    function get_extension($zdjecie){
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        return finfo_file($finfo, $zdjecie);
    }


    function get_image($zdjecie, $extension){
        switch ($extension){
            case 'image/png':
                $image = imagecreatefrompng($zdjecie);
                break;
            case 'image/jpg':
                $image = imagecreatefromjpeg($zdjecie);
                break;
            case 'image/jpeg':
                $image = imagecreatefromjpeg($zdjecie);
                break;
        }
        return $image;
    }


    function insert_watermark($zdjecie, $custom_text, $save_target){
        $image =  get_image($zdjecie, get_extension($zdjecie));       
        $textcolor = imagecolorallocatealpha($image, 255, 0, 0, 64);
        $font = 'static/fonts/arial.ttf';
        imagettftext($image,imagesx($image)*imagesy($image)*0.00004 + 82.0,0,imagesx($image)/4,imagesy($image)/2,$textcolor, $font, $custom_text);
        imagepng($image, $save_target.'.png');
        imagecolordeallocate( $image, $textcolor );
        imagedestroy($image);
    }


    function mini_create($zdjecie, $save_target){
        $image =  get_image($zdjecie, get_extension($zdjecie));       
        $width  = 200;
        $height = 125;
        $img_mini = imagecreatetruecolor($width, $height);
        imagecopyresampled($img_mini, $image, 0, 0, 0, 0, $width , $height, imagesx($image), imagesy($image));
        imagepng($img_mini, $save_target.'.png');
        imagedestroy($image);
        imagedestroy($img_mini);
    }


    function check_file_integrity_filetype($file){
    $error = 0;    
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $file_type = $file['type'];
    $file_mime_control = finfo_file($finfo, $file['tmp_name']);
    if (($file_mime_control != "image/png" && $file_mime_control != "image/jpeg" && $file_mime_control !="image/jpg")){ 
        $error++;    
    }
    if (($file_type != "image/png" && $file_type != "image/jpeg" && $file_type !="image/jpg")){
        $error++;
    }
    return ($error>0);
    }


    function check_file_integrity_size($file){
    $error = 0; 
    $file_size = $file['size'];
         if ($file_size>1000000){
         $error++;     
         return $error;
         }
    }
    
    
    function DoTheUpload($file, $watermark_text, $tytul_zdjecia, $autor, $privacy){
    if (empty(trim($autor))){
        $autor = "Undefined Undefined";
    }
    if (empty(trim($tytul_zdjecia))){
        $tytul_zdjecia = "Undefined Undefined";
    }
    if (empty(trim($privacy)) || ($privacy != "public" && $privacy !="private")){
        $privacy = "public";
    }
    $tmp_path = $file['tmp_name'];
    $upload_dir = 'images/';
    $file_name = basename($file['name']);
    $save_filename = substr($file_name, 0, strpos($file_name, '.')).time().".".substr($file_name, strpos($file_name, ".") + 1);
    $target = $upload_dir . $save_filename;
    $size_error = check_file_integrity_size($file);
    $type_error = check_file_integrity_filetype($file);
    if ($size_error && $type_error){
    return "redirect:/?upload__double_error=1";
    }
    if ($size_error){
    return "redirect:/?upload_size_error=1";
    }
    if ($type_error){
        return "redirect:/?upload_type_error=1";
    }
    if (move_uploaded_file($tmp_path, $target) == false){
        return "redirect:/?upload_general_error=1";
    }

    $single_picture = [
        'name' => $save_filename,
        'title' => $tytul_zdjecia,
        'autor' => $autor,
        'privacy' => $privacy,
    ];
    $check = InsertItemToDatabase($single_picture, 'zdjecia');
    if ($check = ERROR){
    	http_response_code(500);
	    header("Location: /error?database_disconnected=1");
    }
    $miniature_target =$upload_dir.'miniatures/'.substr($file_name, 0, strpos($file_name, '.')).time();
    $watermark_target =$upload_dir.'watermark/'.substr($file_name, 0, strpos($file_name, '.')).time();
    insert_watermark($target, $watermark_text, $watermark_target);
    mini_create($target, $miniature_target);
    return "redirect:/";
    }
?>