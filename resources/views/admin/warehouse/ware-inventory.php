<!-- head included  -->
<?php 
 $title = 'Warehouse Inventory';
  include('include/head.php');
  ?>
  <body>

  <div class="main-container d-flex">

      <?php $page = 'wareinv';
        include('include/sidebar.php');
        ?>

      <?php 
        include('include/header.php');
      ?>
      <div class=" main-content flex-wrap flex-md-nowrap p-4 ">
        <div class=" mx-5">
            <div class="col-12 uppercol mt-5">
                <p>Warehouse <span>/ Inventory</span></p>
                <h4>Inventory</h4>
            </div>
            <div class="col-12 row d-flex justify-content-around mb-2">
                <div class="drum col-11 mt-2 col-sm-5">
                    <div class="text-center">
                        <p class="m-0">Total number of drums</p>
                        <span>1235</span>
                    </div>
                    <div class="col-12 mt-2 text-center">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModals" style="padding: 5px 24px;">
                            Add Drum
                        </button>                    
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModals" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="    top: 174px;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Drum</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="
                                float: right; font-size: 10px;"></button>
                            </div>
                            <div class="modal-body" style="padding: 20px 30px;">
                            <form class="col-12">
                                <div class="my-3 col-12">
                                    <input type="text" class="form-control" placeholder="Quantity">
                                </div>
                                <div class="mb-3 col-12 ">
                                    <input type="text" class="form-control" placeholder="Source">
                                </div>
                                <div class="row mb-4 mx-0 px-0">
                                    <textarea placeholder="Comment" style="height: 80px;"></textarea>
                                </div>
                            </form>
                            </div>
                            <div class="container row">
                                <div class="mb-3 col-9">
                                    <a href="#" class="btn btn-primary allocate-permission px-3 px-sm-5 pt-0 fs-4 py-0 my-2" style="
                                        padding: 5px 20px !important;font-size: 15px !important;float: right;">Save</a>
                                </div>
                                <div class="mb-3 col-3">
                                    <a href="#" class="btn btn-primary allocate-permission px-3 px-sm-5 pt-0 fs-4 py-0 my-2" style="
                                        float: right;padding: 5px 20px !important;
                                        font-size: 15px !important;background: #0d6efd !important;
                                        color: #fff !important; border-color: #0d6efd !important; ">Cancel</a>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <!-- model end-->


                <div class="kg mt-2 col-11 col-sm-5">
                    <div class="text-center">
                        <p class="m-0">Total stock in Kg</p>
                        <span>1235</span>
                    </div>
                    <div class="col-12 mt-2 text-center">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="padding: 5px 24px;">
                            Add Kg
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="    top: 174px;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Kg</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="
                                float: right; font-size: 10px;"></button>
                            </div>
                            <div class="modal-body" style="padding: 20px 30px;">
                            <form class="col-12">
                                <div class="my-3 col-12">
                                    <input type="text" class="form-control" placeholder="Quantity">
                                </div>
                                <div class="mb-3 col-12 ">
                                    <input type="text" class="form-control" placeholder="Warehouse">
                                </div>
                                <div class="row mb-4 mx-0 px-0">
                                    <textarea placeholder="Comment" style="height: 80px;"></textarea>
                                </div>
                            </form>
                            </div>
                            <div class="container row">
                                <div class="mb-3 col-9">
                                    <a href="#" class="btn btn-primary allocate-permission px-3 px-sm-5 pt-0 fs-4 py-0 my-2" style="
                                        padding: 5px 20px !important;font-size: 15px !important;float: right;">Save</a>
                                </div>
                                <div class="mb-3 col-3">
                                    <a href="#" class="btn btn-primary allocate-permission px-3 px-sm-5 pt-0 fs-4 py-0 my-2" style="
                                        float: right;padding: 5px 20px !important;
                                        font-size: 15px !important;background: #0d6efd !important;
                                        color: #fff !important; border-color: #0d6efd !important; ">Cancel</a>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <!-- model end-->
                    </div>
                </div>
            </div>

          <!-- <div class="col-12 mx-auto xscroll">
          <table class="table bg-white custab mt-5">
              <thead class="text-center">
                  <tr>
                    <th> ID</th>
                    <th>Added by</th>
                    <th>Quantity</th>
                    <th>Source</th>
                    <th>Date</th>
                    <th>Drum ID</th>
                    <th>Comment</th>
                  </tr>
              </thead>
                  <tbody>
                    <tr>
                        <td>1235644584</td>
                        <td>Farmer</td>
                        <td>98</td>
                        <td><p class="m-0 p-0 mx-auto" style="width:150px">abc, district, state, pin</p></td>
                        <td>dd/mm/yyyy</td>
                        <td >
                            <ul class="" style="overflow-y:scroll; height:60px; list-style:none; text-align:left;">
                                <li>1355342</li>
                                <li>1355342</li>
                                <li>1355342</li>
                                <li>1355342</li>
                                <li>1355342</li>
                                <li>1355342</li>
                            </ul>
                        </td>
                        <td><textarea class="form-control mx-auto" id="exampleFormControlTextarea1" readonly style="width: 200px;"></textarea></td>
                    </tr>
                    <tr>
                        <td>1235644584</td>
                        <td>Farmer</td>
                        <td>98</td>
                        <td><p class="m-0 p-0 mx-auto" style="width:150px">abc, district, state, pin</p></td>
                        <td>dd/mm/yyyy</td>
                        <td >
                            <ul class="" style="overflow-y:scroll; height:60px; list-style:none; text-align:left;">
                                <li>1355342</li>
                                <li>1355342</li>
                                <li>1355342</li>
                                <li>1355342</li>
                                <li>1355342</li>
                                <li>1355342</li>
                            </ul>
                        </td>
                        <td><textarea class="form-control mx-auto" id="exampleFormControlTextarea1" readonly style="width: 200px;"></textarea></td>
                    </tr>
                    <tr>
                        <td>1235644584</td>
                        <td>Farmer</td>
                        <td>98</td>
                        <td><p class="m-0 p-0 mx-auto" style="width:150px">abc, district, state, pin</p></td>
                        <td>dd/mm/yyyy</td>
                        <td >
                            <ul class="" style="overflow-y:scroll; height:60px; list-style:none; text-align:left;">
                                <li>1355342</li>
                                <li>1355342</li>
                                <li>1355342</li>
                                <li>1355342</li>
                                <li>1355342</li>
                                <li>1355342</li>
                            </ul>
                        </td>
                        <td><textarea class="form-control mx-auto" id="exampleFormControlTextarea1" readonly style="width: 200px;"></textarea></td>
                    </tr>
                    <tr>
                        <td>1235644584</td>
                        <td>Farmer</td>
                        <td>98</td>
                        <td><p class="m-0 p-0 mx-auto" style="width:150px">abc, district, state, pin</p></td>
                        <td>dd/mm/yyyy</td>
                        <td >
                            <ul class="" style="overflow-y:scroll; height:60px; list-style:none; text-align:left;">
                                <li>1355342</li>
                                <li>1355342</li>
                                <li>1355342</li>
                                <li>1355342</li>
                                <li>1355342</li>
                                <li>1355342</li>
                            </ul>
                        </td>
                        <td><textarea class="form-control mx-auto" id="exampleFormControlTextarea1" readonly style="width: 200px;"></textarea></td>
                    </tr>
                    <tr>
                        <td>1235644584</td>
                        <td>Farmer</td>
                        <td>98</td>
                        <td><p class="m-0 p-0 mx-auto" style="width:150px">abc, district, state, pin</p></td>
                        <td>dd/mm/yyyy</td>
                        <td >
                            <ul class="" style="overflow-y:scroll; height:60px; list-style:none; text-align:left;">
                                <li>1355342</li>
                                <li>1355342</li>
                                <li>1355342</li>
                                <li>1355342</li>
                                <li>1355342</li>
                                <li>1355342</li>
                            </ul>
                        </td>
                        <td><textarea class="form-control mx-auto" id="exampleFormControlTextarea1" readonly style="width: 200px;"></textarea></td>
                    </tr>
                  </tbody>
              </table>
          </div> -->
        </div>
    </div>

    <!-- <div class="drum-popup">
        <form class="col-11">
            <div class="my-3 col-12">
                <input type="number" class="form-control" placeholder="No of Drums">
            </div>
            <div class="mb-3 col-12 ">
                <input type="text" class="form-control" placeholder="Source">
            </div>
            <div class="row mb-4 mx-0 px-0">
                <textarea placeholder="Comment" style="height: 80px;"></textarea>
            </div>
            <div class=" d-flex justify-content-between">
                <a href="#" class="btn btn-primary drum-permission rounded-pill px-3 px-sm-5 pt-0 fs-4 py-0">Save</a>
                <a href="#" class="btn btn-primary drum-permission rounded-pill px-3 px-sm-5 pt-0 fs-4 py-0">Cancel</a>
            </div>
        </form>
    </div>
    <div class="kg-popup">
    <form class="col-11">
            <div class="my-3 col-12">
                <input type="text" class="form-control" placeholder="Quantity">
            </div>
            <div class="mb-3 col-12 ">
                <input type="text" class="form-control" placeholder="Source">
            </div>
            <div class="row mb-4 mx-0 px-0">
                <textarea placeholder="Comment" style="height: 80px;"></textarea>
            </div>
            <div class=" d-flex justify-content-between">
                <a href="#" class="btn btn-primary kg-permission rounded-pill px-3 px-sm-5 pt-0 fs-4 py-0">Save</a>
                <a href="#" class="btn btn-primary kg-permission rounded-pill px-3 px-sm-5 pt-0 fs-4 py-0">Cancel</a>
            </div>
        </form>
    </div> -->
                                    
<?php
include('include/footer.php'); 
?>

<?php 
  include('include/foot.php');
  ?>