<div class="dropdown col-12 col-md-3 my-3">
  <button class="btn btn-dark col-12 dropdown" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown">
    Location
  </button>
  <ul class="dropdown-menu " style="height: 320px; overflow-Y:scroll;" aria-labelledby="dropdownMenuButton1">
    
  <?php
  
  $states = array(
    "Andaman and Nicobar Islands"=> "AN",
    "Andhra Pradesh"=> "AP",
    "Arunachal Pradesh"=> "AR",
    "Assam"=> "AS",
    "Bihar"=> "BR",
    "Chandigarh"=> "CG",
    "Chhattisgarh"=> "CH",
    "Dadra and Nagar Haveli"=> "DH",
    "Daman and Diu"=> "DD",
    "Delhi"=> "DL",
    "Goa"=> "GA",
    "Gujarat"=> "GJ",
    "Haryana"=> "HR",
    "Himachal Pradesh"=> "HP",
    "Jammu and Kashmir"=> "JK",
    "Jharkhand"=> "JH",
    "Karnataka"=> "KA",
    "Kerala"=> "KL",
    "Lakshadweep"=> "LD",
    "Madhya Pradesh"=> "MP",
    "Maharashtra"=> "MH",
    "Manipur"=> "MN",
    "Meghalaya"=> "ML",
    "Mizoram"=> "MZ",
    "Nagaland"=> "NL",
    "Odisha"=> "OR",
    "Puducherry"=> "PY",
    "Punjab"=> "PB",
    "Rajasthan"=> "RJ",
    "Sikkim"=> "SK",
    "Tamil Nadu"=> "TN",
    "Telangana"=> "TS",
    "Tripura"=> "TR",
    "Uttar Pradesh"=> "UP",
    "Uttarakhand"=> "UK",
    "West Bengal"=> "WB"
  );
  ?>

  <?php 
    foreach($states as $key => $item){

    echo "<li>
      <a class='dropdown-item' href='#'>
        <div class='form-check'>
          <input class='form-check-input' type='checkbox' value='' id='$item' />
          <label class='form-check-label' for='$item'>
             $key
          </label>
        </div>
      </a>
    </li> ";
  
  }
    ?>
  </ul>
</div>