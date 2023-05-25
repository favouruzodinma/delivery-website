<?php

$error = false; 

if($_SERVER['REQUEST_METHOD']=="POST"){
    $sender_flname = cleaninput($_POST['sender_flname']);
    $sender_address = cleaninput($_POST['sender_address']);
    $sender_contact = cleaninput($_POST['sender_contact']);
    $recipient_flname = cleaninput($_POST['recipient_flname']);
    $recipient_address = cleaninput($_POST['recipient_address']);
    $recipient_contact = cleaninput($_POST['recipient_contact']);
    // $type = cleaninput($_POST['type']);
    $type = cleaninput($_POST['type']);
    $from_branch_id = cleaninput($_POST['from_branch_id']);
    $to_branch_id = cleaninput($_POST['to_branch_id']);
    $weight = cleaninput($_POST['weight']);
    $height = cleaninput($_POST['height']);
    $width = cleaninput($_POST['width']);
    $length = cleaninput($_POST['length']);
    $price = cleaninput($_POST['price']);
    $reference_number = md5(date("ymdhis").rand(203994 , 485789));

    // $status = $_SESSION['status'];
    
        
        $reference_number = date("ymdhms"); 
        // $zip_code = ($zip_code);
        $sql= $conn->query("INSERT INTO goods SET reference_number= '$reference_number', sender_flname= '$sender_flname',
      sender_address= '$sender_address', sender_contact= '$sender_contact', recipient_flname= '$recipient_flname', recipient_address= '$recipient_address' ,recipient_contact= '$recipient_contact', type= '$type', from_branch_id= '$from_branch_id', to_branch_id= '$to_branch_id', weight= '$weight', height= '$height', width= '$width', length= '$length', price= '$price' ");
        
       
}

 


?>