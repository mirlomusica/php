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
define( 'AUTH_KEY',         'Z^d_Ft7VZk8[LUE6,>)pm&5}6}mS1_NgTbu}T`]PcC,_:;}*8EVp1hF+!d5BD%~)' );
define( 'SECURE_AUTH_KEY',  '&7JNMXPC^*o7giLY.8{xSv2HB&z1Gh$+MP^?peE~13hRncn}EF;J(6.w4[X]KU~m' );
define( 'LOGGED_IN_KEY',    '@y8)S7 3vCRXR7W[T<zB~l*OZ*n-%tSsS)M)536*p(9BIMP%z5ApE}_>e$2wH05]' );
define( 'NONCE_KEY',        '&d+DKc8CAfuU+9%9:D_f.-te^C?]0TNtI9B~tLM:7%i`H2lKV{0;Iimo09FC3nOH' );
define( 'AUTH_SALT',        '!4n`rkejoOIdK;= tTJxqr?eKx|{$:9@l&v~Wr[vVrzXhrN,M uc*(hFE>?IQ ;9' );
define( 'SECURE_AUTH_SALT', 'gfmqn9hvLbf+@j#(#zfL=E!=Q{q7NCCkQeqVf#pJw2]|U= 2Jl^fuWdx)x4h<CcD' );
define( 'LOGGED_IN_SALT',   'l_*FSe]7}$]L32NE)A^.ar<o2pFQm6&x U-<!-u|eTpyKhcYrqNmh/tSE28U6&^ ' );
define( 'NONCE_SALT',       'Gx$4[],-ZNtovlSS+Lduq:3cPU?m9rhG0f$[qON7?RrL)c!xJ6I4zi/]$0- !9}g' );

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

