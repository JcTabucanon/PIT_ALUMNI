<?php 
session_start();
ob_start();
include "connection.php";

if(isset($_POST['save'])) {

  $id = $_POST['id'];
  $newpass = md5($_POST['newpass']);

  $query = "UPDATE user SET PASSWORD = '$newpass' WHERE ID='$id'";
  $result = mysqli_query($con, $query);
        if($result) {
          session_destroy();
          header('location:login.php?message=changesuccess');
          exit;
        } else {
          die("Error with the query");
        }

  }
?>
