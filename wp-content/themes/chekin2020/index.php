<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Chekin_2020
 * @since Chekin 2020 1.0
 */

get_header();
?>

<main id="site-content" role="main">

	<?php

	$archive_title    = '';
	$archive_subtitle = '';

	if ( is_search() ) {
		global $wp_query;

		$archive_title = sprintf(
			'%1$s %2$s',
			'<span class="color-accent">' . __( 'Search:', 'chekin2020' ) . '</span>',
			'&ldquo;' . get_search_query() . '&rdquo;'
		);

		if ( $wp_query->found_posts ) {
			$archive_subtitle = sprintf(
				/* translators: %s: Number of search results. */
				_n(
					'We found %s result for your search.',
					'We found %s results for your search.',
					$wp_query->found_posts,
					'chekin2020'
				),
				number_format_i18n( $wp_query->found_posts )
			);
		} else {
			$archive_subtitle = __( 'We could not find any results for your search. You can give it another try through the search form below.', 'chekin2020' );
		}
	} elseif ( is_archive() && ! have_posts() ) {
		$archive_title = __( 'Nothing Found', 'chekin2020' );
	} elseif ( ! is_home() ) {
		$archive_title    = get_the_archive_title();
		$archive_subtitle = get_the_archive_description();
	}elseif (  is_home() ) {
		$archive_title    = get_the_title( get_option('page_for_posts', true) );;
		//$archive_subtitle = get_the_archive_description();
	}

	if ( $archive_title || $archive_subtitle ) {
		?>

		<header class="archive-header has-text-align-left header-footer-group">

			<div class="archive-header-inner section-inner medium">

				<?php if ( $archive_title ) { ?>
					<h1 class="archive-title mb-20"><?php echo wp_kses_post( $archive_title ); ?></h1>
				<?php } ?>

				<?php if ( $archive_subtitle ) { ?>
					<div class="archive-subtitle section-inner thin max-percentage intro-text"><?php echo wp_kses_post( wpautop( $archive_subtitle ) ); ?></div>
				<?php } ?>
				
				<?php 
					global $wp_query;
					if ( $wp_query->found_posts ) {
						//echo do_shortcode('[contact-form-7 id="171" title="Subscribe"]'); 
					?>
					<?php if(is_active_sidebar( 'sidebar-7' )) { ?>
						<div class="hubspot-signup-form">
							<?php dynamic_sidebar( 'sidebar-7' ); ?>
						</div>
					<?php } ?>
					<?php if(is_active_sidebar( 'sidebar-1' )) { ?>
						<div class="sidebar-1">
						</div>
					<?php } ?>
				<?php
					} ?>
				
			</div><!-- .archive-header-inner -->

		</header><!-- .archive-header -->

		<?php
	} ?>
<div class="wp-block-group alignfull sec posts-listing pt-0 pb-0 mb-0 mt-0">
		<div class="wp-block-group__inner-container">	
	<?php
	
	if ( have_posts() ) { ?>
		<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		 
			if(is_home() && 1 == $paged){
				$i = 0;
				while ( have_posts() ) {
					$i++;
					if ( $i > 1 ) {
						//echo '<hr class="post-separator styled-separator is-style-wide section-inner" aria-hidden="true" />';
					}
					the_post();
					echo '<section class="wp-block-column post pb-0 pt-0">';
					//get_template_part( 'template-parts/content', get_post_type() );
					get_template_part( 'template-parts/content', 'latest-first-post' );
					echo '</section>';
				if($i == 1){ break;}
				}
			}
			?>
			<div class="filter">
				<ul class="categoriesCont reset-list-style">
						<?php wp_list_categories( array(
							'show_option_all' =>  __( 'Latest', 'chekin2020' ), 
							'orderby'    => 'name',
							'show_count' => false,
							'exclude'    => array(),
							'depth' => 1,
							
						) ); ?> 
					</ul>
					<?php
				get_search_form(
					array(
						'label' => __( 'Search', 'chekin2020' ),
					)
				);
				?>
			</div>
			
			<div class="latest-posts  wp-block-columns columns-3">
			<?php
				$i = 0;
				
				while ( have_posts() ) {
					$i++;
					if ( $i > 1 ) {
						//echo '<hr class="post-separator styled-separator is-style-wide section-inner" aria-hidden="true" />';
					}
					the_post();
					echo '<div class="wp-block-column post">';
					//get_template_part( 'template-parts/content', get_post_type() );
					get_template_part( 'template-parts/content', 'repeater' );
					echo '</div>';
				}
			?>
			</div>
		
	<?php 
	} elseif ( is_search() ) {
		?>

		<div class="no-search-results-form section-inner thin">

			<?php
			get_search_form(
				array(
					'label' => __( 'search again', 'chekin2020' ),
				)
			);
			?>

		</div><!-- .no-search-results -->

		<?php
	}
	?>

	<?php get_template_part( 'template-parts/pagination' ); ?>
</div>
	</div>
</main><!-- #site-content -->

<?php // get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php
get_footer();
