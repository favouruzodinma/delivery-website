<?php
include('config.php');

if($_SERVER['REQUEST_METHOD']=="POST"){
    $password=md5(cleaninput($_POST['password']));
    $newpassword=md5(cleaninput($_POST['newpassword']));
    $cnewpassword=md5(cleaninput($_POST['cnewpassword']));
    $branch_id = $_SESSION['branch_id'];
        

    $sql = $conn->query("SELECT * FROM staffs WHERE branch_id='$branch_id' AND password='$password'");
      if($sql->num_rows>0){
        if($newpassword == $cnewpassword){
            $sql = $conn->query("UPDATE staffs SET password='$newpassword' WHERE branch_id='$branch_id' AND password='$password'");
        }
      }
      
      header("location:change-password.php");

}

?>