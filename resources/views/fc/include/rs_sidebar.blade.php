        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('fc') }}/css/calendar.css" />


        <div class="rs-sidebar bg-white" id="sidenav">
            <div class="myCalendar bg-dark pb-1" style="background: #fff !important;">

                <div class="main-wrapper" style="background: #fff;">
                    <!-- <span style="height:0px;">Events</span> -->
                    <span id="eventDayName" style="height:0px;" class="text-white"></span>
                    <div class="sidebar-events text-white" style="height:0px;" id="sidebarEvents">
                        <div class="empty-message" style="height:0px;"></div>
                    </div>

                    <div class="calendar-wrapper z-depth-2" style="box-shadow: unset;">
                        <div class="header-background bg-white">
                            <div class="calendar-header">
                                <a class="prev-button" id="prev">
                                    <i class="material-icons">keyboard_arrow_left</i>
                                </a>
                                <a class="next-button" id="next">
                                    <i class="material-icons">keyboard_arrow_right</i>
                                </a>

                                <div class="row header-title" style="background: #fff;color: #c7c7c7;">
                                    <div class="header-text">
                                        <p id="month-name">February</p>
                                        <p id="todayDayName">Today is Friday 7 Feb</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="calendar-content">
                            <div id="calendar-table" class="calendar-cells">
                                <div id="table-header">
                                    <div class="row">
                                        <div class="col">Mon</div>
                                        <div class="col">Tue</div>
                                        <div class="col">Wed</div>
                                        <div class="col">Thu</div>
                                        <div class="col">Fri</div>
                                        <div class="col">Sat</div>
                                        <div class="col">Sun</div>
                                    </div>
                                </div>

                                <div id="table-body" class=""></div>
                            </div>
                        </div>
                        <!-- <div class="calendar-footer">
              <div class="emptyForm" id="emptyForm">
                <p id="emptyFormTitle" class="text-white fw-bold">No events now</p>
                <a class="addEvent" id="changeFormButton">Add new</a>
              </div>
              <div class="addForm" id="addForm">
                <p class="text-white fw-bold m-0">Add new event</p>

                <div class="row">
                  <div class="input-field m-0 col s6 py-0">
                    <input id="eventTitleInput" type="text" placeholder="Title" class="validate m-0">
                  </div>
                  <div class="input-field m-0 col s6 py-0">
                    <input id="eventDescInput" type="text" placeholder="Description" class="validate m-0">
                  </div>
                </div>

                <div class="addEventButtons">
                  <a class="waves-effect waves-light btn blue lighten-2" id="addEventButton">Add</a>
                  <a class="waves-effect waves-light btn grey lighten-2" id="cancelAdd">Cancel</a>
                </div>

              </div>
             </div> -->
                    </div>
                </div>
            </div>

            <!-- <div class="notify-cards">
          <div class="high-card red lighten-4 my-2 mx-auto p-4">
            <p class="priority text-danger fw-bold mb-1">High Priority <span class="ms-5 text-dark ps-5">09:10 AM</span></p>
            <p class="hica-title fw-bold mb-0"> Notification 1</p>
            <p class="hica-dis mb-0">Lorem ipsum dolor sit amet consectetur.</p>
            <p class="hica-icon mb-0">
            <i class="fas fa-trash delete-icon"></i>
            <i class="fa-regular fa-bell ms-1"></i>
            </p>
          </div>
          <div class="medium-card green lighten-4 my-2 mx-auto p-4" >
          <p class="priority text-success fw-bold mb-1">High Priority <span class="ms-5 text-dark ps-5">09:10 AM</span></p>
            <p class="hica-title fw-bold mb-0"> Notification 2</p>
            <p class="hica-dis mb-0">Lorem ipsum dolor sit amet consectetur.</p>
            <p class="hica-icon mb-0">
            <i class="fas fa-trash delete-icon"></i>
            <i class="fa-regular fa-bell ms-1"></i>
            </p>
          </div>
          <div class="low-card yellow lighten-4 my-2 mb-4 mx-auto p-4">
          <p class="priority text-warning fw-bold mb-1">High Priority <span class="ms-5 text-dark ps-5">09:10 AM</span></p>
            <p class="ca-title fw-bold mb-0">Notification 3</p>
            <p class="hica-dis mb-0">Lorem ipsum dolor sit amet consectetur.</p>
            <p class="hica-icon mb-0">
            <i class="fas fa-trash delete-icon"></i>
            <i class="fa-regular fa-bell ms-1"></i>
            </p>
          </div>
        </div> -->
        </div>
        </div>

        </div>
