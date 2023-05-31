<?php
  include ('header.php');
  include ('navbar.php');
?>
<div class="page-wrapper">
   <div class="container-fluid">
               <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Profile Page </h4>
                    </div>
                </div> 
        <?php 
        $branch_id = $_SESSION['branch_id'];
        $sql = $conn->query("SELECT * FROM staffs WHERE branch_id='$branch_id' ");
        if($sql->num_rows>0){
        while($row=$sql->fetch_assoc()){  
        
        ?>
        <div class="col-lg-6 col-xlg-3 col-md-5">
                <div class="card">
                    <div class="d-flex justify-content-end align-items-center my-3 mx-3">
                        <a href="settings.php"  >
                            Edit Profile
                        </a>
                    </div>
                    <div class="card-body">
                        <center class="m-t-30"> 
                            <img src="./assets/images/users/5.jpg" class="img-circle" width="150" />
                            <h4 class="card-title m-t-10"><?php echo $row['flname']; ?></h4>
                            <h6 class="card-subtitle">Status <span class='badge badge-pill badge-success'><?php echo $row['status']; ?> </span></h6>
                            
                        </center>
                    </div>
                    <div>
                        <hr> </div>
                    <div class="card-body">
                        <small class="text-muted p-t-30 db">Full Name</small>
                        <h6> <?php echo $row['flname']; ?> </h6>
                        <small class="text-muted">Email address </small>
                        <h6><?php echo $row['email']; ?></h6> 
                        <small class="text-muted p-t-30 db">Phone Number</small>
                        <h6><?php //echo $row['phone']; ?></h6>
                    </div>
                </div>
            </div>
        <?php }} ?> 
    </div>
</div>
<?php
  include ('../sidebar.php');
  include ('scripts.php');
  include ('footer.php');
?>
