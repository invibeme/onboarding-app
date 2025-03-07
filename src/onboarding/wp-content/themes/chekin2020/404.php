<?php
/**
 * The template for displaying the 404 template in the Chekin 2020 theme.
 *
 * @package WordPress
 * @subpackage Chekin_2020
 * @since Chekin 2020 1.0
 */
wp_redirect( home_url().'?'.$_SERVER['QUERY_STRING'] ); exit;
get_header();
?>

<main id="site-content" role="main">

	<div class="section-inner thin error404-content">

		<h1 class="entry-title"><?php _e( 'Page Not Found', 'chekin2020' ); ?></h1>

		<div class="intro-text"><p><?php _e( 'The page you were looking for could not be found. It might have been removed, renamed, or did not exist in the first place.', 'chekin2020' ); ?></p></div>

		<?php
		get_search_form(
			array(
				'label' => __( '404 not found', 'chekin2020' ),
			)
		);
		?>

	</div><!-- .section-inner -->

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php
get_footer();
