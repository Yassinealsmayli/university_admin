<?php
if(!session_id()) session_start();
$servername = "127.0.0.1";
$user = "root";
$pass = "password";
$dbname = "courses";
if(!isset($_SESSION['servername'])) {
        $_SESSION['servername'] = $servername;
    }
if(!isset($_SESSION['user'])) {
    $_SESSION['user'] = $user;
}
if(!isset($_SESSION['pass'])) {
    $_SESSION['pass'] = $pass;
}
if(!isset($_SESSION['dbname'])) {
    $_SESSION['dbname'] = $dbname;
}
?>