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

	global $template;
	if ( basename( $template ) !== 'new.php' ) {

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


	global $template;

	if ( basename( $template ) !== 'new.php' ) {

		$theme_version = wp_get_theme()->get( 'Version' );
		//wp_enqueue_style( 'font-awesome-style', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css', array(), $theme_version );
		wp_enqueue_style( 'slick-style', get_template_directory_uri().'/assets/slick/slick.css', array(), $theme_version );
		wp_enqueue_style( 'slick-theme-style', get_template_directory_uri().'/assets/slick/slick-theme.css', array(), $theme_version );
		wp_enqueue_style( 'fancybox-style', get_template_directory_uri().'/assets/fancybox/jquery.fancybox.min.css', array(), $theme_version );
		wp_enqueue_style( 'chekin2020-style', get_stylesheet_uri(), array(), time() );
		wp_style_add_data( 'chekin2020-style', 'rtl', 'replace' );

		// Add output of Customizer settings as inline style.
		wp_add_inline_style( 'chekin2020-style', chekin2020_get_customizer_css( 'front-end' ) );

		// Add print CSS.
		//wp_enqueue_style( 'chekin2020-print-style', get_template_directory_uri() . '/print.css', null, $theme_version, 'print' );
	}
}

add_action( 'wp_enqueue_scripts', 'chekin2020_register_styles' );

/**
 * Register and Enqueue Scripts.
 */
function chekin2020_register_scripts() {

	global $template;

	if ( basename( $template ) !== 'new.php' ) {

		$theme_version = wp_get_theme()->get( 'Version' );

		if ( ( ! is_admin() ) && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		wp_enqueue_script( 'slick-carousel', get_template_directory_uri().'/assets/slick/slick.min.js', array('jquery'), $theme_version, true );
		wp_enqueue_script( 'fancybox-carousel', get_template_directory_uri().'/assets/fancybox/jquery.fancybox.min.js', array('jquery'), $theme_version, true );
		wp_enqueue_script( 'sticky-js', 'https://cdnjs.cloudflare.com/ajax/libs/sticky-js/1.3.0/sticky.min.js', array(), 0, true );
		wp_enqueue_script( 'chekin2020-js', get_template_directory_uri() . '/assets/js/index.js', array(), '1.0.1', true );
		wp_script_add_data( 'chekin2020-js', 'async', true );

	}

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
	global $template;
	if ( basename( $template ) !== 'new.php' ) {
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
	}
}
add_action( 'wp_print_footer_scripts', 'chekin2020_skip_link_focus_fix' );

/** Enqueue non-latin language styles
 *
 * @since Chekin 2020 1.0
 *
 * @return void
 */
function chekin2020_non_latin_languages() {

	global $template;

		if ( basename( $template ) !== 'new.php' ) {

		$custom_css = chekin2020_Non_Latin_Languages::get_non_latin_css( 'front-end' );

		if ( $custom_css ) {
			wp_add_inline_style( 'chekin2020-style', $custom_css );
		}
	}
}

add_action( 'wp_enqueue_scripts', 'chekin2020_non_latin_languages' );

/**
 * Register navigation menus uses wp_nav_menu in five places.
 */
function chekin2020_menus() {
	global $template;
	if ( basename( $template ) !== 'new.php' ) {
	$locations = array(
		'primary'  => __( 'Desktop Horizontal Menu', 'chekin2020' ),
		'expanded' => __( 'Desktop Expanded Menu', 'chekin2020' ),
		'mobile'   => __( 'Mobile Menu', 'chekin2020' ),
		'footer'   => __( 'Footer Menu', 'chekin2020' ),
		'social'   => __( 'Social Menu', 'chekin2020' ),
		'language'   => __( 'Language Menu', 'chekin2020' ),
		'cta'   => __( 'CTA Menu', 'chekin2020' ),
		'main'   => __( 'Main Menu', 'chekin2020' ),
	);

	register_nav_menus( $locations );
	}
}

add_action( 'init', 'chekin2020_menus' );

/**
 * Get the information about the logo.
 *
 * @param string $html The HTML output from get_custom_logo (core function).
 * @return string
 */
function chekin2020_get_custom_logo( $html ) {
	global $template;
	if ( basename( $template ) !== 'new.php' ) {
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
}

add_filter( 'get_custom_logo', 'chekin2020_get_custom_logo' );

if ( ! function_exists( 'wp_body_open' ) ) {
	global $template;
	if ( basename( $template ) !== 'new.php' ) {
	/**
	 * Shim for wp_body_open, ensuring backward compatibility with versions of WordPress older than 5.2.
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
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
	global $template;
	if ( basename( $template ) !== 'new.php' ) {
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
	// Footer Disclaimer
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer Disclaimer', 'chekin2020' ),
				'id'          => 'sidebar-9',
				'description' => __( 'Widgets in this area will be displayed at the Footer Disclaimer', 'chekin2020' ),
			)
		)
	);	
		
	}
}

add_action( 'widgets_init', 'chekin2020_sidebar_registration' );

/**
 * Enqueue supplemental block editor styles.
 */
function chekin2020_block_editor_styles() {

	global $template;

	if ( basename( $template ) !== 'new.php' ) {

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
}

add_action( 'enqueue_block_editor_assets', 'chekin2020_block_editor_styles', 1, 1 );

/**
 * Enqueue classic editor styles.
 */
function chekin2020_classic_editor_styles() {
	global $template;
	if ( basename( $template ) !== 'new.php' ) {
	$classic_editor_styles = array(
		'/assets/css/editor-style-classic.css',
	);

	add_editor_style( $classic_editor_styles );
	}
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
	global $template;
	if ( basename( $template ) !== 'new.php' ) {
	$styles = chekin2020_get_customizer_css( 'classic-editor' );

	if ( ! isset( $mce_init['content_style'] ) ) {
		$mce_init['content_style'] = $styles . ' ';
	} else {
		$mce_init['content_style'] .= ' ' . $styles . ' ';
	}

	return $mce_init;
	}
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
	global $template;
	if ( basename( $template ) !== 'new.php' ) {
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
}

add_filter( 'tiny_mce_before_init', 'chekin2020_add_classic_editor_non_latin_styles' );

/**
 * Block Editor Settings.
 * Add custom colors and font sizes to the block editor.
 */
function chekin2020_block_editor_settings() {
	global $template;
	if ( basename( $template ) !== 'new.php' ) {
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
}

add_action( 'after_setup_theme', 'chekin2020_block_editor_settings' );

/**
 * Overwrite default more tag with styling and screen reader markup.
 *
 * @param string $html The default output HTML for the more tag.
 * @return string
 */
function chekin2020_read_more_tag( $html ) {
	global $template;
	if ( basename( $template ) !== 'new.php' ) {
	return preg_replace( '/<a(.*)>(.*)<\/a>/iU', sprintf( '<div class="read-more-button-wrap"><a$1><span class="faux-button">$2</span> <span class="screen-reader-text">"%1$s"</span></a></div>', get_the_title( get_the_ID() ) ), $html );
	}
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

	global $template;

		if ( basename( $template ) !== 'new.php' ) {
		$theme_version = wp_get_theme()->get( 'Version' );

		// Add main customizer js file.
		wp_enqueue_script( 'chekin2020-customize', get_template_directory_uri() . '/assets/js/customize.js', array( 'jquery' ), $theme_version, false );

		// Add script for color calculations.
		wp_enqueue_script( 'chekin2020-color-calculations', get_template_directory_uri() . '/assets/js/color-calculations.js', array( 'wp-color-picker' ), $theme_version, false );

		// Add script for controls.
		wp_enqueue_script( 'chekin2020-customize-controls', get_template_directory_uri() . '/assets/js/customize-controls.js', array( 'chekin2020-color-calculations', 'customize-controls', 'underscore', 'jquery' ), $theme_version, false );
		wp_localize_script( 'chekin2020-customize-controls', 'chekin2020BgColors', chekin2020_get_customizer_color_vars() );
	}
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

	global $template;

	if ( basename( $template ) !== 'new.php' ) {

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
	global $template;
	if ( basename( $template ) !== 'new.php' ) {
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
}

/**
 * Returns an array of variables for the customizer preview.
 *
 * @since Chekin 2020 1.0
 *
 * @return array
 */
function chekin2020_get_customizer_color_vars() {
	global $template;
	if ( basename( $template ) !== 'new.php' ) {
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
}

/**
 * Get an array of elements.
 *
 * @since Chekin 2020 1.0
 *
 * @return array
 */
function chekin2020_get_elements_array() {
	global $template;
	if ( basename( $template ) !== 'new.php' ) {
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
}

// recent post
function recent_posts_function($atts, $content = null) {

	global $template;
	if ( basename( $template ) !== 'new.php' ) {
	
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

// profitwel
function add_profitwell_script_to_footer() {
    global $template;
	if ( basename( $template ) !== 'new.php' ) {
    $token = "6ed35062c94eb5806ec4e02150641c10";

    $start_options = "{}";
    $current_user = wp_get_current_user();
    if ($current_user->exists()) {
         $start_options = "{user_email: '{$current_user->user_email}'}";
    }
    
    echo "
    <script id='profitwell-js' data-pw-auth='$token'>
        (function(i,s,o,g,r,a,m){i[o]=i[o]||function(){(i[o].q=i[o].q||[]).push(arguments)};
        a=s.createElement(g);m=s.getElementsByTagName(g)[0];a.async=1;a.src=r+'?auth='+
        s.getElementById(o+'-js').getAttribute('data-pw-auth');m.parentNode.insertBefore(a,m);
        })(window,document,'profitwell','script','https://public.profitwell.com/js/profitwell.js');

        profitwell('start', $start_options);
    </script>
    ";
	}
}
add_action('wp_footer', 'add_profitwell_script_to_footer');

// amp
add_action('amp_post_template_css','ampforwp_add_custom_css', 11);
function ampforwp_add_custom_css() { ?>
	/* Add your custom css here */
	#top.amp-wp-header .amp-wp-site-icon {
		border-radius: 6px;
	}
	<?php 
}

//blog first page
function custom_posts_per_page( $query ) {
	if(is_home()){
		if( $query->is_main_query() && (int) get_query_var('paged', 1) <= 1 ) {
			$query->set( 'posts_per_page', '13' );
		   // $query->set( 'offset',  ((int) get_query_var('paged') - 1) * 10 + 10);
		}
	}
}
add_action( 'pre_get_posts', 'custom_posts_per_page' );

// Get Geo Location
function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
	global $template;
	if ( basename( $template ) !== 'new.php' ) {
    $output = NULL;
    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }
    $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
    $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
    $continents = array(
        "AF" => "Africa",
        "AN" => "Antarctica",
        "AS" => "Asia",
        "EU" => "Europe",
        "OC" => "Australia (Oceania)",
        "NA" => "North America",
        "SA" => "South America"
    );
    if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
        if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
            switch ($purpose) {
                case "location":
                    $output = array(
                        "city"           => @$ipdat->geoplugin_city,
                        "state"          => @$ipdat->geoplugin_regionName,
                        "country"        => @$ipdat->geoplugin_countryName,
                        "country_code"   => @$ipdat->geoplugin_countryCode,
                        "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                        "continent_code" => @$ipdat->geoplugin_continentCode
                    );
                    break;
                case "address":
                    $address = array($ipdat->geoplugin_countryName);
                    if (@strlen($ipdat->geoplugin_regionName) >= 1)
                        $address[] = $ipdat->geoplugin_regionName;
                    if (@strlen($ipdat->geoplugin_city) >= 1)
                        $address[] = $ipdat->geoplugin_city;
                    $output = implode(", ", array_reverse($address));
                    break;
                case "city":
                    $output = @$ipdat->geoplugin_city;
                    break;
                case "state":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "region":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "country":
                    $output = @$ipdat->geoplugin_countryName;
                    break;
                case "countrycode":
                    $output = @$ipdat->geoplugin_countryCode;
                    break;
            }
        }
    }
    return $output;
	}
}
/*
echo ip_info("Visitor", "Country"); // India
echo ip_info("Visitor", "Country Code"); // IN
echo ip_info("Visitor", "State"); // Andhra Pradesh
echo ip_info("Visitor", "City"); // Proddatur
echo ip_info("Visitor", "Address"); // Proddatur, Andhra Pradesh, India

print_r(ip_info("Visitor", "Location")); // Array ( [city] => Proddatur [state] => Andhra Pradesh [country] => India [country_code] => IN [continent] => Asia [continent_code] => AS )
*/

/* call ajax
jQuery.get(ajaxurl,{'action': 'getip'}, function (current_ip) { 
	alert(current_ip);
});

*/
add_action('wp_ajax_nopriv_getip', 'getip_function');
add_action('wp_ajax_getip', 'getip_function');
function getip_function(){
	//echo 'hello';
	//echo ip_info("Visitor", "Country");
	echo ip_info("Visitor", "Country Code");
	exit();
}

// Additional Code

$request_uri = parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH );

$is_admin = strpos( $request_uri, '/wp-admin/' );

if( false === $is_admin ){
	add_filter( 'option_active_plugins', function( $plugins ){

		global $request_uri;

		$myplugins = array( 
			'sitepress-multilingual-cms/sitepress.php',
			'wp-seo-multilingual/plugin.php',
			'a3-lazy-load/a3-lazy-load.php',
			'acf-option-pages/acf-option-pages.php',
			'acfml/wpml-acf.php',
			'advanced-custom-fields-pro/acf.php',
			'akismet/akismet.php',
			'amp/amp.php',
			'autoptimize/autoptimize.php',
			'contact-form-7-multilingual/plugin.php',
			'contact-form-7/wp-contact-form-7.php',
			'cookie-notice/cookie-notice.php',
			'drift/drift.php',
			'duplicate-post/duplicate-post.php',
			'export-all-urls/extract-all-urls.php',
			'hotjar/hotjar.php',
			'mailjet-for-wordpress/wp-mailjet.php',
			'poptin/poptin.php',
			'really-simple-ssl/rlrsssl-really-simple-ssl.php',
			'redirection/redirection.php',
			'related-post/related-post.php',
			'safe-svg/safe-svg.php',
			'slide-anything/slide-anything.php',
			'types/wpcf.php',
			'w3-total-cache/w3-total-cache.php',
			'whp-hide-posts/whp-hide-posts.php',
			'widget-css-classes/widget-css-classes.php',
			'wordfence/wordfence.php',
			'wordpress-importer/wordpress-importer.php',
			'wordpress-seo/wp-seo.php',
			'wp-mail-smtp/wp_mail_smtp.php',
			'wp-postviews/wp-postviews.php',
			'wpml-media-translation/plugin.php',
			'wpml-string-translation/plugin.php',
			'wpml-translation-management/plugin.php',
			'wps-hide-login/wps-hide-login.php',
		);

		
		global $template;

		if ( basename( $template ) === 'new.php' ) {

			$plugins = array_diff( $plugins, $myplugins );
		}

		return $plugins;

	} );
}

// add_shortcode( 'activeplugins', function(){
	
// 	$active_plugins = get_option( 'active_plugins' );
// 	$plugins = "";
// 	if( count( $active_plugins ) > 0 ){
// 		$plugins = "<ul>";
// 		foreach ( $active_plugins as $plugin ) {
// 			$plugins .= "<li>" . $plugin . "</li>";
// 		}
// 		$plugins .= "</ul>";
// 	}
// 	return $plugins;
// });

// function chekin_session(){
//   if( !session_id() ){
//   	ini_set('session.gc_maxlifetime', 0);
// 	session_set_cookie_params(0);
//   	session_start();
//   }
// }

// add_action('init', 'chekin_session');

// global $wp;
// $page_permalink =  home_url( $wp->request );
// echo apply_filters( 'wpml_permalink', $page_permalink, 'en', true );



/* hotjar */

function hook_hotjar() {  ?>
	<?php if(is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) { ?>
		
		<!-- Hotjar Tracking Code for Corp Web Blog --> 
		<script> (function(h,o,t,j,a,r){ h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)}; h._hjSettings={hjid:2824840,hjsv:6}; a=o.getElementsByTagName('head')[0]; r=o.createElement('script');r.async=1; r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv; a.appendChild(r); })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv='); </script>
	 
    
	<?php } elseif(is_page(icl_object_id(25582, 'page', true))) { ?>
		
		<!-- Hotjar Tracking Code for Corp web integraciones --> 
		<script> (function(h,o,t,j,a,r){ h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)}; h._hjSettings={hjid:2824838,hjsv:6}; a=o.getElementsByTagName('head')[0]; r=o.createElement('script');r.async=1; r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv; a.appendChild(r); })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv='); </script>
			
	
	<?php } elseif(is_page(icl_object_id(23966, 'page', true)) ) { ?>
	
		<!-- Hotjar Tracking Code for Corp web pricing --> 
		<script> (function(h,o,t,j,a,r){ h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)}; h._hjSettings={hjid:2824836,hjsv:6}; a=o.getElementsByTagName('head')[0]; r=o.createElement('script');r.async=1; r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv; a.appendChild(r); })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv='); </script>
	
	<?php }else { ?>
		
		<!-- Hotjar Tracking Code for Corporate web General --> 
		<script> (function(h,o,t,j,a,r){ h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)}; h._hjSettings={hjid:2787037,hjsv:6}; a=o.getElementsByTagName('head')[0]; r=o.createElement('script');r.async=1; r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv; a.appendChild(r); })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv='); </script>
	<?php } ?>
	
	<?php
}
//add_action('wp_head', 'hook_hotjar'); // Hotjar we can uninstall it since we are using Clarity now



// Get LiveStorm Events
function liveStormEvents(){
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, 'https://api.livestorm.co/v1/events');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


	$headers = array();
	$headers[] = 'Accept: application/vnd.api+json';
	$headers[] = 'Authorization: eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJhcGkubGl2ZXN0b3JtLmNvIiwianRpIjoiYjQ2ZjZiNWUtNzgxYy00MGIyLWFiNDItNTc1M2FlMWIxMzczIiwiaWF0IjoxNjQ1NjExOTQ5LCJvcmciOiI1MjZlZGMwOC0zMzVhLTQ1OWEtYThlNy0zZWNjODM1M2RhOTcifQ.laIBiLqadZVwn87i5_mABfTWgRcNHDZ5SBNh1lHiN-8';
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	$result = curl_exec($ch);
	if (curl_errno($ch)) {
		echo 'Error:' . curl_error($ch);
	}
	curl_close($ch);

	return $result;

}
add_action('wp_ajax_nopriv_liveStormEvents', 'liveStormEvents_function');
add_action('wp_ajax_liveStormEvents', 'liveStormEvents_function');
function liveStormEvents_function(){
	//echo 'hello';
	echo liveStormEvents();
	exit();
}

// livestormevents
function listlivestormevents_function($atts, $content = null) {


	
	
	
	extract(shortcode_atts(array(
		'lang'     => 'es',
	), $atts));
	
	$output = '<ul class="events-nav"><li class="active"><a href="#all">'.__( 'All demos', 'chekin2020' ).'</a></li><li><a href="#live-demo">'.__( 'Live demos', 'chekin2020' ).'</a></li><li><a href="#on-demand">'.__( 'On-demand demos', 'chekin2020' ).'</a></li></ul>';
	
	$output .= '<div id="livestorm" class="events" lang="'.$lang.'"><div class="wp-block-group__inner-container">';
		$output .= '<div class="wp-block-image"><figure class="aligncenter size-full"><img width="218" height="149" src="'.site_url().'/wp-content/uploads/2022/02/ajax-loading-icon-16.gif" alt=""></figure></div>';	
	$output .= '</div></div>';

	return  $output ;
	
	
} 
add_shortcode('listlivestormevents', 'listlivestormevents_function');


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

// Disable WordPress default lazyload for all images
//add_filter( 'wp_lazy_loading_enabled', '__return_false' );

/* Disable lazy loading for single image* */
// https://chekin.com/wp-content/uploads/2023/04/header-23.png
function no_lazy_load_id_43738( $value, $image, $context ) {
	if ( 'the_content' === $context ) {
	$image_url = wp_get_attachment_image_url( 43738, 'full' ); 
		if ( false !== strpos( $image, ' src="' . $image_url . '"' )) {
		return false;
	}
	}
	return $value;
}
//add_filter( 'wp_img_tag_add_loading_attr', 'no_lazy_load_id_43738', 43738, 43738 );


/*How to selectively disable lazy load*/
// https://wphelp.blog/how-to-selectively-disable-lazy-load/

//Without plugins
/* Remove lazy load first image */
function not_lazy_lcp_image($content){
	if ( is_single() || is_page() || is_front_page() || is_home() ) {
		$content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
		$document = new DOMDocument();
		libxml_use_internal_errors(true);
		$document->loadHTML(utf8_decode($content));
		$imgs = $document->getElementsByTagName('img');
		/*
		$img = $imgs[0];
		if ($imgs[0] == 1) { // Check first if it is the first image
			$img->removeAttribute( 'loading' );
			$html = $document->saveHTML();
			return $html;
		}else {
			return $content;
		}*/

		 // Check if the first image element exists
		 if ($imgs->length > 0) {
            $img = $imgs->item(0); // Get the first image element
            $img->removeAttribute('loading');
            $html = $document->saveHTML();
            return $html;
        } else {
            return $content;
        }
		
	}else {
		return $content;
	}
}
	add_filter ('the_content', 'not_lazy_lcp_image');


add_filter( 'rocket_defer_inline_exclusions', function( $inline_exclusions_list ) {
	$inline_exclusions_list[] = 'currentCountryCodeJs';
	return $inline_exclusions_list;
} );






// Hook into 'the_content' to process the related post URLs when the content is displayed on single posts
add_filter('the_content', 'remove_query_params_from_related_post_urls');

function remove_query_params_from_related_post_urls($content) {
    if (is_single()) {
        // Use DOMDocument to parse the HTML content
        $dom = new DOMDocument();
        @$dom->loadHTML($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        // Find all anchor tags
        $links = $dom->getElementsByTagName('a');
        
        // Loop through each link
        foreach ($links as $link) {
            // Get the href attribute
            $href = $link->getAttribute('href');
            
            // Parse the URL and remove query parameters
            $parsed_url = parse_url($href);
            $clean_url = $parsed_url['scheme'] . '://' . $parsed_url['host'] . $parsed_url['path'];
            
            // Set the new URL without query parameters
            $link->setAttribute('href', $clean_url);
        }

        // Save the updated content
        $content = $dom->saveHTML();
    }

    return $content;
}

//Redirect all paes of chekin.io to chekin.com
function custom_wildcard_redirect() {
    // Check if the current host is chekin.io or www.chekin.io
    if ( $_SERVER['HTTP_HOST'] == 'chekin.io' || $_SERVER['HTTP_HOST'] == 'www.chekin.io' ) {
        // Get the current URL path after the domain
        $requested_url = $_SERVER['REQUEST_URI'];

        // Set the new domain
        $new_domain = 'https://chekin.com';

        // Perform the redirect
        wp_redirect( $new_domain . $requested_url, 301 );
        exit();
    }
}
add_action( 'template_redirect', 'custom_wildcard_redirect' );

//disable plugin update for Advanced Custom Fields PRO

add_filter('site_transient_update_plugins', 'chekin_remove_update_nag');
function chekin_remove_update_nag($value) {
 unset($value->response[ 'advanced-custom-fields-pro/acf.php' ]);
 return $value;
}