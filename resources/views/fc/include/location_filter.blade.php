<style>
  button#dropdownMenuButton1:hover {
    background: #fff !important;    color: #000 !important;
}
</style>

<div class="dropdown col-12 col-md-3 my-3">
  <button class="btn border border-2 bg-white pe-0 col-12 dropdown" id="dropdownMenuButton1" data-bs-toggle="dropdown" style="text-align: left;border: 1px solid #ced4da !important;color: #c7c7c7 !important;">Location
  <span class="ms-4"><i class="fas fa-chevron-down ms-auto" style="color: #000;    float: right;font-size: 13px;padding-right: 20px;padding-top: 4px;"></i></span>
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