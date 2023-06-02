<?php
include_once('../config.php');
$error = false; 

if($_SERVER['REQUEST_METHOD']=="POST"){

if (isset($_POST['register-staff'])){
$branch_id = rand(203994 , 485000); 


if(empty($_POST['flname'])){
$errFlname = "Full name is required!!";
$error = true;
} else{
$flname = cleaninput($_POST['flname']);

}

if(empty($_POST['email'])){
$errEmail = "Email is required!!";
$error = true;
}elseif(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
$errEmail = "email is not valid";
$error = true;
}else{
$email = cleaninput($_POST['email']);
$sql = $conn->query("SELECT email FROM staffs WHERE email ='$email' ");

if($sql->num_rows>0){
$errEmail = "Email is already taken!!";
$error = true;
}
}

if(empty($_POST ['password'])){
$errPassword= "Password is required";
$error = true;
}elseif(strlen($_POST['password'])<6){
$errPassword="password is too short!!";
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
}
$branch = cleaninput($_POST['branch']);

$job = cleaninput($_POST['job']);

$target_dir = "../web/";
$target_file = $target_dir . basename($_FILES["user_img"]["name"]);
$uploadOk = true;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["register-staff"])) {
$check = getimagesize($_FILES["user_img"]["tmp_name"]);
if($check !== false) {
// echo "File is an image - " . $check["mime"] . ".";
$uploadOk = true;
} else {
$_SESSION['mgs'] = '
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>File is not an image...</strong> 
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>';
$uploadOk = false;
}
}

// Check file size
if ($_FILES["user_img"]["size"] > 50000000) {
$_SESSION['mgs'] = '
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Sorry, your file is too large...</strong> 
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>';
$uploadOk = false;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
$_SESSION['mgs'] = '
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Sorry, only JPG, JPEG, PNG & GIF files are allowed..</strong> 
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>';
$uploadOk = false;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == false) {
$_SESSION['mgs'] = '
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Sorry, your file was not uploaded.</strong> 
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>';
// if everything is ok, try to upload file
} else {
if (move_uploaded_file($_FILES["user_img"]["tmp_name"], $target_file)) {
// echo "The file ". htmlspecialchars( basename( $_FILES["user_img"]["name"])). " has been uploaded.";
} else {
$_SESSION['mgs'] = '
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Sorry, there was an error uploading your file</strong> 
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>';
}
}



if($uploadOk === true){
$password = md5($password);

$sql= $conn->query("INSERT  INTO staffs SET branch_id='$branch_id', flname='$flname', email='$email', password='$password', branch='$branch' , user_img='$target_file', job='$job'");

header("location: manage-staff.php");

}
}else{
if(isset($_POST['reg-branch'])){
$branch_code = date("yms").rand(203994 , 485789);

$street = cleaninput($_POST['street']);

$state = cleaninput($_POST['state']);

$country = cleaninput($_POST['country']);

$city = cleaninput($_POST['city']);

$zip_code = cleaninput($_POST['zip_code']);

$contact = cleaninput($_POST['contact']);

if ($error == false){
$sql= $conn->query(" INSERT INTO dbranch SET branch_code='$branch_code', street='$street',  state='$state', country='$country', city='$city', zip_code='$zip_code' ,contact='$contact' ");
    header('location: manage-branch.php');
}
}else{
if(isset($_POST['reg-vehicle'])){
$v_id = date("yms").rand(203994 , 485789);
$v_branch = cleaninput($_POST['v_branch']);
$v_driver = cleaninput($_POST['v_driver']);
$v_type = cleaninput($_POST['v_type']);
$v_number = cleaninput($_POST['v_number']);


$sql= $conn->query("INSERT INTO vehicles SET v_id='$v_id', v_branch= '$v_branch',
v_type= '$v_type', v_number= '$v_number', v_driver= '$v_driver' ");

header('location:manage-vehicle.php');
}else{
if(isset($_POST['reg-goods'])){
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
$reference_number = date("dhs").rand(203994 , 485789);

$_SESSION['reference_number'] = $row['reference_number'];

$sql= $conn->query("INSERT INTO goods SET reference_number= '$reference_number', sender_flname= '$sender_flname',
sender_address= '$sender_address', sender_contact= '$sender_contact', recipient_flname= '$recipient_flname', recipient_address= '$recipient_address' ,recipient_contact= '$recipient_contact', type= '$type', from_branch_id= '$from_branch_id', to_branch_id= '$to_branch_id', weight= '$weight', height= '$height', width= '$width', length= '$length', price= '$price' ");


header('location:manage-goods.php');

}else{

    }
    }
}
}

}
