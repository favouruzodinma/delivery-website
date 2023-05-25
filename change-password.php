<?php

// session_start();
include 'config.php';

if (isset($_POST['updatebtn'])){
 include ('password.php');

}

?>

<?php
// session_start();
  include ('header.php');
  include ('navbar.php');

//   include 'config.php';
  
?>
 <?php
include('manage-account.php');
?>
<div class="page-wrapper">

            <div class="container-fluid">

                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Change Password</h4>
                    </div>
                </div> 
                <div class="row">
  
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"> Edit Password</h4>
                                <div class="form-group" >
                                        <form action="password.php" method="post">
                                        <div class="form-group">
                                        <h5>Old Password  <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="password" name="password" class="form-control" >
                                            
                                        </div>
                                    </div>
                                        <div class="form-group">
                                        <h5>New Password  <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="password" name="newpassword" class="form-control" >
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Comfrim New Password  <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="password" name="cnewpassword" class="form-control" >
                                            
                                        </div>
                                    </div>
                                    <div class="d-flex w-100 justify-content-center align-items-center">  
                                    <button type="submit" class="btn btn-info" name="updatebtn">Update </button>
  			                       <a class="btn btn-flat bg-danger mx-2" href="dashboard.php" style="color:white;">Cancel</a>
  	                                	</div>
                                      <hr>
                                    <p class=""><i>leave if you dont want to change anything </i></p>
                      </form>
      </div>
                            </div>
                        </div>
                    </div>
                </div>
</div>
</div>


<?php
  include ('sidebar.php');
  include ('scripts.php');
  include ('footer.php');
?>
