<?php
  include ('header.php');
  include ('navbar.php');
?>
<div class="page-wrapper">

            <div class="container-fluid">

                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Manage account </h4>
                    </div>
                </div> 
                <?php 
                $userid = $_SESSION['userid'];
                $sql = $conn->query("SELECT * FROM admin  WHERE userid='$userid' ");
                if($sql->num_rows>0){
                while($row=$sql->fetch_assoc()){  
                
                ?>
                <div class="row">
                    <div class="col-lg-6 col-xlg-6 col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img src="../assets/images/users/5.jpg" class="img-circle" width="150" />
                                <button class="btn btn-outline-primary btn-flat">Upload new photo</button>
                                </center>
                            </div>
                            <div>
                                <hr> 
                                <small class="text-danger d-flex align-item-center pl-5">NB:Leave everything , if you dont want to change it!!!</small>
                            </div>
                            <div class="card-body">
                                    <form action="update.php"  method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <input type="hidden" name="userid" value="<?php echo $row['userid']; ?>">
                                                <div class="col-sm-12 form-group ">
                                                <h5>Full Name <span class="text-danger">*</span></h5>
                                                <input type="text" name="flname" value="<?php echo $row['flname']; ?>" id="" cols="30" rows="2" class="form-control" >
                                                </div>
                                                <div class="col-sm-12 form-group ">
                                                <h5>Email <span class="text-danger">*</span></h5>
                                                <input type="email" name="email" value="<?php echo $row['email']; ?>" id="" cols="30" rows="2" class="form-control" required>
                                                </div>
                                                <div class="col-sm-12 form-group ">
                                                <h5>Phone <span class="text-danger">*</span></h5>
                                                <input type="text" name="phone" value="<?php echo $row['phone']; ?>" id="" cols="30" rows="2" class="form-control" required>
                                                </div>
                                            </div>
                                            <button class="btn btn-outline-success btn-flat " type="submit" name="updateProfile">Update changes</button>
                                    </form>  
                            </div>
                        </div>
                    <div class="col-md-6">
                        <a href="#" class="btn btn-primary "  type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Change password</a>
                        <div class="card mt-3" style="width: 26rem;">

                                <div class="collapse" id="collapseExample">
                                    <div class="card card-body">
                                    <form action="update.php"  method="post" enctype="multipart/form-data">
                                        <div class="row">
                                                <div class="col-sm-12 form-group ">
                                                <h5>Old Password <span class="text-danger">*</span></h5>
                                                <input type="password" name="password" id="" cols="30" rows="2" class="form-control" >
                                                </div>
                                                <div class="col-sm-12 form-group ">
                                                <h5>New Password <span class="text-danger">*</span></h5>
                                                <input type="password" name="newpassword" id="" cols="30" rows="2" class="form-control" required>
                                                </div>
                                                <div class="col-sm-12 form-group ">
                                                <h5>Confirm New Password <span class="text-danger">*</span></h5>
                                                <input type="password" name="cnewpassword" id="" cols="30" rows="2" class="form-control" required>
                                                </div>
                                            </div>
                                            <button class="btn btn-outline-success btn-flat " type="submit" name="updatePass">Update Password</button>
                                    </form> 
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            <?php }} ?>  
         </div> 
    </div>
</div>
<?php
  include ('../sidebar.php');
  include ('scripts.php');
  include ('footer.php');
?>
