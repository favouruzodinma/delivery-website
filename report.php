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
                        <h3 class="text-themecolor">Report Dashboard</h3>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                          
                            <div class="container">
                      </div>
                    </div>
              </div>
            </div>

               
             
                        <!-- table responsive -->
                      
                        <div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">
			<div class="d-flex w-100 px-1 py-2 justify-content-center align-items-center">
			
				<label for="date_from" class="mx-1">Status</label>
				<select name="" id="status" class="custom-select custom-select-sm col-sm-3">
        <option></option>
                 <option <?php echo "item_collected"==$row['type']?"selected":''?> value="item_collected">item Collected </option>
                 <option  <?php echo "shipped"==$row['type']?"selected":''?> value="shipped">Shipped</option>
                  <option  <?php echo "in_transit"==$row['type']?"selected":''?> value="in_transit">In-transit</option>
                  <option <?php echo "arrived_at_destination"==$row['type']?"selected":''?>value="arrived_at_destination">Arrived at destination</option>
                   <option <?php echo "out_for_delivery"==$row['type']?"selected":''?> value="out_for_delivery">Out for delivery</option>
                   <option <?php echo "ready_to_pick_up "==$row['type']?"selected":''?> value="ready_to_pick_up">Ready to pickup</option>
                   <option  <?php echo "delivered"==$row['type']?"selected":''?> value="delivered">Delivered</option>
                   <option <?php echo "picked_up"==$row['type']?"selected":''?> value="picked_up">Picked up</option>
<option <?php echo "unsuccessfull_delivery"==$row['type']?"selected":''?> value="unsuccessfull_delivery">Unsuccessfull delivery</option>
				</select>
				<label for="date_from" class="mx-1">From</label>
                <input type="date" id="date_from" class="form-control form-control-sm col-sm-3" value="<?php echo isset($_GET['date_from']) ? date("Y-m-d",strtotime($_GET['date_from'])) : '' ?>">
                <label for="date_to" class="mx-1">To</label>
                <input type="date" id="date_to" class="form-control form-control-sm col-sm-3" value="<?php echo isset($_GET['date_to']) ? date("Y-m-d",strtotime($_GET['date_to'])) : '' ?>">
                <button class="btn btn-sm btn-primary mx-1 bg-gradient-primary" type="button" id='view_report'>View Report</button>
			</div>
		</div>
	</div>


     <div class="row">
		<div class="col-md-12 ">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
        					<button type="button" class="btn btn-success float-right" style="display: none" id="print"><i class="fa fa-print"></i> Print</button>
						</div>
					</div>	
					<div class="table-responsive m-t-40">
					<table class="table table-bordered" id="report-list">
						<thead>
							<tr>
								<th>#</th>
								<th>Date</th>
								<th>Sender</th>
								<th>Recepient</th>
								<th>Amount</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							
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
