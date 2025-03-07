<?php
define( 'WP_CACHE', true ); // Added by WP Rocket

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', getenv('DB_NAME') );

/** MySQL database username */
define( 'DB_USER', getenv('DB_USER') );

/** MySQL database password */
define( 'DB_PASSWORD', getenv('DB_PASSWORD') );

/** MySQL hostname */
define( 'DB_HOST', getenv('DB_HOST') );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '`|3!Keta*;p~,K;Mm]X+zRtU $rAD*:_X06}TPW60_RJJFQb]aU>l5Oq{?w*,sN8' );
define( 'SECURE_AUTH_KEY',  'a@AQ;5r<49c#9J8lHKCII[tx<Chw::i2|(G]2@x[t&,@.=>m^rcL%=(n5^$bng6e' );
define( 'LOGGED_IN_KEY',    'kjrysmZU6)=V2KAsuXMnbxfqESL{EMPCb?1k5{[x:!8;i3_?*9C%G//S76}qHl=F' );
define( 'NONCE_KEY',        'mD8*2~_pCKqz&Ui4+*&yTz;eIhDSoNQxpKD8~dSMe6M.bC8+r^Og@m<Z5k=dZre(' );
define( 'AUTH_SALT',        'd#2ig 9Tq+$hebrVS~_1q?(tcP&5S;L$;|_Ek}(l5Vm|jOr!P)9@VWWao5+P$a|)' );
define( 'SECURE_AUTH_SALT', 'wmy;GlDPn$MfeDpt( 7Zxr}u9|bo~.g`#p(Ko)[|R<xU_!@JZV$thj2G[?zDzZc1' );
define( 'LOGGED_IN_SALT',   'jI]t/:`+_r6d(Fx3TzpjF-{+|i{U@/N7xa+wY]4KGZ|vwf[Z+>[YYtYHGwik2Tpt' );
define( 'NONCE_SALT',       'P4tiF<u#K%Llrs;d#;3fx]<tBWz=VK4e8&:rE=!iJpU~Fd5BD*2a00l!KL%BuLJ0' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
