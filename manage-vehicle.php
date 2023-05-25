<?php

$error = false; 

if($_SERVER['REQUEST_METHOD']=="POST"){
$v_branch = cleaninput($_POST['v_branch']);
$v_driver = cleaninput($_POST['v_driver']);
if(empty($_POST['v_type'])){
$errV_type = "vehicle type is required!!";
$error = true;
} else{
$V_type = cleaninput($_POST['v_type']);

}

if(empty($_POST['v_number'])){
$errV_number = "vehicle number is required!!";
$error = true;
} else{
$V_number = cleaninput($_POST['v_number']);

}


$sql= $conn->query("INSERT INTO vehicle SET v_branch= '$v_branch',
v_type= '$v_type', v_number= '$v_number', v_driver= '$v_driver' ");


}

 


?>