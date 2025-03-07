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


<?php /* */ ?>
<script type="text/javascript" id='inline_exclusions_list_1' nowprocket>
var roomNumberSelectedText = "<?php _e( 'Number of rooms', 'chekin2020' ); ?>";
var propertiesNumberSelectedText = "<?php _e( 'Number of properties', 'chekin2020' ); ?>";
var pms = "<?php echo $_GET['pms'] ?>";

//jQuery( ".erf-reg-form-container .erf-submit-button" ).after( "<p class='have_acc  pt-0 mb-0'><?php _e( 'Do you already have an account?', 'chekin2020' ); ?> <a class='have_acc_link' href='<?php the_permalink(91) ?>'><?php _e( 'Login', 'chekin2020' ); ?></a></p>" );
if (pms != 'Smoobu') {
	jQuery( ".erf-reg-form-container .erf-form-html" ).append( "<p id='free-trial' class='have_acc trial pt-0 mb-0'><?php _e( 'Free trial for 14 days.', 'chekin2020' ); ?> </p>" );
}
jQuery('.sec-contents .contents .wp-block-group__inner-container').prepend('<button type="button" class="button btn-link header-btn-back">Atrás</button>');
//jQuery( ".erf-login-container" ).append( "<p class='have_acc dont_haveaccount  pt-0 mb-0'><?php _e( 'Don’t have an account?', 'chekin2020' ); ?>  <a class='have_acc_link' href='<?php the_permalink(243) ?>'><?php _e( 'Start for free', 'chekin2020' ); ?></a></p>" );
jQuery( ".erf-login-form.erf-form" ).prepend( "<h2><?php _e( 'Login', 'chekin2020' ); ?></h2>" );


// Hubspot AutoComplete off
window.addEventListener('message', event => {
   if(event.data.type === 'hsFormCallback' && event.data.eventName === 'onFormReady') {
       jQuery('form input').attr('autocomplete', 'off');
   }
   
});

</script>
<?php /* */ ?>
			<footer id="site-footer" role="contentinfo" class="header-footer-group">

				<div class="section-inner">

			
					<?php if ( is_active_sidebar( 'sidebar-2' )) { ?>

						<div class="footer-logo text-center">
							<?php dynamic_sidebar( 'sidebar-2' ); ?>
						</div>

					<?php } ?>
				
				</div><!-- .section-inner -->

			</footer><!-- #site-footer -->

		<?php wp_footer(); ?>
<?php /* */ ?>		
<div class="popup popup-welcome " id="popup-welcome">
	<div class="popup-inner has-text-center"> 
		<span class="close"><svg xmlns="http://www.w3.org/2000/svg" width="15.562" height="15.364" viewBox="0 0 15.562 15.364"><defs><style>.a{fill:none;stroke:#395bf8;stroke-linecap:round;stroke-width:1.8px;}</style></defs><g transform="translate(-10.872 -10.735)"><g transform="matrix(0.719, -0.695, 0.695, 0.719, 5.868, 18.068)"><line class="a" y2="17.746" transform="translate(8.725 0)"></line><line class="a" y2="17.748" transform="translate(17.748 9.395) rotate(90)"></line></g></g></svg></span>
		<figure><img src="https://chekin.com/onboarding/wp-content/uploads/2022/05/welcome-icon@2x.png" class="welcome-icon" width="110" height="110" alt="" ></figure>
		<h2 class="title"><?php _e( 'Welcome!', 'chekin2020'); ?></h2>
		<p><?php _e( 'First thing you have to do is to create an account in Chekin (it is quick and simple):', 'chekin2020'); ?></p>
		<p><a href="#" class="button"><?php _e( 'Let’s start!', 'chekin2020'); ?></a></p>
		<p class="have_acc  pt-0 mb-0"><?php _e( 'Do you already have an account?', 'chekin2020'); ?>  <a class="have_acc_link" href="<?php the_permalink(91); ?>"><?php _e( 'Login', 'chekin2020'); ?></a></p>
	</div>
</div>
<div class="popup popup-welcome  popup-2fa" id="popup-2fa">
	<div class="popup-inner"> 
		<span class="close"><svg xmlns="http://www.w3.org/2000/svg" width="15.562" height="15.364" viewBox="0 0 15.562 15.364"><defs><style>.a{fill:none;stroke:#395bf8;stroke-linecap:round;stroke-width:1.8px;}</style></defs><g transform="translate(-10.872 -10.735)"><g transform="matrix(0.719, -0.695, 0.695, 0.719, 5.868, 18.068)"><line class="a" y2="17.746" transform="translate(8.725 0)"></line><line class="a" y2="17.748" transform="translate(17.748 9.395) rotate(90)"></line></g></g></svg></span>
		 
		<h2>Two-step authentication</h2>
		<p>To continue please enter 6-digit verification code sent to your account email.</p>
		
		<input type="hidden" value="" name="otp_token" >
		<input type="hidden" value="" name="otp_type" >
		<input type="hidden" value="" name="otp_code" >
		<div class="otp-input-fields">
			<input type="number" class="otp__digit otp__field__1">
			<input type="number" class="otp__digit otp__field__2">
			<input type="number" class="otp__digit otp__field__3">
			<input type="number" class="otp__digit otp__field__4">
			<input type="number" class="otp__digit otp__field__5">
			<input type="number" class="otp__digit otp__field__6">
		</div>
		<p class="has-text-center">Didn't recieve the code? <a href="#" class="resend-code-link">Resend code</a></p>
		<p><a href="#" class="button btn-2fa-auth">Continue</a></p>
		<p class="error-msg erf-error has-text-center"></p>
		<p class="have_acc  pt-0 mb-0">Can't access to your account?  <a class="have_acc_link" href="mailto:support@chekin.com">Contact Support</a></p>
		<div class="process"><span class="erf-loader"></span> Logging in</div>
		
	</div>
</div>
<?php /* */ ?>	

<div class="popup popup-contact" id="popup-contact">
      <div class="popup-inner">
        <span class="close"><img src="https://chekin.com/wp-content/uploads/2021/06/close.svg" alt=""/></span>
         <img class="popup-logo" src="https://f.hubspotusercontent10.net/hubfs/8776616/Logo%20nuevo%20azul-1.png" alt="Welcome to chekin. We will contact you ASAP.">
		 <?php 

        if( ICL_LANGUAGE_CODE == 'es' ) { $form_id = '"1e19733f-9595-4861-9007-34fd864d67bd"'; }
        if( ICL_LANGUAGE_CODE == 'en' ) { $form_id = '"6a2a58fb-da30-442f-ba39-3e8d82f0c830"'; }
        if( ICL_LANGUAGE_CODE == 'pt' || ICL_LANGUAGE_CODE == 'pt-pt') { $form_id = '"6a2a58fb-da30-442f-ba39-3e8d82f0c830"'; }
        if( ICL_LANGUAGE_CODE == 'it' ) { $form_id = '"838eeb8d-6509-41c8-93a3-188ef922016b"'; }
        if( ICL_LANGUAGE_CODE == 'fr' ) { $form_id = '"6a2a58fb-da30-442f-ba39-3e8d82f0c830"'; }

        ?>

        <!--[if lte IE 8]>
        <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
        <![endif]-->
        <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
        <script >
          hbspt.forms.create({
                region: "na1",
                portalId: "8776616",
                formId: <?php echo $form_id; ?>
        });
        </script>

      </div>
  </div>
  
		<script id='inline_exclusions_list_3' nowprocket>
			function camelize(str) {
			   // Split the string at all space characters
			   return str.split('_')
				  // get rid of any extra spaces using trim
				  .map(a => a.trim())
				  // Convert first char to upper case for each word
				  .map(a => a[0].toUpperCase() + a.substring(1))
				  // Join all the strings back together
				  .join(" ")
			}
			erf_global.js_strings.next="<?php _e( 'Continue', 'chekin2020' ); ?>";
			erf_global.js_strings.prev="<?php _e( 'Back', 'chekin2020' ); ?>";
			jQuery('.custom-password').attr('type', 'password');
			
			let url = new URL(window.location.href);
			let code = url.searchParams.get("code");
			
			let state = url.searchParams.get("state");
			let are_tokens_refetched = false;
			
			var collaborator_token = url.searchParams.get("collaborator_token");
			var collaborator_email = url.searchParams.get("email");
			var manager_subscription_type = url.searchParams.get("manager_subscription_type");
			//console.log(collaborator_email);
			
			jQuery(document).ready(function(){
				if(collaborator_token){
							
					jQuery('.customSyncForm').append('<input type="hidden" data-testid="input" name="collaborator_token"  placeholder="Collaborator token" class="form-control is-valid" value="'+collaborator_token+'">');
					
					if(collaborator_email){
						jQuery('[name="text-gE8dLd"]').val(collaborator_email).trigger('change').addClass('erf-disabled');
					}
					if(manager_subscription_type != ''){
						jQuery('.your-pms, [name="pmsSelected"]').val('Chekin').trigger('change');
						jQuery('.your-property-type').val(manager_subscription_type).trigger('change')
					}
					
				}
				if(state){
					jQuery('.erf-container').fadeIn();
					//console.log(state);
					let stateResult = state.split(",");
					
					
					if(stateResult[2] != undefined && stateResult[2] == '1'){
						jQuery('[name="are_tokens_refetched"]').val(stateResult[2]);
						are_tokens_refetched = true;
						console.log(stateResult[2]);
						
						
					}
					 
					if(are_tokens_refetched){
						
						if(stateResult[1] != undefined){
							jQuery('[name="text-gE8dLd"]').val(stateResult[0].replace(' ', '+'));
							console.log(stateResult[0]);
						}
						if(code){
							jQuery('.customSyncForm').append('<input type="hidden" data-testid="input" name="oauth_code"  placeholder="code" class="form-control is-valid" value="'+code+'">');
						}  
						
						if(stateResult[3] != undefined && stateResult[3] != ''){
							let currentPMS = stateResult[3];
							console.log(camelize(currentPMS));
							//jQuery('.your-pms, [name="pmsSelected"]').val('Cloudbeds').trigger('change'); // should be dynamic
							var currentPMSVal = camelize(currentPMS);
							if(currentPMS == 'bookingsync'){
								currentPMSVal = 'BookingSync'
							}
							jQuery('.your-pms, [name="pmsSelected"]').val(currentPMSVal).trigger('change'); // should be dynamic
						}
						
						
						jQuery('body').addClass('are_tokens_refetched');
					}else{
						jQuery('body').removeClass('are_tokens_refetched');
					}
					
				} 
				
				
				if(code && are_tokens_refetched == false && collaborator_token == null){
					console.log(url);
					
					// Autofill form
					if(localStorage.getItem("formData")){
						let getFormData = JSON.parse(localStorage.getItem("formData"));
						for(let i=0;i<getFormData.length;i++){
							if(jQuery("[name='"+getFormData[i]['name']+"']").attr('type') == 'radio'){
								jQuery("[name='"+getFormData[i]['name']+"']").each(function(){
									if(jQuery(this).val() == getFormData[i]['value']){
										jQuery(this).prop('checked', 'true').trigger('change');
									}
								});
							}else{
								jQuery("[name='"+getFormData[i]['name']+"']").val(getFormData[i]['value']).trigger('change');
							}
							
						}
						jQuery("[name='field-c2xENTMAvcqpurK'], [name='field-c2xENTMAvcqpurK-intl']").val(getFormData[4]['value']).trigger('change');
						
						setTimeout(function(){ 
							//jQuery('.your-room-number-input').val(localStorage.getItem("yourRoomNumber")).trigger('change');
						}, 100);
						
						jQuery('.steps .status .current').html('2');
						// Auto Submmit for steps
						setTimeout(function(){ 
							jQuery('.your-property-type').trigger('change');
							//jQuery('.erf-reg-form-container .erf-form').submit();
							jQuery('.erf-container').fadeIn();
							// Make One step registration
							//jQuery('.erf-form-nav[current-page-index="1"] button[type="submit"]').trigger('click');
							jQuery('.erf-submit-button button[type="submit"], .erf-form-nav[current-page-index="0"] button[type="submit"], .sync-custom-btn').trigger('click');
							jQuery('.customSyncForm').append('<input type="hidden" data-testid="input" name="oauth_code"  placeholder="code" class="form-control is-valid" value="'+code+'">');
							jQuery('.customSyncForm').append('<input type="hidden" data-testid="input" name="header_referer"  placeholder="code" class="form-control is-valid" value="'+window.location.href+'">');
							isOauth=1;
							jQuery('.btn-oauth').trigger('click');
							
							
							jQuery('.steps li').eq(0).removeClass('current');
							jQuery('.steps li').eq(0).addClass('active');
							jQuery('.steps li').eq(1).removeClass('current');
							jQuery('.steps li').eq(1).addClass('active');
							
							jQuery('.sec-contents-sm').removeClass('active');
							
						}, 800);
					}
				}
				// Autofill form on session START

				// Detect referrer if language
				var isReferrer = 1;
				var referrer = document.referrer;
				console.log('Referrer: ' + referrer);
				
				if(referrer.indexOf(site_url) != -1){
					//alert(site_url + " found");
					isReferrer = 0;
				}else{
					//alert(site_url + "not found");
					isReferrer = 1; 
				}


				 if(code == null && sessionStorage.getItem("formData") && are_tokens_refetched == false && collaborator_token == null && isReferrer == 0){
						let getFormData = JSON.parse(sessionStorage.getItem("formData"));
						for(let i=0;i<getFormData.length;i++){
							if(jQuery("[name='"+getFormData[i]['name']+"']").attr('type') == 'radio'){
								jQuery("[name='"+getFormData[i]['name']+"']").each(function(){
									if(jQuery(this).val() == getFormData[i]['value']){
										jQuery(this).prop('checked', 'true').trigger('change');
									}
								});
							}else{
								jQuery("[name='"+getFormData[i]['name']+"']").val(getFormData[i]['value']).trigger('change');
							}
							
						}
						jQuery("[name='field-c2xENTMAvcqpurK'], [name='field-c2xENTMAvcqpurK-intl']").val(getFormData[4]['value']).trigger('change');
						
						setTimeout(function(){ 
							jQuery('.your-room-number-input').val(sessionStorage.getItem("yourRoomNumber")).trigger('change');
						}, 100);
						
						jQuery('.steps .status .current').html('2');
						// Auto Submmit for steps
						// Switch OFF Submit	
						/*setTimeout(function(){ 
							jQuery('.your-pms').trigger('change');
							//jQuery('.erf-reg-form-container .erf-form').submit();
							jQuery('.erf-container').fadeIn();
							
							// Make One step registration
							//jQuery('.erf-form-nav[current-page-index="1"] button[type="submit"]').trigger('click');
							jQuery('.erf-submit-button button[type="submit"], .erf-form-nav[current-page-index="0"] button[type="submit"]').trigger('click');
							//jQuery('.form-custom  .is-oauth').append('<input type="hidden" data-testid="input" name="oauth_code"  placeholder="code" class="form-control is-valid" value="'+code+'">');
							//jQuery('.form-custom  .is-oauth').append('<input type="hidden" data-testid="input" name="header_referer"  placeholder="code" class="form-control is-valid" value="'+window.location.href+'">');
						//	isOauth=1;
							jQuery('.btn-oauth').trigger('click');
							
							jQuery('.steps li').eq(0).removeClass('current');
							jQuery('.steps li').eq(0).addClass('active');
							jQuery('.steps li').eq(1).addClass('current');
							jQuery('.steps li').eq(1).removeClass('active'); 
							
							jQuery('.sec-contents-sm').removeClass('active');
							
						}, 800);*/
						setTimeout(function(){ 
							jQuery('.erf-reg-form-container input[type="text"], .erf-reg-form-container input[type="email"], .erf-reg-form-container input[type="number"], .erf-reg-form-container input[type="tel"],  .erf-reg-form-container select, .erf-reg-form-container textarea').trigger('change');
							jQuery('.erf-reg-form-container .radio input[type="radio"]').trigger('blur');
						}, 800);
					}else{
						console.log('Autofill not needed!');
						localStorage.clear();
						sessionStorage.clear()
						
					}
				// Autofill form on session END
			});
			
			jQuery(window).on('load', function(){
				if( jQuery('#field-HVpYpoXbPAgBsST').length && sessionStorage.getItem('integration') ){
					jQuery('#field-HVpYpoXbPAgBsST').val( sessionStorage.getItem('integration') )
    				jQuery('#field-HVpYpoXbPAgBsST').trigger( 'change' )	
				}
			})
		</script>
	

		
	<?php
		//print_r($_COOKIE);
	?>
 <!-- Start of HubSpot Embed Code -->
  <script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/8776616.js"></script>
  <!-- End of HubSpot Embed Code -->
 
            
	</body>
</html>
