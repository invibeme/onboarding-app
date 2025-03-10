<?php
/**
 * Template Name: Blank Template
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Chekin_2020
 * @since Chekin 2020 1.0
 */
//get_header();
?>
<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<!--<meta name="viewport" content="width=device-width, initial-scale=1.0" >-->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" >
		<link rel="canonical" href="<?php if(!empty(get_post_meta( get_the_ID(), '_yoast_wpseo_canonical', true ))){  echo get_post_meta( get_the_ID(), '_yoast_wpseo_canonical', true ); }else{ echo str_replace("dev.","",get_the_permalink(get_the_ID())); } ?>" />
        <meta name="google-site-verification" content="yeGgUmHFPvykGkLneGCvghbuZCCysmIGUFM-PNDmLAU" />
		<meta name="facebook-domain-verification" content="jwphln8kupz3e6o5cycftazsh310d2" />
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<?php wp_head(); ?>
		
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
<!-- End Google Tag Manager (noscript) --
<?php 
the_content();
//get_footer();

?>
<?php wp_footer(); ?>
	<!-- Start of HubSpot Embed Code -->
	<script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/8776616.js"></script>
	<!-- End of HubSpot Embed Code -->
</body>
</html>