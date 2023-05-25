<?php

include 'config.php'; 
session_start();
if(isset($_GET['id'])){
//  echo $_GET['id'].' Status:'.$GET['status'];
$userid = $_GET['id'];

if($_GET['status']=='delete'){
    // delete user account
    $sql=$conn->query("DELETE FROM mylogin WHERE userid='$userid'");
    if($sql){
        $_SESSION['mgs'] = "Account deleted successfully!";
    }

}else{
    // verify user account
    $sql=$conn->query("UPDATE mylogin SET dstatus='verify' WHERE userid='$userid'");
    if($sql){
        $_SESSION['mgs'] = "Account has been verified!";
    }
}

header("Location: manageusers.php");
}
?>