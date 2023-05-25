<?php

// session_start();
include 'config.php';

// $password  = $_SESSION['password'];


// ($_SESSION['success'] !=true)? header("location:login.php"):'';
$branch_id = $_SESSION['branch_id'];

$email = $_SESSION['email'];

$sql = $conn->query("SELECT * FROM staffs WHERE branch_id='$branch_id' AND email='$email' ");
 if($sql->num_rows>0){
     
      $row = $sql->fetch_assoc();
      
    }
    
?>

<?php
// session_start();
  include ('header.php');
  include ('navbar.php');

//   include 'config.php';
  
?>
 <?php
include('manage-account.php');
?>
<div class="page-wrapper">

            <div class="container-fluid">

                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h2 class="text-themecolor">My profile</h2>
                    </div>
                </div> 
                <div class="row">
  
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"> Account Profile</h4>
                                <div class="table-responsive">
                                    <table class="table ">
                                        
                                        <tbody>
                                            
                                            <tr>
                                                <td><b>Full Name </b> :</td>
                                                <td>  <?php echo $row['flname']; ?>   </td>
                                            </tr>
                                            <tr>
                                                <td><b>Email </b> :</td>
                                                <td>   <?php echo $row['email']; ?>  </td>
                                            </tr>
                                            <tr>
                                                <td><b>Branch </b> :</td>
                                                <td>   <?php echo $row['branch']; ?>  </td>
                                            </tr>
                                            <tr>
                                                <td><b>Company Position</b> :</td>
                                                <td>   <?php switch ($row['job']) {
								case 'ceo':
									echo "<span class='badge badge-pill badge-info'>CEO</span>";
									break;
								case 'manager':
									echo "<span class='badge badge-pill badge-info'> MANAGER</span>";
									break;
								case 'driver':
									echo "<span class='badge badge-pill badge-primary'>DRIVING</span>";
									break;
								case 'accountant':
									echo "<span class='badge badge-pill badge-primary'>ACCOUNTANT</span>";
									break;
								case 'security':
									echo "<span class='badge badge-pill badge-primary'> SECURITY</span>";
									break;
								case 'receptionist':
									echo "<span class='badge badge-pill badge-primary'>RECEPTIONIST</span>";
									break;
								case 'ict_security':
									echo "<span class='badge badge-pill badge-success'>ICT SECURITY</span>";
									break;
								case 'gate_man':
									echo "<span class='badge badge-pill badge-success'> GATE MAN</span>";
									break;
								
							} ?>  </td>
                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</div>
</div>


<?php
  include ('sidebar.php');
  include ('scripts.php');
  include ('footer.php');
?>
