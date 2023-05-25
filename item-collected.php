
<?php


   if (isset ($_POST['register'])){

   }
?>
<?php if(!isset($conn)){ include 'config.php'; } ?>



<?php
  include ('header.php');
  include ('navbar.php');
//   isset($_SESSION['success'])? header("location:index4.php"):'';

?>

<?php
include('manage-account.php');
?>
        <div class="page-wrapper">

            <div class="container-fluid">

                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor"> Goods  Dashboard</h3>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            
                            <div class="container">
  
  

  
  
</div>
        </div>
           </div>
                </div>
                
                <?php 
               $sql = $conn->query("SELECT * FROM goods ORDER BY id DESC");
                ?> 
                        <!-- table responsive -->
                        <div class="card">

                            <div class="card-body">
                                <h4 class="card-title">Goods list </h4>
                                <h6 class="card-subtitle"></h6>
                                <!-- <div class="table-responsive m-t-40"> -->
     <br>
     <div>
                                                
                                                <button type="button" class="btn btn-info" >
                                             <a href="create-goods.php" style="color: white;"> Add Goods</a>
                                                </button>
                                           </div>
                                <hr class="card-footer border-top border-info">
                                            
                                <h6 class="card-subtitle"></h6>
                                <div class="table-responsive m-t-40">
                                    <table id="config-table" class="table display table-bordered table-striped no-wrap">
                                        <thead>
                                        <tr>
                                                <th>#</th>
                                                <th>Reference Number</th>
                                                <th>Sender Name</th>
                                                <th>Recipient Name</th>
                                                <th>Status</th>
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
                                                        <td><?php echo $row['reference_number']; ?></td>
                                                        <td><?php echo $row['sender_flname']; ?></td>
                                                        <td class="center"><?php echo $row['recipient_flname']; ?></td>
                                                        <td><span class='badge badge-pill badge-info'><?php echo $row['goods_default']; ?></span></td>
                                                         
                                                        <?php include ('view-collected-g.php'); ?>
                                                        <td>   
                                                        <a href="edit-goods.php?id=<?=  $row['id']; ?>&status=update" class="btn btn-info btn-flat " >Edit</a>
                                                        <a href="#" class="btn btn-primary btn-flat "data-toggle="modal" data-target="#exampleModalyz">
		                                                   view
		                                                 </a>
                                                        <a href="#" class="btn btn-danger " data-toggle="modal" data-target="#exampleModalz"> Delete
                                                         </a>
                                                        </td>
                                                    </tr> 
                                    <div class="modal fade" id="exampleModalz" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Comfirmation</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                          ARE YOU SURE YOU WANT TO DELETE THIS GOODS??

                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <a href="delg2.php?id=<?=  $row['id']; ?>&status=delete" class="btn btn-danger btn-sm" >Delete</a>
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
                <?php
   include ('sidebar.php');
  //  include ('footer.php');
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