<?php
require_once('log.php');
function db_connect()
{
    $dsn = 'mysql:dbname=yt_dev;host=mysql;port=3306';
    $user = 'root';
    $password = 'root';

    try {
        $dbh = new PDO( $dsn, $user, $password);
        return $dbh;
    } catch (PDOException $e) {
        print('Error:' . $e->getMessage());
        die();
    }   
}

function userInsert($request)
{
    if( empty($request)){
        print('wrong access!');
        return false;
    }
    $pdo = db_connect();

    try{
        $stmt = $pdo->prepare("INSERT INTO users (
        name, email, password
    ) VALUES (
        :name, :email, :password
    )");

        $_name = !empty($request['name']) ? $request['name'] : '';
        $_email = !empty($request['email']) ? $request['email'] : '';
        $_password = !empty($request['password']) ? password_hash($request['password'], PASSWORD_DEFAULT) : '';

        $stmt->bindParam(':name', $_name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $_email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $_password, PDO::PARAM_STR);

        $res = $stmt->execute();
        logToFile($res, __FILE__, __LINE__);
        if ($res == 1) {
            $response = userGetInfo($request);
        }

        $pdo = null;

        return $response;

    }catch(Exception $e){
        return $e;
    }

}

function userUpdate($request)
{
    $user = userGetInfoById($_SESSION['id']);
    
    if (empty($request)) {
        print('wrong access!');
        return false;
    }
    if (empty($request['uid'])) {
        print('invalid ID!');
        return false;
    }

    $pdo = db_connect();

    try {
        $stmt = $pdo->prepare("UPDATE users SET name=:name, email=:email, password=:password
     WHERE id = :id");
        $_name = !empty($request['name']) ? $request['name'] : $user['name'];
        $_email = !empty($request['email']) ? $request['email'] : $user['email'];
        $_password = !empty($request['password']) ? password_hash($request['password'], PASSWORD_DEFAULT) : $user['password'];

        $stmt->bindParam(':id', $user['id'], PDO::PARAM_INT);
        $stmt->bindParam(':name', $_name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $_email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $_password, PDO::PARAM_STR);


        $res = $stmt->execute();
        if ($res) {
            $response = userGetInfoById($_SESSION['id']);
        }
        $pdo = null;
        return $response;

    }catch(Exception $e){
        logToFile($e, __FILE__, __LINE__);
        return $e;
    }
}
function userGetInfo($request)
{
    if (empty($request)) {
        print('wrong access!');
        return false;
    } 
    try{
        $pdo = db_connect();
        $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');

        $stmt->bindParam(':email', $request['email'], PDO::PARAM_STR);
        $res = $stmt->execute();
        $response = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!password_verify($request['password'], $response['password'])) {
            return false;
        }
        $pdo = null;
        return $response;
    }catch(Exception $e){
        logToFile($e, __FILE__, __LINE__);
        return $e;
    }
}

function userGetInfoById($id)
{
    $pdo = db_connect();
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");

    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $res = $stmt->execute();

    if ($res) {
        $response = $stmt->fetch();
    }
    $pdo = null;
    return $response;
}

function postList()
{
    $pdo = db_connect();
    $stmt = $pdo->prepare("SELECT * FROM posts ORDER BY id desc");
    $res = $stmt->execute();

    if ($res) {
        $response = $stmt->fetchAll();
    }
    $pdo = null;
    return $response;
}

function postDetail($id)
{
    $pdo = db_connect();
    $stmt = $pdo->prepare("SELECT * FROM posts WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $res = $stmt->execute();

    if ($res) {
        $response = $stmt->fetch();
    }

    $pdo = null;
    return $response;
}

function postInsert($request)
{
    if (empty($request)) {
        print('wrong access!');
        return false;
    }
    $pdo = db_connect();

    $stmt = $pdo->prepare("INSERT INTO posts (
        user_id,title, body
    ) VALUES (
        :user_id,:title, :body
    )");
    $stmt->bindParam(':user_id', $request['user_id'], PDO::PARAM_INT);
    $stmt->bindParam(':title', $request['title'], PDO::PARAM_STR);
    $stmt->bindParam(':body', $request['body'], PDO::PARAM_STR);


    $res = $stmt->execute();
    if ($res) {
        $response = $stmt->fetch();
    }
    $pdo = null;

    return $response;
}

function postDelete($request)
{
    if (empty($request)) {
        print('wrong access!');
        return false;
    }
    $pdo = db_connect();

    try {
        $stmt = $pdo->prepare('DELETE FROM posts WHERE id = :id');

        $stmt->bindParam(':id', $request['pid'], PDO::PARAM_STR);
        $res = $stmt->execute();
        $response = $stmt->fetch(PDO::FETCH_ASSOC);

        $pdo = null;
        return $response;
    } catch (Exception $e) {
        logToFile($e, __FILE__, __LINE__);
        return $e;
    }
}
?>