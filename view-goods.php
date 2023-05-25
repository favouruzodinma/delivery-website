<?php include ('manage-goods.php');

// $sql = $conn->query("SELECT * FROM goods where type ='$status'");
      

// if($sql->num_rows>0){
    
//      $row = $sql->fetch_assoc();
// }
?>
<div class="modal fade" id="exampleModaly" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
							switch ($status) {
								case 'in_transit':
									echo "<span class='badge badge-pill badge-info'> In-transit</span>";
									break;
								case 'shipped':
									echo "<span class='badge badge-pill badge-info'> Shipped</span>";
									break;
								case 'arrived_at_destination':
									echo "<span class='badge badge-pill badge-primary'> arrived_at_destination</span>";
									break;
								case 'out_for_delivery':
									echo "<span class='badge badge-pill badge-primary'> Out for delivery</span>";
									break;
								case 'ready_to_pick_up':
									echo "<span class='badge badge-pill badge-primary'> Ready to pickup</span>";
									break;
								case 'delivered':
									echo "<span class='badge badge-pill badge-primary'> Delivered </span>";
									break;
								case 'picked_up':
									echo "<span class='badge badge-pill badge-success'>Picked-Up</span>";
									break;
								// case '':
								// 	echo "<span class='badge badge-pill badge-success'> Picked-up</span>";
								// 	break;
								case 'unsuccessfull_delivery':
									echo "<span class='badge badge-pill badge-danger'> Unsuccessfull Delivery Attempt</span>";
									break;
								
							// 	default:
							// 		echo "<span class='badge badge-pill badge-info'> Item Accepted by Courier</span>";
									
							// 		break;
							 }

							?>
							<span class="btn badge badge-success bg-gradient-success" id='update_type'  data-toggle="modal" data-target="#exampleModalg"><i class=" icon-edit"></i> Update Status</span>
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

<div class="modal fade" id="exampleModalg" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            
            <!-- <label for="" class="control-label"></label> -->
            <select class="form-control" id="exampleFormControlSelect1" name="type">
               <option></option>
             <option <?php echo "item_collected"==$row['type']?"selected":''?> value="item_collected">item Collected </option>
             <option  <?php echo "shipped"==$row['type']?"selected":''?> value="shipped">Shipped</option>
              <option  <?php echo "in_transit"==$row['type']?"selected":''?> value="in_transit">In-transit</option>
              <option <?php echo "arrived_at_destination"==$row['type']?"selected":''?>value="arrived_at_destination">Arrived at destination</option>
               <option <?php echo "out_for_delivery"==$row['type']?"selected":''?> value="out_for_delivery">Out for delivery</option>
               <option <?php echo "ready_to_pick_up "==$row['type']?"selected":''?> value="ready_to_pick_up">Ready to pickup</option>
               <option  <?php echo "delivered "==$row['type']?"selected":''?> value="delivered">Delivered</option>
               <option <?php echo "picked_up "==$row['type']?"selected":''?> value="picked_up">Picked up</option>
               <option <?php echo "unsuccessfull_delivery"==$row['type']?"selected":''?>                                    
                value="unsuccessfull_delivery">Unsuccessfull delivery</option>
             </select>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" name="updatebtn">Update</button>
      </div>
    </div>
  </div>
</div>