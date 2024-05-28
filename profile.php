<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "db.php";


session_start();

$current_username = $_SESSION["uname"];

$sql = "SELECT COUNT(*) AS message_count FROM msg WHERE username=?";
$stmt = $db->prepare($sql);
$stmt->bind_param("s", $current_username);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["change_username"]) && isset($_POST["apply_password"])) {
        $new_username = $_POST["change_username"];
        $password = $_POST["apply_password"];

        
        $sql = "SELECT password FROM users WHERE username=?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("s", $current_username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && $password === $user["password"]) {
            
            $update_sql = "UPDATE users SET username=? WHERE username=?";
            $update_stmt = $db->prepare($update_sql);
            $update_stmt->bind_param("ss", $new_username, $current_username);
            if ($update_stmt->execute()) {
                
                $_SESSION["uname"] = $new_username;
                header("Location: login.php");
            } else {
                
            }
        } else {
            
        }
    } else {
        
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profile.css">
    <title>My Profile</title>
</head>
<body>

    <div class="container">
        <h1>My Profile</h1>
        
        <label for="current_username">Current Username is : <b><?=$_SESSION["uname"]?></b></label>
        <label for="current_username">Total messages sent : <b><?=$row["message_count"]?></b></label>

        <form action="" method="post" id="changeUsernameForm">

            <h4>Change Username</h4>   
            <input type="text" name="change_username" id="" placeholder="New Username">
            <input type="password" name="apply_password" id="" placeholder="Confirm Password">

            <button type="submit">Apply</button>


        </form>
        


    </div>

    <script>
        document.getElementById("changeUsernameForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Formun varsayılan davranışını engelle
            
            // Kullanıcı adı değiştiğinde bir uyarı göster
            var newUsername = document.getElementsByName("change_username")[0].value;
            var currentUsername = "<?= $_SESSION["uname"] ?>";

            if (newUsername !== currentUsername) {
                alert("Username will be changed!"); // Değer değiştiğinde uyarı göster
                this.submit(); // Formu gönder
            } else {
                alert("New username is the same as the current username!"); // Yeni kullanıcı adı mevcut kullanıcı adıyla aynı ise uyarı göster
            }
        });
    </script>

    
</body>
</html>