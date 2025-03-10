<?php
/**
 * Displays the menus and widgets at the end of the main element.
 * Visually, this output is presented as part of the footer element.
 *
 * @package WordPress
 * @subpackage Chekin_2020
 * @since Chekin 2020 1.0
 */

$has_footer_menu = has_nav_menu( 'footer' );
$has_social_menu = has_nav_menu( 'social' );
$has_language_menu = has_nav_menu( 'language' );
$has_cta_menu = has_nav_menu( 'cta' );

$has_sidebar_1 = is_active_sidebar( 'sidebar-1' );
$has_sidebar_2 = is_active_sidebar( 'sidebar-2' );
$has_sidebar_3 = is_active_sidebar( 'sidebar-3' );
$has_sidebar_4 = is_active_sidebar( 'sidebar-4' );
$has_sidebar_5 = is_active_sidebar( 'sidebar-5' );
$has_sidebar_7 = is_active_sidebar( 'sidebar-7' );
?>

<?php if(is_single() || is_home() || is_archive()){ ?>
	<div id="signup" class="alignfull sec mt-0 mb-0 text-dark  sec-signup">
		<div class="section-inner">
			<?php //echo do_shortcode('[contact-form-7 id="171" title="Subscribe"]'); ?>
	 		<?php if ( $has_sidebar_7 ) { ?>
				<div class="hubspot-signup-form">
					<?php dynamic_sidebar( 'sidebar-7' ); ?>
				</div>
			<?php } ?>
		</div>
	</div>
<?php } ?>
<?php if(is_single() && $has_sidebar_5){ ?>
	<div id="single-banner" class="alignfull sec mt-0 mb-0 text-dark  sec-single-banner pt-0">
		<div class="section-inner">
			 
			<?php 
				 dynamic_sidebar( 'sidebar-5' );
			 ?>
		</div>
	</div>
<?php } ?>

<?php 

		$cta = strtolower(get_post_meta(get_the_ID(), 'cta', true));
		$app = strtolower(get_post_meta(get_the_ID(), 'app', true));
		
		
	?>
	
<?php /* if($has_sidebar_3  && (is_home() || is_front_page() || is_single() ) || is_archive() || is_page_template('templates/template-full-width.php') && $app != 'hidden'){ ?>
	<div id="app" class="alignfull  mt-0 mb-0  bottom-1 wp-block-cover has-light-background-color text-dark  sec-app">
		<div class="wp-block-cover__inner-container">
			<?php dynamic_sidebar( 'sidebar-3' ); ?>
		</div>
	</div>
<?php } */?>

<?php if($has_sidebar_4  && $cta != 'hidden'){ ?>
	<div id="cta" class="alignfull mt-0 mb-0 bottom-2 wp-block-cover text-center has-accent-background-color sec-cta">
		<div class="wp-block-cover__inner-container">
			<?php dynamic_sidebar( 'sidebar-4' ); ?>
		</div>
	</div>
<?php } ?>

<?php
// Only output the container if there are elements to display.
if ( $has_footer_menu || $has_social_menu || $has_language_menu || $has_cta_menu|| $has_sidebar_1 || $has_sidebar_2 ) {
	?>

	<div class="footer-nav-widgets-wrapper header-footer-group">

		<div class="footer-inner section-inner">
			<?php /* if ( $has_language_menu ) { ?>

				<nav aria-label="<?php esc_attr_e( 'Footer', 'chekin2020' ); ?>" role="navigation" class="footer-language-menu-wrapper">

					<ul class="footer-language-menu text-center reset-list-style">
						<?php
						wp_nav_menu(
							array(
								'container'      => '',
								'depth'          => 1,
								'items_wrap'     => '%3$s',
								'theme_location' => 'language',
							)
						);
						?>
					</ul>

				</nav><!-- .site-nav -->

			<?php } */ ?>
			<?php if ( $has_social_menu ) { ?>

				<nav aria-label="<?php esc_attr_e( 'Social links', 'chekin2020' ); ?>" class="footer-social-wrapper">

					<ul class="social-menu text-center footer-social reset-list-style social-icons fill-children-current-color">

						<?php
						wp_nav_menu(
							array(
								'theme_location'  => 'social',
								'container'       => '',
								'container_class' => '',
								'items_wrap'      => '%3$s',
								'menu_id'         => '',
								'menu_class'      => '',
								'depth'           => 1,
								'link_before'     => '<span class="screen-reader-text">',
								'link_after'      => '</span>',
								'fallback_cb'     => '',
							)
						);
						?>

					</ul><!-- .footer-social -->

				</nav><!-- .footer-social-wrapper -->

			<?php } ?>
			<?php if ( $has_cta_menu ) { ?>

				<nav aria-label="<?php esc_attr_e( 'Footer', 'chekin2020' ); ?>" role="navigation" class="footer-cta-menu-wrapper pt-20">

					<ul class="footer-cta-menu text-center reset-list-style">
						<?php
						wp_nav_menu(
							array(
								'container'      => '',
								'depth'          => 1,
								'items_wrap'     => '%3$s',
								'theme_location' => 'cta',
							)
						);
						?>
					</ul>

				</nav><!-- .site-nav -->

			<?php } ?>
					
			<?php

			$footer_top_classes = '';

			$footer_top_classes .= $has_footer_menu ? ' has-footer-menu' : '';
		

		 ?>

			<?php if ( $has_sidebar_1 || $has_footer_menu) { ?>

				<aside class="footer-widgets-outer-wrapper" role="complementary">

					<div class="footer-widgets-wrapper">

						
						<?php if ( $has_footer_menu ) { ?>
							<div class="footer-widgets column-two grid-item">
								<nav aria-label="<?php esc_attr_e( 'Footer', 'chekin2020' ); ?>" role="navigation" class="footer-menu-wrapper">

									<ul class="footer-menu  reset-list-style">
										<?php
										wp_nav_menu(
											array(
												'container'      => '',
												//'depth'          => 1,
												'items_wrap'     => '%3$s',
												'theme_location' => 'footer',
											)
										);
										?>
									</ul> 

								</nav><!-- .site-nav -->
							</div>
					<?php } ?>
						
					

							<div class="footer-widgets column-one grid-item">
								<?php if ( $has_sidebar_7 ) { ?>
									<div class="hubspot-signup-form">
										<?php dynamic_sidebar( 'sidebar-7' ); ?>
									</div>
								<?php } ?>
								<?php //echo do_shortcode('[contact-form-7 id="171" title="Subscribe"]'); ?>
							
								
								
							</div>
						
					</div><!-- .footer-widgets-wrapper -->

				</aside><!-- .footer-widgets-outer-wrapper -->

			<?php } ?>
			
			

		</div><!-- .footer-inner -->

	</div><!-- .footer-nav-widgets-wrapper -->

<?php } ?>
