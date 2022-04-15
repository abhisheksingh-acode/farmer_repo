   <div class="menurow ms-auto mb-4 p-0">
       <div class=" menu  d-flex justify-content-between px-1 m-0 px-md-5" id="myHeader">
           <div class=" d-flex flex-nowrap" style="width:fit-content;">
               <i class="fas fa-bars ham-menu my-auto px-3"></i>
               <span class="my-auto fs-4 fw-bolder">Dashboard</span>
           </div>
           <div class="icon d-flex  px-1 px-md-4">
               <!-- <div class="rounded-circle mx-1 mx-sm-3"><i class="fa-regular fa-calendar"></i></div>
            <div class="rounded-circle mx-1 mx-sm-3"><i class="fa-regular fa-message"></i></div>
            <div class="rounded-circle mx-1 mx-sm-3"><i class="fa-regular fa-bell"></i></div> -->

               <!--profile start -->
               <div class="sidebar-foot dropdown ms-3">
                   <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle"
                       id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                       {{-- <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                           class="rounded-circle me-2 my-auto"> --}}
                       <strong>{{ auth()->user()->name }}</strong>
                   </a>
                   <ul class="dropdown-menu log-out show text-small shadow " aria-labelledby="dropdownUser1">
                       <li><a class="dropdown-item" href="{{ route('fcenter.logout') }}">Sign out</a></li>
                   </ul>
               </div>
               <!--profile end -->



           </div>





       </div>
