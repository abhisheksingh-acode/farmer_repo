<!-- head included  -->
<?php 
 $title = 'Logistics Request';
  include('include/head.php');
  ?>
  <body>

  <div class="main-container d-flex">

      <?php $page = 'logipic';
        include('include/sidebar.php');
        ?>

      <?php 
        include('include/header.php');
      ?>
      <div class=" main-content flex-wrap flex-md-nowrap p-4 ">
        <div class=" mx-5">
          
            <div class="col-12 uppercol my-5 justify-content-between" >
              <p>Logistics <span>/ Request</span></p>
              <h4 class="text-nowrap">Logistics Pickup</h4>
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
                        <td class="action">
                          <div class="outerDivFull" >
                          <div class="switchToggle">
                              <input type="checkbox" id="switch">
                              <label for="switch">Toggle</label>
                          </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>City 1</td>
                        <td>City 2</td>
                        <td>98 kg</td>
                        <td>xyz</td>
                        <td>hh:mm</td>
                        <td>dd/mm/yyyy</td>
                        <td class="action">
                          <div class="outerDivFull" >
                          <div class="switchToggle">
                              <input type="checkbox" id="switch1">
                              <label for="switch1">Toggle</label>
                          </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>City 1</td>
                        <td>City 2</td>
                        <td>98 kg</td>
                        <td>xyz</td>
                        <td>hh:mm</td>
                        <td>dd/mm/yyyy</td>
                        <td class="action">
                          <div class="outerDivFull" >
                          <div class="switchToggle">
                              <input type="checkbox" id="switch2">
                              <label for="switch2">Toggle</label>
                          </div>
                          </div>
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