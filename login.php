<?php
include "db.php";
session_start();

if(isset($_POST["username"]) && isset($_POST["password"])){
  
  $username = $_POST["username"];
  $pass_word = $_POST["password"];

  $q="SELECT * FROM users where username='$username' && password='$pass_word'";

  if($rq=mysqli_query($db,$q)){
    if(mysqli_num_rows($rq)==1){
      $update_query = "UPDATE users SET online = 1 WHERE username = '$username'";
      mysqli_query($db, $update_query);

      $_SESSION["uname"] = $username;
    
      header("Location: index.php");
      exit;


    }
    else
    {
      $q="SELECT * FROM users where username='$username'";
      if($rq=mysqli_query($db,$q)){
        if(mysqli_num_rows($rq)==1){
          echo $username." is already taken by someone";
        }
        else
        {

          $q="INSERT INTO users(username,password) values('$username', '$pass_word')";
          if($rq=mysqli_query($db,$q)){
            $q="SELECT * FROM users where username='$username' and password='$pass_word'";
            if($rq=mysqli_query($db,$q)){
              if(mysqli_num_rows($rq)==1){
                $update_query = "UPDATE users SET online = 1 WHERE username = '$username'";
                mysqli_query($db, $update_query);
                
                $_SESSION["uname"] = $username;
                header("Location: index.php");
                exit;
              }

            }
          }
        }
    } }
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/login.css">
  <title>LoLo Login</title>
</head>
<body>
  <h1>LoLo Chat</h1>
  <div class="login">
    <h2>Login</h2>
    <p>For Family</p>
    <form action="" method="post">

      <h3>Username: </h3>
      <input type="text" name="username" id="" placeholder="Username">

      <h3>Password: </h3>
      <input type="password" name="password" id="" placeholder="Password">

      <button>Login/Register</button>

    </form>
  </div>
</body>
</html>