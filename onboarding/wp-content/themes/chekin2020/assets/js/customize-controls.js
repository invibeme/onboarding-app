/* global chekin2020BgColors, chekin2020Color, jQuery, wp, _ */
/**
 * Customizer enhancements for a better user experience.
 *
 * Contains extra logic for our Customizer controls & settings.
 *
 * @since Chekin 2020 1.0
 */

( function() {
	// Wait until the customizer has finished loading.
	wp.customize.bind( 'ready', function() {
		// Add a listener for accent-color changes.
		wp.customize( 'accent_hue', function( value ) {
			value.bind( function( to ) {
				// Update the value for our accessible colors for all areas.
				Object.keys( chekin2020BgColors ).forEach( function( context ) {
					var backgroundColorValue;
					if ( chekin2020BgColors[ context ].color ) {
						backgroundColorValue = chekin2020BgColors[ context ].color;
					} else {
						backgroundColorValue = wp.customize( chekin2020BgColors[ context ].setting ).get();
					}
					chekin2020SetAccessibleColorsValue( context, backgroundColorValue, to );
				} );
			} );
		} );

		// Add a listener for background-color changes.
		Object.keys( chekin2020BgColors ).forEach( function( context ) {
			wp.customize( chekin2020BgColors[ context ].setting, function( value ) {
				value.bind( function( to ) {
					// Update the value for our accessible colors for this area.
					chekin2020SetAccessibleColorsValue( context, to, wp.customize( 'accent_hue' ).get(), to );
				} );
			} );
		} );

		// Show or hide retina_logo setting on the first load.
		chekin2020SetRetineLogoVisibility( !! wp.customize( 'custom_logo' )() );

		// Add a listener for custom_logo changes.
		wp.customize( 'custom_logo', function( value ) {
			value.bind( function( to ) {
				// Show or hide retina_logo setting on changing custom_logo.
				chekin2020SetRetineLogoVisibility( !! to );
			} );
		} );
	} );

	/**
	 * Updates the value of the "accent_accessible_colors" setting.
	 *
	 * @since Chekin 2020 1.0
	 *
	 * @param {string} context The area for which we want to get colors. Can be for example "content", "header" etc.
	 * @param {string} backgroundColor The background color (HEX value).
	 * @param {number} accentHue Numeric representation of the selected hue (0 - 359).
	 *
	 * @return {void}
	 */
	function chekin2020SetAccessibleColorsValue( context, backgroundColor, accentHue ) {
		var value, colors;

		// Get the current value for our accessible colors, and make sure it's an object.
		value = wp.customize( 'accent_accessible_colors' ).get();
		value = ( _.isObject( value ) && ! _.isArray( value ) ) ? value : {};

		// Get accessible colors for the defined background-color and hue.
		colors = chekin2020Color( backgroundColor, accentHue );

		// Sanity check.
		if ( colors.getAccentColor() && 'function' === typeof colors.getAccentColor().toCSS ) {
			// Update the value for this context.
			value[ context ] = {
				text: colors.getTextColor(),
				accent: colors.getAccentColor().toCSS(),
				background: backgroundColor
			};

			// Get borders color.
			value[ context ].borders = colors.bgColorObj
				.clone()
				.getReadableContrastingColor( colors.bgColorObj, 1.36 )
				.toCSS();

			// Get secondary color.
			value[ context ].secondary = colors.bgColorObj
				.clone()
				.getReadableContrastingColor( colors.bgColorObj )
				.s( colors.bgColorObj.s() / 2 )
				.toCSS();
		}

		// Change the value.
		wp.customize( 'accent_accessible_colors' ).set( value );

		// Small hack to save the option.
		wp.customize( 'accent_accessible_colors' )._dirty = true;
	}

	/**
	 * Shows or hides the "retina_logo" setting based on the given value.
	 *
	 * @since Chekin 2020 1.3
	 *
	 * @param {boolean} visible The visible value.
	 *
	 * @return {void}
	 */
	function chekin2020SetRetineLogoVisibility( visible ) {
		wp.customize.control( 'retina_logo' ).container.toggle( visible );
	}
}( jQuery ) );
