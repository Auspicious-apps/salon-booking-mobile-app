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
define( 'DB_NAME', 'ID377323_wordmisalon' );

/** Database username */
define( 'DB_USER', 'ID377323_wordmisalon' );

/** Database password */
define( 'DB_PASSWORD', '81080056a20iuLV67Z1P' );

/** Database hostname */
define( 'DB_HOST', 'ID377323_wordmisalon.db.webhosting.be' );

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
define( 'AUTH_KEY',         'g/q`e%~0KwM5=J1sVT#QAICj;z68K<V(#,s70+vmbtU^#n@aW1F^OU3LR/QSK?_W' );
define( 'SECURE_AUTH_KEY',  'SeT2<#CoC9DQ347O]7ao&m6$LZ)W!i{poMb{NCgt)P[}c-U7MUxrn5Xq#6Oli~D#' );
define( 'LOGGED_IN_KEY',    'x(55<3HsBJ1G0WO`1!o=l~=O~R`l,l]e/df-,ukZ5RZlP5ygM2=!rFThIX>m%,Cl' );
define( 'NONCE_KEY',        '7MY`kj4[]^PoJmIFoU$[^ZWn;@yWO0r)qr}nPC)FN+`|[SLbbV~9fi%aSzbh8Y1T' );
define( 'AUTH_SALT',        'MuV$6?!w|Um~jq`InX8XBZ}nAg1+;M-,H{Dc@kjRXQkf_rd#%Nzn~C7kKCbj #,#' );
define( 'SECURE_AUTH_SALT', ']FK]7(W%|_=RI5gM:ta`nYYnA~7%C^do&|_!J=:CxqIyr8uvFL?z84YEwA.g{I2H' );
define( 'LOGGED_IN_SALT',   'P4&iWa; z5K=/_9H-y,_*m4o~T]TNMz,p^]gwrb~a^aA| y6wJmQY2)-+]YN|  F' );
define( 'NONCE_SALT',       'Q*s<?D2}lpn?v%2|.)7.DA1jN#lbLRdC3Jmh#[pK=jtBPJB55?(>dlcP5aVwLl[u' );

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
