<?php
include "db.php";
session_start();
$msg = $_GET["msg"];
$username = $_SESSION["uname"];

$q = "SELECT * FROM users where username='$username'";
if ($rq = mysqli_query($db, $q)) {
  if (mysqli_num_rows($rq) == 1) {

    $q = "INSERT INTO msg(username,msg) values('$username','$msg')";
    if ($rq = mysqli_query($db, $q));

    
  }
}
