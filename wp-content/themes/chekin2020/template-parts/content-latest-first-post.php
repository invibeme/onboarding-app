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

<article <?php post_class('card  wp-block-columns latest-first-post mt-0'); ?> id="post-<?php the_ID(); ?>">
<?php 
	$content = wp_trim_words(apply_filters( 'the_content', get_the_content() ), 39, '' );;
		
	$permalink = get_the_permalink();
	 
	 $tag_allow=array(
					/*'a'=>array(
						'href'=>array(),
						'title'=>array(),
					),*/
					'br'=>array(),
					'span'=>array()
				);
	//$custom_excerpt = get_the_excerpt();
	$custom_excerpt = substr(wp_kses(get_the_content(),$tag_allow), 0, 354).'.'; 
	$cats = '';
	 
	$categories = get_the_category();
	if ( ! empty( $categories ) ) {
		$cats .= '<ul class="post-cats reset-list-style list-inline">';
		foreach($categories as $cat){
			$cats .= '<li><a href="' . esc_url( get_category_link( $cat->term_id ) ) . '">' . esc_html( $cat->name ) . '</a></li>';
		}
		$cats .= '</ul>';
	}
	 
	$share = '<ul class="blog-share"><li><a href="https://www.facebook.com/share.php?u='.get_the_permalink().'&title='.get_the_title().'" target="_blank"><i class="fab fa-facebook"></i> Facebook</a></li><li><a href="http://pinterest.com/pin/create/bookmarklet/?url='.get_the_permalink().'&'.get_the_title().'" target="_blank"><i class="fab fa-pinterest-p"></i> Pinterest</a></li><li><a href="http://twitter.com/intent/tweet?status='.get_the_title().'+'.get_the_permalink().'" target="_blank"><i class="fab fa-twitter"></i> Twitter</a></li><li><a href="http://www.linkedin.com/shareArticle?mini=true&url='.get_the_permalink().'&title='.get_the_title().'" target="_blank"><i class="fab fa-linkedin-in"></i> LinkedIn</a> </li><li><a href="https://reddit.com/submit?url='.get_the_permalink().'&title='.get_the_title().'" target="_blank"><i class="fab fa-reddit-alien"></i> Reddit</a></li></ul>'; 
	
	$post_thumbnail_url = get_template_directory_uri().'/assets/images/placeholder.jpg';
	if(has_post_thumbnail( )){
		$post_thumbnail_url = get_the_post_thumbnail_url($post, 'large');
	}
	
	$output = '';
	$output .= '<div class="wp-block-column has-figure">';
	//$output .= '<figure class="figure "><a href="'. get_the_permalink() .'"><img src="'.get_template_directory_uri().'/timthumb.php?src='. $post_thumbnail_url.'&amp;w=555&amp;h=350&amp;zc=1&amp;a=t" alt="" ></a></figure>';
	if ( has_post_thumbnail() ) :
		$output .= '<figure class="figure"><a href="'. get_the_permalink() .'" aria-label="Read more about '. get_the_title() .'">'.get_the_post_thumbnail($post, 'large').'</a></figure>';
	endif;

	$output .= '<footer class="post-footer"><ul class="reset-list-style list-inline"><li><i class="icon icon-view"></i>'.do_shortcode('[views id="'.get_the_ID($post).'"]').'</li><li class="has-dropdown"><a><i class="icon icon-share"></i>'.__( 'Share', 'chekin2020' ).'</a>'.$share.'</li></ul></footer>';
	$output .= '</div>';
	$output .= '<div class="wp-block-column has-content">';
	$output .= $cats; 
	$output .= '<h5 class="post-title"><a href="'. get_the_permalink() .'">'. get_the_title() .'</a></h5>';
	$output .= '<p class="has-text-color post-content excerpt">'.$custom_excerpt.'</p>';
	$output .= '<p class="post-meta color-accent"><date class="date">'.get_the_date( 'j F Y' ).'</date></p>';
	$output .= '<div class="tags"><div class="reset-list-style">'.get_the_tag_list( '<ul><li>', '</li><li>', '</li></ul>').'</div></div>'; 	 
			
			 
	$output .= '</div>';
	echo $output;
?>

</article><!-- .post -->
