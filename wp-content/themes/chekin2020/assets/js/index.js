var sticky = new Sticky('.sidebar .sticky');
/*	-----------------------------------------------------------------------------------------------
	Namespace
--------------------------------------------------------------------------------------------------- */
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
jQuery(document).ready(function(){
	jQuery("body").bind("DOMSubtreeModified", function() {
		if(jQuery('body').find('.leadinModal').length){
			jQuery('body').addClass('has-leadinModal');
			//console.log('leadinModal Found');
		}else{
			jQuery('body').removeClass('has-leadinModal');
			//console.log('leadinModal Not Found');
		}
	});
	jQuery('body').on('click', '.hubspot-cta a.cta_button', function(e){
		e.preventDefault();
		jQuery('#hubspot-cta-modal').fadeIn(300);
			if(jQuery(window).width() >= 1200){
				jQuery('body').addClass('modal-open');
				if(jQuery('body').hasClass('page-template-template-cover')){

				} else{
					jQuery('body').addClass('overlay-header');
				} 
			}
	});
	jQuery('.has-slick-slider > .wp-block-group__inner-container').slick({
		dots: true,
		arrows: false,
		infinite: true,
		autoplay: true,
		vertical: true,
		verticalSwiping: true,
		autoplaySpeed: 5000,
	});
	
	jQuery('.testimonials > .wp-block-group__inner-container').slick({
		dots: false,
		arrows: true,
		infinite: true,
		autoplay: true,
		autoplaySpeed: 10000,
	});
	
	
	// TryForFree
	jQuery('.primary-menu>li.trial-btn>a, #cta .button, .btn-banner-signup a').on('click', function(){
		if(jQuery('html').attr('lang') == "es-ES"){
			gtag('event', 'click', {'event_category': 'Registrate gratis', 'event_label': 'RegistrateGratis', 'value': '1'});
			console.log('Registrate gratis fired');
		}else{
			gtag('event', 'click', {'event_category': 'Try for Free', 'event_label': 'TryforFree', 'value': '1'});
			console.log('Try for Free fired');
		}
		
	});
	
	// Tabs
	
	jQuery('.tab-cont .tab-nav > li > a').on('click', function(e){
		e.preventDefault();
		var target = jQuery(this).attr('href');
		jQuery(this).closest('.tab-nav').find('li, a').removeClass('active');
		jQuery(this).addClass('active');
		jQuery(this).closest('.tab-cont').find('.tab-content').removeClass('active');
		jQuery(this).closest('.tab-cont').find(target).addClass('active');
	});
	
	function getCtaModal(){
		jQuery.fancybox.close();
		/*jQuery('.modal-chat').modal({
			backdrop: 'static',
			keyboard: false
		});*/
		jQuery('#cta-modal').fadeIn(300);
		if(jQuery(window).width() >= 1200){
			jQuery('body').addClass('modal-open');
			if(jQuery('body').hasClass('page-template-template-cover')){
				
			} else{
				jQuery('body').addClass('overlay-header');
			} 
		}
	}
	if(window.location.href.includes("#cta-modal")){
		getCtaModal();
	}
	jQuery('.get-chat-modal, .has-get-chat-modal a, [href*="drift.click"], [href*="#cta-modal"]').on('click', function(e){
		e.preventDefault();
		if(jQuery('html').attr('lang') == "es-ES"){
			gtag('event', 'click', {'event_category': 'ConsigueUnaDemo', 'event_label': 'ConsigueUnaDemo', 'value': '1'});
			gtag('event', 'click', {'event_category': '¿Hablamos?', 'event_label': '¿Hablamos?', 'value': '1'});
			console.log('Get Demo Fired Spanish');
		}else{
			gtag('event', 'click', {'event_category': 'Get Demo', 'event_label': 'GetDemo', 'value': '1'});
			console.log('Get Demo Fired');
		}	
		getCtaModal();
		//return false;
	});
	
	function getCtaCampaignModal(){
		jQuery.fancybox.close();
		/*jQuery('.modal-chat').modal({
			backdrop: 'static',
			keyboard: false
		});*/
		jQuery('#cta-dic-campaign').fadeIn(300);
		if(jQuery(window).width() >= 1200){
			jQuery('body').addClass('modal-open');
			if(jQuery('body').hasClass('page-template-template-cover')){
				
			} else{
				jQuery('body').addClass('overlay-header');
			} 
		}
	}
	
	jQuery('[href*="#cta-dic-campaign"]').on('click', function(e){
		e.preventDefault();
		getCtaCampaignModal();
		//return false;
	});
	if(window.location.href.includes("#cta-dic-campaign")){
		getCtaCampaignModal();
	}
	jQuery('.modal .close').on('click', function(e){
		e.preventDefault();
		/*jQuery('.modal-chat').modal({
			backdrop: 'static',
			keyboard: false
		});*/
		jQuery('.modal-chat').fadeOut(300);
		if(jQuery(window).width() >= 1200){
			jQuery('body').removeClass('modal-open');
			
			if(jQuery('body').hasClass('page-template-template-cover')){
				
			} else{
				jQuery('body').removeClass('overlay-header');
			}
		}
		return false;
	});
	  jQuery("#faqSearch").on("keyup", function() {
		var value = jQuery(this).val().toLowerCase();
		jQuery(".faqs > li").filter(function() {
		  jQuery(this).toggle(jQuery(this).text().toLowerCase().indexOf(value) > -1)
		});
	  });
	jQuery('[data-fancybox="gallery"]').fancybox({
		// Options will go here
	});
	jQuery('.get-welcome-video a').fancybox({
		// Options will go here
	});
	
	// Track Video Popup
	jQuery('.get-welcome-video a').on('click', function(){
		gtag('event', 'click', {'event_category': 'Video', 'event_label': 'VideoHome', 'value': '1'});
		console.log('VideoHome fired');
	});
	
	jQuery("#welcome-video video").on("pause", function (e) {
	  //console.debug("Video paused. Current time of videoplay: " + e.target.currentTime );
	  //gtag('event', 'click', {'event_category': 'Video', 'action': 'Pause', 'event_label': 'VideoHome', 'value': '1'});
	  console.log('VideoHome paused');	
	});
	jQuery("#welcome-video video").on("play", function (e) {
		 //console.log("Video played");
		//gtag('event', 'click', {'event_category': 'Video', 'action': 'Play', 'event_label': 'VideoHome', 'value': '1'});
	  	console.log('VideoHome played');	
	});
	
	var country_SPA_ITA_PORT = 0;
	var countryFetch = 0;
	var country = '';
	if(countryFetch == 0){
		var ajaxurl = 'https://chekin.com//wp-admin//admin-ajax.php';
		jQuery.get(ajaxurl,{'action': 'getip'}, function (current_ip) { 
			//jQuery('.header-titles').after('<span class="country">' + current_ip+'</span>'); 
			jQuery('html').attr('data-country', current_ip); 
			country = current_ip;
			console.log(country);
			//if(country == 'India' || country == 'Spain' || country == 'Italy' || country == 'Portugal'){
			if(country == 'Spain' || country == 'Italy' || country == 'Portugal'){
				country_SPA_ITA_PORT = 1;
			}
			countryFetch = 1;
		});
	}
	
	// Calculator START
	jQuery('#property-number').on('keyup', function(){
		jQuery('#property-number-self-chekin').val(jQuery(this).val())
	})
	
	function calculator(){ 
		//console.log('Calc: '+country);
		//console.log('country_SPA_ITA_PORT: '+country_SPA_ITA_PORT);
		var propertyType = jQuery('#your-property-type').val();
		var propertyNumber = jQuery('#property-number').val();
		var is_propertyNumber = jQuery('#property-number-self-chekin').val();
		var selfCheckin = jQuery('#extra-features').is(':checked');
		
		var calPriceMonthly = 0;
		var calPriceYearly = 0; 
		
		var is_calPriceYearly = 0;
		var is_calPriceMonthly = 0;

		var currency = '€';
		var initialPrice = 0;
		var is_initialPrice = 0;
		var initialDiscount = 0;
		var yearlDiscount = 20/100;
		
		var calPriceMonthlyDiscounted = 0;
		var calPriceYearlyDiscounted = 0;
		
		var calPriceMonthly_per =0;
		var calPriceYearly_per =0;
		var is_calPriceMonthly_per =0;
		var is_calPriceYearly_per =0;
			
		
		
	
		
		if(propertyNumber == '' || propertyNumber == 'undefined' ){
			propertyNumber = parseFloat(10);
		}else{
			propertyNumber = parseFloat(propertyNumber);
		}
		
		
		if(is_propertyNumber == '' || is_propertyNumber == 'undefined' ){
			is_propertyNumber = parseFloat(0);
		}else{
			is_propertyNumber = parseFloat(is_propertyNumber);
		}
		
		
		// Type
		
		if(propertyType == 'Vacation Rental'){
			if(country_SPA_ITA_PORT){
				if(selfCheckin){
					//initialPrice = 3.00;
					//is_initialPrice = 5.00;
					initialPrice = 3.00;
					is_initialPrice = 9.99;
				}else{
					 initialPrice = 3.00;
					 is_initialPrice = 0
				}
			}else{
				if(selfCheckin){
					initialPrice = 4.99;
					is_initialPrice = 9.99;
				}else{
					 initialPrice = 4.99;
					 is_initialPrice = 0
				}
			}	
			jQuery('.text-switch').each(function(){
				jQuery(this).html(jQuery(this).attr('data-vacational'))
			});
			
		} else if(propertyType == 'Hotel - Hostel - Hostal Campground - B&B'){
			if(selfCheckin){
				initialPrice = 1.20;
				is_initialPrice = 2.99;
			}else{
				 initialPrice = 1.20;
				 is_initialPrice = 0;
			}
			
			jQuery('.text-switch').each(function(){
				jQuery(this).html(jQuery(this).attr('data-hotel'))
			});
			
			/* If property type == hotel, we should set a minimum of 10 rooms. So if the user select "Number of rooms" <= 10, show always the price for 10 rooms */
			if(propertyNumber <10){
				propertyNumber = 10; 
				
			}
		}  
		
		//selfCheckin
		if(selfCheckin){
			jQuery('.is-self-check-in').show();
		}else{
			jQuery('.is-self-check-in').hide();
		}
			
			
		if(propertyNumber >= 0 && is_propertyNumber >= 0){
			if(propertyNumber > 0 ){
				jQuery('#property-number').removeClass('wpcf7-not-valid');
			}
			if(is_propertyNumber > 0){
				jQuery('#property-number-self-chekin').removeClass('wpcf7-not-valid');
			}
			var initialPriceYearly = parseFloat(initialPrice - parseFloat(yearlDiscount*initialPrice));
			var is_initialPriceYearly = parseFloat(is_initialPrice - parseFloat(yearlDiscount*is_initialPrice));
			
			var pricePerProperty1 = 0,
				pricePerPropertyYearly1 = 0,
				pricePerProperty2 = 0,
				pricePerPropertyYearly2 = 0,
				pricePerProperty3 = 0,
				pricePerPropertyYearly3 = 0,
				pricePerProperty4 = 0,
				pricePerPropertyYearly4 = 0;
				pricePerProperty5 = 0,
				pricePerPropertyYearly5 = 0;
				
			
			var is_pricePerProperty1 = 0,
				is_pricePerPropertyYearly1 = 0,
				is_pricePerProperty2 = 0,
				is_pricePerPropertyYearly2 = 0,
				is_pricePerProperty3 = 0,
				is_pricePerPropertyYearly3 = 0,
				is_pricePerProperty4 = 0,
				is_pricePerPropertyYearly4 = 0;
				is_pricePerProperty5 = 0,
				is_pricePerPropertyYearly5 = 0;
			
			
			var minlimit1 = 10;
			var minlimit2 = 20;
			var minlimit3 = 50;
			var minlimit4 = 100;
			var minlimit5 = 100;
			if(country_SPA_ITA_PORT){
				minlimit1 = 5;
				minlimit5 = 200;
			}
		//	console.log('minlimit4 : '+ minlimit4); 
			//console.log('minlimit5 : '+ minlimit5); 
			if(propertyNumber > minlimit1){
			   initialDiscount = 10/100;
			   pricePerProperty1 = parseFloat(initialPrice - parseFloat(initialDiscount*initialPrice));
			   pricePerPropertyYearly1 = parseFloat(pricePerProperty1 - parseFloat(yearlDiscount*pricePerProperty1));
			  
			  is_pricePerProperty1 = parseFloat(is_initialPrice - parseFloat(initialDiscount*is_initialPrice));
			  is_pricePerPropertyYearly1 = parseFloat(is_pricePerProperty1 - parseFloat(yearlDiscount*is_pricePerProperty1));
			  
			}
			
			if(propertyNumber > minlimit2){
			   initialDiscount = 20/100;
			   pricePerProperty2 = parseFloat(initialPrice - parseFloat(initialDiscount*initialPrice));
			   pricePerPropertyYearly2 = parseFloat(pricePerProperty2 - parseFloat(yearlDiscount*pricePerProperty2));
			   
			   is_pricePerProperty2 = parseFloat(is_initialPrice - parseFloat(initialDiscount*is_initialPrice));
			   is_pricePerPropertyYearly2 = parseFloat(is_pricePerProperty2 - parseFloat(yearlDiscount*is_pricePerProperty2));
			   
			}
			
			if(propertyNumber > minlimit3){
			   initialDiscount = 30/100;
			   pricePerProperty3 = parseFloat(initialPrice - parseFloat(initialDiscount*initialPrice));
			   pricePerPropertyYearly3 = parseFloat(pricePerProperty3 - parseFloat(yearlDiscount*pricePerProperty3));
			   
			   is_pricePerProperty3 = parseFloat(is_initialPrice - parseFloat(initialDiscount*is_initialPrice));
			   is_pricePerPropertyYearly3 = parseFloat(is_pricePerProperty3 - parseFloat(yearlDiscount*is_pricePerProperty3));
			}
			
			if(propertyNumber > minlimit4){
			   initialDiscount = 40/100;
			   pricePerProperty4 = parseFloat(initialPrice - parseFloat(initialDiscount*initialPrice));
			   pricePerPropertyYearly4 = parseFloat(pricePerProperty4 - parseFloat(yearlDiscount*pricePerProperty4));
			   
			   is_pricePerProperty4 = parseFloat(is_initialPrice - parseFloat(initialDiscount*is_initialPrice));
			   is_pricePerPropertyYearly4 = parseFloat(is_pricePerProperty4 - parseFloat(yearlDiscount*is_pricePerProperty4));
			}
			
			if(country_SPA_ITA_PORT){
				if(propertyNumber > minlimit5){
				   initialDiscount = 50/100;
				   pricePerProperty5 = parseFloat(initialPrice - parseFloat(initialDiscount*initialPrice));
				   pricePerPropertyYearly5 = parseFloat(pricePerProperty5 - parseFloat(yearlDiscount*pricePerProperty5));
				   
				   is_pricePerProperty5 = parseFloat(is_initialPrice - parseFloat(initialDiscount*is_initialPrice));
				   is_pricePerPropertyYearly5 = parseFloat(is_pricePerProperty5 - parseFloat(yearlDiscount*is_pricePerProperty5));
				}
			}
			
			/*
			console.log('1-10 = '+initialPrice + ' : ' + initialPriceYearly);
			console.log('11-20 = '+pricePerProperty1 + ' : ' + pricePerPropertyYearly1);
			console.log('21-50 = '+pricePerProperty2 + ' : ' + pricePerPropertyYearly2);
			console.log('51-100 = '+pricePerProperty3 + ' : ' + pricePerPropertyYearly3);
			console.log('100+ = ' +pricePerProperty4 + ' : ' + Number(pricePerPropertyYearly4).toFixed(2));
			*/
			
			
			// console.log('minlimit1: '+minlimit1);
			if(is_propertyNumber > minlimit1){
			   initialDiscount = 10/100;

			  is_pricePerProperty1 = parseFloat(is_initialPrice - parseFloat(initialDiscount*is_initialPrice));
			  is_pricePerPropertyYearly1 = parseFloat(is_pricePerProperty1 - parseFloat(yearlDiscount*is_pricePerProperty1));
			  
			}
			
			if(is_propertyNumber > minlimit2){
			   initialDiscount = 20/100;

			   is_pricePerProperty2 = parseFloat(is_initialPrice - parseFloat(initialDiscount*is_initialPrice));
			   is_pricePerPropertyYearly2 = parseFloat(is_pricePerProperty2 - parseFloat(yearlDiscount*is_pricePerProperty2));
			   
			}
			
			if(is_propertyNumber > minlimit3){
			   initialDiscount = 30/100;
	
			   is_pricePerProperty3 = parseFloat(is_initialPrice - parseFloat(initialDiscount*is_initialPrice));
			   is_pricePerPropertyYearly3 = parseFloat(is_pricePerProperty3 - parseFloat(yearlDiscount*is_pricePerProperty3));
			}
			
			if(is_propertyNumber > minlimit4){
			   initialDiscount = 40/100;

			   is_pricePerProperty4 = parseFloat(is_initialPrice - parseFloat(initialDiscount*is_initialPrice));
			   is_pricePerPropertyYearly4 = parseFloat(is_pricePerProperty4 - parseFloat(yearlDiscount*is_pricePerProperty4));
			   console.log('is_pricePerProperty4: ' + is_pricePerProperty4);
			   console.log('is_pricePerPropertyYearly4: ' + is_pricePerPropertyYearly4); 
			}
			if(country_SPA_ITA_PORT){
				if(propertyNumber > minlimit5){
				   initialDiscount = 50/100;

				   is_pricePerProperty5 = parseFloat(is_initialPrice - parseFloat(initialDiscount*is_initialPrice));
				   is_pricePerPropertyYearly5 = parseFloat(is_pricePerProperty5 - parseFloat(yearlDiscount*is_pricePerProperty5));
				}
			}
		/*	console.log('1-10 = '+is_initialPrice + ' : ' + is_initialPriceYearly);
			console.log('11-20 = '+is_pricePerProperty1 + ' : ' + is_pricePerPropertyYearly1);
			console.log('21-50 = '+is_pricePerProperty2 + ' : ' + is_pricePerPropertyYearly2);
			console.log('51-100 = '+is_pricePerProperty3 + ' : ' + is_pricePerPropertyYearly3);
			console.log('100+ = ' +is_pricePerProperty4 + ' : ' + Number(is_pricePerPropertyYearly4).toFixed(2));
		 */
			
 
				
				
			

			
			if(propertyNumber > minlimit1 && propertyNumber <= minlimit2){
				
				calPriceMonthly = parseFloat((propertyNumber - minlimit1)*pricePerProperty1 + minlimit1*initialPrice);
				calPriceYearly =  parseFloat((propertyNumber - minlimit1)*pricePerPropertyYearly1 + minlimit1*initialPriceYearly);
				
			}else if(propertyNumber > minlimit2 && propertyNumber <= minlimit3){
				
				calPriceMonthly = parseFloat((propertyNumber - minlimit2)*pricePerProperty2 + minlimit1*initialPrice  + (minlimit2-minlimit1)*pricePerProperty1 );
				calPriceYearly =  parseFloat((propertyNumber - minlimit2)*pricePerPropertyYearly2 + minlimit1*initialPriceYearly + (minlimit2-minlimit1)*pricePerPropertyYearly1);
				
			}else if(propertyNumber > minlimit3 && propertyNumber <= minlimit4){
				calPriceMonthly = parseFloat((propertyNumber - minlimit3)*pricePerProperty3 + minlimit1*initialPrice  + (minlimit2-minlimit1)*pricePerProperty1 + (minlimit3-minlimit2)*pricePerProperty2 );
				calPriceYearly =  parseFloat((propertyNumber - minlimit3)*pricePerPropertyYearly3 + minlimit1*initialPriceYearly + (minlimit2-minlimit1)*pricePerPropertyYearly1 + (minlimit3-minlimit2)*pricePerPropertyYearly2);
			}else if(propertyNumber > minlimit4){
				
				
				if(country_SPA_ITA_PORT && propertyNumber > minlimit5){
					calPriceMonthly = parseFloat((propertyNumber - minlimit5)*pricePerProperty5 + (minlimit5 - minlimit4)*pricePerProperty4 + minlimit1*initialPrice  + (minlimit2-minlimit1)*pricePerProperty1 + (minlimit3-minlimit2)*pricePerProperty2 + (minlimit4-minlimit3)*pricePerProperty3);
					calPriceYearly =  parseFloat((propertyNumber - minlimit5)*pricePerPropertyYearly5 + (minlimit5 - minlimit4)*pricePerPropertyYearly4 + minlimit1*initialPriceYearly + (minlimit2-minlimit1)*pricePerPropertyYearly1 + (minlimit3-minlimit2)*pricePerPropertyYearly2 + (minlimit4-minlimit3)*pricePerPropertyYearly3);
					//console.log('pricePerProperty5: '+pricePerProperty5);
				}else{
					calPriceMonthly = parseFloat((propertyNumber - minlimit4)*pricePerProperty4 + minlimit1*initialPrice  + (minlimit2-minlimit1)*pricePerProperty1 + (minlimit3-minlimit2)*pricePerProperty2 + (minlimit4-minlimit3)*pricePerProperty3 );
					calPriceYearly =  parseFloat((propertyNumber - minlimit4)*pricePerPropertyYearly4 + minlimit1*initialPriceYearly + (minlimit2-minlimit1)*pricePerPropertyYearly1 + (minlimit3-minlimit2)*pricePerPropertyYearly2 + (minlimit4-minlimit3)*pricePerPropertyYearly3);
				}
			}else{
				calPriceMonthly = parseFloat(propertyNumber*initialPrice);
				calPriceYearly = parseFloat((propertyNumber*initialPriceYearly));	
			} 
			
			// Self Chekin START
			if(is_propertyNumber > minlimit1 && is_propertyNumber <= minlimit2){
				is_calPriceMonthly = parseFloat((is_propertyNumber - minlimit1)*is_pricePerProperty1 + minlimit1*is_initialPrice);
				is_calPriceYearly =  parseFloat((is_propertyNumber - minlimit1)*is_pricePerPropertyYearly1 + minlimit1*is_initialPriceYearly);
				console.log('minlimit1');
				
				
			}else if(is_propertyNumber > minlimit2 && is_propertyNumber <= minlimit3){
				
				is_calPriceMonthly = parseFloat((is_propertyNumber - minlimit2)*is_pricePerProperty2 + minlimit1*is_initialPrice  + (minlimit2-minlimit1)*is_pricePerProperty1 );
				is_calPriceYearly =  parseFloat((is_propertyNumber - minlimit2)*is_pricePerPropertyYearly2 + minlimit1*is_initialPriceYearly + (minlimit2-minlimit1)*is_pricePerPropertyYearly1);
				console.log('minlimit2');
				
			}else if(is_propertyNumber > minlimit3 && is_propertyNumber <= minlimit4){
				is_calPriceMonthly = parseFloat((is_propertyNumber - minlimit3)*is_pricePerProperty3 + minlimit1*is_initialPrice  + (minlimit2-minlimit1)*is_pricePerProperty1 + (minlimit3-minlimit2)*is_pricePerProperty2 );
				is_calPriceYearly =  parseFloat((is_propertyNumber - minlimit3)*is_pricePerPropertyYearly3 + minlimit1*is_initialPriceYearly + (minlimit2-minlimit1)*is_pricePerPropertyYearly1 + (minlimit3-minlimit2)*is_pricePerPropertyYearly2);
				console.log('minlimit3');
			}else if(is_propertyNumber > minlimit4){
				is_calPriceMonthly = parseFloat((is_propertyNumber - minlimit4)*is_pricePerProperty4 + (minlimit4 - minlimit3)*is_pricePerProperty3 + minlimit1*is_initialPrice  + (minlimit2-minlimit1)*is_pricePerProperty1 + (minlimit3-minlimit2)*is_pricePerProperty2 );
					
				is_calPriceYearly =  parseFloat((is_propertyNumber - minlimit4)*is_pricePerPropertyYearly4 + (minlimit4 - minlimit3)*is_pricePerPropertyYearly3 + minlimit1*is_initialPriceYearly + (minlimit2-minlimit1)*is_pricePerPropertyYearly1 + (minlimit3-minlimit2)*is_pricePerPropertyYearly2);
			}else{
				is_calPriceMonthly = parseFloat(is_propertyNumber*is_initialPrice);
				is_calPriceYearly = parseFloat((is_propertyNumber*is_initialPriceYearly));
				console.log('minlimit0');
			}
			// Self Chekin END
			
			/*
			console.log('calPriceMonthly:' + calPriceMonthly + ' calPriceYearly: ' + calPriceYearly*12);
			console.log('is_calPriceMonthly:' + is_calPriceMonthly + ' is_calPriceYearly: ' + is_calPriceYearly*12); 
			*/
			calPriceMonthly_per =  parseFloat(calPriceMonthly/propertyNumber);  
			calPriceYearly_per = parseFloat(calPriceYearly/propertyNumber);  
			 
			is_calPriceMonthly_per =  parseFloat(is_calPriceMonthly/is_propertyNumber);  
			is_calPriceYearly_per = parseFloat(is_calPriceYearly/is_propertyNumber); 
			
			
			
			
			// Self Chekin END 
			 
			// var calPriceMonthly_Final = parseFloat(parseFloat(is_calPriceMonthly_per) + parseFloat(calPriceMonthly_per)).toFixed(2);
		//	 var calPriceYearly_Final = parseFloat(parseFloat(is_calPriceYearly_per) + parseFloat(calPriceYearly_per)).toFixed(2);
			  
			var calPriceMonthly_Final = parseFloat(parseFloat(is_calPriceMonthly) + parseFloat(calPriceMonthly)).toFixed(2);
			var calPriceYearly_Final = parseFloat(parseFloat(is_calPriceYearly) + parseFloat(calPriceYearly)).toFixed(2);	
			var priceYearlySaving = parseFloat(parseFloat(calPriceMonthly_Final*12) - parseFloat(calPriceYearly_Final*12)).toFixed(2);	
			 
			var calPriceYearly_Final_BilledYearly =parseFloat(parseFloat(calPriceYearly_Final*12)).toFixed(2);
			
															   
			// Update Price 
			jQuery('#price-yearly').html(numberWithCommas(calPriceYearly_Final)+currency);  //numberWithCommas(x)
			jQuery('#price-monthly').html(numberWithCommas(calPriceMonthly_Final)+currency);
			jQuery('#price-yearly-saving').html(numberWithCommas(priceYearlySaving)+currency);
			jQuery('#discount-yearly').html(parseFloat(yearlDiscount*100).toFixed(0)+'%');
			jQuery('#discount-monthly').html(parseFloat(initialDiscount*100).toFixed(0)+'%');
			
			jQuery('#price-yearly-billed-yearly').html(numberWithCommas(calPriceYearly_Final_BilledYearly)+currency); 
			jQuery('#price-monthly-billed-monthly').html(numberWithCommas(calPriceMonthly_Final)+currency);
			/*
			console.log('initialPrice: ' + initialPrice);
			console.log('is_initialPrice: ' + is_initialPrice);
			console.log('propertyNumber:' + propertyNumber);
			console.log('initialDiscount:' + initialDiscount);*/
			/*console.log('yearlDiscount:' + yearlDiscount);
			console.log('calPriceMonthlyDiscounted:' + calPriceMonthlyDiscounted);
			console.log('calPriceYearlyDiscounted:' + calPriceYearlyDiscounted);
			console.log('calPriceYearlyDiscounted2:' + calPriceYearlyDiscounted2);
			console.log('calPriceMonthly:' + calPriceMonthly);
			console.log('calPriceYearly:' + calPriceYearly*12); 
			console.log('is_calPriceMonthly:' + is_calPriceMonthly); 
			console.log('is_calPriceYearly:' + is_calPriceYearly);*/
		}else{
			if(jQuery('#property-number').length && propertyNumber < 0){
				//alert("Please enter correct property number!");
				jQuery('#property-number').addClass('wpcf7-not-valid');
				jQuery('#property-number').focus();
			}
			if(jQuery('#property-number-self-chekin').length && is_propertyNumber < 0){
				//alert("Please enter correct property number!");
				jQuery('#property-number-self-chekin').addClass('wpcf7-not-valid');
				jQuery('#property-number-self-chekin').focus();
			}
		}
	}
	jQuery(document).ajaxComplete(function(){
		calculator();
	});
	jQuery('.price-calculator #calculate').on('click', function(e){
		e.preventDefault;
		calculator();
	});
	
	jQuery('.price-calculator #your-property-type, .price-calculator #property-number, .price-calculator #extra-features, .price-calculator #property-number-self-chekin').on('change', function(e){
		calculator();	 
	});
	jQuery('.price-calculator #property-number, .price-calculator #property-number-self-chekin').on('keyup', function(e){
		calculator();	 
	});
	// Calculator END
	
	
	
}); 

var chekin2020 = chekin2020 || {};

// Set a default value for scrolled.
chekin2020.scrolled = 0;

// polyfill closest
// https://developer.mozilla.org/en-US/docs/Web/API/Element/closest#Polyfill
if ( ! Element.prototype.closest ) {
	Element.prototype.closest = function( s ) {
		var el = this;

		do {
			if ( el.matches( s ) ) {
				return el;
			}

			el = el.parentElement || el.parentNode;
		} while ( el !== null && el.nodeType === 1 );

		return null;
	};
}

// polyfill forEach
// https://developer.mozilla.org/en-US/docs/Web/API/NodeList/forEach#Polyfill
if ( window.NodeList && ! NodeList.prototype.forEach ) {
	NodeList.prototype.forEach = function( callback, thisArg ) {
		var i;
		var len = this.length;

		thisArg = thisArg || window;

		for ( i = 0; i < len; i++ ) {
			callback.call( thisArg, this[ i ], i, this );
		}
	};
}

// event "polyfill"
chekin2020.createEvent = function( eventName ) {
	var event;
	if ( typeof window.Event === 'function' ) {
		event = new Event( eventName );
	} else {
		event = document.createEvent( 'Event' );
		event.initEvent( eventName, true, false );
	}
	return event;
};

// matches "polyfill"
// https://developer.mozilla.org/es/docs/Web/API/Element/matches
if ( ! Element.prototype.matches ) {
	Element.prototype.matches =
		Element.prototype.matchesSelector ||
		Element.prototype.mozMatchesSelector ||
		Element.prototype.msMatchesSelector ||
		Element.prototype.oMatchesSelector ||
		Element.prototype.webkitMatchesSelector ||
		function( s ) {
			var matches = ( this.document || this.ownerDocument ).querySelectorAll( s ),
				i = matches.length;
			while ( --i >= 0 && matches.item( i ) !== this ) {}
			return i > -1;
		};
}

// Add a class to the body for when touch is enabled for browsers that don't support media queries
// for interaction media features. Adapted from <https://codepen.io/Ferie/pen/vQOMmO>.
chekin2020.touchEnabled = {

	init: function() {
		var matchMedia = function() {
			// Include the 'heartz' as a way to have a non-matching MQ to help terminate the join. See <https://git.io/vznFH>.
			var prefixes = [ '-webkit-', '-moz-', '-o-', '-ms-' ];
			var query = [ '(', prefixes.join( 'touch-enabled),(' ), 'heartz', ')' ].join( '' );
			return window.matchMedia && window.matchMedia( query ).matches;
		};

		if ( ( 'ontouchstart' in window ) || ( window.DocumentTouch && document instanceof window.DocumentTouch ) || matchMedia() ) {
			document.body.classList.add( 'touch-enabled' );
		}
	}
}; // chekin2020.touchEnabled

/*	-----------------------------------------------------------------------------------------------
	Cover Modals
--------------------------------------------------------------------------------------------------- */

chekin2020.coverModals = {

	init: function() {
		if ( document.querySelector( '.cover-modal' ) ) {
			// Handle cover modals when they're toggled.
			this.onToggle();

			// When toggled, untoggle if visitor clicks on the wrapping element of the modal.
			this.outsideUntoggle();

			// Close on escape key press.
			this.closeOnEscape();

			// Hide and show modals before and after their animations have played out.
			this.hideAndShowModals();
		}
	},

	// Handle cover modals when they're toggled.
	onToggle: function() {
		document.querySelectorAll( '.cover-modal' ).forEach( function( element ) {
			element.addEventListener( 'toggled', function( event ) {
				var modal = event.target,
					body = document.body;

				if ( modal.classList.contains( 'active' ) ) {
					body.classList.add( 'showing-modal' );
				} else {
					body.classList.remove( 'showing-modal' );
					body.classList.add( 'hiding-modal' );

					// Remove the hiding class after a delay, when animations have been run.
					setTimeout( function() {
						body.classList.remove( 'hiding-modal' );
					}, 500 );
				}
			} );
		} );
	},

	// Close modal on outside click.
	outsideUntoggle: function() {
		document.addEventListener( 'click', function( event ) {
			var target = event.target;
			var modal = document.querySelector( '.cover-modal.active' );

			// if target onclick is <a> with # within the href attribute
			if ( event.target.tagName.toLowerCase() === 'a' && event.target.hash.includes( '#' ) && modal !== null ) {
				// untoggle the modal
				this.untoggleModal( modal );
				// wait 550 and scroll to the anchor
				setTimeout( function() {
					var anchor = document.getElementById( event.target.hash.slice( 1 ) );
					anchor.scrollIntoView();
				}, 550 );
			}

			if ( target === modal ) {
				this.untoggleModal( target );
			}
		}.bind( this ) );
	},

	// Close modal on escape key press.
	closeOnEscape: function() {
		document.addEventListener( 'keydown', function( event ) {
			if ( event.keyCode === 27 ) {
				event.preventDefault();
				document.querySelectorAll( '.cover-modal.active' ).forEach( function( element ) {
					this.untoggleModal( element );
				}.bind( this ) );
			}
		}.bind( this ) );
	},

	// Hide and show modals before and after their animations have played out.
	hideAndShowModals: function() {
		var _doc = document,
			_win = window,
			modals = _doc.querySelectorAll( '.cover-modal' ),
			htmlStyle = _doc.documentElement.style,
			adminBar = _doc.querySelector( '#wpadminbar' );

		function getAdminBarHeight( negativeValue ) {
			var height,
				currentScroll = _win.pageYOffset;

			if ( adminBar ) {
				height = currentScroll + adminBar.getBoundingClientRect().height;

				return negativeValue ? -height : height;
			}

			return currentScroll === 0 ? 0 : -currentScroll;
		}

		function htmlStyles() {
			var overflow = _win.innerHeight > _doc.documentElement.getBoundingClientRect().height;

			return {
				'overflow-y': overflow ? 'hidden' : 'scroll',
				position: 'fixed',
				width: '100%',
				top: getAdminBarHeight( true ) + 'px',
				left: 0
			};
		}

		// Show the modal.
		modals.forEach( function( modal ) {
			modal.addEventListener( 'toggle-target-before-inactive', function( event ) {
				var styles = htmlStyles(),
					offsetY = _win.pageYOffset,
					paddingTop = ( Math.abs( getAdminBarHeight() ) - offsetY ) + 'px',
					mQuery = _win.matchMedia( '(max-width: 600px)' );

				if ( event.target !== modal ) {
					return;
				}

				Object.keys( styles ).forEach( function( styleKey ) {
					htmlStyle.setProperty( styleKey, styles[ styleKey ] );
				} );

				_win.chekin2020.scrolled = parseInt( styles.top, 10 );

				if ( adminBar ) {
					_doc.body.style.setProperty( 'padding-top', paddingTop );

					if ( mQuery.matches ) {
						if ( offsetY >= getAdminBarHeight() ) {
							modal.style.setProperty( 'top', 0 );
						} else {
							modal.style.setProperty( 'top', ( getAdminBarHeight() - offsetY ) + 'px' );
						}
					}
				}

				modal.classList.add( 'show-modal' );
			} );

			// Hide the modal after a delay, so animations have time to play out.
			modal.addEventListener( 'toggle-target-after-inactive', function( event ) {
				if ( event.target !== modal ) {
					return;
				}

				setTimeout( function() {
					var clickedEl = chekin2020.toggles.clickedEl;

					modal.classList.remove( 'show-modal' );

					Object.keys( htmlStyles() ).forEach( function( styleKey ) {
						htmlStyle.removeProperty( styleKey );
					} );

					if ( adminBar ) {
						_doc.body.style.removeProperty( 'padding-top' );
						modal.style.removeProperty( 'top' );
					}

					if ( clickedEl !== false ) {
						clickedEl.focus();
						clickedEl = false;
					}

					_win.scrollTo( 0, Math.abs( _win.chekin2020.scrolled + getAdminBarHeight() ) );

					_win.chekin2020.scrolled = 0;
				}, 500 );
			} );
		} );
	},

	// Untoggle a modal.
	untoggleModal: function( modal ) {
		var modalTargetClass,
			modalToggle = false;

		// If the modal has specified the string (ID or class) used by toggles to target it, untoggle the toggles with that target string.
		// The modal-target-string must match the string toggles use to target the modal.
		if ( modal.dataset.modalTargetString ) {
			modalTargetClass = modal.dataset.modalTargetString;

			modalToggle = document.querySelector( '*[data-toggle-target="' + modalTargetClass + '"]' );
		}

		// If a modal toggle exists, trigger it so all of the toggle options are included.
		if ( modalToggle ) {
			modalToggle.click();

			// If one doesn't exist, just hide the modal.
		} else {
			modal.classList.remove( 'active' );
		}
	}

}; // chekin2020.coverModals

/*	-----------------------------------------------------------------------------------------------
	Intrinsic Ratio Embeds
--------------------------------------------------------------------------------------------------- */

chekin2020.intrinsicRatioVideos = {

	init: function() {
		this.makeFit();

		window.addEventListener( 'resize', function() {
			this.makeFit();
		}.bind( this ) );
	},

	makeFit: function() {
		document.querySelectorAll( 'iframe, object, video' ).forEach( function( video ) {
			var ratio, iTargetWidth,
				container = video.parentNode;

			// Skip videos we want to ignore.
			if ( video.classList.contains( 'intrinsic-ignore' ) || video.parentNode.classList.contains( 'intrinsic-ignore' ) ) {
				return true;
			}

			if ( ! video.dataset.origwidth ) {
				// Get the video element proportions.
				video.setAttribute( 'data-origwidth', video.width );
				video.setAttribute( 'data-origheight', video.height );
			}

			iTargetWidth = container.offsetWidth;

			// Get ratio from proportions.
			ratio = iTargetWidth / video.dataset.origwidth;

			// Scale based on ratio, thus retaining proportions.
			video.style.width = iTargetWidth + 'px';
			video.style.height = ( video.dataset.origheight * ratio ) + 'px';
		} );
	}

}; // chekin2020.instrinsicRatioVideos

/*	-----------------------------------------------------------------------------------------------
	Modal Menu
--------------------------------------------------------------------------------------------------- */
chekin2020.modalMenu = {

	init: function() {
		// If the current menu item is in a sub level, expand all the levels higher up on load.
		this.expandLevel();
		this.keepFocusInModal();
	},

	expandLevel: function() {
		var modalMenus = document.querySelectorAll( '.modal-menu' );

		modalMenus.forEach( function( modalMenu ) {
			var activeMenuItem = modalMenu.querySelector( '.current-menu-item' );

			if ( activeMenuItem ) {
				chekin2020FindParents( activeMenuItem, 'li' ).forEach( function( element ) {
					var subMenuToggle = element.querySelector( '.sub-menu-toggle' );
					if ( subMenuToggle ) {
						chekin2020.toggles.performToggle( subMenuToggle, true );
					}
				} );
			}
		} );
	},

	keepFocusInModal: function() {
		var _doc = document;

		_doc.addEventListener( 'keydown', function( event ) {
			var toggleTarget, modal, selectors, elements, menuType, bottomMenu, activeEl, lastEl, firstEl, tabKey, shiftKey,
				clickedEl = chekin2020.toggles.clickedEl;

			if ( clickedEl && _doc.body.classList.contains( 'showing-modal' ) ) {
				toggleTarget = clickedEl.dataset.toggleTarget;
				selectors = 'input, a, button';
				modal = _doc.querySelector( toggleTarget );

				elements = modal.querySelectorAll( selectors );
				elements = Array.prototype.slice.call( elements );

				if ( '.menu-modal' === toggleTarget ) {
					menuType = window.matchMedia( '(min-width: 1000px)' ).matches;
					menuType = menuType ? '.expanded-menu' : '.mobile-menu';

					elements = elements.filter( function( element ) {
						return null !== element.closest( menuType ) && null !== element.offsetParent;
					} );

					elements.unshift( _doc.querySelector( '.close-nav-toggle' ) );

					bottomMenu = _doc.querySelector( '.menu-bottom > nav' );

					if ( bottomMenu ) {
						bottomMenu.querySelectorAll( selectors ).forEach( function( element ) {
							elements.push( element );
						} );
					}
				}

				lastEl = elements[ elements.length - 1 ];
				firstEl = elements[0];
				activeEl = _doc.activeElement;
				tabKey = event.keyCode === 9;
				shiftKey = event.shiftKey;

				if ( ! shiftKey && tabKey && lastEl === activeEl ) {
					event.preventDefault();
					firstEl.focus();
				}

				if ( shiftKey && tabKey && firstEl === activeEl ) {
					event.preventDefault();
					lastEl.focus();
				}
			}
		} );
	}
}; // chekin2020.modalMenu

/*	-----------------------------------------------------------------------------------------------
	Primary Menu
--------------------------------------------------------------------------------------------------- */

chekin2020.primaryMenu = {

	init: function() {
		this.focusMenuWithChildren();
	},

	// The focusMenuWithChildren() function implements Keyboard Navigation in the Primary Menu
	// by adding the '.focus' class to all 'li.menu-item-has-children' when the focus is on the 'a' element.
	focusMenuWithChildren: function() {
		// Get all the link elements within the primary menu.
		var links, i, len,
			menu = document.querySelector( '.primary-menu-wrapper' );

		if ( ! menu ) {
			return false;
		}

		links = menu.getElementsByTagName( 'a' );

		// Each time a menu link is focused or blurred, toggle focus.
		for ( i = 0, len = links.length; i < len; i++ ) {
			links[i].addEventListener( 'focus', toggleFocus, true );
			links[i].addEventListener( 'blur', toggleFocus, true );
		}

		//Sets or removes the .focus class on an element.
		function toggleFocus() {
			var self = this;

			// Move up through the ancestors of the current link until we hit .primary-menu.
			while ( -1 === self.className.indexOf( 'primary-menu' ) ) {
				// On li elements toggle the class .focus.
				if ( 'li' === self.tagName.toLowerCase() ) {
					if ( -1 !== self.className.indexOf( 'focus' ) ) {
						self.className = self.className.replace( ' focus', '' );
					} else {
						self.className += ' focus';
					}
				}
				self = self.parentElement;
			}
		}
	}
}; // chekin2020.primaryMenu

/*	-----------------------------------------------------------------------------------------------
	Toggles
--------------------------------------------------------------------------------------------------- */

chekin2020.toggles = {

	clickedEl: false,

	init: function() {
		// Do the toggle.
		this.toggle();

		// Check for toggle/untoggle on resize.
		this.resizeCheck();

		// Check for untoggle on escape key press.
		this.untoggleOnEscapeKeyPress();
	},

	performToggle: function( element, instantly ) {
		var target, timeOutTime, classToToggle,
			self = this,
			_doc = document,
			// Get our targets.
			toggle = element,
			targetString = toggle.dataset.toggleTarget,
			activeClass = 'active';

		// Elements to focus after modals are closed.
		if ( ! _doc.querySelectorAll( '.show-modal' ).length ) {
			self.clickedEl = _doc.activeElement;
		}

		if ( targetString === 'next' ) {
			target = toggle.nextSibling;
		} else {
			target = _doc.querySelector( targetString );
		}

		// Trigger events on the toggle targets before they are toggled.
		if ( target.classList.contains( activeClass ) ) {
			target.dispatchEvent( chekin2020.createEvent( 'toggle-target-before-active' ) );
		} else {
			target.dispatchEvent( chekin2020.createEvent( 'toggle-target-before-inactive' ) );
		}

		// Get the class to toggle, if specified.
		classToToggle = toggle.dataset.classToToggle ? toggle.dataset.classToToggle : activeClass;

		// For cover modals, set a short timeout duration so the class animations have time to play out.
		timeOutTime = 0;

		if ( target.classList.contains( 'cover-modal' ) ) {
			timeOutTime = 10;
		}

		setTimeout( function() {
			var focusElement,
				subMenued = target.classList.contains( 'sub-menu' ),
				newTarget = subMenued ? toggle.closest( '.menu-item' ).querySelector( '.sub-menu' ) : target,
				duration = toggle.dataset.toggleDuration;

			// Toggle the target of the clicked toggle.
			if ( toggle.dataset.toggleType === 'slidetoggle' && ! instantly && duration !== '0' ) {
				chekin2020MenuToggle( newTarget, duration );
			} else {
				newTarget.classList.toggle( classToToggle );
			}

			// If the toggle target is 'next', only give the clicked toggle the active class.
			if ( targetString === 'next' ) {
				toggle.classList.toggle( activeClass );
			} else if ( target.classList.contains( 'sub-menu' ) ) {
				toggle.classList.toggle( activeClass );
			} else {
				// If not, toggle all toggles with this toggle target.
				_doc.querySelector( '*[data-toggle-target="' + targetString + '"]' ).classList.toggle( activeClass );
			}

			// Toggle aria-expanded on the toggle.
			chekin2020ToggleAttribute( toggle, 'aria-expanded', 'true', 'false' );

			if ( self.clickedEl && -1 !== toggle.getAttribute( 'class' ).indexOf( 'close-' ) ) {
				chekin2020ToggleAttribute( self.clickedEl, 'aria-expanded', 'true', 'false' );
			}

			// Toggle body class.
			if ( toggle.dataset.toggleBodyClass ) {
				_doc.body.classList.toggle( toggle.dataset.toggleBodyClass );
			}

			// Check whether to set focus.
			if ( toggle.dataset.setFocus ) {
				focusElement = _doc.querySelector( toggle.dataset.setFocus );

				if ( focusElement ) {
					if ( target.classList.contains( activeClass ) ) {
						focusElement.focus();
					} else {
						focusElement.blur();
					}
				}
			}

			// Trigger the toggled event on the toggle target.
			target.dispatchEvent( chekin2020.createEvent( 'toggled' ) );

			// Trigger events on the toggle targets after they are toggled.
			if ( target.classList.contains( activeClass ) ) {
				target.dispatchEvent( chekin2020.createEvent( 'toggle-target-after-active' ) );
			} else {
				target.dispatchEvent( chekin2020.createEvent( 'toggle-target-after-inactive' ) );
			}
		}, timeOutTime );
	},

	// Do the toggle.
	toggle: function() {
		var self = this;

		document.querySelectorAll( '*[data-toggle-target]' ).forEach( function( element ) {
			element.addEventListener( 'click', function( event ) {
				event.preventDefault();
				self.performToggle( element );
			} );
		} );
	},

	// Check for toggle/untoggle on screen resize.
	resizeCheck: function() {
		if ( document.querySelectorAll( '*[data-untoggle-above], *[data-untoggle-below], *[data-toggle-above], *[data-toggle-below]' ).length ) {
			window.addEventListener( 'resize', function() {
				var winWidth = window.innerWidth,
					toggles = document.querySelectorAll( '.toggle' );

				toggles.forEach( function( toggle ) {
					var unToggleAbove = toggle.dataset.untoggleAbove,
						unToggleBelow = toggle.dataset.untoggleBelow,
						toggleAbove = toggle.dataset.toggleAbove,
						toggleBelow = toggle.dataset.toggleBelow;

					// If no width comparison is set, continue.
					if ( ! unToggleAbove && ! unToggleBelow && ! toggleAbove && ! toggleBelow ) {
						return;
					}

					// If the toggle width comparison is true, toggle the toggle.
					if (
						( ( ( unToggleAbove && winWidth > unToggleAbove ) ||
							( unToggleBelow && winWidth < unToggleBelow ) ) &&
							toggle.classList.contains( 'active' ) ) ||
						( ( ( toggleAbove && winWidth > toggleAbove ) ||
							( toggleBelow && winWidth < toggleBelow ) ) &&
							! toggle.classList.contains( 'active' ) )
					) {
						toggle.click();
					}
				} );
			} );
		}
	},

	// Close toggle on escape key press.
	untoggleOnEscapeKeyPress: function() {
		document.addEventListener( 'keyup', function( event ) {
			if ( event.key === 'Escape' ) {
				document.querySelectorAll( '*[data-untoggle-on-escape].active' ).forEach( function( element ) {
					if ( element.classList.contains( 'active' ) ) {
						element.click();
					}
				} );
			}
		} );
	}

}; // chekin2020.toggles

/**
 * Is the DOM ready?
 *
 * This implementation is coming from https://gomakethings.com/a-native-javascript-equivalent-of-jquerys-ready-method/
 *
 * @param {Function} fn Callback function to run.
 */
function chekin2020DomReady( fn ) {
	if ( typeof fn !== 'function' ) {
		return;
	}

	if ( document.readyState === 'interactive' || document.readyState === 'complete' ) {
		return fn();
	}

	document.addEventListener( 'DOMContentLoaded', fn, false );
}

chekin2020DomReady( function() {
	chekin2020.toggles.init();              // Handle toggles.
	chekin2020.coverModals.init();          // Handle cover modals.
	chekin2020.intrinsicRatioVideos.init(); // Retain aspect ratio of videos on window resize.
	chekin2020.modalMenu.init();            // Modal Menu.
	chekin2020.primaryMenu.init();          // Primary Menu.
	chekin2020.touchEnabled.init();         // Add class to body if device is touch-enabled.
} );

/*	-----------------------------------------------------------------------------------------------
	Helper functions
--------------------------------------------------------------------------------------------------- */

/* Toggle an attribute ----------------------- */

function chekin2020ToggleAttribute( element, attribute, trueVal, falseVal ) {
	if ( trueVal === undefined ) {
		trueVal = true;
	}
	if ( falseVal === undefined ) {
		falseVal = false;
	}
	if ( element.getAttribute( attribute ) !== trueVal ) {
		element.setAttribute( attribute, trueVal );
	} else {
		element.setAttribute( attribute, falseVal );
	}
}

/**
 * Toggle a menu item on or off.
 *
 * @param {HTMLElement} target
 * @param {number} duration
 */
function chekin2020MenuToggle( target, duration ) {
	var initialParentHeight, finalParentHeight, menu, menuItems, transitionListener,
		initialPositions = [],
		finalPositions = [];

	if ( ! target ) {
		return;
	}

	menu = target.closest( '.menu-wrapper' );

	// Step 1: look at the initial positions of every menu item.
	menuItems = menu.querySelectorAll( '.menu-item' );

	menuItems.forEach( function( menuItem, index ) {
		initialPositions[ index ] = { x: menuItem.offsetLeft, y: menuItem.offsetTop };
	} );
	initialParentHeight = target.parentElement.offsetHeight;

	target.classList.add( 'toggling-target' );

	// Step 2: toggle target menu item and look at the final positions of every menu item.
	target.classList.toggle( 'active' );

	menuItems.forEach( function( menuItem, index ) {
		finalPositions[ index ] = { x: menuItem.offsetLeft, y: menuItem.offsetTop };
	} );
	finalParentHeight = target.parentElement.offsetHeight;

	// Step 3: close target menu item again.
	// The whole process happens without giving the browser a chance to render, so it's invisible.
	target.classList.toggle( 'active' );

	/*
	 * Step 4: prepare animation.
	 * Position all the items with absolute offsets, at the same starting position.
	 * Shouldn't result in any visual changes if done right.
	 */
	menu.classList.add( 'is-toggling' );
	target.classList.toggle( 'active' );
	menuItems.forEach( function( menuItem, index ) {
		var initialPosition = initialPositions[ index ];
		if ( initialPosition.y === 0 && menuItem.parentElement === target ) {
			initialPosition.y = initialParentHeight;
		}
		menuItem.style.transform = 'translate(' + initialPosition.x + 'px, ' + initialPosition.y + 'px)';
	} );

	/*
	 * The double rAF is unfortunately needed, since we're toggling CSS classes, and
	 * the only way to ensure layout completion here across browsers is to wait twice.
	 * This just delays the start of the animation by 2 frames and is thus not an issue.
	 */
	requestAnimationFrame( function() {
		requestAnimationFrame( function() {
			/*
			 * Step 5: start animation by moving everything to final position.
			 * All the layout work has already happened, while we were preparing for the animation.
			 * The animation now runs entirely in CSS, using cheap CSS properties (opacity and transform)
			 * that don't trigger the layout or paint stages.
			 */
			menu.classList.add( 'is-animating' );
			menuItems.forEach( function( menuItem, index ) {
				var finalPosition = finalPositions[ index ];
				if ( finalPosition.y === 0 && menuItem.parentElement === target ) {
					finalPosition.y = finalParentHeight;
				}
				if ( duration !== undefined ) {
					menuItem.style.transitionDuration = duration + 'ms';
				}
				menuItem.style.transform = 'translate(' + finalPosition.x + 'px, ' + finalPosition.y + 'px)';
			} );
			if ( duration !== undefined ) {
				target.style.transitionDuration = duration + 'ms';
			}
		} );

		// Step 6: finish toggling.
		// Remove all transient classes when the animation ends.
		transitionListener = function() {
			menu.classList.remove( 'is-animating' );
			menu.classList.remove( 'is-toggling' );
			target.classList.remove( 'toggling-target' );
			menuItems.forEach( function( menuItem ) {
				menuItem.style.transform = '';
				menuItem.style.transitionDuration = '';
			} );
			target.style.transitionDuration = '';
			target.removeEventListener( 'transitionend', transitionListener );
		};

		target.addEventListener( 'transitionend', transitionListener );
	} );
}

/**
 * Traverses the DOM up to find elements matching the query.
 *
 * @param {HTMLElement} target
 * @param {string} query
 * @return {NodeList} parents matching query
 */
function chekin2020FindParents( target, query ) {
	var parents = [];

	// Recursively go up the DOM adding matches to the parents array.
	function traverse( item ) {
		var parent = item.parentNode;
		if ( parent instanceof HTMLElement ) {
			if ( parent.matches( query ) ) {
				parents.push( parent );
			}
			traverse( parent );
		}
	}

	traverse( target );

	return parents;
}

// Additional JS

var $ = jQuery

var classAlias = {
	'check-in-online': 'online-check-in',
	'legalidad' : 'legal-compliance',
	'verificacion-de-identidad': 'identity-verification',
	'tasas-turisticas': 'tourist-taxes',
	'pagos' : 'payment',
	'payments' : 'payment'
}

$(document).ready(function(){
	$('.primary-menu > li:not(:last-child) > .sub-menu li').each(function(){

		var url = $(this).find('a').attr('href').split('/');
    		className = url[url.length - 2]

    	if( classAlias[className] ){
    		className = classAlias[className]
    	}

		if( ! $(this).hasClass('has-icon') ){
			$(this).addClass( 'has-icon has-icon-' + className )	
		}
	})
	
})