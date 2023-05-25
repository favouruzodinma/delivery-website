<?php

$error = false; 

if($_SERVER['REQUEST_METHOD']=="POST"){

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
    if(empty($_POST['branch'])){
        // $errbranch = "Branch is required!!";
        $error = true;
    } else{
        $branch = cleaninput($_POST['branch']);
        
    }

    if(empty($_POST['job'])){
        // $errjob = "job is required!!";
        $error = true;
    } else{
        $job = cleaninput($_POST['job']);
        
    }
    
    $target_dir = "web/";
    $target_file = $target_dir . basename($_FILES["user_img"]["name"]);
    $uploadOk = true;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["create_testimonies"])) {
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
        $branch_id = md5(date("ymdhis").rand(203994 , 485789)); 
        $password = md5($password);
        
        $sql= $conn->query("INSERT  INTO staffs SET branch_id='$branch_id', flname='$flname', email='$email', password='$password', branch='$branch' ,user_img='$target_file', job='$job'");

    header("location: staff-table.php");

     }


  }
?>