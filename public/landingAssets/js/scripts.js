'use strict';

$(document).ready(function(){

  // anmsition
  $(".animsition").animsition({
    inClass: 'fade-in',
    outClass: 'fade-out',
    inDuration: 1500,
    outDuration: 800,
    linkElement: '.animsition-link',
    // e.g. linkElement: 'a:not([target="_blank"]):not([href^="#"])'
    loading: true,
    loadingParentElement: 'body', //animsition wrapper element
    loadingClass: 'animsition-loading',
    loadingInner: '', // e.g '<img src="loading.svg" />'
    timeout: false,
    timeoutCountdown: 5000,
    onLoadEvent: true,
    browser: [ 'animation-duration', '-webkit-animation-duration'],
    // "browser" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
    // The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
    overlay : false,
    overlayClass : 'animsition-overlay-slide',
    overlayParentElement : 'body',
    transition: function(url){ window.location.href = url; }
  });



  //vanillabox
  if( $('a.image').length > 0 ) {
    $('a.image').vanillabox();
  }

  if( $('a.vimeo').length > 0 ){
    $('a.vimeo').vanillabox({
      type: 'iframe'
    });
  }

  if( $('a.youtube').length > 0 ){
    $('a.youtube').vanillabox({
      type: 'iframe'
    });
  }

  if( $('a.website').length > 0 ){
    $('a.website').vanillabox({
      type: 'iframe'
    });
  }


  // smooth scroll
  $('html').smoothScroll();

});



// slider
$(window).load(function() {
  $("#slider-clients").flexisel();
});



// fade intro
(function($){
  var $window = $(window);
  $window.scroll(function(){
    if ($window.scrollTop() >= 160) {
      $('#intro').fadeOut();
    }
    else {
      $('#intro').fadeIn();
    }
  });
}(jQuery));



var $head = $( '#ha-header' );
$( '.ha-waypoint' ).each( function(i) {
  var $el = $( this ),
    animClassDown = $el.data( 'animateDown' ),
    animClassUp = $el.data( 'animateUp' );

  $el.waypoint( function( direction ) {
    if( direction === 'down' && animClassDown ) {
      $head.attr('class', 'ha-header ' + animClassDown);
    }
    else if( direction === 'up' && animClassUp ){
      $head.attr('class', 'ha-header ' + animClassUp);
    }
  }, { offset: '100%' } );
} );


// collapse expanded bootstrap nav
$(document).on('click','.navbar-collapse.in',function(e) {
  if( $(e.target).is('a') ) {
    $(this).collapse('hide');
  }
});
