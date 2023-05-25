<?php
  include ('header.php');
  include ('navbar.php');
  if(isset($_GET['id'])){
    $id= $_GET['id'];
    if($_GET['status']=='delete'){
        //? delete user account
        $sql=$conn->query("DELETE FROM vehicles WHERE v_id='$id'");
}}
?>

        <div class="page-wrapper">
          
            <div class="container-fluid">
               
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Vehicle list </h4>
                    </div>
                </div>
                <!-- ============================================================== -->
                <?php 
             $sql = $conn->query("SELECT * FROM vehicles ORDER BY id ");
                ?> 
                      
                        <div class="card">

                            <div class="card-body">
                                 <div class="d-flex justify-content-end align-items-center">
                                        <a href="create-vehicle.php" class="btn btn-outline-info" >
                                            Create Vehicle
                                        </a>
                                    </div>
                                <div class="table-responsive m-t-40">
                                    <table id="config-table" class="table display table-bordered table-striped no-wrap">
                                        <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Vehicle Type</th>
                                                       
                                                        <th>Vechile No</th>
                                                        <th>Driver Full-Name</th>
                                                        <th>Branch</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                         <?php
                                                       if($sql->num_rows>0){
                                                              $num=1;
                                                     while($row=$sql->fetch_assoc()){
                                                        ?>
                                                    <tr id="1" class="gradeX">                                                     
                                                        <td class="center"><?php echo $num++; ?></td>
                                                        <td><?php echo $row['v_type']; ?></td>
                                                        <td><?php echo $row['v_number']; ?></td>
                                                        <td><?php echo $row['v_driver']; ?></td>
                                                        <td class="center"><?php  echo $row['v_branch']; ?></td>                                                      
                                                        <td>   
                                                        <a href="edit-vehicle.php?id=<?= $row['id'];?>&status=update" class="btn btn-info btn-flat " >
		                                                 Edit
		                                                 </a>
                                                         <a href="#" class="btn btn-danger " data-toggle="modal" data-target="#exampleModall<?php echo $row['v_id']; ?>" >Delete</a>
                                                    </tr> 
                                             <div class="modal fade" id="exampleModall<?php echo $row['v_id']; ?>" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Comfirmation</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    ARE YOU SURE YOU WANT TO DELETE THIS VEHICLE??

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <a href="manage-vehicle.php?id=<?=  $row['v_id']; ?>&status=delete" class="btn btn-danger btn-sm" >Delete</a>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <?php }}else{ ?> 
                                                <td colspan=6><span class="text-danger" style="color:red">No result Found</span> </td>
                                                <?php }?>
                                                </tbody>
                                               
                                            </table>
                                        </div>
                                    </div>         
                        </div>
                    </div>
                </div>
                
              
            </div>
        </div>
    </div>
    <style>
	img#cimg{
		max-height: 15vh;
		/*max-width: 6vw;*/
	}
</style>

<?php include ('../sidebar.php');?>

<?php
   include ('scripts.php');
   include ('footer.php');

?>