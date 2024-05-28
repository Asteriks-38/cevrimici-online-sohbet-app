<?php
session_start();
if(isset($_SESSION["uname"])){



?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>LoLo</title>
</head>

<body>
  
  <div class="toggle-menu">
    <button id="mobile-menu-toggle">&#9776;</button>
  </div>
  

  <div class="online-users">
    <h3>Online Users</h3>
    <ul id="online-user-list">
    </ul>
  </div>
  <div class="profile">
    <a href="profile.php">Profile</a>
  </div>

  <h1>LoLo Chat</h1>
  <div class="chat">
    
    <h2>Welcome to LoLo | <span><?=$_SESSION["uname"]?></span></h2>
    <div class="msg">
    
    </div>
    <div class="input_msg">
      <input type="text" name="" id="input_msg" placeholder="Message Here">
      <button onclick="update()">Send</button>
    </div>
  </div>
  <form action="logout.php" method="post">
    <center>
      <button type="submit">Exit</button>
    </center>
    
</form>
<script src="js/script.js"></script>
</body>

</html>

<?php

}else{

  header("Location: login.php");


}
?>
