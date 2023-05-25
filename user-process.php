<?php

include 'config.php'; 
// session_start();
if(isset($_GET['id'])){
//  echo $_GET['id'].' Status:'.$GET['status'];
// $userid = $_GET['id'];

if($_GET['dstatus']=='delete'){
    // delete user account
    $sql=$conn->query("DELETE FROM dlogin WHERE userid='$userid'");
    if($sql){
        $_SESSION['mgss'] = '
        <div class="alert alert-success" role="alert">
        Users Account deleted Successfully.
        </div>';
    }

}else{
    // verify branch_ account
    $sql=$conn->query("UPDATE dlogin SET status='ban' WHERE userid='$userid'");
    if($sql){
        $_SESSION['mgss'] = "Account has been verified!";
    }
}

header("Location: manage-users.php");
}
?>