
    
 <?php
  $email = $_SESSION['email'];
   

   $sql = $conn->query("SELECT * FROM admin WHERE email='$email'  ");
   if($sql->num_rows>0){

 $row = $sql->fetch_assoc();
}

?>        
<header class="topbar">
    
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
              
                <div class="navbar-header">
                    <a class="navbar-brand" href="dashboard.php">
                        <!-- Logo icon --><b>
                            
                            <!-- Dark Logo icon -->
                            <img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                       <span>
                         <!-- dark Logo text -->
                         <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                         <!-- Light Logo text -->    
                         <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> </a>
                </div>
               
                <div class="navbar-collapse">
                   
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                       
                        
                    </ul>
                    
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item right-side-toggle"> <a class="nav-link  waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li>
                    </ul>
                </div>
            </nav>
        </header>
      
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User Profile-->
                <div class="user-profile">
                    <div class="user-pro-body">                   
                        <div class="dropdown">
                     
                        <div>
                            <img src="<?php echo $row['user_img'] ?>" alt="Profile-img" class="img-circle">
                       
                        </div>
      
                            <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu" data-toggle="dropdown" role="button" aria-haspopup="true"
                                aria-expanded="false"> <?php echo $row['flname'] ?>
                                <span class="caret"></span>
                            </a>
                            
                            <div class="dropdown-menu animated flipInY">
                                <!-- text-->
                                <a href="../profile.php" class="dropdown-item">
                                    <i class="ti-user"></i> My Profile</a>
                                <!-- text-->
                                <!-- text-->
                                <div class="dropdown-divider"></div>
                                <!-- text-->
                                <a href="#" class="dropdown-item">
                                    <i class="ti-settings"></i> Manage Account</a>
                                <!-- text-->
                                <div class="dropdown-divider"></div>
                                <!-- text-->
                                <a href="../change-password.php" class="dropdown-item">
                                    <i class="ti-lock"></i> Change Password</a>
                                <!-- text-->
                                <div class="dropdown-divider"></div>
                                <!-- text-->
                                <a href="logout.php" class="dropdown-item">
                                    <i class="fa fa-power-off"></i> Logout</a>
                                <!-- text-->
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <a href="dashboard.php"><li class="nav-small-cap">_____DASHBOARD___</li></a>
                        <li>
                            <a class=" waves-effect waves-dark" href="manage-branch.php" >
                                <i class="icon-home"></i>
                                <span class="hide-menu">Manage Branch
                                    <span class="badge badge-pill badge-cyan ml-auto">2</span>
                                </span>
                            </a>
                        </li>
                        
                        <li>
                            <a class=" waves-effect waves-dark" href="manage-staff.php" >
                                <i class="ti-user"></i>
                                <span class="hide-menu">Manage Staffs
                                <span class="badge badge-pill badge-cyan ml-auto">2</span>

                                </span>
                            </a>
                        </li>
                       
                        <li>
                            <a class=" waves-effect waves-dark" href="manage-vehicle.php" >
                                <i class="ti-truck"></i>
                                <span class="hide-menu">Manage Vehicle
                                <span class="badge badge-pill badge-cyan ml-auto">2</span>
                                </span>
                            </a>
                        </li>
                       
                        <li>
                            <a class="waves-effect waves-dark" href="manage-user.php" aria-expanded="false">
                            <i class="ti-user"></i>
                                <span class="hide-menu">Manage Users</span>
                                <span class="badge badge-pill badge-cyan ml-auto">1</span>
                            </a>
                        </li>
                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="ti-gift"></i>
                                <span class="hide-menu">GOODS & SERVICES</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a href="manage-goods.php">Goods list</a>
                                </li>
                                <li>
                                    <a href="manage-goods.php?status=shipped">Shipped</a>
                                </li>
                                <li>
                                    <a href="manage-goods.php?status=in_transit">In-transit</a>
                                </li>
                                <li>
                                    <a href="manage-goods.php?status=out_for_delivery">Out For Delivery</a>
                                </li>
                                <li>
                                    <a href="manage-goods.php?status=arrived_at_destination">Arrived at Destination</a>
                                </li>
                                <li>
                                    <a href="manage-goods.php?status=ready_to_pick_up">Ready For PickUp</a>
                                </li>
                                <li>
                                    <a href="manage-goods.php?status=picked_up">Picked Up</a>
                                </li>
                                <li>
                                    <a href="manage-goods.php?status=delivered">Delivered</a>
                                </li>
                                <li>
                                    <a href="manage-goods.php?status=unsuccessfull_delivery">Unsuccessfull Delivery Attempt</a>
                                </li>
                              
                            </ul>
                        </li>
                        
                        <li class="nav-small-cap">_____SUPPORT_____</li>
                        
                        <li>
                            <a class="waves-effect waves-dark" href="../track.php" aria-expanded="false">
                            <i class="ti-search"></i>
                                <span class="hide-menu">TRACK GOODS</span>
                            </a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="../report.php" aria-expanded="false">
                                <i class="ti-folder"></i>
                                <span class="hide-menu">REPORTS</span>
                            </a>
                        </li>
                   

                    </ul>
                  
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>