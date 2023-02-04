<?php
session_start();
$path = '../';
require_once($path . 'common/database.php');
require_once($path . 'common/session.php');
// require_once($path . 'common/log.php');

//Auth Page
if (!isset($_SESSION['name'])) {
    // ログイン済みの場合、ホームページへリダイレクト
    header("Location:{$path}views/auth/registerOrLogin.php");
    exit;
}

// Create
if (isset($_POST['title']) && isset($_POST['body'])) {
    postInsert($_POST);

    header("Location:{$path}index.php");
    exit;
}
