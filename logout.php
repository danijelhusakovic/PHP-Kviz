<?php
require 'config.php';

if (isset($_COOKIE['token'])) {
    mysqli_query($conn, "UPDATE ucenici SET token=NULL WHERE token='{$_COOKIE['token']}'");
    setcookie('token', '', time() - 3600, '/');
}

session_destroy();
header('Location: login.php');
?>