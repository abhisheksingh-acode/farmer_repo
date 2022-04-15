<!-- head included  -->
<?php 
 $title = 'Logistics';
  include('include/head.php');
  ?>
  <body>

  <div class="main-container d-flex">

      <?php 
        include('include/sidebar.php');
        ?>

      <?php 
        include('include/header.php');
      ?>
      <div class=" main-content flex-wrap flex-md-nowrap p-4 ">
        <div class=" mx-5">
          <div class="col-12 uppercol my-1" style="height:fit-content;">
            <p>Logistics <span>/ History</span></p>
            <div class="d-flex justify-content-between" >
              <h4 class="text-nowrap">History</h4>
            </div>
          </div>

          <div class="col-12 mx-auto">
            <table class="table bg-white custab">
                <thead>
                  <tr>
                    <th scope="col">Source</th>
                    <th scope="col">Destinations</th>
                    <th scope="col">Weight</th>
                    <th scope="col">Type</th>
                    <th scope="col">Timings</th>
                    <th scope="col">Date</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>City 1</td>
                    <td><p>City 2</p></td>
                    <td>98 kg</td>
                    <td>xyz</td>
                    <td>hh:mm</td>
                    <td>dd/mm/yyyy</td>
                  </tr>
                  <tr>
                    <td>City 5</td>
                    <td><p>City 6</p></td>
                    <td>98 kg</td>
                    <td>xyz</td>
                    <td>hh:mm</td>
                    <td>dd/mm/yyyy</td>
                  </tr>
                  <tr>
                    <td>City 3</td>
                    <td><p>City 4</p></td>
                    <td>98 kg</td>
                    <td>xyz</td>
                    <td>hh:mm</td>
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
