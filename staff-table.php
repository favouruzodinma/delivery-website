

<?php

 //echo md5('12');
   if (isset ($_POST['register'])){
       include 'staff.php';
   }
//    include 'head.php'
?>
<?php if(!isset($conn)){ include 'config.php'; } ?>
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
                        <h4 class="text-themecolor">Staff Dashboard </h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                           
                            <div class="container">
  
  

  
  
                                 </div>
                          </div>
                      </div>
                </div>
                
                <?php 
           
               $sql = $conn->query("SELECT * FROM staffs where type = 0  ");
          
                ?> 
                        <!-- table responsive -->
                        <div class="card">

                            <div class="card-body border-top border-info">
                                <h5 class="card-title">Staff list </h5>
                                <h6 class="card-subtitle"></h6>
                               
                                     <br>
                                            <div>
                                                
                                               <button type="button" class="btn btn-info" >
                                            <a href="create-staff.php" style="color: white;"> Create Staff</a>
                                               </button>
                                          </div>
                               
                                <h6 class="card-subtitle"></h6>
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
								case 'ceo':
									echo "<span class='badge badge-pill badge-info'>CEO</span>";
									break;
								case 'manager':
									echo "<span class='badge badge-pill badge-info'> MANAGER</span>";
									break;
								case 'driver':
									echo "<span class='badge badge-pill badge-primary'>DRIVING</span>";
									break;
								case 'accountant':
									echo "<span class='badge badge-pill badge-primary'>ACCOUNTANT</span>";
									break;
								case 'security':
									echo "<span class='badge badge-pill badge-primary'> SECURITY</span>";
									break;
								case 'receptionist':
									echo "<span class='badge badge-pill badge-success'>RECEPTIONIST</span>";
									break;
								case 'ict_security':
									echo "<span class='badge badge-pill badge-success'>ICT SECURITY</span>";
									break;
								case 'gate_man':
									echo "<span class='badge badge-pill badge-success'> GATE MAN</span>";
									break;
								
							}

							?></td>
                                                        
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
                                                    <?php }}?>
                                                </tbody>
                                               
                                            </table>
                                        </div>
                                    </div>         
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <?php
   include ('sidebar.php');
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

<script>

$(document).ready{fumction {}{
     ${'.deletebtn'}.on('click', fumction{} (
        ${'#deletebtn'}.modal('show');
     ));
}};

</script>

<?php
if(isset($_SESSION['mgs'])){
    unset($_SESSION['mgs']);
}
   include ('scripts.php');
   include ('footer.php');

?>