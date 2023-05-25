<?php
  include ('header.php');
  include ('navbar.php');

?>

        <div class="page-wrapper">
          
            <div class="container-fluid">
               
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Manage Staff </h4>
                    </div>
                   
                </div>
                
                <?php 
           
               $sql = $conn->query("SELECT * FROM staffs where type = 0  ");
          
                ?> 
                        <!-- table responsive -->
                        <div class="card">

                            <div class="card-body border-top border-info">
                            <div class="d-flex justify-content-end align-items-center">
                                <a href="" class="btn btn-outline-info" >
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
                            <a href= "manage-staff.php?id=<?php echo
                            $row['branch_id']; ?>&status= admin=1, staff=2 " class="btn btn-info btn-sm my-2">Verify</a>
                            <?php }else{ ?>
                            <a href="#" class="btn btn-success btn-flat">Verified</a>
                            <?php } ?>
                            <a href="edit-staff.php?id=<?=  $row['id']; ?>&status=update" class="btn btn-info btn-flat " >Edit</a>

                            <a href="#" class="btn btn-danger btn-flat deletebtn" data-toggle="modal" data-target="#exampleModallp" >Delete</a>
  
                                                        </td>
                                                        <div class="modal fade" id="exampleModallp" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        <a href="manage-staff.php?id=<?=  $row['branch_id']; ?>&status=delete" class="btn
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