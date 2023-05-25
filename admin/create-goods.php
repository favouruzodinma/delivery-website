<?php
  include ('header.php');
  include ('navbar.php');

?>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Create Goods</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-end align-items-center my-3 mx-3">
                                    <a href="manage-goods.php" class="btn btn-outline-dark" >
                                        Back <i class="ti-arrow-right"></i>
                                    </a>
                                </div>
                                <hr class="card-footer border-top border-info">
                                <form action="action.php" method="POST">
                                  <input type="hidden" name="id" value="">
                                  <div class="row">
                                    <div class="col-md-6">
                                        <b>Sender Information</b>
                                        <div class="form-group">
                                          <label for="" class="control-label">Full Name</label>
                                          <input type="text" name="sender_flname" id="" class="form-control form-control-sm"  required>
                                        </div>
                                        <div class="form-group">
                                          <label for="" class="control-label">Address</label>
                                          <input type="text" name="sender_address" id="" class="form-control form-control-sm"  required>
                                        </div>
                                        <div class="form-group">
                                          <label for="" class="control-label">Contact #</label>
                                          <input type="text" name="sender_contact" id="" class="form-control form-control-sm"  required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <b>Recipient Information</b>
                                        <div class="form-group">
                                          <label for="" class="control-label">Full Name</label>
                                          <input type="text" name="recipient_flname" id="" class="form-control form-control-sm"  required>
                                        </div>
                                        <div class="form-group">
                                          <label for="" class="control-label">Address</label>
                                          <input type="text" name="recipient_address" id="" class="form-control form-control-sm" required>
                                        </div>
                                        <div class="form-group">
                                          <label for="" class="control-label">Contact #</label>
                                          <input type="text" name="recipient_contact" id="" class="form-control form-control-sm"  required>
                                        </div>
                                    </div>
                                  </div>
                                  <hr class="card-footer border-top border-info">
                                  <!-- <div class="switchery-demo m-b-30">
                                            <input type="checkbox"  data-on="Deliver" data-off="Pickup" checked class="js-switch" data-color="#009efb" />
                                    </div> -->
                                  <div class="col-md-12">
                                        <!-- <b>Recipient Information</b> -->
                                        
                                      <div class="row">
                                      <div class="col-sm-6 form-group ">
                                          <label for="" class="control-label">Branch From</label>
                                          <select name="from_branch_id" id="branch_id" class="form-control input-sm select2">
                                            <option value=""></option>
                                            <?php
                                              $dbranch = $conn->query("SELECT *,concat(street,', ',city,', ',state,', ',zip_code,', ',country) as from_branch_id FROM dbranch");
                                              while($row = $dbranch->fetch_assoc()):
                                            ?>
                                            <option value="<?php echo $row['from_branch_id'] ?>" <?php echo isset($branch_id) && $branch_id == $row['from_branch_id'] ? "selected":'' ?>><?php echo $row['branch_code']. ' | '.(ucwords($row['from_branch_id'])) ?></option>
                                          <?php endwhile; ?>
                                          </select>
                                        </div>
                                        <div class="col-sm-6 form-group ">
                                          <label for="" class="control-label">Branch To:</label>
                                          <select name="to_branch_id" id="branch_id" class="form-control input-sm select2">
                                            <option value=""></option>
                                            <?php
                                              $dbranch = $conn->query("SELECT *,concat(street,', ',city,', ',state,', ',zip_code,', ',country) as to_branch_id FROM dbranch");
                                              while($row = $dbranch->fetch_assoc()):
                                            ?>
                                            <option value="<?php echo $row['to_branch_id'] ?>" <?php echo isset($branch_id) && $branch_id == $row['to_branch_id'] ? "selected":'' ?>><?php echo $row['branch_code']. ' | '.(ucwords($row['to_branch_id'])) ?></option>
                                          <?php endwhile; ?>
                                          </select>
                                      </div>
                                      
                                  </div>
                                  <div class="form-group">
                                          <label for="" class="control-label">Select Process:</label>
                                          <select class="form-control" id="exampleFormControlSelect1" name="type">
                                            <option></option>
                                          <option name="item_collected">item_Collected </option>
                                          <option name="shipped">shipped</option>
                                            <option name="in_transit">in_transit</option>
                                            <option name="arrived_at_destination">arrived_at_destination</option>
                                            <option name="delivery">out_for_delivery</option>
                                            <option name="ready_to_pick_up">ready_to_pick_up</option>
                                            <option name="delivered">delivered</option>
                                            <option name="picked_up">picked_up</option>
                                            <option name="unsuccessfull_delivery">unsuccessfull_delivery</option>
                                          </select>
                                  </div>
                                <hr class="card-footer border-top border-info">
                                <h5><b>Goods Infomation</b></h5>
                                <br>
                                <div class="table-responsive m-t-40">
                                <table id="piscel_item" class="table display table-bordered table-striped no-wrap">
                                    <thead>
                                      <tr>
                                        <th>Weight</th>
                                        <th>Height</th>
                                        <th>Length</th>
                                        <th>Width</th>
                                        <th>Price</th>
                                        <?php if(!isset($id)): ?>
                                        <th></th>
                                      <?php endif; ?>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td><input type="text" name='weight' value="<?php echo isset($weight) ? $weight :'' ?>" required>
                                      
                                      </td>
                                        <td><input type="text" name='height' value="<?php echo isset($height) ? $height :'' ?>" required>
                                      
                                      </td>
                                        <td><input type="text" name='length' value="<?php echo isset($length) ? $length :'' ?>" required>
                                      
                                      </td>
                                        <td><input type="text" name='width' value="<?php echo isset($width) ? $width :'' ?>" required>
                                      
                                      </td>
                                        <td><input type="text"  class="text-right number" name='price' value="<?php echo isset($price) ? $price :'' ?>" required>
                                      
                                      </td>
                                        <?php if(!isset($id)): ?>
                                        <td><button class="btn btn-success" type="button" onclick="education_fields();">
                                                        <i class="fa fa-plus"></i>
                                                    </button></td>
                                        <?php endif; ?>
                                      </tr>
                                      <div id="education_fields"></div> 
                                    </tbody>
                                  
                                        <?php if(!isset($id)): ?>
                                    <tfoot>
                                      <th colspan="4" class="text-right">Total</th>
                                      <th class="text-right" id="tAmount"> &#8358;0.00</th>
                                      <th></th>
                                    </tfoot>
                                        <?php endif; ?>
                                  </table>
                                  </div>
                                  <?php if(!isset($id)): ?>
                                  <div class="row">
                                    <div class="col-md-12 d-flex justify-content-end">
                                      <!-- <button  class="btn btn-sm btn-primary bg-gradient-primary" type="button" ><i class="fa fa-item"></i> Add Item</button> -->
                                      <button class="btn-sm btn-primary mt-2" type="button" onclick="education_fields();">
                                                        <i class="icon-plus"></i>Add Item
                                         </button>
                                    </div>
                                  </div>
                                  <br>
                                        <?php endif; ?>
                              </div>
                              <div class="card-footer border-top border-info">
                                <div class="d-flex w-100 justify-content-center align-items-center">  
                                <button type="submit" class="btn btn-success" name="reg-goods">Save</button>
                                  <a class="btn btn-flat bg-danger mx-2" href="./index4.php?page=branch-table.php" style="color:white;">Cancel</a>
                                </div>
                              </div>
                         </form>

                            </div>
                        </div>
                    </div>
                </div>

                <?php
                include ('../sidebar.php')
                 ?>
               </div>
              
              </div>
 <?php
  include('scripts.php');
  include('footer.php');

 ?>