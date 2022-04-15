<!-- head included  -->
<?php 
 $title = 'Warehouse';
  include('include/head.php');
  ?>
  <body>

  <div class="main-container d-flex">

      <?php $page = 'ware';
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
            </div>
          </div>

          <div class="col-12 mx-auto">
          <table class="table bg-white custab mt-4">
              <thead class="text-center">
                  <tr>
                    <th>Source</th>
                    <th>Logistics name</th>
                    <th>Weight</th>
                    <th>Type</th>
                    <th>Action</th>
                  </tr>
              </thead>
                  <tbody>
                      <tr class="text-center">
                        <td>City 1</td>
                        <td>abc</td>
                        <td>98 kg</td>
                        <td>xyz</td>
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
                        <td>City 2</td>
                        <td>abc</td>
                        <td>98 kg</td>
                        <td>xyz</td>
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
                        <td>City 3</td>
                        <td>abc</td>
                        <td>98 kg</td>
                        <td>xyz</td>
                        <td class="action">
                          <div class="outerDivFull" >
                          <div class="switchToggle">
                              <input type="checkbox" id="switch2">
                              <label for="switch2">Toggle</label>
                          </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
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