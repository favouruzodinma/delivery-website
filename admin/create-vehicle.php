<?php
  include ('header.php');
  include ('navbar.php');
?>
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
          
            <div class="container-fluid">
              
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Create vehicle</h4>
                    </div>
                  
                </div>
              
    <div class="row">
        <div class="col-10">
            <div class="card border-top border-info">
                <div class="card-body">
                <div class="d-flex justify-content-end align-items-center my-3 mx-3">
                    <a href="manage-vehicle.php" class="btn btn-outline-dark" >
                        Back <i class="ti-arrow-right"></i>
                    </a>
                </div>
        <form action="action.php"  method="POST">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
            <div class="col-sm-6 form-group">
                <label for="" class="control-label">Vehicle Type:</label>
                <input name="v_type" id="" cols="15" rows="1" class="form-control" required>
                </div>
              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Vehicle number:</label>
                <input name="v_number" id="" cols="15" rows="1" class="form-control" required>
              </div>
            </div>

            <div class="row">
            <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Branch </label>
                <select name="v_branch" id="v_branch" class="form-control input-sm select2">
                  <option value=""></option>
                  <?php
                    $dbranch = $conn->query("SELECT *,concat(street,',',city,', ',state,', ',country) as v_branch FROM dbranch");
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
                    $staffs = $conn->query("SELECT flname as v_driver FROM staffs WHERE job='driver' ");
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
  	<div class="card-footer">
  		<div class="d-flex  justify-content-center align-items-center">  
            <button type="submit" class="btn btn-success " name="reg-vehicle">Save Vehicle</button>
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
                include ('../sidebar.php')
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