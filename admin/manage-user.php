<?php
  include ('header.php');
  include ('navbar.php');
  if(isset($_GET['id'])){
    $id= $_GET['id'];
    if($_GET['status']=='delete'){
        //? delete user account
        $sql=$conn->query("DELETE FROM dlogin WHERE userid='$id'");
}}
?>

        <div class="page-wrapper">
          
            <div class="container-fluid">
               
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Manage Users </h4>
                    </div>
                    
                </div>
                
                <?php 
           
               $sql = $conn->query("SELECT * FROM dlogin ORDER BY id ");
          
                ?> 
                        <!-- table responsive -->
                        <div class="card">

                            <div class="card-body border-top border-info">
                               
                        <?php echo isset($_SESSION['mgss'])?$_SESSION['mgss']:""?>
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
                                                        <td><?php echo $row['flname']; ?></td>
                                                        <td><?php echo $row['email']; ?></td>
                                                        <td><?php echo $row['status']; ?></td>
                                             <td>                                                       
                            <?php if($row['status']=='user'){?>
                            <a href= "user-process.php?id=<?php echo
                            $row['userid']; ?>&status=ban " class="btn btn-primary btn-sm my-2">Ban</a>
                            <?php }else{ ?>
                            <a href="user-process.php?id=<?php echo
                            $row['userid']; ?>&status=unban " class="btn btn-warning btn-sm">Unban</a>
                            <?php } ?>
                            

                            <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModall<?php echo $row['userid'];?>" >Delete</a>
  
                                                        </td>
                                                        <div class="modal fade" id="exampleModall<?php echo $row['userid'];?>" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        <a href="manage-user.php?id=<?php echo $row['userid'];?>&status=delete" class="btn
                                                         btn-danger btn-sm" >Delete</a>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <?php }}else{ ?> 
                                                    <td colspan=7><span class="text-danger" style="color:red">No result Found</span> </td>
                                                    <?php }?>
                                                    </tr> 
                                                   
                                                </tbody>
                                               
                                            </table>
                                        </div>
                                    </div>         
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <?php
   include ('../sidebar.php');
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
   include ('scripts.php');
   include ('footer.php');

?>