<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Chekin_2020
 * @since Chekin 2020 1.0
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php
	$page_title = get_post_meta(get_the_ID(), 'page_title', true);
	$featured_image = get_post_meta(get_the_ID(), 'featured_image', true);
				
	if ( ! is_search() &&  strtolower($featured_image) !='hidden') {
		get_template_part( 'template-parts/featured-image' );
	}
	if(strtolower($page_title) !='hidden'){ 
		get_template_part( 'template-parts/entry-header' );
	}
	?>

	<div data-title="<?php echo $page_title; ?>" class="post-inner <?php echo is_page_template( 'templates/template-full-width.php' ) ? '' : 'thin'; ?> ">

		<div class="entry-content">
			
			<?php if ( is_single()){
				$share = '<ul class="blog-share reset-list-style mb-0"><li><a href="https://www.facebook.com/share.php?u='.get_the_permalink().'&title='.get_the_title().'" target="_blank"><i class="fab fa-facebook"></i> Facebook</a></li><li><a href="http://pinterest.com/pin/create/bookmarklet/?url='.get_the_permalink().'&'.get_the_title().'" target="_blank"><i class="fab fa-pinterest-p"></i> Pinterest</a></li><li><a href="http://twitter.com/intent/tweet?text='.get_the_title().'+'.get_the_permalink().'" target="_blank"><i class="fa-brands fa-x-twitter"></i> Twitter</a></li><li><a href="http://www.linkedin.com/shareArticle?mini=true&url='.get_the_permalink().'&title='.get_the_title().'" target="_blank"><i class="fab fa-linkedin-in"></i> LinkedIn</a> </li><li><a href="https://reddit.com/submit?url='.get_the_permalink().'&title='.get_the_title().'" target="_blank"><i class="fab fa-reddit-alien"></i> Reddit</a></li></ul>'; 
				
				echo '<footer class="post-footer text-center"><ul class="reset-list-style list-inline mb-0"><li><i class="icon icon-view"></i>'.do_shortcode('[views id="'.get_the_ID($post).'"]').'</li><li class="has-dropdown"><a><i class="icon icon-share"></i>'.esc_html__("Share","CheKin2020").'</a>'.$share.'</li></ul></footer>'; 
			}
			?>
			<?php
			if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
				the_excerpt();
			} else {
				the_content( __( 'Continue reading', 'chekin2020' ) );
			}
			?>
			<?php if ( is_single() && !empty(get_the_tag_list()) ) {
				echo '<div class="tags"><div class="reset-list-style">';
				//wp_list_categories();
				echo get_the_tag_list( '<ul><li>', '</li><li>', '</li></ul>');
				echo '</div></div>'; 	 
			}
			?>
			<?php 
			/*if ( is_single() ) { ?>
				<div class="related-post-cont pt-30">
					<h3 class="related-post-title"><?php _e( 'Also you may be interested in', 'chekin2020' ); ?></h3>
					<?php echo do_shortcode( '[related_post post_id=""]' ); ?>
				</div>
		<?php	}*/
			?>
		</div><!-- .entry-content -->

	</div><!-- .post-inner -->

	<div class="section-inner">
		<?php
		wp_link_pages(
			array(
				'before'      => '<nav class="post-nav-links bg-light-background" aria-label="' . esc_attr__( 'Page', 'chekin2020' ) . '"><span class="label">' . __( 'Pages:', 'chekin2020' ) . '</span>',
				'after'       => '</nav>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			)
		);

		edit_post_link();

		// Single bottom post meta.
		chekin2020_the_post_meta( get_the_ID(), 'single-bottom' );

		if ( post_type_supports( get_post_type( get_the_ID() ), 'author' ) && is_single() ) {

			get_template_part( 'template-parts/entry-author-bio' );

		}
		?>

	</div><!-- .section-inner -->

	<?php

	if ( is_single() ) {
		 
		// get_template_part( 'template-parts/navigation' );

	}

	/**
	 *  Output comments wrapper if it's a post, or if comments are open,
	 * or if there's a comment number – and check for password.
	 * */
	 /*
	if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
		?>

		<div class="comments-wrapper section-inner">

			<?php comments_template(); ?>

		</div><!-- .comments-wrapper -->

		<?php
	} */
	?>

</article><!-- .post -->
