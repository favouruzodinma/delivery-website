<?php if(!isset($conn)){ include ('config.php'); } ?>


<?php
//include 'config.php';


 //echo md5('12');
   if (isset ($_POST['register'])){
       include 'manage-branch.php';
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
       
        <div class="page-wrapper">
           
            <div class="container-fluid">
               
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h2 class="text-themecolor">Create Branch</h2>
                    </div>
                   
                </div>
               
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Create Branch</h4>
                                <hr class="card-footer border-top border-info">
                             
                                <form action="create-branch.php" id="manage-branch" method="post">
                                    <input type="hidden" name="id" value="">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div id="msg" class=""></div>

                                        <div class="row">
                                          <div class="col-sm-6 form-group ">
                                            <label for="" class="control-label">Street/Building</label>
                                            <textarea name="street" id="" cols="30" rows="2" class="form-control" ></textarea>
                                            <span class= "text-danger">
                                                                          <?php 
                                                                          echo isset($errStreet)?$errStreet:Null 
                                                                            ?>
                                                                          </span>
                                          </div>
                                          <div class="col-sm-6 form-group ">
                                            <label for="" class="control-label">City</label>
                                            <textarea name="city" id="" cols="30" rows="2" class="form-control"></textarea>
                                            <span class= "text-danger">
                                                                          <?php 
                                                                          echo isset($errCity)?$errCity:Null 
                                                                            ?>
                                                                          </span>
                                          </div>
                                        </div>

                                        <div class="row">
                                          <div class="col-sm-6 form-group ">
                                            <label for="" class="control-label">State</label>
                                            <textarea name="state" id="" cols="30" rows="2" class="form-control"></textarea>
                                            <span class= "text-danger">
                                                                          <?php 
                                                                          echo isset($errState)?$errState:Null 
                                                                            ?>
                                                                          </span>
                                          </div>
                                          <div class="col-sm-6 form-group ">
                                            <label for="" class="control-label">Zip Code/ Postal Code</label>
                                            <textarea name="zip_code" id="" cols="30" rows="2" class="form-control"></textarea>
                                            <span class= "text-danger">
                                                                          <?php 
                                                                          echo isset($errZip_code)?$errZip_code:Null 
                                                                            ?>
                                                                          </span>
                                          </div>
                                        </div>

                                        <div class="row">
                                          <div class="col-sm-6 form-group ">
                                            <label for="" class="control-label">Country</label>
                                            <textarea name="country" id="" cols="30" rows="2" class="form-control"></textarea>
                                            <span class= "text-danger">
                                                                          <?php 
                                                                          echo isset($errCountry)?$errCountry:Null 
                                                                            ?>
                                                                          </span>
                                          </div>
                                          <div class="col-sm-6 form-group ">
                                            <label for="" class="control-label">Contact #</label>
                                            <textarea name="contact" id="" cols="30" rows="2" class="form-control"></textarea>
                                            <span class= "text-danger">
                                                                          <?php 
                                                                          echo isset($errContact)?$errContact:Null 
                                                                            ?>
                                                                          </span>
                                          </div>
                                        </div>

                                      </div>
                                    </div>
                                  </form>
                              </div>
                              <div class="card-footer border-top border-info">
                                <div class="d-flex w-100 justify-content-center align-items-center">  
                                      <button type="submit" class="btn btn-success" name="register" class="img-fluid model_img"
                                                              id="sa-success" form="manage-branch">Save</button>
                                  <a class="btn btn-flat bg-danger mx-2" href="branch-table.php" style="color:white;">Cancel</a>
                                </div>
                              </div>
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