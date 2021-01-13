<?php
    $page_size = 3;
    $opts = [
       'skip' => ($page_number) * $page_size,
       'limit' => $page_size,
    ];
    if ($logged_in_status){
        $photos = GetAdvancedPhotosWithOptions('zdjecia', "autor", $_SESSION['username'], "privacy", "public", $opts);
        if ($photos == ERROR){
            header("Location: /error?database_disconnected=1");
        }
        $temp = GetAdvancedPhotos('zdjecia', 'autor', $_SESSION['username'], 'privacy', 'public')->toArray();
        if ($temp ==  ERROR){
            header("Location: /error?database_disconnected=1");
        }
        $page_count = count($temp);
    }
    else{
        $photos = GetSimplePhotosWithOptions('zdjecia', 'privacy', 'public', $opts);
        if ($photos == ERROR){
            header("Location: /error?database_disconnected=1");
        }
        $temp = GetSimplePhotos('zdjecia', 'privacy', 'public')->toArray();
        if ($temp ==  ERROR){
            header("Location: /error?database_disconnected=1");
        }
        $page_count = count($temp);
    }
    $counter = 0;
    $all_photo_array= [];
    foreach ($photos as $current_photo){
                    $photo_array = [];
                    $photo = $current_photo['name'];
                    $photo_array['photo'] = $current_photo['name'];
                    $photo_array['miniature'] = './images/miniatures/'.substr($photo, 0, strpos($photo, '.')).'.png';
                    $photo_array['full_photo'] = './images/watermark/'.substr($photo, 0, strpos($photo, '.')).'.png';
                    $photo_array['title'] = $current_photo['title'];
                    $photo_array['autor'] = $current_photo['autor'];
                    $photo_array['is_private'] = "";
                    if ($logged_in_status && $current_photo['privacy'] == "private"){
                        $photo_array['is_private'] = "To zdjęcie jest prywatne :)";
                    }
                    $save_name = 'photo'.$counter;
                    $counter++;
                    $all_photo_array[$save_name] = $photo_array;
    }
    $model['page_count'] = $page_count;
?>