<?php
  include ('header.php');
  include ('navbar.php');
?>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor"><b>USER DASHBOARD</b></h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                           
                        </div>
                    </div>
                </div>
                
                <?php 
                $userid = $_SESSION['userid'];
                $sql = $conn->query("SELECT * FROM dlogin  WHERE userid='$userid' ");
                if($sql->num_rows>0){
                while($row=$sql->fetch_assoc()){  
                
                ?>
                <div class="card-body bg-light">
                    <input type="hidden" name="userid" value="<?php echo $row ['userid']?>">
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
                                            <h3><i class="icon-user"></i></h3>
                                            <p><a href="profile.php" class="text-muted">Profile</a></p>
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

            </div>
                <?php include ('sidebar.php');?>
                <!-- ============================================================== -->
            </div>
        </div>
     <?php

 include('scripts.php');
 include('footer.php');


?>