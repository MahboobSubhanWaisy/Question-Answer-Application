<?php
  session_start();
  if(isset($_SESSION['name'])){
    require('connection.php');
    $status = "Offline now";
    $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id={$_SESSION['unique_id']}");
    if($sql){
      session_unset();
      session_destroy();
      header("location:dashboard.php");
    }
  }
  else{
      header("location:login.php");
  }

?>