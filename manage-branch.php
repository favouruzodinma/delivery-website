<?php


$error = false; 

if($_SERVER['REQUEST_METHOD']=="POST" ){

$branch_code = date("yms").rand(203994 , 485789);

$Street = cleaninput($_POST['street']);

$State = cleaninput($_POST['state']);

$Country = cleaninput($_POST['country']);

$City = cleaninput($_POST['city']);

$Zip_code = cleaninput($_POST['zip_code']);

$Contact = cleaninput($_POST['contact']);

if ($error == false){
$sql= $conn->query(" INSERT INTO dbranch SET branch_code='$branch_code', street='$street',  state='$state', country='$country', city='$city', zip_code='$zip_code' ,contact='$contact' ");

}
}

 


?>