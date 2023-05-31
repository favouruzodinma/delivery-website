
<?php
//  include('config.php');
  include ('header.php');
  include ('navbar.php');

?>

        <div class="page-wrapper">
           
            <div class="container-fluid">
              
            <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Staff Dashboard</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                           <span>
                           <?php echo "Today is" . date(" D, d M Y") . "<br>";?>
                           </span>
                        </div>
                    </div>
                </div>
                <?php 
                $branch_id = $_SESSION['branch_id'];
                $sql = $conn->query("SELECT * FROM staffs  WHERE branch_id='$branch_id' ");
                if($sql->num_rows>0){
                while($row=$sql->fetch_assoc()){  
                
                ?>
                <div class="card-body bg-light">
                    <h5 class="card-title">
                      <strong class="text-dark text-bold">Welcome</strong> <b ><?php echo $row['flname']; ?> </b>
                    </h5>
                    <h5 class="card-text">
                    <tr>
                        <th><b>Email </b> :</th>
                        <td>  <?php echo $row['email']; ?>   </td>
                    </tr>
                </5>
                   <h5>
                   <tr>
                        <th><b>Status </b> :</th>
                        <td> <span class='badge badge-pill badge-success'><?php echo $row['status']; ?> </span>  </td>
                    </tr>
                   </h5>
                </div>
                <?php }} ?>

                <br>
                <div class="card-group">
                    </div>
                    <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                        <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-bag"></i></h3>
                                            <p><a href="manage-goods.php?status=shipped"  class="text-muted">Shipped</a></p>
                                        </div>
                                        <div class="ml-auto">
                                            <h2 class="counter text-primary"><?php echo $conn->query("SELECT * FROM goods where type = 'shipped'") ->num_rows; ?></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-note"></i></h3>
                                            <p><a href="manage-goods.php?status=in_transit" class="text-muted">In transit</a></p>
                                        </div>
                                        <div class="ml-auto">
                                            <h2 class="counter text-cyan"><?php echo $conn->query("SELECT * FROM goods where type = 'in_transit'") ->num_rows; ?></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-cyan" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-doc"></i></h3>
                                            <p ><a href="manage-goods.php?status=delivered" class="text-muted">Delivered</a></p>
                                        </div>
                                        <div class="ml-auto">
                                            <h2 class="counter text-purple"><?php echo $conn->query("SELECT * FROM goods where type = 'delivered'") ->num_rows; ?></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-purple" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-bag"></i></h3>
                                            <p class="text-muted"><a href="manage-goods.php?status=unsuccessfull_delivery">Unsuccessfull delivery</a></p>
                                        </div>
                                        <div class="ml-auto">
                                            <h2 class="counter text-danger"><?php echo $conn->query("SELECT * FROM goods where type = 'unsuccessfull_delivery'") ->num_rows; ?></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>
                    <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                        <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3> <i class="ti-search"></i></h3>
                                            <p><a href="track.php"  class="text-muted">Track</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-note"></i></h3>
                                            <p><a href="report.php" class="text-muted">Report</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-cyan" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-logout"></i></h3>
                                            <p ><a href="Logout.php" class="text-danger">Logout</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    </div>
                    </div>

                    </div>
                    
                   </div>
                    </div>  
                </div>
            </div>  
                <?php include ('../sidebar.php');?>
                <!-- ============================================================== -->
            </div>
        </div>
     <?php

 include('scripts.php');
 include('footer.php');


?>