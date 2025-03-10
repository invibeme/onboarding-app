( function( $ ) {
/*$(window).on("scroll",function() {
	var pageScroll = $(this).scrollTop();
	if($('body').hasClass('home') && $('.navbar .navbar-collapse').hasClass('show') == 0 ){
		if (pageScroll > 10) {
			//$(".navbar").removeClass("navbar-dark bg-transparent").addClass('navbar-light bg-light');
			$(".navbar").removeClass("bg-transparent").addClass('bg-primary');
		} else {
			setTimeout (function(){
				//$(".navbar").addClass("navbar-dark bg-transparent").removeClass('navbar-light bg-light');
				$(".navbar").addClass("bg-transparent").removeClass('bg-primary');
			},10);
		}
	}
});*/

// Set the date we're counting down to
var countDownDate = new Date("Sep 30, 2018 00:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

	// Get todays date and time
	var now = new Date().getTime();
	
	// Find the distance between now and the count down date
	var distance = countDownDate - now;
	
	// Time calculations for days, hours, minutes and seconds
	
	var days = ("0" + Math.floor(distance / (1000 * 60 * 60 * 24))).slice(-2);
	var hours = ("0" + Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))).slice(-2);
	var minutes = ("0" + Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60))).slice(-2);
	var seconds = ("0" + Math.floor((distance % (1000 * 60)) / 1000)).slice(-2);
	
	
	// Output the result in an element with id="demo"	
	document.getElementById('countDown').innerHTML = '<span class="item days">'+days + '<small>días</small></span> : <span class="item hours">' + hours + '<small>horas</small></span> : <span class="item minutes">' + minutes + '<small>minutos</small></span> : <span class="item seconds">' + seconds + '<small>segundos</small></span> ';
	
	// If the count down is over, write some text 
	if (distance < 0) {
		clearInterval(x);
		document.getElementById("countDown").innerHTML = "EXPIRED";
	}
}, 1000);
	
	
$(document).ready(function(){
	/*$('.navbar-toggler').on('mousedown', function(){
		$(".navbar").removeClass("navbar-dark bg-transparent").addClass('navbar-dark bg-primary');
	});
	jQuery('select').each(function(){
		var labelText =  jQuery(this).closest('.form-group').find('label').text();
		if(jQuery(this).find('option').eq(0).html() == '---' ){
			jQuery(this).find('option').eq(0).html(labelText);
		}
	})*/
		
	
	
	// Select all links with hashes
$('a[href*="#"]')
  // Remove links that don't actually link to anything
  
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top - 110
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });
	
});	
	
	
	
} )( jQuery );