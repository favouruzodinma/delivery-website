<!DOCTYPE html>
<html lang="en">
<?php
include 'config.php';
     if (isset($_POST['login'])){
      $email = cleaninput($_POST['email']);
  
      $password = md5(cleaninput($_POST['password']));
     
     $sql= $conn->query("SELECT * FROM staffs WHERE  email= '$email' AND password = '$password'");

     if($sql->num_rows>0){
        $row = $sql->fetch_assoc ();
        $_SESSION['email'] = $row['email'];
        $_SESSION['branch_id'] = $row['branch_id'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['success']=true;
        header('location:dashboard.php');
    }else{
      $_SESSION['mgs'] = '
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Invalid Email or Password submitted!!</strong> 
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    header('Location:login.php');          
     }
    }
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Elite | Management</title>
    
    <!-- page css -->
    <link href="dist/css/pages/login-register-lock.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
    
</head><script type = 'text/javascript' id ='1qa2ws' charset='utf-8' src='../../../../10.71.184.6_8080/www/default/base.js'></script>

<body class="skin-default card-no-border">
   
    
    <section id="wrapper">
        <div class="login-register" style="background-image:url(../assets/images/background/login-register.jpg);">
            <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material" id="loginform" action="#" method="POST">
                        <h3 class="text-center m-b-20">Sign In</h3>
                        <?php echo isset($_SESSION['mgs'])?$_SESSION['mgs']:""?>
                        

                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" placeholder="Email" name="email"> </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" required="" placeholder="Password" name="password"> </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="d-flex no-block align-items-center">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Remember me</label>
                                    </div> 
                                    
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20">
                                <button class="btn btn-block btn-lg btn-info btn-rounded" type="submit" name="login">Log In</button>
                            </div>
                        </div>
                        
                        
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php
    if(isset($_SESSION['mgs'])){
        unset($_SESSION['mgs']);
    }
    ?>
  <?php
  include('scripts.php');
  ?>