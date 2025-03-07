<?php header('Content-type: application/xml');	
/**
 * Template Name: Sitemap
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Chekin_2020
 * @since Chekin 2020 1.0
 */
?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"> ' ?>
<?php 
$args = array(
//'post_type'=> 'post',
'post_type' => array('page', 'post',),
'orderby'    => 'ID',
'post_status' => 'publish',
'order'    => 'DESC',
'posts_per_page' => -1 // this will retrive all the post that is published 
);
$result = new WP_Query( $args );
if ( $result-> have_posts() ) : ?>
<?php while ( $result->have_posts() ) : $result->the_post(); ?>
<?php //the_permalink(); 
$postdate = explode(" ", $post->post_modified);
echo  '<url>'.
'<loc>'. get_permalink($post->ID) .'</loc>'.
'<lastmod>'.$postdate[0] .'</lastmod>'.
'</url>';
?>   
<?php //echo '<br>'; ?>   
<?php endwhile; ?>
<?php endif; wp_reset_postdata(); ?>
<?php echo '</urlset>'; ?>
<?php
 /*
function eg_create_sitemap() {
 global $sitepress;	
 $lang= ICL_LANGUAGE_CODE;
  $sitepress->switch_lang( $lang );
$postsForSitemap = get_posts(array(
'numberposts' => -1,
'orderby' => 'modified',
'post_status' => 'publish',
//'post_type' => array('post','page'),
'post_type' => array('page'),
'order' => 'DESC',
'suppress_filters' => true,
));
$sitemap = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"> ';
foreach($postsForSitemap as $post) {
setup_postdata($post);
$postdate = explode(" ", $post->post_modified);
$sitemap .= '<url>'.
'<loc>'. get_permalink($post->ID) .'</loc>'.
'<priority>1</priority>'.
'<lastmod>'. $postdate[0] .'</lastmod>'.
'<changefreq>daily</changefreq>'.
'</url>';
}
$sitemap .= '</urlset>';
return $sitemap;
//$fp = fopen(ABSPATH . "sitemap-custom.xml", 'w');
//fwrite($fp, $sitemap);
//fclose($fp);
}

 echo eg_create_sitemap();  */
/*
?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"> ' ?>
<?php if(ICL_LANGUAGE_CODE == 'it') { ?>
	<url>
		<loc>https://chekin.com/it/blog/tre-aspetti-fondamentali-da-considerare-prima-di-diventare-host/</loc>
		<lastmod>2020-09-22T10:53:26+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/it/blog/casa-vacanze-normativa/</loc>
		<lastmod>2020-09-22T10:59:21+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/it/blog/come-aprire-una-casa-vacanze/</loc>
		<lastmod>2020-09-22T11:03:12+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/it/blog/5-regole-per-affittare-la-tua-casa-vacanze/</loc>
		<lastmod>2020-09-22T11:10:08+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/it/blog/siti-per-affittare-la-tua-casa-vacanze/</loc>
		<lastmod>2020-09-22T11:13:14+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/it/blog/contratto-di-locazione-turistica-modello/</loc>
		<lastmod>2020-09-22T11:16:59+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/it/blog/tassa-di-soggiorno/</loc>
		<lastmod>2020-09-22T11:19:56+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/it/blog/scia-inizio-attivita/</loc>
		<lastmod>2020-09-22T11:29:38+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/it/blog/scansione-documenti-check-in-piu-veloci-e-sicuri/</loc>
		<lastmod>2020-09-22T11:33:47+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/it/blog/fatturazione-elettronica/</loc>
		<lastmod>2020-09-22T11:40:05+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/it/blog/airbnb-plus-laccoglienza-che-va-oltre/</loc>
		<lastmod>2020-09-22T11:42:55+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/it/blog/roma-e-regione-lazio-guida-completa-per-locazione-turistica/</loc>
		<lastmod>2020-09-22T11:45:37+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/it/blog/connessione-con-turismo-5-istat-lombardia/</loc>
		<lastmod>2020-09-22T11:51:47+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/it/blog/cinque-consigli-per-creare-fiducia-tra-i-tuoi-ospiti/</loc>
		<lastmod>2020-09-22T12:01:54+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/it/blog/come-si-registrano-gli-ospiti-in-italia/</loc>
		<lastmod>2020-09-22T13:02:27+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/it/blog/strutture-ricettive-extra-alberghiere/</loc>
		<lastmod>2020-09-22T13:08:28+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/it/blog/come-far-risaltare-il-tuo-annuncio-nei-risultati-di-ricerca-di-airbnb/</loc>
		<lastmod>2020-09-23T08:56:52+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/it/blog/portale-alloggiati-web-come-registrare-gli-ospiti/</loc>
		<lastmod>2020-09-23T08:57:44+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/it/blog/</loc>
		<changefreq>daily</changefreq>
		<lastmod>2020-09-18T11:09:48+00:00</lastmod>
		<priority>1.0</priority>
	</url>
<?php } ?>
<?php if(ICL_LANGUAGE_CODE == 'ca') { ?>
	<url>
		<loc>https://chekin.com/ca/blog/com-categoritzar-un-allotjament-dus-turistic-a-catalunya/</loc>
		<lastmod>2020-09-22T09:07:22+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/ca/blog/com-legalitzar-un-habitatge-dus-turistic-a-catalunya/</loc>
		<lastmod>2020-09-22T09:07:48+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/ca/blog/declaracio-liquidacio-ieet-catalunya/</loc>
		<lastmod>2020-09-23T09:02:30+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/ca/blog/mossos-esquadra-realitzar-registre-viatgers/</loc>
		<lastmod>2020-09-23T09:03:48+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/ca/blog/taxa-turistica-a-catalunya-definicio-tarifes-i-objectiu/</loc>
		<lastmod>2020-10-26T19:24:56+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/ca/blog/</loc>
		<changefreq>daily</changefreq>
		<lastmod>2020-09-18T11:08:51+00:00</lastmod>
		<priority>1.0</priority>
	</url>
	<url>
		<loc>https://chekin.com/ca/blog/category/catalunya/</loc>
		<lastmod>2020-10-26T19:24:56+00:00</lastmod>
	</url>
<?php } ?>
<?php if(ICL_LANGUAGE_CODE == 'en') { ?>
	<url>
		<loc>https://chekin.com/en/guesty/</loc>
		<lastmod>2020-10-01T14:00:56+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/en/faq/</loc>
		<lastmod>2020-10-23T10:24:37+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/en/integrations/</loc>
		<lastmod>2020-10-26T17:17:13+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/en/pricing/</loc>
		<lastmod>2020-10-26T18:33:17+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/en/legal-compliance/</loc>
		<lastmod>2020-10-27T13:15:08+00:00</lastmod>
		
	</url>
	<url>
		<loc>https://chekin.com/en/online-check-in/</loc>
		<lastmod>2020-10-27T13:15:50+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/en/identity-verification/</loc>
		<lastmod>2020-10-27T13:18:07+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/en/self-check-in/</loc>
		<lastmod>2020-10-27T13:18:36+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/en/tourist-taxes/</loc>
		<lastmod>2020-10-27T13:20:21+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/en/payments/</loc>
		<lastmod>2020-10-27T13:22:12+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/en/</loc>
		<changefreq>daily</changefreq>
		<lastmod>2020-11-01T07:28:18+00:00</lastmod>
		<priority>1.0</priority>
	</url>
	<url>
		<loc>https://chekin.com/en/blog/how-to-perform-the-tourist-registration-process-at-la-guardia-civil/</loc>
		<lastmod>2018-10-26T10:40:04+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/en/blog/how-to-legally-register-guests-in-the-state-of-florida/</loc>
		<lastmod>2019-11-20T15:17:06+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/en/blog/how-to-legally-register-guests-in-chicago/</loc>
		<lastmod>2019-11-20T15:22:04+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/en/blog/european-guest-register-legislation/</loc>
		<lastmod>2020-02-19T16:44:40+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/en/blog/how-to-legally-complete-guest-registration-and-manage-your-book-keeping-for-your-tourist-accommodation/</loc>
		<lastmod>2020-09-22T08:24:10+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/en/blog/how-to-legally-register-guests-in-the-state-of-california/</loc>
		<lastmod>2020-09-22T09:24:39+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/en/blog/police-connection-to-register-guests-in-italy/</loc>
		<lastmod>2020-09-22T09:30:36+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/en/blog/guest-register-legislation-in-spain/</loc>
		<lastmod>2020-09-22T09:33:20+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/en/blog/host-registration/</loc>
		<lastmod>2020-09-22T09:48:57+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/en/blog/5-tips-to-create-confidence-among-your-guests/</loc>
		<lastmod>2020-09-22T10:20:24+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/en/blog/why-the-hospitality-industry-should-look-to-online-flight-check-in/</loc>
		<lastmod>2020-09-22T10:24:25+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/en/blog/guesty-pone-su-confianza-en-chekin/</loc>
		<lastmod>2020-09-22T10:31:25+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/en/blog/how-to-perform-tourist-registration-in-the-police-webpol-system-2/</loc>
		<lastmod>2020-09-23T08:59:17+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/en/blog/important-terms-to-know-when-renting-a-holiday-accommodation-in-spain/</loc>
		<lastmod>2020-09-23T09:00:10+00:00</lastmod>
	</url>
    <url>
		<loc>https://chekin.com/en/blog/</loc>
		<changefreq>daily</changefreq>
		<lastmod>2020-09-10T12:39:18+00:00</lastmod>
		<priority>1.0</priority>
	</url>	
	<url>
		<loc>https://chekin.com/en/blog/category/chekin-en/</loc>
		<lastmod>2020-09-22T10:31:25+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/en/blog/category/host-life-2/</loc>
		<lastmod>2020-09-23T09:00:10+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/en/blog/category/legal/</loc>
		<lastmod>2020-09-23T09:00:10+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/en/blog/category/noticias-en/</loc>
		<lastmod>2020-09-22T10:31:25+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/en/blog/category/novedades-chekin-en/</loc>
		<lastmod>2020-09-22T10:31:25+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/en/blog/category/uncategorized/</loc>
		<lastmod>2020-09-23T08:59:17+00:00</lastmod>
	</url>
	
	<?php } ?>
	<?php if(ICL_LANGUAGE_CODE == 'pt') { ?>
	<url>
		<loc>https://chekin.com/pt/seguros-e-depositos/</loc>
		<lastmod>2021-09-02T16:58:18+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/pt/hoteis/</loc>
		<lastmod>2021-09-08T13:20:06+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/pt/check-in-online/</loc>
		<lastmod>2021-09-10T11:38:43+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/pt/experiencias/</loc>
		<lastmod>2021-09-10T11:38:55+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/pt/legalidade/</loc>
		<lastmod>2021-09-10T11:39:30+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/pt/pagamentos/</loc>
		<lastmod>2021-09-10T11:39:38+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/pt/perguntas-frequentes/</loc>
		<lastmod>2021-09-10T11:39:48+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/pt/preco/</loc>
		<lastmod>2021-09-10T11:40:05+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/pt/self-check-in/</loc>
		<lastmod>2021-09-10T11:40:22+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/pt/taxas-turisticas/</loc>
		<lastmod>2021-09-10T11:40:31+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/pt/verificacao-de-identidade/</loc>
		<lastmod>2021-09-10T11:40:49+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/pt/integracoes/</loc>
		<lastmod>2021-09-20T20:07:05+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/pt/</loc>
		<changefreq>daily</changefreq>
		<lastmod>2021-09-08T15:20:06+02:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/pt/blog/</loc>
		<changefreq>daily</changefreq>
		<lastmod>2021-09-10T13:38:20+02:00</lastmod>
		<priority>1.0</priority>
	</url>
	<url>
		<loc>https://chekin.com/pt/blog/chekin-continua-a-sua-expansao-e-chega-a-portugal/</loc>
		<lastmod>2021-09-20T07:53:15+00:00</lastmod>
	</url>
	<url>
		<loc>https://chekin.com/pt/blog/category/chekin-2/</loc>
		<lastmod>2021-09-20T07:53:15+00:00</lastmod>
	</url>
	<?php } ?>
</urlset>

<?php */ ?>