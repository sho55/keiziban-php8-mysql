<?php
session_start();
$path = '../';
require_once($path . 'common/database.php');
require_once($path . 'common/session.php');
require_once($path . 'common/log.php');

//Auth Page
if (!isset($_SESSION['name'])) {
    // ログイン済みの場合、ホームページへリダイレクト
    header("Location:{$path}views/auth/registerOrLogin.php");
    exit;
}

// Delete
if ($_SESSION['id'] == $_POST['uid']) {
    $response=postDelete($_POST);
    logToFile($response, __FILE__, __LINE__);
    header("Location:{$path}index.php");
    exit;
}else{
    $_SESSION['message'] = '削除できませんでした';
    header("Location:{$path}index.php",true,301);
    exit;
}
