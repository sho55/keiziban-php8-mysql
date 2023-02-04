<?php
$path = '../';

require_once('log.php');

function setSessionUser($user)
{   
    if (isset($user["email"]) && isset($user["name"])) {
        if(isset($_SESSION)){
            $_SESSION = array();
        }
        
        $_SESSION["id"] = $user["id"];
        $_SESSION["email"] = $user["email"];
        $_SESSION["name"] = $user["name"];
        $_SESSION["is_login"] = 1;
    }
    logToFile($_SESSION, __FILE__, __LINE__);
}

function deleteAllSession()
{
    session_start();
    $_SESSION = array();
    if (ini_get("session.use_cookies")) {
        setcookie(session_name(), '', time() - 42000, '/');
    }
    session_destroy();
    logToFile($_SESSION, __FILE__, __LINE__);
}
?>