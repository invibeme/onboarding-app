<?php
/**
 * The template for displaying single posts and pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Chekin_2020
 * @since Chekin 2020 1.0
 */

get_header();
?>

<main id="site-content" role="main" data-sticky-container data-margin-top="150" data-sticky-for="991">
	
		
	
	
	<?php
	if(!is_single()){
		if ( have_posts() ) {

			while ( have_posts() ) {
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );
			}
		}
	} else{
	?>
		<div class="section-inner">
			<div class="post-content  wp-block-columns columns-2">
				<div class="wp-block-column content">
					<?php

					if ( have_posts() ) {

						while ( have_posts() ) {
							the_post();

							get_template_part( 'template-parts/content', get_post_type() );
						}
					}

					?>
				</div>
				<div class="wp-block-column sidebar">
						<?php if(is_active_sidebar( 'sidebar-7' )) { ?>
						<div class="hubspot-signup-form sticky" data-sticky data-margin-top="150" >
							<?php dynamic_sidebar( 'sidebar-7' ); ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	<?php } ?>	
	
</main><!-- #site-content -->

<?php // get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>
