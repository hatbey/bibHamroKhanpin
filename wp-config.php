<?php
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
define( 'DB_NAME', 'bibwp_hkpdb' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'ahgZco6bHJ%5Q{||zXzmLkmv;W(-xeK~gMS);k)T2_/AA*F.V7^9`lQR,Pl+~J^T' );
define( 'SECURE_AUTH_KEY',  '(=9cPVbYc``D -A4:VQD?v$tzW`oGL6@):8Ks&sw-@y*ad_VNZ`gyg+k.G|[|}Fa' );
define( 'LOGGED_IN_KEY',    '(9KB2P?+Jqx0-;S+X@@e;Y?2dLjart2t1#.c+d1KE_|I,osLHwU-@pm.QC;@@CFd' );
define( 'NONCE_KEY',        'kM<Bgh!hDz0<r8z&i2`s~5mabc.YrE`ko>sPH4=$>|I$o)V+2FStX9-@&-yd0`ZN' );
define( 'AUTH_SALT',        'W]Q x9fO]yBO#=_1-Zw1qyFanl!XkVjV!6ls|Sf ~,IC7$|EnO<%Mzl2TynkrGMO' );
define( 'SECURE_AUTH_SALT', 'gV3Bb4}dcFzU;0/0h~8_Hfd#@;yFJ$E/V5<r.+sQou,Nw(8;*&ia<,.F@9gZpkXp' );
define( 'LOGGED_IN_SALT',   '@Xj,w3)U=e>f*^%iCy=lIZ2>Achp|Wv{wfI6)Yzr/y^uKDgRryb+owwk0-0--ee(' );
define( 'NONCE_SALT',       'Z2d?qU9gV4hXv{?VI3=[MipY8R?e1hns|qCGk8X*QT6p=)%j,5u$`+-V6PpAv)G+' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'stwp_';

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
