<?php

isset($_SESSION['success'])? header("location:dashboard.php"):'';

 
?>
<?php if(!isset($conn)){ include 'config.php'; } ?>

<?php 

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
                        <h3 class="text-themecolor"> Goods Dashboard</h3>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                          
                            <div class="container">
                      </div>
                    </div>
              </div>
            </div>

                <?php 
                
                 $status= $_GET['status'];

                  $sql = $conn->query("SELECT * FROM goods where type ='$status'");
             
                 ?>
             
                        <!-- table responsive -->
                        <div class="card">

                            <div class="card-body">
                                <h4 class="card-title">Goods list </h4>
                                <h6 class="card-subtitle"></h6>
                                <!-- <div class="table-responsive m-t-40"> -->
                                       <br>
                                            <div>
                                                
                                               <button type="button" class="btn btn-info" >
                                            <a href="create-goods.php" style="color: white;"> Add Goods</a>
                                               </button>
                                          </div>
                                <hr class="card-footer border-top border-info">
                                            
                                            
                                <h6 class="card-subtitle"></h6>
                                <div class="table-responsive m-t-40">
                                    <table id="config-table" class="table display table-bordered table-striped no-wrap">
                                        <thead>
                                        <tr>
                                                <th>#</th>
                                                <th>Reference Number</th>
                                                <th>Sender Name</th>
                                                <th>Recipient Name</th>
                                                <th>Status</th>
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
                                                       <td class="text-center"><?php echo $num++; ?></td>
						                                <td><b><?php echo $row['reference_number'] ?></b></td>
					                             	    <td><b><?php echo ucwords($row['sender_flname']) ?></b></td>
					                             	    <td><b><?php echo ucwords($row['recipient_flname']) ?></b></td>
                                                        <td><?php 
                                switch ($row['type']) {
                                  
                                  case 'shipped':
                                    echo "<span class='badge badge-pill badge-info'> Shipped</span>";
                                    break;
                                  case 'in_transit':
                                    echo "<span class='badge badge-pill badge-primary'> In-Transit</span>";
                                    break;
                                  case 'arrived_at_destination':
                                    echo "<span class='badge badge-pill badge-primary'> Arrived At Destination</span>";
                                    break;
                                  case 'out_for_delivery':
                                    echo "<span class='badge badge-pill badge-primary'> Out for Delivery</span>";
                                    break;
                                  case 'ready_to_pick_up':
                                    echo "<span class='badge badge-pill badge-primary'> Ready to Pickup</span>";
                                    break;
                                  case 'delivered':
                                    echo "<span class='badge badge-pill badge-success'>Delivered</span>";
                                    break;
                                  case 'picked_up':
                                    echo "<span class='badge badge-pill badge-success'> Picked-up</span>";
                                    break;
                                  case 'unsuccessfull_delivery':
                                    echo "<span class='badge badge-pill badge-danger'> Unsuccessfull Delivery Attempt</span>";
                                    break;
                                  
                                  
                                }

                                            ?></td>
                                            <?php include ('view-goods.php'); ?>
                                                        <td>   
                                                        <a href="edit-goods.php?id=<?=  $row['id']; ?>&status=update" class="btn btn-info btn-flat " >Edit</a>
                                                        <a href="#" class="btn btn-primary btn-flat "data-toggle="modal" data-target="#exampleModaly">
		                                                   view
		                                                 </a>
                                                        <a href="#" class="btn btn-danger " data-toggle="modal" data-target="#exampleModalz"> Delete
                                                         </a>
                                                        </td>
                                                    </tr> 
                                    <div class="modal fade" id="exampleModalz" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Comfirmation</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                          ARE YOU SURE YOU WANT TO DELETE THIS GOODS??

                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <a href="delg2.php?id=<?=  $row['id']; ?>&status=delete" class="btn btn-danger btn-sm" >Delete</a>
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
                
                <?php
   include ('sidebar.php');

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
if(isset($_SESSION['mgs'])){
    unset($_SESSION['mgs']);
}
   include ('scripts.php');
   include ('footer.php');

?>
