<?php
  include ('header.php');
  include ('navbar.php');
  if(isset($_GET['id'])){
  $id= $_GET['id'];
  if($_GET['status']=='delete'){
      //? delete user account
  $sql=$conn->query("DELETE FROM goods WHERE reference_number='$id'");
  }}
?>
        <div class="page-wrapper">
            
            <div class="container-fluid">
              
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Manage Goods</h3>
                    </div>
            </div>

                <?php 
                  $where="";
                  // $status= $_GET['status'];
                 if(isset($_GET['status'])){
                  $where = " where status = {$_GET['status']} ";
                }

                  $sql = $conn->query("SELECT * FROM goods $where order by  unix_timestamp(date_created) desc");
                 ?>
             
                        <!-- table responsive -->
                        <div class="card">

                            <div class="card-body">
                                          <div class="d-flex justify-content-end align-items-center">
                                            <a href="create-goods.php" class="btn btn-outline-info"> Add Goods</a>
                                          </div>
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
                                            <?php //include ('view-goods.php'); ?>
                                                        <td>   
                                                        <a href="edit-goods.php?id=<?=  $row['id']; ?>&status=update" class="btn btn-info btn-flat " >Edit</a>
                                                        <a href="#" class="btn btn-primary btn-flat "data-toggle="modal" data-target="#exampleModaly">
		                                                   view
		                                                 </a>
                                                        <a href="#" class="btn btn-danger " data-toggle="modal" data-target="#exampleModal<?php echo $row['reference_number'];?>"> Delete
                                                         </a>
                                                        </td>
                                                    </tr> 
                                    <div class="modal fade" id="exampleModal<?php echo $row['reference_number'];?>" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <a href="manage-goods.php?id=<?=  $row['reference_number']; ?>&status=delete" class="btn btn-danger btn-sm" >Delete</a>
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
                
                <?php
   include ('../sidebar.php');

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
