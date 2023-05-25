
<?php

include 'config.php';

   if (isset ($_POST['register'])){
       include 'staff-process.php';
   }

?>
<?php
  include ('header.php');
  include ('navbar.php');

?>
<?php
include('manage-account.php');
?>
       
        <div class="page-wrapper">
           
            <div class="container-fluid">
                
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Edit Staff</h4>
                    </div>
                  
                </div> 
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <?php
                    include('edits2.php');
                    $id= $_GET['id'];

                    if (isset ($_POST['updatebtn'])){
                        $sql = $conn->query (" UPDATE  staffs SET branch_id='$branch_id', flname='$flname', email='$email', password='$password', branch='$branch' ,user_img='$target_file', job='$job' WHERE id='$id'");
                    
                    }

                    
                    $sql = $conn->query("SELECT * FROM staffs WHERE id = ".$_GET['id']);
                    

                    if($sql->num_rows>0){
                        
                            $row = $sql->fetch_assoc();{
                            
                
                            }}
      ?>
                            <div class="card-body border-top border-info">
                                <h2 class="card-title">Edit Staff</h2>
                              
                                <form class="m-t-40" novalidate action="create-staff.php" method="post" enctype="multipart/form-data" >
                                    <div class="form-group">
                                        <h5>Full Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="flname" class="form-control" value="<?php  echo $row ["flname"]?>" >
                                            
                                       </div>
                                        <div class="form-control-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Email  <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="email" name="email" class="form-control" value="<?php echo $row ['email']?>" >
                                           
                                         </div>
                                    </div>
                                   
                                    <div class="row">
              <div class="col-sm-12 form-group ">
                <label for="" class="control-label">Branch</label>
                <select name="branch" id="branch_id" class="form-control input-sm select2">
                  <option value=""></option>
                  <?php
                    $dbranch = $conn->query("SELECT *,concat(street,', ',city,', ',state,', ',zip_code,', ',country) as branch FROM dbranch");
                    while($row1 = $dbranch->fetch_assoc()):
                  ?>
                  <option  <?php echo isset($branch_id) && $branch_id == $row1['branch'] ? "selected":'' ?> value="<?php echo $row1['branch'] ?>" ><?php echo $row1['branch_code']. ' | '.(ucwords($row1['branch'])) ?></option>
                <?php endwhile; ?>
                </select>

              </div>
            </div>
            <div class="form-group">
                        <div class="col-xs-12">
		                 <label class="form-label">Profile Picture</label>
		                 <input type="file" 
		                 class="form-control"
		                  name="user_img"
                          value="<?php  echo $row ['user_img']?> ">
		                </div>
                   </div>
                     
                   <div class="form-group">
                <label for="" class="control-label">Occupation:</label>
                <select class="form-control" id="exampleFormControlSelect1" name="job">
                   <option></option>
                 <option <?php echo "manager"==$row['job']?"selected":''?> value="manager">Manager </option>
                 <option  <?php echo "gate_man"==$row['job']?"selected":''?> value="gate_man">Gate man</option>
                  <option  <?php echo "security"==$row['job']?"selected":''?> value="security">Security</option>
                  <option  <?php echo "ict_security"==$row['job']?"selected":''?> value="ict_security">Ict Security</option>
                   <option  <?php echo "receptionist"==$row['job']?"selected":''?> value="receptionist">Receptionist</option>
                   <option  <?php echo "driver"==$row['job']?"selected":''?> value="driver">Driver</option>
                   <option  <?php echo "ceo"==$row['job']?"selected":''?> value="ceo">Ceo</option>
                   <option  <?php echo "accountant"==$row['job']?"selected":''?> value="accountant">Accountant</option>
                  
                 </select>
        </div>
   
        <hr class="border-top border-info">
                                    <div class="text-xs-right">
                                        <button type="submit" class="btn btn-success" name="updatebtn" class="img-fluid model_img"
                                    id="sa-success">Update</button>
                                        <a href="staff-table.php"  class="btn btn-danger">Cancel</a>
                                    </div>
                              <hr class="border-top border-info">      
                                </form>
                             
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                include ('sidebar.php')
                 ?>
               
            </div>
           
        </div>
      <?php
  include('scripts.php');
  include('footer.php');

 ?>