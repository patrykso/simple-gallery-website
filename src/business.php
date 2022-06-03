<?php
require '../../vendor/autoload.php';

function get_db()
{
    $mongo = new MongoDB\Client(
        "mongodb://localhost:27017/wai"
        ,
        [
            'username' => 'wai_web'
            ,
            'password' => 'w@i_w3b',
        ]);
    $db = $mongo->wai;
    return $db;
}

function savePhoto($file_name, $extension, $zdjecie) {
    $db = get_db();
    $photo = [
        'file' => [$file_name],
        'author' => $_POST['author'],
        'title' => $_POST['title'],
        'filepath' => 'img/images/' . $file_name,
        'minifilepath' => 'img/miniaturized/mini_' . $file_name,
        'watermarkfilepath' => 'img/watermark/watermark_' . $file_name,
        'extension' => $extension,
        'filesize' => $zdjecie['size']
    ];

    $db->photos->insertOne($photo);
    $photos = $db->photos->find();
}

function paging($pageid, $pageSize) {
    $opts = [
        'skip' => ($pageid - 1) * $pageSize,
        'limit' => $pageSize
    ];
    $db = get_db();
    return $photos = $db->photos->find([], $opts);
}


function ReadUser($login, $password){
    try {
        $db = get_db();
        $user = $db->users->findOne(['login' => $login]);
        if($user !== null &&  password_verify($password,  $user['password'])){
            session_regenerate_id();
            $_SESSION['user_id'] = $user['_id'];
            return true;
        }
        else {return false;}
    }
    catch(Exception$e) {return$e;}
}

function LoginExist($log){
    $db=get_db();
    $query = ['login' => $log];
    $user = $db->users->findOne($query);
    if ($user) {return true;}
    else {return false;}
}

function AddNewUser($log, $pass, $email){
    $db=get_db();
    $wynik = $db->users->insertOne([ 'login' => $log, 'password' => $pass, 'email' => $email]);
    return $wynik;
}