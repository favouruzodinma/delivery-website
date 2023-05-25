<!-- Modal -->
<?php


if (isset($_POST['updatebtn'])){
  $sql= $conn->query(" UPDATE INTO staffs SET branch_id='$branch_id', flname='$flname', email='$email', ");

}

?>
<div class="modal fade" id="exampleModalx" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" >
    <div class="modal-content" >
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"><b>Manage Account</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        
      <!-- <form class="m-t-40" novalidate action="create-staff.php" method="post"> -->
                                    <div class="form-group" >
                                        <form action="password.php" method="post">
                                        <h5>Full Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="flname" class="form-control" value=" <?php echo $row['flname'] ?>" >
                                            
                                       </div>
                                        <div class="form-control-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Email  <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="email" name="email" class="form-control" value=" <?php echo $row['email'] ?>" >
                                           
                                         </div>
                                    </div>
                                    
                                   
                                  
                                    <p><i>leave if you dont want to change anything </i></p>
                      <!-- </form> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" name="updatebtn">Update </button>
        
        </form>
      </div>
    </div>
  </div>
</div>