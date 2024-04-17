<?php
include "db.php";
session_start();

$q="SELECT * FROM msg";
if($rq=mysqli_query($db,$q)){

  if(mysqli_num_rows($rq)>0){
    
    while($data=mysqli_fetch_assoc($rq)){
      if($data["username"]==$_SESSION["uname"]){
        ?>
    <p class="sender">
      <span><?=$data["username"]?></span>
      <?=$data["msg"]?>
    </p>
<?php
      }else{
?>
    <p>
      <span><?=$data["username"]?></span>
      <?=$data["msg"]?>
    </p>
<?php
      }
    }
  }
  else
  {
    echo "<h3>CHAT İS EMPTY</h3>";
  }

}

?>