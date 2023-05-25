

<?php
include 'config.php';


 //echo md5('12');
   if (isset ($_POST['register'])){
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
                        <h2 class="text-themecolor">Edit vehicle</h2>
                    </div>
                  
                </div>
              <?php
                                         
                                          include('editv.php');
                                          $id= $_GET['id'];
                                           
                                                        
                                                    if (isset ($_POST['updatebtn'])){
                                                        $sql= $conn->query(" UPDATE vehicles SET v_type='$v_type', v_branch='$v_branch', v_driver='$v_driver', v_number='$v_number'  WHERE id='$id'" );
                                                    
                                          }
                                    
                                          $sql = $conn->query("SELECT * FROM vehicle WHERE id = ".$_GET['id']);
                    

                                          if($sql->num_rows>0){
                                              
                                                  $row = $sql->fetch_assoc();{
                                                  
                                      
                                                  }}
                                                
              ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card border-top border-info">
                            <div class="card-body">
                                <h4 class="card-title">Edit Vehicle</h4>
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
        </div>
              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Vehicle number:</label>
                <textarea name="v_number" id="" cols="15" rows="1" class="form-control"></textarea>
                
              </div>
            </div>

            <div class="row">
            <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Branch </label>
                <select name="v_branch" id="v_branch" class="form-control input-sm select2">
                  <option value=""></option>
                  <?php
                    $dbranch = $conn->query("SELECT *,concat(street,',',city,', ',state,', ',country,', ',zip_code) as v_branch FROM dbranch");
                    while($row1 = $dbranch->fetch_assoc()):
                  ?>
                  <option value="<?php echo $row1['v_branch'] ?>" <?php echo isset($branch_id) && $branch_id == $row1['v_branch'] ? "selected":'' ?>><?php echo $row1['v_branch'];?></option>
                <?php endwhile; ?>
                </select>
              </div>
              


              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Driver Full-Name</label>
                <select name="v_driver" id="v_driver" class="form-control input-sm select2">
                  <option value=""></option>
                  <?php
                    $staffs = $conn->query("SELECT flname as v_driver FROM staffs");
                    while($row2 = $staffs->fetch_assoc()):
                  ?>
                  <option value="<?php echo $row2['v_driver'] ?>" <?php echo isset($branch_id) && $branch_id == $row2['v_driver'] ? "selected":'' ?>><?php echo $row2['v_driver'];?></option>
                <?php endwhile; ?>
                </select>
              </div>

            </div>

           <?php
          //  }
           ?>

          </div>
        </div>
  	</div>
  	<div class="card-footer border-top border-info">
  		<div class="d-flex w-100 justify-content-center align-items-center">  
            <button type="submit" class="btn btn-success" name="updatebtn" class="img-fluid model_img"
                                    id="sa-success" >Update</button>
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