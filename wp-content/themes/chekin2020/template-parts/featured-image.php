<?php
/**
 * Displays the featured image
 *
 * @package WordPress
 * @subpackage Chekin_2020
 * @since Chekin 2020 1.0
 */

if ( has_post_thumbnail() && ! post_password_required() ) {

	$featured_media_inner_classes = '';

	// Make the featured media thinner on archive pages.
	if ( ! is_singular() ) {
		$featured_media_inner_classes .= ' medium';
	}
	?>

	<figure class="featured-media">

		<div class="featured-media-inner section-inner<?php echo $featured_media_inner_classes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static output ?>">
			<?php
				$upcoming = get_post_meta(get_the_ID(), 'upcoming', true);
				if(is_page() && !empty($upcoming)){ 
					echo '<span class="upcoming">'.$upcoming.'</span>'; 
				
				}
				if(is_single()){
					echo '<a href="'.get_permalink( get_option( 'page_for_posts' ) ).'" class="go-back"><i class="icon"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="long-arrow-alt-left" class="svg-inline--fa fa-long-arrow-alt-left fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"></path></svg></i> Back</a>';
				}
			?>
			<?php
			the_post_thumbnail('large');

			$caption = get_the_post_thumbnail_caption();

			if ( $caption ) {
				?>

				<figcaption class="wp-caption-text"><?php echo wp_kses_post( $caption ); ?></figcaption>

				<?php
			}
			?>
		
		</div><!-- .featured-media-inner -->

	</figure><!-- .featured-media -->

	<?php
}
