<?php
define( 'WP_CACHE', true ); // Added by WP Rocket

//Begin Really Simple SSL key
//define('RSSSL_KEY', 'feMEH8exkBOJpHPtDQnLofFwQtqg8O1TZGjUZ0oYf2E0WsIDCBYsF8R6CGI6IKMh');
//END Really Simple SSL key
/** Enable W3 Total Cache */
//Begin Really Simple SSL session cookie settings
#@ini_set('session.cookie_httponly', true);
//ini_set('session.cookie_secure', true);
//ini_set('session.use_only_cookies', true);
//END Really Simple SSL
/** Enable W3 Total Cache */
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
define( 'DB_NAME', 'chekin_com_2020' );
/** MySQL database username */
define( 'DB_USER', 'root' );
/** MySQL database password */
define( 'DB_PASSWORD', 'root' );
/** MySQL hostname */
define( 'DB_HOST', 'localhost' );
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
define( 'AUTH_KEY',         '+!O-rLm@P=)7WURXz:6#pWj7@7tmKZJQN+Vl@gFz+:]SzbhlAvbqG_>^;9 AG<5T' );
define( 'SECURE_AUTH_KEY',  'E$$Zk/vNwgP1}fR`0mOt8`?TbqM)b=v#$um6~zSw,||`+$1Xk1uDZTBSp{_2J,&T' );
define( 'LOGGED_IN_KEY',    'T999dj_ U$rmWz, p<_*GJ^bla|~fgVkVa+OXxFr)mn7O+6C+1@Am*W&(#@0W@]c' );
define( 'NONCE_KEY',        '7uH1~x}KX1ma;MW)vva#YdPwy<@iO9Zf%&mD.gv{3n/ldik.!]?!#UjbiV_J/JDB' );
define( 'AUTH_SALT',        'FK=>ETJ]i}QdZ`We=}C:go-e{@N[Y{*?rp0@6st:l,d8-o]akV>!|Y]E,? d79bq' );
define( 'SECURE_AUTH_SALT', '$OO0o3E12CLudjT@@Y(M`;3Nn-bq3I8W1sv>. BUFJtS3f@nYG7=6AJ7d&P018?g' );
define( 'LOGGED_IN_SALT',   '~:,v_qA7W<9.^6P_hoh*Fge*e2N@<g|{W~#n:CVTPoBY7KJq&*/:O6Qz:g?W7[-Y' );
define( 'NONCE_SALT',       ':v$vBO{`jdxoa)*I5-y0I0k}1yg*W9:qEk0Ps(2z9IVokRQj)S`ECA#SyRx>>K{}' );
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
define('WP_HOME', 'http://localhost:8888/chekin.com');
define('WP_SITEURL', 'http://localhost:8888/chekin.com');

define( 'WP_DEBUG', false );
/* That's all, stop editing! Happy publishing. */
/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}
/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';