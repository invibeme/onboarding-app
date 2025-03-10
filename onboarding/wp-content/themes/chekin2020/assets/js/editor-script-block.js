/**
 * Remove squared button style
 *
 * @since Chekin 2020 1.0
 */
/* global wp */
wp.domReady( function() {
	wp.blocks.unregisterBlockStyle( 'core/button', 'squared' );
} );
