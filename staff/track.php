<?php
  include ('header.php');
  include ('navbar.php');
?>
<div class="page-wrapper">

            <div class="container-fluid">

                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h2 class="text-themecolor">Track </h2>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class=" border-top border-info">
                                <!-- <h4 class="card-title"> Account Profile</h4> -->
                             <div class="col-lg-12">
                                <div class="card card-primary">
                                    <div class="card-body">
                                        
                                    <div class="d-flex w-100 px-1 py-2 justify-content-center align-items-center">
                                            <label for="">Enter Tracking Number</label>
                                            <div class="input-group col-sm-5">
                                                <form action="" method="GET" class="d-flex ml-2">
                                                <input type="search" class="form-control form-control-sm px-5" name="reference_number" value="<?php echo isset($_GET['reference_number'])? $_GET['reference_number'] : '' ?> "/>
                                                <div class="input-group-append">
                                                    <button type="submit" name="search"  class="btn btn-sm btn-info btn-gradient-info">
                                                        <i class="ti-search"> </i>
                                                    </button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div> 
                     </div>
                 </div>
                 <div class="card">
                    <?php
                        if(isset($_GET['search'])){
                            $reference_number = $_GET['reference_number'];
                            $sql = $conn->query("SELECT * FROM goods WHERE reference_number='$reference_number' ");
                            if($sql->num_rows>0){
                                while($row=$sql->fetch_assoc()){
                    ?>
                    <div class="card-body">
                    <input type="hidden" name="reference_number" value="<?php echo $row['reference_number'];?>">
                    <ul class="timeline">
                                    <li>
                                        <div class="timeline-badge info">
                                            <i class="fa fa-save"></i>
                                        </div>
                                        <div class="timeline-panel">
                                            <div class="timeline-heading">
                                                <h4 class="timeline-title"><?php echo $row['goods_default'];?></h4>
                                            </div>
                                            <div class="timeline-body">
                                                <hr />
                                            </div>
                                        </div>
                                    </li>
                                    <li class="timeline-inverted">
                                        <div class="timeline-badge success">
                                            <i class="fa fa-graduation-cap"></i>
                                        </div>
                                        <div class="timeline-panel">
                                            <div class="timeline-heading">
                                                <h4 class="timeline-title"><?php echo $row['type'];?></h4>
                                            </div>
                                            <div class="timeline-body">
                                                <hr />
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                    </div>  
                    <?php }
                     }}else{ ?>
                        <!-- <h4 class="text-danger text-bold">No result found</h4> -->
                    <?php }?>    
                </div>
            </div>
        </div>
    </div>
</div>
 
<?php 
  include ('../sidebar.php');
  include ('scripts.php');
  include ('footer.php');
?>
