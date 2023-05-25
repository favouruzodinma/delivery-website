<?php
  include ('header.php');
  include ('navbar.php');

?>
        <div class="page-wrapper">

            <div class="container-fluid">
               
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor"> Manage Branch</h3>
                    </div>
              </div>
                <!-- ============================================================== -->
                <?php 
               $sql = $conn->query("SELECT * FROM dbranch ORDER BY id DESC");
               ?>
                        <!-- table responsive -->
      <div class="card">
          <div class="card-body">
              <div class="d-flex justify-content-end align-items-center">
                  <a href="" class="btn btn-outline-info" >
                    Create branch
                  </a>
            </div>     
            <h6 class="card-subtitle"></h6>
          <div class="table-responsive m-t-40">
              <table id="config-table" class="table display table-bordered table-striped no-wrap">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Branch_Code</th>
                      <th>Street/building</th>
                      <th>City/state/zip</th>
                      <th>Country</th>
                      <th>Contact</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                          <tbody>
                              <?php  if($sql->num_rows>0){
                                  $num=1;
                                while($row=$sql->fetch_assoc()){     
                            ?>
                              <tr id="1" class="gradeX">                                                     
                                  <td class="center"><?php echo $num++; ?></td>
                                  <td><?php echo $row['branch_code']; ?></td>
                                  <td><?php echo $row['street'] ; ?></td>
                                  <td><?php echo $row['city'].', '.$row['state'].', '.$row['zip_code']; ?></td>
                                  <td class="center"><?php echo $row['country']; ?></td>
                                  <td><?php echo $row['contact']; ?></td>
                                  <td>   
                                  <a href="edit-branch.php?id=<?=  $row['id']; ?>&status=update" class="btn btn-info btn-flat " >Edit</a>
                                <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModall" >Delete</a>
                                  </td>
                              </tr> 
                              <?php }}else{ ?> 
                                  <td colspan=7><span class="text-danger" style="color:red">No result Found</span> </td>
                                <?php }?>
                          </tbody>
                      </table>
                  </div>
          </div>         
      </div>
        </div>
    </div>
                <!-- ============================================================== -->
                <?php include ('../sidebar.php');?>

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

   include ('scripts.php');
   include ('footer.php');

?>
