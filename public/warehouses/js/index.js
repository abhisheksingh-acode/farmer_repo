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


  $('.ticket-permission').click(function(){
    $('.ticket-popup').removeClass('show');
  })
  $('.ticket-add').click(function(){
    $('.ticket-popup').addClass('show');
  })
 
  $('.request-permission').click(function(){
    $('.request-popup').removeClass('show');
  })
  $('.request-add').click(function(){
    $('.request-popup').addClass('show');
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

  $(document).ready(() => toastMessage('info', 'your page is loaded'));
