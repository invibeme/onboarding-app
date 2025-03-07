<?php
/**
 * Header file for the Chekin 2020 WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Chekin_2020
 * @since Chekin 2020 1.0
 */

 /*if(is_user_logged_in() && (is_page(243) || is_page(91))){
	 $REDIRECT_QUERY_STRING = isset($_SERVER['REDIRECT_QUERY_STRING']) ? $_SERVER['REDIRECT_QUERY_STRING'] : "";
	 header("Location:".site_url().'/dashboard?'.$REDIRECT_QUERY_STRING);
 } */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<!--<meta name="viewport" content="width=device-width, initial-scale=1.0" >-->
		<meta name="viewport" content="width=device-width, initial-scale=1" >
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<?php wp_head(); ?>
		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
		
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-PK7Q9R9');</script>
		<!-- End Google Tag Manager -->
		
		<script id='inline_exclusions_list_hdr_1' nowprocket>
		var site_url = "<?php echo site_url(); ?>/";
		var register_page_url = "<?php the_permalink(243); ?>";
		
		//var chekinforms = <?php // echo file_get_contents(site_url().'/forms/index.php?v='.time()); ?>;
		var chekinforms = <?php echo json_encode(custom_pms_config()); ?>;
		var isOauth=0;
		</script>
		
		
		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" nowprocket></script>
		
		<script id='inline_exclusions_list_hdr_2' nowprocket>
			jQuery(document).ready(function() {
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
			});
		</script>
		<script>
			var searchText = "<?php _e('Search', 'chekin2020'); ?>...";
			jQuery(document).ready(function() {
				jQuery("select.form-control > option[value='']").attr('disabled', 'disabled');
				jQuery('.js-example-basic-single').select2({
					searchInputPlaceholder: searchText,
					dropdownCssClass: "dropdown-search-no",
					dropdownPosition: 'below'
				});
				
				jQuery('select.your-pms').select2({
					searchInputPlaceholder: searchText,
					dropdownCssClass: "dropdown-search",
					dropdownPosition: 'below',
					//sorter: data => data.sort((a, b) => a.text.localeCompare(b.text)),
				});

			}); 

			
		</script>
		
		 <script>(function(c,a){if(!a.__SV){var b=window;try{var d,m,j,k=b.location,f=k.hash;d=function(a,b){return(m=a.match(RegExp(b+"=([^&]*)")))?m[1]:null};f&&d(f,"state")&&(j=JSON.parse(decodeURIComponent(d(f,"state"))),"mpeditor"===j.action&&(b.sessionStorage.setItem("_mpcehash",f),history.replaceState(j.desiredHash||"",c.title,k.pathname+k.search)))}catch(n){}var l,h;window.mixpanel=a;a._i=[];a.init=function(b,d,g){function c(b,i){var a=i.split(".");2==a.length&&(b=b[a[0]],i=a[1]);b[i]=function(){b.push([i].concat(Array.prototype.slice.call(arguments,
0)))}}var e=a;"undefined"!==typeof g?e=a[g]=[]:g="mixpanel";e.people=e.people||[];e.toString=function(b){var a="mixpanel";"mixpanel"!==g&&(a+="."+g);b||(a+=" (stub)");return a};e.people.toString=function(){return e.toString(1)+".people (stub)"};l="disable time_event track track_pageview track_links track_forms track_with_groups add_group set_group remove_group register register_once alias unregister identify name_tag set_config reset opt_in_tracking opt_out_tracking has_opted_in_tracking has_opted_out_tracking clear_opt_in_out_tracking people.set people.set_once people.unset people.increment people.append people.union people.track_charge people.clear_charges people.delete_user people.remove".split(" ");
for(h=0;h<l.length;h++)c(e,l[h]);var f="set set_once union unset remove delete".split(" ");e.get_group=function(){function a(c){b[c]=function(){call2_args=arguments;call2=[c].concat(Array.prototype.slice.call(call2_args,0));e.push([d,call2])}}for(var b={},d=["get_group"].concat(Array.prototype.slice.call(arguments,0)),c=0;c<f.length;c++)a(f[c]);return b};a._i.push([b,d,g])};a.__SV=1.2;b=c.createElement("script");b.type="text/javascript";b.async=!0;b.src="undefined"!==typeof MIXPANEL_CUSTOM_LIB_URL?
MIXPANEL_CUSTOM_LIB_URL:"file:"===c.location.protocol&&"//cdn.mxpnl.com/libs/mixpanel-2-latest.min.js".match(/^\/\//)?"https://cdn.mxpnl.com/libs/mixpanel-2-latest.min.js":"//cdn.mxpnl.com/libs/mixpanel-2-latest.min.js";d=c.getElementsByTagName("script")[0];d.parentNode.insertBefore(b,d)}})(document,window.mixpanel||[]);
mixpanel.init("8b22e8d7e17f222b03b99ecd808774a4", {batch_requests: true})</script> 
		
		<script>
			var ajaxurl = site_url+'/wp-admin/admin-ajax.php';
			var utm_source = "<?php echo $_GET['utm_source'] ?>";
			var country_ip = "<?php echo user_ip(); ?>";
			jQuery.get(ajaxurl,{'action': 'getip'}, function (current_ip) { 
				country_ip = current_ip;
				console.log(country_ip);
				<?php if(is_front_page()) { ?>
				// run mixpanel
				//if(localStorage.getItem("UserArrived") != '1'){
					mixpanel.track('Onboarding - UserArrived', {
					  'utm_source': utm_source,
					  'country_ip': country_ip,
					});
					console.log('Onboarding - UserArrived');
					//localStorage.setItem("UserArrived", '1');
				//}
				<?php } ?>
			});
		</script>
		
		
		
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-172117250-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());
		 
		  gtag('config', 'UA-172117250-1');
		</script>
		
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-4Z07XY5VGX"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'G-4Z07XY5VGX');
		</script>
		
		
		<!-- Global site tag (gtag.js) - Google Ads: 481274774 -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=AW-481274774"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'AW-481274774');
		</script>
		
	 
		
		
		

		
		<!-- Facebook START -->
		<script>
		  !function(f,b,e,v,n,t,s)
		  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
		  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
		  n.queue=[];t=b.createElement(e);t.async=!0;
		  t.src=v;s=b.getElementsByTagName(e)[0];
		  s.parentNode.insertBefore(t,s)}(window, document,'script',
		  'https://connect.facebook.net/en_US/fbevents.js');
		  fbq('init', '1960527614261773');
		  fbq('track', 'PageView');
		</script>
		
		<!-- Facebook END -->
		
		<?php /*?>
         // Hide Chat window
		<!-- Start of HubSpot Embed Code -->
		<script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/8776616.js"></script>
		<!-- End of HubSpot Embed Code -->
		<?php */ ?>
		<!-- Linkedin START -->
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
		
		<!-- Linkedin END -->

		<!--Cookiebot START -->
		<script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="d2c2c347-0d14-4644-b0e3-bb1ec455cdd1" data-blockingmode="auto" type="text/javascript"></script>
		<!--Cookiebot END -->

		<!-- Hotjar Tracking Code for https://chekin.com/ -->
		<script>
			(function(h,o,t,j,a,r){
				h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
				h._hjSettings={hjid:2788074,hjsv:6};
				a=o.getElementsByTagName('head')[0];
				r=o.createElement('script');r.async=1;
				r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
				a.appendChild(r);
			})(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
		</script>

		
	<?php 
		$bodyClass = get_post_meta(get_the_ID(), 'body_class', true);
		$page_title = get_post_meta(get_the_ID(), 'page_title', true);
		if(!empty($page_title)){
			$bodyClass .= ' has-page-title'.strtolower($page_title);
		}
		
	?>
		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PK7Q9R9"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
	</head>
	<body <?php body_class($bodyClass); ?>>
		<noscript><img height="1" width="1" style="display:none"
		  src="https://www.facebook.com/tr?id=1960527614261773&ev=PageView&noscript=1"
		/></noscript>
		<noscript>
		<img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=3089577&fmt=gif" />
		</noscript>
		<?php
		wp_body_open();
		?>
		
		<header id="site-header" class="header-footer-group" role="banner">

			<div class="header-inner section-inner">
				<button type="button" class="button btn-link header-btn-back"><?php echo __( 'Back', 'chekin2020' ); ?></button>
				<div class="header-titles-wrapper">

					<?php
					
					// Check whether the header search is activated in the customizer.
					$enable_header_search = get_theme_mod( 'enable_header_search', true );

					if ( true === $enable_header_search ) {

						?>

						<button class="toggle search-toggle mobile-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">
							<span class="toggle-inner">
								<span class="toggle-icon">
									<?php chekin2020_the_theme_svg( 'search' ); ?>
								</span>
								<span class="toggle-text"><?php _e( 'Search', 'chekin2020' ); ?></span>
							</span>
						</button><!-- .search-toggle -->

					<?php } ?>

					<div class="header-titles " >
						<?php 
							$current_lang = ICL_LANGUAGE_CODE;
						
						if(is_page(19918)){
							if(is_active_sidebar( 'sidebar-8' )){
									dynamic_sidebar( 'sidebar-8' );
								}else{
									//chekin2020_site_logo();
						?>
								<div class="site-logo faux-heading">
									<a href="https://chekin.com/<?php if($current_lang != 'es') { echo $current_lang; } ?>" class="custom-logo-link" rel="home" aria-current="page">
										<img src="https://chekin.com/wp-content/uploads/2021/05/chekin-logo-new.svg" class="custom-logo" alt="CheKin" decoding="async">
									</a>
									<span class="screen-reader-text">CheKin</span>
								</div>
						<?php
							}
						}else { ?>
							<?php
								// Site title or logo.

								if(is_active_sidebar( 'sidebar-6' )){
									dynamic_sidebar( 'sidebar-6' );
								}else{
									//chekin2020_site_logo();
								?>
										<div class="site-logo faux-heading">
											<a href="https://chekin.com/<?php if($current_lang != 'es') { echo $current_lang; } ?>" class="custom-logo-link" rel="home" aria-current="page">
												<img src="https://chekin.com/wp-content/uploads/2021/05/chekin-logo-new.svg" class="custom-logo" alt="CheKin" decoding="async">
											</a>
											<span class="screen-reader-text">CheKin</span>
										</div>
								<?php
								}

								// Site description.
								chekin2020_site_description();
							?>
					<?php } ?>
					</div><!-- .header-titles -->

					<button class="toggle nav-toggle mobile-nav-toggle" data-toggle-target=".menu-modal"  data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
						<span class="toggle-inner">
							<span class="toggle-icon">
								<?php chekin2020_the_theme_svg( 'ellipsis' ); ?>
							</span>
							<span class="toggle-text"><?php _e( 'Menu', 'chekin2020' ); ?></span>
							
						</span>
					</button><!-- .nav-toggle -->

				</div><!-- .header-titles-wrapper -->
				<?php if(!is_page_template('templates/template-login.php')) { ?>
				<div class="header-navigation-wrapper">

					<?php
					if ( has_nav_menu( 'primary' ) || ! has_nav_menu( 'expanded' ) ) {
						?>

							<nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e( 'Horizontal', 'chekin2020' ); ?>" role="navigation">

								<ul class="primary-menu reset-list-style">

								<?php
								if ( has_nav_menu( 'primary' ) ) {

									wp_nav_menu(
										array(
											'container'  => '',
											'items_wrap' => '%3$s',
											'theme_location' => 'primary',
										)
									);

								} elseif ( ! has_nav_menu( 'expanded' ) ) {

									wp_list_pages(
										array(
											'match_menu_classes' => true,
											'show_sub_menu_icons' => true,
											'title_li' => false,
											'walker'   => new chekin2020_Walker_Page(),
										)
									);

								}
								?>

								</ul>

							</nav><!-- .primary-menu-wrapper -->

						<?php
					}

					if ( true === $enable_header_search || has_nav_menu( 'expanded' ) ) {
						?>

						<div class="header-toggles hide-no-js">

						<?php
						if ( has_nav_menu( 'expanded' ) ) {
							?>

							<div class="toggle-wrapper nav-toggle-wrapper has-expanded-menu">

								<button class="toggle nav-toggle desktop-nav-toggle" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
									<span class="toggle-inner">
										<span class="toggle-text"><?php _e( 'Menu', 'chekin2020' ); ?></span>
										<span class="toggle-icon">
											<?php chekin2020_the_theme_svg( 'ellipsis' ); ?>
										</span>
									</span>
								</button><!-- .nav-toggle -->

							</div><!-- .nav-toggle-wrapper -->

							<?php
						}

						if ( true === $enable_header_search ) {
							?>

							<div class="toggle-wrapper search-toggle-wrapper">

								<button class="toggle search-toggle desktop-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">
									<span class="toggle-inner">
										<?php chekin2020_the_theme_svg( 'search' ); ?>
										<span class="toggle-text"><?php _e( 'Search', 'chekin2020' ); ?></span>
									</span>
								</button><!-- .search-toggle -->

							</div>

							<?php
						}
						?>

						</div><!-- .header-toggles -->
						<?php
					}
					?>

				</div><!-- .header-navigation-wrapper -->
				<?php } ?>
			</div><!-- .header-inner -->

			<?php
			// Output the search modal (if it is activated in the customizer).
			if ( true === $enable_header_search ) {
				get_template_part( 'template-parts/modal-search' );
			}
			?>

		</header><!-- #site-header -->

		<?php
		// Output the menu modal.
		get_template_part( 'template-parts/modal-menu' );
		
		?>

