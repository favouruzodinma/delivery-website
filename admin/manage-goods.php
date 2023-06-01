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
                  if(isset($_GET['status'])){
                   $status= $_GET['status']; 
                   $sql = $conn->query("SELECT * FROM goods WHERE type ='$status' order by  id desc");
                }else{
                  $sql = $conn->query("SELECT * FROM goods  order by  id desc");

                }

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
                                  
                                  case 'Shipped':
                                    echo "<span class='badge badge-pill badge-info'> Shipped</span>";
                                    break;
                                  case 'In transit':
                                    echo "<span class='badge badge-pill badge-primary'> In-Transit</span>";
                                    break;
                                  case 'Arrived at destination':
                                    echo "<span class='badge badge-pill badge-primary'> Arrived At Destination</span>";
                                    break;
                                  case 'Out for delivery':
                                    echo "<span class='badge badge-pill badge-primary'> Out for Delivery</span>";
                                    break;
                                  case 'Ready to pickup':
                                    echo "<span class='badge badge-pill badge-primary'> Ready to Pickup</span>";
                                    break;
                                  case 'Delivered':
                                    echo "<span class='badge badge-pill badge-success'>Delivered</span>";
                                    break;
                                  case 'Picked up':
                                    echo "<span class='badge badge-pill badge-success'> Picked up</span>";
                                    break;
                                  case 'Unsuccessfull delivery':
                                    echo "<span class='badge badge-pill badge-danger'> Unsuccessfull Delivery Attempt</span>";
                                    break;
                                  
                                  
                                }

                                            ?></td>
                                            <?php //include ('view-goods.php'); ?>
                                                        <td>   
                                                        <a href="edit-goods.php?id=<?=  $row['id']; ?>&status=update" class="btn btn-info btn-flat " >Edit</a>
                                                        <a href="javascript:void(0)" class="btn btn-primary btn-flat "data-toggle="modal" data-target="#veiwgood<?php echo $row['id']?>">
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

                                    <!-- view goods modal  -->
                                    
<div class="modal fade" id="veiwgood<?php echo $row['id']?>" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div  class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Goods details</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="container-fluid">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-md-12">
				<div class="callout callout-info">
					<dl>
						<dt>Tracking Number:</dt>
						<dd> <h4><b><?php echo $row['reference_number'] ?></b></h4></dd>
					</dl>
				</div>
			</div>
		</div>
        <br>
		<div class="row">
			<div class="col-md-6">
				<div class="callout callout-info">
					<b class="border-bottom border-primary">Sender Information</b>
					<dl>
						<dt>Name:</dt>
						<dd><?php echo $row['sender_flname'] ?></dd>
						<dt>Address:</dt>
						<dd><?php echo $row['sender_address'] ?></dd>
						<dt>Contact:</dt>
						<dd><?php echo $row['sender_contact'] ?></dd>
					</dl>
				</div>
				<div class="callout callout-info">
					<b class="border-bottom border-primary">Recipient Information</b>
					<dl>
						<dt>Name:</dt>
						<dd><?php echo $row['recipient_flname'] ?></dd>
						<dt>Address:</dt>
						<dd><?php  echo $row['recipient_address'] ?></dd>
						<dt>Contact:</dt>
						<dd><?php echo $row['recipient_contact'] ?></dd>
					</dl>
				</div>
			</div>
			<div class="col-md-6">
				<div class="callout callout-info">
					<b class="border-bottom border-primary">Goods Details</b>
						<div class="row">
							<div class="col-sm-6">
								<dl>
									<dt>Weight:</dt>
									<dd><?php echo $row['weight'] ?></dd>
									<dt>Height:</dt>
									<dd><?php echo $row['height'] ?></dd>
									<dt>Price:</dt>
									<dd> &#8358; <?php echo $row['price'] ?></dd>
								</dl>	
							</div>
							<div class="col-sm-6">
								<dl>
									<dt>Width:</dt>
									<dd><?php echo $row['width'] ?></dd>
									<dt>length:</dt>
									<dd><?php echo $row['length'] ?></dd>
									<dt>Status:</dt>
									<dd><?php echo $row['type'] ?></dd>
								</dl>	
							</div>
						</div>
					<dl>
						<dt>Branch that Accepted the Goods:</dt>
						<dd><?php echo $row['from_branch_id'] ?></dd>
						<?php // if($type == 2): ?>
							<dt>Nearest Branch to Recipient for Pickup:</dt>
							<dd><?php echo $row['to_branch_id'] ?></dd>
						<?php// endif; ?>
						<dt>Status:</dt>
						<dd>
							<?php 
							switch ($row['type']) {
								case 'In transit':
									echo "<span class='badge badge-pill badge-info'> In transit</span>";
									break;
								case 'Shipped':
									echo "<span class='badge badge-pill badge-info'> Shipped</span>";
									break;
								case 'Arrived at destination':
									echo "<span class='badge badge-pill badge-primary'> Arrived at destination</span>";
									break;
								case 'Out for delivery':
									echo "<span class='badge badge-pill badge-primary'> Out for delivery</span>";
									break;
								case 'Ready to pickup':
									echo "<span class='badge badge-pill badge-primary'> Ready to pickup</span>";
									break;
								case 'Delivered':
									echo "<span class='badge badge-pill badge-primary'> Delivered </span>";
									break;
								case 'Picked up':
									echo "<span class='badge badge-pill badge-success'>Picked Up</span>";
									break;
								// case '':
								// 	echo "<span class='badge badge-pill badge-success'> Picked-up</span>";
								// 	break;
								case 'Unsuccessfull delivery':
									echo "<span class='badge badge-pill badge-danger'> Unsuccessfull Delivery Attempt</span>";
									break;
								
							// 	default:
							// 		echo "<span class='badge badge-pill badge-info'> Item Accepted by Courier</span>";
									
							// 		break;
							 }

							?>
							<span class="btn badge badge-success bg-gradient-success" id='update_type'  data-toggle="modal" data-target="#updatestatus<?php echo $row['id']?>"><i class=" icon-edit"></i> Update Status</span>
						</dd>

					</dl>
				</div>
			</div>
		</div>
	</div>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="updatestatus<?php echo $row['id']?>" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b> Update Status Of:<?php echo $row['reference_number'] ?></b></h5>
        <hr>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
            <form action="update.php" Method="POST">
            <!-- <label for="" class="control-label"></label> -->
            <select class="form-control" id="exampleFormControlSelect1" name="type">
               <option></option>
             <option <?php echo "Item collected"==$row['type']?"selected":''?> value="Item collected">item Collected </option>
             <option  <?php echo "Shipped"==$row['type']?"selected":''?> value="Shipped">Shipped</option>
              <option  <?php echo "In transit"==$row['type']?"selected":''?> value="In transit">In-transit</option>
              <option <?php echo "Arrived at destination"==$row['type']?"selected":''?>value="Arrived at destination">Arrived at destination</option>
               <option <?php echo "Out for delivery"==$row['type']?"selected":''?> value="Out for delivery">Out for delivery</option>
               <option <?php echo "Ready to pickup "==$row['type']?"selected":''?> value="Ready to pickup">Ready to pickup</option>
               <option  <?php echo "Delivered "==$row['type']?"selected":''?> value="Delivered">Delivered</option>
               <option <?php echo "Picked up"==$row['type']?"selected":''?> value="Picked up">Picked up</option>
               <option <?php echo "Unsuccessfull delivery"==$row['type']?"selected":''?>                                    
                value="Unsuccessfull delivery">Unsuccessfull delivery</option>
             </select>
             <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="updatebtn">Update</button>
            </div>
            </form>
       </div>
      </div>
      
    </div>
  </div>
</div>
                                    <!-- end of view goods modal  -->

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
