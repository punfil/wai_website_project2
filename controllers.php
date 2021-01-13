<?php
require_once "business.php";
require (__DIR__."../../vendor/autoload.php");
define("ERROR", "-1");

function index(&$model){
	require_once '../functions/upload_service.php';
	require_once '../functions/user_service.php';
	

    //HTTP POST REQUESTS

    //UPLOAD FORM
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['upload_button'])){
        if (isset($_POST['znak_wodny']) && !empty(trim($_POST['znak_wodny'])) && $_FILES['picture']['error'] != 4){
            if (!isset($_POST['privacy'])){
                $privacy = 'public';
            }
            else{
                $privacy = $_POST['privacy'];
            }
            return DoTheUpload($_FILES['picture'], $_POST['znak_wodny'], $_POST['tytul_zdjecia'], $_POST['autor'], $privacy);
        }
        else{
            return "redirect:/?upload_blank_error=1";
        }
    }

    //LOG OUT FORM
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['logout_button'])){
        return LogOut($_SESSION['username']);
    }

    //LOG IN FORM
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login_button'])){
        return LogIn($_POST['login_username'], $_POST['login_password'], $_SESSION['username']);
    }

    //REGISTER FORM
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register_button'])){
        if (isset($_POST['password_1']) && !empty(trim($_POST['password_1'])) && isset($_POST['password_2']) && !empty($_POST['password_2']) && isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['e-mail']) && !empty($_POST['e-mail'])){
            return Register($_POST['password_1'], $_POST['password_2'], $_POST['login'], $_POST['e-mail'], $_SESSION['username']);
        }
        else{
            return "redirect:/?register_blank_error=1";
        }
    }

    //HTTP GET REQUESTS

    //LOGIN MESSAGES
    $model['login_message'] = "";
    if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['reg_success'])){
        $model['login_message'] = "Dziękujemy za rejestrację! Zostałeś automatycznie zalogowany";
        }
    if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['log_success'])){
        $model['login_message'] = "Zalogowano poprawnie.";
        }
    if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['logout_success'])){
        $model['login_message'] = "Wylogowano poprawnie.";
    }

    //UPLOAD MESSAGES
    $model['upload_error'] = "";
    if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['upload_blank_error'])){
        $model['upload_error'] = "Uzupełnij pola obowiązkowe. Nie kombinuj z kodem HTML :)";
    }
    if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['upload_double_error'])){
        $model['upload_error'] = "Sprawdź rozszerzenie pliku lub rozmiar i spróbuj ponownie";
        }
    if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['upload_size_error'])){
        $model['upload_error'] = "Sprawdź rozmiar pliku. Jest za duży :/";
    }
    if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['upload_type_error'])){
        $model['upload_error'] = "Nas nie oszukasz :) Sprawdź rozszerzenie pliku";
    }
    if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['upload_general_error'])){
        $model['upload_error'] = "Coś poszło nie tak... To nie Twoja wina. Mamy gorszy dzień.";
    }

    //REGISTERING MESSAGES
    $model['register_fail'] = "";
    if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['password_mismatch'])){
        $model['register_fail'] = "Hasła nie zgadzają się. Spróbuj ponownie";
    }
    if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['username_already_used'])){
        $model['register_fail'] = "Ta nazwa użytkownika jest już zajęta. Spróbuj ponownie";
    }
    if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['register_blank_error'])){
        $model['register_fail'] = "Nie uzupełniłeś wszystkich pól. Nie ładnie tak kombinować z kodem HTML:)";
    }

    //LOGGING IN MESSAGES
    $model['login_failure'] = "";
    if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['password_wrong'])){
            $model['login_failure'] = "Błędne hasło";
    }
    if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['user_not_found'])){
        $model['login_failure'] = "Nie znaleziono użytkownika w bazie";
    }

    //GALLERY PAGE NUMBER
    $page_number = 0 ;
    if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['gal_page'])){
        $page_number = $_GET['gal_page'];
    }
    $logged_in_status = 0;

    if (!isset($_SESSION['username'])){
        $_SESSION['username'] = "";
    }
    $logged_in_help = GetFromDatabase($_SESSION['username'], 'users', 'username');
    if ($logged_in_help == ERROR){
        http_response_code(500);
        header("Location: /error?database_disconnected=1");
    }
    if ($logged_in_help){
        $logged_in_status = 1;
    }

    //PHOTO GALLERY
    include "functions/gallery_service.php";

    //SETTING UP MODEL VARIABLE
    $model['photos_per_page'] = $page_size;
    $model['photos'] = $all_photo_array;
    $model['logged_in'] = $logged_in_status;
    $model['photo_author'] = "";
    if ($logged_in_status){
        $model['photo_author'] = $_SESSION['username'];
    }
    return 'index_view';
}
function laptopy(&$model){
    return 'laptopy_view';
}
function akcesoria(&$model){
    return 'akcesoria_view';
}
function o_mojej_kolekcji(&$model){
    return 'o_mojej_kolekcji_view';
}
function kontakt(&$model){
    return 'kontakt_view';
}
function sklep(&$model){
    return 'sklep_view';
}
function koszyk(&$model){
    return 'koszyk_view';
}
function ajax_search(&$model){
return 'ajax_search_view';
}
function ajax_search_gallery(&$model){
    if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['enq'])){
        $photo_name_beginning = $_GET['enq'];
    }
    $logged_in_status = 0;
    $query_help = ['$regex' => $photo_name_beginning, '$options' => 'i'];
    $logged_in_help = GetFromDatabase($_SESSION['username'], 'users', 'username');
    if ($logged_in_help == ERROR){
        http_response_code(500);
        header("Location: /error?database_disconnected=1");
    }
    if ($logged_in_help){
        $logged_in_status = 1;
    }
    if ($logged_in_status){
        $photos = GetUltraAdvancedPhotos('zdjecia', 'autor', $_SESSION['username'], 'privacy', 'public', 'title', $query_help);
        if ($photos == ERROR){
            http_response_code(500);
            header("Location: /error?database_disconnected=1");
        }
        $page_count_helper = GetUltraAdvancedPhotos('zdjecia', 'autor', $_SESSION['username'], 'privacy', 'public', 'title', $query_help)->toArray();
        if ($page_count_helper == ERROR){
            http_response_code(500);
            header("Location: /error?database_disconnected=1");
        }
        $page_count = count($page_count_helper);
    }
    else{
        $photos = GetAndAdvancedPhotos('zdjecia', 'privacy', 'public', 'title', $query_help);
        if ($photos == ERROR){
            http_response_code(500);
            header("Location: /error?database_disconnected=1");
        }
        $page_count_helper = GetAndAdvancedPhotos('zdjecia', 'privacy', 'public', 'title', $query_help)->toArray();
        if ($page_count_helper == ERROR){
            http_response_code(500);
            header("Location: /error?database_disconnected=1");
        }
        $page_count = count($page_count_helper);
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
    $model['photos'] = $all_photo_array;
    $model['page_count'] = $page_count;
    return 'ajax_search_gallery_view';
}
function error(&$model){
    $model['error_message'] = "W naszej witrynie nie ma takiej strony";
    if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['database_disconnected'])){
        $model['error_message'] = "Mamy problemy wewnętrzne z bazą danych. To nie Twoja wina. Prosimy spróbować później.";
        http_response_code(500);
    }
    return 'error_view';
}