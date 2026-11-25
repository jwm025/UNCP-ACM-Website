<?php
session_start();

$_SESSION =[];

if (ini_get("session.use.cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], 
    $params["secure"], $params["httponly"]);
}

session_destroy();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Logged Out</title>
        <style>
            body {
                font-family: Arial, sans-serif; margin:40px; text-align: center;
            }
        </style>
        </head>
    <body>
        <h1>You have been Successfully Logged Out!</h1>
        <p><a href="index.php">Return to Home</a> | <a href="loginSalt.php">Login again</a></p>