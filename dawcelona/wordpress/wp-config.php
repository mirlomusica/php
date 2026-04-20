<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'wordpress' );

/** Database password */
define( 'DB_PASSWORD', '1234' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );


define('FS_METHOD', 'direct');

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '9dRH8lx(m*oa]18~@KT#XZu YI&z= swkZ)Jy*4~#Z|<nc&>9B|j%h0F$6&JOi0a' );
define( 'SECURE_AUTH_KEY',  'VZO^KQ]_eVl%oQGPH#kf!6h?hTR Awf-qUuQ]lV`(@@A[C,]*f_(If)Hs(N/?yj ' );
define( 'LOGGED_IN_KEY',    'H$L#Oz@2gt96_T[F/jSv0D-Ors0CgOo2{KB1qPuCGBsfz4H&S^0#bOg0tDr,G.N}' );
define( 'NONCE_KEY',        'EY$ npD^@ig!-G7m}R%~Y[[D4,`+#yB3BSd~s0c=D`@|k/rw62[m;u=Z%$X ]zi1' );
define( 'AUTH_SALT',        'mUq?$u|!I-PI<EcO`YH.30Ogh7RMlFE!sB/^B@f-e.?QbO|Hjx(ZLt}yr)IsS0]9' );
define( 'SECURE_AUTH_SALT', 'Yhr dSZGz^KX*|u`0Y?_tvukD&R)1ped!z>t#J21Ba597!~=zCQ<3kK/-a`T$KQm' );
define( 'LOGGED_IN_SALT',   'et/}V>Om+bw>3FQEUMK}X$-G^`M/S^+`lkm.dM_;avJttm(GxK:FvG<).roG)!gy' );
define( 'NONCE_SALT',       '{#dmY0LvkTQ4[G.hVF!COD79M5!rMy+a?gj!US>Gwds?qt`Ii1R~35YSARO4`.q_' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_dawcelona';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

