<?php
include_once('../config.php');

if($_SERVER['REQUEST_METHOD']=="POST"){


if(isset($_POST['update-branch'])){
$branch_code = cleaninput($_POST['branch_code']);

$street = cleaninput($_POST['street']);

$state = cleaninput($_POST['state']);

$country = cleaninput($_POST['country']);

$city = cleaninput($_POST['city']);

$zip_code = cleaninput($_POST['zip_code']);

$contact = cleaninput($_POST['contact']);

$sql= $conn->query(" UPDATE dbranch SET  street='$street',  state='$state', country='$country', city='$city', zip_code='$zip_code' ,contact='$contact' WHERE branch_code='$branch_code'");

header('location: manage-branch.php');
}else{
if(isset($_POST['Update-staff'])){
    
    $branch_id = cleaninput($_POST['branch_id']); 

    $flname = cleaninput($_POST['flname']);
    $email = cleaninput($_POST['email']);
    
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
    
    $sql= $conn->query("UPDATE staffs SET  flname='$flname', email='$email', password='$password', branch='$branch' , user_img='$target_file', job='$job' WHERE branch_id='$branch_id' ");
    
    header("location: manage-staff.php");
}   
}else{

}
}

}
