<!-- head included  -->
<?php 
 $title = 'Wallet';
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
            <div class="col-12 uppercol mt-5">
                <h4>Wallet</h4>
            </div>
            <div class="col-12 row d-flex justify-content-around mb-2">
                <div class="drum col-11 mt-2 col-sm-3">
                    <div class="text-center my-2">
                        <p class="m-0">Total Allocation</p>
                        <b>1000000</b>
                    </div>
                </div>
                <div class="kg mt-2 col-11 col-sm-3">
                    <div class="text-center my-2">
                        <p class="m-0">Total spent</p>
                        <b>800000</b>
                    </div>
                </div>
                <div class="kg mt-2 col-11 col-sm-3">
                    <div class="text-center my-2">
                        <p class="m-0">Total balance</p>
                        <b>200000</b>
                    </div>
                </div>
            </div>

          <div class="col-12 mx-auto xscroll">
            <table class="table bg-white custab">
                <thead>
                  <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Order ID</th> 
                    <th scope="col">Debited</th>
                    <th scope="col">To</th>
                    <th scope="col">Reference number</th>                    
                  </tr>
                </thead>
                <tbody>
                  <tr>
                      <td>dd/mm/yyyy</td>
                      <td>1235644584</td>
                      <td>98000</td>
                      <td>Ben</td>
                      <td>1453357326</td>
                  </tr>
                  <tr>
                      <td>dd/mm/yyyy</td>
                      <td>1235644584</td>
                      <td>75000</td>
                      <td>Sam</td>
                      <td>1453357326</td>
                  </tr><tr>
                      <td>dd/mm/yyyy</td>
                      <td>1235644584</td>
                      <td>80000</td>
                      <td>Drak</td>
                      <td>1453357326</td>
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