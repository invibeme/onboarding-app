<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Chekin_2020
 * @since Chekin 2020 1.0
 */

?>

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
		  <footer class="footer">
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

		      <a href="<?php the_field( 'footer_logo_link', 'option' ); ?>" class="footer-logo" aria-label="Chekin"><img class="lazyload" src="<?php the_field( 'footer_logo', 'option' ); ?>" width="82" height="24" alt="Chekin"></a>
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
		
		<script async defer src="<?php echo get_template_directory_uri(); ?>/assets/js/main.js"></script>
		<?php if ( !is_home() && !is_archive() && !is_search() && !is_single() ) { ?>
		<script async defer src="<?php echo get_template_directory_uri(); ?>/assets/js/pricing.js"></script>
		<?php } ?>
		
<!--  Active campaign live on Salesforce START -->
<script type="text/javascript">
    (function(e,t,o,n,p,r,i){e.visitorGlobalObjectAlias=n;e[e.visitorGlobalObjectAlias]=e[e.visitorGlobalObjectAlias]||function(){(e[e.visitorGlobalObjectAlias].q=e[e.visitorGlobalObjectAlias].q||[]).push(arguments)};e[e.visitorGlobalObjectAlias].l=(new Date).getTime();r=t.createElement("script");r.src=o;r.async=true;i=t.getElementsByTagName("script")[0];i.parentNode.insertBefore(r,i)})(window,document,"https://diffuser-cdn.app-us1.com/diffuser/diffuser.js","vgo");
    vgo('setAccount', '66691622');
    vgo('setTrackByDefault', true);
    vgo('process');
</script>
<!--  Active campaign live on Salesforce END -->


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
gtag('event', 'click', {'event_category': 'Try for free', 'event_label': 'Try for free', 'value': '1'});
})
$('#menu-main-menu > li:last-child > a').on('click', function(){
gtag('event', 'click', {'event_category': 'Contact sales', 'event_label': 'Contact sales', 'value': '1'});
})

</script>
<?php } */ ?>

<div class="form-popup form-popup-1">
  <div class="form-popup-inner">
    <span class="close"><img src="https://chekin.com/wp-content/uploads/2021/06/close.svg" alt=""  width="16" height="15" /></span>
    <img class="popup-logo" src="https://f.hubspotusercontent10.net/hubfs/8776616/Logo%20nuevo%20azul-1.png" alt="Welcome to chekin. We will contact you ASAP." width="1132" height="332">
    <?php

    if( ICL_LANGUAGE_CODE == 'es' ) { $form_id = '"c8eeb14e-1697-4d6a-b0c3-dcd2fc0a353b"'; }
    if( ICL_LANGUAGE_CODE == 'en' ) { $form_id = '"6ffe3906-8d04-484b-a0fe-a1bad6225621"'; }
    if( ICL_LANGUAGE_CODE == 'pt' ) { $form_id = '"3dec54e3-d457-43ba-a3d6-241a51d61821"'; }
    if( ICL_LANGUAGE_CODE == 'it' ) { $form_id = '"e1e67ef3-28f4-4eb5-9df6-61b74715d9c3"'; }

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
<!-- Start of LinkedIn Code -->
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
<!-- End of LinkedIn Code -->
<?php */ ?>
<!--Linkedin START -->
	<?php /* ?><script type="text/javascript">
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
		</noscript>
		<?php */ ?>
<?php /* ?><script type="text/javascript"> _linkedin_partner_id = "4242730"; window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || []; window._linkedin_data_partner_ids.push(_linkedin_partner_id); </script><script type="text/javascript"> (function(l) { if (!l){window.lintrk = function(a,b){window.lintrk.q.push([a,b])}; window.lintrk.q=[]} var s = document.getElementsByTagName("script")[0]; var b = document.createElement("script"); b.type = "text/javascript";b.async = true; b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js"; s.parentNode.insertBefore(b, s);})(window.lintrk); </script> <noscript> <img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=4242730&fmt=gif" /> </noscript><?php */ ?>
<!--Linkedin END -->		
	
	</body>
</html>
