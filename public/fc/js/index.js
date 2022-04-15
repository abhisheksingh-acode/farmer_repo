$('.dropdown-custom').click(function(){
  $(this).toggleClass('active');
  
})
  $('.ham-menu').click(function(){
      $('.sidebar').toggleClass('hide-menu');
      $('.rightContent').toggleClass('expand');
  })
  $('.signimg').click(function(){
    $('.signout').toggleClass('show');
  })
  $('.permission').click(function(){
    $('.delete-alert').removeClass('show');
  })
  $('.delete-icon').click(function(){
    $('.delete-alert').addClass('show');
  })

  

  $('.nine-r-permission').click(function(){
    $('.nine-r-popup').removeClass('show');
  })
  $('.niner').click(function(){
    $('.nine-r-popup').addClass('show');
  })

  $('.view-permission').click(function(){
    $('.view-popup').removeClass('show');
  })
  $('.view-add').click(function(){
    $('.view-popup').addClass('show');
  })
  $('.view').click(function(){
    $('.view-popup').addClass('show');
  })
 

  $('.drum-permission').click(function(){
    $('.drum-popup').removeClass('show');
  })
  $('.drum-add').click(function(){
    $('.drum-popup').addClass('show');
  })

  $('.kg-permission').click(function(){
    $('.kg-popup').removeClass('show');
  })
  $('.kg-add').click(function(){
    $('.kg-popup').addClass('show');
  })

  $('.allocate-permission').click(function(){
    $('.allocate-popup').removeClass('show');
  })
  $('.allocate-add').click(function(){
    $('.allocate-popup').addClass('show');
  })

  $('.allocate-permission').click(function(){
    $('.modal, .modal-backdrop').removeClass('show');
  })

  function toastMessage(status, message){
      $('.message-toast').addClass('text-'+status);
      $('.message-toast .message').html(message);
        $('.message-toast').addClass('show');
        
        setTimeout(() => {
        $('.message-toast').removeClass('show');
        }, 2000);
  }

  function copyToClipboard(element) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(element).text()).select();
    document.execCommand("copy");
    $temp.remove();

    toastMessage('success','copied!!');
  }

  $('.clickcopy').click(function(){
      copyToClipboard($(this));
  })

  // $(document).ready(() => toastMessage('info', 'your page is loaded'));


  $('.myCalendar').huicalendar({
    
  })

  $('.myCalendar').huicalendar({
    viewDay: new Date('2021/07/01')
  })

  $('.myCalendar').huicalendar({
      enabledDay: [1,2,3],
    })
    
    $('.myCalendar').huicalendar({
      // options here
    }).on('changeMonth', function(e){
      console.log(e.year)
      console.log(e.month)
      $(this).huicalendar({
        enabledDay: [4,5,6],
        viewDay: new Date(e.year+'/'+e.month+'/01')
      }, 'update')
    })

    $('.myCalendar').huicalendar({
      // options here
    }).on('changeDate', function(e){
      console.log(e.year)
      console.log(e.month)
      console.log(e.date)
    })




  /// model popup form
let pop = $(".form-popup");
pop.html("work");

let formsyn = `<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="pt-0 pr-0">  
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body row">
          <div class="col-md-6 col-12">
              <form>
              <h3>Book Consultation</h3>
                  <div class="form-group">
                      <input type="name" name="name" class="form-control" autocomplete="off" placeholder="Name">
                  </div>
                  <div class="form-group">
                      <input type="mobile" name="mobile" class="form-control" autocomplete="off" placeholder="Mobile">
                  </div>
                  <div class="form-group">
                      <input type="mail" name="email" class="form-control" autocomplete="off" placeholder="Email">
                  </div>
                  <div class="form-group">
                      <textarea class="form-control" name="textarea" placeholder="Message" rows="5"></textarea>
                  </div>
                  <button type="submit" class="octf-btn octf-btn-primary btn-slider btn-large">Submit</button>
                </form>
                </div>
                <div class="col-md-6">
                    <div class="form-img">
                    <img src="images/project8.jpg">
                    </div>
                </div>
          </div>
         
      </div>
  </div>
</div>`;

pop.html(formsyn);

// btn.click(function(){modal.show()});


