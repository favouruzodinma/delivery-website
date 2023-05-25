<?php

include_once('config.php');

$error = false; 

if($_SERVER['REQUEST_METHOD']=="POST"){
   
    $userid = date("shi").rand(203994 , 485789);
    $flname = cleaninput($_POST['flname']);
    
    if(empty($_POST['email'])){
    $errEmail = "Email is required!!";
    $error = true;
    }elseif(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
    $errEmail = "email is not valid";
    $error = true;
    }else{
    $email = cleaninput($_POST['email']);
    $sql = $conn->query("SELECT email FROM dlogin WHERE email ='$email' ");
    
    if($sql->num_rows>0){
    $errEmail = "Email is already taken!!";
    $error = true;
    }
    }
    
    if(empty($_POST ['password'])){
    $errPassword= "Password is required";
    $error = true;
    }elseif(strlen($_POST['password'])<6){
    $errpassword="password is too short!!";
    $error = true;
    }else{
    $password= cleaninput($_POST["password"]);
    }
    
    
    if(empty($_POST ['cpassword'])){
    $errCpassword= "Comfirm your password ";
    $error = true;
    }else{
    $cpassword= cleaninput($_POST["cpassword"]);
    if($password != $cpassword ){
    $errCpassword = "Password does not match";
    $error = true;
    
    
    }
    
    

    if ($error == false){
        
        $password = md5($password);
        $sql= $conn->query(" INSERT INTO dlogin SET userid='$userid', flname='$flname', email='$email', password='$password'");

        // header('Location:l.php');


        if($sql){
            echo "<h1>successfull!</h1>";
        }else{
            echo "<h1>fail!</h1>";
        }
    }
}


 }


?>