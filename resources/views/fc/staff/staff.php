<!-- head included  -->
<?php 
 $title = 'Staff Profile';
  include('include/head.php');
  ?>
  <body>

  <div class="main-container d-flex">

      <?php $page = 'payaloc';
        include('include/sidebar.php');
        ?>

      <?php 
        include('include/header.php');
      ?>
      <div class=" main-content flex-wrap flex-md-nowrap p-4 ">
        <div class=" mx-5">
          <div class="col-12 uppercol mt-5">
            <p>Staff <span>/ Staff Profile</span></p>
            <div class="d-flex justify-content-between" >
                <h4>Staff Profile</h4> 
              </div>
          </div>

          <!--filter start -->
          <div class="accordion accordion-flush mt-5" id="accordionFlushExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                  Filter
                </button>
              </h2>
              <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                <div class="col-12 mb-2">
                  <form class="row">
                    <div class="col-md-4 col-12 my-3">
                      <select class="form-select">
                        <option selected="">By Role</option>
                        <option value="1">Position 1</option>
                        <option value="2">Position 2</option>
                        <option value="3">Position 3</option>
                      </select>
                    </div>
                      </form>
                    
                    <div class="col-md-3 col-8 my-md-3 mx-auto">
                            <button type="submit" class="btn btn-primary col-12 mb-3">Filter</button>
                    </div>
                    
                </div>
                </div>
              </div>
            </div>
          </div>
          <!--filter end -->
         

            
          </div>

          <div class="col-12 mx-auto farm-supp mt-5">          
        <table class="table bg-white custab ">
              <thead class="text-center">
                  <tr>
                    <th>Unique ID</th>
                    <th>Name</th>
                    <th>Phone no.</th>
                    <th>Email ID</th>
                    <th>Date</th>
                    <th>Role</th>
                    <th>Action</th>
                  </tr>
              </thead>
                  <tbody>
                      <tr class="text-center">
                        <td>32135434</td>
                        <td>Mark</td>
                        <td>9886864864</td>
                        <td>mark@mdo</td>
                        <td>dd/mm/yyyy</td>
                        <td>
                          <div class="dropdown">
                            <a class="dropbtn">Add</a>
                            <div class="dropdown-content">
                            <a href="#">Admin</a>
                            <a href="#">Shop Manager</a>
                            <a href="#">Ecommerce Executive</a>
                            <a href="#">Vendor</a>
                            </div>
                          </div>
                        </td>
                        <td class="action">
                          <div class="outerDivFull">
                          <div class="switchToggle">
                              <input type="checkbox" id="switch">
                              <label for="switch">Toggle</label>
                          </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                      <td>32135434</td>
                        <td>Mark</td>
                        <td>9886864864</td>
                        <td>mark@mdo</td>
                        <td>dd/mm/yyyy</td>
                        <td>
                          <div class="dropdown">
                            <a class="dropbtn">Add</a>
                            <div class="dropdown-content">
                            <a href="#">Admin</a>
                            <a href="#">Shop Manager</a>
                            <a href="#">Ecommerce Executive</a>
                            <a href="#">Vendor</a>
                            </div>
                          </div>
                        </td>
                        <td class="action">
                          <div class="outerDivFull">
                          <div class="switchToggle">
                              <input type="checkbox" id="switch1">
                              <label for="switch1">Toggle</label>
                          </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                      <td>32135434</td>
                        <td>Mark</td>
                        <td>9886864864</td>
                        <td>mark@mdo</td>
                        <td>dd/mm/yyyy</td>
                        <td>
                          <div class="dropdown">
                            <a class="dropbtn">Add</a>
                            <div class="dropdown-content">
                            <a href="#">Admin</a>
                            <a href="#">Shop Manager</a>
                            <a href="#">Ecommerce Executive</a>
                            <a href="#">Vendor</a>
                            </div>
                          </div>
                        </td>
                        <td class="action">
                          <div class="outerDivFull">
                          <div class="switchToggle">
                              <input type="checkbox" id="switch2">
                              <label for="switch2">Toggle</label>
                          </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                      <td>32135434</td>
                        <td>Mark</td>
                        <td>9886864864</td>
                        <td>mark@mdo</td>
                        <td>dd/mm/yyyy</td>
                        <td>
                          <div class="dropdown">
                            <a class="dropbtn">Add</a>
                            <div class="dropdown-content">
                            <a href="#">Admin</a>
                            <a href="#">Shop Manager</a>
                            <a href="#">Ecommerce Executive</a>
                            <a href="#">Vendor</a>
                            </div>
                          </div>
                        </td>
                        <td class="action">
                          <div class="outerDivFull">
                          <div class="switchToggle">
                              <input type="checkbox" id="switch3">
                              <label for="switch3">Toggle</label>
                          </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                      <td>32135434</td>
                        <td>Mark</td>
                        <td>9886864864</td>
                        <td>mark@mdo</td>
                        <td>dd/mm/yyyy</td>
                        <td>
                          <div class="dropdown">
                            <a class="dropbtn">Add</a>
                            <div class="dropdown-content">
                            <a href="#">Admin</a>
                            <a href="#">Shop Manager</a>
                            <a href="#">Ecommerce Executive</a>
                            <a href="#">Vendor</a>
                            </div>
                          </div>
                        </td>
                        <td class="action">
                          <div class="outerDivFull">
                          <div class="switchToggle">
                              <input type="checkbox" id="switch4">
                              <label for="switch4">Toggle</label>
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