<?php
session_start();


include "db.php";


$sql = "SELECT * FROM users WHERE online = 1";
$result = mysqli_query($db, $sql);

$online_users = array();
while ($row = mysqli_fetch_assoc($result)) {
    $online_users[] = $row;
}


echo json_encode($online_users);
?>
