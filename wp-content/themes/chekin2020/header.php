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

global $wp;
$page_permalink =  home_url( $wp->request );

function ip_visitor_country(){

    $client  = $_SERVER['HTTP_CLIENT_IP'];
    $forward = $_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];
    $country  = "Unknown";

    if( filter_var($client, FILTER_VALIDATE_IP) ) {
        $ip = $client;
    } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
        $ip = $forward;
    } else {
        $ip = $remote;
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://www.geoplugin.net/json.gp?ip=".$ip);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $ip_data_in = curl_exec($ch);
    curl_close($ch);

    $ip_data = json_decode($ip_data_in,true);
    $ip_data = str_replace('&quot;', '"', $ip_data);

    if($ip_data && $ip_data['geoplugin_countryCode'] != null) {
        $country = $ip_data['geoplugin_countryCode'];
    }

    return $country;
}

if ( !isset($_COOKIE['visited']) ) {
  
    setcookie('visited', 'yes', time() + (86400 * 1), '/'); // 86400 = 1 day

    $country = ip_visitor_country();

    $es_country = array(
      'ES', // Spain
      'BR', // Brazil
      'MX', // Mexico
      'CO', // Colombia
      'AR', // Argentina
      'PE', // Peru
      'VE', // Venezuela
      'CL', // Chile
      'GT', // Guatemala
      'EC', // Ecuador
      'BO', // Bolivia
      'HT', // Haiti
      'CU', // Cuba
      'DO', // Dominican Republic
      'HN', // Honduras
      'PY', // Paraguay
      'NI', // Nicaragua
      'SV', // El Salvador
      'CR', // Costa Rica
      'PA', // Panama
      'UY', // Uruguay
      'JM', // Jamaica
      'TT', // Trinidad and Tobago
      'GY', // Guyana
      'SR', // Suriname
      'BZ', // Belize
      'BS', // Bahamas
      'BB', // Barbados
      'LC', // Saint Lucia
      'GD', // Grenada
      'VC', // St. Vincent & Grenadines
      'AG', // Antigua and Barbuda
      'DO', // Dominica
      'KN' // Saint Kitts & Nevis
    );

    if( $country ){
      if( in_array( $country, $es_country) ){
        $default_lang = 'es';
      } else {
        $default_lang = 'en';
      }
    }else{
      $default_lang = 'en';
    }

    $redirect_url = apply_filters( 'wpml_permalink', $page_permalink, $default_lang );

    // wp_redirect( $redirect_url );
    // exit();
}

$noindex = get_post_meta(get_the_ID(), 'noindex', true);

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<!--<meta name="viewport" content="width=device-width, initial-scale=1.0" >
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" >-->
		<meta name="viewport" content="width=device-width, initial-scale=1" >
		<?php 
			if(strtolower($noindex) == 'true'){
				echo '<meta name="robots" content="noindex, nofollow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />';
			}
		?>
		<meta name="google-site-verification" content="yeGgUmHFPvykGkLneGCvghbuZCCysmIGUFM-PNDmLAU" />
		<meta name="facebook-domain-verification" content="jwphln8kupz3e6o5cycftazsh310d2" />
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<?php wp_head(); ?>
		
<?php /* Requested by sergio@chekin.com to comment the following on 25-06-2024 ?>		
	<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-4Z07XY5VGX"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-4Z07XY5VGX');
</script>
<?php */ ?>	
		<!-- Global site tag (gtag.js) - Google Ads: 481274774 -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=AW-481274774"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'AW-481274774');
		</script>
		
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-PK7Q9R9');</script>
		<!-- End Google Tag Manager -->
		
		<?php if ( defined( 'ICL_LANGUAGE_CODE' ) && ICL_LANGUAGE_CODE == 'es') { ?>
		<!-- Event snippet for Regístrate gratis conversion page In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. --> 
		<script> function gtag_report_conversion(url) { var callback = function () { if (typeof(url) != 'undefined') { window.location = url; } }; gtag('event', 'conversion', { 'send_to': 'AW-481274774/IVp6CJnY--4BEJbXvuUB', 'event_callback': callback }); return false; } 
		
			jQuery(document).ready(function(){
				jQuery('.primary-menu>li.trial-btn > a').on('click', function(){
					var thisURL = jQuery(this).attr('href');
					console.log('advertisement: ' + thisURL);
					gtag_report_conversion(thisURL);
				});
				
				
			});
			
		</script>
		<?php } ?>
		<?php /* ?>
		<script src="https://www.googleoptimize.com/optimize.js?id=OPT-M6SC8CV"></script>
		<?php */ ?>
		<!-- clarity START -->
		<script type="text/javascript">
			(function(c,l,a,r,i,t,y){
				c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
				t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
				y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
			})(window, document, "clarity", "script", "459peud52p");
		</script>
		<!-- clarity END -->
		
		<!-- mixpanel START -->
		<script>(function(c,a){if(!a.__SV){var b=window;try{var d,m,j,k=b.location,f=k.hash;d=function(a,b){return(m=a.match(RegExp(b+"=([^&]*)")))?m[1]:null};f&&d(f,"state")&&(j=JSON.parse(decodeURIComponent(d(f,"state"))),"mpeditor"===j.action&&(b.sessionStorage.setItem("_mpcehash",f),history.replaceState(j.desiredHash||"",c.title,k.pathname+k.search)))}catch(n){}var l,h;window.mixpanel=a;a._i=[];a.init=function(b,d,g){function c(b,i){var a=i.split(".");2==a.length&&(b=b[a[0]],i=a[1]);b[i]=function(){b.push([i].concat(Array.prototype.slice.call(arguments,
0)))}}var e=a;"undefined"!==typeof g?e=a[g]=[]:g="mixpanel";e.people=e.people||[];e.toString=function(b){var a="mixpanel";"mixpanel"!==g&&(a+="."+g);b||(a+=" (stub)");return a};e.people.toString=function(){return e.toString(1)+".people (stub)"};l="disable time_event track track_pageview track_links track_forms track_with_groups add_group set_group remove_group register register_once alias unregister identify name_tag set_config reset opt_in_tracking opt_out_tracking has_opted_in_tracking has_opted_out_tracking clear_opt_in_out_tracking people.set people.set_once people.unset people.increment people.append people.union people.track_charge people.clear_charges people.delete_user people.remove".split(" ");
for(h=0;h<l.length;h++)c(e,l[h]);var f="set set_once union unset remove delete".split(" ");e.get_group=function(){function a(c){b[c]=function(){call2_args=arguments;call2=[c].concat(Array.prototype.slice.call(call2_args,0));e.push([d,call2])}}for(var b={},d=["get_group"].concat(Array.prototype.slice.call(arguments,0)),c=0;c<f.length;c++)a(f[c]);return b};a._i.push([b,d,g])};a.__SV=1.2;b=c.createElement("script");b.type="text/javascript";b.async=!0;b.src="undefined"!==typeof MIXPANEL_CUSTOM_LIB_URL?
MIXPANEL_CUSTOM_LIB_URL:"file:"===c.location.protocol&&"//cdn.mxpnl.com/libs/mixpanel-2-latest.min.js".match(/^\/\//)?"https://cdn.mxpnl.com/libs/mixpanel-2-latest.min.js":"//cdn.mxpnl.com/libs/mixpanel-2-latest.min.js";d=c.getElementsByTagName("script")[0];d.parentNode.insertBefore(b,d)}})(document,window.mixpanel||[]);
mixpanel.init("8b22e8d7e17f222b03b99ecd808774a4", {batch_requests: true})</script>

		<script type="text/javascript">
			mixpanel.track_links("#site-header .primary-menu li.trial-btn a", "Click 'Try For Free' Header Button", {
				"referrer": document.referrer
			});
			
			mixpanel.track_links(".banner .btn-banner-demo a", "Click Banner 'Get Demo' Button", {
				"referrer": document.referrer
			});
			mixpanel.track_links(".banner .btn-banner-signup a", "Click Banner 'Try For Free' Button", {
				"referrer": document.referrer
			});
			
			mixpanel.track_links("#cta .button", "Click CTA 'Create Free Account' Button", {
				"referrer": document.referrer
			});
			
			mixpanel.track_links(".btn-top-get-demo a", "Click Features Pages Top 'Get Demo' Button", {
				"referrer": document.referrer
			});
			
			mixpanel.track_links(".btn-bottom-get-demo a", "Click Features Pages Bottom 'Get Demo' Button", {
				"referrer": document.referrer
			});
			
			mixpanel.track_links(".sec-faqs .wp-block-buttons .wp-block-button a", "Click Features Pages FAQs 'Contact us' Button", {
				"referrer": document.referrer
			});
			<?php if(is_home() || is_archive()) { ?>
			mixpanel.track("BlogWeb");
			<?php } ?>
			<?php if(is_single()) { ?>
			mixpanel.track("BlogPostWeb");
			<?php } ?>
		</script>
		<!-- mixpanel END -->
		<?php /* if(ICL_LANGUAGE_CODE=='es') { ?>
		<script>
			jQuery(document).ready(function(){
				jQuery('.btn-banner-signup .wp-block-button__link').on('click', function(){
					gtag('event', 'click', {'event_category': 'Pruébalo Gratis', 'event_label': 'Pruébalo Gratis', 'value': '1'});
					console.log('gtag: Pruébalo Gratis');
				});
				
				jQuery('.primary-menu>li.contact > a').on('click', function(){
					gtag('event', 'click', {'event_category': 'Contacta con ventas', 'event_label': 'Contacta con ventas', 'value': '1'});
					console.log('gtag: Contacta con ventas');
				});
			});
			
			
		</script>
		<?php } ?>
		
		<?php  if(ICL_LANGUAGE_CODE=='en') { ?>
				<script>	
				jQuery(document).ready(function(){	
				jQuery('.primary-menu>li.contact > a').on('click', function(){
					gtag('event', 'click', {'event_category': 'Contact sales', 'event_label': 'Contact sales', 'value': '1'});
					console.log('gtag: Contact sales');
				});
			});
			
			
		</script>
		<?php }  ?>

		<?php  if(ICL_LANGUAGE_CODE=='pt') { ?>
				<script>	
				jQuery(document).ready(function(){	
				jQuery('.primary-menu>li.contact > a').on('click', function(){
					gtag('event', 'click', {'event_category': 'Contact sales', 'event_label': 'Contact sales', 'value': '1'});
					console.log('gtag: Contact sales');
				});
			});
			
			
		</script>
		<?php } ?>

		<?php  if(ICL_LANGUAGE_CODE=='it') { ?>
				<script>	
				jQuery(document).ready(function(){	
				jQuery('.primary-menu>li.contact > a').on('click', function(){
					gtag('event', 'click', {'event_category': 'Contact sales', 'event_label': 'Contact sales', 'value': '1'});
					console.log('gtag: Contact sales');
				});
			});
			
			
		</script>
		<?php } */ ?>
		<?php // if(ICL_LANGUAGE_CODE=='en') { ?>
		<!-- Facebook Pixel Code English-->
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
		<noscript><img height="1" width="1" style="display:none"
		src="https://www.facebook.com/tr?id=1960527614261773&ev=PageView&noscript=1"
		/></noscript>
		<!-- End Facebook Pixel Code English -->
		<?php // } ?>
		
		<script type="text/javascript">
			var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
			
			/*jQuery.get(ajaxurl,{'action': 'getip'}, function (current_ip) { 
				jQuery('.header-titles').after(' &nbsp;&nbsp;' + current_ip); 
				jQuery('html').attr('data-country', current_ip); 
				//alert(current_ip);
			});*/
		</script>
  		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/header.css?v=<?php echo time(); ?>">
	</head>
	<?php 
		$bodyClass = '';
		$page_title = get_post_meta(get_the_ID(), 'page_title', true);
		if(!empty($page_title)){
			$bodyClass .= 'has-page-title'.strtolower($page_title);
		}
		
	?>
	<body <?php body_class( get_post_meta( get_the_ID(), 'body_class', true ) ); ?>>
		<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PK7Q9R9"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

		
		<?php
		wp_body_open();
		?>

		<!-- HEADER MARKUP STARTS HERE -->
    <header>
	<?php /* if( ICL_LANGUAGE_CODE == 'es' ) { ?>
	<div class="notice">Chekin es Agente Digitalizador oficial, te ayudamos a conseguir tu Kit Digital. <a href="https://dev.chekin.com/kit-digital/">Aprende más</a></div>
	<?php } */ ?>
    <div class="header-wrapper fixed">
		<div class="header-inside">
	  		<div class="header-left">
		  		
			  <!-- logo -->
			  <?php $home_url = ''; if( ICL_LANGUAGE_CODE != 'es' ) { $home_url = '/' . ICL_LANGUAGE_CODE . '/'; } ?>
			  <a class="logo" href="<?php echo get_site_url( '/' ) . $home_url; ?>" aria-label="Chekin"><img src="<?php the_field( 'header_logo', 'option' ); ?>" alt="Chekin" width="93" height="27"></a>


			   <?php if(is_page_template('partnership.php')) {  
					$partnership_text = get_field( "partnership_text" );
					$partnership_logo = get_field( "partnership_logo" );

					if(!empty($partnership_text) || !empty($partnership_logo)) {
						echo '<div class="partner-name"> ';
						echo $partnership_text.' ';

						if( !empty( $partnership_logo ) ): ?>
							<img src="<?php echo esc_url($partnership_logo['url']); ?>" class="partner-logo" alt="<?php echo esc_attr($partnership_logo['alt']); ?>" />
						<?php endif;
						echo '</div> ';
						}
					?>

			   <?php }
			   ?>
	    
			   <?php if(!is_page_template('partnership.php')) { ?>
			   <!-- main menu -->
				<nav class="nav-menu">
				  <div class="nav-menu-inner">
				  <?php wp_nav_menu( array( 'theme_location' => 'main' ) ); ?>
				  <?php

				  if( ICL_LANGUAGE_CODE == 'es' ) {
					$hbid = '7ebb9171-e4bc-41c0-b2a4-e4c0dc301af0';
				  }
				  if( ICL_LANGUAGE_CODE=='en' ) {
					$hbid = '871e2eba-7d21-496a-96bf-f9880c1a1810';
				  }
				  if( ICL_LANGUAGE_CODE == 'pt' ) {
					$hbid = '871e2eba-7d21-496a-96bf-f9880c1a1810';
				  }
				  if( ICL_LANGUAGE_CODE == 'it' ) {
					$hbid = '7ebb9171-e4bc-41c0-b2a4-e4c0dc301af0';
				  }

			  ?>

				  <!--HubSpot Call-to-Action Code --><span class="hs-cta-wrapper" id="hs-cta-wrapper-<?php echo $hbid;  ?>"><span class="hs-cta-node hs-cta-<?php echo $hbid;  ?>" id="hs-cta-<?php echo $hbid;  ?>"><!--[if lte IE 8]><div id="hs-cta-ie-element"></div><![endif]--><a href="https://cta-redirect.hubspot.com/cta/redirect/8776616/<?php echo $hbid;  ?>" ><img class="hs-cta-img" id="hs-cta-img-<?php echo $hbid;  ?>" style="border-width:0px;" src="https://no-cache.hubspot.com/cta/default/8776616/<?php echo $hbid;  ?>.png"  alt="Reserva una demo"/></a></span>
				  <script async defer charset="utf-8" src="https://js.hscta.net/cta/current.js"></script>
				  <!-- <script type="text/javascript">
				  window.onload = function(){setTimeout(function(){
				  (function(){var s = document.getElementsByTagName("script")[0];
				  var b = document.createElement("script");
				  b.type = "text/javascript";b.async = true;
				  b.src = "https://js.hscta.net/cta/current.js";
				  s.parentNode.insertBefore(b, s);})();},3000)}
				  </script> -->
				  <script type="text/javascript">
				  var hsInterval = setInterval(function() {
					if( hbspt ) { hbspt.cta.load(8776616, '<?php // echo $hbid;  ?>', {"region":"na1"}); clearInterval(hsInterval); }

				  }, 1000)
				  </script>
				  </span><!-- end HubSpot Call-to-Action Code -->

			  </div>
			</nav>
		  
			<?php

			$id = $wp_query->queried_object_id;

			$selceted_lang = array(
			  array(
				'code' => 'es',
				'title' => 'Español',
			  ),
			  array(
				'code' => 'en',
				'title' => 'English',
			  ),
			  array(
				'code' => 'pt',
				'title' => 'Português',
			  ),
			  array(
				'code' => 'it',
				'title' => 'Italiano',
			  ),
			 array(
				'code' => 'fr',
				'title' => 'Français',
			  ),
			 array(
				'code' => 'de',
				'title' => 'Deutsch',
			  )
			);

			$current_lang = ICL_LANGUAGE_CODE;

			foreach ($selceted_lang as $index => $lang) {
			  if ( $lang['code'] === $current_lang ) { unset($selceted_lang[$index]); }
			}

			$login_link = $current_lang == 'es' ? 'https://chekin.com/onboarding/login/' : 'https://chekin.com/onboarding/' . $current_lang . '/login/';
			$register_link = $current_lang == 'es' ? 'https://chekin.com/onboarding/' : 'https://chekin.com/onboarding/' . $current_lang . '/';
			// $login_link = $current_lang == 'es' ? 'https://chekin.com/onboarding/login/' : 'https://chekin.com/onboarding/en/login/';

			?>
		</div>
		  
              <!-- Language and Login -->
<div class="lang-login v2">
    <div class="parent-item">
        <a href="#" aria-label="<?php echo $current_lang; ?>">
            <img height="20" width="20" class="flug-lang" src="<?php echo get_template_directory_uri(); ?>/assets/images/flag-<?php echo $current_lang; ?>.<?php echo $current_lang == 'en' || $current_lang == 'de' ? 'png' : 'svg'; ?>" alt="">
        </a>
        <div class="sub-menu">
            <?php foreach ($selceted_lang as $opposite_lang) {
                if (icl_object_id($id, get_post_type($id), false, $opposite_lang['code'])) {
                    // Obtener la URL del blog en el idioma correspondiente
                    $blog_url = apply_filters('wpml_permalink', get_permalink(get_option('page_for_posts')), $opposite_lang['code']); ?>

                    <div class="lang-item">
                        <a href="<?php echo $blog_url; ?>">
                            <img height="20" width="20" class="flug-lang" src="<?php echo get_template_directory_uri(); ?>/assets/images/flag-<?php echo $opposite_lang['code']; ?>.<?php echo $opposite_lang['code'] == 'en' || $opposite_lang['code'] == 'de' ? 'png' : 'svg'; ?>" alt="">
                            <?php echo $opposite_lang['title']; ?>
                        </a>
                    </div>
                <?php }
            } ?>
        </div>
    </div>



    <?php
    switch (ICL_LANGUAGE_CODE) {
        case 'es':
            ?>
            <div class="login-link"><a href="<?php echo $login_link; ?>"><?php _e('Iniciar sesión', 'chekin2020'); ?> </a></div>
            <div class="register-link has-btn has-btn-primary"><a href="<?php echo $register_link; ?>"><?php _e('Pruébalo gratis', 'chekin2020'); ?></a></div>
            <?php
            break;
        case 'en':
            ?>
            <div class="login-link"><a href="<?php echo $login_link; ?>"><?php _e('Log in', 'chekin2020'); ?> </a></div>
            <div class="register-link has-btn has-btn-primary"><a href="<?php echo $register_link; ?>"><?php _e('Try for free', 'chekin2020'); ?></a></div>
            <?php
            break;
        case 'it':
            ?>
            <div class="login-link"><a href="<?php echo $login_link; ?>"><?php _e('Log in', 'chekin2020'); ?> </a></div>
            <div class="register-link has-btn has-btn-primary"><a href="<?php echo $register_link; ?>"><?php _e('Provalo gratis', 'chekin2020'); ?></a></div>
            <?php
            break;
        case 'pt':
            ?>
            <div class="login-link"><a href="<?php echo $login_link; ?>"><?php _e('Conecte-se', 'chekin2020'); ?> </a></div>
            <div class="register-link has-btn has-btn-primary"><a href="<?php echo $register_link; ?>"><?php _e('Prove gratuitamente', 'chekin2020'); ?></a></div>
            <?php
            break;
        case 'fr':
            ?>
            <div class="login-link"><a href="<?php echo $login_link; ?>"><?php _e('Log in', 'chekin2020'); ?> </a></div>
            <div class="register-link has-btn has-btn-primary"><a href="<?php echo $register_link; ?>"><?php _e('Essayez-le gratuitement', 'chekin2020'); ?></a></div>
            <?php
            break;
        case 'de':
            ?>
            <div class="login-link"><a href="<?php echo $login_link; ?>"><?php _e('Anmelden', 'chekin2020'); ?> </a></div>
            <div class="register-link has-btn has-btn-primary"><a href="<?php echo $register_link; ?>"><?php _e('Kostenlos testen', 'chekin2020'); ?></a></div>
            <?php
            break;
    }
    ?>

    <!-- menu toggler -->
    <div class="menu-trigger">
        <div class="trigger">
            <svg class="bars" viewBox="0 0 100 100" onclick="this.classList.toggle('active')">
                <path class="line top"
                      d="m 30,33 h 40 c 13.100415,0 14.380204,31.80258 6.899646,33.421777 -24.612039,5.327373 9.016154,-52.337577 -12.75751,-30.563913 l -28.284272,28.284272"></path>
                <path class="line middle"
                      d="m 70,50 c 0,0 -32.213436,0 -40,0 -7.786564,0 -6.428571,-4.640244 -6.428571,-8.571429 0,-5.895471 6.073743,-11.783399 12.286435,-5.570707 6.212692,6.212692 28.284272,28.284272 28.284272,28.284272"></path>
                <path class="line bottom"
                      d="m 69.575405,67.073826 h -40 c -13.100415,0 -14.380204,-31.80258 -6.899646,-33.421777 24.612039,-5.327373 -9.016154,52.337577 12.75751,30.563913 l 28.284272,-28.284272"></path>
            </svg>
        </div>
    </div>
</div>
<!-- lang-login Ends-->
		<?php } ?>
			</div>
    </div> <!-- header-wrapper Ends-->
  </header>
  <!-- HEADER MARKUP ENDS HERE -->

  <span style="display:none;">
  	<span class="lang-en"><?php echo apply_filters( 'wpml_permalink', $page_permalink , 'en' ); ?></span>
    <span class="lang-es"><?php echo apply_filters( 'wpml_permalink', $page_permalink , 'es' ); ?></span>
    <span class="lang-pt"><?php echo apply_filters( 'wpml_permalink', $page_permalink , 'pt' ); ?></span>
    <span class="lang-it"><?php echo apply_filters( 'wpml_permalink', $page_permalink , 'it' ); ?></span>
  </span>
