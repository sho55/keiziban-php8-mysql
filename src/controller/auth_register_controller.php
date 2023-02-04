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

// Register
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
    if (!empty($_POST['is_login'])) {
        $_SESSION['message'] = "エラーが発生しました";
        header("Location:{$path}views/auth/registerOrLogin.php");
    }
    $res = userInsert($_POST);
    //set Session
    setSessionUser($res);

    header("Location:{$path}views/mypage/index.php");
    exit;
}
?>