<?php 
 $title = 'Farmer';
  include('include/head.php');
  ?>
  <body>

  <div class="main-container d-flex">

       <?php $page = 'hist';
             include('include/sidebar.php');
        ?>

      <?php 
        include('include/header.php');
      ?>
      <div class=" main-content flex-wrap flex-md-nowrap p-4 ">
        <div class=" mx-5">
          <div class="col-12 uppercol my-1" style="height:fit-content;">
            <p>Warehouse<span>/ History</span></p>
            <div class="d-flex justify-content-between" >
              <h4 class="text-nowrap">History</h4>
            </div>
          </div>

          <div class="col-12 mx-auto mt-4" id="navscroll">
          <table class="table bg-white custab">
          <thead class="text-center">
                  <tr>
                    <th>Source</th>
                    <th>Logistics name</th>
                    <th>Weight</th>
                    <th>Type </th>
                    <th>Date</th>
                  </tr>
                </thead>
            <tbody class="text-center">
                <tbody class="text-center">
                  <tr>
                    <td>City 1</td>
                    <td>abc</td>
                    <td>98 kg</td>
                    <td>xyz</td>
                    <td>dd/mm/yyyy</td>
                  </tr>
                  <tr>
                    <td>City 5</td>
                    <td>abc</td>
                    <td>98 kg</td>
                    <td>xyz</td>
                    <td>dd/mm/yyyy</td>
                  </tr>
                  <tr>
                    <td>City 3</td>
                    <td>abc</td>
                    <td>98 kg</td>
                    <td>xyz</td>
                    <td>dd/mm/yyyy</td>
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