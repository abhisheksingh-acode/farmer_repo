<!-- head included  -->
<?php 
 $title = 'Logistics History';
  include('include/head.php');
  ?>
  <body>

  <div class="main-container d-flex">

      <?php $page = 'logihis';
        include('include/sidebar.php');
        ?>

      <?php 
        include('include/header.php');
      ?>
      <div class=" main-content flex-wrap flex-md-nowrap p-4 px-5 ">
        <div class=" mx-5">
          <div class="col-12 uppercol my-1" style="height:fit-content;">
            <p>Logistics <span>/ History</span></p>
            <div class="d-flex justify-content-between" >
              <h4 class="text-nowrap">History</h4>
            </div>
          </div>

          <div class="col-12 mx-auto">
          <table class="table bg-white custab mt-4">
              <thead class="text-center">
                  <tr>
                    <th>Source</th>
                    <th>Destinations</th>
                    <th>Weight</th>
                    <th>Type</th>
                    <th>Timings</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
              </thead>
                  <tbody>
                      <tr class="text-center">
                        <td>City 1</td>
                        <td>City 2</td>
                        <td>98 kg</td>
                        <td>xyz</td>
                        <td>hh:mm</td>
                        <td>dd/mm/yyyy</td>
                        <td class="active text-center">
                          <div class="form-check form-switch p-0 d-flex justify-content-center align-items-center">
                            <input class="form-check-input m-0" type="checkbox" role="switch" id="flexSwitchCheckChecked" style="height: 20px; width:40px;" checked="">
                          </div>
                          <div class="deactive text-nowrap"><a href="#">Disapprove</a>  <a href="#">Approve</a></div>
                        </td>
                      </tr>
                      <tr>
                        <td>City 1</td>
                        <td>City 2</td>
                        <td>98 kg</td>
                        <td>xyz</td>
                        <td>hh:mm</td>
                        <td>dd/mm/yyyy</td>
                        <td class="active text-center">
                          <div class="form-check form-switch p-0 d-flex justify-content-center align-items-center">
                            <input class="form-check-input m-0" type="checkbox" role="switch" id="flexSwitchCheckChecked" style="height: 20px; width:40px;" checked="">
                          </div>
                          <div class="deactive text-nowrap"><a href="#">Disapprove</a>  <a href="#">Approve</a></div>
                        </td>
                      </tr>
                      <tr>
                        <td>City 1</td>
                        <td>City 2</td>
                        <td>98 kg</td>
                        <td>xyz</td>
                        <td>hh:mm</td>
                        <td>dd/mm/yyyy</td>
                        <td class="active text-center">
                          <div class="form-check form-switch p-0 d-flex justify-content-center align-items-center">
                            <input class="form-check-input m-0" type="checkbox" role="switch" id="flexSwitchCheckChecked" style="height: 20px; width:40px;" checked="">
                          </div>
                          <div class="deactive text-nowrap"><a href="#">Disapprove</a>  <a href="#">Approve</a></div>
                        </td>
                      </tr>
                      <tr>
                        <td>City 1</td>
                        <td>City 2</td>
                        <td>98 kg</td>
                        <td>xyz</td>
                        <td>hh:mm</td>
                        <td>dd/mm/yyyy</td>
                        <td class="active text-center">
                          <div class="form-check form-switch p-0 d-flex justify-content-center align-items-center">
                            <input class="form-check-input m-0" type="checkbox" role="switch" id="flexSwitchCheckChecked" style="height: 20px; width:40px;" checked="">
                          </div>
                          <div class="deactive text-nowrap"><a href="#">Disapprove</a>  <a href="#">Approve</a></div>
                        </td>
                      </tr>
                      <tr>
                        <td>City 1</td>
                        <td>City 2</td>
                        <td>98 kg</td>
                        <td>xyz</td>
                        <td>hh:mm</td>
                        <td>dd/mm/yyyy</td>
                        <td class="active text-center">
                          <div class="form-check form-switch p-0 d-flex justify-content-center align-items-center">
                            <input class="form-check-input m-0" type="checkbox" role="switch" id="flexSwitchCheckChecked" style="height: 20px; width:40px;" checked="">
                          </div>
                          <div class="deactive text-nowrap"><a href="#">Disapprove</a>  <a href="#">Approve</a></div>
                        </td>
                      </tr>
                  </tbody>
              </table>
          </div>
        </div>


      </div>
    

<?php
include('include/footer.php');
?>
  <?php 
  include('include/foot.php');
  ?>
