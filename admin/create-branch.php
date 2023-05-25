<?php
  include ('header.php');
  include ('navbar.php');
?>
       
        <div class="page-wrapper">
           
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Create Branch</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10">
                        <div class="card">
                            <div class="card-body">
                            <div class="d-flex justify-content-end align-items-center my-3 mx-3">
                                <a href="manage-branch.php" class="btn btn-outline-dark" >
                                    Back <i class="ti-arrow-right"></i>
                                </a>
                            </div>
                                <form action="action.php" id="manage-branch" method="post">
                                    <input type="hidden" name="id" value="">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div id="msg" class=""></div>

                                        <div class="row">
                                          <div class="col-sm-6 form-group ">
                                            <label for="" class="control-label">Street/Building</label>
                                            <textarea name="street" id="" cols="30" rows="2" class="form-control" required></textarea>
                                          </div>
                                          <div class="col-sm-6 form-group ">
                                            <label for="" class="control-label">City</label>
                                            <textarea name="city" id="" cols="30" rows="2" class="form-control" required></textarea>
                                          </div>
                                        </div>

                                        <div class="row">
                                          <div class="col-sm-6 form-group ">
                                            <label for="" class="control-label">State</label>
                                            <textarea name="state" id="" cols="30" rows="2" class="form-control" required></textarea>
                                          </div>
                                          <div class="col-sm-6 form-group ">
                                            <label for="" class="control-label">Zip Code/ Postal Code</label>
                                            <textarea name="zip_code" id="" cols="30" rows="2" class="form-control" required></textarea>
                                          </div>
                                        </div>

                                        <div class="row">
                                          <div class="col-sm-6 form-group ">
                                            <label for="" class="control-label">Country</label>
                                            <textarea name="country" id="" cols="30" rows="2" class="form-control" required></textarea>
                                          </div>
                                          <div class="col-sm-6 form-group ">
                                            <label for="" class="control-label">Contact #</label>
                                            <textarea name="contact" id="" cols="30" rows="2" class="form-control"></textarea>
                                          </div>
                                        </div>

                                      </div>
                                    </div>
                                    <div class="d-flex w-100 justify-content-center align-items-center">  
                                      <button type="submit" class="btn btn-outline-success w-100" name="reg-branch" >Save</button>
                                </div>
                                  </form>
                              </div>
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