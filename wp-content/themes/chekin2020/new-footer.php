  <?php
	
	$upselling_popup = '';
	
	if( ICL_LANGUAGE_CODE == 'es' ) {
		$upselling_popup = '[elementor-template id="34226"]';
	}else{
		$upselling_popup = '[elementor-template id="34320"]';
	}
	
	// echo do_shortcode($upselling_popup); 
	
	?>

	<!-- FOOTER MARKUP STARTS HERE -->
  <footer>
    <div class="footer-wrapper">

      <div class="footer-social"><?php the_field( 'footer_social_menu', 'option' ); ?></div> <!-- footer-social Ends -->
      <div class="footer-top-account"><?php the_field( 'footer_top_menu', 'option' ); ?></div> <!-- footer-top-account Ends -->

      <div class="footer-bottom">
        <div class="footer-left">

          <?php if( have_rows( 'footer_links', 'option' ) ) : ?>

          <div class="footer-links-wrap">

            <?php while( have_rows( 'footer_links', 'option' ) ) : the_row(); ?>

            <div class="footer-links-wrap-item"><?php the_sub_field( 'footer_link_text' ); ?></div> <!-- footer-links-wrap-item Ends -->

            <?php endwhile; ?>

          </div> <!-- footer-links-wrap Ends -->

          <?php endif; ?>
        </div>
        <div class="footer-right">
          <div class="hubspot-signup-form">
              <?php dynamic_sidebar( 'sidebar-7' ); ?>
            </div>
        </div>
      </div>

      <a href="<?php the_field( 'footer_logo_link', 'option' ); ?>" class="footer-logo" aria-label="Chekin"><img class="lazyload" src="<?php the_field( 'footer_logo', 'option' ); ?>"  width="82" height="24" alt="Chekin"></a>
    </div> <!-- footer-wrapper Ends -->
	  <?php if ( is_active_sidebar( 'sidebar-9' ) ) { /*?>
	  <div class="disclaimer">
		  <div class="footer-wrapper">
		  	<?php dynamic_sidebar( 'sidebar-9' ); ?>
		  </div>
	  </div>
	  <?php */ } ?>
  </footer>
  <!-- FOOTER MARKUP ENDS HERE -->
  <?php wp_footer(); ?>

  <script async defer src="<?php echo get_template_directory_uri(); ?>/assets/js/owl.carousel.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/svg-pan-zoom@3.6.1/dist/svg-pan-zoom.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/StephanWagner/svgMap@v2.10.1/dist/svgMap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<?php /* ?>
<script>
			(function($) {

				var Defaults = $.fn.select2.amd.require('select2/defaults');

				$.extend(Defaults.defaults, {
					searchInputPlaceholder: ''
				});

				var SearchDropdown = $.fn.select2.amd.require('select2/dropdown/search');

				var _renderSearchDropdown = SearchDropdown.prototype.render;

				SearchDropdown.prototype.render = function(decorated) {

					// invoke parent method
					var $rendered = _renderSearchDropdown.apply(this, Array.prototype.slice.apply(arguments));

					this.$search.attr('placeholder', this.options.get('searchInputPlaceholder'));

					return $rendered;
				};

			})(window.jQuery);
			
			//Prevent select2 from flipping the dropdown upward
			
			(function($) {

				var Defaults = $.fn.select2.amd.require('select2/defaults');
			  
			  $.extend(Defaults.defaults, {
				dropdownPosition: 'auto'
			  });
			  
				var AttachBody = $.fn.select2.amd.require('select2/dropdown/attachBody');
			  
			  var _positionDropdown = AttachBody.prototype._positionDropdown;
			  
			  AttachBody.prototype._positionDropdown = function() {
			   
				var $window = $(window);
			   
					var isCurrentlyAbove = this.$dropdown.hasClass('select2-dropdown--above');
					var isCurrentlyBelow = this.$dropdown.hasClass('select2-dropdown--below');
			   
					var newDirection = null;
			   
					var offset = this.$container.offset();
			   
					offset.bottom = offset.top + this.$container.outerHeight(false);
					
					var container = {
						height: this.$container.outerHeight(false)
					};
				
				container.top = offset.top;
				container.bottom = offset.top + container.height;

				var dropdown = {
				  height: this.$dropdown.outerHeight(false)
				};

				var viewport = {
				  top: $window.scrollTop(),
				  bottom: $window.scrollTop() + $window.height()
				};

				var enoughRoomAbove = viewport.top < (offset.top - dropdown.height);
				var enoughRoomBelow = viewport.bottom > (offset.bottom + dropdown.height);
				
				var css = {
				  left: offset.left,
				  top: container.bottom
				};

				// Determine what the parent element is to use for calciulating the offset
				var $offsetParent = this.$dropdownParent;

				// For statically positoned elements, we need to get the element
				// that is determining the offset
				if ($offsetParent.css('position') === 'static') {
				  $offsetParent = $offsetParent.offsetParent();
				}

				var parentOffset = $offsetParent.offset();

				css.top -= parentOffset.top
				css.left -= parentOffset.left;
				
				var dropdownPositionOption = this.options.get('dropdownPosition');
				
					if (dropdownPositionOption === 'above' || dropdownPositionOption === 'below') {
				
						newDirection = dropdownPositionOption;
				
				} else {
						
					if (!isCurrentlyAbove && !isCurrentlyBelow) {
							newDirection = 'below';
						}

						if (!enoughRoomBelow && enoughRoomAbove && !isCurrentlyAbove) {
						newDirection = 'above';
						} else if (!enoughRoomAbove && enoughRoomBelow && isCurrentlyAbove) {
						newDirection = 'below';
						}
				
				}

				if (newDirection == 'above' ||
					(isCurrentlyAbove && newDirection !== 'below')) {
				  css.top = container.top - parentOffset.top - dropdown.height;
				}

				if (newDirection != null) {
				  this.$dropdown
					.removeClass('select2-dropdown--below select2-dropdown--above')
					.addClass('select2-dropdown--' + newDirection);
				  this.$container
					.removeClass('select2-container--below select2-container--above')
					.addClass('select2-container--' + newDirection);
				}

				this.$dropdownContainer.css(css);
			   
			  };
			  
			})(window.jQuery);
		</script>
		<script>
			var searchText = "<?php _e('Search', 'chekin2020'); ?>...";
			jQuery(document).ready(function() {
				jQuery("select.form-control > option[value='']").attr('disabled', 'disabled');
				jQuery('.js-example-basic-single').select2({
					searchInputPlaceholder: searchText,
					dropdownCssClass: "dropdown-search-no",
					dropdownPosition: 'below',
				});
				
				jQuery('select.your-pms').select2({
					searchInputPlaceholder: searchText,
					dropdownCssClass: "dropdown-search",
					dropdownPosition: 'below',
					//sorter: data => data.sort((a, b) => a.text.localeCompare(b.text)),
				});

			}); 
		</script>
 <?php */ ?>
  <?php if ( $admin_bar ) { ?>
    <!-- <script src="<?php // echo includes_url(); ?>js/admin-bar.min.js?ver=5.7.2" id="admin-bar-js"></script> -->
  <?php } ?>


    <!--  Active campaign live on Salesforce START -->
  <script type="text/javascript">
      (function(e,t,o,n,p,r,i){e.visitorGlobalObjectAlias=n;e[e.visitorGlobalObjectAlias]=e[e.visitorGlobalObjectAlias]||function(){(e[e.visitorGlobalObjectAlias].q=e[e.visitorGlobalObjectAlias].q||[]).push(arguments)};e[e.visitorGlobalObjectAlias].l=(new Date).getTime();r=t.createElement("script");r.src=o;r.async=true;i=t.getElementsByTagName("script")[0];i.parentNode.insertBefore(r,i)})(window,document,"https://diffuser-cdn.app-us1.com/diffuser/diffuser.js","vgo");
      vgo('setAccount', '66691622');
      vgo('setTrackByDefault', true);
      vgo('process');
  </script>
  <!--  Active campaign live on Salesforce END -->

  <?php /* ?>
  <!-- Start of Async Drift Code -->
  <script>
  "use strict";

  function LoadDriftWidget() {
    var t = window.driftt = window.drift = window.driftt || [];
    if (!t.init) {
      if (t.invoked) return void (window.console && console.error && console.error("Drift snippet included twice."));
      t.invoked = !0, t.methods = [ "identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on" ], 
      t.factory = function(e) {
        return function() {
          var n = Array.prototype.slice.call(arguments);
          return n.unshift(e), t.push(n), t;
        };
      }, t.methods.forEach(function(e) {
        t[e] = t.factory(e);
      }), t.load = function(t) {
        var e = 3e5, n = Math.ceil(new Date() / e) * e, o = document.createElement("script");
        o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + n + "/" + t + ".js";
        var i = document.getElementsByTagName("script")[0];
        i.parentNode.insertBefore(o, i);
      };
    }
  drift.SNIPPET_VERSION = '0.3.1';
  drift.load('4f8efreybtzp');
  }

  //load after waiting 5000 milliseconds, 5 seconds
  setTimeout(function(){ 
       window.onload = function(){ LoadDriftWidget() }
  }, 10000)

  </script>
  <!-- End of Async Drift Code -->
  <?php */ ?>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script async defer src="<?php echo get_template_directory_uri(); ?>/assets/js/main.js?v=<?php echo time(); ?>"></script>
 
<?php $original_id = 23966; // Original page ID
    $translated_ids = apply_filters('wpml_object_id', $original_id, 'page', true);
    
    if (is_page($translated_ids)) { ?>
		
	 <?php if( get_the_ID() == '28939' || get_the_ID() == '28940' ) { // Pricing //22972 is ES homepages added for A/B ?>
	  <script async defer src="<?php echo get_template_directory_uri(); ?>/assets/js/pricing-22.js"></script>
	  <?php }else{ ?>
	  <script async defer src="<?php echo get_template_directory_uri(); ?>/assets/js/pricing.js?v=<?php echo time(); ?>"></script>
	  <?php } ?>
  
<?php } ?>

<script>
		jQuery(document).ready(function(){	
		
			// Event name: Register START
			jQuery('html').on('click', '.lang-login ul li.has-btn-primary > a, .sign-up-free:not(.form-btn-2) > a, .main-service > .wp-block-group__inner-container > .wp-block-buttons > .wp-block-button > a, body:not(.integraciones) .video-area .wp-block-buttons > .wp-block-button > a, .feature-area > .wp-block-group__inner-container > .wp-block-buttons > .wp-block-button:not(.form-btn-2) > a, .brand-area > .wp-block-group__inner-container > .wp-block-buttons > .wp-block-button > a, .pricing-table .wp-block-column.basic .wp-block-button > a, .pricing-table .wp-block-column.popular .wp-block-button.action-button-custom > a', function(){
				gtag('event', 'click', {'event_category': 'Register', 'event_label': 'Register', 'value': '1'});
				console.log('gtag: Register');
			});
			// Event name: Register END
			
			
			// Event name: Contact START
			jQuery('html').on('click', '.nav-menu ul li.get-form > a, .footer-top-account ul li a, .pricing-table .wp-block-column:last-child .wp-block-button > a, .signup input[type=submit], .faq .wp-block-button.form-btn > a, .banner-area .right .wp-block-button > a, .integraciones .video-area .wp-block-buttons .wp-block-button__link', function(){
				gtag('event', 'click', {'event_category': 'Contact', 'event_label': 'Contact', 'value': '1'});
				console.log('gtag: Contact');
			});
			// Event name: Contact END
			
			
			// Event name: Book Demo START
			jQuery('html').on('click', '.wp-block-group:not(.faq) .form-btn .wp-block-button__link, .form-btn-2 .wp-block-button__link', function(){
				gtag('event', 'click', {'event_category': 'Book Demo', 'event_label': 'Book Demo', 'value': '1'});
				console.log('gtag: Book Demo');
			});
			// Event name: Book Demo END
			
			// Event name: Login START
			jQuery('html').on('click', '.lang-login ul li.has-btn-outline-primary > a, .lang-login > ul > li.has-login > a', function(){
				gtag('event', 'click', {'event_category': 'Login', 'event_label': 'Login', 'value': '1'});
				console.log('gtag: Login');
			});
			// Event name: Login END
			
		});
	</script>

  <?php /* if( ICL_LANGUAGE_CODE == 'es' ) { ?>
  <script>
  $ = jQuery

  $('.sign-up-free .wp-block-button__link').on('click', function(){
    gtag('event', 'click', {'event_category': 'Registrate gratis', 'event_label': 'Registrate gratis', 'value': '1'})
  })
  $('#menu-main-menu > li:last-child > a').on('click', function(){
    gtag('event', 'click', {'event_category': 'Contacta con ventas', 'event_label': 'Contacta con ventas', 'value': '1'});
  })

  </script>
  <?php } ?>

  <?php if( ICL_LANGUAGE_CODE == 'en' ) { ?>
  <script>
  $ = jQuery
    
  $('.sign-up-free .wp-block-button__link').on('click', function(){
    gtag('event', 'click', {'event_category': 'Try for free', 'event_label': 'Try for free', 'value': '1'});
  })
  $('#menu-main-menu > li:last-child > a').on('click', function(){
    gtag('event', 'click', {'event_category': 'Contact sales', 'event_label': 'Contact sales', 'value': '1'});
  })

  </script>
  <?php } ?>

  <?php if( ICL_LANGUAGE_CODE == 'pt' ) { ?>
  <script>
  $ = jQuery
    
  $('.sign-up-free .wp-block-button__link').on('click', function(){
    gtag('event', 'click', {'event_category': 'Try for free', 'event_label': 'Try for free', 'value': '1'});
  })
  $('#menu-main-menu > li:last-child > a').on('click', function(){
    gtag('event', 'click', {'event_category': 'Contact sales', 'event_label': 'Contact sales', 'value': '1'});
  })

  </script>
  <?php } ?>

  <?php if( ICL_LANGUAGE_CODE == 'it' ) { ?>
  <script>
  $ = jQuery
    
  $('.sign-up-free .wp-block-button__link').on('click', function(){  
    gtag('event', 'click', {'event_category': 'Registrate gratis', 'event_label': 'Registrate gratis', 'value': '1'});
  })
  $('.try-it-free .wp-block-button__link').on('click', function(){
    gtag('event', 'click', {'event_category': 'Pruébalo Gratis', 'event_label': 'Pruébalo Gratis', 'value': '1'});
  })
  $('#menu-main-menu > li:last-child > a').on('click', function(){
    gtag('event', 'click', {'event_category': 'Contacta con ventas', 'event_label': 'Contacta con ventas', 'value': '1'});
  })

  </script>
  <?php } */ ?>

  <div class="form-popup form-popup-1">
      <div class="form-popup-inner">
        <span class="close"><img src="https://chekin.com/wp-content/uploads/2021/06/close.svg"  alt="" width="16" height="15" /></span>
       <?php  if( ICL_LANGUAGE_CODE != 'it' ) { ?> <img class="popup-logo" src="https://f.hubspotusercontent10.net/hubfs/8776616/Logo%20nuevo%20azul-1.png" alt="Welcome to chekin. We will contact you ASAP." width="1132" height="332"> <?php } ?> 
        <?php

        if( ICL_LANGUAGE_CODE == 'es' ) { $form_id = '"c8eeb14e-1697-4d6a-b0c3-dcd2fc0a353b"'; }
        if( ICL_LANGUAGE_CODE == 'en' ) { $form_id = '"6ffe3906-8d04-484b-a0fe-a1bad6225621"'; }
		if( ICL_LANGUAGE_CODE == 'de' ) { $form_id = '"ce2a6410-bf3b-49bd-b4cf-7efd47ecb92b"'; }
        if( ICL_LANGUAGE_CODE == 'pt' ) { $form_id = '"3dec54e3-d457-43ba-a3d6-241a51d61821"'; }
        if( ICL_LANGUAGE_CODE == 'it' ) { $form_id = '"e1e67ef3-28f4-4eb5-9df6-61b74715d9c3"'; }
        if( ICL_LANGUAGE_CODE == 'fr' ) { $form_id = '"f051da64-280e-45b2-b9fb-13639a30bee0"'; }

        ?>

        <!--[if lte IE 8]>
        <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
        <![endif]-->
        <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
        <script>
          hbspt.forms.create({
                region: "na1",
                portalId: "8776616",
                formId: <?php echo $form_id; ?>
        });
        </script>

      </div>
  </div>

  <?php // if( get_the_ID() == '24774' || get_the_ID() == '24775' || get_the_ID() == '29499' ) { // Experience ?>
  <?php if( get_the_ID() == '24774' || get_the_ID() == '24775' || get_the_ID() == '31256' || get_the_ID() == '43345' ) { // Experience /experiencias-2023/(43345) ?>

  <div class="form-popup form-popup-2">
      <div class="form-popup-inner">
        <span class="close"><img src="https://chekin.com/wp-content/uploads/2021/06/close.svg" alt="" width="16" height="15" /></span>
        <?php

        if( ICL_LANGUAGE_CODE == 'es' ) { $form_id_2 = '"aad7b241-7f24-4c13-ae40-6b3f771c313e"'; }
        if( ICL_LANGUAGE_CODE == 'en' || ICL_LANGUAGE_CODE == 'de' ) { $form_id_2 = '"8332d80c-24ea-4e3d-b5fc-aef77020783c"'; }
        if( ICL_LANGUAGE_CODE == 'pt' ) { $form_id_2 = '"c424cf84-c4fe-4990-802e-9787a8e8e16c"'; }
        if( ICL_LANGUAGE_CODE == 'it' ) { $form_id_2 = '"c424cf84-c4fe-4990-802e-9787a8e8e16c"'; }

        ?>

        <!--[if lte IE 8]>
        <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
        <![endif]-->
        <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
        <script>
          hbspt.forms.create({
          region: "na1",
          portalId: "8776616",
          formId: <?php echo $form_id_2; ?>
        });
        </script>

      </div>
  </div>
  <?php } ?>

<?php // if( get_the_ID() == '24774' || get_the_ID() == '24775' || get_the_ID() == '31256' ) { // Experience ?>

  <div class="form-popup form-popup-biglead vr">
      <div class="form-popup-inner">
        <span class="close"><img src="https://chekin.com/wp-content/uploads/2021/06/close.svg" alt="" width="16" height="15" /></span>
		<img class="popup-logo" src="https://f.hubspotusercontent10.net/hubfs/8776616/Logo%20nuevo%20azul-1.png" alt="Welcome to chekin. We will contact you ASAP." width="1132" height="332">
        <?php

        if( ICL_LANGUAGE_CODE == 'es' ) { $form_id_3 = '"0de41ec2-23f4-4636-89a6-35a35be97fb7"'; }
        if( ICL_LANGUAGE_CODE == 'en' ||  ICL_LANGUAGE_CODE == 'de' ) { $form_id_3 = '"a4a3f5c9-2e0d-43cc-adde-72919b4e1b04"'; }
        if( ICL_LANGUAGE_CODE == 'pt' ) { $form_id_3 = '"a4a3f5c9-2e0d-43cc-adde-72919b4e1b04"'; }
        if( ICL_LANGUAGE_CODE == 'it' ) { $form_id_3 = '"a4a3f5c9-2e0d-43cc-adde-72919b4e1b04"'; }
        if( ICL_LANGUAGE_CODE == 'fr' ) { $form_id_3 = '"a4a3f5c9-2e0d-43cc-adde-72919b4e1b04"'; } 

        ?>

        <!--[if lte IE 8]>
        <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
        <![endif]-->
        <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
        <script>
          hbspt.forms.create({
          region: "na1",
          portalId: "8776616",
          formId: <?php echo $form_id_3; ?>
        });
        </script>

      </div>
  </div>
  
  <div class="form-popup form-popup-biglead hotel">
      <div class="form-popup-inner">
        <span class="close"><img src="https://chekin.com/wp-content/uploads/2021/06/close.svg" alt="" width="16" height="15" /></span>
		<img class="popup-logo" src="https://f.hubspotusercontent10.net/hubfs/8776616/Logo%20nuevo%20azul-1.png" alt="Welcome to chekin. We will contact you ASAP." width="1132" height="332">
        <?php

        if( ICL_LANGUAGE_CODE == 'es' ) { $form_id_3 = '"01869a7f-4c43-44be-afeb-722a09e64c15"'; }
        if( ICL_LANGUAGE_CODE == 'en' || ICL_LANGUAGE_CODE == 'en' ) { $form_id_3 = '"5e93b8b2-9c4f-4e34-bffd-e1a183a448e2"'; }
        if( ICL_LANGUAGE_CODE == 'pt' ) { $form_id_3 = '"5e93b8b2-9c4f-4e34-bffd-e1a183a448e2"'; }
        if( ICL_LANGUAGE_CODE == 'it' ) { $form_id_3 = '"5e93b8b2-9c4f-4e34-bffd-e1a183a448e2"'; }
        if( ICL_LANGUAGE_CODE == 'fr' ) { $form_id_3 = '"5e93b8b2-9c4f-4e34-bffd-e1a183a448e2"'; }

        ?>

        <!--[if lte IE 8]>
        <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
        <![endif]-->
        <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
        <script>
          hbspt.forms.create({
          region: "na1",
          portalId: "8776616",
          formId: <?php echo $form_id_3; ?>
        });
        </script>

      </div>
  </div>
  <?php // } ?>  

<div class="form-popup form-popup-selfchekin">
      <div class="form-popup-inner">
        <span class="close"><img src="https://chekin.com/wp-content/uploads/2021/06/close.svg" alt=""  width="16" height="15" /></span>
      <?php if( ICL_LANGUAGE_CODE == 'es' ) { ?>  <img class="popup-logo" src="https://f.hubspotusercontent10.net/hubfs/8776616/Logo%20nuevo%20azul-1.png" alt="Welcome to chekin. We will contact you ASAP." width="1132" height="332"> <br><br>
        <?php }

        if( ICL_LANGUAGE_CODE == 'es' ) { $form_id = '"60f320f3-20aa-4fc2-89d2-c6f1bf1d6062"'; }
        if( ICL_LANGUAGE_CODE == 'en' || ICL_LANGUAGE_CODE == 'de' ) { $form_id = '"6ffe3906-8d04-484b-a0fe-a1bad6225621"'; }
        if( ICL_LANGUAGE_CODE == 'pt' ) { $form_id = '"3dec54e3-d457-43ba-a3d6-241a51d61821"'; }
        if( ICL_LANGUAGE_CODE == 'it' ) { $form_id = '"97410357-87ae-4caa-b193-d4ecbfea02d5"'; }
        if( ICL_LANGUAGE_CODE == 'fr' ) { $form_id = '"f051da64-280e-45b2-b9fb-13639a30bee0"'; }

        ?>

        <!--[if lte IE 8]>
        <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
        <![endif]-->
        <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
        <script>
          hbspt.forms.create({
                region: "na1",
                portalId: "8776616",
                formId: <?php echo $form_id; ?>
        });
        </script>

      </div>
  </div> 
  
  <!-- Start of HubSpot Embed Code -->
  <script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/8776616.js"></script>
  <!-- End of HubSpot Embed Code -->
<?php /* ?>
  <script type="text/javascript">
  _linkedin_partner_id = "3089577";
  window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
  window._linkedin_data_partner_ids.push(_linkedin_partner_id);
  </script><script type="text/javascript">
  (function(){var s = document.getElementsByTagName("script")[0];
  var b = document.createElement("script");
  b.type = "text/javascript";b.async = true;
  b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
  s.parentNode.insertBefore(b, s);})();
  </script>
  <noscript>
  <img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=3089577&fmt=gif" />
  </noscript>
<?php */ ?>

<!--Linkedin START -->
<?php /* ?>	<script type="text/javascript">
		_linkedin_partner_id = "4242730";
		window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
		window._linkedin_data_partner_ids.push(_linkedin_partner_id);
		</script><script type="text/javascript">
		(function(l) {
		if (!l){window.lintrk = function(a,b){window.lintrk.q.push([a,b])};
		window.lintrk.q=[]}
		var s = document.getElementsByTagName("script")[0];
		var b = document.createElement("script");
		b.type = "text/javascript";b.async = true;
		b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
		s.parentNode.insertBefore(b, s);})(window.lintrk);
		</script>
		<noscript>
		<img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=4242730&fmt=gif" />
		</noscript> <?php */ ?>
<?php /* ?><script type="text/javascript"> _linkedin_partner_id = "4242730"; window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || []; window._linkedin_data_partner_ids.push(_linkedin_partner_id); </script><script type="text/javascript"> (function(l) { if (!l){window.lintrk = function(a,b){window.lintrk.q.push([a,b])}; window.lintrk.q=[]} var s = document.getElementsByTagName("script")[0]; var b = document.createElement("script"); b.type = "text/javascript";b.async = true; b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js"; s.parentNode.insertBefore(b, s);})(window.lintrk); </script> <noscript> <img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=4242730&fmt=gif" /> </noscript> <?php */ ?>
<!--Linkedin END -->

<script>
 <?php /* */ ?>
	  // Text rotate START
	  var TxtRotate = function (el, toRotate, period) {
	  this.toRotate = toRotate;
	  this.el = el;
	  this.loopNum = 0;
	  this.period = parseInt(period, 10) || 2000;
	  this.txt = "";
	  this.tick();
	  this.isDeleting = false;
	};

	TxtRotate.prototype.tick = function () {
	  var i = this.loopNum % this.toRotate.length;
	  var fullTxt = this.toRotate[i];

	  if (this.isDeleting) {
		this.txt = fullTxt.substring(0, this.txt.length - 1);
	  } else {
		this.txt = fullTxt.substring(0, this.txt.length + 1);
	  }

	  this.el.innerHTML = '<span class="wrap">' + this.txt + "</span>";

	  var that = this;
	  var delta = 130 - Math.random() * 100;

	  if (this.isDeleting) {
		delta /= 2;
	  }

	  if (!this.isDeleting && this.txt === fullTxt) {
		delta = this.period;
		this.isDeleting = true;
	  } else if (this.isDeleting && this.txt === "") {
		this.isDeleting = false;
		this.loopNum++;
		delta = 300;
	  }

	  setTimeout(function () {
		that.tick();
	  }, delta);
	};

	window.onload = function () {
	  setTimeout(function(){
		  var elements = document.getElementsByClassName("txt-rotate");
		  for (var i = 0; i < elements.length; i++) {
			var toRotate = elements[i].getAttribute("data-rotate");
			var period = elements[i].getAttribute("data-period");
			if (toRotate) {
			  new TxtRotate(elements[i], JSON.parse(toRotate), period);
			}
		  }
		  // INJECT CSS
		  var css = document.createElement("style");
		  css.type = "text/css";
		  css.innerHTML = ".txt-rotate > .wrap { border-right: 0.08em solid #666 }";
		 // document.body.appendChild(css);
		},100 );
	};
	
	// Text rotate END
	 <?php /* */ ?>
</script>
</body>

</html>