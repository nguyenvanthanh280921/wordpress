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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'project_wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '1Jr>^kAgy!H<jwt`4~7UE-r=1yRIXT;P|Fp` -]va!H)&J3-CV#tQG!:HlFg#umQ' );
define( 'SECURE_AUTH_KEY',  'l~a9ND>4q/OI@VWq_uzM[9Kxy3}Ob.$*W5H|(N%tv,2 qQ5p{~>u(/sa3D^Lh^Ow' );
define( 'LOGGED_IN_KEY',    'cW9=rMXn}w:8[74sK9Agl:{44iZZ1JwU$|/0;BvV3((j6@7+W^9PKD*.w-poZv,d' );
define( 'NONCE_KEY',        'NZ=alnio2oE|0d1*[AXYSfv5e/@m_|AYRv(;fk1M#5*a[eV;S3U}kSL&gA:;o#O?' );
define( 'AUTH_SALT',        ';5S+xjkoW.:[nOuD0hW1RPS#WU=2)ckJn)[QCplx{^/ttX+mM]w,}O2RQAH3@XN2' );
define( 'SECURE_AUTH_SALT', 'YpTV3VdU5Q+GV3[@CZNafY?NB#U33N^;UXjiiX@8xQYMk3$>t.E.Dfvyv/%z32/_' );
define( 'LOGGED_IN_SALT',   'Ik<*k7$GgZvYo%$o^c,-vq?7VAYtSPaX2Uw[{*]u`} 8<}@Yd::KO?TL`aZ1;F e' );
define( 'NONCE_SALT',       ':gchdzdYXi?+LW9/MC,w/Gw]YtTv/|WtTC3>2M9Cze[8`4(iJ!IlAFOg%uM(&pyB' );

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
