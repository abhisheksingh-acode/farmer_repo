/* global bootstrap: false */
(function () {
  'use strict'
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  tooltipTriggerList.forEach(function (tooltipTriggerEl) {
    new bootstrap.Tooltip(tooltipTriggerEl)
  })
})()


$('.ham-menu').click(function(){
  $('.main').toggleClass('hide-menu');
  $('.menurow, .main-content').toggleClass('expand');
})


$('.nav-link').click(function(){
  $('.nav-link').removeClass('active');
})
$('.nav-link').click(function(){
  $(this).addClass('active');
})