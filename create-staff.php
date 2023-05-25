
<?php

include 'config.php';

?>
<?php
  include ('header.php');
  include ('navbar.php');

?>
<?php
include('manage-account.php');

?>

        <!-- Page wrapper  -->
       <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Create Staff</h4>
                    </div>
                  
                </div> 
                
      <div class="row">
          <div class="col-12">
              <div class="card">
                  
                  <div class="card-body border-top border-info">
                      <h2 class="card-title">Create Staff</h2>
                    
                      <form action="create-staff.php"  method="post">
                    <div class="row">
                      <div class="col-md-12">
                        <div id="msg" class=""></div>

                        <div class="row">
                          <div class="col-sm-6 form-group ">
                          <h5>Full Name <span class="text-danger">*</span></h5>
                            <input type="text" name="flname" id="" cols="30" rows="2" class="form-control" >
                            <span class= "text-danger"> <?php  echo isset($errFlname)?$errFlname:Null ?> </span>
                          </div>
                          <div class="col-sm-6 form-group ">
                          <h5>Email <span class="text-danger">*</span></h5>
                            <input type="email" name="email" id="" cols="30" rows="2" class="form-control">
                            <span class= "text-danger"><?php  echo isset($errEmail)?$errEmail:Null ?></span>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-6 form-group ">
                          <h5>Password <span class="text-danger">*</span></h5>
                          <input type="password" name="password" class="form-control" >
                          <span class= "text-danger"><?php echo isset($errPassword)?$errPassword:Null ?></span>
                        </div>
                        <div class="col-sm-6 form-group ">
                        <h5>Comfirm Password <span class="text-danger">*</span></h5>
                        <input type="password" name="cpassword" class="form-control" >
                         <span class= "text-danger"><?php  echo isset($errCpassword)?$errCpassword:Null  ?></span>
                    </div>
                  </div>

                <div class="row">
                  <div class="col-sm-6 form-group ">
                  <h5>Branch <span class="text-danger">*</span></h5>
                  <select name="branch" id="v_branch" class="form-control input-sm select2">
                      <option value=""></option>
                      <?php
                        $dbranch = $conn->query("SELECT *,concat(street,',',city,', ',state,', ',country,', ',zip_code) as branch FROM dbranch");
                        while($row = $dbranch->fetch_assoc()):
                      ?>
                      <option value="<?php echo $row['branch'] ?>" <?php echo isset($branch_id) && $branch_id == $row['branch'] ? "selected":'' ?>><?php echo $row['branch'];?></option>
                    <?php endwhile; ?>
                    </select>
                  </div>
              <div class="col-sm-6 form-group ">

              <h5>Position <span class="text-danger">*</span></h5>
              <select class="form-control" id="exampleFormControlSelect1" name="job">
                   <option></option>
                 <option value="manager">Manager </option>
                   <option value="receptionist">Receptionist</option>
                   <option value="driver">Driver</option>
                 </select>
              </div>

            </div>
              <div class="form-group">
                        <div class="col-xs-12">
                        <h5>Profile  <span class="text-danger">*</span></h5>
		                 <input type="file" 
		                 class="form-control"
		                  name="user_img">
		                </div>
                   </div>
          </div>
        </div>
        <div class="card-footer border-top border-info">
  		<div class="d-flex w-100 justify-content-center align-items-center">  
            <button type="submit" class="btn btn-success" name="register-staff" >Save</button>
  			<a class="btn btn-flat bg-danger mx-2" href="staff-table.php" style="color:white;">Cancel</a>
  		</div>
  	</div>
      </form>
  	</div>
  	
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                include ('sidebar.php')
                 ?>
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
 <?php
  include('scripts.php');
  include('footer.php');

 ?>