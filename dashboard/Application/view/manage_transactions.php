<?php

include 'header.php';
include 'sidebar.php';

?>

<div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <!-- [ breadcrumb ] start -->
           
                    <!-- [ breadcrumb ] end -->
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ Main Content ] start -->
                         
                            <div class="row">
                          
                                <div class="col-sm-11">
                                    
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Hover Table</h5>
                                            <span class="d-block m-t-5"></span>
                                        </div>
                                        <div class="card-block table-border-style">
                                            <div class="table-responsive">
                                            <button type="button" class="btn btn-outline-primary float-right" data-toggle="tooltip" id="btn">Add Transaction</button>
                                                <table class="table table-hover" id="table">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Amount</th>
                                                            <th>Type</th>
                                                            <th>Description</th>
                                                            <th>Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="tbody">
                                                      
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal" tabindex="-1" id="info-model">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-sm-12">
       <div class="alert alert-success d-none " role="alert">
        This is a success alert—check it out!
          </div>
     <div class="alert alert-danger d-none" role="alert">
        This is a danger alert—check it out!
         </div>

        </div>
        </div>
       
       <form action="" id="studentForm">
        <input type="hidden" name="update_id" id="update_id">
         <div class="form-group">
           <label for="">Amount</label>
           <input type="text" class="form-control" name="amount" class="amount" id="amount">
         </div>
         <div class="form-group">
           <label for="">Type</label>
           <select name="type" id="select" class="form-control">
             <option value="expence" name="expence">Expence</option>
             <option value="income" name="income">Income</option>
           </select>
          <!-- <select name="name" id="id" class="form-control">
          <option value="Income" name="income" id="income">Income</option>
          <option value="expence" name="expence" id="expence">Expence</option>
          </select> -->
         </div>
         <div class="form-group">
           <label for="">Description</label>
           <input type="text" class="form-control" name="description" class="description" id="description">
         </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="save">Save changes</button>
      </div>
    </div>
  </div>
</div>
  </div>
</div>

                                </div>
                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<?php

include 'footer.php';

?>

<!-- <script src="../js/lastone.js"></script> -->