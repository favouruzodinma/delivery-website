

<?php

isset($_SESSION['success'])? header("location:dashboard.php"):'';

 //echo md5('12');
   if (isset ($_POST['register'])){
       include 'staff.php';
   }
//    include 'head.php'
?>
<?php if(!isset($conn)){ include 'config.php'; } ?>

<?php 

// if(isset($_GET['id'])){
// $branch = $conn->query("SELECT * FROM dbranch where id =".$_GET['id']);
// foreach($branch->fetch_array() as $k =>$v){
// 	$meta[$k] = $v;
// }
// }
?>

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
                        <h3 class="text-themecolor"> Branch  Dashboard</h3>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                           
                            <div class="container">
  
                 <?php 
               $sql = $conn->query("SELECT * FROM dbranch ORDER BY id DESC");
               ?> 

  
  
</div>
        </div>
           </div>
                </div>
                <!-- ============================================================== -->
               
                        <!-- table responsive -->
                        <div class="card">

                            <div class="card-body">
                                <h4 class="card-title">Branch list </h4>
                                <h6 class="card-subtitle"></h6>
                                <!-- <div class="table-responsive m-t-40"> -->
     <br>
                                            <div>
                                                
                                               <button type="button" class="btn btn-info" >
                                            <a href="create-branch.php" style="color: white;"> Create Branch</a>
                                               </button>
                                          </div>
                                <hr class="card-footer border-top border-info">
                                            <!-- <h6 class="card-subtitle">Just click on word which you want to change and enter</h6> -->
                                            
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
                                                         <?php
                                                  if($sql->num_rows>0){
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
                                                    
<div class="modal fade" id="exampleModall" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Comfirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       ARE YOU SURE YOU WANT TO DELETE THIS BRANCH??

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="branch-process.php?id=<?= $row['branch_code']; ?>&status=delete" class="btn btn-danger btn-sm" >Delete</a>
      </div>
    </div>
  </div>
</div>

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

<script>
	$(document).ready(function(){
		$('#list').dataTable()
		$('.view_branch').click(function(){
			uni_modal("branch's Details","view_branch.php?id="+$(this).attr('data-id'),"large")
		})
	$('.delete_branch').click(function(){
	_conf("Are you sure to delete this branch?","delete_branch",[$(this).attr('data-id')])
	})
	})
	function delete_branch($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_branch',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>