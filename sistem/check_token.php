<?php

include "../koneksi.php";
error_reporting (0); 
if (isset($_SESSION['nim'])) {
  $result = mysqli_query($koneksi, "SELECT token FROM user_token where nim='".$_SESSION['nim']."'");
 
  if (mysqli_num_rows($result) > 0) {
 
    $row = mysqli_fetch_array($result); 
    $token = $row['token']; 

    if($_SESSION['token'] != $token){
      session_destroy();
      header('Location:../vote.php');
    }
  }
}