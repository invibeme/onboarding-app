$( function() {
    $( ".tabs" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
    $( ".tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
	$('#playVideo').on('click', function(){
		var videoURL = $('#video iframe').attr('data-src');
		$('#video iframe').attr('src', videoURL);
		$(this).hide();
		$('#video').fadeIn();
	})
	$('.slider').slick({
	  centerMode: true,
	  infinite: false,
	  dots: true,
	  centerPadding: '60px',
	  slidesToShow: 5,
	  responsive: [
		{
		  breakpoint: 1900,
		  settings: {
			arrows: false,
			centerMode: true,
			centerPadding: '40px',
			slidesToShow: 3
		  }
		},
		{
		  breakpoint: 768,
		  settings: {
			arrows: false,
			centerMode: true,
			centerPadding: '40px',
			slidesToShow: 1
		  }
		},
		{
		  breakpoint: 480,
		  settings: {
			arrows: false,
			centerMode: true,
			centerPadding: '40px',
			slidesToShow: 1
		  }
		}
	  ]
	});
	function sliderFocus(){
		if($(window).width() > 767 && $(window).width() < 1900){
			$('.slider').slick('slickGoTo', 1);
		}else if($(window).width() > 1900){
			$('.slider').slick('slickGoTo', 2);
		}
	}
	sliderFocus();
	$( window ).resize(function() {
	  sliderFocus();
	});
	
	/* Form WORK START */
$('.loader').hide();
var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

  /* ====== Contact FORM START ======= */
	$('#submit').click(function(){
		 //console.log("Submit button clicked.");
		
		var formID = $(this).closest('form');

		 $("#response").html('');
		 
		 var name = formID.find('#name').val();
		//var message = formID.find('#message').val();
		var phone = formID.find('#phone').val();
		 var emailid = formID.find('#email').val();

		 var error = new Array(); 
		 
	
		 if(name != '' && name.length > 0){
				error.push();
				formID.find('#name').removeClass('error');
			}else{
				 formID.find('#name').addClass('error');
				 error.push('Please enter your name.');
			}
			
		  if(phone != '' && phone.length >= 10){
				error.push();
				formID.find('#phone').removeClass('error');
			}else{
				 formID.find('#phone').addClass('error');
				 error.push('Please enter your phone number.');
			}
		 if(emailid != '' && emailid.length > 0 && emailReg.test(emailid) > 0){
				error.push();
				formID.find('#email').removeClass('error');
			}else{
				 formID.find('#email').addClass('error');
				 error.push('Please enter your email.');
			}	
			
		 
		  /*console.log("Name : " + name + " Phone: " + phone + " Email: "+emailid);	
		  console.log("Error Array: " + error);		
		  console.log("Error length: " + error.length);*/
		  
		  
		 if(error.length == '0'){
					$("input[type='text'], input[type='email'], textarea, select").removeClass("error"); 
					formID.find(".validation_error").hide();
					formID.find('.loader').show(); 
					 
					 var dataString = 'name='+name+'&emailid='+emailid+'&phone='+ phone;
				$.ajax({
					  type: "POST",
					  url: "accept_message.php",
					  data: dataString,
					 // dataType: "json",
					 asyanc:false,
					  success: function(data) {
							//console.log(data);
							formID.find('.loader').hide(); 
							//formID.html(data);
							formID.find('#response').html(data); 
							formID[0].reset();
							//window.location="thank-you.html"
					   },
					error: function (data) {
						 
						 formID.find('.loader').hide(); 
						 formID.find('#response').html("<p class='error'>Sorry! Can't send you're message. (Internal Server)</p>"); 
						 return false;
					}
				});
					 
					return false; 
					 
			 }
			 else{	
				//console.log("false\n" + error);
				 formID.find(".validation_error").show();
				 return false;
				
			 }
		 
	}); 
	/* ====== Contact FORM END ======= */
	
	/* ====== mc_embed_signup FORM START ======= */
	$('#mc-embedded-subscribe').click(function(){
		 //console.log("Submit button clicked.");
		
		var formID = $(this).closest('form');

		 $("#response").html('');
		 
		 var name = formID.find('#mce-FNAME').val();
		//var message = formID.find('#message').val();
		var phone = formID.find('#mce-PHONE').val();
		var emailid = formID.find('#mce-EMAIL').val();
				 
            
         

		 var error = new Array(); 
		 
	
		 if(name != '' && name.length > 0){
				error.push();
				formID.find('#mce-FNAME').removeClass('error');
			}else{
				 formID.find('#mce-FNAME').addClass('error');
				 error.push('Please enter your name.');
			}
			
		  /*if(phone != '' && phone.length >= 10){
				error.push();
				formID.find('#mce-PHONE').removeClass('error');
			}else{
				 formID.find('#mce-PHONE').addClass('error');
				 error.push('Please enter your phone number.');
			}*/
		 if(emailid != '' && emailid.length > 0 && emailReg.test(emailid) > 0){
				error.push();
				formID.find('#mce-EMAIL').removeClass('error');
			}else{
				 formID.find('#mce-EMAIL').addClass('error'); 
				 error.push('Please enter your email.');
			}	
			
		 if($('#terms').is(":checked")){
				error.push();
				formID.find('#terms').removeClass('error');
				formID.find('.terms_error').hide();
			}
			else{
				formID.find('#terms').addClass('error');
				 error.push('Please accept terms.');
				 formID.find('.terms_error').show();
			}
			
		  console.log("Name : " + name + " Phone: " + phone + " Email: "+emailid);	
		  console.log("Error Array: " + error);		
		  console.log("Error length: " + error.length);/**/
		  
		  
		 if(error.length == '0'){
					
					 
					return true; 
					 
			 }
			 else{	
				//console.log("false\n" + error);
				 formID.find(".validation_error").show();
				 return false;
				
			 }
		
		 
	}); 
	/* ====== mc_embed_signup END ======= */
	
/* Form WORK END */

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
          scrollTop: target.offset().top - 25
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
  
 } );