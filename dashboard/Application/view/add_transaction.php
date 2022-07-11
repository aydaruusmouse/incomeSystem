<?php

include 'header.php';
include 'sidebar.php';

?>
<div class="container" style="width: 70%; margin-left: 300px; ">
<div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ Main Content ] start -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Basic Componant</h5>
                                        </div>
                                        <div class="card-body">
                                        <div class="alert alert-success d-none " role="alert">
                                            <hr>
                                            This is a success alert—check it out!
                                              </div>
                                         <div class="alert alert-danger d-none" role="alert">
                                            This is a danger alert—check it out!
                                             </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <form id="studentForm" action="" >
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Amount</label>
                                                            <input type="text" class="form-control" id="amount" name="amount" placeholder="Enter Amount">
                                                            <small id="amount" class="form-text">Enter amount</small>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">Type</label>
                                                            <select class="form-control" name="type" id="exampleFormControlSelect1">
                                                                <option  value= "expence"name="expence">Expence</option>
                                                                <option  value="income" name="income">Income</option>
                                                               
                                                            </select>
                                                        </div>
                                                        <div class="form-group form-check">
                                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                                        </div>
                                                        <button type="button" class="btn btn-primary" id='btn1'>Submit</button>
                                                </div>
                                                <div class="col-md-6">
                                                    
                                                        
                                                        <div class="form-group">
                                                            <label for="exampleFormControlTextarea1">Description</label>
                                                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="6"></textarea>
                                                        </div>
                                                    </form>
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
<?php

include 'footer.php';

?>
