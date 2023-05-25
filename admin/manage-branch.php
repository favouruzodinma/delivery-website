<?php
  include ('header.php');
  include ('navbar.php');
  if(isset($_GET['id'])){
    $id= $_GET['id'];
    if($_GET['status']=='delete'){
        //? delete user account
        $sql=$conn->query("DELETE FROM dbranch WHERE branch_code='$id'");
}}
?>
        <div class="page-wrapper">

            <div class="container-fluid">
               
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor"> Manage Branch</h4>
                    </div>
              </div>
                <!-- ============================================================== -->
                <?php 
               $sql = $conn->query("SELECT * FROM dbranch ");
               ?>
                        <!-- table responsive -->
      <div class="card">
          <div class="card-body">
              <div class="d-flex justify-content-end align-items-center">
                  <a href="create-branch.php" class="btn btn-outline-info" >
                    Create branch
                  </a>
            </div>     
            <h6 class="card-subtitle"></h6>
          <div class="table-responsive m-t-40">
              <table id="config-table" class="table display table-bordered table-striped no-wrap">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Branch_Code</th>
                      <th>Street/building</th>
                      <th>City/state/zip</th>
                      <th>Country</th>
                      <th>Contact</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                          <tbody>
                              <?php  if($sql->num_rows>0){
                                  $num=1;
                                while($row=$sql->fetch_assoc()){     
                            ?>
                              <tr id="1" class="gradeX">                                                     
                                  <td class="center"><?php echo $num++; ?></td>
                                  <td><?php echo $row['branch_code']; ?></td>
                                  <td><?php echo $row['street'] ; ?></td>
                                  <td><?php echo $row['city'].', '.$row['state'].', '.$row['zip_code']; ?></td>
                                  <td class="center"><?php echo $row['country']; ?></td>
                                  <td><?php echo $row['contact']; ?></td>
                                  <td>   
                                  <a href="javascript:void(0)" class="btn btn-info btn-sm " data-toggle="modal" data-target="#staticBackdrop<?php echo $row['branch_code']; ?>" >Edit</a>
                                <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModall<?php echo $row['branch_code']; ?>" >Delete</a>
                                  </td>
                              </tr> 
                              <div class="modal fade" id="exampleModall<?php echo $row['branch_code']; ?>" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Comfirmation</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    ARE YOU SURE YOU WANT TO DELETE THIS Branch??

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <a href="manage-branch.php?id=<?=  $row['branch_code']; ?>&status=delete" class="btn btn-danger btn-sm" >Delete</a>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                              <!-- ========================= edit modal ============================  -->
                <div class="modal fade" id="staticBackdrop<?php echo $row['branch_code']; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="staticBackdropLabel">Update Branch</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    <form action="update.php" method="POST">
                                    <input type="hidden" name="branch_code" value="<?php echo $row['branch_code'];?>">
                                    <div class="row">
                                      <div class="col-md-12">

                                        <div class="row">
                                          <div class="col-sm-6 form-group ">
                                            <label for="" class="control-label">Street/Building</label>
                                            <textarea name="street" id="" cols="30" rows="2" class="form-control" required  value="" ><?php echo $row['street'];?></textarea>
                                          </div>
                                          <div class="col-sm-6 form-group ">
                                            <label for="" class="control-label">City</label>
                                            <textarea name="city" id="" cols="30" rows="2" class="form-control" required  value="" ><?php echo $row['city'];?></textarea>
                                          </div>
                                        </div>

                                        <div class="row">
                                          <div class="col-sm-6 form-group ">
                                            <label for="" class="control-label">State</label>
                                            <textarea name="state" id="" cols="30" rows="2" class="form-control" required  value="" ><?php echo $row['state'];?></textarea>
                                          </div>
                                          <div class="col-sm-6 form-group ">
                                            <label for="" class="control-label">Zip Code/ Postal Code</label>
                                            <textarea name="zip_code" id="" cols="30" rows="2" class="form-control" required value="" ><?php echo $row['zip_code'];?></textarea>
                                          </div>
                                        </div>

                                        <div class="row">
                                          <div class="col-sm-6 form-group ">
                                            <label for="" class="control-label">Country</label>
                                            <textarea name="country" id="" cols="30" rows="2" class="form-control" required  value="" ><?php echo $row['country'];?></textarea>
                                          </div>
                                          <div class="col-sm-6 form-group ">
                                            <label for="" class="control-label">Contact #</label>
                                            <textarea name="contact" id="" cols="30" rows="2" required class="form-control" value="" ><?php echo $row['contact'];?></textarea>
                                          </div>
                                        </div>

                                      </div>
                                    </div>
                                    <div class="d-flex w-100 justify-content-center align-items-center">  
                                      <button type="submit" class="btn btn-outline-success w-100" name="update-branch" >Save</button>
                                </div>
                          </form>
                    </div>
                  </div>
                </div>
              </div>

                              <?php }}else{ ?> 
                                  <td colspan=7><span class="text-danger" style="color:red">No result Found</span> </td>
                                <?php }?>
                          </tbody>
                      </table>
                  </div>
          </div>         
      </div>
        </div>
    </div>

               

                <!-- ============================================================== -->
                <?php include ('../sidebar.php');?>

            </div>
        </div>
    </div>
    <style>
	img#cimg{
		max-height: 15vh;
		/*max-width: 6vw;*/
	}
</style>

<?php

   include ('scripts.php');
   include ('footer.php');

?>
