<?php
include "db.php";
session_start();

$username = isset($_SESSION["uname"]) ? $_SESSION["uname"] : '';


session_unset();
session_destroy();


if(!empty($username)) {
    $update_query = "UPDATE users SET online = 0 WHERE username = '$username'";
    mysqli_query($db, $update_query);
}


header("Location: login.php");
?>
