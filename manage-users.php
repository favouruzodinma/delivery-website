

<?php

isset($_SESSION['success'])? header("location:manage-users.php"):'';


?>
<?php if(!isset($conn)){ include 'config.php'; } ?>
<?php
  include ('header.php');
  include ('navbar.php');

?>

<?php
include('manage-account.php');
?>

        <div class="page-wrapper">
          
            <div class="container-fluid">
               
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Manage Users </h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                           
                            <div class="container">
  
  

  
  
                                 </div>
                          </div>
                      </div>
                </div>
                
                <?php 
           
               $sql = $conn->query("SELECT * FROM dlogin ORDER BY id ");
          
                ?> 
                        <!-- table responsive -->
                        <div class="card">

                            <div class="card-body border-top border-info">
                                <h5 class="card-title">Users list </h5>
                                <h6 class="card-subtitle"></h6>
                               
                        <?php echo isset($_SESSION['mgss'])?$_SESSION['mgss']:""?>
                                   
                               
                                <h6 class="card-subtitle"></h6>
                                <div class="table-responsive m-t-40">
                                    <table id="config-table" class="table display table-bordered table-striped no-wrap">
                                        <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Full Name</th>
                                                        <th>Email</th>
                                                        <th>status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                         <?php
                                                        if($sql->num_rows>0){
                                                            $num=1;

                                                   while($row=$sql->fetch_assoc()) { 
                                                        ?>
                                                    <tr id="1" class="gradeX">                                                     
                                                        <td class="center"><?php echo $num++; ?></td>
                                                        <td><?php echo $row['dflname']; ?></td>
                                                        <td><?php echo $row['demail']; ?></td>
                                                        <td><?php echo $row['dstatus']; ?></td>
                                             <td>                                                       
                            <?php if($row['dstatus']=='pending'){?>
                            <a href= "user-process.php?id=<?php echo
                            $row['userid']; ?>&status=ban " class="btn btn-primary  my-2">Ban</a>
                            <?php }else{ ?>
                            <a href="user-process.php?id=<?php echo
                            $row['userid']; ?>&status=unban " class="btn btn-warning btn-flat">Unban</a>
                            <?php } ?>
                            

                            <a href="#" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#exampleModallp" >Delete</a>
  
                                                        </td>
                                                        <div class="modal fade" id="exampleModallp" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Comfirmation</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    ARE YOU SURE YOU WANT TO DELETE THIS USER??

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <a href="user-process.php?id=<?php echo $row['userid'];?>&status=delete" class="btn
                                                         btn-danger btn-sm" >Delete</a>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                                    </tr> 
                                                    <?php }}?>
                                                </tbody>
                                               
                                            </table>
                                        </div>
                                    </div>         
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <?php
   include ('sidebar.php');
//    include ('footer.php');
             ?>
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
if(isset($_SESSION['mgs'])){
    unset($_SESSION['mgs']);
}
   include ('scripts.php');
   include ('footer.php');

?>