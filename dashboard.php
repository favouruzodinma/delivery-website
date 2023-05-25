<?php 


if (isset($_SESSION['id']) && isset($_SESSION['flname'])) {
include "config.php";
//include 'edit-profile.php';

$user = getUserById($_SESSION['id'], $conn);
}
 ?>
<?php
//  include('config.php');
  include ('header.php');
  include ('navbar.php');

?>

        <div class="page-wrapper">
           
            <div class="container-fluid">
              
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <!-- <h4 class="text-themecolor"> Dashboard </h4> -->
                        <?php if($row['type'] == 1): ?>
                        <h4 class="text-themecolor"><b>ADMIN Dashboard</b></h4>
                        <?php else: ?>
                        <h4 class="text-themecolor"><b>STAFF Dashboard</b></h4>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                           
                        </div>
                    </div>
                </div>
                
<?php

include('manage-account.php');
?>
                       <?php if($row['type'] == 1){ ?>
               
          <div class="row">
                   
                        <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card">
                                            <div class="box bg-info text-center">
                                                <h1 class="font-light text-white"><?php echo $conn->query("SELECT * FROM dbranch") ->num_rows; ?></h1>
                                                <h6 class="text-white"><a href="branch-table.php" style="color:white ;">Total Branch</a></h6>
                                            </div>
                                        </div>
                         </div>
                           
                   
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card">
                                            <div class="box bg-info text-center">
                                                <h1 class="font-light text-white"><?php echo $conn->query("SELECT * FROM goods") ->num_rows; ?></h1>
                                                <h6 class="text-white"><a href="list-of-goods.php" style="color:white ;">Total Goods</a></h6>
                                            </div>
                                        </div>
                                    </div>
                   
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card">
                                            <div class="box bg-info text-center">
                                                <h1 class="font-light text-white"><?php echo $conn->query("SELECT * FROM staffs where type != 1") ->num_rows; ?></h1>
                                                <h6 class="text-white"><a href="staff-table.php" style="color:white ;">Total staffs</a></h6>
                                            </div>
                                        </div>
                                    </div>
                   
                   
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card">
                                            <div class="box bg-info text-center">
                                                <h1 class="font-light text-white"><?php echo $conn->query("SELECT * FROM vehicles") ->num_rows; ?></h1>
                                                <h6 class="text-white"><a href="vehicle-table.php" style="color:white ;"> Total Vehicle</a></h6>
                                            </div>
                                        </div>
                                    </div>
                    
                </div>
               

                <div class="row">
                   
                        <div class="col-md-6 col-lg-4 col-xlg-3">
                                        <div class="card">
                                            <div class="box bg-primary text-center">
                                                <h1 class="font-light text-white"><?php echo $conn->query("SELECT * FROM goods where goods_default = 'collected'") ->num_rows; ?></h1>
                                                <h6 class="text-white"><a href="item-collected.php" style="color:white ;">Item Collected</a></h6>
                                            </div>
                                        </div>
                                    </div>
                         
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                                        <div class="card">
                                            <div class="box bg-primary text-center">
                                                <h1 class="font-light text-white"><?php echo $conn->query("SELECT * FROM goods where type = 'shipped'") ->num_rows; ?></h1>
                                                <h6 class="text-white"><a href="list-of-goods.php?status=shipped" style="color:white ;">Shipped</a></h6>
                                            </div>
                                        </div>
                                    </div>
                   
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                                        <div class="card">
                                            <div class="box bg-primary text-center">
                                                <h1 class="font-light text-white"><?php echo $conn->query("SELECT * FROM goods where type = 'in_transit'") ->num_rows; ?></h1>
                                                <h6 class="text-white"><a href="list-of-goods.php?status=in_transit" style="color:white ;">In Transit</a></h6>
                                            </div>
                                        </div>
                                    </div>
                   
                   
                    
                    
                </div>

                 <div class="row">
                    
                        <div class="col-md-6 col-lg-4 col-xlg-3">
                                        <div class="card">
                                            <div class="box bg-info text-center">
                                                <h1 class="font-light text-white"><?php echo $conn->query("SELECT * FROM goods where type = 'arrived_at_destination'") ->num_rows; ?></h1>
                                                <h6 class="text-white"><a href="list-of-goods.php?status=arrived_at_destination" style="color:white ;">Arrived at Destination</a></h6>
                                            </div>
                                        </div>
                                    </div>
                           
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                                        <div class="card">
                                            <div class="box bg-info text-center">
                                                <h1 class="font-light text-white"><?php echo $conn->query("SELECT * FROM goods where type = 'out_for_delivery'") ->num_rows; ?></h1>
                                                <h6 class="text-white"><a href="list-of-goods.php?status=out_for_delivery" style="color:white ;">Out For Delivery</a></h6>
                                            </div>
                                        </div>
                                    </div>
                   
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                                        <div class="card">
                                            <div class="box bg-info text-center">
                                                <h1 class="font-light text-white"><?php echo $conn->query("SELECT * FROM goods where type = 'ready_to_pick_up'") ->num_rows; ?></h1>
                                                <h6 class="text-white"><a href="list-of-goods.php?status=ready_to_pick_up" style="color:white ;">Ready to Pickup</a></h6>
                                            </div>
                                        </div>
                                    </div>
                   
                   
                    
                    
                </div>
                <div class="row">
                  
                        <div class="col-md-6 col-lg-4 col-xlg-3">
                                        <div class="card">
                                            <div class="box bg-success text-center">
                                                <h1 class="font-light text-white"><?php echo $conn->query("SELECT * FROM goods where type = 'delivered'") ->num_rows; ?></h1>
                                                <h6 class="text-white"><a href="list-of-goods.php?status=delivered" style="color:white ;">Delivered</a></h6>
                                            </div>
                                        </div>
                                    </div>
                          
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                                        <div class="card">
                                            <div class="box bg-success text-center">
                                                <h1 class="font-light text-white"><?php echo $conn->query("SELECT * FROM goods where type = 'picked_up'") ->num_rows; ?></h1>
                                                <h6 class="text-white"><a href="list-of-goods.php?status=picked_up" style="color:white ;">Picked Up</a></h6>
                                            </div>
                                        </div>
                                    </div>
                   
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                                        <div class="card">
                                            <div class="box bg-danger text-center">
                                                <h1 class="font-light text-white"><?php echo $conn->query("SELECT * FROM goods where type = 'unsuccessfull_delivery'") ->num_rows; ?></h1>
                                                <h6 class="text-white"><a href="list-of-goods.php?status=unsuccessfull_delivery" style="color:white ;">Unsuccessful delivery</a></h6>
                                            </div>
                                        </div>
                                    </div>
                   
                   
                    
                   <?php }else{ ?>

<div class="row">
   
<div class="col-md-6 col-lg-4 col-xlg-3">
                                        <div class="card">
                                            <div class="box bg-primary text-center">
                                                <h1 class="font-light text-white"><?php echo $conn->query("SELECT * FROM goods where goods_default = 'collected'") ->num_rows; ?></h1>
                                                <h6 class="text-white"><a href="item-collected.php" style="color:white ;">Item Collected</a></h6>
                                            </div>
                                        </div>
                                    </div>
                         
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                                        <div class="card">
                                            <div class="box bg-primary text-center">
                                                <h1 class="font-light text-white"><?php echo $conn->query("SELECT * FROM goods where type = 'shipped'") ->num_rows; ?></h1>
                                                <h6 class="text-white"><a href="list-of-goods.php?status=shipped" style="color:white ;">Shipped</a></h6>
                                            </div>
                                        </div>
                                    </div>
                   
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                                        <div class="card">
                                            <div class="box bg-primary text-center">
                                                <h1 class="font-light text-white"><?php echo $conn->query("SELECT * FROM goods where type = 'in_transit'") ->num_rows; ?></h1>
                                                <h6 class="text-white"><a href="list-of-goods.php?status=in_transit" style="color:white ;">In Transit</a></h6>
                                            </div>
                                        </div>
                                    </div>
                   
                   
                    
                    
                </div>

                 <div class="row">
                    
                        <div class="col-md-6 col-lg-4 col-xlg-3">
                                        <div class="card">
                                            <div class="box bg-info text-center">
                                                <h1 class="font-light text-white"><?php echo $conn->query("SELECT * FROM goods where type = 'arrived_at_destination'") ->num_rows; ?></h1>
                                                <h6 class="text-white"><a href="list-of-goods.php?status=arrived_at_destination" style="color:white ;">Arrived at Destination</a></h6>
                                            </div>
                                        </div>
                                    </div>
                           
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                                        <div class="card">
                                            <div class="box bg-info text-center">
                                                <h1 class="font-light text-white"><?php echo $conn->query("SELECT * FROM goods where type = 'out_for_delivery'") ->num_rows; ?></h1>
                                                <h6 class="text-white"><a href="list-of-goods.php?status=out_for_delivery" style="color:white ;">Out For Delivery</a></h6>
                                            </div>
                                        </div>
                                    </div>
                   
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                                        <div class="card">
                                            <div class="box bg-info text-center">
                                                <h1 class="font-light text-white"><?php echo $conn->query("SELECT * FROM goods where type = 'ready_to_pick_up'") ->num_rows; ?></h1>
                                                <h6 class="text-white"><a href="list-of-goods.php?status=ready_to_pick_up" style="color:white ;">Ready to Pickup</a></h6>
                                            </div>
                                        </div>
                                    </div>
                   
                   
                    
                    
                </div>
                <div class="row">
                  
                        <div class="col-md-6 col-lg-4 col-xlg-3">
                                        <div class="card">
                                            <div class="box bg-success text-center">
                                                <h1 class="font-light text-white"><?php echo $conn->query("SELECT * FROM goods where type = 'delivered'") ->num_rows; ?></h1>
                                                <h6 class="text-white"><a href="list-of-goods.php?status=delivered" style="color:white ;">Delivered</a></h6>
                                            </div>
                                        </div>
                                    </div>
                          
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                                        <div class="card">
                                            <div class="box bg-success text-center">
                                                <h1 class="font-light text-white"><?php echo $conn->query("SELECT * FROM goods where type = 'picked_up'") ->num_rows; ?></h1>
                                                <h6 class="text-white"><a href="list-of-goods.php?status=picked_up" style="color:white ;">Picked Up</a></h6>
                                            </div>
                                        </div>
                                    </div>
                   
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                                        <div class="card">
                                            <div class="box bg-danger text-center">
                                                <h1 class="font-light text-white"><?php echo $conn->query("SELECT * FROM goods where type = 'unsuccessfull_delivery'") ->num_rows; ?></h1>
                                                <h6 class="text-white"><a href="list-of-goods.php?status=unsuccessfull_delivery" style="color:white ;">Unsuccessful delivery</a></h6>
                                            </div>
                                        </div>
                                    </div>
                   
   <?php }?>

                </div>
               
                   
                <?php include ('sidebar.php');

?>
                <!-- ============================================================== -->
            </div>
        </div>
     <?php

 include('scripts.php');
 include('footer.php');


?>