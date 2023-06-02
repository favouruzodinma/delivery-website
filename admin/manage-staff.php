<?php
  include ('header.php');
  include ('navbar.php');
  if(isset($_GET['id'])){
    $id= $_GET['id'];
    if($_GET['status']=='delete'){
        //? delete user account
        $sql=$conn->query("DELETE FROM staffs WHERE branch_id='$id'");
}}
?>

        <div class="page-wrapper">
          
            <div class="container-fluid">
               
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Manage Staff </h4>
                    </div>
                   
                </div>
                
                <?php 
               $sql = $conn->query("SELECT * FROM staffs");
                ?> 
                        <!-- table responsive -->
                        <div class="card">

                            <div class="card-body border-top border-info">
                            <div class="d-flex justify-content-end align-items-center">
                                <a href="create-staff.php" class="btn btn-outline-info" >
                                    Create Staff
                                </a>
                            </div>
									<?php echo isset($_SESSION['mgs'])?$_SESSION['mgs']:""?>						

                                <div class="table-responsive m-t-40">
                                    <table id="config-table" class="table display table-bordered table-striped no-wrap">
                                        <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Full Name</th>
                                                        <th>Email</th>
                                                        <th>Branch</th>
                                                        <th>Occupation</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                         <?php
                                                        if($sql->num_rows>0){
                                                            $num=1;

                                                   while($row=$sql->fetch_assoc()) { 
                                                        ?>
                                                    <tr id="1" class="gradeX">                                                     
                                                        <td class="center"><?php echo $num++; ?></td>
                                                        <td><?php echo $row['flname']; ?></td>
                                                        <td><?php echo $row['email']; ?></td>
                                                        <td><?php echo $row['branch']; ?></td>
                                                        <td class="center"><?php 
                                        switch ($row['job']) {
                                            case 'manager':
                                                echo "<span class='badge badge-pill badge-info'> MANAGER</span>";
                                                break;
                                            case 'driver':
                                                echo "<span class='badge badge-pill badge-primary'>DRIVING</span>";
                                                break;
                                            case 'receptionist':
                                                echo "<span class='badge badge-pill badge-success'>RECEPTIONIST</span>";
                                                break;}?>
                                                </td>
                                                        
                                             <td>                                                       
                            <?php if($row['status']=='pending'){?>
                            <a href= "controller.php?verify&id=<?php echo
                            $row['branch_id']; ?>&status=pending" class="btn btn-info btn-sm my-2">Verify</a>
                            <?php }else{ ?>
                            <a href="#" class="btn btn-success btn-sm">Verified</a>
                            <?php } ?>
                            <a href="javascript:void(0)" class="btn btn-info btn-sm " data-toggle="modal" data-target="#staticBackdrop<?php echo $row['id']; ?>" >Edit</a>

                            <a href="javascript:void(0)" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModall<?php echo $row['branch_id']; ?>" >Delete</a>
  
                                                        </td>
                                                <div class="modal fade" id="exampleModall<?php echo $row['branch_id']; ?>" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Comfirmation</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    ARE YOU SURE YOU WANT TO DELETE THIS STAFF??

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <a href="manage-staff.php?id=<?php echo  $row['branch_id']; ?>&status=delete" class="btn
                                                         btn-danger btn-sm" >Delete</a>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                                    </tr> 

                    
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
                <?php
   include ('../sidebar.php');
//    include ('footer.php');
             ?>
            </div>
        </div>
    </div>

    <?php
        $sql = $conn->query("SELECT * FROM staffs where type = 0");
        if($sql->num_rows>0){
        while($row=$sql->fetch_assoc()) {
    ?>
      <!-- ========================= edit modal ============================  -->
      <div class="modal fade" id="staticBackdrop<?php echo $row['id']; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="staticBackdropLabel">Update Branch</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <form action="update.php"  method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                        <div class="row">
                            <div class="col-md-12">

                            <div class="row">
                                <div class="col-sm-6 form-group ">
                                <h5>Full Name <span class="text-danger">*</span></h5>
                                <input type="text" name="flname" id="" cols="30" rows="2" value="<?php echo $row['flname'];?>" class="form-control" >
                                </div>
                                <div class="col-sm-6 form-group ">
                                <h5>Email <span class="text-danger">*</span></h5>
                                <input type="email" name="email" id="" value="<?php echo $row['email'];?>" cols="30" rows="2" class="form-control" required>
                                </div>
                            </div>
                    <div class="row">
                        <div class="col-sm-6 form-group ">
                        <h5>Branch <span class="text-danger">*</span></h5>
                        <select name="branch" id="v_branch" class="form-control input-sm select2">
                            <option value=""></option>
                            <?php
                            $sql1 = $conn->query("SELECT *,concat(street,',',city,', ',state,', ',country,', ',zip_code) as branch FROM dbranch");
                            while($row1 = $sql1->fetch_assoc()):
                            ?>
                            <option  <?php echo isset($branch) && $branch == $row1['branch'] ? "selected":' ' ?> value="<?php echo $row1['branch'] ?>"><?php echo $row1['branch'];?></option>
                        <?php endwhile; ?>
                        </select>
                        </div>
                    <div class="col-sm-6 form-group ">
                        <h5>Position <span class="text-danger">*</span></h5>
                        <select class="form-control" id="exampleFormControlSelect1" name="job">
                        <option></option>
                            <option <?php echo "manager"==$row['job']?"selected":''?> value="manager">Manager </option>
                            <option <?php echo "receptionist"==$row['job']?"selected":''?> value="receptionist">Receptionist</option>
                            <option <?php echo "driver"==$row['job']?"selected":''?> value="driver">Driver</option>
                        </select>
                    </div>      
                     </div>
                        <div class="form-group">
                                <div class="col-xs-12">
                                    <h5>Profile  <span class="text-danger">*</span></h5>
                                    <input type="file" class="form-control" name="user_img" value="<?php echo $row['user_img']?>">
                                </div>
                        </div>
                </div>
            </div>
            <div class="card-footer border-top border-info">
            <div class="d-flex w-100 justify-content-center align-items-center">  
                <button type="submit" class="btn btn-success w-100" name="Update-staff" >Save</button>
            </div>
        </div>
            </form>
                    </div>
                  </div>
                </div>
              </div>
 <?php }} ?>

<?php
   include ('scripts.php');
   include ('footer.php');

?>
