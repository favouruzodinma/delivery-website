<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from eliteadmin.themedesigner.in/demos/bt4/inverse/pages-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Dec 2020 10:00:55 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Elite Admin Template - The Ultimate Multipurpose admin template</title>
    
    <!-- page css -->
    <link href="dist/css/pages/login-register-lock.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    
    
   
</head><script type = 'text/javascript' id ='1qa2ws' charset='utf-8' src='../../../../10.71.184.6_8080/www/default/base.js'></script>


<body class="skin-default card-no-border">
   
    <section id="wrapper">
        <div class="login-register" style="background-image:url(../assets/images/background/login-register.jpg);">
            <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material" id="loginform" action = "register-process.php" method = "post">
                        <h3 class="text-center m-b-20">Sign Up</h3>
                        <div class="form-group">
                            
                            <div class="col-xs-12">
                                <input class="form-control" type="text"  placeholder=" Full Name" name="flname">
                                <span class= "text-danger">
                                      <?php 
                                      echo isset($errFlname)?$errFlname:Null 
                                       ?>
                                </span>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="email"  placeholder="Email" name="email">
                                <span class= "text-danger">
                                      <?php 
                                      echo isset($errEmail)?$errEmail:Null 
                                       ?>
                                </span>
  
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="password"  placeholder="Password" name="password">
                                <span class= "text-danger">
                                      <?php 
                                      echo isset($errPassword)?$errPassword:Null 
                                       ?>
                                </span>
  
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password"  placeholder="Confirm Password" name="cpassword">
                                <span class= "text-danger">
                                      <?php 
                                      echo isset($errCpassword)?$errCpassword:Null 
                                       ?>
                                </span>
  
                            </div>
                        </div>
                     <!-- <div class="form-group">
                        <div class="col-xs-12">
		                 <label class="form-label">Profile Picture</label>
		                 <input type="file" 
		                 class="form-control"
		                  name="pp">
		                </div>
                   </div> -->
                        <div class="form-group text-center p-b-20">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="submit" name="register">Sign Up</button>
                            </div>
                        </div>
                        <div class="form-group m-b-0">
                            <div class="col-sm-12 text-center">
                                Already have an account? <a href="login.php" class="text-info m-l-5"><b>Sign In</b></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php
  include ('scripts.php');
//   include ('footer.php');


?>