   
<!-- head included  -->
<?php 
 $title = 'Distributer';
  include('include/head.php');
  ?>
  <body>

  <div class="main-container d-flex">

      <?php $page = 'distributer';
        include('include/sidebar.php');
        ?>

      <?php 
        include('include/header.php');
      ?>
      <div class=" main-content flex-wrap flex-md-nowrap p-4 ">
        <div class=" mx-5">
          <div class="col-12 uppercol my-1" style="height:fit-content;">
            <p>Lead <span>/ Distributer</span></p>
            <h4>Distributer</h4>
          </div>

          <div class="col-12 mx-auto">
          <table class="table bg-white custab mt-5">
              <thead class="text-center">
                  <tr>
                    <th>Unique ID</th>
                    <th>Name</th>
                    <th>Phone no.</th>
                    <th>Email ID</th>
                    <th>Location</th>
                    <th>Budget</th>
                    <th>Land</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
              </thead>
                  <tbody>
                      <tr class="text-center">
                        <td>1</td>
                        <td>Mark</td>
                        <td>9886864864</td>
                        <td>mark@mdo</td>
                        <td>City 1</td>
                        <td>1234</td>
                        <td>1000 sq feet</td>
                        <td>dd/mm/yyyy</td>
                        <td class="action "><i class="fas fa-trash delete-icon text-danger"></i></td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Drak</td>
                        <td>9886864864</td>
                        <td>mark@mdo</td>
                        <td>City 1</td>
                        <td>1234</td>
                        <td>1000 sq feet</td>
                        <td>dd/mm/yyyy</td>
                        <td class="action "><i class="fas fa-trash delete-icon text-danger"></i></td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>Sam</td>
                        <td>9886864864</td>
                        <td>mark@mdo</td>
                        <td>City 1</td>
                        <td>1234</td>
                        <td>1000 sq feet</td>
                        <td>dd/mm/yyyy</td>
                        <td class="action "><i class="fas fa-trash delete-icon text-danger"></i></td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td>Sam</td>
                        <td>9886864864</td>
                        <td>mark@mdo</td>
                        <td>City 1</td>
                        <td>1234</td>
                        <td>1000 sq feet</td>
                        <td>dd/mm/yyyy</td>
                        <td class="action "><i class="fas fa-trash delete-icon text-danger"></i></td>
                      </tr>
                      <tr>
                        <td>5</td>
                        <td>Sam</td>
                        <td>9886864864</td>
                        <td>mark@mdo</td>
                        <td>City 1</td>
                        <td>1234</td>
                        <td>1000 sq feet</td>
                        <td>dd/mm/yyyy</td>
                        <td class="action "><i class="fas fa-trash delete-icon text-danger"></i></td>
                      </tr>
                  </tbody>
              </table>
          </div>
        </div>
    </div>


    
    </div>
        
        </div>
          
        
        
      
        <?php
include('include/footer.php');
?>
      
      <?php 
        include('include/foot.php');
        ?>