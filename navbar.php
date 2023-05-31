
    
 <?php
  include_once('config.php');
  $email = $_SESSION['email'];
   

   $sql = $conn->query("SELECT * FROM staffs WHERE email='$email'  ");
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
                            <img src="./assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="./assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                       <span>
                         <!-- dark Logo text -->
                         <img src="./assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                         <!-- Light Logo text -->    
                         <img src="./assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> </a>
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
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <a href="dashboard.php"><li class="nav-small-cap">_____DASHBOARD___</li></a>
                        <li>
                            <a class="waves-effect waves-dark" href="profile.php" aria-expanded="false">
                            <i class="ti-user"></i>
                                <span class="hide-menu">Profile</span>
                            </a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="setting.php" aria-expanded="false">
                            <i class="ti-settings"></i>
                                <span class="hide-menu">Manage Account</span>
                            </a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="track.php" aria-expanded="false">
                            <i class="ti-search"></i>
                                <span class="hide-menu">Track goods</span>
                            </a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="logout.php" aria-expanded="false">
                            <i class="icon-logout"></i>
                                <span class="hide-menu">Logout</span>
                            </a>
                        </li>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>