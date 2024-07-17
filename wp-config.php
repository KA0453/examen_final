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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'kennethcv' );

/** Database username */
define( 'DB_USER', 'Kenenthcv' );

/** Database password */
define( 'DB_PASSWORD', 'Kenneth.0453' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         '<SS~ _(!`sLl%, z(o[PEgS| ~%}Una=7ZcILFi>%?L=!=@z,96B32>[1jf*LS!h' );
define( 'SECURE_AUTH_KEY',  'on(hU!KD=>JPI#+FhR^9[2^]]an8P pf&*0>2@D8+1;:*(GW[nus4CK*pUK>>ui|' );
define( 'LOGGED_IN_KEY',    'Whla{Rb4/ENCJRyN]onX:7Em5=}kw%!s*wJX6A?k;zaxW${xk$wuv6 T5bd|@fL&' );
define( 'NONCE_KEY',        '6N}pKd8P3,<<iN/;vUhA.+B;[>|d=w%,l5-NksMnOG*;ZgvA[+c?RF>Ak?tnrD; ' );
define( 'AUTH_SALT',        'o*S7QjUCq/j_-:94}|_q@J?;4KZSb1D}cQos1ej<):#@Lcr;JwE]/JZ~x~}TGruA' );
define( 'SECURE_AUTH_SALT', 'VB*@p<}gi6(AxFOyx9tg/LXX+FBfr+`f9cn6o^2x5*>S13IjU=ehlZ63IOUP<X37' );
define( 'LOGGED_IN_SALT',   'cDqJpx6G/7hq3>SjR*ZFSfE*-2X$_Df$dUgNi?SWYcC8SV1.XpdHKJT&CEw.MsEd' );
define( 'NONCE_SALT',       'Jt5Yg?Fc,x}Mpwn|CKH1N;CZdxGhXyICZ3 +_!vlK}n1FX`@nEX6 eR`J,Ux=Uwf' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
