<?php 
 $title = 'Farmer';
  include('include/head.php');
  ?>
  <body>

  <div class="main-container d-flex">

      <?php $page = 'Pickup';
        include('include/sidebar.php');
        ?>

      <?php 
        include('include/header.php');
      ?>
      <div class=" main-content flex-wrap flex-md-nowrap p-4 ">
        <div class=" mx-5">
          
            <div class="col-12 uppercol my-5 d-flex justify-content-between" >
              <h4 class="text-nowrap">Logistics Pickup</h4>
              <div class="d-flex ms-2 mx-sm-5">
                <!-- <a class="btn btn-secondary request-add rounded-pill px-5 py-2 me-4" style="height:42px;">Add</a>   -->
                <!-- <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Add</a> -->
                <a class="btn btn-primary ms-2" role="button">Print All</a>
              </div>
            </div>

             <!-- model start-->
             <div class="modal fade" id="exampleModalToggle" aria-hidden="true"
                    aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header" style="padding-left: 30px;">
                                <h5 class="modal-title" id="exampleModalLabel">Logistics Pickup</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                    style="
                            float: right;    font-size: 10px;"></button>
                            </div>
                            <div class="modal-body" style="padding: 20px 30px;">
                            <form class="col-12">
                                <div class="my-3 col-12">
                                  <input type="text" class="form-control" placeholder="Facilitator Center" />
                                </div>
                                <div class="my-3 col-12">
                                  <input type="text" class="form-control" placeholder="Warehouse" />
                                </div>
                                <div class="my-3 col-12">
                                  <input type="text" class="form-control" placeholder="Weight" />
                                </div>
                                <div class="my-3 col-12">
                                  <input type="text" class="form-control" placeholder="Type" />
                                </div>
                                <div class=" my-3 d-flex">
                                  <div class="col-5">
                                    <label>Pickup Time</label>
                                  </div>
                                  <div class="col-7">
                                    <input type="time" class="form-control"/>
                                  </div>
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
            <table class="table bg-white custab mt-5">
              <thead class="text-center">
                  <tr>
                    <th>Facilitator Center</th>
                    <th>Warehouse</th>
                    <th>Weight</th>
                    <!-- <th>Type </th> -->
                    <th>9r No</th>
                    <th>Timings</th>
                    <th>Date</th>
                    <th>Action</th>
                    <th>Print</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                  <tr>
                    <td>F.C 1</td>
                    <td>Warehouse 1</td>
                    <td>98 kg</td>
                    <!-- <td>xyz</td> -->
                    <td>222</td>
                    <td>hh:mm</td>
                    <td>dd/mm/yyyy</td>
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
                    <td><a href="#"><i class="fa-solid fa-print"></i></a></td>
                  </tr>
                  <tr>
                    <td>F.C 2</td>
                    <td>Warehouse 2</td>
                    <td>98 kg</td>
                    <!-- <td>xyz</td> -->
                    <td>222</td>
                    <td>hh:mm</td>
                    <td>dd/mm/yyyy</td>
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
                    <td><a href="#"><i class="fa-solid fa-print"></i></a></td>
                  </tr>
                  <tr>
                    <td>F.C 3</td>
                    <td>Warehouse 3</td>
                    <td>98 kg</td>
                    <!-- <td>xyz</td> -->
                    <td>222</td>
                    <td>hh:mm</td>
                    <td>dd/mm/yyyy</td>
                    <td class="active text-center">
                    <!-- <div class="status_approval">
                      <a class="btn dropdown_btn border">select</a>
                        <ul class="dropdown_menu p-2" aria-labelledby="dropdownMenuButton1">
                          <li><a></a></li>
                          <li><a class="disapprove"></a></li>
                          <li><a></a></li>
                        </ul>
                    </div> -->
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
                    <td><a href="#"><i class="fa-solid fa-print"></i></a></td>
                  </tr>
                  <tr>
                    <td>F.C 2</td>
                    <td>Warehouse 2</td>
                    <td>98 kg</td>
                    <!-- <td>xyz</td> -->
                    <td>222</td>
                    <td>hh:mm</td>
                    <td>dd/mm/yyyy</td>
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
                    <td><a href="#"><i class="fa-solid fa-print"></i></a></td>
                  </tr>
                  <tr>
                    <td>F.C 2</td>
                    <td>Warehouse 2</td>
                    <td>98 kg</td>
                    <!-- <td>xyz</td> -->
                    <td>222</td>
                    <td>hh:mm</td>
                    <td>dd/mm/yyyy</td>
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
                    <td><a href="#"><i class="fa-solid fa-print"></i></a></td>
                  </tr>
                  <tr>
                    <td>F.C 2</td>
                    <td>Warehouse 2</td>
                    <td>98 kg</td>
                    <!-- <td>xyz</td> -->
                    <td>222</td>
                    <td>hh:mm</td>
                    <td>dd/mm/yyyy</td>
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
                    <td><a href="#"><i class="fa-solid fa-print"></i></a></td>
                  </tr>
                  <tr>
                    <td>F.C 2</td>
                    <td>Warehouse 2</td>
                    <td>98 kg</td>
                    <!-- <td>xyz</td> -->
                    <td>222</td>
                    <td>hh:mm</td>
                    <td>dd/mm/yyyy</td>
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
                    <td><a href="#"><i class="fa-solid fa-print"></i></a></td>
                  </tr>
                  <tr>
                    <td>F.C 2</td>
                    <td>Warehouse 2</td>
                    <td>98 kg</td>
                    <!-- <td>xyz</td> -->
                    <td>222</td>
                    <td>hh:mm</td>
                    <td>dd/mm/yyyy</td>
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
                    <td><a href="#"><i class="fa-solid fa-print"></i></a></td>
                  </tr>
                </tbody>
            </table>
          </div>
        </div>

      <!-- <div class="request-popup">
        <form class="col-11">
          <div class="my-3 col-12">
            <input type="text" class="form-control" placeholder="Facilitator Center" />
          </div>
          <div class="my-3 col-12">
            <input type="text" class="form-control" placeholder="Warehouse" />
          </div>
          <div class="my-3 col-12">
            <input type="text" class="form-control" placeholder="Weight" />
          </div>
          <div class="my-3 col-12">
            <input type="text" class="form-control" placeholder="Type" />
          </div>
          <div class=" my-3 d-flex">
            <div class="col-5">
              <label>Pickup Time</label>
            </div>
            <div class="col-7">
              <input type="time" class="form-control"/>
            </div>
          </div>
            <div class="d-flex justify-content-between">
            <a href="#" class="btn btn-primary request-permission rounded-pill px-3 px-sm-5 pt-0 fs-4 py-0">Save</a>
            <a href="#" class="btn btn-primary request-permission rounded-pill px-3 px-sm-5 pt-0 fs-4 py-0">Cancel</a>
          </div>
        </form>
      </div> -->

      </div>


    
      <!-- <div class="reason p-2">
        <select class="form-select mt-4 mb-2" aria-label="Default select example">
          <option selected>Reason</option>
          <option value="1">Limited Quantity</option>
        </select>
        <a href="#" class="btn save px-5 mx-4">Save</a>
      </div> -->

<?php
include('include/footer.php');
?>
  <?php 
        include('include/foot.php');
        ?>
