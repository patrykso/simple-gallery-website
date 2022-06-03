<?php
require_once 'business.php';

function galeria(&$model) {
    $pageSize = 4;
    $pageid = isset($_GET['pageid']) ? $_GET['pageid'] : 1;
    $model = [
        'pageid' => isset($_GET['pageid']) ? $_GET['pageid'] : 1,
        'pagesize' => 4,
        'photos' => paging($pageid, $pageSize),
        'pagescount' => countimages()
    ];

    return 'galeria';
}

function kontakt(&$model) {
    return 'kontakt';
}

function miejsca(&$model) {
    return 'miejsca';
}

function logout(&$model) {
    return 'logout';
}

function index(&$model) {
    return 'index';
}

function login(&$model) {
    loginuser();
    return 'login';
}

function register(&$model) {
    registeruser();
    return 'register';
}

function upload(&$model) {
    uploadErrors();
    return 'upload';
}

function createMini($file_name, $extension) {
    if($extension == 'png') $im = imagecreatefrompng('../web/img/images/' . $file_name);
    else if($extension == ('jpeg' || 'jpg')) $im = imagecreatefromjpeg('../web/img/images/' . $file_name);
    $thumb = imagecreatetruecolor(200, 125);
    imagecopyresized($thumb, $im, 0, 0, 0, 0, 200, 125, imagesx($im), imagesy($im));
    if($extension == 'png') imagepng($thumb, '../web/img/miniaturized/' . 'mini_' . $file_name);
    else if($extension == ('jpeg' || 'jpg')) imagejpeg($thumb, '../web/img/miniaturized/' . 'mini_' . $file_name);
    imagedestroy($im);
    imagedestroy($thumb);
}

function createWatermark($file_name, $watermark, $extension) {
    if($extension == 'png') $im = imagecreatefrompng('../web/img/images/' . $file_name);
    else if($extension == ('jpeg' || 'jpg')) $im = imagecreatefromjpeg('../web/img/images/' . $file_name);
    $stamp = imagecreatetruecolor(200, 40);
    imagefilledrectangle($stamp, 10, 10, 190, 30, 0xFFFFFF);
    imagestring($stamp, 27, 20, 15, $watermark, 0x000000);
    $marge_right = 120;
    $marge_bottom = 120;
    $sx = imagesx($stamp);
    $sy = imagesy($stamp);
    imagecopymerge($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp), 50);
    if($extension == 'png') imagepng($im, '../web/img/watermark/' . 'watermark_' . $file_name );
    else if($extension == ('jpeg' || 'jpg')) imagejpeg($im, '../web/img/watermark/' . 'watermark_' . $file_name );
    imagedestroy($im);
    imagedestroy($stamp);
}

function uploadErrors() {
    $zdjecie = $_FILES['zdjecie'];
    $watermark = isset($_POST['watermark']) ? $_POST['watermark'] : '';

    if (isset($zdjecie)) {
        $errors = array();
        $maxsize = 1048576;
        $acceptable = array(
            'image/jpeg',
            'image/jpg',
            'image/png'
        );

        if (($zdjecie['size'] >= $maxsize) || ($zdjecie["size"] == 0)) {
            $errors[] = 'Plik jest zbyt duży. Maksymalny rozmiar zdjęcia to 1 mb.';
        }

        if ((!in_array($zdjecie['type'], $acceptable)) && (!empty($zdjecie["type"]))) {
            $errors[] = 'Niepoprawny rodzaj pliku. Akceptowalne rodzaje to jpeg i png.';
        }

        if (count($errors) === 0) {
            $upload_dir = '../web/img/images/';
            $file = $_FILES['zdjecie'];
            $file_name = basename($file['name']);
            $target = $upload_dir . $file_name;
            $tmp_path = $file['tmp_name'];
            if (move_uploaded_file($tmp_path, $target)) {
                $extension = pathinfo($target, PATHINFO_EXTENSION);
                createMini($file_name, $extension);
                createWatermark($file_name, $watermark, $extension);
                savePhoto($file_name, $extension, $zdjecie);
                echo '<script>alert("Upload przebiegł pomyślnie!")</script>';
            }
        } else {
            foreach ($errors as $error) {
                echo '<script>alert("' . $error . '");</script>';
            }
            die();
        }
    }
}

function pagechange($i) {
    global $pageid;
    $pageid = $i;
    return $pageid;
}

function countimages() {
    $files = new FilesystemIterator("../web/img/images/", FilesystemIterator::SKIP_DOTS);
    $imagescount = iterator_count($files);
    $pagescount = ceil($imagescount / 4);
    return $pagescount;
}

function loginuser() {
    if (($_SERVER['REQUEST_METHOD'] === 'POST') &&   isset($_POST['login'])  && isset($_POST['pass']) ){
        $login = $_POST['login'];
        $password = $_POST['pass'];
        $done = ReadUser($login, $password);
        if ($done !== true) {
            echo '<script>alert("Wystąpił problem z logowaniem")</script>';}
        else {
            header("Location: /galeria");
            echo '<script>alert("Zalogowałeś się!")</script>';
            exit();
        }
    }
}

function registeruser() {
    if (($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST['login'])  && isset($_POST['pass']) && isset($_POST['repeat_pass']) && isset($_POST['email'])) {
        $email = $_POST['email'];
        $login = $_POST['login'];
        $password = $_POST['pass'];
        $repeat_password = $_POST['repeat_pass'];
        if ($password === $repeat_password) {
            if (!LoginExist($login)) {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                if (AddNewUser($login, $hash, $email)) {
                    echo '<script>alert("Zarejestrowałeś/aś się! Możesz się zalogować.")</script>';
                }
            }
            else {
                echo '<script>alert("Login zajęty!")</script>';
            }
        }
        else {
            echo '<script>alert("Hasła się nie zgadzają!")</script>';
        }
    }

}