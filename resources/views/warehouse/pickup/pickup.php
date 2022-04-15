<?php 
 $title = 'Farmer';
  include('include/head.php');
  ?>
  <body>

  <div class="main-container d-flex">

        <?php $page = 'pick';
        include('include/sidebar.php');
        ?>

      <?php 
        include('include/header.php');
      ?>
      <div class=" main-content flex-wrap flex-md-nowrap p-4 ">
        <div class=" mx-5">
          <div class="col-12 uppercol my-1" style="height:fit-content;">
            <p>Warehouse <span>/ Request</span></p>
            <div class="d-flex justify-content-between" >
              <h4 class="text-nowrap">Request</h4>
              <div class="d-flex">
                <!-- <a class="btn btn-secondary request-add rounded-pill px-5 py-2 me-4">Add</a>   -->
                <a class="btn btn-primary px-5 py-2 me-4" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Add</a>
              </div>
            </div>
          </div>

           <!-- model start-->
           <div class="modal fade" id="exampleModalToggle" aria-hidden="true"
                    aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header" style="padding-left: 30px;">
                                <h5 class="modal-title" id="exampleModalLabel">Add Request</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                    style="
                            float: right;    font-size: 10px;"></button>
                            </div>
                            <div class="modal-body" style="padding: 20px 30px;">
                              <form class="col-12">
                                  <div class="my-3 col-12">
                                    <input type="text" class="form-control" placeholder="Source" />
                                  </div>
                                  <div class="my-3 col-12">
                                    <input type="text" class="form-control" placeholder="Logistics name" />
                                  </div>
                                  <div class="my-3 col-12">
                                    <input type="text" class="form-control" placeholder="Weight" />
                                  </div>
                                  <div class="my-3 col-12">
                                    <input type="text" class="form-control" placeholder="Type" />
                                  </div>
                                </form>
                            </div>
                            <div class="container row">
                                <div class="mb-3 col-9">
                                    <a href="#"
                                        class="btn btn-primary allocate-permission px-3 px-sm-5 pt-0 fs-4 py-0 my-2"
                                        style="
                                    padding: 5px 20px !important;font-size: 15px !important;float: right;background: #000 !important;color: #fff !important;">Cancel</a>
                                </div>
                                <div class="mb-3 col-3">
                                    <a href="#"
                                        class="btn btn-primary allocate-permission px-3 px-sm-5 pt-0 fs-4 py-0 my-2"
                                        style="
                                    float: right;padding: 5px 20px !important;
                                    font-size: 15px !important;background: #0d6efd !important;
                                    color: #fff !important; border-color: #0d6efd !important; ">Save</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- model end-->

          <div class="col-12 mx-auto" id="navscroll">
            <table class="table bg-white custab">
            <table class="table bg-white custab mt-5">
              <thead class="text-center">
                  <tr>
                    <th>Source</th>
                    <th>Logistics name</th>
                    <th>Weight</th>
                    <th>Type </th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                <tbody class="text-center">
                  <tr>
                    <td>City 1</td>
                    <td>abc</td>
                    <td>98 kg</td>
                    <td>xyz</td>
                    <td class="active text-center">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">Approved</option>
                        <option value="2">Disapproved</option>
                        <option value="3">Picked Up</option>
                      </select>
                      <!-- <div class="form-check form-switch p-0 d-flex justify-content-center align-items-center">
                      <a href="#" class="btn btn-info px-3 py-0 text-white" style="background: green;">Approved</a>
                      <a href="#" class="btn btn-info px-3 py-0 ms-1 text-white" style="background: red;">Disapproved</a>    
                     </div> -->
                      <!-- <div class="deactive text-nowrap"><a href="#">Disapprove</a>  <a href="#">Approve</a></div> -->
                    </td>
                  </tr>
                  <tr>
                    <td>City 5</td>
                    <td>abc</td>
                    <td>98 kg</td>
                    <td>xyz</td>
                    <td class="active text-center">
                      <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">Approved</option>
                        <option value="2">Disapproved</option>
                        <option value="3">Picked Up</option>
                      </select>
                      <!-- <div class="form-check form-switch p-0 d-flex justify-content-center align-items-center">
                      <a href="#" class="btn btn-info px-3 py-0 text-white" style="background: green;">Approved</a>
                      <a href="#" class="btn btn-info px-3 py-0 ms-1 text-white" style="background: red;">Disapproved</a>    
                     </div> -->
                      <!-- <div class="deactive text-nowrap"><a href="#">Disapprove</a>  <a href="#">Approve</a></div> -->
                    </td>
                  </tr>
                  <tr>
                    <td>City 3</td>
                    <td>abc</td>
                    <td>98 kg</td>
                    <td>xyz</td>
                    <td class="active text-center">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">Approved</option>
                        <option value="2">Disapproved</option>
                        <option value="3">Picked Up</option>
                      </select>
                      <!-- <div class="form-check form-switch p-0 d-flex justify-content-center align-items-center">
                      <a href="#" class="btn btn-info px-3 py-0 text-white" style="background: green;">Approved</a>
                      <a href="#" class="btn btn-info px-3 py-0 ms-1 text-white" style="background: red;">Disapproved</a>   
                     </div> -->
                      <!-- <div class="deactive text-nowrap"><a href="#">Disapprove</a>  <a href="#">Approve</a></div> -->
                    </td>
                  </tr>
                  <tr>
                    <td>City 5</td>
                    <td>abc</td>
                    <td>98 kg</td>
                    <td>xyz</td>
                    <td class="active text-center">
                      <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">Approved</option>
                        <option value="2">Disapproved</option>
                        <option value="3">Picked Up</option>
                      </select>
                      <!-- <div class="form-check form-switch p-0 d-flex justify-content-center align-items-center">
                      <a href="#" class="btn btn-info px-3 py-0 text-white" style="background: green;">Approved</a>
                      <a href="#" class="btn btn-info px-3 py-0 ms-1 text-white" style="background: red;">Disapproved</a>    
                     </div> -->
                      <!-- <div class="deactive text-nowrap"><a href="#">Disapprove</a>  <a href="#">Approve</a></div> -->
                    </td>
                  </tr>
                  <tr>
                    <td>City 5</td>
                    <td>abc</td>
                    <td>98 kg</td>
                    <td>xyz</td>
                    <td class="active text-center">
                      <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">Approved</option>
                        <option value="2">Disapproved</option>
                        <option value="3">Picked Up</option>
                      </select>
                      <!-- <div class="form-check form-switch p-0 d-flex justify-content-center align-items-center">
                      <a href="#" class="btn btn-info px-3 py-0 text-white" style="background: green;">Approved</a>
                      <a href="#" class="btn btn-info px-3 py-0 ms-1 text-white" style="background: red;">Disapproved</a>    
                     </div> -->
                      <!-- <div class="deactive text-nowrap"><a href="#">Disapprove</a>  <a href="#">Approve</a></div> -->
                    </td>
                  </tr>
                </tbody>
            </table>
          </div>
        </div>

        <!-- <div class="request-popup">
        <form class="col-11">
          <div class="my-3 col-12">
            <input type="text" class="form-control" placeholder="Source" />
          </div>
          <div class="my-3 col-12">
            <input type="text" class="form-control" placeholder="Logistics name" />
          </div>
          <div class="my-3 col-12">
            <input type="text" class="form-control" placeholder="Weight" />
          </div>
          <div class="my-3 col-12">
            <input type="text" class="form-control" placeholder="Type" />
          </div>
          <div class="d-flex justify-content-between">
            <a href="#" class="btn btn-primary request-permission px-3 px-sm-5 pt-0 fs-4 py-0">Save</a>
            <a href="#" class="btn btn-primary request-permission px-3 px-sm-5 pt-0 fs-4 py-0">Cancel</a>
          </div>
        </form>
      </div> -->

      </div>
    

<?php
include('include/footer.php');
?>
 

 <?php 
        include('include/foot.php');
        ?>