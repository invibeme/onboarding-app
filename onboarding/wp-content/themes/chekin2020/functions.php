<?php
/**
 * Chekin 2020 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Chekin_2020
 * @since Chekin 2020 1.0
 */

/**
 * Table of Contents:
 * Theme Support
 * Required Files
 * Register Styles
 * Register Scripts
 * Register Menus
 * Custom Logo
 * WP Body Open
 * Register Sidebars
 * Enqueue Block Editor Assets
 * Enqueue Classic Editor Styles
 * Block Editor Settings
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function chekin2020_theme_support() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Custom background color.
	add_theme_support(
		'custom-background',
		array(
			'default-color' => 'f5efe0',
		)
	);

	// Set content-width.
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 580;
	}

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// Set post thumbnail size.
	set_post_thumbnail_size( 1200, 9999 );

	// Add custom image size used in Cover Template.
	add_image_size( 'chekin2020-fullscreen', 1980, 9999 );

	// Custom logo.
	$logo_width  = 120;
	$logo_height = 90;

	// If the retina setting is active, double the recommended width and height.
	if ( get_theme_mod( 'retina_logo', false ) ) {
		$logo_width  = floor( $logo_width * 2 );
		$logo_height = floor( $logo_height * 2 );
	}

	add_theme_support(
		'custom-logo',
		array(
			'height'      => $logo_height,
			'width'       => $logo_width,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Chekin 2020, use a find and replace
	 * to change 'chekin2020' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'chekin2020' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for responsive embeds.
	add_theme_support( 'responsive-embeds' );

	/*
	 * Adds starter content to highlight the theme on fresh sites.
	 * This is done conditionally to avoid loading the starter content on every
	 * page load, as it is a one-off operation only needed once in the customizer.
	 */
	if ( is_customize_preview() ) {
		require get_template_directory() . '/inc/starter-content.php';
		add_theme_support( 'starter-content', chekin2020_get_starter_content() );
	}

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * Adds `async` and `defer` support for scripts registered or enqueued
	 * by the theme.
	 */
	$loader = new chekin2020_Script_Loader();
	add_filter( 'script_loader_tag', array( $loader, 'filter_script_loader_tag' ), 10, 2 );

}

add_action( 'after_setup_theme', 'chekin2020_theme_support' );

/**
 * REQUIRED FILES
 * Include required files.
 */
require get_template_directory() . '/inc/template-tags.php';

// Handle SVG icons.
require get_template_directory() . '/classes/class-chekin2020-svg-icons.php';
require get_template_directory() . '/inc/svg-icons.php';

// Handle Customizer settings.
require get_template_directory() . '/classes/class-chekin2020-customize.php';

// Require Separator Control class.
require get_template_directory() . '/classes/class-chekin2020-separator-control.php';

// Custom comment walker.
require get_template_directory() . '/classes/class-chekin2020-walker-comment.php';

// Custom page walker.
require get_template_directory() . '/classes/class-chekin2020-walker-page.php';

// Custom script loader class.
require get_template_directory() . '/classes/class-chekin2020-script-loader.php';

// Non-latin language handling.
require get_template_directory() . '/classes/class-chekin2020-non-latin-languages.php';

// Custom CSS.
require get_template_directory() . '/inc/custom-css.php';

/**
 * Register and Enqueue Styles.
 */
function chekin2020_register_styles() {

	$theme_version = wp_get_theme()->get( 'Version' );

	//wp_enqueue_style( 'font-awesome-style', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css', array(), $theme_version );
	//wp_enqueue_style( 'slick-style', get_template_directory_uri().'/assets/slick/slick.css', array(), $theme_version );
	//wp_enqueue_style( 'slick-theme-style', get_template_directory_uri().'/assets/slick/slick-theme.css', array(), $theme_version );
	//wp_enqueue_style( 'fancybox-style', get_template_directory_uri().'/assets/fancybox/jquery.fancybox.min.css', array(), $theme_version );
	wp_enqueue_style( 'chekin2020-style', get_stylesheet_uri(), array(), time() );
	wp_style_add_data( 'chekin2020-style', 'rtl', 'replace' );

	// Add output of Customizer settings as inline style.
	wp_add_inline_style( 'chekin2020-style', chekin2020_get_customizer_css( 'front-end' ) );

	// Add print CSS.
	//wp_enqueue_style( 'chekin2020-print-style', get_template_directory_uri() . '/print.css', null, $theme_version, 'print' );

}

add_action( 'wp_enqueue_scripts', 'chekin2020_register_styles' );

/**
 * Register and Enqueue Scripts.
 */
function chekin2020_register_scripts() {

	$theme_version = wp_get_theme()->get( 'Version' );

	if ( ( ! is_admin() ) && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	//wp_enqueue_script( 'slick-carousel', get_template_directory_uri().'/assets/slick/slick.min.js', array('jquery'), $theme_version, true );
	//wp_enqueue_script( 'fancybox-carousel', get_template_directory_uri().'/assets/fancybox/jquery.fancybox.min.js', array('jquery'), $theme_version, true );
	wp_enqueue_script( 'googleapi-library', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAXhHGxcKaNND7SOkTmwOsO9VwcoKAEQA4&language='.apply_filters( 'wpml_current_language', NULL ).'&callback=initAutocomplete&libraries=places&v=weekly', array('jquery'), $theme_version, true );
   
    wp_enqueue_script( 'googleapi-js', get_template_directory_uri() . '/assets/js/googleapi.js', array(), time(), false );
	
	if(is_page( 43186 )){
		// Load index_ab.js if https://chekin.com/onboarding/registration-2-steps/.
		wp_enqueue_script( 'chekin2020-js', get_template_directory_uri() . '/assets/js/index_ab.js', array(), time(), true );
	}else{
		// Load index.js by default.
		wp_enqueue_script( 'chekin2020-js', get_template_directory_uri() . '/assets/js/index.js', array(), time(), true );
	}
	
	
	wp_script_add_data( 'chekin2020-js', 'async', true );

}

add_action( 'wp_enqueue_scripts', 'chekin2020_register_scripts' );

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function chekin2020_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- assets/js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'chekin2020_skip_link_focus_fix' );

/** Enqueue non-latin language styles
 *
 * @since Chekin 2020 1.0
 *
 * @return void
 */
function chekin2020_non_latin_languages() {
	$custom_css = chekin2020_Non_Latin_Languages::get_non_latin_css( 'front-end' );

	if ( $custom_css ) {
		wp_add_inline_style( 'chekin2020-style', $custom_css );
	}
}

add_action( 'wp_enqueue_scripts', 'chekin2020_non_latin_languages' );

/**
 * Register navigation menus uses wp_nav_menu in five places.
 */
function chekin2020_menus() {

	$locations = array(
		'primary'  => __( 'Desktop Horizontal Menu', 'chekin2020' ),
		'expanded' => __( 'Desktop Expanded Menu', 'chekin2020' ),
		'mobile'   => __( 'Mobile Menu', 'chekin2020' ),
		'footer'   => __( 'Footer Menu', 'chekin2020' ),
		'social'   => __( 'Social Menu', 'chekin2020' ),
		'language'   => __( 'Language Menu', 'chekin2020' ),
		'cta'   => __( 'CTA Menu', 'chekin2020' ),
	);

	register_nav_menus( $locations );
}

add_action( 'init', 'chekin2020_menus' );

/**
 * Get the information about the logo.
 *
 * @param string $html The HTML output from get_custom_logo (core function).
 * @return string
 */
function chekin2020_get_custom_logo( $html ) {

	$logo_id = get_theme_mod( 'custom_logo' );

	if ( ! $logo_id ) {
		return $html;
	}

	$logo = wp_get_attachment_image_src( $logo_id, 'full' );

	if ( $logo ) {
		// For clarity.
		$logo_width  = esc_attr( $logo[1] );
		$logo_height = esc_attr( $logo[2] );

		// If the retina logo setting is active, reduce the width/height by half.
		if ( get_theme_mod( 'retina_logo', false ) ) {
			$logo_width  = floor( $logo_width / 2 );
			$logo_height = floor( $logo_height / 2 );

			$search = array(
				'/width=\"\d+\"/iU',
				'/height=\"\d+\"/iU',
			);

			$replace = array(
				"width=\"{$logo_width}\"",
				"height=\"{$logo_height}\"",
			);

			// Add a style attribute with the height, or append the height to the style attribute if the style attribute already exists.
			if ( strpos( $html, ' style=' ) === false ) {
				$search[]  = '/(src=)/';
				$replace[] = "style=\"height: {$logo_height}px;\" src=";
			} else {
				$search[]  = '/(style="[^"]*)/';
				$replace[] = "$1 height: {$logo_height}px;";
			}

			$html = preg_replace( $search, $replace, $html );

		}
	}

	return $html;

}

add_filter( 'get_custom_logo', 'chekin2020_get_custom_logo' );

if ( ! function_exists( 'wp_body_open' ) ) {

	/**
	 * Shim for wp_body_open, ensuring backward compatibility with versions of WordPress older than 5.2.
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

/**
 * Include a skip to content link at the top of the page so that users can bypass the menu.
 */
function chekin2020_skip_link() {
	echo '<a class="skip-link screen-reader-text" href="#site-content">' . __( 'Skip to the content', 'chekin2020' ) . '</a>';
}

add_action( 'wp_body_open', 'chekin2020_skip_link', 5 );

/**
 * Register widget areas.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function chekin2020_sidebar_registration() {

	// Arguments used in all register_sidebar() calls.
	$shared_args = array(
		'before_title'  => '<h2 class="widget-title subheading heading-size-3">',
		'after_title'   => '</h2>',
		'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></div>',
	);

	// Footer #1.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer #1', 'chekin2020' ),
				'id'          => 'sidebar-1',
				'description' => __( 'Widgets in this area will be displayed in the first column in the footer.', 'chekin2020' ),
			)
		)
	);

	// Footer #2.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer #2', 'chekin2020' ),
				'id'          => 'sidebar-2',
				'description' => __( 'Widgets in this area will be displayed in the second column in the footer.', 'chekin2020' ),
			)
		)
	);
	
	// Bottom #1.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Bottom #1', 'chekin2020' ),
				'id'          => 'sidebar-3',
				'description' => __( 'Widgets in this area will be displayed in the bottm above footer.', 'chekin2020' ),
			)
		)
	);
	// Bottom #2.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Bottom #2', 'chekin2020' ),
				'id'          => 'sidebar-4',
				'description' => __( 'Widgets in this area will be displayed in the bottm above footer.', 'chekin2020' ),
			)
		)
	);
	
	// Blog Single Bottom Banner.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Blog Single Bottom Banner', 'chekin2020' ),
				'id'          => 'sidebar-5',
				'description' => __( 'Widgets in this area will be displayed at the bottm of single page below the signup form.', 'chekin2020' ),
			)
		)
	);
	
	// Header Logo
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Header Logo', 'chekin2020' ),
				'id'          => 'sidebar-6',
				'description' => __( 'Widgets in this area will be displayed at the header', 'chekin2020' ),
			)
		)
	);
	
	// Signup Form
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Signup Form', 'chekin2020' ),
				'id'          => 'sidebar-7',
				'description' => __( 'Widgets in this area will be displayed at Signup arear', 'chekin2020' ),
			)
		)
	);
	
	// Campaign Header Logo
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Campaign Header Logo', 'chekin2020' ),
				'id'          => 'sidebar-8',
				'description' => __( 'Widgets in this area will be displayed at the header for campaign page', 'chekin2020' ),
			)
		)
	);
}

add_action( 'widgets_init', 'chekin2020_sidebar_registration' );

/**
 * Enqueue supplemental block editor styles.
 */
function chekin2020_block_editor_styles() {

	// Enqueue the editor styles.
	wp_enqueue_style( 'chekin2020-block-editor-styles', get_theme_file_uri( '/assets/css/editor-style-block.css' ), array(), wp_get_theme()->get( 'Version' ), 'all' );
	wp_style_add_data( 'chekin2020-block-editor-styles', 'rtl', 'replace' );

	// Add inline style from the Customizer.
	wp_add_inline_style( 'chekin2020-block-editor-styles', chekin2020_get_customizer_css( 'block-editor' ) );

	// Add inline style for non-latin fonts.
	wp_add_inline_style( 'chekin2020-block-editor-styles', chekin2020_Non_Latin_Languages::get_non_latin_css( 'block-editor' ) );

	// Enqueue the editor script.
	wp_enqueue_script( 'chekin2020-block-editor-script', get_theme_file_uri( '/assets/js/editor-script-block.js' ), array( 'wp-blocks', 'wp-dom' ), wp_get_theme()->get( 'Version' ), true );
}

add_action( 'enqueue_block_editor_assets', 'chekin2020_block_editor_styles', 1, 1 );

/**
 * Enqueue classic editor styles.
 */
function chekin2020_classic_editor_styles() {

	$classic_editor_styles = array(
		'/assets/css/editor-style-classic.css',
	);

	add_editor_style( $classic_editor_styles );

}

add_action( 'init', 'chekin2020_classic_editor_styles' );

/**
 * Output Customizer settings in the classic editor.
 * Adds styles to the head of the TinyMCE iframe. Kudos to @Otto42 for the original solution.
 *
 * @param array $mce_init TinyMCE styles.
 * @return array TinyMCE styles.
 */
function chekin2020_add_classic_editor_customizer_styles( $mce_init ) {

	$styles = chekin2020_get_customizer_css( 'classic-editor' );

	if ( ! isset( $mce_init['content_style'] ) ) {
		$mce_init['content_style'] = $styles . ' ';
	} else {
		$mce_init['content_style'] .= ' ' . $styles . ' ';
	}

	return $mce_init;

}

add_filter( 'tiny_mce_before_init', 'chekin2020_add_classic_editor_customizer_styles' );

/**
 * Output non-latin font styles in the classic editor.
 * Adds styles to the head of the TinyMCE iframe. Kudos to @Otto42 for the original solution.
 *
 * @param array $mce_init TinyMCE styles.
 * @return array TinyMCE styles.
 */
function chekin2020_add_classic_editor_non_latin_styles( $mce_init ) {

	$styles = chekin2020_Non_Latin_Languages::get_non_latin_css( 'classic-editor' );

	// Return if there are no styles to add.
	if ( ! $styles ) {
		return $mce_init;
	}

	if ( ! isset( $mce_init['content_style'] ) ) {
		$mce_init['content_style'] = $styles . ' ';
	} else {
		$mce_init['content_style'] .= ' ' . $styles . ' ';
	}

	return $mce_init;

}

add_filter( 'tiny_mce_before_init', 'chekin2020_add_classic_editor_non_latin_styles' );

/**
 * Block Editor Settings.
 * Add custom colors and font sizes to the block editor.
 */
function chekin2020_block_editor_settings() {

	// Block Editor Palette.
	$editor_color_palette = array(
		array(
			'name'  => __( 'Accent Color', 'chekin2020' ),
			'slug'  => 'accent',
			'color' => chekin2020_get_color_for_area( 'content', 'accent' ),
		),
		array(
			'name'  => __( 'Primary', 'chekin2020' ),
			'slug'  => 'primary',
			'color' => chekin2020_get_color_for_area( 'content', 'text' ),
		),
		array(
			'name'  => __( 'Secondary', 'chekin2020' ),
			'slug'  => 'secondary',
			'color' => chekin2020_get_color_for_area( 'content', 'secondary' ),
		),
		array(
			'name'  => __( 'Subtle Background', 'chekin2020' ),
			'slug'  => 'subtle-background',
			'color' => chekin2020_get_color_for_area( 'content', 'borders' ),
		),
	);

	// Add the background option.
	$background_color = get_theme_mod( 'background_color' );
	if ( ! $background_color ) {
		$background_color_arr = get_theme_support( 'custom-background' );
		$background_color     = $background_color_arr[0]['default-color'];
	}
	$editor_color_palette[] = array(
		'name'  => __( 'Background Color', 'chekin2020' ),
		'slug'  => 'background',
		'color' => '#' . $background_color,
	);

	// If we have accent colors, add them to the block editor palette.
	if ( $editor_color_palette ) {
		add_theme_support( 'editor-color-palette', $editor_color_palette );
	}

	// Block Editor Font Sizes.
	add_theme_support(
		'editor-font-sizes',
		array(
			array(
				'name'      => _x( 'Small', 'Name of the small font size in the block editor', 'chekin2020' ),
				'shortName' => _x( 'S', 'Short name of the small font size in the block editor.', 'chekin2020' ),
				'size'      => 18,
				'slug'      => 'small',
			),
			array(
				'name'      => _x( 'Regular', 'Name of the regular font size in the block editor', 'chekin2020' ),
				'shortName' => _x( 'M', 'Short name of the regular font size in the block editor.', 'chekin2020' ),
				'size'      => 21,
				'slug'      => 'normal',
			),
			array(
				'name'      => _x( 'Large', 'Name of the large font size in the block editor', 'chekin2020' ),
				'shortName' => _x( 'L', 'Short name of the large font size in the block editor.', 'chekin2020' ),
				'size'      => 26.25,
				'slug'      => 'large',
			),
			array(
				'name'      => _x( 'Larger', 'Name of the larger font size in the block editor', 'chekin2020' ),
				'shortName' => _x( 'XL', 'Short name of the larger font size in the block editor.', 'chekin2020' ),
				'size'      => 32,
				'slug'      => 'larger',
			),
		)
	);

	add_theme_support( 'editor-styles' );

	// If we have a dark background color then add support for dark editor style.
	// We can determine if the background color is dark by checking if the text-color is white.
	if ( '#ffffff' === strtolower( chekin2020_get_color_for_area( 'content', 'text' ) ) ) {
		add_theme_support( 'dark-editor-style' );
	}

}

add_action( 'after_setup_theme', 'chekin2020_block_editor_settings' );

/**
 * Overwrite default more tag with styling and screen reader markup.
 *
 * @param string $html The default output HTML for the more tag.
 * @return string
 */
function chekin2020_read_more_tag( $html ) {
	return preg_replace( '/<a(.*)>(.*)<\/a>/iU', sprintf( '<div class="read-more-button-wrap"><a$1><span class="faux-button">$2</span> <span class="screen-reader-text">"%1$s"</span></a></div>', get_the_title( get_the_ID() ) ), $html );
}

add_filter( 'the_content_more_link', 'chekin2020_read_more_tag' );

/**
 * Enqueues scripts for customizer controls & settings.
 *
 * @since Chekin 2020 1.0
 *
 * @return void
 */
function chekin2020_customize_controls_enqueue_scripts() {
	$theme_version = wp_get_theme()->get( 'Version' );

	// Add main customizer js file.
	wp_enqueue_script( 'chekin2020-customize', get_template_directory_uri() . '/assets/js/customize.js', array( 'jquery' ), $theme_version, false );

	// Add script for color calculations.
	wp_enqueue_script( 'chekin2020-color-calculations', get_template_directory_uri() . '/assets/js/color-calculations.js', array( 'wp-color-picker' ), $theme_version, false );

	// Add script for controls.
	wp_enqueue_script( 'chekin2020-customize-controls', get_template_directory_uri() . '/assets/js/customize-controls.js', array( 'chekin2020-color-calculations', 'customize-controls', 'underscore', 'jquery' ), $theme_version, false );
	wp_localize_script( 'chekin2020-customize-controls', 'chekin2020BgColors', chekin2020_get_customizer_color_vars() );
}

add_action( 'customize_controls_enqueue_scripts', 'chekin2020_customize_controls_enqueue_scripts' );

/**
 * Enqueue scripts for the customizer preview.
 *
 * @since Chekin 2020 1.0
 *
 * @return void
 */
function chekin2020_customize_preview_init() {
	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script( 'chekin2020-customize-preview', get_theme_file_uri( '/assets/js/customize-preview.js' ), array( 'customize-preview', 'customize-selective-refresh', 'jquery' ), $theme_version, true );
	wp_localize_script( 'chekin2020-customize-preview', 'chekin2020BgColors', chekin2020_get_customizer_color_vars() );
	wp_localize_script( 'chekin2020-customize-preview', 'chekin2020PreviewEls', chekin2020_get_elements_array() );

	wp_add_inline_script(
		'chekin2020-customize-preview',
		sprintf(
			'wp.customize.selectiveRefresh.partialConstructor[ %1$s ].prototype.attrs = %2$s;',
			wp_json_encode( 'cover_opacity' ),
			wp_json_encode( chekin2020_customize_opacity_range() )
		)
	);
}

add_action( 'customize_preview_init', 'chekin2020_customize_preview_init' );

/**
 * Get accessible color for an area.
 *
 * @since Chekin 2020 1.0
 *
 * @param string $area The area we want to get the colors for.
 * @param string $context Can be 'text' or 'accent'.
 * @return string Returns a HEX color.
 */
function chekin2020_get_color_for_area( $area = 'content', $context = 'text' ) {

	// Get the value from the theme-mod.
	$settings = get_theme_mod(
		'accent_accessible_colors',
		array(
			'content'       => array(
				'text'      => '#161643',
				'accent'    => '#2960F5',
				'secondary' => '#6d6d6d',
				'borders'   => '#EDEDFA',
			),
			'header-footer' => array(
				'text'      => '#161643',
				'accent'    => '#2960F5',
				'secondary' => '#6d6d6d',
				'borders'   => '#EDEDFA',
			),
		)
	);

	// If we have a value return it.
	if ( isset( $settings[ $area ] ) && isset( $settings[ $area ][ $context ] ) ) {
		return $settings[ $area ][ $context ];
	}

	// Return false if the option doesn't exist.
	return false;
}

/**
 * Returns an array of variables for the customizer preview.
 *
 * @since Chekin 2020 1.0
 *
 * @return array
 */
function chekin2020_get_customizer_color_vars() {
	$colors = array(
		'content'       => array(
			'setting' => 'background_color',
		),
		'header-footer' => array(
			'setting' => 'header_footer_background_color',
		),
	);
	return $colors;
}

/**
 * Get an array of elements.
 *
 * @since Chekin 2020 1.0
 *
 * @return array
 */
function chekin2020_get_elements_array() {

	// The array is formatted like this:
	// [key-in-saved-setting][sub-key-in-setting][css-property] = [elements].
	$elements = array(
		'content'       => array(
			'accent'     => array(
				'color'            => array( '.color-accent', '.color-accent-hover:hover', '.color-accent-hover:focus', ':root .has-accent-color', '.has-drop-cap:not(:focus):first-letter', '.wp-block-button.is-style-outline', 'a' ),
				'border-color'     => array( 'blockquote', '.border-color-accent', '.border-color-accent-hover:hover', '.border-color-accent-hover:focus' ),
				'background-color' => array( 'button', '.button', '.faux-button', '.wp-block-button__link', '.wp-block-file .wp-block-file__button', 'input[type="button"]', 'input[type="reset"]', 'input[type="submit"]', '.bg-accent', '.bg-accent-hover:hover', '.bg-accent-hover:focus', ':root .has-accent-background-color', '.comment-reply-link' ),
				'fill'             => array( '.fill-children-accent', '.fill-children-accent *' ),
			),
			'background' => array(
				'color'            => array( ':root .has-background-color', 'button', '.button', '.faux-button', '.wp-block-button__link', '.wp-block-file__button', 'input[type="button"]', 'input[type="reset"]', 'input[type="submit"]', '.wp-block-button', '.comment-reply-link', '.has-background.has-primary-background-color:not(.has-text-color)', '.has-background.has-primary-background-color *:not(.has-text-color)', '.has-background.has-accent-background-color:not(.has-text-color)', '.has-background.has-accent-background-color *:not(.has-text-color)' ),
				'background-color' => array( ':root .has-background-background-color' ),
			),
			'text'       => array(
				'color'            => array( 'body', '.entry-title a', ':root .has-primary-color' ),
				'background-color' => array( ':root .has-primary-background-color' ),
			),
			'secondary'  => array(
				'color'            => array( 'cite', 'figcaption', '.wp-caption-text', '.post-meta', '.entry-content .wp-block-archives li', '.entry-content .wp-block-categories li', '.entry-content .wp-block-latest-posts li', '.wp-block-latest-comments__comment-date', '.wp-block-latest-posts__post-date', '.wp-block-embed figcaption', '.wp-block-image figcaption', '.wp-block-pullquote cite', '.comment-metadata', '.comment-respond .comment-notes', '.comment-respond .logged-in-as', '.pagination .dots', '.entry-content hr:not(.has-background)', 'hr.styled-separator', ':root .has-secondary-color' ),
				'background-color' => array( ':root .has-secondary-background-color' ),
			),
			'borders'    => array(
				'border-color'        => array( 'pre', 'fieldset', 'input', 'textarea', 'table', 'table *', 'hr' ),
				'background-color'    => array( 'caption', 'code', 'code', 'kbd', 'samp', '.wp-block-table.is-style-stripes tbody tr:nth-child(odd)', ':root .has-subtle-background-background-color' ),
				'border-bottom-color' => array( '.wp-block-table.is-style-stripes' ),
				'border-top-color'    => array( '.wp-block-latest-posts.is-grid li' ),
				'color'               => array( ':root .has-subtle-background-color' ),
			),
		),
		'header-footer' => array(
			'accent'     => array(
				'color'            => array( 'body:not(.overlay-header) .primary-menu > li > a', 'body:not(.overlay-header) .primary-menu > li > .icon', '.modal-menu a', '.footer-menu a, .footer-widgets a', '#site-footer .wp-block-button.is-style-outline', '.wp-block-pullquote:before', '.singular:not(.overlay-header) .entry-header a', '.archive-header a', '.header-footer-group .color-accent', '.header-footer-group .color-accent-hover:hover' ),
				'background-color' => array( '.social-icons a', '#site-footer button:not(.toggle)', '#site-footer .button', '#site-footer .faux-button', '#site-footer .wp-block-button__link', '#site-footer .wp-block-file__button', '#site-footer input[type="button"]', '#site-footer input[type="reset"]', '#site-footer input[type="submit"]' ),
			),
			'background' => array(
				'color'            => array( '.social-icons a', 'body:not(.overlay-header) .primary-menu ul', '.header-footer-group button', '.header-footer-group .button', '.header-footer-group .faux-button', '.header-footer-group .wp-block-button:not(.is-style-outline) .wp-block-button__link', '.header-footer-group .wp-block-file__button', '.header-footer-group input[type="button"]', '.header-footer-group input[type="reset"]', '.header-footer-group input[type="submit"]' ),
				'background-color' => array( '#site-header', '.footer-nav-widgets-wrapper', '#site-footer', '.menu-modal', '.menu-modal-inner', '.search-modal-inner', '.archive-header', '.singular .entry-header', '.singular .featured-media:before', '.wp-block-pullquote:before' ),
			),
			'text'       => array(
				'color'               => array( '.header-footer-group', 'body:not(.overlay-header) #site-header .toggle', '.menu-modal .toggle' ),
				'background-color'    => array( 'body:not(.overlay-header) .primary-menu ul' ),
				'border-bottom-color' => array( 'body:not(.overlay-header) .primary-menu > li > ul:after' ),
				'border-left-color'   => array( 'body:not(.overlay-header) .primary-menu ul ul:after' ),
			),
			'secondary'  => array(
				'color' => array( '.site-description', 'body:not(.overlay-header) .toggle-inner .toggle-text', '.widget .post-date', '.widget .rss-date', '.widget_archive li', '.widget_categories li', '.widget cite', '.widget_pages li', '.widget_meta li', '.widget_nav_menu li', '.powered-by-wordpress', '.to-the-top', '.singular .entry-header .post-meta', '.singular:not(.overlay-header) .entry-header .post-meta a' ),
			),
			'borders'    => array(
				'border-color'     => array( '.header-footer-group pre', '.header-footer-group fieldset', '.header-footer-group input', '.header-footer-group textarea', '.header-footer-group table', '.header-footer-group table *', '.footer-nav-widgets-wrapper', '#site-footer', '.menu-modal nav *', '.footer-widgets-outer-wrapper', '.footer-top' ),
				'background-color' => array( '.header-footer-group table caption', 'body:not(.overlay-header) .header-inner .toggle-wrapper::before' ),
			),
		),
	);

	/**
	* Filters Chekin 2020 theme elements
	*
	* @since Chekin 2020 1.0
	*
	* @param array Array of elements
	*/
	// return apply_filters( 'chekin2020_get_elements_array', $elements );
}

// recent post
function recent_posts_function($atts, $content = null) {
	
	global $post;
	
	extract(shortcode_atts(array(
		'cat'     => '',
		'limit'     => '5',
		'order'   => 'DESC',
		'orderby' => 'post_date',
	), $atts));
	
	$args = array(
		'cat'            => $cat,
		'posts_per_page' => $limit,
		'order'          => $order,
		'orderby'        => $orderby,
		'suppress_filters' => 0,
	);
	
	$output = '';
	
	$posts = get_posts($args);
	
	foreach($posts as $post) {
		
		setup_postdata($post);
		$content = wp_trim_words(apply_filters( 'the_content', get_the_content() ), 39, '' );;
		
		$permalink = get_the_permalink();
		 
		 $tag_allow=array(
						/*'a'=>array(
							'href'=>array(),
							'title'=>array(),
						),*/
						//'br'=>array(),
						//'span'=>array()
					);
		//$custom_excerpt = get_the_excerpt();
		$custom_excerpt = substr(wp_kses(get_the_content(),$tag_allow), 0, 115).'...'; 
		$cats = '';
		 
		$categories = get_the_category();
		if ( ! empty( $categories ) ) {
			$cats .= '<ul class="post-cats reset-list-style list-inline">';
			foreach($categories as $cat){
				$cats .= '<li><a href="' . esc_url( get_category_link( $cat->term_id ) ) . '">' . esc_html( $cat->name ) . '</a></li>';
			}
			$cats .= '</ul>';
		}
		 
		$shareHTML = '<ul class="blog-share"><li><a href="https://www.facebook.com/share.php?u='.get_the_permalink().'&title='.get_the_title().'" target="_blank"><i class="fab fa-facebook"></i> Facebook</a></li><li><a href="http://pinterest.com/pin/create/bookmarklet/?url='.get_the_permalink().'&'.get_the_title().'" target="_blank"><i class="fab fa-pinterest-p"></i> Pinterest</a></li><li><a href="http://twitter.com/intent/tweet?text='.get_the_title().'+'.get_the_permalink().'" target="_blank"><i class="fab fa-twitter"></i> Twitter</a></li><li><a href="http://www.linkedin.com/shareArticle?mini=true&url='.get_the_permalink().'&title='.get_the_title().'" target="_blank"><i class="fab fa-linkedin-in"></i> LinkedIn</a> </li><li><a href="https://reddit.com/submit?url='.get_the_permalink().'&title='.get_the_title().'" target="_blank"><i class="fab fa-reddit-alien"></i> Reddit</a></li></ul>'; 
		
		$post_thumbnail_url = get_template_directory_uri().'/assets/images/placeholder.jpg';
		if(has_post_thumbnail( )){
			$post_thumbnail_url = get_the_post_thumbnail_url($post, 'large');
		}
		
		$output .= '<div class="wp-block-column post" id="post-id-'.get_the_ID($post).'">'; 
		$output .= '<article class="card">';
		$output .= '<figure class="figure"><a href="'. get_the_permalink() .'"><img src="'.get_template_directory_uri().'/timthumb.php?src='. $post_thumbnail_url.'&amp;w=263&amp;h=165&amp;zc=1&amp;a=t" alt="" ></a></figure>';
		//$output .= '<p class="post-meta "><date class="date">'.get_the_date( 'F j, Y' ).'</date></p>';
		$output .= '<footer class="post-footer"><ul class="reset-list-style list-inline"><li><i class="icon icon-view"></i>'.do_shortcode('[views id="'.get_the_ID($post).'"]').'</li><li class="has-dropdown"><a><i class="icon icon-share"></i>'.__( 'Share', 'chekin2020' ).'</a>'.$shareHTML.'</li></ul></footer>';
		$output .= $cats; 
		$output .= '<h5 class="post-title"><a href="'. get_the_permalink() .'">'. get_the_title() .'</a></h5>';
		$output .= '<p class="has-text-color post-content excerpt">'.$custom_excerpt.'</p>';
		
		$output .= '</article>';
		$output .= '</div>';
		
	}
	
	wp_reset_postdata();
	
	return '<div class="latest-posts wp-block-columns">'. $output .'</div>';
	
} 
add_shortcode('recent_posts', 'recent_posts_function');

// Limited to 'post' search
function searchfilter($query) {
 
    if ($query->is_search && !is_admin() ) {
        $query->set('post_type',array('post'));
    }
 
return $query;
}
 
add_filter('pre_get_posts','searchfilter');


// get_api_help
function get_api_help() { 
 
// Things that you want to do. 
$message = '<aside id="get-api" class="get-api text-center sync_rightsidebar">
	<button type="button" class="get-api-close">X</button>
	<h2>'.__( 'Getting your API key', 'chekin2020' ).'</h2>
	<p class="slide-nav">
		<button class="slick-prev slick-arrow" id="get-api-prev" aria-label="Previous" type="button" aria-disabled="true" style="">Previous</button>
		<span class="counter"><span class="current-slide-count">1</span>/<span class="total-slide-count">3</span></span>
		<button class="slick-next slick-arrow" id="get-api-next" aria-label="Next" type="button" style="" aria-disabled="false">Next</button>
	</p>
	<div id="apihelp" class="apihelp has-slides slides">
		<div class="slide slide-1">
			<p>'.__( 'In a new browser tab, log into <a href="https://app.guesty.com/auth/login" target="_blank"><strong>Guesty</strong></a>', 'chekin2020' ).'</p>
		</div>
		<div class="slide slide-2">
			<p>'.__( 'Go to the <a href="https://app.guesty.com/account/integrations/g/chekin?applicationId=5ca45f693608af06d75cc35f" target="_blank"><strong>CheKin Integration page</strong></a>', 'chekin2020' ).'</p> 
			<p>'.__( 'Or, navigate to <br> <strong>MARKETPLACE &gt; CheKin &gt; CONNECT</strong>', 'chekin2020' ).'</p>
		</div>
		<div class="slide slide-3">
			<p>'.__( 'Next to <strong>API token</strong>, click <strong>Copy to clipboard</strong>', 'chekin2020' ).'</p> 
			<p>'.__( 'Empty API key box? <strong>Click Generate new key</strong>', 'chekin2020' ).'</p>
		</div>
	</div>
</aside><div class="get-api-bg"></div>'; 
 
// Output needs to be return
return $message;
} 
// register shortcode
add_shortcode('get_api_help', 'get_api_help'); 

// get_api_help
function current_pms() { 
 
// Things that you want to do. 
$message = '<h2 class="has-text-align-center current-pms-cont"><span class="d-inline-block sync_texttop">'.__( '<span class="text-sync">Sync</span> <span class="text-create d-none">Creating</span> your <strong id="current-pms">Guesty</strong> account', 'chekin2020' ).' <br> <small class="action"> <a href="javascript:void(0)" class="go-to-pms-selection">'.__( 'Change PMS', 'chekin2020' ).'</a></small></span></h2><h2 class="text-right get_api_key_cont"><small class="action"> <a href="#get-api" class="get-api-focus">'.__( 'Where is my API key?', 'chekin2020' ).'</a></small></h2>'; 
 
// Output needs to be return
return $message;
} 
// register shortcode
add_shortcode('current_pms', 'current_pms');

//customSyncForm
// 
function customSyncForm() { 
 
// Things that you want to do. 
$message = '<input type="hidden" name="roomNumberSelected" value="" >'; 
$message .= '<input type="hidden" name="pmsSelected" value="" >'; 
$message .= '<input type="hidden" name="are_tokens_refetched" value="0" >'; 
$message .= '<input type="hidden" name="bookiplyAccount" value="No" >'; 
$message .= '<input type="hidden" name="queryString" value="" >'; 
$message .= '<input type="hidden" name="yourAddress" class="your_address" value="" >'; 
$message .= '<div class="customSyncForm" id="customSyncForm"><p class="processing text-center"><span class="erf-loader ml-0 mt-0 mb-5"></span> <br> <span class="text-processing">'.__( 'Processing', 'chekin2020' ).'</span></p></div>'; 
 
// Output needs to be return
return $message;
} 
// register shortcode
add_shortcode('customSyncForm', 'customSyncForm');


// Login/Logout
//add_filter( 'wp_nav_menu_items', 'loginout_menu_link', 10, 2 );

function loginout_menu_link( $items, $args ) {
   if ($args->theme_location == 'primary') {
      if (is_user_logged_in()) {
         $items .= '<li class="right logout has-icon has-icon-login"><a href="'. wp_logout_url() .'">'. __("Log Out") .'</a></li>';
        // $items .= '<li class="right logout has-icon has-icon-login"><a href="'. get_permalink(91) .'?action=logout">'. __("Log Out") .'</a></li>';
      } else {
       //  $items .= '<li class="right registration"><a href="'. get_permalink(91) .'">'. __("Registration") .'</a></li>';
         $items .= '<li class="right login has-icon has-icon-login"><a href="'. get_permalink(91) .'">'. __("Login") .'</a></li>';
      }
   }
   return $items;
}

// Hide Adminbar
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
	  show_admin_bar(false);
	}
}

// Get Geo Location
function user_ip(){
	$ip = $_SERVER["REMOTE_ADDR"];
	if ($deep_detect) {
		if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
			$ip = $_SERVER['HTTP_CLIENT_IP'];
	}
	return $ip;
}
add_action('wp_ajax_nopriv_getip', 'getip_function');
add_action('wp_ajax_getip', 'getip_function');
function getip_function(){
	//echo 'hello';
	echo user_ip();
	exit();
}
//custom_rewrite
//https://stackoverflow.com/questions/27162489/url-rewrite-on-a-wordpress-page-query-string
//add_action( 'init', 'init_custom_rewrite' );
function init_custom_rewrite() {

        add_rewrite_rule(        
            '^subscription/([^/]*)/?',        
            'index.php?page_id=867&step=$matches[1]',        
            'top' );
			
		add_rewrite_rule(        
            '([^/]*)/?',        
            'index.php?page_id=243&step=$matches[1]',        
            'top' );
}

//add_filter('query_vars', 'my_query_vars', 10, 1);

function my_query_vars($vars) {
    $vars[] = 'step'; 
    return $vars;
}

// https://wordpress.stackexchange.com/questions/184163/how-to-prevent-the-default-home-rewrite-to-a-static-page
function wpse_184163_disable_canonical_front_page( $redirect ) {
    if ( is_page() && $front_page = get_option( 'page_on_front' ) ) {
        if ( is_page( $front_page ) )
            $redirect = false;
    }

    return $redirect;
}

//add_filter( 'redirect_canonical', 'wpse_184163_disable_canonical_front_page' );

function custom_pms_config(){
$forms = [
'API_END'=>'https://api-ng.chekintest.xyz',
'PMS_TITLE'=>''.__( 'Connect with your PMS', 'chekin2020' ).'',
"Guesty"=>[
	"config"=>["path"=>"pms-integrations/guesty",
				"form_field"=>[
								//"api_key"=>"api_key", //in future there must be 2 fields client secret and client id
								"client_secret"=>"client_secret", 
								"client_id"=>"client_id",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
								]
			],
	/*"form"=>'
		<div class="form-custom form-Guesty "><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'Client ID', 'chekin2020' ).'</label><input type="text" data-testid="input" name="client_id" placeholder="'.__( 'Client ID', 'chekin2020' ).'" class="form-control" value=""></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'Client Secret', 'chekin2020' ).'</label><input type="text" data-testid="input" name="client_secret" placeholder="'.__( 'Client Secret', 'chekin2020' ).'" class="form-control" value=""></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">'.__( 'Connect with Guesty', 'chekin2020' ).'</button></div></div></div> 
	',*/
	"form"=>'
		<div class="form-custom form-Guesty "><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'Integration token', 'chekin2020' ).'</label><input type="text" data-testid="input" name="integration_token" placeholder="'.__( 'Integration token', 'chekin2020' ).'" class="form-control" value=""></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">'.__( 'Connect with Guesty', 'chekin2020' ).'</button></div></div></div> 
	',
	
	"help" => '
		<div class="slide slide-1">
			<p>'.__( 'In a new browser tab, log into <a href="https://app.guesty.com/auth/login" target="_blank"><strong>Guesty</strong></a>', 'chekin2020' ).'</p>
		</div>
		<div class="slide slide-2">
			<p>'.__( 'Go to the <a href="https://app.guesty.com/account/integrations/g/chekin?applicationId=5ca45f693608af06d75cc35f" target="_blank"><strong>CheKin Integration page</strong></a>', 'chekin2020' ).'</p> 
			<p>'.__( 'Or, navigate to <br> <strong>MARKETPLACE &gt; CheKin &gt; CONNECT</strong>', 'chekin2020' ).'</p>
		</div>
		<div class="slide slide-3">
			<p>'.__( 'Next to <strong>API token</strong>, click <strong>Copy to clipboard</strong>', 'chekin2020' ).'</p> 
			<p>'.__( 'Empty API key box? <strong>Click Generate new key</strong>', 'chekin2020' ).'</p>
		</div>
	',
	"logo" => 'https://onboarding.chekin.com/wp-content/uploads/2023/10/Guesty_2.0_Logo_Dark@2x.svg',
	"contentTitle" => __( 'How to connect Guesty with Chekin?', 'chekin2020'),
	"contentVideo" => '<iframe width="560" height="315" data-src="https://www.youtube.com/embed/Z3eAVpF5xkY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
	"content" => '<p>'.__( 'Guesty simplifies managing hospitality businesses with its all-in-one platform. Guesty property management software optimizes and automates operations to save time, increase revenue, and enhance efficiency. With a technology-driven approach and extensive industry expertise, Guesty app empowers hospitality businesses to streamline operations and achieve growth.', 'chekin2020' ).'</p><p><a href="'.__( 'https://www.guesty.com', 'chekin2020').'" target="_blank">'.__( 'https://www.guesty.com', 'chekin2020').'</a></p>',
	'pmsName' => 'Guesty',
	'benefitsTitle' => __( 'Benefits of integrating Chekin and Guesty:', 'chekin2020' ),
	'benefits' => array( 
		__( 'Flexible solutions for every business', 'chekin2020' ),
		__('Absolute precision in every financial decision', 'chekin2020' ),
		__('Unlock your listings’true potential', 'chekin2020' ),
		__('Amplify your revenue prospects', 'chekin2020' ),
		__('Boost operational productivity', 'chekin2020' ),
		__('Understand your guests and leads', 'chekin2020' ),
		__('Gain visibility and credibility', 'chekin2020' ),
		__('Create custom experiences', 'chekin2020' ),
		__('Perfect your channel performance', 'chekin2020' ),
		__('Sync across channels', 'chekin2020' ) 
	), 	
], 

"365Villas"=>[
	"config"=>["path"=>"villas-365",
				"form_field"=>[
								"key_token"=>"key_token",
								"pass_token"=>"pass_token",
								"owner_token"=>"owner_token",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"phone"=>"field-c2xENTMAvcqpurK-intl",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-365Villas"><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( '365villas API Key', 'chekin2020' ).'</label><input type="text" data-testid="input" name="key_token" placeholder="'.__( 'Enter API Key', 'chekin2020' ).'" class="form-control" value=""></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( '365villas API Password', 'chekin2020' ).' </label><input type="text" data-testid="input" name="pass_token" placeholder="'.__( 'Enter API Password', 'chekin2020' ).'" class="form-control" value=""></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( '365villas API Owner Token', 'chekin2020' ).'</label><input type="text" data-testid="input" name="owner_token" placeholder="'.__( 'Enter API Owner Token', 'chekin2020' ).'" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">'.__( 'Connect with 365Villas', 'chekin2020' ).'</button></div></div></div>
	',
	"help" => '
		<div class="slide slide-1">
			<p>'.__( 'In a new browser tab, log into <a href="https://secure.365villas.com/home/login" target="_blank">365Villas</a>', 'chekin2020' ).'</p>
		</div>
		<div class="slide slide-2">
			<p>'.__( 'This can be found at Your account > <a href="https://secure.365villas.com/config/account/api" target="_blank">API Access</a>', 'chekin2020' ).'</p>
		</div>
	',
	"helpInitiator" => ''.__( 'Where are my API keys?', 'chekin2020' ).'',
	"logo" => 'https://chekin.com/onboarding/wp-content/uploads/2022/05/365villas-logo.svg',
	"contentTitle" =>__( 'How to connect 365villas with Chekin?', 'chekin2020' ),
	"content" => '<p>'.__( '365villas is the Leading All-In-One Vacation Rental Software. Built for Any Device.  Also, the 365Villas Gen-4 – is the latest generation of our platform that includes the industry’s most powerful and comprehensive mobile solution', 'chekin2020' ).'</p><p><a href="https://www.365villas.com" target="_blank">https://www.365villas.com</a></p>',
], 

"365Villas_2"=>[
	"config"=>["path"=>"pms-integrations/villas365",
				"form_field"=>[
								"key_token"=>"key_token",
								"pass_token"=>"pass_token",
								"owner_token"=>"owner_token",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"phone"=>"field-c2xENTMAvcqpurK-intl",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-365Villas"><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( '365villas API Key', 'chekin2020' ).'</label><input type="text" data-testid="input" name="key_token" placeholder="'.__( 'Enter API Key', 'chekin2020' ).'" class="form-control" value=""></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( '365villas API Password', 'chekin2020' ).' </label><input type="text" data-testid="input" name="pass_token" placeholder="'.__( 'Enter API Password', 'chekin2020' ).'" class="form-control" value=""></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( '365villas API Owner Token', 'chekin2020' ).'</label><input type="text" data-testid="input" name="owner_token" placeholder="'.__( 'Enter API Owner Token', 'chekin2020' ).'" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">'.__( 'Connect with 365Villas', 'chekin2020' ).'</button></div></div></div>
	',
	"help" => '
		<div class="slide slide-1">
			<p>'.__( 'In a new browser tab, log into <a href="https://secure.365villas.com/home/login" target="_blank">365Villas</a>', 'chekin2020' ).'</p>
		</div>
		<div class="slide slide-2">
			<p>'.__( 'This can be found at Your account > <a href="https://secure.365villas.com/config/account/api" target="_blank">API Access</a>', 'chekin2020' ).'</p>
		</div>
	',
	"helpInitiator" => ''.__( 'Where are my API keys?', 'chekin2020' ).'',
	"logo" => 'https://chekin.com/onboarding/wp-content/uploads/2022/05/365villas-logo.svg',
	"contentTitle" =>__( 'How to connect 365villas with Chekin?', 'chekin2020' ),
	"content" => '<p>'.__( '365villas is the Leading All-In-One Vacation Rental Software. Built for Any Device.  Also, the 365Villas Gen-4 – is the latest generation of our platform that includes the industry’s most powerful and comprehensive mobile solution', 'chekin2020' ).'</p><p><a href="https://www.365villas.com" target="_blank">https://www.365villas.com</a></p>',
], 


"Channex"=>[
	"config"=>["path"=>"channex",
				"form_field"=>[
								"channex_email"=>"channex_email",
								"channex_password"=>"channex_password",
								"core_email"=>"text-gE8dLd",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"phone"=>"field-c2xENTMAvcqpurK-intl",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-channex"><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'Enter your Channex email', 'chekin2020' ).'</label><input type="text" data-testid="input" name="channex_email" placeholder="'.__( 'Email', 'chekin2020' ).'" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'Enter your Channex password', 'chekin2020' ).'</label><input type="password" data-testid="input" name="channex_password" placeholder="'.__( 'Password', 'chekin2020' ).'" class="form-control" value=""></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">'.__( 'Connect with Channex', 'chekin2020' ).'</button></div></div></div> 
	',
	"logo" => 'https://chekin.com/onboarding/wp-content/uploads/2022/05/channex_Logo.svg',
	"contentTitle" =>__( 'How to connect Channex with Chekin?', 'chekin2020' ),
	"content" => '<p>'.__( 'Channex helps travel technology companies like Property Management Systems (PMS) and Booking Engines to connect to online travel agents like Booking, Airbnb and Expedia.', 'chekin2020' ).'</p><p><a href="https://channex.io" target="_blank">https://channex.io</a></p>',

],

"Eviivo"=>[
	"config"=>["path"=>"eviivo",
				"form_field"=>[
								"client_secret"=>"client_secret",
								"client_id"=>"client_id",
								"shortnames"=>"shortnames",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"phone"=>"field-c2xENTMAvcqpurK-intl",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-eviivo"><div class="form-fields"><div class="sc-kNZoFW drYvvf"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'Client secret', 'chekin2020' ).'</label><input type="text" data-testid="input" name="client_secret" placeholder="'.__( 'Enter Client secret', 'chekin2020' ).'" class="form-control" value=""></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'Client ID', 'chekin2020' ).'</label><input type="text" data-testid="input" name="client_id" placeholder="'.__( 'Enter Client ID', 'chekin2020' ).'" class="form-control" value=""></div></div><div class="multi-field-wrapper"> <div class="multi-fields"><div class="form-group shortnames multi-field"><div class="sc-qXhiz cvmVKB field"><label class="sc-pItiW PQBAt">'.__( 'Short name', 'chekin2020' ).'</label><input type="text" data-testid="input" name="shortnames[]" placeholder="'.__( 'Enter Short name', 'chekin2020' ).'" class="form-control" value=""></div><a href="javascript:void(0)" class="remove-field">X</a></div></div><p class=" mt-0 mb-0"><a class="add-field" href="javascript:void(0)">'.__( 'Add field', 'chekin2020' ).'</a></p></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">'.__( 'Connect with eviivo', 'chekin2020' ).'</button></div></div></div> 
	',
	"help" => '
		<div class="slide slide-1">
			<p>'.__( 'Login into <a href="https://on.eviivo.com/" target="_blank">eviivo suite</a>', 'chekin2020' ).'</p>
		</div>
		<div class="slide slide-2">
			<p>'.__( 'Click on "Help"', 'chekin2020' ).'</p>
		</div>
		<div class="slide slide-3">
			<p>'.__( 'On section "Request Help", select \'Integrating eviivo suite with another software API\'', 'chekin2020' ).'</p>
		</div> 
		<div class="slide slide-4">
			<p>'.__( 'Write "Chekin" on the comments section', 'chekin2020' ).'</p>
		</div> 
		<div class="slide slide-5">
			<p>'.__( 'Eviivo will send you your connection credentials', 'chekin2020' ).'</p>
		</div>
	',
	"logo" => 'https://chekin.com/onboarding/wp-content/uploads/2022/05/eviivo-logo.svg',
	"contentTitle" =>__( 'How to connect Eviivo with Chekin?', 'chekin2020' ),
	"contentVideo" => '<iframe width="560" height="315" data-src="https://www.youtube.com/embed/C7ikaOb2LXc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
	"content" => '<p>'.__( 'Eviivo is an inspiring hospitality software Helping hotels, vacation rentals, and B&Bs, manage guests, bookings and travel agencies.', 'chekin2020' ).'</p><p><a href="https://eviivo.com" target="_blank">https://eviivo.com</a></p>',
 
],
"Eviivo_2"=>[
	"config"=>["path"=>"pms-integrations/eviivo",
				"form_field"=>[
								"client_secret"=>"client_secret",
								"client_id"=>"client_id",
								//"shortnames"=>"shortnames",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"phone"=>"field-c2xENTMAvcqpurK-intl",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-eviivo"><div class="form-fields"><div class="sc-kNZoFW drYvvf"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'Client secret', 'chekin2020' ).'</label><input type="text" data-testid="input" name="client_secret" placeholder="'.__( 'Enter Client secret', 'chekin2020' ).'" class="form-control" value=""></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'Client ID', 'chekin2020' ).'</label><input type="text" data-testid="input" name="client_id" placeholder="'.__( 'Enter Client ID', 'chekin2020' ).'" class="form-control" value=""></div></div><div class="multi-field-wrapper d-none"> <div class="multi-fields"><div class="form-group shortnames multi-field "><div class="sc-qXhiz cvmVKB field"><label class="sc-pItiW PQBAt">'.__( 'Short name', 'chekin2020' ).'</label><input type="text" data-testid="input" name="shortnames[]" placeholder="'.__( 'Enter Short name', 'chekin2020' ).'" class="form-control" value=""></div><a href="javascript:void(0)" class="remove-field">X</a></div></div><p class=" mt-0 mb-0"><a class="add-field" href="javascript:void(0)">'.__( 'Add field', 'chekin2020' ).'</a></p></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">'.__( 'Connect with eviivo', 'chekin2020' ).'</button></div></div></div> 
	',
	"help" => '
		<div class="slide slide-1">
			<p>'.__( 'Login into <a href="https://on.eviivo.com/" target="_blank">eviivo suite</a>', 'chekin2020' ).'</p>
		</div>
		<div class="slide slide-2">
			<p>'.__( 'Click on "Help"', 'chekin2020' ).'</p>
		</div>
		<div class="slide slide-3">
			<p>'.__( 'On section "Request Help", select \'Integrating eviivo suite with another software API\'', 'chekin2020' ).'</p>
		</div> 
		<div class="slide slide-4">
			<p>'.__( 'Write "Chekin" on the comments section', 'chekin2020' ).'</p>
		</div> 
		<div class="slide slide-5">
			<p>'.__( 'Eviivo will send you your connection credentials', 'chekin2020' ).'</p>
		</div>
	',
	"logo" => 'https://chekin.com/onboarding/wp-content/uploads/2022/05/eviivo-logo.svg',
	"contentTitle" =>__( 'How to connect Eviivo with Chekin?', 'chekin2020' ),
	"contentVideo" => '<iframe width="560" height="315" data-src="https://www.youtube.com/embed/C7ikaOb2LXc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
	"content" => '<p>'.__( 'Eviivo is an inspiring hospitality software Helping hotels, vacation rentals, and B&Bs, manage guests, bookings and travel agencies.', 'chekin2020' ).'</p><p><a href="https://eviivo.com" target="_blank">https://eviivo.com</a></p>',
 
],
"Ezee"=>[
	"config"=>["path"=>"ezeetechnosys",
				"form_field"=>[
								"external_auth_key"=>"external_auth_key",
								"external_hotel_code"=>"external_hotel_code",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"phone"=>"field-c2xENTMAvcqpurK-intl",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-ezee"><div class="form-fields"><div class="sc-kNZoFW drYvvf"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'External Auth Key', 'chekin2020' ).'</label><input type="text" data-testid="input" name="external_auth_key" placeholder="'.__( 'Enter Auth Key', 'chekin2020' ).'" class="form-control" value=""></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'External Hotel Code', 'chekin2020' ).'</label><input type="text" data-testid="input" name="external_hotel_code" placeholder="'.__( 'Enter Code', 'chekin2020' ).'" class="form-control" value=""></div></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">'.__( 'Connect with Ezee', 'chekin2020' ).'</button></div></div></div> 
	',
	"help" => '
		<div class="slide slide-1">
			<p>'.__( 'Reach out eZee support Team', 'chekin2020' ).'</p>
		</div>
		<div class="slide slide-2">
			<p>'.__( 'Send this information: <br> 
			"Integration with ChekIn via Open API <br> 
			eZee Hotel Code : (put here your code)<br> <br><span class="d-inline-block text-left">
			- API List<br> 
			- Retrieve Hotel Information<br> 
			- Booking Received Notification<br> 
			- Retrieve all Bookings<br> 
			- Retrieve a Booking<br> 
			- Retrieve Room Information" </span>
			', 'chekin2020' ).'</p>
		</div>
		<div class="slide slide-3">
			<p>'.__( 'Fill the credentials given by eviivo in this page', 'chekin2020' ).'</p>
		</div> 

	',
	"logo" => 'https://chekin.com/onboarding/wp-content/uploads/2022/07/ezeeabsolute.png',
	"contentTitle" =>__( 'How to connect eZee with Chekin? ', 'chekin2020' ),
	"contentVideo" => '',
	"content" => '<p>'.__( 'eZee is one of the very few companies to offer a complete suite of integrated hospitality technology offering products like hotel management software, booking engine, inventory distribution system, hotel and restaurant website builder, restaurant management system, dynamic pricing solution and reputation management software.', 'chekin2020' ).'</p><p><a href="https://www.ezeeabsolute.com" target="_blank">https://www.ezeeabsolute.com</a></p>',

],
"Fantasticstay"=>[
	"config"=>["path"=>"fantasticstay",
				"form_field"=>[
								"api_key"=>"api_key",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-fantasticstay"><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'API token', 'chekin2020' ).'</label><input type="text" data-testid="input" name="api_key" placeholder="'.__( 'Enter your API token', 'chekin2020' ).'" class="form-control" value=""></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">'.__( 'Connect with FantasticStay', 'chekin2020' ).'</button></div></div></div> 
	',
	"help" => '
		<div class="slide slide-1">
			<p>'.__( 'Log in into your FantasticStay account', 'chekin2020' ).'</p>
		</div>
		<div class="slide slide-2">
			<p>'.__( 'Go to "Settings" section', 'chekin2020' ).'</p>
		</div> 
		<div class="slide slide-3">
			<p>'.__( 'Find you API key at the bottom of the screen, and copy it', 'chekin2020' ).'</p>
		</div> 
		<div class="slide slide-4">
			<p>'.__( 'Paste the API Key here', 'chekin2020' ).'</p>
		</div> 

	'
],
"Hostaway"=>[
	"config"=>["path"=>"hostaway",
				"form_field"=>[
								"external_client_secret"=>"external_client_secret",
								"external_client_id"=>"external_client_id",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"phone"=>"field-c2xENTMAvcqpurK-intl",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-hostaway"><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'Hostaway API secret key', 'chekin2020' ).'</label><input type="text" data-testid="input" name="external_client_secret" placeholder="'.__( 'Enter API key', 'chekin2020' ).'" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'Hostaway Account ID', 'chekin2020' ).'</label><input type="text" data-testid="input" name="external_client_id" placeholder="'.__( 'Enter Account ID', 'chekin2020' ).'" class="form-control" value=""></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">'.__( 'Connect with Hostaway', 'chekin2020' ).'</button></div></div></div> 
	',
	"help" => '
		<div class="slide slide-1">
			<p>'.__( 'Log into your <a target="_blank" href="https://dashboard.hostaway.com/login" >Hostaway account.</a>', 'chekin2020' ).'</p>
		</div>
		<div class="slide slide-2">
			<p>'.__( 'Select the \'Hostaway API\' tab under \'Setting\' from the menu on the left.', 'chekin2020' ).'</p>
		</div>
		<div class="slide slide-2">
			<p>'.__( 'If you don\'t remember your API secret key, generate a new one by pressing the button. Copy and paste your \'API secret key\' and \'Account ID\' into the corresponding fields on this page.', 'chekin2020' ).'</p>
		</div>
	',
	"logo" => 'https://chekin.com/onboarding/wp-content/uploads/2022/05/hostay.svg',
	"contentTitle" =>__( 'How to connect Hostaway with Chekin?', 'chekin2020' ),
	"contentVideo" => '<iframe width="560" height="315" data-src="https://www.youtube.com/embed/lsqJOm-TsIg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
	"content" => '<p>'.__( 'Hostaway Vacation Rental Software Helps You Grow Your Vacation Rental Property Management Business By Automating And Streamlining Every Aspect Of Your Business across Airbnb, Vrbo, Booking.com, Expedia, and others.', 'chekin2020' ).'</p><p><a href="https://www.hostaway.com" target="_blank">https://www.hostaway.com</a></p>',
],
"Hostaway_2"=>[
    "config"=>["path"=>"pms-integrations/hostaway",
                "form_field"=>[
                                "client_secret"=>"external_client_secret",
                                "client_id"=>"external_client_id",
                                "email"=> "text-gE8dLd",
                                "password"=>"text-1hJwzr",
                                "phone"=>"field-c2xENTMAvcqpurK-intl",
                                "estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
                            ]
            ],
    "form"=>'
        <div class="form-custom form-hostaway"><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'Hostaway API secret key', 'chekin2020' ).'</label><input type="text" data-testid="input" name="external_client_secret" placeholder="'.__( 'Enter API key', 'chekin2020' ).'" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'Hostaway Account ID', 'chekin2020' ).'</label><input type="text" data-testid="input" name="external_client_id" placeholder="'.__( 'Enter Account ID', 'chekin2020' ).'" class="form-control" value=""></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">'.__( 'Connect with Hostaway', 'chekin2020' ).'</button></div></div></div>
    ',
    "help" => '
        <div class="slide slide-1">
            <p>'.__( 'Log into your <a target="_blank" href="https://dashboard.hostaway.com/login" >Hostaway account.</a>', 'chekin2020' ).'</p>
        </div>
        <div class="slide slide-2">
            <p>'.__( 'Select the \'Hostaway API\' tab under \'Setting\' from the menu on the left.', 'chekin2020' ).'</p>
        </div>
        <div class="slide slide-2">
            <p>'.__( 'If you don\'t remember your API secret key, generate a new one by pressing the button. Copy and paste your \'API secret key\' and \'Account ID\' into the corresponding fields on this page.', 'chekin2020' ).'</p>
        </div>
    ',
    "logo" => 'https://chekin.com/onboarding/wp-content/uploads/2022/05/hostay.svg',
    "contentTitle" =>__( 'How to connect Hostaway with Chekin?', 'chekin2020' ),
    "contentVideo" => '<iframe width="560" height="315" data-src="https://www.youtube.com/embed/lsqJOm-TsIg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
    "content" => '<p>'.__( 'Hostaway is the world\'s leading short term rental property management software, perfect for those with 2 to 1,000+ listings. They make it easy for you to get more out of your business while spending less time with tedious manual tasks.', 'chekin2020' ).'</p><p><a href="'.__( 'https://www.hostaway.com', 'chekin2020' ).'" target="_blank">'.__( 'https://www.hostaway.com', 'chekin2020' ).'</a></p>',
	'pmsName' => 'Hostaway',
	'benefitsTitle' => __( 'Benefits of integrating Chekin and Hostaway:', 'chekin2020' ),
	'benefits' => array( 
		__( 'Channel Manager Software', 'chekin2020' ),
		__( 'Property Management System', 'chekin2020' ),
		__( 'Messaging Services', 'chekin2020' ),
		__( 'Mobile Apps', 'chekin2020' ),
		__( 'User Management', 'chekin2020' ),
		__( 'Booking Engine', 'chekin2020' ),
		__( 'Revenue Management', 'chekin2020' ),
		__( 'Dynamic Pricing', 'chekin2020' ),
		__( 'API', 'chekin2020' ),
	), 

],
"Hostify"=>[
	"config"=>["path"=>"hostify",
				"form_field"=>[
								"api_key"=>"api_key",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"phone"=>"field-c2xENTMAvcqpurK-intl",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-hostify"><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'API token', 'chekin2020' ).'</label><input type="text" data-testid="input" name="api_key" placeholder="'.__( 'Enter your API token', 'chekin2020' ).'" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">'.__( 'Connect with Hostify', 'chekin2020' ).'</button></div></div></div>
	',
	"help" => '
		<div class="slide slide-1">
			<p>'.__( 'Log in into your <a href="https://app.hostify.com/" target="_blank">Hostify</a> account', 'chekin2020' ).'</p>
		</div>
		<div class="slide slide-2">
			<p>'.__( 'Go to "Settings" section, and find your API Key', 'chekin2020' ).'</p>
		</div> 
		<div class="slide slide-3">
			<p>'.__( 'Copy it, and paste the API Key here', 'chekin2020' ).'</p>
		</div> 
	',
	"logo" => 'https://chekin.com/onboarding/wp-content/uploads/2022/05/hostify-logo.svg',
	"contentTitle" =>__( 'How to connect Hostify with Chekin?', 'chekin2020' ),
	"contentVideo" => '<iframe width="560" height="315" data-src="https://www.youtube.com/embed/lkNjqaFnJtA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
	"content" => '<p>'.__( 'Hostify is an All in one solution for managing vacation rental businesses - Manage hundreds of properties and handle thousands of reservations by utilizing powerful tools and features. ', 'chekin2020' ).'</p><p><a href="https://hostify.com" target="_blank">https://hostify.com</a></p>',
	
],

"Hostify_2"=>[
	"config"=>["path"=>"pms-integrations/hostify",
				"form_field"=>[
								"api_key"=>"api_key",
								"core_email"=> "text-gE8dLd",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"phone"=>"field-c2xENTMAvcqpurK-intl",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-hostify"><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'API token', 'chekin2020' ).'</label><input type="text" data-testid="input" name="api_key" placeholder="'.__( 'Enter your API token', 'chekin2020' ).'" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">'.__( 'Connect with Hostify', 'chekin2020' ).'</button></div></div></div>
	',
	"help" => '
		<div class="slide slide-1">
			<p>'.__( 'Log in into your <a href="https://app.hostify.com/" target="_blank">Hostify</a> account', 'chekin2020' ).'</p>
		</div>
		<div class="slide slide-2">
			<p>'.__( 'Go to "Settings" section, and find your API Key', 'chekin2020' ).'</p>
		</div> 
		<div class="slide slide-3">
			<p>'.__( 'Copy it, and paste the API Key here', 'chekin2020' ).'</p>
		</div> 
	',
	"logo" => 'https://chekin.com/onboarding/wp-content/uploads/2022/05/hostify-logo.svg',
	"contentTitle" =>__( 'How to connect Hostify with Chekin?', 'chekin2020' ),
	"contentVideo" => '<iframe width="560" height="315" data-src="https://www.youtube.com/embed/lkNjqaFnJtA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
	"content" => '<p>'.__( 'Elevate your property management with Hostify, the ultimate all-in-one PMS (Property Management Software) & Channel Manager solution! Designed to streamline operations, automate processes, and integrate seamlessly with Airbnb Management, Booking.com, Vrbo, Expedia, TripAdvisor, and more. Revolutionize your management efficiency from inquiry to check-out with Hostify\'s advanced tools.', 'chekin2020' ).'</p><p><a href="'.__( 'https://hostify.com', 'chekin2020' ).'" target="_blank">'.__( 'https://hostify.com', 'chekin2020' ).'</a></p>',
	'pmsName' => 'Hostify',
	'benefitsTitle' => __( 'Benefits of integrating Chekin and Hostify:', 'chekin2020' ),
	'benefits' => array( 
		__( 'Channel Manager', 'chekin2020' ),
		__( 'Unified Inbox', 'chekin2020' ),
		__( 'Booking Engine', 'chekin2020' ),
		__( 'Automations', 'chekin2020' ),
		__( 'Multi-Calendar', 'chekin2020' ),
		__( 'Task Management', 'chekin2020' ),
		__( 'WordPress Integration', 'chekin2020' ),
		__( 'Analytics', 'chekin2020' ),
		__( 'Owner Dashboard', 'chekin2020' ),
		__( 'Invoicing', 'chekin2020' ),
		__( '24/7 premium support', 'chekin2020' ),
	), 
	
],

"Hoteliga"=>[
	"config"=>["path"=>"hoteliga",
				"form_field"=>[
								"external_username"=>"external_username",
								"external_password"=>"external_password",
								"external_domain"=>"external_domain",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"phone"=>"field-c2xENTMAvcqpurK-intl",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-hoteliga"><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'External username', 'chekin2020' ).'</label><input type="text" data-testid="input" name="external_username" placeholder="'.__( 'Enter username', 'chekin2020' ).'" class="form-control" value=""></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'External password', 'chekin2020' ).'</label><input type="text" data-testid="input" name="external_password" placeholder="'.__( 'Enter password', 'chekin2020' ).'" class="form-control" value=""></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'External domain', 'chekin2020' ).'</label><input type="text" data-testid="input" name="external_domain" placeholder="'.__( 'Enter domain', 'chekin2020' ).'" class="form-control" value=""></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">'.__( 'Connect with Hoteliga', 'chekin2020' ).'</button></div></div></div>
	',
	"logo" => 'https://chekin.com/onboarding/wp-content/uploads/2022/05/hoteliga_logo.png',
	"contentTitle" =>__( 'How to connect Hoteliga with Chekin?', 'chekin2020' ),
	"contentVideo" => '<iframe width="560" height="315" data-src="https://www.youtube.com/embed/vecg8jggrqk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
	"content" => '<p>'.__( 'Hoteliga is a reliable and affordable management platform for hotels and vacation apartments - The All-In-One Cloud Solution 
', 'chekin2020' ).'</p><p><a href="https://www.hoteliga.com" target="_blank">https://www.hoteliga.com</a></p>',
	
],

"Lodgify"=>[
	"config"=>["path"=>"lodgify",
				"form_field"=>[
								"api_key"=>"api_key",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"phone"=>"field-c2xENTMAvcqpurK-intl",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-lodgify"><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'API token', 'chekin2020' ).'</label><input type="text" data-testid="input" name="api_key" placeholder="'.__( 'Enter your API token', 'chekin2020' ).'" class="form-control" value=""></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">'.__( 'Connect with Lodgify', 'chekin2020' ).'</button></div></div></div>
	',
	"help" => '
		<div class="slide slide-1">
			<p>'.__( 'Log in into your Lodgify account', 'chekin2020' ).'</p>
		</div>
		<div class="slide slide-2">
			<p>'.__( 'Go to "Settings" section', 'chekin2020' ).'</p>
		</div> 
		<div class="slide slide-3">
			<p>'.__( 'Select "Public API" and copy the API Key', 'chekin2020' ).'</p>
		</div> 
		<div class="slide slide-4">
			<p>'.__( 'Paste the API Key here', 'chekin2020' ).'</p>
		</div> 
	',
	"logo" => 'https://chekin.com/onboarding/wp-content/uploads/2022/05/logify.svg',
	"contentTitle" =>__( 'How to connect Lodgify with Chekin?', 'chekin2020' ),
	"contentVideo" => '<iframe width="560" height="315" data-src="https://www.youtube.com/embed/4_pz38vRROM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
	"content" => '<p>'.__( 'Lodgify is a tech start-up focused on holiday homes rentals software. It enables vacation rentals owners to manage and market their properties independently online. Lodgify provides easy-to-build websites with booking and reservation systems, synchronization options, and payment collection capabilities.', 'chekin2020' ).'</p><p><a href="'.__( 'https://www.lodgify.com/', 'chekin2020' ).'" target="_blank">'.__( 'https://www.lodgify.com/', 'chekin2020' ).'</a></p>',
	'pmsName' => 'Lodgify',
	'benefitsTitle' => __( 'Benefits of integrating Chekin and Lodgify:', 'chekin2020' ),
	'benefits' => array( 
		__( 'Avoid double bookings with our direct connections', 'chekin2020' ),
		__( 'The manual work is over', 'chekin2020' ),
		__( 'Start collecting bookings instantly with our booking widget', 'chekin2020' ),
		__( 'Software that grows with you', 'chekin2020' ),
		__( 'Analytics & remarketing tools', 'chekin2020' ),
		__( 'Future-proof property management website templates', 'chekin2020' ),
		__( 'Streamline your operations with our all-in-one PMS system', 'chekin2020' ),
	), 
	
],

"Mews"=>[
	"config"=>["path"=>"mews",
				"form_field"=>[
								"access_token"=>"access_token",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-mews"><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'Access token', 'chekin2020' ).'</label><input type="text" data-testid="input" name="access_token" placeholder="'.__( 'Enter your Access token', 'chekin2020' ).'" class="form-control" value=""></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">'.__( 'Connect with Mews', 'chekin2020' ).'</button></div></div></div>
	',
	"help" => '
		<div class="slide slide-1">
			<p>'.__( 'Log in into your Mews account', 'chekin2020' ).'</p>
		</div>
		<div class="slide slide-2">
			<p>'.__( 'Go to Main Menu > Marketplace', 'chekin2020' ).'</p>
		</div> 
		<div class="slide slide-3">
			<p>'.__( 'Click on "My Subscriptions"', 'chekin2020' ).'</p>
		</div> 
		<div class="slide slide-4">
			<p>'.__( 'Find Chekin integration and click on "Settings"', 'chekin2020' ).'</p>
		</div> 
		<div class="slide slide-5">
			<p>'.__( 'Click on the key icon in the upper right corner', 'chekin2020' ).'</p>
		</div>
		<div class="slide slide-6">
			<p>'.__( 'Paste the API token here', 'chekin2020' ).'</p>
		</div>
	',
	"logo" => 'https://chekin.com/onboarding/wp-content/uploads/2022/05/mews-logo.svg',
	"contentTitle" =>__( 'How to connect Mews with Chekin?', 'chekin2020' ),
	"contentVideo" => '<iframe width="560" height="315" data-src="https://www.youtube.com/embed/VlTgepMeJKM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
	"content" => '<p>'.__( 'Mews is a property management system designed to simplify and automate all operations for modern hoteliers and their guests. From the booking engine to check-out, from front desk to revenue management, every process is easier, faster and more connected. ', 'chekin2020' ).'</p><p><a href="https://www.mews.com/en" target="_blank">https://www.mews.com/en</a></p>',
	
],

"Rentals United"=>[
	"config"=>["path"=>"rentals-united",
				"form_field"=>[
								"email"=>"email", // Both are email, commented one. 
								//"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"phone"=>"field-c2xENTMAvcqpurK-intl",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-rentals-united"><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'Rentals United email', 'chekin2020' ).'</label><input type="text" data-testid="input" name="email" placeholder="'.__( 'Enter email', 'chekin2020' ).'" class="form-control" value=""></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">'.__( 'Connect with Rentals United', 'chekin2020' ).'</button></div></div></div>
	',
	"help" => '
		<div class="slide slide-1">
			<p>'.__( 'Log in into your Rentals United account', 'chekin2020' ).'</p>
		</div>
		<div class="slide slide-2">
			<p>'.__( 'Go to SERVICES > FIND SERVICES > OPERATIONAL and click on Chekin', 'chekin2020' ).'</p>
		</div> 
		<div class="slide slide-3">
			<p>'.__( 'Click on "Get Connected"', 'chekin2020' ).'</p>
		</div> 
		<div class="slide slide-4">
			<p>'.__( 'Return to this page and fill your Rentals United user', 'chekin2020' ).'</p>
		</div> 
	',
	"logo" => 'https://chekin.com/onboarding/wp-content/uploads/2022/05/rentalsunited-logo.svg',
	"contentTitle" =>__( 'How to connect Rentals United with Chekin?', 'chekin2020' ),
	"contentVideo" => '<iframe width="560" height="315" data-src="https://www.youtube.com/embed/sm62ZFHpSL4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
	"content" => '<p>'.__( 'Rentals United is the world\'s number one vacation rental channel manager. We take care of all your distribution needs and help you make data-driven decisions to increase your conversions on sales channels. ', 'chekin2020' ).'</p><p><a href="https://rentalsunited.com" target="_blank">https://rentalsunited.com</a></p>',
	
],
"Rentals United_2"=>[
	"config"=>["path"=>"pms-integrations/rentals-united",
				"form_field"=>[
								"pms_email"=>"pms_email", // Both are email, commented one. 
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"phone"=>"field-c2xENTMAvcqpurK-intl",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-rentals-united"><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'Rentals United email', 'chekin2020' ).'</label><input type="text" data-testid="input" name="pms_email" placeholder="'.__( 'Enter email', 'chekin2020' ).'" class="form-control" value=""></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">'.__( 'Connect with Rentals United', 'chekin2020' ).'</button></div></div></div>
	',
	"help" => '
		<div class="slide slide-1">
			<p>'.__( 'Log in into your Rentals United account', 'chekin2020' ).'</p>
		</div>
		<div class="slide slide-2">
			<p>'.__( 'Go to SERVICES > FIND SERVICES > OPERATIONAL and click on Chekin', 'chekin2020' ).'</p>
		</div> 
		<div class="slide slide-3">
			<p>'.__( 'Click on "Get Connected"', 'chekin2020' ).'</p>
		</div> 
		<div class="slide slide-4">
			<p>'.__( 'Return to this page and fill your Rentals United user', 'chekin2020' ).'</p>
		</div> 
	',
	"logo" => 'https://chekin.com/onboarding/wp-content/uploads/2022/05/rentalsunited-logo.svg',
	"contentTitle" =>__( 'How to connect Rentals United with Chekin?', 'chekin2020' ),
	"contentVideo" => '<iframe width="560" height="315" data-src="https://www.youtube.com/embed/sm62ZFHpSL4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
	"content" => '<p>'.__( 'Rentals United is the world\'s number one vacation rental channel manager. We take care of all your distribution needs and help you make data-driven decisions to increase your conversions on sales channels. ', 'chekin2020' ).'</p><p><a href="https://rentalsunited.com" target="_blank">https://rentalsunited.com</a></p>',
	
],

"Rentlio"=>[
	"config"=>["path"=>"rentlio",
				"form_field"=>[
								"api_token"=>"api_token",  
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"phone"=>"field-c2xENTMAvcqpurK-intl",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-rentlio"><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'API token', 'chekin2020' ).'</label><input type="text" data-testid="input" name="api_token" placeholder="'.__( 'Enter your API token', 'chekin2020' ).'" class="form-control" value=""></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">'.__( 'Connect with Rentlio', 'chekin2020' ).'</button></div></div></div>
	',
	"help" => '
		<div class="slide slide-1">
			<p>'.__( 'Log in into your Rentl.io account', 'chekin2020' ).'</p>
		</div>
		<div class="slide slide-2">
			<p>'.__( 'Go to "Developers" section in you account menu', 'chekin2020' ).'</p>
		</div> 
		<div class="slide slide-3">
			<p>'.__( 'Copy the API Key and paste it here', 'chekin2020' ).'</p>
		</div> 
	',
	"logo" => 'https://chekin.com/onboarding/wp-content/uploads/2022/05/rentliosvg.svg',
	"contentTitle" =>__( 'How to connect Rentlio with Chekin?', 'chekin2020' ),
	"contentVideo" => '<iframe width="560" height="315" data-src="https://www.youtube.com/embed/yuKJbxIbfPQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
	"content" => '<p>'.__( 'Rentlio es un Property Management System and Channel Manager - Streamline your daily operations, deliver superb guest experiences and drive revenue.', 'chekin2020' ).'</p><p><a href="https://rentl.io" target="_blank">https://rentl.io</a></p>',
	
],

"Resharmonics"=>[
	"config"=>["path"=>"resharmonics",
				"form_field"=>[
								"resharmonics_username"=>"resharmonics_username",  
								"core_email"=> "text-gE8dLd",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"phone"=>"field-c2xENTMAvcqpurK-intl",
								"resharmonics_username"=>"resharmonics_username",
								"resharmonics_password"=>"resharmonics_password",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-resharmonics"><div class="form-fields"><div class="from-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'Username', 'chekin2020' ).'</label><input type="text" data-testid="input" name="resharmonics_username" placeholder="'.__( 'Enter username', 'chekin2020' ).'" class="form-control" value=""></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'Resharmonics password', 'chekin2020' ).'</label><input type="password" data-testid="input" name="resharmonics_password" placeholder="'.__( 'Enter your Resharmonics password', 'chekin2020' ).'" class="form-control" value=""></div></div><div class="from-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">'.__( 'Connect with Resharmonics', 'chekin2020' ).'</button></div></div></div>
	',
	"help" => '
		<div class="slide slide-1">
			<p>'.__( 'Reach out your contact person on Res:Harmonics and ask about connecting with Chekin', 'chekin2020' ).'</p>
		</div>
		<div class="slide slide-2">
			<p>'.__( 'Fill your API login credentials on this page', 'chekin2020' ).'</p>
		</div> 
	',
	"logo" => 'https://chekin.com/onboarding/wp-content/uploads/2022/05/resharmonics-logo.png',
	"contentTitle" =>__( 'How to connect Res:Harmonics with Chekin?', 'chekin2020' ),
	"contentVideo" => '<iframe width="560" height="315" data-src="https://www.youtube.com/embed/ZIuQ3ESvj9Q" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
	"content" => '<p>'.__( 'Res:harmonics provides operators with the essential tools to maximise sales, guest experience and reduce costs for serviced apartments, co-living, and build to rent residential', 'chekin2020' ).'</p><p><a href="https://www.resharmonics.com" target="_blank">https://www.resharmonics.com</a></p>',
	
],


"Resharmonics_2"=>[
	"config"=>["path"=>"pms-integrations/resharmonics",
				"form_field"=>[
								//"resharmonics_username"=>"resharmonics_username",  
								"core_email"=> "text-gE8dLd",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"phone"=>"field-c2xENTMAvcqpurK-intl",
								"user_username"=>"resharmonics_username",
								"user_password"=>"resharmonics_password",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-resharmonics"><div class="form-fields"><div class="from-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'Username', 'chekin2020' ).'</label><input type="text" data-testid="input" name="resharmonics_username" placeholder="'.__( 'Enter username', 'chekin2020' ).'" class="form-control" value=""></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'Resharmonics password', 'chekin2020' ).'</label><input type="password" data-testid="input" name="resharmonics_password" placeholder="'.__( 'Enter your Resharmonics password', 'chekin2020' ).'" class="form-control" value=""></div></div><div class="from-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">'.__( 'Connect with Resharmonics', 'chekin2020' ).'</button></div></div></div>
	',
	"help" => '
		<div class="slide slide-1">
			<p>'.__( 'Reach out your contact person on Res:Harmonics and ask about connecting with Chekin', 'chekin2020' ).'</p>
		</div>
		<div class="slide slide-2">
			<p>'.__( 'Fill your API login credentials on this page', 'chekin2020' ).'</p>
		</div> 
	',
	"logo" => 'https://onboarding.chekin.com/wp-content/uploads/2022/05/resharmonics-logo.png',
	"contentTitle" =>__( 'How to connect Res:Harmonics with Chekin?', 'chekin2020' ),
	"contentVideo" => '<iframe width="560" height="315" data-src="https://www.youtube.com/embed/ZIuQ3ESvj9Q" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
	"content" => '<p>'.__( 'Res:harmonics provides operators with the essential tools to maximise sales, guest experience and reduce costs for serviced apartments, co-living, and build to rent residential', 'chekin2020' ).'</p><p><a href="https://www.resharmonics.com" target="_blank">https://www.resharmonics.com</a></p>',
],


//just redirect to: https://login.smoobu.com/en/integration/edit/5
"Smoobu"=>[
	
	"form"=>'
		<div class="form-custom form-resharmonics"><div class="form-fields has-spacer"><div class="text-center form-group"><a href="https://login.smoobu.com/en/integration/edit/5" target="_blank" class="button" role="">'.__( 'Connect with Smoobu', 'chekin2020' ).'</a> </div></div></div>
	',
	"helptitle" => ''.__( 'How to connect with Smoobu?', 'chekin2020' ).'',
	"help" => '
		<div class="slide slide-1">
			<p>'.__( 'Click on <strong>"Connect with Smoobu".</strong> It will redirect you to Chekin connection on your Smoobu account', 'chekin2020' ).'</p>
		</div>
		<div class="slide slide-2">
			<p>'.__( 'Click on <strong>"Connect".</strong> We will send you an email with your Chekin password', 'chekin2020' ).'</p>
		</div>
		<div class="slide slide-3">
			<p>'.__( '<a href="https://dashboard.chekin.com/login" target="_blank">Login in CheKin.</a>', 'chekin2020' ).'</p>
		</div>

	',
	"logo" => 'https://chekin.com/onboarding/wp-content/uploads/2022/05/smoobu-2-1.svg',
	"contentTitle" =>__( 'How to connect Smoobu with Chekin?', 'chekin2020' ),
	"contentVideo" => '<iframe width="560" height="315" data-src="https://www.youtube.com/embed/7IBjUKv70Ao" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
	"content" => '<p>'.__( 'Smoobu PMS offers all-in-one vacation rental management software that seamlessly syncs booking portals like Airbnb, Booking.com, Trip.com, Agoda, Expedia, and more. Smoobu channel manager automates reservation handling and prevents double bookings with its comprehensive suite of tools including PMS, Channel Manager, Website Builder, Unified Inbox, Payments, Online Check-In, and a Dedicated Guest Portal. ', 'chekin2020' ).'</p><p><a href="'.__( 'https://www.smoobu.com/en/', 'chekin2020' ).'" target="_blank">'.__( 'https://www.smoobu.com/en/', 'chekin2020' ).'</a></p>',
	//"helpInitiator" => ''.__( 'How to connect?', 'chekin2020' ).''
	"helpInitiator" => ' ',
	'pmsName' => 'Smoobu',
	'benefitsTitle' => __( 'Benefits of integrating Chekin and Smoobu:', 'chekin2020' ),
	'benefits' => array( 
		__( 'Sync all your booking portals automatically', 'chekin2020' ),
		__('All your bookings in one central place', 'chekin2020' ),
		__('Create your booking website easily', 'chekin2020' ),
		__('Synchronise your rates to all portals', 'chekin2020' ),
		__('Mobile app available', 'chekin2020' ),
		__('No booking commissions', 'chekin2020' ),
		__('One subscription, all tools', 'chekin2020' ) 
	), 
],

//just redirect to: https://www.planyo.com/extensions/extension.php?id=129&origin=chekin
"Planyo"=>[
	
	"logo" => 'https://chekin.com/onboarding/wp-content/uploads/2022/05/planyo-logo.png',
	"contentTitle" =>__( 'How to connect Planyo with Chekin?', 'chekin2020' ),
	"contentVideo" => '<iframe width="560" height="315" data-src="https://www.youtube.com/embed/Lj1fHnT72Bc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
	"content" => '<p>'.__( 'Planyo is an online reservation system which can be used by any business taking bookings: for days, nights, hours or minutes, or scheduled events.', 'chekin2020' ).'</p><p><a href="https://www.planyo.com" target="_blank">https://www.planyo.com</a></p>',
],

"Apaleo"=>[
	"config"=>["path"=>"apaleo",
		"form_field"=>[
						//"access_token"=>"access_token",  
						"core_email"=> "text-gE8dLd",
						"code"=> "oauth_code",
						"subscription_type"=>"field-aD7ucdKDH7uqiq3",
						"email"=> "text-gE8dLd",
						//"email"=>"email",
						"password"=>"text-1hJwzr",
						"phone"=>"field-c2xENTMAvcqpurK-intl",
						//"password"=>"api_password",
						//"access_token"=>"access_token",
						"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
					]
	],
	"form"=>'
		<div class="form-custom form-apaleo "><div class="form-fields"><div class="form-group screen-reader-text"><div class="sc-qXhiz cvmVKB"><div class="sc-pItiW PQBAt">Email</div><input type="text" data-testid="input" name="email" id="email-oauth" placeholder="Enter your email" class="form-control" value=""></div></div><div class="is-oauth screen-reader-text"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Password </label><input type="password" data-testid="input" name="api_password" placeholder="Enter Password" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Confirm Password</label><input type="password" data-testid="input" name="api_password_confirm" placeholder="Confirm Password" class="form-control" value="" autocomplete="off"></div></div></div><div class="form-group"><button type="button" class="sc-jybekq kCpsjP custom-sync_0 btn-oauth" role="">'.__( 'Connect with Apaleo', 'chekin2020' ).'</button></div></div></div>
	',
	"logo" => 'https://chekin.com/onboarding/wp-content/uploads/2022/05/apaleo-logo-1.svg',
	"contentTitle" =>__( 'How to connect Apaleo with Chekin?', 'chekin2020' ),
	"contentVideo" => '<iframe width="560" height="315" data-src="https://www.youtube.com/embed/UdKDVOHH1FE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
	"content" => '<p>'.__( 'More than a PMS, Apaleo is the API-first property management software empowering hotel & apartment groups to create the ultimate experience for guests & staff. Gain back control and scale your hospitality business with native multi-property management, process automation and unlimited data access.', 'chekin2020' ).'</p><p><a href="'.__( 'https://apaleo.com/en/', 'chekin2020' ).'" target="_blank">'.__( 'https://apaleo.com/en/', 'chekin2020' ).'</a></p>',
	'pmsName' => 'Apaleo',
	'benefitsTitle' => __( 'Benefits of integrating Chekin and Apaleo:', 'chekin2020' ),
	'benefits' => array( 
		__( 'Adapts easily to all hotel sizes, from independent to large chains.', 'chekin2020' ),
		__( 'Seamless integration with diverse third-party apps for customizable tech stacks.', 'chekin2020' ),
		__( 'User-friendly interface for effective staff adoption.', 'chekin2020' ),
		__( 'Efficient scaling for consistent service quality across multiple properties.', 'chekin2020' ),
		__( 'Uses cutting-edge tech for modern guest experiences.', 'chekin2020' ), 
	), 
	
],

"Apaleo_2"=>[
	"config"=>["path"=>"pms-integrations/apaleo",
		"form_field"=>[
						//"access_token"=>"access_token",  
						"core_email"=> "text-gE8dLd",
						"api_key"=> "oauth_code",
						"subscription_type"=>"field-aD7ucdKDH7uqiq3",
						"email"=> "text-gE8dLd",
						//"email"=>"email",
						"password"=>"text-1hJwzr",
						"phone"=>"field-c2xENTMAvcqpurK-intl",
						//"password"=>"api_password",
						//"access_token"=>"access_token",
						"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
					]
	],
	"form"=>'
		<div class="form-custom form-apaleo-2 "><div class="form-fields"><div class="form-group screen-reader-text"><div class="sc-qXhiz cvmVKB"><div class="sc-pItiW PQBAt">Email</div><input type="text" data-testid="input" name="email" id="email-oauth" placeholder="Enter your email" class="form-control" value=""></div></div><div class="is-oauth screen-reader-text"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Password </label><input type="password" data-testid="input" name="api_password" placeholder="Enter Password" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Confirm Password</label><input type="password" data-testid="input" name="api_password_confirm" placeholder="Confirm Password" class="form-control" value="" autocomplete="off"></div></div></div><div class="form-group"><button type="button" class="sc-jybekq kCpsjP custom-sync_0 btn-oauth" role="">'.__( 'Connect with Apaleo', 'chekin2020' ).'</button></div></div></div>
	',
	"logo" => 'https://chekin.com/onboarding/wp-content/uploads/2022/05/apaleo-logo-1.svg',
	"contentTitle" =>__( 'How to connect Apaleo with Chekin?', 'chekin2020' ),
	"contentVideo" => '<iframe width="560" height="315" data-src="https://www.youtube.com/embed/UdKDVOHH1FE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
	"content" => '<p>'.__( 'More than a PMS, Apaleo is the API-first property management software empowering hotel & apartment groups to create the ultimate experience for guests & staff. Gain back control and scale your hospitality business with native multi-property management, process automation and unlimited data access.', 'chekin2020' ).'</p><p><a href="'.__( 'https://apaleo.com/en/', 'chekin2020' ).'" target="_blank">'.__( 'https://apaleo.com/en/', 'chekin2020' ).'</a></p>',
	'pmsName' => 'Apaleo',
	'benefitsTitle' => __( 'Benefits of integrating Chekin and Apaleo:', 'chekin2020' ),
	'benefits' => array( 
		__( 'Adapts easily to all hotel sizes, from independent to large chains.', 'chekin2020' ),
		__( 'Seamless integration with diverse third-party apps for customizable tech stacks.', 'chekin2020' ),
		__( 'User-friendly interface for effective staff adoption.', 'chekin2020' ),
		__( 'Efficient scaling for consistent service quality across multiple properties.', 'chekin2020' ),
		__( 'Uses cutting-edge tech for modern guest experiences.', 'chekin2020' ), 
	), 
	
],

"BookingSync"=>[
	"config"=>["path"=>"bookingsync",
				"form_field"=>[
								"access_token"=>"access_token",  
								"core_email"=> "text-gE8dLd",
								"code"=> "oauth_code",
								"subscription_type"=>"field-aD7ucdKDH7uqiq3",
								"email"=> "text-gE8dLd",
								//"email"=>"email",
								"password"=>"text-1hJwzr",
								"phone"=>"field-c2xENTMAvcqpurK-intl",
								//"password"=>"api_password",
								//"access_token"=>"access_token",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	
	"form"=>'
		<div class="form-custom form-bookingsync "><div class="form-fields"><input type="hidden" data-testid="input" name="access_token" placeholder="Access Token" class="form-control is-valid" value="2a6bb99a828ce721df0f63c21cd970b44364161d201c4590df12e44e1a1e5cf5" autocomplete="off"><div class="form-group screen-reader-text"><div class="sc-qXhiz cvmVKB"><div class="sc-pItiW PQBAt">Email</div><input type="text" data-testid="input" name="email" id="email-oauth" placeholder="Enter your email" class="form-control is-valid" value=""></div></div>
		<div class="is-oauth screen-reader-text"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Password </label><input type="password" data-testid="input" name="api_password" placeholder="Enter Password" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Confirm Password</label><input type="password" data-testid="input" name="api_password_confirm" placeholder="Confirm Password" class="form-control" value="" autocomplete="off"></div></div></div><div class="form-group"><button type="button" class="sc-jybekq kCpsjP custom-sync_0 btn-oauth" role="">'.__( 'Connect with BookingSync', 'chekin2020' ).'</button></div></div></div>
	',
	
],
"BookingSync_2"=>[
	"config"=>["path"=>"pms-integrations/bookingsync",
				"form_field"=>[
								"access_token"=>"access_token",  
								"core_email"=> "text-gE8dLd",
								"code"=> "oauth_code",
								"subscription_type"=>"field-aD7ucdKDH7uqiq3",
								"email"=> "text-gE8dLd",
								//"email"=>"email",
								"password"=>"text-1hJwzr",
								"phone"=>"field-c2xENTMAvcqpurK-intl",
								//"password"=>"api_password",
								//"access_token"=>"access_token",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	
	"form"=>'
		<div class="form-custom form-bookingsync "><div class="form-fields"><input type="hidden" data-testid="input" name="access_token" placeholder="Access Token" class="form-control is-valid" value="2a6bb99a828ce721df0f63c21cd970b44364161d201c4590df12e44e1a1e5cf5" autocomplete="off"><div class="form-group screen-reader-text"><div class="sc-qXhiz cvmVKB"><div class="sc-pItiW PQBAt">Email</div><input type="text" data-testid="input" name="email" id="email-oauth" placeholder="Enter your email" class="form-control is-valid" value=""></div></div>
		<div class="is-oauth screen-reader-text"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Password </label><input type="password" data-testid="input" name="api_password" placeholder="Enter Password" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Confirm Password</label><input type="password" data-testid="input" name="api_password_confirm" placeholder="Confirm Password" class="form-control" value="" autocomplete="off"></div></div></div><div class="form-group"><button type="button" class="sc-jybekq kCpsjP custom-sync_0 btn-oauth" role="">'.__( 'Connect with BookingSync', 'chekin2020' ).'</button></div></div></div>
	',
	"logo" => 'https://chekin.com/onboarding/wp-content/uploads/2022/05/bookingsync-logo.svg',
	"contentTitle" =>__( 'How to connect BookingSync with Chekin?', 'chekin2020' ),
	"contentVideo" => '<iframe width="560" height="315" data-src="https://www.youtube.com/embed/94jP83HUIdI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
	"content" => '<p>'.__( 'BookingSync is a Property management software for all short-term rentals managers which is already trusted by exceptional vacation rental management companies', 'chekin2020' ).'</p><p><a href="https://www.bookingsync.com" target="_blank">https://www.bookingsync.com</a></p>',
	
],
/*
"Cloudbeds"=>[
	"config"=>["path"=>"cloudbeds",
				"form_field"=>[
								"access_token"=>"oauth_code",  
								"core_email"=> "text-gE8dLd",
								"subscription_type"=>"field-aD7ucdKDH7uqiq3",
								"are_tokens_refetch"=>"are_tokens_refetch",
								"email"=> "text-gE8dLd",
								//"email"=>"email",
								"password"=>"text-1hJwzr",
								"phone"=>"field-c2xENTMAvcqpurK-intl",
								//"password"=>"api_password",
								//"access_token"=>"access_token",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	
	"form"=>'
		<div class="form-custom form-cloudbeds "><div class="form-fields"><input type="hidden" data-testid="input" name="are_tokens_refetch" placeholder="" class="form-control is-valid" value="false" autocomplete="off"><div class="form-group screen-reader-text"><div class="sc-qXhiz cvmVKB"><div class="sc-pItiW PQBAt">Email</div><input type="text" data-testid="input" name="email" id="email-oauth" placeholder="Enter your email" class="form-control is-valid" value=""></div></div>
		<div class="is-oauth screen-reader-text"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Password </label><input type="password" data-testid="input" name="api_password" placeholder="Enter Password" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Confirm Password</label><input type="password" data-testid="input" name="api_password_confirm" placeholder="Confirm Password" class="form-control" value="" autocomplete="off"></div></div></div><div class="form-group"><button type="button" class="sc-jybekq kCpsjP custom-sync_0 btn-oauth" role="">'.__( 'Connect with Cloudbeds', 'chekin2020' ).'</button></div></div></div>
	',
	"logo" => 'https://chekin.com/onboarding/wp-content/uploads/2022/05/cloudbeds_logo.svg',
	"contentTitle" =>__( 'How to connect Cloudbeds with Chekin?', 'chekin2020' ),
	"contentVideo" => '<iframe width="560" height="315" data-src="https://www.youtube.com/embed/zUlBKUhQTZY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
	"content" => '<p>'.__( 'Cloudbeds is the hospitality industry’s fastest-growing technology partner, which combines operations, revenue, distribution, and growth marketing tools with a marketplace of third-party integrations to help hoteliers and hosts', 'chekin2020' ).'</p><p><a href="https://www.cloudbeds.com" target="_blank">https://www.cloudbeds.com</a></p>',
	
],
*/
// TESTING >> Cloudbeds || Deleted TESTING from the PMS list in front-end
"Cloudbeds"=>[
	"config"=>["path"=>"pms-integrations/cloudbeds",
				"form_field"=>[
								"access_token"=>"oauth_code",  
								"code"=>"oauth_code",  
								"core_email"=> "text-gE8dLd",
								"subscription_type"=>"field-aD7ucdKDH7uqiq3",
								"are_tokens_refetch"=>"are_tokens_refetch",
								"email"=> "text-gE8dLd",
								//"email"=>"email",
								"password"=>"text-1hJwzr",
								"phone"=>"field-c2xENTMAvcqpurK-intl",
								//"password"=>"api_password",
								//"access_token"=>"access_token",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	
	"form"=>'
		<div class="form-custom form-cloudbeds "><div class="form-fields"><input type="hidden" data-testid="input" name="are_tokens_refetch" placeholder="" class="form-control is-valid" value="false" autocomplete="off"><div class="form-group screen-reader-text"><div class="sc-qXhiz cvmVKB"><div class="sc-pItiW PQBAt">Email</div><input type="text" data-testid="input" name="email" id="email-oauth" placeholder="Enter your email" class="form-control is-valid" value=""></div></div>
		<div class="is-oauth screen-reader-text"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Password </label><input type="password" data-testid="input" name="api_password" placeholder="Enter Password" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Confirm Password</label><input type="password" data-testid="input" name="api_password_confirm" placeholder="Confirm Password" class="form-control" value="" autocomplete="off"></div></div></div><div class="form-group"><button type="button" class="sc-jybekq kCpsjP custom-sync_0 btn-oauth" role="">'.__( 'Connect with Cloudbeds', 'chekin2020' ).'</button></div></div></div>
	',
	"logo" => 'https://chekin.com/onboarding/wp-content/uploads/2022/05/cloudbeds_logo.svg',
	"contentTitle" =>__( 'How to connect Cloudbeds with Chekin?', 'chekin2020' ),
	"contentVideo" => '<iframe width="560" height="315" data-src="https://www.youtube.com/embed/zUlBKUhQTZY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
	"content" => '<p>'.__( 'Cloudbeds PMS system is a rapidly growing technology partner for the global hospitality industry. Its Cloudbeds Hospitality Platform integrates operations, revenue management, distribution channels, and growth marketing tools. With a vast marketplace of third-party integrations, Cloudbeds helps hoteliers and hosts worldwide maximize revenue and deliver exceptional guest experiences.', 'chekin2020' ).'</p><p><a href="'.__( 'https://www.cloudbeds.com', 'chekin2020' ).'" target="_blank">'.__( 'https://www.cloudbeds.com', 'chekin2020' ).'</a></p>',
	'pmsName' => 'Cloudbeds',
	'benefitsTitle' => __( 'Benefits of integrating Chekin and Cloudbeds:', 'chekin2020' ),
	'benefits' => array( 
		__( 'Streamline operations and automate workflows', 'chekin2020' ),
		__( 'Stay competitive in the digital era', 'chekin2020' ),
		__( 'Modernize your guest experience', 'chekin2020' ),
		__( 'Data delivered, insights revealed', 'chekin2020' ),
	), 
	
],

"Myvr"=>[
	"config"=>["path"=>"myvr",
				"form_field"=>[
								//"access_token"=>"access_token",  
								"core_email"=> "text-gE8dLd",
								"code"=> "oauth_code",
								"subscription_type"=>"field-aD7ucdKDH7uqiq3",
								"email"=> "text-gE8dLd",
								//"email"=>"email",
								"password"=>"text-1hJwzr",
								"phone"=>"field-c2xENTMAvcqpurK-intl",
								//"password"=>"api_password",
								//"access_token"=>"access_token",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	
	"form"=>'
		<div class="form-custom form-myvr "><div class="form-fields"><div class="form-group screen-reader-text"><div class="sc-qXhiz cvmVKB"><div class="sc-pItiW PQBAt">Email</div><input type="text" data-testid="input" name="email" id="email-oauth" placeholder="Enter your email" class="form-control is-valid" value=""></div></div>
		<div class="is-oauth screen-reader-text"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Password </label><input type="password" data-testid="input" name="api_password" placeholder="Enter Password" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Confirm Password</label><input type="password" data-testid="input" name="api_password_confirm" placeholder="Confirm Password" class="form-control" value="" autocomplete="off"></div></div></div><div class="form-group"><button type="button" class="sc-jybekq kCpsjP custom-sync_0 btn-oauth" role="">'.__( 'Connect with Myvr', 'chekin2020' ).'</button></div></div></div>
	',
	
],
"Ownerrez"=>[
	"config"=>["path"=>"ownerrez",
				"form_field"=>[
								//"access_token"=>"access_token",  
								"core_email"=> "text-gE8dLd",
								"code"=> "oauth_code",
								"subscription_type"=>"field-aD7ucdKDH7uqiq3",
								"email"=> "text-gE8dLd",
								//"email"=>"email",
								"password"=>"text-1hJwzr",
								"phone"=>"field-c2xENTMAvcqpurK-intl",
								//"password"=>"api_password",
								//"access_token"=>"access_token",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	
	"form"=>'
		<div class="form-custom form-ownerrez "><div class="form-fields"><div class="form-group screen-reader-text"><div class="sc-qXhiz cvmVKB"><div class="sc-pItiW PQBAt">Email</div><input type="text" data-testid="input" name="email" id="email-oauth" placeholder="Enter your email" class="form-control is-valid" value=""></div></div>
		<div class="is-oauth screen-reader-text"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Password </label><input type="password" data-testid="input" name="api_password" placeholder="Enter Password" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Confirm Password</label><input type="password" data-testid="input" name="api_password_confirm" placeholder="Confirm Password" class="form-control" value="" autocomplete="off"></div></div></div><div class="form-group"><button type="button" class="sc-jybekq kCpsjP custom-sync_0 btn-oauth" role="">'.__( 'Connect with Ownerrez', 'chekin2020' ).'</button></div></div></div>
	',
	"logo" => 'https://chekin.com/onboarding/wp-content/uploads/2022/05/owner-logo.png',
	"contentTitle" =>__( 'How to connect ownerRez with Chekin?', 'chekin2020' ),
	"contentVideo" => '<iframe width="560" height="315" data-src="https://www.youtube.com/embed/nfMVP8UmC_o" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
	"content" => '<p>'.__( 'OwnerRez makes you Experience the difference of an “Elite” Vacation Rental Channel Manager, PMS and Website Provider. We are internationally recognized as a leader in the vacation rental industry for channel management, CRM, PM, accounting, messaging and websites.', 'chekin2020' ).'</p><p><a href="https://www.ownerreservations.com" target="_blank">https://www.ownerreservations.com</a></p>',
	
],

"Octorate"=>[
	"config"=>["path"=>"octorate",
				"form_field"=>[
								//"access_token"=>"access_token",  
								"core_email"=> "text-gE8dLd",
								"api_key"=> "oauth_code",
								"subscription_type"=>"field-aD7ucdKDH7uqiq3",
								"email"=> "text-gE8dLd",
								//"email"=>"email",
								//"password"=>"text-1hJwzr",
								//"password"=>"api_password",
								"phone"=>"field-c2xENTMAvcqpurK-intl",
								"access_token"=>"access_token",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	
	"form"=>'
		<div class="form-custom form-octorate "><div class="form-fields"><div class="form-group screen-reader-text"><div class="sc-qXhiz cvmVKB"><div class="sc-pItiW PQBAt">Email</div><input type="text" data-testid="input" name="email" id="email-oauth" placeholder="Enter your email" class="form-control is-valid" value=""></div></div>
		<div class="is-oauth screen-reader-text"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Password </label><input type="password" data-testid="input" name="api_password" placeholder="Enter Password" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Confirm Password</label><input type="password" data-testid="input" name="api_password_confirm" placeholder="Confirm Password" class="form-control" value="" autocomplete="off"></div></div></div><div class="form-group"><button type="button" class="sc-jybekq kCpsjP custom-sync_0 btn-oauth" role="">'.__( 'Connect with Octorate', 'chekin2020' ).'</button></div></div></div>
	',
	"logo" => 'https://chekin.com/onboarding/wp-content/uploads/2022/05/octorate-logo.png',
	"contentTitle" =>__( 'How to connect Octorate with Chekin?', 'chekin2020' ),
	"contentVideo" => '<iframe width="560" height="315" data-src="https://www.youtube.com/embed/G1cKQ3g5-3Y" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
	"content" => '<p>'.__( 'Octorate is a solution that supports you intuitively with the management, improvement and automation of the processes related to your accommodation. ', 'chekin2020' ).'</p><p><a href="https://octorate.com" target="_blank">https://octorate.com</a></p>',
	
],
"Octorate_2"=>[
  "config"=>["path"=>"pms-integrations/octorate",
              "form_field"=>[
                              //"access_token"=>"access_token",
                              "core_email"=> "text-gE8dLd",
                              "api_key"=> "oauth_code",
                              "subscription_type"=>"field-aD7ucdKDH7uqiq3",
                              "email"=> "text-gE8dLd",
                              //"email"=>"email",
                              //"password"=>"text-1hJwzr",
                              //"password"=>"api_password",
                              "phone"=>"field-c2xENTMAvcqpurK-intl",
                              "access_token"=>"access_token",
                              "estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
                          ]
          ],
  
  "form"=>'
      <div class="form-custom form-octorate "><div class="form-fields"><div class="form-group screen-reader-text"><div class="sc-qXhiz cvmVKB"><div class="sc-pItiW PQBAt">Email</div><input type="text" data-testid="input" name="email" id="email-oauth" placeholder="Enter your email" class="form-control is-valid" value=""></div></div>
      <div class="is-oauth screen-reader-text"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Password </label><input type="password" data-testid="input" name="api_password" placeholder="Enter Password" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Confirm Password</label><input type="password" data-testid="input" name="api_password_confirm" placeholder="Confirm Password" class="form-control" value="" autocomplete="off"></div></div></div><div class="form-group"><button type="button" class="sc-jybekq kCpsjP custom-sync_0 btn-oauth" role="">'.__( 'Connect with Octorate', 'chekin2020' ).'</button></div></div></div>
  ',
  "logo" => 'https://chekin.com/onboarding/wp-content/uploads/2022/05/octorate-logo.png',
  "contentTitle" =>__( 'How to connect Octorate with Chekin?', 'chekin2020' ),
  "contentVideo" => '<iframe width="560" height="315" data-src="https://www.youtube.com/embed/G1cKQ3g5-3Y" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
"content" => '<p>' . __( 'Octorate is the Management Software for Hotels and Vacation Rentals that enables you to improve, automate, and optimise all the processes related to the management of your accommodation facilities, from a single platform accessible from any device. Start saving time and improving your accommodation’s performance with our All-in-One Suite.', 'chekin2020' ) . '</p><p><a href="' . __( 'https://octorate.com/en/', 'chekin2020' ) . '" target="_blank">' . __( 'https://octorate.com/en/', 'chekin2020' ) . '</a></p>',

  
],
"Booking"=>[
	"config"=>["path"=>"booking",
				"form_field"=>[ 
								"core_email"=> "text-gE8dLd",
								"access_token"=> "oauth_code",
								"subscription_type"=>"field-aD7ucdKDH7uqiq3",
								"email"=> "text-gE8dLd",
								//"email"=>"email",
								"password"=>"text-1hJwzr",
								"phone"=>"field-c2xENTMAvcqpurK-intl",
								//"password"=>"api_password",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	
	"form"=>'
		<div class="form-custom form-booking "><div class="form-fields"><div class="form-group screen-reader-text"><div class="sc-qXhiz cvmVKB"><div class="sc-pItiW PQBAt">Email</div><input type="text" data-testid="input" name="email" id="email-oauth" placeholder="Enter your email" class="form-control is-valid" value=""></div></div>
		<div class="is-oauth screen-reader-text"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Password </label><input type="password" data-testid="input" name="api_password" placeholder="Enter Password" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Confirm Password</label><input type="password" data-testid="input" name="api_password_confirm" placeholder="Confirm Password" class="form-control" value="" autocomplete="off"></div></div></div><div class="form-group"><button type="button" class="sc-jybekq kCpsjP custom-sync_0 btn-oauth" role="">'.__( 'Connect with Booking', 'chekin2020' ).'</button></div></div></div>
	',
	
],
"Booking_2"=>[
	"config"=>["path"=>"pms-integrations/booking",
				"form_field"=>[ 
								"core_email"=> "text-gE8dLd",
								"access_token"=> "oauth_code",
								"subscription_type"=>"field-aD7ucdKDH7uqiq3",
								"email"=> "text-gE8dLd",
								//"email"=>"email",
								"password"=>"text-1hJwzr",
								"phone"=>"field-c2xENTMAvcqpurK-intl",
								//"password"=>"api_password",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	
	"form"=>'
		<div class="form-custom form-booking "><div class="form-fields"><div class="form-group screen-reader-text"><div class="sc-qXhiz cvmVKB"><div class="sc-pItiW PQBAt">Email</div><input type="text" data-testid="input" name="email" id="email-oauth" placeholder="Enter your email" class="form-control is-valid" value=""></div></div>
		<div class="is-oauth screen-reader-text"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Password </label><input type="password" data-testid="input" name="api_password" placeholder="Enter Password" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Confirm Password</label><input type="password" data-testid="input" name="api_password_confirm" placeholder="Confirm Password" class="form-control" value="" autocomplete="off"></div></div></div><div class="form-group"><button type="button" class="sc-jybekq kCpsjP custom-sync_0 btn-oauth" role="">'.__( 'Connect with Booking', 'chekin2020' ).'</button></div></div></div>
	',
	
],
/*"Bookipro"=>[
	"config"=>["path"=>"bookipro",
				"form_field"=>[
								"api_key"=>"api_key",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"phone"=>"field-c2xENTMAvcqpurK-intl",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
								]
			],
	"form"=>'
		<div class="form-custom form-Guesty "><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'API key', 'chekin2020' ).'</label><input type="text" data-testid="input" name="api_key" placeholder="'.__( 'Enter your API key', 'chekin2020' ).'" class="form-control" value=""></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">'.__( 'Connect with Bookipro', 'chekin2020' ).'</button></div></div></div> 
	',
	"help" => '
		<div class="slide slide-1">
			<p>'.__( 'Log in into your Bookipro account', 'chekin2020' ).'</p>
		</div>
		<div class="slide slide-2">
			<p>'.__( 'Visit the API Keys section', 'chekin2020' ).'</p>
		</div>
		<div class="slide slide-2">
			<p>'.__( 'Generate a new token, copy and paste it here', 'chekin2020' ).'</p>
		</div>
	',
	"logo" => 'https://chekin.com/onboarding/wp-content/uploads/2022/05/logo-bookipro-v2b.png',
	"contentTitle" => __( 'How to connect Bookipro with Chekin?', 'chekin2020' ),
	"contentVideo" => '<iframe width="560" height="315" data-src="https://www.youtube.com/embed/c6Z2nQzFZgc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
	"content" => '<p>'.__( 'Bookipro is a software designed by vacation rental professionals that will cover, whether you rent 10 or 4,000 properties, all your needs from PMS, booking engine, Channel Manager or many other services.', 'chekin2020' ).'</p><p><a href="https://bookipro.com" target="_blank">https://bookipro.com</a></p>',
],*/
"Bookipro"=>[
	"config"=>["path"=>"bookipro",
				"form_field"=>[
								"api_key"=>"api_key",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"phone"=>"field-c2xENTMAvcqpurK-intl",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
								]
			],
	"form"=>'
		<div class="form-custom form-Guesty "><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'URL Bookipro', 'chekin2020' ).'</label><input type="text" data-testid="input" name="host" placeholder="'.__( 'Enter URL', 'chekin2020' ).'" class="form-control" value=""></div></div>
							
							<div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'API key', 'chekin2020' ).'</label><input type="text" data-testid="input" name="api_key" placeholder="'.__( 'Enter your API key', 'chekin2020' ).'" class="form-control" value=""></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">'.__( 'Connect with Bookipro', 'chekin2020' ).'</button></div></div></div>
	',
	"help" => '
		<div class="slide slide-1">
			<p>'.__( 'Log in into your Bookipro account', 'chekin2020' ).'</p>
		</div>
		<div class="slide slide-2">
			<p>'.__( 'Visit the API Keys section', 'chekin2020' ).'</p>
		</div>
		<div class="slide slide-2">
			<p>'.__( 'Generate a new token, copy and paste it here', 'chekin2020' ).'</p>
		</div>
	',
	"logo" => 'https://chekin.com/onboarding/wp-content/uploads/2022/05/logo-bookipro-v2b.png',
	"contentTitle" => __( 'How to connect Bookipro with Chekin?', 'chekin2020' ),
	"contentVideo" => '<iframe width="560" height="315" data-src="https://www.youtube.com/embed/c6Z2nQzFZgc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
	"content" => '<p>'.__( 'Bookipro is a software designed by vacation rental professionals that will cover, whether you rent 10 or 4,000 properties, all your needs from PMS, booking engine, Channel Manager or many other services.', 'chekin2020' ).'</p><p><a href="https://bookipro.com" target="_blank">https://bookipro.com</a></p>',
  
  ],
  "Bookipro_2"=>[
	"config"=>["path"=>"pms-integrations/bookipro",
				"form_field"=>[
								"api_key"=>"api_key",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"phone"=>"field-c2xENTMAvcqpurK-intl",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
								]
			],
	"form"=>'
		<div class="form-custom form-Guesty "><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'URL Bookipro', 'chekin2020' ).'</label><input type="text" data-testid="input" name="host" placeholder="'.__( 'Enter URL', 'chekin2020' ).'" class="form-control" value=""></div></div>
							
							<div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'API key', 'chekin2020' ).'</label><input type="text" data-testid="input" name="api_key" placeholder="'.__( 'Enter your API key', 'chekin2020' ).'" class="form-control" value=""></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">'.__( 'Connect with Bookipro', 'chekin2020' ).'</button></div></div></div>
	',
	"help" => '
		<div class="slide slide-1">
			<p>'.__( 'Log in into your Bookipro account', 'chekin2020' ).'</p>
		</div>
		<div class="slide slide-2">
			<p>'.__( 'Visit the API Keys section', 'chekin2020' ).'</p>
		</div>
		<div class="slide slide-2">
			<p>'.__( 'Generate a new token, copy and paste it here', 'chekin2020' ).'</p>
		</div>
	',
	"logo" => 'https://chekin.com/onboarding/wp-content/uploads/2022/05/logo-bookipro-v2b.png',
	"contentTitle" => __( 'How to connect Bookipro with Chekin?', 'chekin2020' ),
	"contentVideo" => '<iframe width="560" height="315" data-src="https://www.youtube.com/embed/c6Z2nQzFZgc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
	"content" => '<p>'.__( 'Bookipro is a software designed by vacation rental professionals that will cover, whether you rent 10 or 4,000 properties, all your needs from PMS, booking engine, Channel Manager or many other services.', 'chekin2020' ).'</p><p><a href="https://bookipro.com" target="_blank">https://bookipro.com</a></p>',
  
  ],
/*"Ulyses"=>[
	"config"=>["path"=>"ulyses",
				"form_field"=>[
								 
								//"client_username"=>"client_username",
								//"client_password"=>"client_password",
								"user_domain"=>"user_domain",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"phone"=>"field-c2xENTMAvcqpurK-intl",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
								]
			],
	"form"=>'
		<div class="form-custom form-ulyses "><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'Ulyses account URL:', 'chekin2020' ).'</label><input type="text" name="user_domain" placeholder="'.__( 'Enter your URL', 'chekin2020' ).'" class="form-control" value=""></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">'.__( 'Connect with Ulyses', 'chekin2020' ).'</button></div></div></div> 
	',
	"help" => '',
	"logo" => 'https://chekin.com/onboarding/wp-content/uploads/2022/05/Ulyses-logo-1.svg',
	"contentTitle" =>__( 'How to connect Ulyses with Chekin?', 'chekin2020' ),
	"content" => '<p>'.__( 'By using Ulyses you can minimize your operating costs, automate processes and increase your direct bookings. Sign up for information on the ultimate Hotel Software of top independent hotels and chains.', 'chekin2020' ).'</p><p><a href="https://ulysescloud.com/es/home/" target="_blank">https://ulysescloud.com/es/home/</a></p>',
],*/
"Ulyses"=>[
	"config"=>["path"=>"pms-integrations/ulyses",
				"form_field"=>[
								 
								//"client_username"=>"client_username",
								//"client_password"=>"client_password",
								"user_domain"=>"user_domain",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"phone"=>"field-c2xENTMAvcqpurK-intl",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
								]
			],
	"form"=>'
		<div class="form-custom form-ulyses "><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'Ulyses account URL:', 'chekin2020' ).'</label><input type="text" name="user_domain" placeholder="'.__( 'Enter your URL', 'chekin2020' ).'" class="form-control" value=""></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'Ulyses Password', 'chekin2020' ).'</label><input type="text" name="pms_password" placeholder="'.__( 'Enter Password', 'chekin2020').'" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">'.__( 'Connect with Ulyses', 'chekin2020' ).'</button></div></div></div> 
	',
	
	"help" => '',
	"logo" => 'https://onboarding.chekin.com/wp-content/uploads/2022/05/Ulyses-logo-1.svg',
	"contentTitle" =>__( 'How to connect Ulyses with Chekin?', 'chekin2020' ),
	"content" => '<p>'.__( 'By using Ulyses you can minimize your operating costs, automate processes and increase your direct bookings. Sign up for information on the ultimate Hotel Software of top independent hotels and chains.', 'chekin2020' ).'</p><p><a href="https://ulysescloud.com/es/home/" target="_blank">https://ulysescloud.com/es/home/</a></p>',
],

"Deskline"=>[
	"config"=>["path"=>"pms-integrations/deskline", 
				"form_field"=>[
								//"client_secret"=>"client_secret",
								//"client_id"=>"client_id",
								"housings_ids"=>"housings_ids",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"phone"=>"field-c2xENTMAvcqpurK-intl",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-deskline"><div class="form-fields"><div class="sc-kNZoFW drYvvf"><div class="multi-field-wrapper"> <div class="multi-fields"><div class="form-group housings_ids multi-field"><div class="sc-qXhiz cvmVKB field"><label class="sc-pItiW PQBAt">Hotel Code</label><input type="text" data-testid="input" name="housings_ids[]" placeholder="'.__( 'Enter Hotel Code', 'chekin2020' ).'" class="form-control" value=""></div><a href="javascript:void(0)" class="remove-field">X</a></div></div><p class=" mt-0 mb-0"><a class="add-field" href="javascript:void(0)">'.__( 'Add field', 'chekin2020' ).'</a></p></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">'.__( 'Connect with Deskline', 'chekin2020' ).'</button></div></div></div>
	',
	"logo" => 'https://chekin.com/wp-content/uploads/2023/03/Feratel-deskline-logo-300x101.png',
	"contentTitle" =>__( 'How to connect Deskline with Chekin?', 'chekin2020' ),
	"content" => '<p>'.__( 'Deskline: the Smart Destination Management system by Feratel is a channel manager, reporting system, brochure management, restaurant guide, guest card, data analysis, statistics, information media, in combination with all levels – regional office, tourism office, information point and landlord.', 'chekin2020' ).'</p><p><a href="https://www.feratel.at/en/our-solutions/destination-management-system/" target="_blank">https://www.feratel.at/en/our-solutions/destination-management-system/</a></p>',
 
],
"Lavanda"=>[
	"config"=>["path"=>"pms-integrations/lavanda", 
				"form_field"=>[
								"api_key"=>"api_key",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"phone"=>"field-c2xENTMAvcqpurK-intl",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-lavanda "><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'API key', 'chekin2020' ).'</label><input type="text" data-testid="input" name="api_key" placeholder="'.__( 'Enter your API key', 'chekin2020' ).'" class="form-control" value=""></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">'.__( 'Connect with Lavanda', 'chekin2020' ).'</button></div></div></div> 
	',
	"logo" => 'https://chekin.com/onboarding/wp-content/uploads/2022/05/lavanda-logo.svg',
	"contentTitle" =>__( 'How to connect Lavanda with Chekin?', 'chekin2020' ),
	"content" => '<p>'.__( 'Lavanda PMS allows you to configure a set of fully-automated leasing and booking journeys, leasing, resident experience, operations and accounting with an hotel style bookings for each property type and stay type.', 'chekin2020' ).'</p><p><a href="https://getlavanda.com" target="_blank">https://getlavanda.com</a></p>',
 
],

"Avantio"=>[
	"config"=>["path"=>"pms-integrations/avantio", 
				"form_field"=>[
								
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"pms_username"=>"pms_username",
								"pms_password"=>"pms_password",
								"phone"=>"field-c2xENTMAvcqpurK-intl",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-avantio "><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'PMS username', 'chekin2020' ).'</label><input type="text" data-testid="input" name="pms_username" placeholder="'.__( 'Enter username', 'chekin2020' ).'" class="form-control" value=""></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'PMS password', 'chekin2020' ).'</label><input type="text" data-testid="input" name="pms_password" placeholder="'.__( 'Enter password', 'chekin2020' ).'" class="form-control" value=""></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">'.__( 'Connect with Avantio', 'chekin2020' ).'</button></div></div></div> 
	',
	"logo" => 'https://chekin.com/wp-content/uploads/2023/04/avantio-orange.png',
	"contentTitle" =>__( 'How to connect Avantio with Chekin?', 'chekin2020' ),
	"content" => '<p>'.__( 'Avantio’s property management software is an all-in-one solution, available in 7 languages, supporting agencies across the globe to streamline processes and maximize revenue. A single software service, fully customisable, and ready to integrate with your business.', 'chekin2020' ).'</p><p>'.__( 'To connect with Avantio you must request the credentials from the technical service: <a href="mailto:support@avantio.com">support@avantio.com</a>', 'chekin2020' ).'</p><p><a href="https://www.avantio.com" target="_blank">https://www.avantio.com</a></p>',
 
],

"Verial"=>[
	"config"=>["path"=>"pms-integrations/verial", 
				"form_field"=>[
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"user_dns"=>"user_dns",
								"session_nu"=>"session_nu",
								"phone"=>"field-c2xENTMAvcqpurK-intl",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-verial "><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'User DNS', 'chekin2020').'</label><input type="text" data-testid="input" name="user_dns" placeholder="'.__( 'User DNS', 'chekin2020').'" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'Session Number', 'chekin2020').'</label><input type="text" data-testid="input" name="session_nu" placeholder="'.__( 'Session Number', 'chekin2020').'" class="form-control" value="" autocomplete="off"></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">Connect with Verial</button></div></div></div>
	',
	"logo" => 'https://onboarding.chekin.com/wp-content/uploads/2022/06/verial.png',
	"contentTitle" =>__( 'How to connect Verial with Cheki?', 'chekin2020' ),
	"contentVideo" => '',
	"content" => '<p>'.__( 'Verial Hotel is an ERP and PMS that allows you to manage all areas of your business. It is a modular solution that, investing just enough, will be able to cover your demand, whether it is a vacation hotel, a hotel for congresses and events, a resort, a spa or a restaurant; the specialization of each module will give you full control over each work area.', 'chekin2020' ).'</p><p><a href="https://www.verial.es/en/" target="_blank">https://www.verial.es/en/</a></p>',
	
 
],
'Amenitiz' =>[
	"logo" => 'https://chekin.com/onboarding/wp-content/uploads/2023/01/WORDMARK-AMENITIZ-BLUE-1.svg',
	"contentTitle" =>__( 'How to connect Amenitiz with Chekin?', 'chekin2020' ),
	"contentVideo" => '',
	"content" => '<p>'.__( 'Amenitiz offers user-friendly hospitality software designed to increase profits, save time, and enhance guest experiences. Their all-in-one solution simplifies hotel management, making it an ideal choice for hospitality businesses seeking operational efficiency and improved guest satisfaction.', 'chekin2020' ).'</p><p><a href="'.__( 'https://amenitiz.com/en/', 'chekin2020' ).'" target="_blank">'.__( 'https://amenitiz.com/en/', 'chekin2020' ).'</a></p>',
	'pmsName' => 'Amenitiz',
	'benefitsTitle' => __( 'Benefits of integrating Chekin and Amenitz:', 'chekin2020' ),
	'benefits' => array( 
		__( 'Enjoy smoother operations', 'chekin2020' ),
		__( 'Improve guest experience', 'chekin2020' ),
		__( 'Make smarter decisions', 'chekin2020' ),
		__( 'Increase your visibility', 'chekin2020' ),
		__( 'Save time and streamline operations', 'chekin2020' ),
		__( 'Boost revenue', 'chekin2020' ),
	), 	
],

'littlehotelier'=>[
	"logo" => 'https://chekin.com/onboarding/wp-content/uploads/2022/05/lh-logo_af11eeed.svg',
	"contentTitle" =>__( 'How to connect Little Hotelier with Chekin?', 'chekin2020' ),
	"contentVideo" => '<iframe width="560" height="315" data-src="https://www.youtube.com/embed/DeJsXZ4PZDk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
	"content" => '<p>'.__( 'Streamline your vacation rental management with Little Hotelier\'s powerful PMS and Channel Manager. Automate operations across Airbnb, Booking.com, Vrbo, Expedia, TripAdvisor, and more, tailored for small-scale efficiency.', 'chekin2020' ).'</p><p><a href="'.__( 'https://www.littlehotelier.com/', 'chekin2020' ).'" target="_blank">'.__( 'https://www.littlehotelier.com/', 'chekin2020' ).'</a></p>',
	'pmsName' => 'Little Hotellier',
	'benefitsTitle' => __( 'Benefits of integrating Chekin and Little Hotellier:', 'chekin2020' ),
	'benefits' => array( 
		__( 'An easy-to-use front desk system, to keep your property in order', 'chekin2020' ),
		__( 'A commission-free booking engine for your hotel website, to clinch direct bookings', 'chekin2020' ),
		__( 'A great channel manager, to get your property on to OTAs', 'chekin2020' ),
		__( 'A website builder site, so you can jazz yours up or start from scratch', 'chekin2020' ),
		__( 'Reporting and insights, to help you make the best choices', 'chekin2020' ),
		__( 'Built-in payments, so you can save up to four minutes per booking', 'chekin2020' ),
		__( 'The ability to list on metasearch sites, like Google Hotel Ads.', 'chekin2020' ),
	), 	
],
'channelmanager'=>[
	"logo" => 'https://chekin.com/onboarding/wp-content/uploads/2022/05/siteminder.svg',
	"contentTitle" =>__( 'How to connect Siteminder with Chekin?', 'chekin2020' ),
	"contentVideo" => '<iframe width="560" height="315" data-src="https://www.youtube.com/embed/SpawZtV4eLc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
	"content" => '<p>'.__( 'Siteminder is the world’s leading hotel commerce platform which offer everything you need to succeed as a modern accommodation business.', 'chekin2020' ).'</p><p><a href="https://www.siteminder.com" target="_blank">https://www.siteminder.com</a></p>',
],
'dataHotel' =>[
	"logo" => 'https://chekin.com/onboarding/wp-content/uploads/2024/07/datahotel.png',
	"contentTitle" =>__( 'How to connect Datahotel with Chekin?', 'chekin2020' ),
	"contentVideo" => '<iframe width="560" height="315" data-src="https://www.youtube.com/embed/JwF1kTFmJNk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
	"content" => '<p>'.__( 'dataHotel offers a comprehensive and user-friendly hotel management software designed to streamline operations and optimize guest experiences. Developed by Albada Informática, with over 25 years of industry expertise, dataHotel automates tasks, provides valuable insights, and enhances efficiency for all types of accommodations, from small hotels to boutique resorts. ', 'chekin2020' ).'</p><p><a href="'.__( 'https://www.datahotel.es ', 'chekin2020' ).'" target="_blank">'.__( 'https://www.datahotel.es ', 'chekin2020' ).'</a></p>',
	'pmsName' => 'dataHotel Software',
	'benefitsTitle' => __( 'Benefits of integrating Chekin and dataHotel Software:', 'chekin2020' ),
	'benefits' => array( 
		__( 'Hotel PMS ', 'chekin2020' ),
		__( 'Channel Manager', 'chekin2020' ),
		__( 'Booking Engine ', 'chekin2020' ),
		__( 'POS', 'chekin2020' ),
		__( 'Revenue Manager ', 'chekin2020' ),
		__( 'CRM', 'chekin2020' ),
		__( 'Business Intelligence ', 'chekin2020' ),
		__( 'Integrable Modules', 'chekin2020' ),
	), 
],
'MasterYield' =>[
	"logo" => 'https://chekin.com/onboarding/wp-content/uploads/2022/05/masteryield_logo.svg',
	"contentTitle" =>__( 'How to connect MasterYield with Chekin?', 'chekin2020' ),
	"contentVideo" => '<iframe width="560" height="315" data-src="https://www.youtube.com/embed/6OkwOqw-oYM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
	"content" => '<p>'.__( 'MasterYield is a Tourism Lodging Management Software, Yield and Revenue Management Integrated, Channel Manager Integrated to the PMS with automatic updates and Reservation Engine without commissions.', 'chekin2020' ).'</p><p><a href="https://www.masteryield.com" target="_blank">https://www.masteryield.com</a></p>',
],
'Beds24' =>[
	"logo" => 'https://chekin.com/onboarding/wp-content/uploads/2022/05/beds24-log.svg',
	"contentTitle" =>__( 'How to connect Beds24 with Chekin?', 'chekin2020' ),
	"contentVideo" => '<iframe width="560" height="315" data-src="https://www.youtube.com/embed/M8PfpaU90Hc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
	"content" => '<p>'.__( 'Beds24, the all-in-one solution for holiday apartment rentals and hotel management. Manage bookings, listings, calendars, payments, and guest communications effortlessly. Award-winning software to save time, increase bookings, and scale your business. Mobile-friendly and multi-language support included.', 'chekin2020' ).'</p><p><a href="'.__( 'https://beds24.com', 'chekin2020' ).'" target="_blank">'.__( 'https://beds24.com', 'chekin2020' ).'</a></p>',
	'pmsName' => 'Beds24',
	'benefitsTitle' => __( 'Benefits of integrating Chekin and Beds24:', 'chekin2020' ),
	'benefits' => array( 
		__( 'Beds24 Channel Manager (for popular booking portals like Airbnb, Expedia, Vrbo and Booking.com, etc)', 'chekin2020' ),
		__( 'Secure Payment Collection', 'chekin2020' ),
		__( 'Property Management System (PMS)', 'chekin2020' ),
		__( 'Online Booking System', 'chekin2020' ),
		__( 'Guest communication and central inbox - Secure payment processing', 'chekin2020' ),
		__( 'Workflow automation (bookings, calendars, payments, communication and more)', 'chekin2020' ),
		__( 'Integrations with numerous third party apps and services', 'chekin2020' ),
		__( 'Accessible anytime, anywhere on a desktop or mobile device.', 'chekin2020' ),
), 
],
'Booking Automation' =>[
	"logo" => 'https://chekin.com/onboarding/wp-content/uploads/2022/05/booking-logo-2.png',
	"contentTitle" =>__( 'How to connect Booking Automation with Chekin?', 'chekin2020' ),
	"content" => '<p>'.__( 'Booking Automation was developed in 2011 as an internal tool to manage a fleet of short-term rental homes. It evolved into a robust system that automates end-to-end operations for thousands of operators worldwide. Founded by experienced short-term rental operators, Booking Automation continues to innovate to meet the needs of its dedicated users.', 'chekin2020' ).'</p><p><a href="'.__( 'https://www.bookingautomation.com', 'chekin2020' ).'" target="_blank">'.__( 'https://www.bookingautomation.com', 'chekin2020' ).'</a></p>',
	'pmsName' => 'Booking Automation',
	'benefitsTitle' => __( 'Benefits of integrating Chekin and Booking Automation:', 'chekin2020' ),
	'benefits' => array( 
		__( 'Real-time updates across all channels to reduce double bookings and boost efficiency.', 'chekin2020' ),
		__( 'Streamlined guest interactions with automated messages for improved service and time savings.', 'chekin2020' ),
		__( 'Simplified revenue management with automated payment processing to enhance cash flow.', 'chekin2020' ),
		__( 'Professional online presence with a customizable booking site to attract direct bookings.', 'chekin2020' ),
		__( 'Maximized revenue through dynamic pricing strategies that adjust to market demand automatically.', 'chekin2020' ),
	), 

],


"Tommy"=>[
	"config"=>["path"=>"pms-integrations/tommy", 
				"form_field"=>[
								
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"pms_username"=>"pms_username",
								"pms_password"=>"pms_password",
								"api_key"=>"api_key",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-tommy "><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'TommyBS username', 'chekin2020' ).'</label><input type="text" data-testid="input" name="pms_username" placeholder="'.__( 'Enter username', 'chekin2020' ).'" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'TommyBS password', 'chekin2020' ).'</label><input type="text" data-testid="input" name="pms_password" placeholder="'.__( 'Password', 'chekin2020' ).'" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'API Key', 'chekin2020' ).'</label><input type="text" data-testid="input" name="api_key" placeholder="'.__( 'API Key', 'chekin2020' ).'" class="form-control" value="" autocomplete="off"></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">'.__( 'Connect with Tommy BS', 'chekin2020' ).'</button></div></div></div>
	',
	"logo" => 'https://chekin.com/wp-content/uploads/2023/03/Tommy-bs-logo.png',
	"contentTitle" =>__( 'How to connect Tommy with Chekin?', 'chekin2020' ),
	"content" => '<p>'.__( 'Tommy Booking Support provides an online booking system focused for camp sites , holiday parks and motorhome rentals owner to manage reservations, revenue, reporting and online booking.', 'chekin2020' ).'</p><p><a href="https://en.tommybookingsupport.nl/" target="_blank">https://en.tommybookingsupport.nl/</a></p>',
 
],
"Hostfully"=>[
	"config"=>["path"=>"pms-integrations/hostfully", 
				"form_field"=>[
								
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"agency_uid"=>"api_key",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-hostfully "><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'Agency UID', 'chekin2020' ).'</label><input type="text" data-testid="input" name="api_key" placeholder="'.__( 'Agency UID', 'chekin2020' ).'" class="form-control" value="" autocomplete="off"></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">'.__( 'Connect with Hostfully', 'chekin2020' ).'</button></div></div></div>
	',
	
	"logo" => 'https://chekin.com/wp-content/uploads/2022/12/Hostfully-Primary-Logo-1-300x86.png',
	"contentTitle" =>__( 'How to connect Hostfully with Chekin?', 'chekin2020' ),
	"content" => '<p>'.__( 'Hostfully is an all-in-one property management platform that allows vacation rental managers to handle all aspects of their business in one easy-to-use space.', 'chekin2020' ).'</p><p><a href="https://www.hostfully.com/" target="_blank">https://www.hostfully.com/</a></p>',
 
],
"Hostfully_2"=>[
	"config"=>["path"=> "pms-integrations/hostfully",
				"form_field"=>[
								//"access_token"=>"access_token",
								"core_email"=> "text-gE8dLd",
								"api_key"=> "oauth_code",
								"subscription_type"=>"field-aD7ucdKDH7uqiq3",
								"email"=> "text-gE8dLd",
								//"email"=>"email",
								//"password"=>"text-1hJwzr",
								//"password"=>"api_password",
								"phone"=>"field-c2xENTMAvcqpurK-intl",
								"access_token"=>"access_token",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	
	"form"=>'
		<div class="form-custom form-hostfully "><div class="form-fields"><div class="form-group screen-reader-text"><div class="sc-qXhiz cvmVKB"><div class="sc-pItiW PQBAt">Email</div><input type="text" data-testid="input" name="email" id="email-oauth" placeholder="Enter your email" class="form-control is-valid" value=""></div></div>
		<div class="is-oauth screen-reader-text"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Password </label><input type="password" data-testid="input" name="api_password" placeholder="Enter Password" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Confirm Password</label><input type="password" data-testid="input" name="api_password_confirm" placeholder="Confirm Password" class="form-control" value="" autocomplete="off"></div></div></div><div class="form-group"><button type="button" class="sc-jybekq kCpsjP custom-sync_0 btn-oauth" role="">'.__( 'Connect with hostfully', 'chekin2020' ).'</button></div></div></div>
	',
	"logo" => 'https://chekin.com/wp-content/uploads/2022/12/Hostfully-Primary-Logo-1-300x86.png',
	"contentTitle" =>__( 'How to connect Hostfully with Chekin?', 'chekin2020' ),
	"content" => '<p>'.__( 'Hostfully is an all-in-one property management platform that allows vacation rental managers to handle all aspects of their business in one easy-to-use space.', 'chekin2020' ).'</p><p><a href="https://www.hostfully.com/" target="_blank">https://www.hostfully.com/</a></p>',
 
  ],
"avaibook"=>[
    "config"=>["path"=>"pms-integrations/avaibook", 
                "form_field"=>[
                                
                                "email"=> "text-gE8dLd",
                                "password"=>"text-1hJwzr",
                                "api_key"=>"api_key",
                                "estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
                            ]
            ],
    "form"=>'
        <div class="form-custom form-avaibook "><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'API key', 'chekin2020' ).'</label><input type="text" data-testid="input" name="api_key" placeholder="'.__( 'API key', 'chekin2020' ).'" class="form-control" value="" autocomplete="off"></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">'.__( 'Connect with Avaibook', 'chekin2020' ).'</button></div></div></div>
    ',
        "logo" => 'https://chekin.com/onboarding/wp-content/uploads/2024/04/AvaiBook.png',
    "content" => '<p>'.__( 'AvaiBook is the short-term rental software from idealista. Its the perfect system for all hosts, real estate agencies and property managers who need time-saving automations to manage all their bookings, pricing, and daily tasks such as staff duties or communications from a single, unified calendar.', 'chekin2020' ).'</p><p><a href="https://www.avaibook.com/demo/" target="_blank">https://www.avaibook.com/demo/</a></p>',
],	
'ABAL_Consulting' =>[
	"logo" => 'https://chekin.com/wp-content/uploads/2022/12/ABAL-Consulting-Logo.jpg',
	"contentTitle" =>__( 'How to connect ABAL Consulting with Chekin?', 'chekin2020' ),
	"content" => '<p>'.__( 'At ABAL Consulting we have a mission: to empower hots from anywhere in the world to manage, administer and get the most out of their tourist accommodation businesses in a simple and measurable way. Increase your profitability in a guaranteed way and adapted to your business model', 'chekin2020' ).'</p><p><a href="https://www.abalconsulting.com/" target="_blank">https://www.abalconsulting.com/</a></p>',

],
'Track' =>[
	"config"=>["path"=>"pms-integrations/track", 
				"form_field"=>[
								
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"sub_domain"=>"sub_domain",
								"pms_username"=>"pms_username",
								"pms_password"=>"pms_password",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-track "><div class="form-fields">
		<div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'Sub domain', 'chekin2020' ).'</label><input type="text" data-testid="input" name="sub_domain" placeholder="'.__( 'Enter sub domain', 'chekin2020' ).'" class="form-control" value="" autocomplete="off"></div> <div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'Key', 'chekin2020' ).'</label><input type="text" data-testid="input" name="pms_username" placeholder="'.__( 'Enter key', 'chekin2020' ).'" class="form-control" value="" autocomplete="off"></div> <div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'Secret', 'chekin2020' ).'</label><input type="text" data-testid="input" name="pms_password" placeholder="'.__( 'Enter secret', 'chekin2020' ).'" class="form-control" value="" autocomplete="off"></div>
		<div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">'.__( 'Connect with track', 'chekin2020' ).'</button></div></div></div>
	',
	"logo" => 'https://chekin.com/wp-content/uploads/2023/07/Track.png',
	"contentTitle" =>__( 'How to connect Track with Chekin?', 'chekin2020' ),
	"content" => '<p>'.__( 'Track Hospitality Software is a property management system (PMS) that helps hotels, vacation rentals, and other hospitality businesses manage their operations. It includes features for managing reservations, guests, housekeeping, maintenance, and accounting. Track also offers a variety of integrations with other software, such as channel management systems and marketing platforms.', 'chekin2020' ).'</p><p><a href="https://tnsinc.com/hospitality-hub/track/" target="_blank">https://tnsinc.com/hospitality-hub/track/</a></p>',
], 
"minihotel"=>[
	"config"=>["path"=>"pms-integrations/minihotel", 
				"form_field"=>[
								
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"hotel_id"=>"hotel_id",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-minihotel "><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'Hotel ID', 'chekin2020' ).'</label><input type="text" data-testid="input" name="hotel_id" placeholder="'.__( 'Enter hotel id', 'chekin2020' ).'" class="form-control" value="" autocomplete="off"></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">'.__( 'Connect with Minihotel', 'chekin2020' ).'</button></div></div></div>
	',
	
 
],
'Noray' =>[
	"config"=>["path"=>"pms-integrations/noray", 
				"form_field"=>[
								
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"client_id"=>"client_id",
								"client_secret"=>"client_secret",
								"tenant_id"=>"tenant_id",
								"environment"=> "environment",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
            ],
	"logo" => 'https://chekin.com/onboarding/wp-content/uploads/2024/05/Logo-Noray.svg',
	"content" => '<p>'.__( 'Noray is an IT solutions company specialized in business management software for hotels, consultancies as well as small and medium sized companies. Noray implements Microsoft Dynamics NAV, Sharepoint, Business Intelligence, Infrastructure and self-developed solutions.
', 'chekin2020' ).'</p><p><a href="https://www.noray.com" target="_blank">https://www.noray.com</a></p>',
],	 

'Noray_2' =>[
	"config"=>["path"=>"pms-integrations/noray", 
				"form_field"=>[
								
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"pms_email" => "text-gE8dLd",
								"pms_account_type"=> "pms_account_type",
								/*"protocol"=>"protocol",
								"host"=>"host",
								"port"=>"port",
								"business_central_version"=>"business_central_version",
								
								"basic_username"=> "basic_username",
								"basic_password"=> "basic_password",*/
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'

	<div class="form-custom form-noray_cloud_on_premise">
    <div class="form-fields">

	<div class="form-group" >
		<div class="sc-qXhiz cvmVKB" >
			<label class="sc-pItiW PQBAt">Auth Type</label>
			<select name="pms_account_type" class="form-control js-example-basic-single is-valid">
				<option value="" selected="">Select</option>
				<option value="SAAS" >Noray Cloud</option>
				<option value="ON_PREMISE" >ON_PREMISE</option>
			</select>
		</div>
	</div>


	<div class="form-noray noray_cloud d-none">
		<div class="form-fields">
		<div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'Client id', 'chekin2020' ).'</label><input type="text" data-testid="input" name="client_id" placeholder="'.__( 'Enter client id', 'chekin2020' ).'" class="form-control" value="" autocomplete="off"></div> </div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'Client secret', 'chekin2020' ).'</label><input type="text" data-testid="input" name="client_secret" placeholder="'.__( 'Enter client secret', 'chekin2020' ).'" class="form-control" value="" autocomplete="off"></div></div> <div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'Tenant id', 'chekin2020' ).'</label><input type="text" data-testid="input" name="tenant_id" placeholder="'.__( 'Enter tenant id', 'chekin2020' ).'" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'Environment', 'chekin2020' ).'</label><input type="text" data-testid="input" name="environment" placeholder="'.__( 'Enter environment', 'chekin2020' ).'" class="form-control" value="" autocomplete="off"></div></div></div>
	</div>


	<div class="form-noray on_promise d-none">  
		<div class="form-group">
			<div class="sc-qXhiz cvmVKB">
				<label class="sc-pItiW PQBAt">'.__( 'Protocol', 'chekin2020' ).'</label>
				<select name="protocol" class="form-control js-example-basic-single">
					<option value="" selected>'.__( 'Select', 'chekin2020' ).'</option>
					<option value="http">'.__( 'http', 'chekin2020' ).'</option>
					<option value="https">'.__( 'https', 'chekin2020' ).'</option>
				</select>
			</div>
		</div>	  
		<div class="form-group">
            <div class="sc-qXhiz cvmVKB">
                <label class="sc-pItiW PQBAt">'.__( 'IP', 'chekin2020' ).'</label>
                <input type="text" data-testid="input" name="host" placeholder="'.__( 'Enter IP', 'chekin2020' ).'" class="form-control" value="" autocomplete="off">
            </div>
        </div>
        <div class="form-group">
            <div class="sc-qXhiz cvmVKB">
                <label class="sc-pItiW PQBAt">'.__( 'Port', 'chekin2020' ).'</label>
                <input type="text" data-testid="input" name="port" placeholder="'.__( 'Enter Port', 'chekin2020' ).'" class="form-control" value="" autocomplete="off">
            </div>
        </div>
        <div class="form-group">
            <div class="sc-qXhiz cvmVKB">
                <label class="sc-pItiW PQBAt">'.__( 'Business central version', 'chekin2020' ).'</label>
                <input type="text" data-testid="input" name="business_central_version" placeholder="'.__( 'Enter business central version', 'chekin2020' ).'" class="form-control" value="" autocomplete="off">
            </div>
        </div>
		<div class="form-group">
			<div class="sc-qXhiz cvmVKB">
				<label class="sc-pItiW PQBAt">'.__( 'Username', 'chekin2020' ).'</label>
				<input type="text" data-testid="input" name="basic_username" placeholder="'.__( 'Enter username', 'chekin2020' ).'" class="form-control" value="" autocomplete="off">
			</div>
		</div>
		<div class="form-group">
			<div class="sc-qXhiz cvmVKB">
				<label class="sc-pItiW PQBAt">'.__( 'Password', 'chekin2020' ).'</label>
				<input type="text" data-testid="input" name="basic_password" placeholder="'.__( 'Enter Password', 'chekin2020' ).'" class="form-control" value="" autocomplete="off">
			</div>
		</div>
	</div>

		<div class="type-basic-oauth">	
			<div class="form-group">
				<button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">'.__( 'Connect with noray', 'chekin2020' ).'</button>
			</div>
		</div>
        
	
    </div>
</div>
	',
	"logo" => 'https://chekin.com/onboarding/wp-content/uploads/2024/05/Logo-Noray.svg',
	"content" => '<p>'.__( 'Noray is an IT solutions company specialized in business management software for hotels, consultancies as well as small and medium sized companies. Noray implements Microsoft Dynamics NAV, Sharepoint, Business Intelligence, Infrastructure and self-developed solutions.
', 'chekin2020' ).'</p><p><a href="https://www.noray.com" target="_blank">https://www.noray.com</a></p>',
], 

"Sihot"=>[
	"config"=>["path"=>"pms-integrations/sihot", 
				"form_field"=>[
								
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"pms_username"=>"pms_username",
								"pms_password"=>"pms_password",
								//"pms_provider"=>"pms_provider",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							] 
			],
	"form"=>'
		<div class="form-custom form-sihot "><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'Sihot username', 'chekin2020' ).'</label><input type="text" data-testid="input" name="pms_username" placeholder="'.__( 'Enter username', 'chekin2020' ).'" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'Sihot password', 'chekin2020' ).'</label><input type="password" data-testid="input" name="pms_password" placeholder="'.__( 'Password', 'chekin2020' ).'" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">'.__( 'Connect with Sihot', 'chekin2020' ).'</button></div></div></div>
	',
	"logo" => 'https://chekin.com/onboarding/wp-content/uploads/2024/05/sihot.png',
	"content" => '<p>'.__( 'Integrated all-around solution for the single operator or multi-property group. SIHOT is a highly adaptable tool to help you maintain and improve operational efficiency and offers that much extra. This is demonstrated by ergonomic functionalities such as navigating on the room rack or in the sophisticated hyperlinks connecting all of our modules. The development of SIHOT never stops, easily installed live updates via the internet ensure that you are up-to-date at all times.
', 'chekin2020' ). '</p><p><a href="' . __( 'https://sihot.com/en/', 'chekin2020' ) . '" target="_blank">' . __( 'https://sihot.com/en/', 'chekin2020' ) . '</a></p>',
],

"Oracle"=>[
	"config"=>["path"=>"pms-integrations/oracle",
				"form_field"=>[
								"core_email"=> "text-gE8dLd",
								"user_username"=>"user_username",
								"user_password"=>"user_password",
								"base_url" => "base_url",
								"hotels_id"=>"hotels_id",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"phone"=>"field-c2xENTMAvcqpurK-intl",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-oracle"><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'User username', 'chekin2020' ).'</label><input type="text" data-testid="input" name="user_username" placeholder="'.__( 'Enter user username', 'chekin2020' ).'" class="form-control" value=""></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'User password', 'chekin2020' ).' </label><input type="text" data-testid="input" name="user_password" placeholder="'.__( 'Enter user password', 'chekin2020' ).'" class="form-control" value=""></div></div>
		
		<div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'Gateaway URL', 'chekin2020' ).' </label><input type="text" data-testid="input" name="base_url" placeholder="'.__( 'Enter gateaway URL"', 'chekin2020' ).'" class="form-control" value=""></div></div>
		
		<div class="multi-field-wrapper"> <div class="multi-fields"><div class="form-group hotels_id multi-field"><div class="sc-qXhiz cvmVKB field"><label class="sc-pItiW PQBAt">'.__( 'Hotels id', 'chekin2020' ).'</label><input type="text" data-testid="input" name="hotels_id[]" placeholder="'.__( 'Enter hotel id', 'chekin2020' ).'" class="form-control" value=""></div><a href="javascript:void(0)" class="remove-field">X</a></div></div><p class=" mt-0 mb-0"><a class="add-field" href="javascript:void(0)">'.__( 'Add field', 'chekin2020' ).'</a></p></div></div>
		
		<div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">'.__( 'Connect with Oracle', 'chekin2020' ).'</button></div></div></div>
	',
	
], 
"RENTALWISE"=>[
	"config"=>["path"=>"pms-integrations/rentalwise",
				"form_field"=>[
								//"core_email"=> "text-gE8dLd",
					
								"api_key"=>"api_key",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								//"phone"=>"field-c2xENTMAvcqpurK-intl",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-rentalwise"><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'API key', 'chekin2020' ).'</label><input type="text" data-testid="input" name="api_key" placeholder="'.__( 'Enter API key', 'chekin2020' ).'" class="form-control" value=""></div></div
		
	
		
		<div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">'.__( 'Connect with Rentalwise', 'chekin2020' ).'</button></div></div></div>
	',
	"logo" => 'https://chekin.com/onboarding/wp-content/uploads/2024/08/rentalwise-logo-dark.svg',
	"contentTitle" =>__( 'How to connect Rentalwise with Chekin?', 'chekin2020' ),
	//"contentVideo" => '<iframe width="560" height="315" data-src="https://www.youtube.com/embed/4_pz38vRROM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
	"content" => '<p>'.__( 'RentalWise is an all-in-one vacation rental management platform designed to simplify and streamline property management and marketing. Ideal for both first-time owners and experienced managers, it centralizes operations and maximizes revenue through its comprehensive tools.', 'chekin2020' ).'</p><p><a href="'.__( 'https://www.rentalwise.com/', 'chekin2020' ).'" target="_blank">'.__( 'https://www.rentalwise.com/', 'chekin2020' ).'</a></p>',
	'pmsName' => 'Rentalwise',
	'benefitsTitle' => __( 'Benefits of integrating Chekin and Rentalwise:', 'chekin2020' ),
	'benefits' => array( 
		__( 'Centralized Property Management: Manage all properties efficiently with an integrated PMS.', 'chekin2020' ),
		__( 'Broad Channel Distribution: Expand your reach with a powerful channel manager.', 'chekin2020' ),
		__( 'Direct Bookings: Increase revenue with a seamless booking engine.', 'chekin2020' ),
		__( 'Unified Communication: Streamline guest interactions with a unified inbox.', 'chekin2020' ),
		__( 'Easy Payment Processing: Simplify transactions with integrated payment solutions.', 'chekin2020' ),
		__( 'Owner Portal: Provide property owners with real-time access and insights.', 'chekin2020' ),
		__( 'Automated Notifications: Save time with automatic alerts and reminders.', 'chekin2020' ),
		__( 'Optimized Revenue: Maximize earnings through advanced revenue management tools.', 'chekin2020' ),
		__( 'Customizable Website: Generate a professional website with ease.', 'chekin2020' ),
		__( 'Flexible Integration: Enhance functionality with API integration.', 'chekin2020' ),
	), 
], 
"IGMS"=>[
	"config"=>["path"=>"pms-integrations/igms",
		"form_field"=>[
						//"access_token"=>"access_token",  
						"core_email"=> "text-gE8dLd",
						"api_key"=> "oauth_code",
						"subscription_type"=>"field-aD7ucdKDH7uqiq3",
						"email"=> "text-gE8dLd",
						//"email"=>"email",
						"password"=>"text-1hJwzr",
						"phone"=>"field-c2xENTMAvcqpurK-intl",
						//"password"=>"api_password",
						//"access_token"=>"access_token",
						"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
					]
	],
	"form"=>'
		<div class="form-custom form-igms "><div class="form-fields"><div class="form-group screen-reader-text"><div class="sc-qXhiz cvmVKB"><div class="sc-pItiW PQBAt">Email</div><input type="text" data-testid="input" name="email" id="email-oauth" placeholder="Enter your email" class="form-control" value=""></div></div><div class="is-oauth screen-reader-text"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Password </label><input type="password" data-testid="input" name="api_password" placeholder="Enter Password" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Confirm Password</label><input type="password" data-testid="input" name="api_password_confirm" placeholder="Confirm Password" class="form-control" value="" autocomplete="off"></div></div></div><div class="form-group"><button type="button" class="sc-jybekq kCpsjP custom-sync_0 btn-oauth" role="">'.__( 'Connect with IGMS', 'chekin2020' ).'</button></div></div></div>
	',
	"logo" => 'https://chekin.com/onboarding/wp-content/uploads/2024/09/igms.svg',
	 
],
"Hotelizer"=>[
    "config"=>["path"=>"pms-integrations/hotelizer",
                "form_field"=>[
								"user_username"=>"user_username",
								"user_password"=>"user_password",
                                "email"=> "text-gE8dLd",
								"core_email"=> "text-gE8dLd",
                                "password"=>"text-1hJwzr",
                                "phone"=>"field-c2xENTMAvcqpurK-intl",
                                "estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
                            ]
            ],
    "form"=>'
        <div class="form-custom form-hotelizer"><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'Hotelizer Username', 'chekin2020' ).'</label><input type="text" data-testid="input" name="user_username" placeholder="'.__( 'Enter Username', 'chekin2020' ).'" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'Hotelizer Password', 'chekin2020' ).'</label><input type="text" data-testid="input" name="user_password" placeholder="'.__( 'Enter Password', 'chekin2020' ).'" class="form-control" value=""></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">'.__( 'Connect with Hotelizer', 'chekin2020' ).'</button></div></div></div>
    ',

    "logo" => 'https://chekin.com/onboarding/wp-content/uploads/2024/09/hotelizer-full-c8bb6d84.svg',

],
"Hospitable"=>[
	"config"=>["path"=>"pms-integrations/hospitable",
				"form_field"=>[
								//"access_token"=>"access_token",  
								//"core_email"=> "text-gE8dLd",
								"access_token"=> "oauth_code",
								"subscription_type"=>"field-aD7ucdKDH7uqiq3",
								"email"=> "text-gE8dLd",
								//"email"=>"email",
								"password"=>"text-1hJwzr",
								"phone"=>"field-c2xENTMAvcqpurK-intl",
								//"password"=>"api_password",
								//"access_token"=>"access_token",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	
	"form"=>'
		<div class="form-custom form-hospitable "><div class="form-fields"><input type="hidden" data-testid="input" name="access_token" placeholder="Access Token" class="form-control is-valid" value="" autocomplete="off"<div class="form-group"><button type="button" class="sc-jybekq kCpsjP custom-sync_0 btn-oauth" role="">'.__( 'Connect with Hospitable', 'chekin2020' ).'</button></div></div></div>
	',
 
	"contentTitle" =>__( 'How to connect Hospitable with Chekin?', 'chekin2020' ),
	//"contentVideo" => '<iframe width="560" height="315" src="https://www.youtube.com/embed/94jP83HUIdI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
	//"content" => '<p>'.__( 'BookingSync is a Property management software for all short-term rentals managers which is already trusted by exceptional vacation rental management companies', 'chekin2020' ).'</p><p><a href="https://www.bookingsync.com" target="_blank">https://www.bookingsync.com</a></p>',
	
],

"Avalon"=>[
    "config"=>["path"=>"pms-integrations/avalon",
                "form_field"=>[
								"x_api_key"=>"x_api_key",
								"base_url"=>"base_url",
								"hotel_name" => "hotel_name",
                                "email"=> "text-gE8dLd",
								"core_email"=> "text-gE8dLd",
                                "password"=>"text-1hJwzr",
                                "phone"=>"field-c2xENTMAvcqpurK-intl",
                                "estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
                            ]
            ],
    "form"=>'
        <div class="form-custom form-avalon"><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'X API Key', 'chekin2020' ).'</label><input type="text" data-testid="input" name="x_api_key" placeholder="'.__( 'Enter API Key', 'chekin2020' ).'" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'Base URL', 'chekin2020' ).'</label><input type="text" data-testid="input" name="base_url" placeholder="'.__( 'Enter base url', 'chekin2020' ).'" class="form-control" value=""></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'Hotel name', 'chekin2020' ).'</label><input type="text" data-testid="input" name="hotel_name" placeholder="'.__( 'Enter hotel name', 'chekin2020' ).'" class="form-control" value=""></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">'.__( 'Connect with Avalon', 'chekin2020' ).'</button></div></div></div>
    ',

   

],
"FRONT2GO"=>[
    "config"=>["path"=>"pms-integrations/front2go",
                "form_field"=>[
								"host"=>"host",
								"chain_id"=>"chain_id",
								"user_password" => "user_password",
								"email"=> "text-gE8dLd",
								"core_email"=> "text-gE8dLd",
                                "password"=>"text-1hJwzr",
                                "phone"=>"field-c2xENTMAvcqpurK-intl",
                                "estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
                            ]
            ],
    "form"=>'
        <div class="form-custom form-front2go"><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'Host', 'chekin2020' ).'</label><input type="text" data-testid="input" name="host" placeholder="'.__( 'Enter host', 'chekin2020' ).'" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'Chain ID', 'chekin2020' ).'</label><input type="text" data-testid="input" name="chain_id" placeholder="'.__( 'Enter chain id', 'chekin2020' ).'" class="form-control" value=""></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">'.__( 'User password', 'chekin2020' ).'</label><input type="password" data-testid="input" name="user_password" placeholder="'.__( 'Enter user password', 'chekin2020' ).'" class="form-control" value=""></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">'.__( 'Connect with Front2Go', 'chekin2020' ).'</button></div></div></div>
    ',



], 



];
return $forms;
}

// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );




add_filter( 'rocket_defer_inline_exclusions', function( $inline_exclusions_list ) {
	$inline_exclusions_list[] = 'inline_exclusions_list_1';
	$inline_exclusions_list[] = 'inline_exclusions_list_2';
	$inline_exclusions_list[] = 'inline_exclusions_list_3';
	$inline_exclusions_list[] = 'inline_exclusions_list_hdr_1';
	$inline_exclusions_list[] = 'inline_exclusions_list_hdr_2';
	$inline_exclusions_list[] = 'inline_exclusions_list_hdr_3';
	return $inline_exclusions_list;
} );

 
// Removing Yoast Generated Canonical URLs
add_filter( 'wpseo_canonical', '__return_false' );



//Sitemap for Spanish only
//https://cambodesign.com/yoast-wordpress-seo-sitemap-for-each-language/
/*
if (isset($sitepress)) add_filter('wpseo_posts_join', 'sitemap_per_language', 10, 2);
function sitemap_per_language($join, $type) {
global $wpdb, $sitepress;
//$lang = $sitepress->get_current_language();
$lang = 'es';
return " JOIN " . $wpdb->prefix . "icl_translations ON element_id = ID AND element_type = 'post_$type' AND language_code = '$lang'";
}
*/

if (isset($sitepress)) add_filter('wpseo_posts_join', 'sitemap_per_language', 10, 2);
function sitemap_per_language($join, $type) {
    global $wpdb, $sitepress;
    $lang = $sitepress->get_current_language();
    return " JOIN " . $wpdb->prefix . "icl_translations ON element_id = ID AND element_type = 'post_$type' AND language_code = '$lang'";
}

//remove x-default e.g: <link rel="alternate" hreflang="x-default" href="https://chekin.com" />
add_filter( 'wpml_hreflangs', 'unsetXdefault' );
function unsetXdefault ($hreflangs){
    foreach ($hreflangs as $key => $lang)
    {
        if ($key == "x-default"){
            unset ($hreflangs[$key]);
        }
    }
    return $hreflangs;
}
