<?php
$admin_bar = current_user_can('administrator') || current_user_can('editor');
$noindex = get_post_meta(get_the_ID(), 'noindex', true);
?>

<!doctype html>
<html class="no-js" <?php language_attributes(); ?> <?php // if( $admin_bar ) { echo 'style="margin-top:32px !important;"'; } ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php /* ?><link rel="canonical" href="<?php echo get_post_meta( get_the_ID(), '_yoast_wpseo_canonical', true ); ?>" /><?php */ ?>
  <meta name="google-site-verification" content="yeGgUmHFPvykGkLneGCvghbuZCCysmIGUFM-PNDmLAU" />
   <meta name="facebook-domain-verification" content="jwphln8kupz3e6o5cycftazsh310d2" />
  <link rel="shortcut icon" type="image/png" href="<?php echo get_site_icon_url(); ?>"/>

  <?php wp_head(); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
		<link href="https://cdn.jsdelivr.net/gh/StephanWagner/svgMap@v2.10.1/dist/svgMap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/new-global.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/font.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/home.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/g-global.css?v=<?php echo time(); ?>">

  <?php // if( get_the_ID( '22972' ) || get_the_ID( '23438' ) ) { // Homepage // Global ?>

  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/g-main.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/g-responsive.css">
  
  <?php // } else if( get_the_ID( '23523' ) ) { // Pricing Page // Global  ?>

  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/pricing.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/contact-sales.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/chexbook.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/proteccion.css">


  <?php if( get_the_ID() == '22972' || get_the_ID() == '23438' || get_the_ID() == '31182' || get_the_ID() == '33292' || get_the_ID() == '38611' || get_the_ID() == '45428') { // Homepage (ES,EN)  ?>
  <?php // if( get_the_ID() == '22972' || get_the_ID() == '23438' || get_the_ID() == '29502' ) { // Homepage (ES,EN)  ?>

  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/hoteles.css">

  <?php } else if( get_the_ID() == '24620' || get_the_ID() == '47062'  ) { // Casos De Exito Page (ES,EN)  ?>

  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/exito.css?v=<?php echo time(); ?>">
	
  <?php } else if( get_the_ID() == '46594' ) { //Guías Legales  ?>

  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/guias-legales.css?v=<?php echo time(); ?>">
  
  <?php } else if( get_the_ID() == '24328' || get_the_ID() == '24448' || get_the_ID() == '24494' || get_the_ID() == '24543'
                || get_the_ID() == '24329'|| get_the_ID() == '41176' || get_the_ID() == '24449' || get_the_ID() == '41213' || get_the_ID() == '24495' || get_the_ID() == '41270' || get_the_ID() == '24544' || get_the_ID() == '41282'
                || get_the_ID() == '31268' || get_the_ID() == '31270' || get_the_ID() == '31272' || get_the_ID() == '31274'
                || get_the_ID() == '33301' || get_the_ID() == '33288' || get_the_ID() == '33304' || get_the_ID() == '33298' || get_the_ID() == '35804' // Landing Pages (ES,EN)
			    || get_the_ID() == '45531' || get_the_ID() == '45566' || get_the_ID() == '45602' || get_the_ID() == '45643') {
                // || get_the_ID() == '29564' || get_the_ID() == '29461' || get_the_ID() == '29594' || get_the_ID() == '29390' ) { // Landing Pages (ES,EN)  ?>

  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/hoteles.css">

  <?php } else { // Features Pages (ES,EN)  ?>

  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/features.css?v=<?php echo time(); ?>">

  <?php } ?>

  <script id='currentCountryCodeJs' nowprocket>
	/*(function ($) {
		$(document).ready(function () {
		var ajaxurl = 'https://ip-api.io/json?api_key=c19e62e0-73d6-45ab-9102-bcd186626e84';
		var currentCountryCode = '';		
		  jQuery.get(ajaxurl,{'action': 'getip'}, function (current_ip) { 
			  jQuery('.header-titles').after(' &nbsp;&nbsp;' + current_ip.country_code); 
			  jQuery('html').attr('data-country', current_ip.country_code); 
			  currentCountryCode = current_ip.country_code; //current_ip;
			  jQuery('.property-amount input').trigger('change');
			  console.log('currentCountryCode: ' + currentCountryCode);
		  }); 

		 });
	})(jQuery);
	  */
	document.addEventListener("DOMContentLoaded", function () {
		var ajaxurl = 'https://ip-api.io/json?api_key=c19e62e0-73d6-45ab-9102-bcd186626e84';
		var currentCountryCode = '';

		var xhr = new XMLHttpRequest();
		xhr.open("GET", ajaxurl, true);
		xhr.onreadystatechange = function () {
			if (xhr.readyState === 4 && xhr.status === 200) {
				var current_ip = JSON.parse(xhr.responseText);

				var headerTitles = document.getElementsByClassName('header-titles')[0];
				if (headerTitles) {
					var countryCodeText = document.createTextNode('  ' + current_ip.country_code);
					headerTitles.parentNode.insertBefore(countryCodeText, headerTitles.nextSibling);
				}

				document.documentElement.setAttribute('data-country', current_ip.country_code);
				currentCountryCode = current_ip.country_code;

				var propertyAmountInputs = document.getElementsByClassName('property-amount');
				if (propertyAmountInputs.length > 0) {
					var input = propertyAmountInputs[0].getElementsByTagName('input')[0];
					if (input) {
						var event = document.createEvent("Event");
						event.initEvent("change", true, true);
						input.dispatchEvent(event);
					}
				}

				console.log('currentCountryCode: ' + currentCountryCode);
			}
		};
		xhr.send();
	});

  </script>
  <script>
    window.onload = function(){
      var links = document.querySelectorAll('link[media="none"]')
      for (var i = 0, len = links.length; i < len; i++) {
          links[i].media = 'all'
      }
    }
  </script>
<?php /* Requested by sergio@chekin.com to comment the following on 25-06-2024 ?>	
  <!-- Global site tag (gtag.js) - Google Analytics -->
	  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-172117250-1"></script>
	  <script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-172117250-1');
	  </script>
	
	<!-- Google tag (gtag.js) - Google Analytics -->
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

	
</head>

<body <?php body_class( get_post_meta( get_the_ID(), 'body_class', true ) ); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PK7Q9R9"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

  <!-- HEADER MARKUP STARTS HERE -->
  <header>
<?php if (ICL_LANGUAGE_CODE == 'es') { /* ?>
<div class="notice" 
    <?php if (ICL_LANGUAGE_CODE == 'es') { ?>
        onclick="if (window.innerWidth < 1100) window.open('https://share.hsforms.com/1d8pjjlY1QXOWxSkpIRF12A5842w', '_blank');"
    <?php } ?>>
    Estamos integrados con SES.HOSPEDAJES, la nueva plataforma para registro de viajeros operada por el Ministerio del Interior 
    <a target="_blank" href="https://share.hsforms.com/1d8pjjlY1QXOWxSkpIRF12A5842w">Más información 
        <img src="https://chekin.com/wp-content/uploads/2023/10/arrow-notice.svg" alt="Icono de información"  width="24" height="24">
    </a>
</div>
<?php */ } ?>
<?php if (ICL_LANGUAGE_CODE == 'en') { /* ?>
<div class="notice" 
    <?php if (ICL_LANGUAGE_CODE == 'en') { ?>
        onclick="if (window.innerWidth < 1100) window.open('https://share.hsforms.com/1d8pjjlY1QXOWxSkpIRF12A5842w', '_blank');"
    <?php } ?>>
    Join our free webinar to learn how to automate the guest journey, from direct bookings to seamless check-ins - Spots Limited!
    <a target="_blank" href="https://landing.chekin.com/webinar-automating-guest-journey-with-cloudbeds">Save your spot
        <img src="https://chekin.com/wp-content/uploads/2023/10/arrow-notice.svg" alt="Icon Save your spot"  width="24" height="24">
    </a>
</div>
<?php */ } ?>	  
<?php if (ICL_LANGUAGE_CODE == 'de') { /* ?>
<div class="notice" 
    <?php if (ICL_LANGUAGE_CODE == 'de') { ?>
        onclick="if (window.innerWidth < 1100) window.open('https://share.hsforms.com/1XVKrG4z5TFG8sB0CeRvpaw5842w', '_blank');"
    <?php } ?>>
    Wir sind mit AVS Abrechnungs- und Verwaltungs-Systeme GmbH integriert 
    <a target="_blank" href="https://share.hsforms.com/1XVKrG4z5TFG8sB0CeRvpaw5842w">Weitere Informationen 
        <img src="https://chekin.com/wp-content/uploads/2023/10/arrow-notice.svg" alt="Icono de información" width="24" height="24"> 
    </a>
</div>
<?php */ } ?>
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

			$id = get_the_ID();

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
        <a href="#" aria-label="<?php echo $current_lang; ?>" >
            <img height="20" width="20" class="flug-lang" src="<?php echo get_template_directory_uri(); ?>/assets/images/flag-<?php echo $current_lang; ?>.<?php echo $current_lang == 'en' || $current_lang == 'de' ? 'png' : 'svg'; ?>" alt="">
        </a>
        <div class="sub-menu">
            <?php foreach ($selceted_lang as $opposite_lang) {
                if (icl_object_id($id, get_post_type($id), false, $opposite_lang['code'])) { ?>
                    <div class="lang-item">
                        <a href="<?php echo apply_filters('wpml_permalink', get_the_permalink(), $opposite_lang['code']); ?>">
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


  <?php
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

  ?>

  <span style="display:none;">
    <span class="lang-en"><?php echo apply_filters( 'wpml_permalink', get_the_permalink(), 'en' ); ?></span>
    <span class="lang-es"><?php echo apply_filters( 'wpml_permalink', get_the_permalink(), 'es' ); ?></span>
    <span class="lang-pt"><?php echo apply_filters( 'wpml_permalink', get_the_permalink(), 'pt' ); ?></span>
    <span class="lang-it"><?php echo apply_filters( 'wpml_permalink', get_the_permalink(), 'it' ); ?></span>
    <span class="lang-ip"><?php echo ip_visitor_country(); ?></span>
    <span class="seguros-page-id"><?php echo get_the_ID(); ?></span>
  </span>