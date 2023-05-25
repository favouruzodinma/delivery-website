

<?php

isset($_SESSION['success'])? header("location:vehicle-table.php"):'';
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
                        <h2 class="text-themecolor">Vehicle list </h2>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                          
                            <div class="container">
  
  

  
  
                                </div>
                            </div>
                      </div>
                </div>
                <!-- ============================================================== -->
                <?php 
             $sql = $conn->query("SELECT * FROM vehicles ORDER BY id DESC");
                ?> 
                      
                        <div class="card">

                            <div class="card-body">
                                <h4 class="card-title">Vehicle list </h4>
                                <h6 class="card-subtitle"></h6>
                               
     <br>
                                            <div>
                                                
                                               <button type="button" class="btn btn-info" >
                                            <a href="create-vehicle.php" style="color: white;"> Add Vehicle</a>
                                               </button>
                                          </div>
                                <hr class="card-footer border-top border-info">

                                            
                                            
                                <h6 class="card-subtitle"></h6>
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
                                                         <a href="#" class="btn btn-danger " data-toggle="modal" data-target="#exampleModallp" >Delete</a>
                                                    </tr> 
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
                                                    ARE YOU SURE YOU WANT TO DELETE THIS VEHICLE??

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <a href="vehicle-table.php?id=<?=  $row['v_number']; ?>&status=delete" class="btn btn-danger btn-sm" >Delete</a>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                         <?php }}?> 
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


<?php
if(isset($_SESSION['mgs'])){
    unset($_SESSION['mgs']);
}
   include ('scripts.php');
   include ('footer.php');

?>