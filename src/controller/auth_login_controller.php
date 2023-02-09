<?php
session_start();
$path = '../';
require_once($path . 'common/database.php');
require_once($path . 'common/session.php');
require_once($path . 'common/log.php');

//Auth Page
if (isset($_SESSION['name'])) {
    // ログイン済みの場合、ホームページへリダイレクト
    header("Location:{$path}views/mypage/index.php");
    exit;
}

// Login
if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['is_login'])) {
    logToFile($_POST,__FILE__, __LINE__);

    $res = userGetInfo($_POST);
    if(empty($res)){
        $_SESSION['message'] = "データがありません";
        header("Location:{$path}views/auth/registerOrLogin.php");
    }
    //set Session
    setSessionUser($res);
    logToFile($res, __FILE__, __LINE__);
    header("Location:{$path}views/mypage/index.php");
    exit;
}else{
    header("Location:{$path}views/auth/registerOrLogin.php");
}

?>