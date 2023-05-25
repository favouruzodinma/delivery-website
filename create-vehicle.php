

<?php
include 'config.php';


 //echo md5('12');
   if (isset ($_POST['registeration'])){
       include 'manage-vehicle.php';
   }
//    include 'head.php'

?>
<?php

  include ('header.php');
  include ('navbar.php');
// isset($_SESSION['success'])? header("location:index4.php"):'';


?>
<?php
include('manage-account.php');
?>
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
          
            <div class="container-fluid">
              
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h2 class="text-themecolor">Create vehicle</h2>
                    </div>
                  
                </div>
              
                <div class="row">
                    <div class="col-12">
                        <div class="card border-top border-info">
                            <div class="card-body">
                                <h4 class="card-title">Create Vehicle</h4>
                               <hr>
                             
                                <form action="create-vehicle.php" id="manage-bvehicle" method="post">
        <input type="hidden" name="id" value="">
        <div class="row">
          <div class="col-md-12">
            <div id="msg" class=""></div>

            <div class="row">
            <div class="col-sm-6 form-group">
                <label for="" class="control-label">Vehicle Type:</label>
                <textarea name="v_type" id="" cols="15" rows="1" class="form-control"></textarea>
                <span class= "text-danger">
                                               <?php 
                                              echo isset($errV_type)?$errV_type:Null 
                                                 ?>
                                              </span>
        </div>
              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Vehicle number:</label>
                <textarea name="v_number" id="" cols="15" rows="1" class="form-control"></textarea>
                <span class= "text-danger">
                                               <?php 
                                              echo isset($errV_number)?$errV_number:Null 
                                                 ?>
                                              </span>
              </div>
            </div>

            <div class="row">
            <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Branch </label>
                <select name="v_branch" id="v_branch" class="form-control input-sm select2">
                  <option value=""></option>
                  <?php
                    $dbranch = $conn->query("SELECT *,concat(street,',',city,', ',state,', ',country,', ',zip_code) as v_branch FROM dbranch");
                    while($row = $dbranch->fetch_assoc()):
                  ?>
                  <option value="<?php echo $row['v_branch'] ?>" <?php echo isset($branch_id) && $branch_id == $row['v_branch'] ? "selected":'' ?>><?php echo $row['v_branch'];?></option>
                <?php endwhile; ?>
                </select>
              </div>
              


              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Driver Full-Name</label>
                <select name="v_driver" id="v_driver" class="form-control input-sm select2">
                  <option value=""></option>
                  <?php
                    $staffs = $conn->query("SELECT flname as v_driver FROM staffs");
                    while($row = $staffs->fetch_assoc()):
                  ?>
                  <option value="<?php echo $row['v_driver'] ?>" <?php echo isset($branch_id) && $branch_id == $row['v_driver'] ? "selected":'' ?>><?php echo $row['v_driver'];?></option>
                <?php endwhile; ?>
                </select>
              </div>

            </div>

           

          </div>
        </div>
  	</div>
  	<div class="card-footer border-top border-info">
  		<div class="d-flex w-100 justify-content-center align-items-center">  
            <button type="submit" class="btn btn-success" name="registeration" class="img-fluid model_img"
                                    id="sa-success" >Save</button>
  			<a class="btn btn-flat bg-danger mx-2" href="./vehicle-table.php" style="color:white;">Cancel</a>
  		</div>
  	</div>
    </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
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