<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'wordpress' );

/** MySQL database password */
define( 'DB_PASSWORD', 'wordpress' );

/** MySQL hostname */
define( 'DB_HOST', 'db' );

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
define( 'AUTH_KEY',         'GK6%|1ZXU6Mx8`pXFGcp~ep2r i%%g FRXCzA}C:{WhIGLAkSaWOS~o<25{}FZ$S' );
define( 'SECURE_AUTH_KEY',  'tR!XoR!SUL1Q,Js10?4q9I7-NyliA>lB^0EbF@?/#HV?ErObs$G1wK65n3t/0~Zo' );
define( 'LOGGED_IN_KEY',    '3Kt&/C?(BKdSomy*1D34j7R#U3Yw{|Rd]3(^H]S^c@*@-FG;,QC.^<H[YxC5xZ7?' );
define( 'NONCE_KEY',        '}wwM{#/^Jb4|/5Iui.&=u4nubb8A|jPB;n U]IMImn!8{H30&dL..8y^Z~Mdfs`m' );
define( 'AUTH_SALT',        'OT67oE6z:1EsXD+w^HhWA<duz=WOzrKAcO<B;1^:X_%Bedq6~4eQ{2g}n:u_x)tt' );
define( 'SECURE_AUTH_SALT', '2pPUs/N5Hr7TC/v|AZLPE6I~^sm-[e_d!O*qdu-__/%AgyHT)D?CB{nuwCt B~5(' );
define( 'LOGGED_IN_SALT',   'cF$4zCP5c$]hSlnrCkM,N|IYRJ${)oh;.)3U>i{zWrTfQWcxb`iWx+*{O%6a|MNY' );
define( 'NONCE_SALT',       '^rYWQ2#eWEbwLYqr6(!<1P_*R8MV-4{Qs3BEeFUJ}hEwFiGU1A198CUpPX`Ib]Z~' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
