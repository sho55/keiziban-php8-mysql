<?php
$path = '../';
require_once($path . 'common/session.php');
require_once($path . 'common/log.php');

//Auth Page
if (isset($_SESSION['is_login'])) {
    header("Location:{$path}.'index.php'");
}
//Logout
deleteAllSession();

header("Location:{$path}index.php", true, 301);
exit;

?>